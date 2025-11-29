<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ScormController extends BaseController
{
    protected $table = 'scorm';

    /**
     * Display a listing of SCORM packages.
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
                ->join('course', 'scorm.course', '=', 'course.id')
                ->select(
                    'scorm.id',
                    'scorm.course',
                    'course.fullname as course_name',
                    'scorm.name',
                    'scorm.intro',
                    'scorm.reference',
                    'scorm.version',
                    'scorm.maxgrade',
                    'scorm.grademethod',
                    'scorm.maxattempt',
                    'scorm.timecreated',
                    'scorm.timemodified'
                );

            if ($courseId) {
                $query->where('scorm.course', $courseId);
            }

            $scorms = $query->orderBy('scorm.timecreated', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($scorms, 'SCORM packages retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving SCORM packages', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified SCORM package.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $scorm = DB::table($this->table)
                ->join('course', 'scorm.course', '=', 'course.id')
                ->where('scorm.id', $id)
                ->select('scorm.*', 'course.fullname as course_name')
                ->first();

            if (!$scorm) {
                return $this->sendNotFoundResponse('SCORM package not found');
            }

            return $this->sendResponse($scorm, 'SCORM package retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving SCORM package', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get SCORM attemptss.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function attempts(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $attempts = DB::table('scorm_attempt as sa')
                ->join('users as u', 'sa.userid', '=', 'u.id')
                ->where('sa.scormid', $id)
                ->where('u.deleted', 0)
                ->select(
                    'sa.id',
                    'sa.userid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'sa.attempt',
                    'sa.timestarted',
                    'sa.timefinished'
                )
                ->orderBy('sa.timestarted', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($attempts, 'SCORM attempts retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving SCORM attempts', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get SCORM SCOs (Shareable Content Objects).
     *
     * @param int $id
     * @return JsonResponse
     */
    public function scos(int $id): JsonResponse
    {
        try {
            $scos = DB::table('scorm_scoes')
                ->where('scorm', $id)
                ->select('id', 'scorm', 'manifest', 'organization', 'parent', 'identifier', 'launch', 'scormtype', 'title')
                ->orderBy('sortorder', 'asc')
                ->get();

            return $this->sendResponse($scos, 'SCORM SCOs retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving SCORM SCOs', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get user SCO tracking data.
     *
     * @param int $scormId
     * @param int $userId
     * @param Request $request
     * @return JsonResponse
     */
    public function userTracking(int $scormId, int $userId, Request $request): JsonResponse
    {
        try {
            $attempt = $request->input('attempt', 1);

            $tracking = DB::table('scorm_element as se')
                ->join('scorm_scoes as ss', 'se.scoid', '=', 'ss.id')
                ->where('ss.scorm', $scormId)
                ->where('se.userid', $userId)
                ->where('se.attempt', $attempt)
                ->select(
                    'se.id',
                    'se.scoid',
                    'ss.title as sco_title',
                    'se.element',
                    'se.value',
                    'se.timemodified'
                )
                ->orderBy('se.scoid', 'asc')
                ->orderBy('se.element', 'asc')
                ->get();

            return $this->sendResponse($tracking, 'User tracking data retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving user tracking data', ['error' => $e->getMessage()]);
        }
    }
}
