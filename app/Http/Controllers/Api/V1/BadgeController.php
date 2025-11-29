<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BadgeController extends BaseController
{
    protected $table = 'badge';

    /**
     * Display a listing of badges.
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
                ->select('id', 'name', 'description', 'descriptionformat', 'timecreated', 'timemodified', 'usercreated', 'usermodified', 'issuername', 'issuerurl', 'expiredate', 'expireperiod', 'type', 'courseid', 'message', 'status');

            if ($courseId) {
                $query->where('courseid', $courseId);
            }

            $badges = $query->orderBy('timecreated', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($badges, 'Badges retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving badges', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified badge.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $badge = DB::table($this->table)->where('id', $id)->first();

            if (!$badge) {
                return $this->sendNotFoundResponse('Badge not found');
            }

            return $this->sendResponse($badge, 'Badge retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving badge', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get issued badges.
     *
     * @param int $badgeId
     * @param Request $request
     * @return JsonResponse
     */
    public function issuedBadges(int $badgeId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $issuedBadges = DB::table('badge_issued as bi')
                ->join('users as u', 'bi.userid', '=', 'u.id')
                ->leftJoin('users as issuer', 'bi.issuernotified', '=', 'issuer.id')
                ->where('bi.badgeid', $badgeId)
                ->where('u.deleted', 0)
                ->select(
                    'bi.id',
                    'bi.userid',
                    'u.username',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'bi.uniquehash',
                    'bi.dateissued',
                    'bi.dateexpire',
                    'bi.visible',
                    'issuer.firstname as issuer_firstname',
                    'issuer.lastname as issuer_lastname'
                )
                ->orderBy('bi.dateissued', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($issuedBadges, 'Issued badges retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving issued badges', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get user badges.
     *
     * @param int $userId
     * @param Request $request
     * @return JsonResponse
     */
    public function userBadges(int $userId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $userBadges = DB::table('badge_issued as bi')
                ->join('badge as b', 'bi.badgeid', '=', 'b.id')
                ->where('bi.userid', $userId)
                ->select(
                    'bi.id as issued_id',
                    'b.id as badge_id',
                    'b.name',
                    'b.description',
                    'b.issuername',
                    'b.issuerurl',
                    'bi.uniquehash',
                    'bi.dateissued',
                    'bi.dateexpire',
                    'bi.visible'
                )
                ->orderBy('bi.dateissued', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($userBadges, 'User badges retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving user badges', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get badge criteria.
     *
     * @param int $badgeId
     * @return JsonResponse
     */
    public function criteria(int $badgeId): JsonResponse
    {
        try {
            $criteria = DB::table('badge_criteria as bc')
                ->where('bc.badgeid', $badgeId)
                ->select('id', 'badgeid', 'criteriatype', 'method', 'description', 'descriptionformat')
                ->get();

            return $this->sendResponse($criteria, 'Badge criteria retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving badge criteria', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Issue a badge to a user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function issueBadge(Request $request): JsonResponse
    {
        try {
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'badgeid' => 'required|integer|exists:badge,id',
                'userid' => 'required|integer|exists:users,id',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            // Check if badge already issued
            $existing = DB::table('badge_issued')
                ->where('badgeid', $request->badgeid)
                ->where('userid', $request->userid)
                ->first();

            if ($existing) {
                return $this->sendError('Badge already issued to this user', [], 409);
            }

            $badge = DB::table('badge')->where('id', $request->badgeid)->first();

            $data = [
                'badgeid' => $request->badgeid,
                'userid' => $request->userid,
                'uniquehash' => hash('sha256', $request->badgeid . '_' . $request->userid . '_' . time()),
                'dateissued' => time(),
                'dateexpire' => $badge->expiredate ? $badge->expiredate : null,
                'visible' => $request->input('visible', 1),
                'issuernotified' => $request->input('issuer_id', null),
            ];

            $issuedId = DB::table('badge_issued')->insertGetId($data);
            $issuedBadge = DB::table('badge_issued')->where('id', $issuedId)->first();

            return $this->sendResponse($issuedBadge, 'Badge issued successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error issuing badge', ['error' => $e->getMessage()]);
        }
    }
}
