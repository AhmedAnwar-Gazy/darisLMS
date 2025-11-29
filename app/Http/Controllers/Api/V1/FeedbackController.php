<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends BaseController
{
    protected $table = 'feedback';

    /**
     * Display a listing of feedback activities.
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
                ->join('course', 'feedback.course', '=', 'course.id')
                ->select(
                    'feedback.id',
                    'feedback.course',
                    'course.fullname as course_name',
                    'feedback.name',
                    'feedback.intro',
                    'feedback.anonymous',
                    'feedback.email_notification',
                    'feedback.multiple_submit',
                    'feedback.timeopen',
                    'feedback.timeclose',
                    'feedback.timecreated',
                    'feedback.timemodified'
                );

            if ($courseId) {
                $query->where('feedback.course', $courseId);
            }

            $feedbacks = $query->orderBy('feedback.timecreated', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($feedbacks, 'Feedback activities retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving feedback activities', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified feedback.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $feedback = DB::table($this->table)
                ->join('course', 'feedback.course', '=', 'course.id')
                ->where('feedback.id', $id)
                ->select('feedback.*', 'course.fullname as course_name')
                ->first();

            if (!$feedback) {
                return $this->sendNotFoundResponse('Feedback not found');
            }

            return $this->sendResponse($feedback, 'Feedback retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving feedback', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get feedback items (questions).
     *
     * @param int $id
     * @return JsonResponse
     */
    public function items(int $id): JsonResponse
    {
        try {
            $items = DB::table('feedback_item')
                ->where('feedback', $id)
                ->select('id', 'feedback', 'template', 'name', 'label', 'presentation', 'typ', 'hasvalue', 'position', 'required', 'dependitem', 'dependvalue')
                ->orderBy('position', 'asc')
                ->get();

            return $this->sendResponse($items, 'Feedback items retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving feedback items', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get feedback completions (responses).
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function completions(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $anonymous = $request->input('anonymous');

            $query = DB::table('feedback_completed as fc')
                ->leftJoin('users as u', 'fc.userid', '=', 'u.id')
                ->where('fc.feedback', $id)
                ->select(
                    'fc.id',
                    'fc.userid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'fc.timemodified',
                    'fc.random_response',
                    'fc.anonymous_response',
                    'fc.courseid'
                );

            // Filter anonymous responses if requested
            if ($anonymous !== null) {
                $query->where('fc.anonymous_response', $anonymous);
            }

            $completions = $query->orderBy('fc.timemodified', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($completions, 'Feedback completions retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving feedback completions', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get values for a specific completion.
     *
     * @param int $completionId
     * @return JsonResponse
     */
    public function completionValues(int $completionId): JsonResponse
    {
        try {
            $values = DB::table('feedback_value as fv')
                ->join('feedback_item as fi', 'fv.item', '=', 'fi.id')
                ->where('fv.completed', $completionId)
                ->select(
                    'fv.id',
                    'fv.item',
                    'fi.name as item_name',
                    'fi.typ as item_type',
                    'fv.value'
                )
                ->orderBy('fi.position', 'asc')
                ->get();

            return $this->sendResponse($values, 'Completion values retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving completion values', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get feedback analysis/statistics.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function analysis(int $id): JsonResponse
    {
        try {
            $analysis = DB::table('feedback_completed')
                ->where('feedback', $id)
                ->selectRaw('
                    COUNT(*) as total_responses,
                    COUNT(DISTINCT userid) as unique_users,
                    SUM(CASE WHEN anonymous_response = 1 THEN 1 ELSE 0 END) as anonymous_count,
                    MIN(timemodified) as first_response,
                    MAX(timemodified) as last_response
                ')
                ->first();

            return $this->sendResponse($analysis, 'Feedback analysis retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving feedback analysis', ['error' => $e->getMessage()]);
        }
    }
}
