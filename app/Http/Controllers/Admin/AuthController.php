<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller
{
    public function show(): Response|RedirectResponse
    {
        if (Auth::guard('admin')->check() === true) {
            return redirect(route('admin.get.home'));
        }

        return response()->view('admin.login');
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $params = $request->all();

        if ($this->checkLogin($params)) {
            return response()->json([
                'system' => [
                    'code' => 200,
                    'message' => 'OK',
                ],
            ]);
        }

        return response()->json([
            'system' => [
                'code' => 401,
                'message' => 'Unauthorized',
            ],
        ], 401);
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    private function checkLogin(array $params): bool
    {
        return Auth::guard('admin')->attempt([
            'email' => $params['username'],
            'password' => $params['password'],
            'active' => 1,
        ]);
    }
}
