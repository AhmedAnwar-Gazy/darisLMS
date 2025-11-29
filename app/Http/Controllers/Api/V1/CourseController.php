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
}
