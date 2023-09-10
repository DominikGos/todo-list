<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request): RedirectResponse
    {
        if(Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect(route('users.tasks.index', ['id' => Auth::id()]))
                ->with('flash_message', 'You have been logged in.');
        }
    }
}
