<?php


namespace App\Concerns;


use Illuminate\Http\Response;

trait ResponseMapper
{
    protected function response(
        string $status = 'success',
        string $message = 'Action completed successfully',
        mixed $data = [],
        int $statusCode = Response::HTTP_OK
    )
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }
}
