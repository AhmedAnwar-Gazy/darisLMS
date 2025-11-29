<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WikiController extends BaseController
{
    protected $table = 'wiki';

    /**
     * Display a listing of wikis.
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
                ->join('course', 'wiki.course', '=', 'course.id')
                ->select(
                    'wiki.id',
                    'wiki.course',
                    'course.fullname as course_name',
                    'wiki.name',
                    'wiki.intro',
                    'wiki.wikimode',
                    'wiki.defaultformat',
                    'wiki.timecreated',
                    'wiki.timemodified'
                );

            if ($courseId) {
                $query->where('wiki.course', $courseId);
            }

            $wikis = $query->orderBy('wiki.timecreated', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($wikis, 'Wikis retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving wikis', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created wiki.
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
            $data['wikimode'] = $request->input('wikimode', 'collaborative');
            $data['firstpagetitle'] = $request->input('firstpagetitle', 'First Page');
            $data['defaultformat'] = $request->input('defaultformat', 'html');
            $data['forceformat'] = $request->input('forceformat', 1);
            $data['editbegin'] = $request->input('editbegin', 0);
            $data['editend'] = $request->input('editend', 0);
            $data['timecreated'] = time();
            $data['timemodified'] = time();

            $wikiId = DB::table($this->table)->insertGetId($data);
            $wiki = DB::table($this->table)->where('id', $wikiId)->first();

            return $this->sendResponse($wiki, 'Wiki created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating wiki', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified wiki.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $wiki = DB::table($this->table)
                ->join('course', 'wiki.course', '=', 'course.id')
                ->where('wiki.id', $id)
                ->select('wiki.*', 'course.fullname as course_name')
                ->first();

            if (!$wiki) {
                return $this->sendNotFoundResponse('Wiki not found');
            }

            return $this->sendResponse($wiki, 'Wiki retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving wiki', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified wiki.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $wiki = DB::table($this->table)->where('id', $id)->first();

            if (!$wiki) {
                return $this->sendNotFoundResponse('Wiki not found');
            }

            $validator = Validator::make($request->all(), [
                'name' => 'string|max:255',
                'intro' => 'string',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['name', 'intro', 'wikimode', 'defaultformat']);
            $data['timemodified'] = time();

            DB::table($this->table)->where('id', $id)->update($data);
            $updatedWiki = DB::table($this->table)->where('id', $id)->first();

            return $this->sendResponse($updatedWiki, 'Wiki updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating wiki', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified wiki.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $wiki = DB::table($this->table)->where('id', $id)->first();

            if (!$wiki) {
                return $this->sendNotFoundResponse('Wiki not found');
            }

            DB::table($this->table)->where('id', $id)->delete();

            return $this->sendResponse([], 'Wiki deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting wiki', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get wiki pages.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function pages(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $pages = DB::table('wiki_pages as wp')
                ->join('wiki_subwikis as ws', 'wp.subwikiid', '=', 'ws.id')
                ->leftJoin('users as u', 'wp.userid', '=', 'u.id')
                ->where('ws.wikiid', $id)
                ->select(
                    'wp.id',
                    'wp.subwikiid',
                    'wp.title',
                    'wp.cachedcontent',
                    'wp.timecreated',
                    'wp.timemodified',
                    'wp.userid',
                    'u.firstname',
                    'u.lastname',
                    'wp.pageviews',
                    'ws.groupid',
                    'ws.userid as subwiki_userid'
                )
                ->orderBy('wp.timemodified', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($pages, 'Wiki pages retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving wiki pages', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get a specific page.
     *
     * @param int $wikiId
     * @param int $pageId
     * @return JsonResponse
     */
    public function page(int $wikiId, int $pageId): JsonResponse
    {
        try {
            $page = DB::table('wiki_pages as wp')
                ->join('wiki_subwikis as ws', 'wp.subwikiid', '=', 'ws.id')
                ->leftJoin('users as u', 'wp.userid', '=', 'u.id')
                ->where('ws.wikiid', $wikiId)
                ->where('wp.id', $pageId)
                ->select('wp.*', 'u.firstname', 'u.lastname', 'ws.groupid', 'ws.userid as subwiki_userid')
                ->first();

            if (!$page) {
                return $this->sendNotFoundResponse('Page not found');
            }

            return $this->sendResponse($page, 'Wiki page retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving wiki page', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get page versions.
     *
     * @param int $pageId
     * @param Request $request
     * @return JsonResponse
     */
    public function pageVersions(int $pageId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $versions = DB::table('wiki_versions as wv')
                ->join('users as u', 'wv.userid', '=', 'u.id')
                ->where('wv.pageid', $pageId)
                ->where('u.deleted', 0)
                ->select(
                    'wv.id',
                    'wv.pageid',
                    'wv.content',
                    'wv.contentformat',
                    'wv.version',
                    'wv.timecreated',
                    'wv.userid',
                    'u.firstname',
                    'u.lastname'
                )
                ->orderBy('wv.version', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($versions, 'Page versions retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving page versions', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get wiki subwikis.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function subwikis(int $id): JsonResponse
    {
        try {
            $subwikis = DB::table('wiki_subwikis as ws')
                ->leftJoin('groups as g', 'ws.groupid', '=', 'g.id')
                ->leftJoin('users as u', 'ws.userid', '=', 'u.id')
                ->where('ws.wikiid', $id)
                ->select(
                    'ws.id',
                    'ws.wikiid',
                    'ws.groupid',
                    'g.name as group_name',
                    'ws.userid',
                    'u.firstname',
                    'u.lastname'
                )
                ->get();

            return $this->sendResponse($subwikis, 'Wiki subwikis retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving wiki subwikis', ['error' => $e->getMessage()]);
        }
    }
}
