<?php

namespace Manager\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Manager\Http\Requests\Auth\LoginRequest;
use Manager\Models\User;
use Manager\Models\UserAttribute;
use Manager\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    /**
     * Handle an incoming authentication request.
     *
     * @param LoginRequest $request
     *
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->user()->setRememberToken(hash('sha256', $token = Str::random(60)));
        $request->user()->save();

        $request->session()->regenerate();
        $request->session()->put('_token', $token);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/manager');
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function forgot(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        /** @var UserAttribute $userAttributes */
        $userAttributes = UserAttribute::query()
            ->with('user')
            ->firstWhere($request->only('email'));

        if (!$userAttributes) {
            $status = Password::INVALID_USER;
        } else {
            $status = $this->sendResetLink($userAttributes->user);
        }

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }

    /**
     * @param User|null $user
     *
     * @return string
     */
    protected function sendResetLink(?User $user): string
    {
        if (is_null($user)) {
            return Password::INVALID_USER;
        }

        $token = Password::getRepository()->createNewToken();

        $user->update([
            'refresh_token' => $token,
        ]);

        $user->sendPasswordResetNotification($token);

        return Password::RESET_LINK_SENT;
    }
}
