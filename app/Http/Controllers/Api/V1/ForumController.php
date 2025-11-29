<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ForumController extends BaseController
{
    protected $table = 'forum';

    /**
     * Display a listing of forums.
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
                ->join('course', 'forum.course', '=', 'course.id')
                ->select(
                    'forum.id',
                    'forum.course',
                    'course.fullname as course_name',
                    'forum.type',
                    'forum.name',
                    'forum.intro',
                    'forum.assessed',
                    'forum.timecreated',
                    'forum.timemodified'
                );

            if ($courseId) {
                $query->where('forum.course', $courseId);
            }

            $forums = $query->orderBy('forum.timecreated', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($forums, 'Forums retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving forums', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created forum.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'course' => 'required|integer|exists:course,id',
                'type' => 'required|string|in:single,eachuser,general,qanda,blog,news',
                'name' => 'required|string|max:255',
                'intro' => 'required|string',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['course', 'type', 'name', 'intro']);
            $data['introformat'] = $request->input('introformat', 1);
            $data['assessed'] = $request->input('assessed', 0);
            $data['assesstimestart'] = $request->input('assesstimestart', 0);
            $data['assesstimefinish'] = $request->input('assesstimefinish', 0);
            $data['scale'] = $request->input('scale', 0);
            $data['maxbytes'] = $request->input('maxbytes', 0);
            $data['maxattachments'] = $request->input('maxattachments', 1);
            $data['forcesubscribe'] = $request->input('forcesubscribe', 0);
            $data['trackingtype'] = $request->input('trackingtype', 1);
            $data['rsstype'] = $request->input('rsstype', 0);
            $data['rssarticles'] = $request->input('rssarticles', 0);
            $data['timemodified'] = time();

            $forumId = DB::table($this->table)->insertGetId($data);
            $forum = DB::table($this->table)->where('id', $forumId)->first();

            return $this->sendResponse($forum, 'Forum created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating forum', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified forum.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $forum = DB::table($this->table)
                ->join('course', 'forum.course', '=', 'course.id')
                ->where('forum.id', $id)
                ->select('forum.*', 'course.fullname as course_name')
                ->first();

            if (!$forum) {
                return $this->sendNotFoundResponse('Forum not found');
            }

            return $this->sendResponse($forum, 'Forum retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving forum', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified forum.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $forum = DB::table($this->table)->where('id', $id)->first();

            if (!$forum) {
                return $this->sendNotFoundResponse('Forum not found');
            }

            $validator = Validator::make($request->all(), [
                'type' => 'string|in:single,eachuser,general,qanda,blog,news',
                'name' => 'string|max:255',
                'intro' => 'string',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['type', 'name', 'intro', 'assessed', 'maxbytes', 'maxattachments']);
            $data['timemodified'] = time();

            DB::table($this->table)->where('id', $id)->update($data);
            $updatedForum = DB::table($this->table)->where('id', $id)->first();

            return $this->sendResponse($updatedForum, 'Forum updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating forum', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified forum.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $forum = DB::table($this->table)->where('id', $id)->first();

            if (!$forum) {
                return $this->sendNotFoundResponse('Forum not found');
            }

            DB::table($this->table)->where('id', $id)->delete();

            return $this->sendResponse([], 'Forum deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting forum', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get forum discussions.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function discussions(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $discussions = DB::table('forum_discussions as fd')
                ->join('users as u', 'fd.userid', '=', 'u.id')
                ->leftJoin(DB::raw('(SELECT discussion, COUNT(*) as post_count FROM forum_posts GROUP BY discussion) as pc'), 'fd.id', '=', 'pc.discussion')
                ->where('fd.forum', $id)
                ->where('u.deleted', 0)
                ->select(
                    'fd.id',
                    'fd.name',
                    'fd.userid',
                    'u.firstname',
                    'u.lastname',
                    'fd.timemodified',
                    'fd.usermodified',
                    'fd.timestart',
                    'fd.timeend',
                    'fd.pinned',
                    DB::raw('COALESCE(pc.post_count, 0) as post_count')
                )
                ->orderBy('fd.pinned', 'desc')
                ->orderBy('fd.timemodified', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($discussions, 'Forum discussions retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving forum discussions', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get discussion posts.
     *
     * @param int $discussionId
     * @param Request $request
     * @return JsonResponse
     */
    public function discussionPosts(int $discussionId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $posts = DB::table('forum_posts as fp')
                ->join('users as u', 'fp.userid', '=', 'u.id')
                ->where('fp.discussion', $discussionId)
                ->where('u.deleted', 0)
                ->select(
                    'fp.id',
                    'fp.parent',
                    'fp.userid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'fp.subject',
                    'fp.message',
                    'fp.messageformat',
                    'fp.attachment',
                    'fp.totalscore',
                    'fp.created',
                    'fp.modified'
                )
                ->orderBy('fp.created', 'asc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($posts, 'Discussion posts retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving discussion posts', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Create a new discussion.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createDiscussion(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'forum_id' => 'required|integer|exists:forum,id',
                'name' => 'required|string|max:255',
                'message' => 'required|string',
                'userid' => 'required|integer|exists:users,id',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            // Get course from forum
            $forum = DB::table('forum')->where('id', $request->forum_id)->first();

            $discussionData = [
                'course' => $forum->course,
                'forum' => $request->forum_id,
                'name' => $request->name,
                'userid' => $request->userid,
                'timemodified' => time(),
                'usermodified' => $request->userid,
                'timestart' => $request->input('timestart', 0),
                'timeend' => $request->input('timeend', 0),
                'pinned' => $request->input('pinned', 0),
            ];

            $discussionId = DB::table('forum_discussions')->insertGetId($discussionData);

            // Create first post
            $postData = [
                'discussion' => $discussionId,
                'parent' => 0,
                'userid' => $request->userid,
                'created' => time(),
                'modified' => time(),
                'subject' => $request->name,
                'message' => $request->message,
                'messageformat' => $request->input('messageformat', 1),
                'messagetrust' => 0,
                'attachment' => $request->input('attachment', ''),
                'totalscore' => 0,
                'mailnow' => $request->input('mailnow', 0),
            ];

            $postId = DB::table('forum_posts')->insertGetId($postData);

            // Update discussion with first post
            DB::table('forum_discussions')->where('id', $discussionId)->update([
                'firstpost' => $postId,
            ]);

            $discussion = DB::table('forum_discussions')->where('id', $discussionId)->first();

            return $this->sendResponse($discussion, 'Discussion created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating discussion', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Create a new post in a discussion.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createPost(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'discussion_id' => 'required|integer|exists:forum_discussions,id',
                'parent' => 'required|integer',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
                'userid' => 'required|integer|exists:users,id',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $postData = [
                'discussion' => $request->discussion_id,
                'parent' => $request->parent,
                'userid' => $request->userid,
                'created' => time(),
                'modified' => time(),
                'subject' => $request->subject,
                'message' => $request->message,
                'messageformat' => $request->input('messageformat', 1),
                'messagetrust' => 0,
                'attachment' => $request->input('attachment', ''),
                'totalscore' => 0,
                'mailnow' => $request->input('mailnow', 0),
            ];

            $postId = DB::table('forum_posts')->insertGetId($postData);

            // Update discussion modified time
            DB::table('forum_discussions')
                ->where('id', $request->discussion_id)
                ->update([
                    'timemodified' => time(),
                    'usermodified' => $request->userid,
                ]);

            $post = DB::table('forum_posts')->where('id', $postId)->first();

            return $this->sendResponse($post, 'Post created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating post', ['error' => $e->getMessage()]);
        }
    }
}
