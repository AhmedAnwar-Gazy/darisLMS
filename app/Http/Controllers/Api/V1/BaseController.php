<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    /**
     * Success response method.
     *
     * @param mixed $result
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function sendResponse($result, string $message = 'Success', int $code = Response::HTTP_OK): JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

    /**
     * Error response method.
     *
     * @param string $error
     * @param array $errorMessages
     * @param int $code
     * @return JsonResponse
     */
    public function sendError(string $error, array $errorMessages = [], int $code = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    /**
     * Paginated response method.
     *
     * @param mixed $result
     * @param string $message
     * @return JsonResponse
     */
    public function sendPaginatedResponse($result, string $message = 'Success'): JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $result->items(),
            'message' => $message,
            'pagination' => [
                'total' => $result->total(),
                'per_page' => $result->perPage(),
                'current_page' => $result->currentPage(),
                'last_page' => $result->lastPage(),
                'from' => $result->firstItem(),
                'to' => $result->lastItem(),
            ],
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Not found response method.
     *
     * @param string $message
     * @return JsonResponse
     */
    public function sendNotFoundResponse(string $message = 'Resource not found'): JsonResponse
    {
        return $this->sendError($message, [], Response::HTTP_NOT_FOUND);
    }

    /**
     * Validation error response method.
     *
     * @param array $errors
     * @return JsonResponse
     */
    public function sendValidationError(array $errors): JsonResponse
    {
        return $this->sendError('Validation Error', $errors, Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Unauthorized response method.
     *
     * @param string $message
     * @return JsonResponse
     */
    public function sendUnauthorizedResponse(string $message = 'Unauthorized'): JsonResponse
    {
        return $this->sendError($message, [], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Forbidden response method.
     *
     * @param string $message
     * @return JsonResponse
     */
    public function sendForbiddenResponse(string $message = 'Forbidden'): JsonResponse
    {
        return $this->sendError($message, [], Response::HTTP_FORBIDDEN);
    }
}
