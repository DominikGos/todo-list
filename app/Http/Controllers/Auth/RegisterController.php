<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request): RedirectResponse
    {
        $password = Hash::make($request->validated('password'));
        $userData = array_merge($request->validated(), ['password' => $password]);
        $user = User::create($userData);

        return to_route('login.page');
    }
}
