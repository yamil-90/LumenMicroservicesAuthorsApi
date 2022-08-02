<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * builds the response
     *
     * @param string|array $data
     * @param int $code
     * @return JsonResponse
     */
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
    }

    /**
     * buids the error response
     *
     * @param string¬array $message
     * @param int $code
     * @return void
     */
    public function errorsResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }
}