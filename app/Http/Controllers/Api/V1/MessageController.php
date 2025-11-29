<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MessageController extends BaseController
{
    protected $table = 'message';

    /**
     * Display messages for a user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $userId = $request->input('user_id');
            $type = $request->input('type', 'received'); // received, sent
            
            if (!$userId) {
                return $this->sendError('User ID is required', [], 400);
            }

            $query = DB::table($this->table . ' as m')
                ->join('users as sender', 'm.useridfrom', '=', 'sender.id')
                ->join('users as recipient', 'm.useridto', '=', 'recipient.id')
                ->where('sender.deleted', 0)
                ->where('recipient.deleted', 0)
                ->select(
                    'm.id',
                    'm.useridfrom',
                    'sender.firstname as sender_firstname',
                    'sender.lastname as sender_lastname',
                    'm.useridto',
                    'recipient.firstname as recipient_firstname',
                    'recipient.lastname as recipient_lastname',
                    'm.subject',
                    'm.fullmessage',
                    'm.fullmessageformat',
                    'm.fullmessagehtml',
                    'm.timecreated'
                );

            if ($type === 'received') {
                $query->where('m.useridto', $userId);
            } else {
                $query->where('m.useridfrom', $userId);
            }

            $messages = $query->orderBy('m.timecreated', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($messages, 'Messages retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving messages', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get unread messages count for a user.
     *
     * @param int $userId
     * @return JsonResponse
     */
    public function unreadCount(int $userId): JsonResponse
    {
        try {
            $count = DB::table($this->table)
                ->where('useridto', $userId)
                ->where('timeread', 0)
                ->count();

            return $this->sendResponse(['unread_count' => $count], 'Unread count retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving unread count', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get conversations for a user.
     *
     * @param int $userId
     * @param Request $request
     * @return JsonResponse
     */
    public function conversations(int $userId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $conversations = DB::table('message_conversations as mc')
                ->join('message_conversation_members as mcm', 'mc.id', '=', 'mcm.conversationid')
                ->where('mcm.userid', $userId)
                ->select(
                    'mc.id',
                    'mc.name',
                    'mc.type',
                    'mc.enabled',
                    'mc.timecreated',
                    'mc.timemodified'
                )
                ->orderBy('mc.timemodified', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($conversations, 'Conversations retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving conversations', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get messages in a conversation.
     *
     * @param int $conversationId
     * @param Request $request
     * @return JsonResponse
     */
    public function conversationMessages(int $conversationId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 30);

            $messages = DB::table('messages as m')
                ->join('users as u', 'm.useridfrom', '=', 'u.id')
                ->where('m.conversationid', $conversationId)
                ->where('u.deleted', 0)
                ->select(
                    'm.id',
                    'm.useridfrom',
                    'u.firstname',
                    'u.lastname',
                    'm.subject',
                    'm.fullmessage',
                    'm.fullmessageformat',
                    'm.fullmessagehtml',
                    'm.timecreated'
                )
                ->orderBy('m.timecreated', 'asc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($messages, 'Conversation messages retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving conversation messages', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get conversation members.
     *
     * @param int $conversationId
     * @return JsonResponse
     */
    public function conversationMembers(int $conversationId): JsonResponse
    {
        try {
            $members = DB::table('message_conversation_members as mcm')
                ->join('users as u', 'mcm.userid', '=', 'u.id')
                ->where('mcm.conversationid', $conversationId)
                ->where('u.deleted', 0)
                ->select(
                    'mcm.id',
                    'mcm.userid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'mcm.timecreated'
                )
                ->get();

            return $this->sendResponse($members, 'Conversation members retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving conversation members', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get contacts for a user.
     *
     * @param int $userId
     * @param Request $request
     * @return JsonResponse
     */
    public function contacts(int $userId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $contacts = DB::table('message_contacts as mc')
                ->join('users as u', 'mc.contactid', '=', 'u.id')
                ->where('mc.userid', $userId)
                ->where('u.deleted', 0)
                ->select(
                    'mc.id',
                    'mc.contactid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'mc.timecreated'
                )
                ->orderBy('u.firstname', 'asc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($contacts, 'Contacts retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving contacts', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get blocked users for a user.
     *
     * @param int $userId
     * @param Request $request
     * @return JsonResponse
     */
    public function blockedUsers(int $userId, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);

            $blocked = DB::table('message_users_blocked as mub')
                ->join('users as u', 'mub.blockeduserid', '=', 'u.id')
                ->where('mub.userid', $userId)
                ->where('u.deleted', 0)
                ->select(
                    'mub.id',
                    'mub.blockeduserid',
                    'u.firstname',
                    'u.lastname',
                    'u.email',
                    'mub.timecreated'
                )
                ->orderBy('mub.timecreated', 'desc')
                ->paginate($perPage);

            return $this->sendPaginatedResponse($blocked, 'Blocked users retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving blocked users', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Send a message.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function sendMessage(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'useridfrom' => 'required|integer|exists:users,id',
                'useridto' => 'required|integer|exists:users,id',
                'subject' => 'nullable|string|max:255',
                'fullmessage' => 'required|string',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = [
                'useridfrom' => $request->useridfrom,
                'useridto' => $request->useridto,
                'subject' => $request->input('subject', ''),
                'fullmessage' => $request->fullmessage,
                'fullmessageformat' => $request->input('fullmessageformat', 1),
                'fullmessagehtml' => $request->input('fullmessagehtml', ''),
                'smallmessage' => $request->input('smallmessage', ''),
                'notification' => $request->input('notification', 0),
                'timecreated' => time(),
                'timeread' => 0,
            ];

            $messageId = DB::table($this->table)->insertGetId($data);
            $message = DB::table($this->table)->where('id', $messageId)->first();

            return $this->sendResponse($message, 'Message sent successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error sending message', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Mark message as read.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function markAsRead(int $id): JsonResponse
    {
        try {
            $message = DB::table($this->table)->where('id', $id)->first();

            if (!$message) {
                return $this->sendNotFoundResponse('Message not found');
            }

            DB::table($this->table)->where('id', $id)->update([
                'timeread' => time(),
            ]);

            $updatedMessage = DB::table($this->table)->where('id', $id)->first();

            return $this->sendResponse($updatedMessage, 'Message marked as read');
        } catch (\Exception $e) {
            return $this->sendError('Error marking message as read', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Delete a message.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $message = DB::table($this->table)->where('id', $id)->first();

            if (!$message) {
                return $this->sendNotFoundResponse('Message not found');
            }

            DB::table($this->table)->where('id', $id)->delete();

            return $this->sendResponse([], 'Message deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting message', ['error' => $e->getMessage()]);
        }
    }
}
