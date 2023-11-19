<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Tags;

use App\Admin\Application\Services\TagsPageComposer;
use App\Domains\Blog\ValueObjects\TagId;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class TagEditController extends Controller
{
    public function __construct(private readonly TagsPageComposer $service)
    {
    }

    public function __invoke(string $tagId): View
    {
        return $this->service->edit(new TagId($tagId));
    }
}
