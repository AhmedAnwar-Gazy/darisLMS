<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CourseController extends BaseController
{
    protected $table = 'course';

    /**
     * Display a listing of courses.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $category = $request->input('category');
            
            $query = DB::table($this->table)
                ->select('id', 'category', 'fullname', 'shortname', 'idnumber', 'summary', 'summaryformat', 'format', 'visible', 'startdate', 'enddate', 'timecreated', 'timemodified')
                ->where('id', '>', 1); // Exclude site course

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('fullname', 'like', "%{$search}%")
                      ->orWhere('shortname', 'like', "%{$search}%")
                      ->orWhere('idnumber', 'like', "%{$search}%");
                });
            }

            if ($category) {
                $query->where('category', $category);
            }

            $courses = $query->orderBy('timecreated', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($courses, 'Courses retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving courses', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created course.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'fullname' => 'required|string|max:254',
                'shortname' => 'required|string|max:255|unique:course,shortname',
                'category' => 'required|integer|exists:course_categories,id',
                'summary' => 'nullable|string',
                'summaryformat' => 'integer',
                'format' => 'string|max:21',
                'visible' => 'boolean',
                'startdate' => 'integer',
                'enddate' => 'integer',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['fullname', 'shortname', 'category', 'summary', 'summaryformat']);
            $data['format'] = $request->input('format', 'topics');
            $data['visible'] = $request->input('visible', 1);
            $data['startdate'] = $request->input('startdate', time());
            $data['enddate'] = $request->input('enddate', 0);
            $data['timecreated'] = time();
            $data['timemodified'] = time();
            $data['sortorder'] = 0;
            $data['newsitems'] = 5;
            $data['showgrades'] = 1;
            $data['showreports'] = 0;
            $data['maxbytes'] = 0;
            $data['legacyfiles'] = 0;
            $data['enablecompletion'] = 0;
            $data['completionnotify'] = 0;

            $courseId = DB::table($this->table)->insertGetId($data);
            $course = DB::table($this->table)->where('id', $courseId)->first();

            return $this->sendResponse($course, 'Course created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating course', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified course.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $course = DB::table($this->table)->where('id', $id)->first();

            if (!$course) {
                return $this->sendNotFoundResponse('Course not found');
            }

            return $this->sendResponse($course, 'Course retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving course', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified course.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $course = DB::table($this->table)->where('id', $id)->first();

            if (!$course) {
                return $this->sendNotFoundResponse('Course not found');
            }

            $validator = Validator::make($request->all(), [
                'fullname' => 'string|max:254',
                'shortname' => 'string|max:255|unique:course,shortname,' . $id,
                'category' => 'integer|exists:course_categories,id',
                'summary' => 'nullable|string',
                'summaryformat' => 'integer',
                'format' => 'string|max:21',
                'visible' => 'boolean',
                'startdate' => 'integer',
                'enddate' => 'integer',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['fullname', 'shortname', 'category', 'summary', 'summaryformat', 'format', 'visible', 'startdate', 'enddate']);
            $data['timemodified'] = time();

            DB::table($this->table)->where('id', $id)->update($data);
            $updatedCourse = DB::table($this->table)->where('id', $id)->first();

            return $this->sendResponse($updatedCourse, 'Course updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating course', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified course.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            if ($id == 1) {
                return $this->sendError('Cannot delete site course', [], 403);
            }

            $course = DB::table($this->table)->where('id', $id)->first();

            if (!$course) {
                return $this->sendNotFoundResponse('Course not found');
            }

            // In a real implementation, you'd want to handle related data
            DB::table($this->table)->where('id', $id)->delete();

            return $this->sendResponse([], 'Course deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting course', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get course modules.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function modules(int $id): JsonResponse
    {
        try {
            $modules = DB::table('course_modules as cm')
                ->join('modules as m', 'cm.module', '=', 'm.id')
                ->join('course_sections as cs', 'cm.section', '=', 'cs.id')
                ->where('cm.course', $id)
                ->select('cm.id', 'cm.instance', 'cm.section', 'm.name as module_type', 'cm.visible', 'cm.added', 'cs.name as section_name', 'cs.section as section_number')
                ->orderBy('cs.section', 'asc')
                ->orderBy('cm.id', 'asc')
                ->get();

            return $this->sendResponse($modules, 'Course modules retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving course modules', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get enrolled users.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function enrolledUsers(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $users = DB::table('user_enrolments as ue')
                ->join('enrol as e', 'ue.enrolid', '=', 'e.id')
                ->join('users as u', 'ue.userid', '=', 'u.id')
                ->where('e.courseid', $id)
                ->where('u.deleted', 0)
                ->select('u.id', 'u.username', 'u.firstname', 'u.lastname', 'u.email', 'e.enrol as enrol_method', 'ue.status', 'ue.timecreated')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($users, 'Enrolled users retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving enrolled users', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Advanced search for courses.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $filters = $request->only(['fullname', 'shortname', 'category', 'visible', 'format', 'idnumber']);
            
            $query = DB::table($this->table)
                ->join('course_categories', 'course.category', '=', 'course_categories.id')
                ->select('course.*', 'course_categories.name as category_name');

            foreach ($filters as $field => $value) {
                if ($value !== null && $value !== '') {
                    if (in_array($field, ['fullname', 'shortname', 'idnumber'])) {
                        $query->where('course.' . $field, 'like', "%{$value}%");
                    } else {
                        $query->where('course.' . $field, $value);
                    }
                }
            }

            $courses = $query->paginate($perPage);

            return $this->sendPaginatedResponse($courses, 'Courses search completed successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error searching courses', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get course count.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function count(Request $request): JsonResponse
    {
        try {
            $categoryId = $request->input('category_id');
            $visible = $request->input('visible');
            
            $query = DB::table($this->table)->where('id', '!=', 1); // Exclude site course

            if ($categoryId) {
                $query->where('category', $categoryId);
            }

            if ($visible !== null) {
                $query->where('visible', $visible);
            }

            $count = $query->count();

            return $this->sendResponse(['count' => $count], 'Course count retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error counting courses', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Bulk delete courses.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function bulkDestroy(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'course_ids' => 'required|array',
                'course_ids.*' => 'integer|exists:course,id',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            // Prevent deletion of site course
            if (in_array(1, $request->course_ids)) {
                return $this->sendError('Cannot delete site course', [], 400);
            }

            $deleted = DB::table($this->table)
                ->whereIn('id', $request->course_ids)
                ->delete();

            return $this->sendResponse(['deleted_count' => $deleted], 'Courses deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error bulk deleting courses', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Publish/unpublish courses.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function publish(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'course_ids' => 'required|array',
                'course_ids.*' => 'integer|exists:course,id',
                'visible' => 'required|boolean',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $updated = DB::table($this->table)
                ->whereIn('id', $request->course_ids)
                ->update([
                    'visible' => $request->visible,
                    'timemodified' => time(),
                ]);

            $action = $request->visible ? 'published' : 'unpublished';
            return $this->sendResponse(['updated_count' => $updated], "Courses {$action} successfully");
        } catch (\Exception $e) {
            return $this->sendError('Error publishing/unpublishing courses', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get course statistics.
     *
     * @return JsonResponse
     */
    public function stats(): JsonResponse
    {
        try {
            $stats = DB::table($this->table)
                ->where('id', '!=', 1)
                ->selectRaw('
                    COUNT(*) as total,
                    SUM(CASE WHEN visible = 1 THEN 1 ELSE 0 END) as published,
                    SUM(CASE WHEN visible = 0 THEN 1 ELSE 0 END) as hidden,
                    COUNT(DISTINCT category) as categories_count
                ')
                ->first();

            // Get enrollment stats
            $enrollmentStats = DB::table('user_enrolments as ue')
                ->join('enrol as e', 'ue.enrolid', '=', 'e.id')
                ->selectRaw('
                    COUNT(DISTINCT e.courseid) as courses_with_enrollments,
                    COUNT(*) as total_enrollments,
                    SUM(CASE WHEN ue.status = 0 THEN 1 ELSE 0 END) as active_enrollments
                ')
                ->first();

            return $this->sendResponse([
                'courses' => $stats,
                'enrollments' => $enrollmentStats
            ], 'Course statistics retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving course statistics', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Clone a course.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function clone(Request $request, int $id): JsonResponse
    {
        try {
            $course = DB::table($this->table)->where('id', $id)->first();

            if (!$course) {
                return $this->sendNotFoundResponse('Course not found');
            }

            $validator = Validator::make($request->all(), [
                'fullname' => 'required|string|max:254',
                'shortname' => 'required|string|max:255|unique:course,shortname',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            // Clone course data
            $newCourse = (array) $course;
            unset($newCourse['id']);
            $newCourse['fullname'] = $request->fullname;
            $newCourse['shortname'] = $request->shortname;
            $newCourse['timecreated'] = time();
            $newCourse['timemodified'] = time();

            $newCourseId = DB::table($this->table)->insertGetId($newCourse);
            $clonedCourse = DB::table($this->table)->where('id', $newCourseId)->first();

            return $this->sendResponse($clonedCourse, 'Course cloned successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error cloning course', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get course summary/overview.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function summary(int $id): JsonResponse
    {
        try {
            $course = DB::table($this->table)->where('id', $id)->first();

            if (!$course) {
                return $this->sendNotFoundResponse('Course not found');
            }

            // Get enrollment count
            $enrollmentCount = DB::table('user_enrolments as ue')
                ->join('enrol as e', 'ue.enrolid', '=', 'e.id')
                ->where('e.courseid', $id)
                ->where('ue.status', 0)
                ->count();

            // Get module count
            $moduleCount = DB::table('course_modules')
                ->where('course', $id)
                ->count();

            // Get section count
            $sectionCount = DB::table('course_sections')
                ->where('course', $id)
                ->count();

            // Get assignment count
            $assignmentCount = DB::table('assign')->where('course', $id)->count();

            // Get quiz count
            $quizCount = DB::table('quiz')->where('course', $id)->count();

            return $this->sendResponse([
                'course' => $course,
                'statistics' => [
                    'enrollments' => $enrollmentCount,
                    'modules' => $moduleCount,
                    'sections' => $sectionCount,
                    'assignments' => $assignmentCount,
                    'quizzes' => $quizCount,
                ]
            ], 'Course summary retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving course summary', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Export courses to CSV.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportCsv(Request $request): JsonResponse
    {
        try {
            $courses = DB::table($this->table)
                ->join('course_categories', 'course.category', '=', 'course_categories.id')
                ->where('course.id', '!=', 1)
                ->select('course.id', 'course.fullname', 'course.shortname', 'course.idnumber', 'course_categories.name as category', 'course.visible', 'course.startdate', 'course.enddate', 'course.timecreated')
                ->get();

            $filename = 'courses_export_' . time() . '.csv';
            $filepath = storage_path('app/public/exports/' . $filename);
            
            if (!file_exists(dirname($filepath))) {
                mkdir(dirname($filepath), 0755, true);
            }

            $file = fopen($filepath, 'w');
            fputcsv($file, ['ID', 'Full Name', 'Short Name', 'ID Number', 'Category', 'Visible', 'Start Date', 'End Date', 'Created']);
            
            foreach ($courses as $course) {
                fputcsv($file, (array) $course);
            }
            
            fclose($file);

            return $this->sendResponse([
                'filename' => $filename,
                'path' => 'storage/exports/' . $filename,
                'url' => url('storage/exports/' . $filename),
                'count' => count($courses)
            ], 'Courses exported to CSV successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error exporting courses to CSV', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Export courses to JSON.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportJson(Request $request): JsonResponse
    {
        try {
            $courses = DB::table($this->table)
                ->join('course_categories', 'course.category', '=', 'course_categories.id')
                ->where('course.id', '!=', 1)
                ->select('course.id', 'course.fullname', 'course.shortname', 'course.idnumber', 'course_categories.name as category', 'course.visible', 'course.format', 'course.startdate', 'course.enddate', 'course.timecreated')
                ->get();

            $filename = 'courses_export_' . time() . '.json';
            $filepath = storage_path('app/public/exports/' . $filename);
            
            if (!file_exists(dirname($filepath))) {
                mkdir(dirname($filepath), 0755, true);
            }

            file_put_contents($filepath, json_encode($courses, JSON_PRETTY_PRINT));

            return $this->sendResponse([
                'filename' => $filename,
                'path' => 'storage/exports/' . $filename,
                'url' => url('storage/exports/' . $filename),
                'count' => count($courses)
            ], 'Courses exported to JSON successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error exporting courses to JSON', ['error' => $e->getMessage()]);
        }
    }
}
