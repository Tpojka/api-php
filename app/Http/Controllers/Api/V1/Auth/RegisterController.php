<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function __invoke(RegisterRequest $request)
    {
        try {
            if ($request->user()) {
                throw new Exception('User registered already.');
            }

            $credentials = $request->only([
                'name',
                'email',
                'password',
            ]);

            $user = User::create([
                'name' => $credentials['name'],
                'email' => $credentials['email'],
                'password' => $credentials['password'],
            ]);

            $token = JWTAuth::fromUser($user);

            $return = response()->json(['user' => $user, 'token' => $token], 201);
        } catch (Exception $e) {
            $return = response()->json(['message' => $e->getMessage(), 'errors' => [$e->getMessage()], 'redirect_route_url' => route('dashboard')], 200);
        } finally {
            return $return;
        }
    }
}
