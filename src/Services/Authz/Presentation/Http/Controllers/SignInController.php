<?php

declare(strict_types=1);

namespace App\Authz\Presentation\Http\Controllers;

use App\Data\Database\Eloquent\Models\UserModel;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use LiquidCats\G2FA\Exceptions\IncompatibleWithAuthenticatorException;
use LiquidCats\G2FA\Exceptions\InvalidCharactersException;
use LiquidCats\G2FA\Exceptions\SecretKeyTooShortException;
use LiquidCats\G2FA\TOTPVerificator;

use function back;
use function redirect;
use function route;

class SignInController extends Controller
{
    public function __construct(
        private readonly Repository $config,
        private readonly TOTPVerificator $authenticator,
    ) {
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     * @throws IncompatibleWithAuthenticatorException
     * @throws InvalidCharactersException
     * @throws SecretKeyTooShortException
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::check()) {
            return redirect(route('admin.dashboard', ['frontend' => 'dashboard']));
        }

        if (! Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])
                ->onlyInput('email');
        }

        /** @var UserModel $user */
        $user = $request->user();
        $code = $request->get('2fa_otp');
        if (! $this->authenticator->verify($code, $user->g2fa_secret)) {
            Auth::logout();

            return back()
                ->withErrors([
                    $this->config->get('google2fa.otp_input') => 'Incorrect TOTP',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect(route('admin.dashboard', ['frontend' => 'dashboard']));
    }
}
