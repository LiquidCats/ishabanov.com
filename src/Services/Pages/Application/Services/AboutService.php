<?php

declare(strict_types=1);

namespace App\Pages\Application\Services;

use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function now;
use function view;

class AboutService implements PageComposerServiceContract
{

    public function view(Request $request): View
    {
        $duration = Carbon::parse('2015-08-01 00:00:00')->longAbsoluteDiffForHumans(now(), 2);

        return view('pages.about.index')
            ->with('duration', $duration);
    }
}
