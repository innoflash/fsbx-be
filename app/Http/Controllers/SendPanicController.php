<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendPanicRequest;
use App\Models\Panic;
use Illuminate\Http\Response;

class SendPanicController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(SendPanicRequest $request)
    {
        $panic = Panic::create([
            ...$request->validated(),
            'user_id' => auth()->id()
        ]);

        return $this->response(
            data: ['panic_id' => $panic->id],
            statusCode: Response::HTTP_CREATED
        );
    }
}
