<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Services\Response\ResponseService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends ApiController
{
    public function register(RegistrationRequest $request)
    {
        $user = User::createNewUser($request);

        return ResponseService::success($user);
    }

    public function login(LoginRequest $request)
    {
        $cradentials = request(['email', 'password']);

        if(!Auth::attempt($cradentials)) {
            return ResponseService::sendJsonResponse(
                false,
                403,
                ['message' => __('auth.failed')]
            );
        }

        $user = $request->user();

        $tokenResult =$user->createToken('Personal Access Token');

        return ResponseService::sendJsonResponse(
            true,
            200,
            [],
            [
                'api_token' => $tokenResult->accessToken,
                'user' => $user,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            ]
        );
    }

    public function logout(){
        $accessToken = auth('api')->user()->token()->revoke();
        return $this->responseSuccess($accessToken);
    }
}
