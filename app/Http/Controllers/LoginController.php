<?php

namespace App\Http\Controllers;

use App\Concerns\FSBXResponse;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    use FSBXResponse;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function __invoke(LoginRequest $request)
    {
        if(!auth()->attempt($request->validated())){
            abort(Response::HTTP_UNAUTHORIZED, "Invalid login credentials");
        }

        $userToken = auth()->user()->createToken('fsbx-user')->accessToken;

        return $this->response(data: [
            'api_access_token' => $userToken
        ]);
    }
}
