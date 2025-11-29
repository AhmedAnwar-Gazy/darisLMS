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
}
