<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Login account form
     * @return Factory|View|RedirectResponse
     */
    public function index(): Factory|View|RedirectResponse
    {
        if (auth()->guard('web')->check()) {
            return redirect()->route('supplies.index');
        }
        return view('login');
    }

    /**
     * Login account
     * @param AuthRequest $request
     * @return RedirectResponse
     */
    public function login(AuthRequest $request): RedirectResponse
    {
        if (auth()->guard('web')->attempt($request->validated())) {
            return redirect()->route('supplies.index');
        }

        return redirect()->back();
    }

    /**
     * Logout from account
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse {
        auth()->guard('web')->logout();
        return redirect()->route('login');
    }
}
