<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WorkshopController extends BaseController
{
    protected $table = 'workshop';

    /**
     * Display a listing of workshops.
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
                ->join('course', 'workshop.course', '=', 'course.id')
                ->select(
                    'workshop.id',
                    'workshop.course',
                    'course.fullname as course_name',
                    'workshop.name',
                    'workshop.intro',
                    'workshop.phase',
                    'workshop.grade',
                    'workshop.gradinggrade',
                    'workshop.strategy',
                    'workshop.timecreated',
                    'workshop.timemodified'
                );

            if ($courseId) {
                $query->where('workshop.course', $courseId);
            }

            $workshops = $query->orderBy('workshop.timecreated', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($workshops, 'Workshops retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving workshops', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified workshop.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $workshop = DB::table($this->table)
                ->join('course', 'workshop.course', '=', 'course.id')
                ->where('workshop.id', $id)
                ->select('workshop.*', 'course.fullname as course_name')
                ->first();

            if (!$workshop) {
                return $this->sendNotFoundResponse('Workshop not found');
            }

            return $this->sendResponse($workshop, 'Workshop retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving workshop', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get workshop submissions.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function submissions(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $submissions = DB::table('workshop_submissions as ws')
                ->join('users as u', 'ws.authorid', '=', 'u.id')
                ->where('ws.workshopid', $id)
                ->where('u.deleted', 0)
                ->select(
                    'ws.id',
                    'ws.workshopid',
                    'ws.authorid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'ws.title',
                    'ws.content',
                    'ws.grade',
                    'ws.gradeover',
                    'ws.published',
                    'ws.timecreated',
                    'ws.timemodified'
                )
                ->orderBy('ws.timecreated', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($submissions, 'Workshop submissions retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving workshop submissions', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get workshop assessments.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function assessments(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $assessments = DB::table('workshop_assessments as wa')
                ->join('workshop_submissions as ws', 'wa.submissionid', '=', 'ws.id')
                ->join('users as reviewer', 'wa.reviewerid', '=', 'reviewer.id')
                ->join('users as author', 'ws.authorid', '=', 'author.id')
                ->where('ws.workshopid', $id)
                ->where('reviewer.deleted', 0)
                ->where('author.deleted', 0)
                ->select(
                    'wa.id',
                    'wa.submissionid',
                    'ws.title as submission_title',
                    'wa.reviewerid',
                    'reviewer.firstname as reviewer_firstname',
                    'reviewer.lastname as reviewer_lastname',
                    'author.firstname as author_firstname',
                    'author.lastname as author_lastname',
                    'wa.weight',
                    'wa.grade',
                    'wa.gradinggrade',
                    'wa.gradinggradeover',
                    'wa.feedbackauthor',
                    'wa.timecreated',
                    'wa.timemodified'
                )
                ->orderBy('wa.timecreated', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($assessments, 'Workshop assessments retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving workshop assessments', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get workshop aggregations (final grades).
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function aggregations(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $aggregations = DB::table('workshop_aggregations as wa')
                ->join('users as u', 'wa.userid', '=', 'u.id')
                ->where('wa.workshopid', $id)
                ->where('u.deleted', 0)
                ->select(
                    'wa.id',
                    'wa.userid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'wa.gradinggrade',
                    'wa.timegraded'
                )
                ->orderBy('wa.timegraded', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($aggregations, 'Workshop aggregations retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving workshop aggregations', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get assessment grades for a submission.
     *
     * @param int $submissionId
     * @return JsonResponse
     */
    public function submissionGrades(int $submissionId): JsonResponse
    {
        try {
            $grades = DB::table('workshop_grades as wg')
                ->join('workshop_assessments as wa', 'wg.assessmentid', '=', 'wa.id')
                ->join('users as u', 'wa.reviewerid', '=', 'u.id')
                ->where('wa.submissionid', $submissionId)
                ->where('u.deleted', 0)
                ->select(
                    'wg.id',
                    'wg.assessmentid',
                    'wg.strategy',
                    'wg.dimensionid',
                    'wg.grade',
                    'wg.peercomment',
                    'u.firstname as reviewer_firstname',
                    'u.lastname as reviewer_lastname'
                )
                ->get();

            return $this->sendResponse($grades, 'Submission grades retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving submission grades', ['error' => $e->getMessage()]);
        }
    }
}
