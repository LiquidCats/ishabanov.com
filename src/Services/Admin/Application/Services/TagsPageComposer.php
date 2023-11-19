<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use App\Domains\Blog\ValueObjects\TagId;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use function optional;

class TagsPageComposer extends AbstractPageComposer
{
    public function __construct(
        private readonly TagRepositoryContract $tagRepository,
        Factory $factory,
        Repository $config,
    ) {
        parent::__construct($factory, $config);
    }

    public function edit(TagId $tagId): View
    {
        $tag = $this->tagRepository->findById($tagId);

        return $this->compose('tags.edit', ['tag' => $tag]);
    }

    public function list(): View
    {
        $tags = $this->tagRepository->getAllWithPostsCount();

        return $this->compose('tags.list', [
            'tags' => $tags,
        ]);
    }

    public function create(): View
    {
        return $this->compose('tags.create', ['tag' => optional()]);
    }
}
