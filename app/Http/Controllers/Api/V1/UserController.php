<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    protected $table = 'users';

    /**
     * Display a listing of users.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            
            $query = DB::table($this->table)
                ->select('id', 'username', 'firstname', 'lastname', 'email', 'auth', 'confirmed', 'suspended', 'deleted', 'timecreated', 'timemodified')
                ->where('deleted', 0);

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('username', 'like', "%{$search}%")
                      ->orWhere('firstname', 'like', "%{$search}%")
                      ->orWhere('lastname', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            }

            $users = $query->paginate($perPage);

            return $this->sendPaginatedResponse($users, 'Users retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving users', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|max:100|unique:users,username',
                'password' => 'required|string|min:8',
                'firstname' => 'required|string|max:100',
                'lastname' => 'required|string|max:100',
                'email' => 'required|email|max:100|unique:users,email',
                'auth' => 'string|max:20',
                'confirmed' => 'boolean',
                'suspended' => 'boolean',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['username', 'firstname', 'lastname', 'email', 'auth']);
            $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
            $data['confirmed'] = $request->input('confirmed', 1);
            $data['suspended'] = $request->input('suspended', 0);
            $data['deleted'] = 0;
            $data['timecreated'] = time();
            $data['timemodified'] = time();
            $data['auth'] = $request->input('auth', 'manual');

            $userId = DB::table($this->table)->insertGetId($data);
            $user = DB::table($this->table)->where('id', $userId)->first();

            return $this->sendResponse($user, 'User created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating user', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $user = DB::table($this->table)
                ->where('id', $id)
                ->where('deleted', 0)
                ->first();

            if (!$user) {
                return $this->sendNotFoundResponse('User not found');
            }

            // Remove sensitive fields
            unset($user->password);

            return $this->sendResponse($user, 'User retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving user', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified user.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $user = DB::table($this->table)->where('id', $id)->where('deleted', 0)->first();

            if (!$user) {
                return $this->sendNotFoundResponse('User not found');
            }

            $validator = Validator::make($request->all(), [
                'username' => 'string|max:100|unique:users,username,' . $id,
                'firstname' => 'string|max:100',
                'lastname' => 'string|max:100',
                'email' => 'email|max:100|unique:users,email,' . $id,
                'password' => 'string|min:8',
                'confirmed' => 'boolean',
                'suspended' => 'boolean',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['username', 'firstname', 'lastname', 'email', 'confirmed', 'suspended']);
            
            if ($request->has('password')) {
                $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
            }

            $data['timemodified'] = time();

            DB::table($this->table)->where('id', $id)->update($data);
            $updatedUser = DB::table($this->table)->where('id', $id)->first();

            unset($updatedUser->password);

            return $this->sendResponse($updatedUser, 'User updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating user', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified user (soft delete).
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $user = DB::table($this->table)->where('id', $id)->where('deleted', 0)->first();

            if (!$user) {
                return $this->sendNotFoundResponse('User not found');
            }

            DB::table($this->table)->where('id', $id)->update([
                'deleted' => 1,
                'timemodified' => time(),
            ]);

            return $this->sendResponse([], 'User deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting user', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get user enrollments.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function enrollments(int $id): JsonResponse
    {
        try {
            $enrollments = DB::table('user_enrolments as ue')
                ->join('enrol as e', 'ue.enrolid', '=', 'e.id')
                ->join('course as c', 'e.courseid', '=', 'c.id')
                ->where('ue.userid', $id)
                ->select('c.id as course_id', 'c.fullname', 'c.shortname', 'e.enrol as method', 'ue.status', 'ue.timecreated', 'ue.timemodified')
                ->get();

            return $this->sendResponse($enrollments, 'User enrollments retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving user enrollments', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Advanced search for users.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $filters = $request->only(['username', 'email', 'firstname', 'lastname', 'auth', 'confirmed', 'suspended', 'city', 'country']);
            
            $query = DB::table($this->table)
                ->select('id', 'username', 'firstname', 'lastname', 'email', 'auth', 'confirmed', 'suspended', 'city', 'country', 'timecreated', 'timemodified')
                ->where('deleted', 0);

            foreach ($filters as $field => $value) {
                if ($value !== null && $value !== '') {
                    if (in_array($field, ['username', 'email', 'firstname', 'lastname', 'city'])) {
                        $query->where($field, 'like', "%{$value}%");
                    } else {
                        $query->where($field, $value);
                    }
                }
            }

            $users = $query->paginate($perPage);

            return $this->sendPaginatedResponse($users, 'Users search completed successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error searching users', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get user count.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function count(Request $request): JsonResponse
    {
        try {
            $status = $request->input('status'); // active, suspended, deleted
            
            $query = DB::table($this->table);

            if ($status === 'active') {
                $query->where('deleted', 0)->where('suspended', 0);
            } elseif ($status === 'suspended') {
                $query->where('suspended', 1)->where('deleted', 0);
            } elseif ($status === 'deleted') {
                $query->where('deleted', 1);
            } else {
                $query->where('deleted', 0);
            }

            $count = $query->count();

            return $this->sendResponse(['count' => $count, 'status' => $status ?: 'all'], 'User count retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error counting users', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Check if user exists.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exists(Request $request): JsonResponse
    {
        try {
            $username = $request->input('username');
            $email = $request->input('email');

            if (!$username && !$email) {
                return $this->sendError('Username or email is required', [], 400);
            }

            $query = DB::table($this->table)->where('deleted', 0);

            if ($username) {
                $query->where('username', $username);
            }
            if ($email) {
                $query->where('email', $email);
            }

            $exists = $query->exists();

            return $this->sendResponse(['exists' => $exists], 'Existence check completed');
        } catch (\Exception $e) {
            return $this->sendError('Error checking user existence', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Bulk update users.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function bulkUpdate(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_ids' => 'required|array',
                'user_ids.*' => 'integer|exists:users,id',
                'data' => 'required|array',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->input('data');
            $data['timemodified'] = time();

            $updated = DB::table($this->table)
                ->whereIn('id', $request->user_ids)
                ->update($data);

            return $this->sendResponse(['updated_count' => $updated], 'Users updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error bulk updating users', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Bulk delete users (soft delete).
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function bulkDestroy(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_ids' => 'required|array',
                'user_ids.*' => 'integer|exists:users,id',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $deleted = DB::table($this->table)
                ->whereIn('id', $request->user_ids)
                ->update([
                    'deleted' => 1,
                    'timemodified' => time(),
                ]);

            return $this->sendResponse(['deleted_count' => $deleted], 'Users deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error bulk deleting users', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Bulk update user status.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function bulkStatus(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_ids' => 'required|array',
                'user_ids.*' => 'integer|exists:users,id',
                'suspended' => 'required|boolean',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $updated = DB::table($this->table)
                ->whereIn('id', $request->user_ids)
                ->update([
                    'suspended' => $request->suspended,
                    'timemodified' => time(),
                ]);

            return $this->sendResponse(['updated_count' => $updated], 'User status updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating user status', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get user statistics.
     *
     * @return JsonResponse
     */
    public function stats(): JsonResponse
    {
        try {
            $stats = DB::table($this->table)
                ->selectRaw('
                    COUNT(*) as total,
                    SUM(CASE WHEN deleted = 0 THEN 1 ELSE 0 END) as active,
                    SUM(CASE WHEN suspended = 1 AND deleted = 0 THEN 1 ELSE 0 END) as suspended,
                    SUM(CASE WHEN deleted = 1 THEN 1 ELSE 0 END) as deleted,
                    SUM(CASE WHEN confirmed = 0 AND deleted = 0 THEN 1 ELSE 0 END) as unconfirmed
                ')
                ->first();

            return $this->sendResponse($stats, 'User statistics retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving user statistics', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Export users to CSV.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportCsv(Request $request): JsonResponse
    {
        try {
            $users = DB::table($this->table)
                ->where('deleted', 0)
                ->select('id', 'username', 'firstname', 'lastname', 'email', 'auth', 'confirmed', 'suspended', 'city', 'country', 'timecreated')
                ->get();

            $filename = 'users_export_' . time() . '.csv';
            $filepath = storage_path('app/public/exports/' . $filename);
            
            // Create directory if it doesn't exist
            if (!file_exists(dirname($filepath))) {
                mkdir(dirname($filepath), 0755, true);
            }

            $file = fopen($filepath, 'w');
            
            // Add headers
            fputcsv($file, ['ID', 'Username', 'First Name', 'Last Name', 'Email', 'Auth', 'Confirmed', 'Suspended', 'City', 'Country', 'Created']);
            
            // Add data
            foreach ($users as $user) {
                fputcsv($file, (array) $user);
            }
            
            fclose($file);

            return $this->sendResponse([
                'filename' => $filename,
                'path' => 'storage/exports/' . $filename,
                'url' => url('storage/exports/' . $filename),
                'count' => count($users)
            ], 'Users exported to CSV successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error exporting users to CSV', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Export users to JSON.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportJson(Request $request): JsonResponse
    {
        try {
            $users = DB::table($this->table)
                ->where('deleted', 0)
                ->select('id', 'username', 'firstname', 'lastname', 'email', 'auth', 'confirmed', 'suspended', 'city', 'country', 'timecreated')
                ->get();

            $filename = 'users_export_' . time() . '.json';
            $filepath = storage_path('app/public/exports/' . $filename);
            
            // Create directory if it doesn't exist
            if (!file_exists(dirname($filepath))) {
                mkdir(dirname($filepath), 0755, true);
            }

            file_put_contents($filepath, json_encode($users, JSON_PRETTY_PRINT));

            return $this->sendResponse([
                'filename' => $filename,
                'path' => 'storage/exports/' . $filename,
                'url' => url('storage/exports/' . $filename),
                'count' => count($users)
            ], 'Users exported to JSON successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error exporting users to JSON', ['error' => $e->getMessage()]);
        }
    }
}
