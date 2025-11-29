<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CourseCategoryController extends BaseController
{
    protected $table = 'course_categories';

    /**
     * Display a listing of course categories.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $parentId = $request->input('parent_id');
            
            $query = DB::table($this->table)
                ->select('id', 'name', 'idnumber', 'description', 'descriptionformat', 'parent', 'sortorder', 'coursecount', 'visible', 'timemodified');

            if ($parentId !== null) {
                $query->where('parent', $parentId);
            }

            $categories = $query->orderBy('sortorder', 'asc')->paginate($perPage);

            return $this->sendPaginatedResponse($categories, 'Course categories retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving course categories', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created course category.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'idnumber' => 'nullable|string|max:100|unique:course_categories,idnumber',
                'description' => 'nullable|string',
                'parent' => 'integer|exists:course_categories,id',
                'visible' => 'boolean',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['name', 'idnumber', 'description', 'parent']);
            $data['descriptionformat'] = $request->input('descriptionformat', 1);
            $data['parent'] = $request->input('parent', 0);
            $data['sortorder'] = $request->input('sortorder', 0);
            $data['coursecount'] = 0;
            $data['visible'] = $request->input('visible', 1);
            $data['visibleold'] = $request->input('visible', 1);
            $data['timemodified'] = time();
            $data['depth'] = 1; // This should be calculated based on parent
            $data['path'] = ''; // This should be calculated based on parent

            $categoryId = DB::table($this->table)->insertGetId($data);
            
            // Update path and depth
            if ($data['parent'] == 0) {
                $path = '/' . $categoryId;
                $depth = 1;
            } else {
                $parent = DB::table($this->table)->where('id', $data['parent'])->first();
                $path = $parent->path . '/' . $categoryId;
                $depth = $parent->depth + 1;
            }
            
            DB::table($this->table)->where('id', $categoryId)->update([
                'path' => $path,
                'depth' => $depth
            ]);

            $category = DB::table($this->table)->where('id', $categoryId)->first();

            return $this->sendResponse($category, 'Course category created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating course category', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified course category.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $category = DB::table($this->table)->where('id', $id)->first();

            if (!$category) {
                return $this->sendNotFoundResponse('Course category not found');
            }

            return $this->sendResponse($category, 'Course category retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving course category', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified course category.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $category = DB::table($this->table)->where('id', $id)->first();

            if (!$category) {
                return $this->sendNotFoundResponse('Course category not found');
            }

            $validator = Validator::make($request->all(), [
                'name' => 'string|max:255',
                'idnumber' => 'nullable|string|max:100|unique:course_categories,idnumber,' . $id,
                'description' => 'nullable|string',
                'visible' => 'boolean',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['name', 'idnumber', 'description', 'visible', 'sortorder']);
            $data['timemodified'] = time();

            DB::table($this->table)->where('id', $id)->update($data);
            $updatedCategory = DB::table($this->table)->where('id', $id)->first();

            return $this->sendResponse($updatedCategory, 'Course category updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating course category', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified course category.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $category = DB::table($this->table)->where('id', $id)->first();

            if (!$category) {
                return $this->sendNotFoundResponse('Course category not found');
            }

            // Check if category has courses
            $courseCount = DB::table('course')->where('category', $id)->count();
            if ($courseCount > 0) {
                return $this->sendError('Cannot delete category with courses', [], 409);
            }

            // Check if category has child categories
            $childCount = DB::table($this->table)->where('parent', $id)->count();
            if ($childCount > 0) {
                return $this->sendError('Cannot delete category with child categories', [], 409);
            }

            DB::table($this->table)->where('id', $id)->delete();

            return $this->sendResponse([], 'Course category deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting course category', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get courses in a category.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function courses(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $courses = DB::table('course')
                ->where('category', $id)
                ->select('id', 'fullname', 'shortname', 'idnumber', 'summary', 'format', 'visible', 'startdate', 'enddate', 'timecreated')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($courses, 'Category courses retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving category courses', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get category tree (hierarchical structure).
     *
     * @return JsonResponse
     */
    public function tree(): JsonResponse
    {
        try {
            $categories = DB::table($this->table)
                ->select('id', 'name', 'parent', 'sortorder', 'coursecount', 'visible')
                ->orderBy('sortorder', 'asc')
                ->get();

            // Build tree structure
            $tree = $this->buildTree($categories);

            return $this->sendResponse($tree, 'Category tree retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving category tree', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Build hierarchical tree from flat array.
     *
     * @param \Illuminate\Support\Collection $categories
     * @param int $parentId
     * @return array
     */
    private function buildTree($categories, $parentId = 0): array
    {
        $branch = [];

        foreach ($categories as $category) {
            if ($category->parent == $parentId) {
                $children = $this->buildTree($categories, $category->id);
                $item = (array) $category;
                if ($children) {
                    $item['children'] = $children;
                }
                $branch[] = $item;
            }
        }

        return $branch;
    }
}
