<?php

declare(strict_types=1);

namespace App\Domains\Pages\Contracts\Services;

use App\Domains\Blog\ValueObjects\PostId;
use Illuminate\Contracts\View\View;

interface SitePagesServiceContract
{
    public function posts(): View;
    public function post(PostId $postId): View;
    public function homepage(): View;
    public function about(): View;
}
