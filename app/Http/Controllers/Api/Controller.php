<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    /**
     * Send a successful response.
     *
     * @param  array  $data
     * @param  string  $message
     * @param  int  $code
     * @return JsonResponse
     */
    protected function success($data = [], $message = 'Success', $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    /**
     * Send an error response.
     *
     * @param  string  $message
     * @param  int  $code
     * @return JsonResponse
     */
    protected function error($message = 'Error', $code = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }

    /**
     * Send a not found response.
     *
     * @param  string  $message
     * @return JsonResponse
     */
    protected function notFound($message = 'Resource not found'): JsonResponse
    {
        return $this->error($message, Response::HTTP_NOT_FOUND);
    }

    /**
     * Send an unauthorized response.
     *
     * @param  string  $message
     * @return JsonResponse
     */
    protected function unauthorized($message = 'Unauthorized'): JsonResponse
    {
        return $this->error($message, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Send an internal server error response.
     *
     * @param  string  $message
     * @return JsonResponse
     */
    protected function internalError($message = 'Internal Server Error'): JsonResponse
    {
        return $this->error($message, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Example index method.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return $this->success([], 'Welcome to the API');
    }
}