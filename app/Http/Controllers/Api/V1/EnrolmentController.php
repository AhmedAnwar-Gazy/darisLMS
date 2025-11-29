<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EnrolmentController extends BaseController
{
    protected $enrolTable = 'enrol';
    protected $userEnrolTable = 'user_enrolments';

    /**
     * Display enrolment methods for a course.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $courseId = $request->input('course_id');
            
            if (!$courseId) {
                return $this->sendError('Course ID is required', [], 400);
            }

            $enrolMethods = DB::table($this->enrolTable)
                ->where('courseid', $courseId)
                ->select('id', 'enrol', 'status', 'name', 'roleid', 'enrolperiod', 'expirynotify', 'expirythreshold', 'timecreated', 'timemodified')
                ->get();

            return $this->sendResponse($enrolMethods, 'Enrolment methods retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving enrolment methods', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Enrol a user in a course.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function enrolUser(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'enrol_id' => 'required|integer|exists:enrol,id',
                'user_id' => 'required|integer|exists:users,id',
                'status' => 'integer|in:0,1', // 0 = active, 1 = suspended
                'timestart' => 'integer',
                'timeend' => 'integer',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            // Check if user is already enrolled
            $existing = DB::table($this->userEnrolTable)
                ->where('enrolid', $request->enrol_id)
                ->where('userid', $request->user_id)
                ->first();

            if ($existing) {
                return $this->sendError('User is already enrolled', [], 409);
            }

            $data = [
                'enrolid' => $request->enrol_id,
                'userid' => $request->user_id,
                'status' => $request->input('status', 0),
                'timestart' => $request->input('timestart', time()),
                'timeend' => $request->input('timeend', 0),
                'modifierid' => $request->input('modifier_id', 0),
                'timecreated' => time(),
                'timemodified' => time(),
            ];

            $enrolmentId = DB::table($this->userEnrolTable)->insertGetId($data);
            $enrolment = DB::table($this->userEnrolTable)->where('id', $enrolmentId)->first();

            return $this->sendResponse($enrolment, 'User enrolled successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error enrolling user', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get enrolled users for a course.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function enrolledUsers(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $courseId = $request->input('course_id');
            $status = $request->input('status'); // 0 = active, 1 = suspended

            if (!$courseId) {
                return $this->sendError('Course ID is required', [], 400);
            }

            $query = DB::table($this->userEnrolTable . ' as ue')
                ->join($this->enrolTable . ' as e', 'ue.enrolid', '=', 'e.id')
                ->join('users as u', 'ue.userid', '=', 'u.id')
                ->where('e.courseid', $courseId)
                ->where('u.deleted', 0)
                ->select(
                    'ue.id as enrolment_id',
                    'u.id as user_id',
                    'u.username',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'e.enrol as enrol_method',
                    'ue.status',
                    'ue.timestart',
                    'ue.timeend',
                    'ue.timecreated',
                    'ue.timemodified'
                );

            if ($status !== null) {
                $query->where('ue.status', $status);
            }

            $enrolledUsers = $query->orderBy('ue.timecreated', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($enrolledUsers, 'Enrolled users retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving enrolled users', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update user enrolment.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function updateEnrolment(Request $request, int $id): JsonResponse
    {
        try {
            $enrolment = DB::table($this->userEnrolTable)->where('id', $id)->first();

            if (!$enrolment) {
                return $this->sendNotFoundResponse('Enrolment not found');
            }

            $validator = Validator::make($request->all(), [
                'status' => 'integer|in:0,1',
                'timestart' => 'integer',
                'timeend' => 'integer',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['status', 'timestart', 'timeend']);
            $data['timemodified'] = time();

            DB::table($this->userEnrolTable)->where('id', $id)->update($data);
            $updatedEnrolment = DB::table($this->userEnrolTable)->where('id', $id)->first();

            return $this->sendResponse($updatedEnrolment, 'Enrolment updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating enrolment', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Unenrol a user (delete enrolment).
     *
     * @param int $id
     * @return JsonResponse
     */
    public function unenrolUser(int $id): JsonResponse
    {
        try {
            $enrolment = DB::table($this->userEnrolTable)->where('id', $id)->first();

            if (!$enrolment) {
                return $this->sendNotFoundResponse('Enrolment not found');
            }

            DB::table($this->userEnrolTable)->where('id', $id)->delete();

            return $this->sendResponse([], 'User unenrolled successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error unenrolling user', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Suspend a user enrolment.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function suspendEnrolment(int $id): JsonResponse
    {
        try {
            $enrolment = DB::table($this->userEnrolTable)->where('id', $id)->first();

            if (!$enrolment) {
                return $this->sendNotFoundResponse('Enrolment not found');
            }

            DB::table($this->userEnrolTable)->where('id', $id)->update([
                'status' => 1, // Suspended
                'timemodified' => time(),
            ]);

            $updatedEnrolment = DB::table($this->userEnrolTable)->where('id', $id)->first();

            return $this->sendResponse($updatedEnrolment, 'Enrolment suspended successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error suspending enrolment', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Activate a user enrolment.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function activateEnrolment(int $id): JsonResponse
    {
        try {
            $enrolment = DB::table($this->userEnrolTable)->where('id', $id)->first();

            if (!$enrolment) {
                return $this->sendNotFoundResponse('Enrolment not found');
            }

            DB::table($this->userEnrolTable)->where('id', $id)->update([
                'status' => 0, // Active
                'timemodified' => time(),
            ]);

            $updatedEnrolment = DB::table($this->userEnrolTable)->where('id', $id)->first();

            return $this->sendResponse($updatedEnrolment, 'Enrolment activated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error activating enrolment', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get user's enrolments across all courses.
     *
     * @param int $userId
     * @param Request $request
     * @return JsonResponse
     */
    public function userEnrolments(int $userId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $enrolments = DB::table($this->userEnrolTable . ' as ue')
                ->join($this->enrolTable . ' as e', 'ue.enrolid', '=', 'e.id')
                ->join('course as c', 'e.courseid', '=', 'c.id')
                ->where('ue.userid', $userId)
                ->select(
                    'ue.id as enrolment_id',
                    'c.id as course_id',
                    'c.fullname',
                    'c.shortname',
                    'e.enrol as enrol_method',
                    'ue.status',
                    'ue.timestart',
                    'ue.timeend',
                    'ue.timecreated'
                )
                ->orderBy('ue.timecreated', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($enrolments, 'User enrolments retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving user enrolments', ['error' => $e->getMessage()]);
        }
    }
}
