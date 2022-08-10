<?php

namespace App\Http\Controllers;

use App\Models\Panic;
use Illuminate\Http\Request;

class CancelPanicController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Panic $panic)
    {
        $this->authorize('delete', $panic);

        $panic->delete();

        return $this->response(message: 'Panic cancelled successfully');
    }
}
