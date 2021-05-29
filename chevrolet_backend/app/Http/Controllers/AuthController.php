<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\Register;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(Register $request): JsonResponse
    {
        $validator = $request->validated();
        $validator['password'] = bcrypt($validator['password']);
        $user = User::create($validator);
        if($user) {
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name'] = $user->name;
            return $this->sendResponse($success, 'User register successfully.');
        };
        return $this->sendError('Validation Error.', $validator);;
    }

    public function login(Login $request): JsonResponse
    {
        $validator = $request->validated();

        if (auth()->attempt($validator)) {
            $success['token'] = auth()->user()->createToken('MyApp')->accessToken;
            return $this->sendResponse($success, 'User register successfully.');
        } else {
            return $this->sendError('Validation Error.', $validator);
        }
    }
}
