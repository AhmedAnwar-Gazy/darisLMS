<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AssignmentController extends BaseController
{
    protected $table = 'assign';

    /**
     * Display a listing of assignments.
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
                ->join('course', 'assign.course', '=', 'course.id')
                ->select(
                    'assign.id',
                    'assign.course',
                    'course.fullname as course_name',
                    'assign.name',
                    'assign.intro',
                    'assign.grade',
                    'assign.duedate',
                    'assign.allowsubmissionsfromdate',
                    'assign.cutoffdate',
                    'assign.teamsubmission',
                    'assign.timecreated',
                    'assign.timemodified'
                );

            if ($courseId) {
                $query->where('assign.course', $courseId);
            }

            $assignments = $query->orderBy('assign.timecreated', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($assignments, 'Assignments retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving assignments', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created assignment.
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
                'introformat' => 'integer',
                'grade' => 'required|integer',
                'duedate' => 'integer',
                'allowsubmissionsfromdate' => 'integer',
                'cutoffdate' => 'integer',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['course', 'name', 'intro', 'grade']);
            $data['introformat'] = $request->input('introformat', 1);
            $data['alwaysshowdescription'] = $request->input('alwaysshowdescription', 1);
            $data['nosubmissions'] = $request->input('nosubmissions', 0);
            $data['submissiondrafts'] = $request->input('submissiondrafts', 0);
            $data['sendnotifications'] = $request->input('sendnotifications', 1);
            $data['sendlatenotifications'] = $request->input('sendlatenotifications', 1);
            $data['duedate'] = $request->input('duedate', 0);
            $data['allowsubmissionsfromdate'] = $request->input('allowsubmissionsfromdate', 0);
            $data['cutoffdate'] = $request->input('cutoffdate', 0);
            $data['gradingduedate'] = $request->input('gradingduedate', 0);
            $data['teamsubmission'] = $request->input('teamsubmission', 0);
            $data['requireallteammemberssubmit'] = $request->input('requireallteammemberssubmit', 0);
            $data['blindmarking'] = $request->input('blindmarking', 0);
            $data['hidegrader'] = $request->input('hidegrader', 0);
            $data['attemptreopenmethod'] = $request->input('attemptreopenmethod', 'none');
            $data['maxattempts'] = $request->input('maxattempts', -1);
            $data['markingworkflow'] = $request->input('markingworkflow', 0);
            $data['markingallocation'] = $request->input('markingallocation', 0);
            $data['timecreated'] = time();
            $data['timemodified'] = time();

            $assignmentId = DB::table($this->table)->insertGetId($data);
            $assignment = DB::table($this->table)->where('id', $assignmentId)->first();

            return $this->sendResponse($assignment, 'Assignment created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating assignment', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified assignment.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $assignment = DB::table($this->table)
                ->join('course', 'assign.course', '=', 'course.id')
                ->where('assign.id', $id)
                ->select('assign.*', 'course.fullname as course_name', 'course.shortname as course_shortname')
                ->first();

            if (!$assignment) {
                return $this->sendNotFoundResponse('Assignment not found');
            }

            return $this->sendResponse($assignment, 'Assignment retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving assignment', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified assignment.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $assignment = DB::table($this->table)->where('id', $id)->first();

            if (!$assignment) {
                return $this->sendNotFoundResponse('Assignment not found');
            }

            $validator = Validator::make($request->all(), [
                'name' => 'string|max:255',
                'intro' => 'string',
                'grade' => 'integer',
                'duedate' => 'integer',
                'allowsubmissionsfromdate' => 'integer',
                'cutoffdate' => 'integer',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['name', 'intro', 'grade', 'duedate', 'allowsubmissionsfromdate', 'cutoffdate', 'teamsubmission', 'blindmarking']);
            $data['timemodified'] = time();

            DB::table($this->table)->where('id', $id)->update($data);
            $updatedAssignment = DB::table($this->table)->where('id', $id)->first();

            return $this->sendResponse($updatedAssignment, 'Assignment updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating assignment', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified assignment.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $assignment = DB::table($this->table)->where('id', $id)->first();

            if (!$assignment) {
                return $this->sendNotFoundResponse('Assignment not found');
            }

            DB::table($this->table)->where('id', $id)->delete();

            return $this->sendResponse([], 'Assignment deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting assignment', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get assignment submissions.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function submissions(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $submissions = DB::table('assign_submission as asub')
                ->join('users as u', 'asub.userid', '=', 'u.id')
                ->leftJoin('assign_grades as ag', function($join) use ($id) {
                    $join->on('asub.assignment', '=', 'ag.assignment')
                         ->on('asub.userid', '=', 'ag.userid')
                         ->on('asub.attemptnumber', '=', 'ag.attemptnumber');
                })
                ->where('asub.assignment', $id)
                ->where('asub.latest', 1)
                ->where('u.deleted', 0)
                ->select(
                    'asub.id',
                    'asub.userid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'asub.status',
                    'asub.timecreated',
                    'asub.timemodified',
                    'asub.attemptnumber',
                    'ag.grade',
                    'ag.grader'
                )
                ->paginate($perPage);

            return $this->sendPaginatedResponse($submissions, 'Assignment submissions retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving assignment submissions', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get assignment grades.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function grades(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $grades = DB::table('assign_grades as ag')
                ->join('users as u', 'ag.userid', '=', 'u.id')
                ->leftJoin('users as grader', 'ag.grader', '=', 'grader.id')
                ->where('ag.assignment', $id)
                ->where('u.deleted', 0)
                ->select(
                    'ag.id',
                    'ag.userid',
                    'u.firstname as student_firstname',
                    'u.lastname as student_lastname',
                    'ag.grade',
                    'ag.grader',
                    'grader.firstname as grader_firstname',
                    'grader.lastname as grader_lastname',
                    'ag.timecreated',
                    'ag.timemodified',
                    'ag.attemptnumber'
                )
                ->paginate($perPage);

            return $this->sendPaginatedResponse($grades, 'Assignment grades retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving assignment grades', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get assignment statistics.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function stats(int $id): JsonResponse
    {
        try {
            $assignment = DB::table($this->table)->where('id', $id)->first();

            if (!$assignment) {
                return $this->sendNotFoundResponse('Assignment not found');
            }

            // Get submission stats
            $submissionStats = DB::table('assign_submission as s')
                ->where('s.assignment', $id)
                ->where('s.latest', 1)
                ->selectRaw('
                    COUNT(*) as total_submissions,
                    SUM(CASE WHEN s.status = "submitted" THEN 1 ELSE 0 END) as submitted,
                    SUM(CASE WHEN s.status = "draft" THEN 1 ELSE 0 END) as drafts,
                    SUM(CASE WHEN s.timemodified > ' . ($assignment->duedate ?: time()) . ' AND s.status = "submitted" THEN 1 ELSE 0 END) as late_submissions
                ')
                ->first();

            // Get grading stats
            $gradingStats = DB::table('assign_grades as g')
                ->where('g.assignment', $id)
                ->selectRaw('
                    COUNT(*) as total_grades,
                    SUM(CASE WHEN g.grade IS NOT NULL THEN 1 ELSE 0 END) as graded,
                    AVG(g.grade) as average_grade,
                    MAX(g.grade) as highest_grade,
                    MIN(g.grade) as lowest_grade
                ')
                ->first();

            return $this->sendResponse([
                'assignment' => $assignment,
                'submissions' => $submissionStats,
                'grading' => $gradingStats
            ], 'Assignment statistics retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving assignment statistics', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get late submissions.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function lateSubmissions(int $id, Request $request): JsonResponse
    {
        try {
            $assignment = DB::table($this->table)->where('id', $id)->first();

            if (!$assignment) {
                return $this->sendNotFoundResponse('Assignment not found');
            }

            if (!$assignment->duedate) {
                return $this->sendResponse([], 'Assignment has no due date');
            }

            $perPage = $request->input('per_page', 15);

            $lateSubmissions = DB::table('assign_submission as s')
                ->join('users as u', 's.userid', '=', 'u.id')
                ->where('s.assignment', $id)
                ->where('s.latest', 1)
                ->where('s.status', 'submitted')
                ->where('s.timemodified', '>', $assignment->duedate)
                ->where('u.deleted', 0)
                ->select(
                    's.id',
                    's.userid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    's.timemodified',
                    DB::raw('(' . $assignment->duedate . ') as due_date'),
                    DB::raw('(s.timemodified - ' . $assignment->duedate . ') as seconds_late')
                )
                ->orderBy('s.timemodified', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($lateSubmissions, 'Late submissions retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving late submissions', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get ungraded submissions.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function ungradedSubmissions(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $ungraded = DB::table('assign_submission as s')
                ->join('users as u', 's.userid', '=', 'u.id')
                ->leftJoin('assign_grades as g', function($join) {
                    $join->on('s.assignment', '=', 'g.assignment')
                         ->on('s.userid', '=', 'g.userid');
                })
                ->where('s.assignment', $id)
                ->where('s.latest', 1)
                ->where('s.status', 'submitted')
                ->where(function($query) {
                    $query->whereNull('g.grade')
                          ->orWhere('g.grade', -1);
                })
                ->where('u.deleted', 0)
                ->select(
                    's.id',
                    's.userid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    's.timemodified as submission_time'
                )
                ->orderBy('s.timemodified', 'asc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($ungraded, 'Ungraded submissions retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving ungraded submissions', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Bulk grade assignments.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function bulkGrade(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'assignment_id' => 'required|integer|exists:assign,id',
                'grades' => 'required|array',
                'grades.*.userid' => 'required|integer|exists:users,id',
                'grades.*.grade' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $updated = 0;
            $created = 0;

            foreach ($request->grades as $gradeData) {
                $existing = DB::table('assign_grades')
                    ->where('assignment', $request->assignment_id)
                    ->where('userid', $gradeData['userid'])
                    ->first();

                $data = [
                    'assignment' => $request->assignment_id,
                    'userid' => $gradeData['userid'],
                    'grade' => $gradeData['grade'],
                    'grader' => $request->input('grader_id', 0),
                    'timemodified' => time(),
                ];

                if ($existing) {
                    DB::table('assign_grades')
                        ->where('id', $existing->id)
                        ->update($data);
                    $updated++;
                } else {
                    $data['timecreated'] = time();
                    DB::table('assign_grades')->insert($data);
                    $created++;
                }
            }

            return $this->sendResponse([
                'updated' => $updated,
                'created' => $created,
                'total' => count($request->grades)
            ], "Bulk grading completed: {$created} created, {$updated} updated");
        } catch (\Exception $e) {
            return $this->sendError('Error bulk grading assignments', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Export assignment submissions to CSV.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function exportSubmissionsCsv(int $id): JsonResponse
    {
        try {
            $submissions = DB::table('assign_submission as s')
                ->join('users as u', 's.userid', '=', 'u.id')
                ->leftJoin('assign_grades as g', function($join) {
                    $join->on('s.assignment', '=', 'g.assignment')
                         ->on('s.userid', '=', 'g.userid');
                })
                ->where('s.assignment', $id)
                ->where('s.latest', 1)
                ->where('u.deleted', 0)
                ->select(
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    's.status',
                    's.timemodified as submission_time',
                    'g.grade',
                    'g.timemodified as grade_time'
                )
                ->orderBy('u.lastname', 'asc')
                ->get();

            $filename = 'assignment_' . $id . '_submissions_' . time() . '.csv';
            $filepath = storage_path('app/public/exports/' . $filename);
            
            if (!file_exists(dirname($filepath))) {
                mkdir(dirname($filepath), 0755, true);
            }

            $file = fopen($filepath, 'w');
            fputcsv($file, ['First Name', 'Last Name', 'Email', 'Status', 'Submission Time', 'Grade', 'Grade Time']);
            
            foreach ($submissions as $submission) {
                fputcsv($file, (array) $submission);
            }
            
            fclose($file);

            return $this->sendResponse([
                'filename' => $filename,
                'path' => 'storage/exports/' . $filename,
                'url' => url('storage/exports/' . $filename),
                'count' => count($submissions)
            ], 'Assignment submissions exported to CSV successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error exporting assignment submissions to CSV', ['error' => $e->getMessage()]);
        }
    }
}
