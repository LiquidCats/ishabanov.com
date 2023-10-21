<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use function now;
use function view;

class AboutController extends Controller
{
    public function __invoke(): View
    {
        $duration = Carbon::parse('2014-08-01 00:00:00')->longAbsoluteDiffForHumans(now(), 2);
        return view('pages.about.index')
            ->with('duration', $duration);
    }
}
