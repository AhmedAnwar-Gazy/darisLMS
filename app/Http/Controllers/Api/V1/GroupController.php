<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GroupController extends BaseController
{
    protected $table = 'groups';

    /**
     * Display a listing of groups.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $courseId = $request->input('course_id');
            
            $query = DB::table($this->table)
                ->select('id', 'courseid', 'idnumber', 'name', 'description', 'descriptionformat', 'enrolmentkey', 'picture', 'timecreated', 'timemodified');

            if ($courseId) {
                $query->where('courseid', $courseId);
            }

            $groups = $query->orderBy('name', 'asc')->paginate($perPage);

            return $this->sendPaginatedResponse($groups, 'Groups retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving groups', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created group.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'courseid' => 'required|integer|exists:course,id',
                'name' => 'required|string|max:254',
                'description' => 'nullable|string',
                'idnumber' => 'nullable|string|max:100',
                'enrolmentkey' => 'nullable|string|max:50',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['courseid', 'name', 'description', 'idnumber', 'enrolmentkey']);
            $data['descriptionformat'] = $request->input('descriptionformat', 1);
            $data['picture'] = $request->input('picture', 0);
            $data['timecreated'] = time();
            $data['timemodified'] = time();

            $groupId = DB::table($this->table)->insertGetId($data);
            $group = DB::table($this->table)->where('id', $groupId)->first();

            return $this->sendResponse($group, 'Group created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating group', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified group.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $group = DB::table($this->table)->where('id', $id)->first();

            if (!$group) {
                return $this->sendNotFoundResponse('Group not found');
            }

            return $this->sendResponse($group, 'Group retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving group', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified group.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $group = DB::table($this->table)->where('id', $id)->first();

            if (!$group) {
                return $this->sendNotFoundResponse('Group not found');
            }

            $validator = Validator::make($request->all(), [
                'name' => 'string|max:254',
                'description' => 'nullable|string',
                'idnumber' => 'nullable|string|max:100',
                'enrolmentkey' => 'nullable|string|max:50',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['name', 'description', 'idnumber', 'enrolmentkey']);
            $data['timemodified'] = time();

            DB::table($this->table)->where('id', $id)->update($data);
            $updatedGroup = DB::table($this->table)->where('id', $id)->first();

            return $this->sendResponse($updatedGroup, 'Group updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating group', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified group.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $group = DB::table($this->table)->where('id', $id)->first();

            if (!$group) {
                return $this->sendNotFoundResponse('Group not found');
            }

            // Delete group members first
            DB::table('groups_members')->where('groupid', $id)->delete();

            // Delete group
            DB::table($this->table)->where('id', $id)->delete();

            return $this->sendResponse([], 'Group deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting group', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get group members.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function members(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $members = DB::table('groups_members as gm')
                ->join('users as u', 'gm.userid', '=', 'u.id')
                ->where('gm.groupid', $id)
                ->where('u.deleted', 0)
                ->select(
                    'gm.id as membership_id',
                    'u.id as user_id',
                    'u.username',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'gm.timeadded'
                )
                ->orderBy('gm.timeadded', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($members, 'Group members retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving group members', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Add a member to a group.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function addMember(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'groupid' => 'required|integer|exists:groups,id',
                'userid' => 'required|integer|exists:users,id',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            // Check if already a member
            $existing = DB::table('groups_members')
                ->where('groupid', $request->groupid)
                ->where('userid', $request->userid)
                ->first();

            if ($existing) {
                return $this->sendError('User is already a member of this group', [], 409);
            }

            $data = [
                'groupid' => $request->groupid,
                'userid' => $request->userid,
                'timeadded' => time(),
                'component' => $request->input('component', ''),
                'itemid' => $request->input('itemid', 0),
            ];

            $membershipId = DB::table('groups_members')->insertGetId($data);
            $membership = DB::table('groups_members')->where('id', $membershipId)->first();

            return $this->sendResponse($membership, 'Member added to group successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error adding member to group', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove a member from a group.
     *
     * @param int $membershipId
     * @return JsonResponse
     */
    public function removeMember(int $membershipId): JsonResponse
    {
        try {
            $membership = DB::table('groups_members')->where('id', $membershipId)->first();

            if (!$membership) {
                return $this->sendNotFoundResponse('Membership not found');
            }
    public function groupings(int $courseId): JsonResponse
    {
        try {
            $groupings = DB::table('groupings')
                ->where('courseid', $courseId)
                ->select('id', 'courseid', 'name', 'idnumber', 'description', 'descriptionformat', 'timecreated', 'timemodified')
                ->orderBy('name', 'asc')
                ->get();

            return $this->sendResponse($groupings, 'Groupings retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving groupings', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get groups in a grouping.
     *
     * @param int $groupingId
     * @return JsonResponse
     */
    public function groupingGroups(int $groupingId): JsonResponse
    {
        try {
            $groups = DB::table('groupings_groups as gg')
                ->join('groups as g', 'gg.groupid', '=', 'g.id')
                ->where('gg.groupingid', $groupingId)
                ->select('g.id', 'g.courseid', 'g.name', 'g.description', 'gg.timeadded')
                ->orderBy('g.name', 'asc')
                ->get();

            return $this->sendResponse($groups, 'Grouping groups retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving grouping groups', ['error' => $e->getMessage()]);
        }
    }
}
