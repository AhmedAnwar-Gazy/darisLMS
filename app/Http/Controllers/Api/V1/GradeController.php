<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GradeController extends BaseController
{
    protected $gradeItemsTable = 'grade_items';
    protected $gradeGradesTable = 'grade_grades';

    /**
     * Display grade items for a course.
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

            $gradeItems = DB::table($this->gradeItemsTable)
                ->where('courseid', $courseId)
                ->select('id', 'courseid', 'categoryid', 'itemname', 'itemtype', 'itemmodule', 'iteminstance', 'itemnumber', 'grademax', 'grademin', 'gradepass', 'timecreated', 'timemodified')
                ->orderBy('sortorder', 'asc')
                ->get();

            return $this->sendResponse($gradeItems, 'Grade items retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving grade items', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get grades for a specific grade item.
     *
     * @param int $gradeItemId
     * @param Request $request
     * @return JsonResponse
     */
    public function gradesForItem(int $gradeItemId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $grades = DB::table($this->gradeGradesTable . ' as gg')
                ->join('users as u', 'gg.userid', '=', 'u.id')
                ->where('gg.itemid', $gradeItemId)
                ->where('u.deleted', 0)
                ->select(
                    'gg.id',
                    'gg.userid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'gg.rawgrade',
                    'gg.finalgrade',
                    'gg.rawgrademax',
                    'gg.rawgrademin',
                    'gg.feedback',
                    'gg.feedbackformat',
                    'gg.timecreated',
                    'gg.timemodified'
                )
                ->paginate($perPage);

            return $this->sendPaginatedResponse($grades, 'Grades retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving grades', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get all grades for a user in a course.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function userGrades(Request $request): JsonResponse
    {
        try {
            $userId = $request->input('user_id');
            $courseId = $request->input('course_id');

            if (!$userId || !$courseId) {
                return $this->sendError('User ID and Course ID are required', [], 400);
            }

            $grades = DB::table($this->gradeGradesTable . ' as gg')
                ->join($this->gradeItemsTable . ' as gi', 'gg.itemid', '=', 'gi.id')
                ->where('gi.courseid', $courseId)
                ->where('gg.userid', $userId)
                ->select(
                    'gi.id as item_id',
                    'gi.itemname',
                    'gi.itemtype',
                    'gi.itemmodule',
                    'gi.grademax',
                    'gi.grademin',
                    'gi.gradepass',
                    'gg.id as grade_id',
                    'gg.rawgrade',
                    'gg.finalgrade',
                    'gg.feedback',
                    'gg.timecreated',
                    'gg.timemodified'
                )
                ->orderBy('gi.sortorder', 'asc')
                ->get();

            return $this->sendResponse($grades, 'User grades retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving user grades', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update a grade.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function updateGrade(Request $request, int $id): JsonResponse
    {
        try {
            $grade = DB::table($this->gradeGradesTable)->where('id', $id)->first();

            if (!$grade) {
                return $this->sendNotFoundResponse('Grade not found');
            }

            $validator = Validator::make($request->all(), [
                'rawgrade' => 'nullable|numeric',
                'finalgrade' => 'nullable|numeric',
                'feedback' => 'nullable|string',
                'feedbackformat' => 'integer',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['rawgrade', 'finalgrade', 'feedback', 'feedbackformat']);
            $data['timemodified'] = time();
            $data['usermodified'] = $request->input('modifier_id', 0);

            DB::table($this->gradeGradesTable)->where('id', $id)->update($data);
            $updatedGrade = DB::table($this->gradeGradesTable)->where('id', $id)->first();

            return $this->sendResponse($updatedGrade, 'Grade updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating grade', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Create a new grade.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createGrade(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'itemid' => 'required|integer|exists:grade_items,id',
                'userid' => 'required|integer|exists:users,id',
                'rawgrade' => 'nullable|numeric',
                'finalgrade' => 'nullable|numeric',
                'feedback' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            // Check if grade already exists
            $existing = DB::table($this->gradeGradesTable)
                ->where('itemid', $request->itemid)
                ->where('userid', $request->userid)
                ->first();

            if ($existing) {
                return $this->sendError('Grade already exists for this user and item', [], 409);
            }

            $data = $request->only(['itemid', 'userid', 'rawgrade', 'finalgrade', 'feedback']);
            $data['feedbackformat'] = $request->input('feedbackformat', 1);
            $data['timecreated'] = time();
            $data['timemodified'] = time();
            $data['usermodified'] = $request->input('modifier_id', 0);

            // Get grade item to set min/max
            $gradeItem = DB::table($this->gradeItemsTable)->where('id', $request->itemid)->first();
            $data['rawgrademax'] = $gradeItem->grademax;
            $data['rawgrademin'] = $gradeItem->grademin;

            $gradeId = DB::table($this->gradeGradesTable)->insertGetId($data);
            $grade = DB::table($this->gradeGradesTable)->where('id', $gradeId)->first();

            return $this->sendResponse($grade, 'Grade created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating grade', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get course gradebook summary.
     *
     * @param int $courseId
     * @return JsonResponse
     */
    public function courseSummary(int $courseId): JsonResponse
    {
        try {
            $summary = DB::table($this->gradeItemsTable . ' as gi')
                ->leftJoin($this->gradeGradesTable . ' as gg', 'gi.id', '=', 'gg.itemid')
                ->where('gi.courseid', $courseId)
                ->select(
                    'gi.id',
                    'gi.itemname',
                    'gi.itemtype',
                    'gi.grademax',
                    DB::raw('COUNT(gg.id) as total_grades'),
                    DB::raw('AVG(gg.finalgrade) as average_grade'),
                    DB::raw('MAX(gg.finalgrade) as highest_grade'),
                    DB::raw('MIN(gg.finalgrade) as lowest_grade')
                )
                ->groupBy('gi.id', 'gi.itemname', 'gi.itemtype', 'gi.grademax')
                ->orderBy('gi.sortorder', 'asc')
                ->get();

            return $this->sendResponse($summary, 'Course gradebook summary retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving course gradebook summary', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get grade categories for a course.
     *
     * @param int $courseId
     * @return JsonResponse
     */
    public function categories(int $courseId): JsonResponse
    {
        try {
            $categories = DB::table('grade_categories')
                ->where('courseid', $courseId)
                ->select('id', 'courseid', 'parent', 'depth', 'path', 'fullname', 'aggregation', 'keephigh', 'droplow', 'aggregateonlygraded', 'timecreated', 'timemodified')
                ->orderBy('depth', 'asc')
                ->get();

            return $this->sendResponse($categories, 'Grade categories retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving grade categories', ['error' => $e->getMessage()]);
        }
    }
}
