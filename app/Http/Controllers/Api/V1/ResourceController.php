<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResourceController extends BaseController
{
    /**
     * Get resources (files/URLs/pages) for a course.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $courseId = $request->input('course_id');
            $type = $request->input('type'); // resource, url, page
            
            if (!$courseId) {
                return $this->sendError('Course ID is required', [], 400);
            }

            $resources = [];

            // Get resources (files)
            if (!$type || $type === 'resource') {
                $files = DB::table('resource')
                    ->where('course', $courseId)
                    ->select('id', 'course', 'name', 'intro', 'tobemigrated', 'legacyfiles', 'legacyfileslast', 'display', 'displayoptions', 'filterfiles', 'revision', 'timemodified')
                    ->get();
                $resources['files'] = $files;
            }

            // Get URLs
            if (!$type || $type === 'url') {
                $urls = DB::table('url')
                    ->where('course', $courseId)
                    ->select('id', 'course', 'name', 'intro', 'externalurl', 'display', 'displayoptions', 'parameters', 'timemodified')
                    ->get();
                $resources['urls'] = $urls;
            }

            // Get pages
            if (!$type || $type === 'page') {
                $pages = DB::table('page')
                    ->where('course', $courseId)
                    ->select('id', 'course', 'name', 'intro', 'content', 'contentformat', 'legacyfiles', 'legacyfileslast', 'display', 'displayoptions', 'revision', 'timemodified')
                    ->get();
                $resources['pages'] = $pages;
            }

            return $this->sendResponse($resources, 'Resources retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving resources', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get a specific file resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function showResource(int $id): JsonResponse
    {
        try {
            $resource = DB::table('resource')
                ->join('course', 'resource.course', '=', 'course.id')
                ->where('resource.id', $id)
                ->select('resource.*', 'course.fullname as course_name')
                ->first();

            if (!$resource) {
                return $this->sendNotFoundResponse('Resource not found');
            }

            return $this->sendResponse($resource, 'Resource retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving resource', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get a specific URL resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function showUrl(int $id): JsonResponse
    {
        try {
            $url = DB::table('url')
                ->join('course', 'url.course', '=', 'course.id')
                ->where('url.id', $id)
                ->select('url.*', 'course.fullname as course_name')
                ->first();

            if (!$url) {
                return $this->sendNotFoundResponse('URL not found');
            }

            return $this->sendResponse($url, 'URL retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving URL', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get a specific page resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function showPage(int $id): JsonResponse
    {
        try {
            $page = DB::table('page')
                ->join('course', 'page.course', '=', 'course.id')
                ->where('page.id', $id)
                ->select('page.*', 'course.fullname as course_name')
                ->first();

            if (!$page) {
                return $this->sendNotFoundResponse('Page not found');
            }

            return $this->sendResponse($page, 'Page retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving page', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Create a file resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function storeResource(Request $request): JsonResponse
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
            $data['tobemigrated'] = 0;
            $data['legacyfiles'] = 0;
            $data['display'] = $request->input('display', 0);
            $data['displayoptions'] = $request->input('displayoptions', '');
            $data['filterfiles'] = $request->input('filterfiles', 0);
            $data['revision'] = 1;
            $data['timemodified'] = time();

            $resourceId = DB::table('resource')->insertGetId($data);
            $resource = DB::table('resource')->where('id', $resourceId)->first();

            return $this->sendResponse($resource, 'Resource created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating resource', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Create a URL resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function storeUrl(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'course' => 'required|integer|exists:course,id',
                'name' => 'required|string|max:255',
                'externalurl' => 'required|url|max:4096',
                'intro' => 'string',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['course', 'name', 'intro', 'externalurl']);
            $data['introformat'] = $request->input('introformat', 1);
            $data['display'] = $request->input('display', 0);
            $data['displayoptions'] = $request->input('displayoptions', '');
            $data['parameters'] = $request->input('parameters', '');
            $data['timemodified'] = time();

            $urlId = DB::table('url')->insertGetId($data);
            $url = DB::table('url')->where('id', $urlId)->first();

            return $this->sendResponse($url, 'URL created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating URL', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Create a page resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function storePage(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'course' => 'required|integer|exists:course,id',
                'name' => 'required|string|max:255',
                'content' => 'required|string',
                'intro' => 'string',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['course', 'name', 'intro', 'content']);
            $data['introformat'] = $request->input('introformat', 1);
            $data['contentformat'] = $request->input('contentformat', 1);
            $data['legacyfiles'] = 0;
            $data['display'] = $request->input('display', 5);
            $data['displayoptions'] = $request->input('displayoptions', '');
            $data['revision'] = 1;
            $data['timemodified'] = time();

            $pageId = DB::table('page')->insertGetId($data);
            $page = DB::table('page')->where('id', $pageId)->first();

            return $this->sendResponse($page, 'Page created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating page', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update a resource.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function updateResource(Request $request, int $id): JsonResponse
    {
        try {
            $resource = DB::table('resource')->where('id', $id)->first();

            if (!$resource) {
                return $this->sendNotFoundResponse('Resource not found');
            }

            $data = $request->only(['name', 'intro', 'display', 'displayoptions']);
            $data['timemodified'] = time();

            DB::table('resource')->where('id', $id)->update($data);
            $updatedResource = DB::table('resource')->where('id', $id)->first();

            return $this->sendResponse($updatedResource, 'Resource updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating resource', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update a URL.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function updateUrl(Request $request, int $id): JsonResponse
    {
        try {
            $url = DB::table('url')->where('id', $id)->first();

            if (!$url) {
                return $this->sendNotFoundResponse('URL not found');
            }

            $validator = Validator::make($request->all(), [
                'externalurl' => 'url|max:4096',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['name', 'intro', 'externalurl', 'display', 'displayoptions']);
            $data['timemodified'] = time();

            DB::table('url')->where('id', $id)->update($data);
            $updatedUrl = DB::table('url')->where('id', $id)->first();

            return $this->sendResponse($updatedUrl, 'URL updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating URL', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update a page.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function updatePage(Request $request, int $id): JsonResponse
    {
        try {
            $page = DB::table('page')->where('id', $id)->first();

            if (!$page) {
                return $this->sendNotFoundResponse('Page not found');
            }

            $data = $request->only(['name', 'intro', 'content', 'display', 'displayoptions']);
            $data['timemodified'] = time();

            DB::table('page')->where('id', $id)->update($data);
            $updatedPage = DB::table('page')->where('id', $id)->first();

            return $this->sendResponse($updatedPage, 'Page updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating page', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Delete a resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroyResource(int $id): JsonResponse
    {
        try {
            DB::table('resource')->where('id', $id)->delete();
            return $this->sendResponse([], 'Resource deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting resource', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Delete a URL.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroyUrl(int $id): JsonResponse
    {
        try {
            DB::table('url')->where('id', $id)->delete();
            return $this->sendResponse([], 'URL deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting URL', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Delete a page.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroyPage(int $id): JsonResponse
    {
        try {
            DB::table('page')->where('id', $id)->delete();
            return $this->sendResponse([], 'Page deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting page', ['error' => $e->getMessage()]);
        }
    }
}
