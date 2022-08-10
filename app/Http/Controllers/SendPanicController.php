<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendPanicRequest;
use Illuminate\Http\Request;

class SendPanicController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SendPanicRequest $request)
    {
        //
    }
}
