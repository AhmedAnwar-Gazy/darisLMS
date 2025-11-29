<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CohortController extends BaseController
{
    protected $table = 'cohort';

    /**
     * Display a listing of cohorts.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $contextId = $request->input('context_id');
            $search = $request->input('search');
            
            $query = DB::table($this->table)
                ->select('id', 'contextid', 'name', 'idnumber', 'description', 'descriptionformat', 'visible', 'component', 'timecreated', 'timemodified');

            if ($contextId) {
                $query->where('contextid', $contextId);
            }

            if ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('idnumber', 'like', "%{$search}%");
                });
            }

            $cohorts = $query->orderBy('name', 'asc')->paginate($perPage);

            return $this->sendPaginatedResponse($cohorts, 'Cohorts retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving cohorts', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created cohort.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'contextid' => 'required|integer|exists:context,id',
                'name' => 'required|string|max:254',
                'idnumber' => 'nullable|string|max:100',
                'description' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['contextid', 'name', 'idnumber', 'description']);
            $data['descriptionformat'] = $request->input('descriptionformat', 1);
            $data['visible'] = $request->input('visible', 1);
            $data['component'] = $request->input('component', '');
            $data['timecreated'] = time();
            $data['timemodified'] = time();
            $data['theme'] = $request->input('theme', '');

            $cohortId = DB::table($this->table)->insertGetId($data);
            $cohort = DB::table($this->table)->where('id', $cohortId)->first();

            return $this->sendResponse($cohort, 'Cohort created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating cohort', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified cohort.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $cohort = DB::table($this->table)->where('id', $id)->first();

            if (!$cohort) {
                return $this->sendNotFoundResponse('Cohort not found');
            }

            return $this->sendResponse($cohort, 'Cohort retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving cohort', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified cohort.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $cohort = DB::table($this->table)->where('id', $id)->first();

            if (!$cohort) {
                return $this->sendNotFoundResponse('Cohort not found');
            }

            $validator = Validator::make($request->all(), [
                'name' => 'string|max:254',
                'idnumber' => 'nullable|string|max:100',
                'description' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['name', 'idnumber', 'description', 'visible']);
            $data['timemodified'] = time();

            DB::table($this->table)->where('id', $id)->update($data);
            $updatedCohort = DB::table($this->table)->where('id', $id)->first();

            return $this->sendResponse($updatedCohort, 'Cohort updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating cohort', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified cohort.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $cohort = DB::table($this->table)->where('id', $id)->first();

            if (!$cohort) {
                return $this->sendNotFoundResponse('Cohort not found');
            }

            // Delete cohort members first
            DB::table('cohort_members')->where('cohortid', $id)->delete();

            // Delete cohort
            DB::table($this->table)->where('id', $id)->delete();

            return $this->sendResponse([], 'Cohort deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting cohort', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get cohort members.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function members(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $members = DB::table('cohort_members as cm')
                ->join('users as u', 'cm.userid', '=', 'u.id')
                ->where('cm.cohortid', $id)
                ->where('u.deleted', 0)
                ->select(
                    'cm.id as membership_id',
                    'u.id as user_id',
                    'u.username',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'cm.timeadded'
                )
                ->orderBy('cm.timeadded', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($members, 'Cohort members retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving cohort members', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Add a member to a cohort.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function addMember(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'cohortid' => 'required|integer|exists:cohort,id',
                'userid' => 'required|integer|exists:users,id',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            // Check if already a member
            $existing = DB::table('cohort_members')
                ->where('cohortid', $request->cohortid)
                ->where('userid', $request->userid)
                ->first();

            if ($existing) {
                return $this->sendError('User is already a member of this cohort', [], 409);
            }

            $data = [
                'cohortid' => $request->cohortid,
                'userid' => $request->userid,
                'timeadded' => time(),
            ];

            $membershipId = DB::table('cohort_members')->insertGetId($data);
            $membership = DB::table('cohort_members')->where('id', $membershipId)->first();

            return $this->sendResponse($membership, 'Member added to cohort successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error adding member to cohort', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove a member from a cohort.
     *
     * @param int $membershipId
     * @return JsonResponse
     */
    public function removeMember(int $membershipId): JsonResponse
    {
        try {
            $membership = DB::table('cohort_members')->where('id', $membershipId)->first();

            if (!$membership) {
                return $this->sendNotFoundResponse('Membership not found');
            }

            DB::table('cohort_members')->where('id', $membershipId)->delete();

            return $this->sendResponse([], 'Member removed from cohort successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error removing member from cohort', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get user cohorts.
     *
     * @param int $userId
     * @param Request $request
     * @return JsonResponse
     */
    public function userCohorts(int $userId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $cohorts = DB::table('cohort_members as cm')
                ->join('cohort as c', 'cm.cohortid', '=', 'c.id')
                ->where('cm.userid', $userId)
                ->select(
                    'c.id',
                    'c.name',
                    'c.idnumber',
                    'c.description',
                    'c.visible',
                    'cm.timeadded'
                )
                ->orderBy('c.name', 'asc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($cohorts, 'User cohorts retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving user cohorts', ['error' => $e->getMessage()]);
        }
    }
}
