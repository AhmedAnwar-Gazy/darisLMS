<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RoleController extends BaseController
{
    protected $table = 'role';

    /**
     * Display a listing of roles.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $roles = DB::table($this->table)
                ->select('id', 'name', 'shortname', 'description', 'descriptionformat', 'sortorder', 'archetype')
                ->orderBy('sortorder', 'asc')
                ->get();

            return $this->sendResponse($roles, 'Roles retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving roles', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified role.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $role = DB::table($this->table)->where('id', $id)->first();

            if (!$role) {
                return $this->sendNotFoundResponse('Role not found');
            }

            return $this->sendResponse($role, 'Role retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving role', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get role assignments for a user.
     *
     * @param int $userId
     * @param Request $request
     * @return JsonResponse
     */
    public function userAssignments(int $userId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $assignments = DB::table('role_assignments as ra')
                ->join('role as r', 'ra.roleid', '=', 'r.id')
                ->join('context as ctx', 'ra.contextid', '=', 'ctx.id')
                ->where('ra.userid', $userId)
                ->select(
                    'ra.id',
                    'ra.roleid',
                    'r.shortname as role_name',
                    'r.name as role_fullname',
                    'ra.contextid',
                    'ctx.contextlevel',
                    'ctx.instanceid',
                    'ra.timemodified'
                )
                ->orderBy('ra.timemodified', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($assignments, 'User role assignments retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving user role assignments', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get role assignments in a context.
     *
     * @param int $contextId
     * @param Request $request
     * @return JsonResponse
     */
    public function contextAssignments(int $contextId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $roleId = $request->input('role_id');

            $query = DB::table('role_assignments as ra')
                ->join('role as r', 'ra.roleid', '=', 'r.id')
                ->join('users as u', 'ra.userid', '=', 'u.id')
                ->where('ra.contextid', $contextId)
                ->where('u.deleted', 0)
                ->select(
                    'ra.id',
                    'ra.roleid',
                    'r.shortname as role_name',
                    'ra.userid',
                    'u.username',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'ra.timemodified'
                );

            if ($roleId) {
                $query->where('ra.roleid', $roleId);
            }

            $assignments = $query->orderBy('ra.timemodified', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($assignments, 'Context role assignments retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving context role assignments', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Assign a role to a user in a context.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function assignRole(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'roleid' => 'required|integer|exists:role,id',
                'userid' => 'required|integer|exists:users,id',
                'contextid' => 'required|integer|exists:context,id',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            // Check if assignment already exists
            $existing = DB::table('role_assignments')
                ->where('roleid', $request->roleid)
                ->where('userid', $request->userid)
                ->where('contextid', $request->contextid)
                ->first();

            if ($existing) {
                return $this->sendError('Role assignment already exists', [], 409);
            }

            $data = [
                'roleid' => $request->roleid,
                'contextid' => $request->contextid,
                'userid' => $request->userid,
                'timemodified' => time(),
                'modifierid' => $request->input('modifier_id', 0),
                'component' => $request->input('component', ''),
                'itemid' => $request->input('itemid', 0),
                'sortorder' => 0,
            ];

            $assignmentId = DB::table('role_assignments')->insertGetId($data);
            $assignment = DB::table('role_assignments')->where('id', $assignmentId)->first();

            return $this->sendResponse($assignment, 'Role assigned successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error assigning role', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Unassign a role (remove role assignment).
     *
     * @param int $id
     * @return JsonResponse
     */
    public function unassignRole(int $id): JsonResponse
    {
        try {
            $assignment = DB::table('role_assignments')->where('id', $id)->first();

            if (!$assignment) {
                return $this->sendNotFoundResponse('Role assignment not found');
            }

            DB::table('role_assignments')->where('id', $id)->delete();

            return $this->sendResponse([], 'Role unassigned successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error unassigning role', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get role capabilities.
     *
     * @param int $roleId
     * @param Request $request
     * @return JsonResponse
     */
    public function capabilities(int $roleId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 50);
            $contextId = $request->input('context_id');

            $query = DB::table('role_capabilities as rc')
                ->join('capabilities as cap', 'rc.capability', '=', 'cap.name')
                ->where('rc.roleid', $roleId)
                ->select(
                    'rc.id',
                    'rc.capability',
                    'cap.captype',
                    'cap.riskbitmask',
                    'rc.permission',
                    'rc.contextid',
                    'rc.timemodified',
                    'rc.modifierid'
                );

            if ($contextId) {
                $query->where('rc.contextid', $contextId);
            }

            $capabilities = $query->orderBy('rc.capability', 'asc')->paginate($perPage);

            return $this->sendPaginatedResponse($capabilities, 'Role capabilities retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving role capabilities', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get users with a specific role.
     *
     * @param int $roleId
     * @param Request $request
     * @return JsonResponse
     */
    public function usersWithRole(int $roleId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $contextId = $request->input('context_id');

            $query = DB::table('role_assignments as ra')
                ->join('users as u', 'ra.userid', '=', 'u.id')
                ->join('context as ctx', 'ra.contextid', '=', 'ctx.id')
                ->where('ra.roleid', $roleId)
                ->where('u.deleted', 0)
                ->select(
                    'u.id as user_id',
                    'u.username',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'ra.contextid',
                    'ctx.contextlevel',
                    'ctx.instanceid',
                    'ra.timemodified'
                );

            if ($contextId) {
                $query->where('ra.contextid', $contextId);
            }

            $users = $query->orderBy('ra.timemodified', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($users, 'Users with role retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving users with role', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get allowed role assignments for a role.
     *
     * @param int $roleId
     * @return JsonResponse
     */
    public function allowedAssignments(int $roleId): JsonResponse
    {
        try {
            $allowed = DB::table('role_allow_assign as raa')
                ->join('role as r', 'raa.allowassign', '=', 'r.id')
                ->where('raa.roleid', $roleId)
                ->select('r.id', 'r.name', 'r.shortname')
                ->get();

            return $this->sendResponse($allowed, 'Allowed role assignments retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving allowed role assignments', ['error' => $e->getMessage()]);
        }
    }
}
