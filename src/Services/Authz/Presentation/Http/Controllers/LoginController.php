<?php

declare(strict_types=1);

namespace App\Authz\Presentation\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use function redirect;
use function route;
use function view;

class LoginController extends Controller
{
    public function __invoke(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect(route('admin.dashboard'));
        }

        return view('layouts.admin');
    }
}
