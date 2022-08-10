<?php

namespace App\Http\Controllers;

use App\Http\Resources\PanicResource;
use App\Models\Panic;

class GetPanicsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        $panics = Panic::with(['user'])->get();

        return $this->response(data: [
            'panics' => PanicResource::collection($panics)
        ]);
    }
}
