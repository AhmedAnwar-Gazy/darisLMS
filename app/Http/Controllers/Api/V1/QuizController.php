<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuizController extends BaseController
{
    protected $table = 'quiz';

    /**
     * Display a listing of quizzes.
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
                ->join('course', 'quiz.course', '=', 'course.id')
                ->select(
                    'quiz.id',
                    'quiz.course',
                    'course.fullname as course_name',
                    'quiz.name',
                    'quiz.intro',
                    'quiz.timeopen',
                    'quiz.timeclose',
                    'quiz.timelimit',
                    'quiz.grade',
                    'quiz.attempts',
                    'quiz.timecreated',
                    'quiz.timemodified'
                );

            if ($courseId) {
                $query->where('quiz.course', $courseId);
            }

            $quizzes = $query->orderBy('quiz.timecreated', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($quizzes, 'Quizzes retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving quizzes', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created quiz.
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
                'intro' => 'required|string',
                'grade' => 'required|numeric',
                'timeopen' => 'integer',
                'timeclose' => 'integer',
                'timelimit' => 'integer',
                'attempts' => 'integer',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['course', 'name', 'intro', 'grade']);
            $data['introformat'] = $request->input('introformat', 1);
            $data['timeopen'] = $request->input('timeopen', 0);
            $data['timeclose'] = $request->input('timeclose', 0);
            $data['timelimit'] = $request->input('timelimit', 0);
            $data['overduehandling'] = $request->input('overduehandling', 'autosubmit');
            $data['graceperiod'] = $request->input('graceperiod', 0);
            $data['preferredbehaviour'] = $request->input('preferredbehaviour', 'deferredfeedback');
            $data['canredoquestions'] = $request->input('canredoquestions', 0);
            $data['attempts'] = $request->input('attempts', 0);
            $data['attemptonlast'] = $request->input('attemptonlast', 0);
            $data['grademethod'] = $request->input('grademethod', 1);
            $data['decimalpoints'] = $request->input('decimalpoints', 2);
            $data['questiondecimalpoints'] = $request->input('questiondecimalpoints', -1);
            $data['sumgrades'] = $request->input('sumgrades', 0);
            $data['timecreated'] = time();
            $data['timemodified'] = time();

            $quizId = DB::table($this->table)->insertGetId($data);
            $quiz = DB::table($this->table)->where('id', $quizId)->first();

            return $this->sendResponse($quiz, 'Quiz created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating quiz', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified quiz.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $quiz = DB::table($this->table)
                ->join('course', 'quiz.course', '=', 'course.id')
                ->where('quiz.id', $id)
                ->select('quiz.*', 'course.fullname as course_name', 'course.shortname as course_shortname')
                ->first();

            if (!$quiz) {
                return $this->sendNotFoundResponse('Quiz not found');
            }

            return $this->sendResponse($quiz, 'Quiz retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving quiz', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified quiz.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $quiz = DB::table($this->table)->where('id', $id)->first();

            if (!$quiz) {
                return $this->sendNotFoundResponse('Quiz not found');
            }

            $validator = Validator::make($request->all(), [
                'name' => 'string|max:255',
                'intro' => 'string',
                'grade' => 'numeric',
                'timeopen' => 'integer',
                'timeclose' => 'integer',
                'timelimit' => 'integer',
                'attempts' => 'integer',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['name', 'intro', 'grade', 'timeopen', 'timeclose', 'timelimit', 'attempts']);
            $data['timemodified'] = time();

            DB::table($this->table)->where('id', $id)->update($data);
            $updatedQuiz = DB::table($this->table)->where('id', $id)->first();

            return $this->sendResponse($updatedQuiz, 'Quiz updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating quiz', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified quiz.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $quiz = DB::table($this->table)->where('id', $id)->first();

            if (!$quiz) {
                return $this->sendNotFoundResponse('Quiz not found');
            }

            DB::table($this->table)->where('id', $id)->delete();

            return $this->sendResponse([], 'Quiz deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting quiz', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get quiz attempts.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function attempts(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $attempts = DB::table('quiz_attempts as qa')
                ->join('users as u', 'qa.userid', '=', 'u.id')
                ->where('qa.quiz', $id)
                ->where('u.deleted', 0)
                ->select(
                    'qa.id',
                    'qa.userid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'qa.attempt',
                    'qa.state',
                    'qa.timestart',
                    'qa.timefinish',
                    'qa.timemodified',
                    'qa.sumgrades'
                )
                ->orderBy('qa.timestart', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($attempts, 'Quiz attempts retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving quiz attempts', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get quiz grades.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function grades(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $grades = DB::table('quiz_grades as qg')
                ->join('users as u', 'qg.userid', '=', 'u.id')
                ->where('qg.quiz', $id)
                ->where('u.deleted', 0)
                ->select(
                    'qg.id',
                    'qg.userid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'qg.grade',
                    'qg.timemodified'
                )
                ->orderBy('qg.timemodified', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($grades, 'Quiz grades retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving quiz grades', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get quiz questions.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function questions(int $id): JsonResponse
    {
        try {
            $questions = DB::table('quiz_slots as qs')
                ->join('question_references as qr', function($join) {
                    $join->on('qs.id', '=', 'qr.itemid')
                         ->where('qr.component', '=', 'mod_quiz')
                         ->where('qr.questionarea', '=', 'slot');
                })
                ->join('question_bank_entries as qbe', 'qr.questionbankentryid', '=', 'qbe.id')
                ->join('question_versions as qv', 'qbe.id', '=', 'qv.questionbankentryid')
                ->join('question as q', 'qv.questionid', '=', 'q.id')
                ->where('qs.quizid', $id)
                ->select(
                    'qs.id as slot_id',
                    'qs.slot',
                    'qs.page',
                    'qs.maxmark',
                    'q.id as question_id',
                    'q.name as question_name',
                    'q.questiontext',
                    'q.qtype'
                )
                ->orderBy('qs.slot', 'asc')
                ->get();

            return $this->sendResponse($questions, 'Quiz questions retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving quiz questions', ['error' => $e->getMessage()]);
        }
    }
}
