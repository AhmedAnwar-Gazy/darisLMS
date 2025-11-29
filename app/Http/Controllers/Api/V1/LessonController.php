<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LessonController extends BaseController
{
    protected $table = 'lesson';

    /**
     * Display a listing of lessons.
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
                ->join('course', 'lesson.course', '=', 'course.id')
                ->select(
                    'lesson.id',
                    'lesson.course',
                    'course.fullname as course_name',
                    'lesson.name',
                    'lesson.intro',
                    'lesson.practice',
                    'lesson.modattempts',
                    'lesson.available',
                    'lesson.deadline',
                    'lesson.timecreated',
                    'lesson.timemodified'
                );

            if ($courseId) {
                $query->where('lesson.course', $courseId);
            }

            $lessons = $query->orderBy('lesson.timecreated', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($lessons, 'Lessons retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving lessons', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created lesson.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'course' => 'required|integer|exists:course,id',
                'name' => 'required|string|max:255',
                'intro' => 'string',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['course', 'name', 'intro']);
            $data['introformat'] = $request->input('introformat', 1);
            $data['practice'] = $request->input('practice', 0);
            $data['modattempts'] = $request->input('modattempts', 0);
            $data['usepassword'] = $request->input('usepassword', 0);
            $data['password'] = $request->input('password', '');
            $data['dependency'] = $request->input('dependency', 0);
            $data['ongoing'] = $request->input('ongoing', 0);
            $data['usemaxgrade'] = $request->input('usemaxgrade', 0);
            $data['maxanswers'] = $request->input('maxanswers', 4);
            $data['maxattempts'] = $request->input('maxattempts', 5);
            $data['retake'] = $request->input('retake', 1);
            $data['activitylink'] = $request->input('activitylink', 0);
            $data['mediafile'] = $request->input('mediafile', '');
            $data['mediaheight'] = $request->input('mediaheight', 480);
            $data['mediawidth'] = $request->input('mediawidth', 640);
            $data['timecreated'] = time();
            $data['timemodified'] = time();

            $lessonId = DB::table($this->table)->insertGetId($data);
            $lesson = DB::table($this->table)->where('id', $lessonId)->first();

            return $this->sendResponse($lesson, 'Lesson created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating lesson', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified lesson.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $lesson = DB::table($this->table)
                ->join('course', 'lesson.course', '=', 'course.id')
                ->where('lesson.id', $id)
                ->select('lesson.*', 'course.fullname as course_name')
                ->first();

            if (!$lesson) {
                return $this->sendNotFoundResponse('Lesson not found');
            }

            return $this->sendResponse($lesson, 'Lesson retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving lesson', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified lesson.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $lesson = DB::table($this->table)->where('id', $id)->first();

            if (!$lesson) {
                return $this->sendNotFoundResponse('Lesson not found');
            }

            $validator = Validator::make($request->all(), [
                'name' => 'string|max:255',
                'intro' => 'string',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['name', 'intro', 'practice', 'modattempts', 'maxattempts', 'retake']);
            $data['timemodified'] = time();

            DB::table($this->table)->where('id', $id)->update($data);
            $updatedLesson = DB::table($this->table)->where('id', $id)->first();

            return $this->sendResponse($updatedLesson, 'Lesson updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating lesson', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified lesson.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $lesson = DB::table($this->table)->where('id', $id)->first();

            if (!$lesson) {
                return $this->sendNotFoundResponse('Lesson not found');
            }

            DB::table($this->table)->where('id', $id)->delete();

            return $this->sendResponse([], 'Lesson deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting lesson', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get lesson pages.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function pages(int $id): JsonResponse
    {
        try {
            $pages = DB::table('lesson_pages')
                ->where('lessonid', $id)
                ->select('id', 'lessonid', 'prevpageid', 'nextpageid', 'qtype', 'qoption', 'layout', 'display', 'timecreated', 'timemodified', 'title', 'contents', 'contentsformat')
                ->orderBy('prevpageid', 'asc')
                ->get();

            return $this->sendResponse($pages, 'Lesson pages retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving lesson pages', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get lesson attempts.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function attempts(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $attempts = DB::table('lesson_attempts as la')
                ->join('users as u', 'la.userid', '=', 'u.id')
                ->join('lesson_pages as lp', 'la.pageid', '=', 'lp.id')
                ->where('la.lessonid', $id)
                ->where('u.deleted', 0)
                ->select(
                    'la.id',
                    'la.userid',
                    'u.firstname',
                    'u.lastname',
                    'la.pageid',
                    'lp.title as page_title',
                    'la.answerid',
                    'la.retry',
                    'la.correct',
                    'la.useranswer',
                    'la.timeseen'
                )
                ->orderBy('la.timeseen', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($attempts, 'Lesson attempts retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving lesson attempts', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get lesson grades.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function grades(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $grades = DB::table('lesson_grades as lg')
                ->join('users as u', 'lg.userid', '=', 'u.id')
                ->where('lg.lessonid', $id)
                ->where('u.deleted', 0)
                ->select(
                    'lg.id',
                    'lg.userid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'lg.grade',
                    'lg.late',
                    'lg.completed'
                )
                ->orderBy('lg.completed', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($grades, 'Lesson grades retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving lesson grades', ['error' => $e->getMessage()]);
        }
    }
}
