<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Data\Database\Eloquent\Models\FileModel;
use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use App\Domains\Files\Contracts\Repositories\FileRepositoryContract;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

use function old;
use function optional;

class PostsPageComposer extends AbstractPageComposer
{
    public function __construct(
        private readonly PostRepositoryContract $postRepository,
        private readonly TagRepositoryContract $tagRepository,
        private readonly FileRepositoryContract $fileRepository,
        Factory $factory,
        Repository $config
    ) {
        parent::__construct($factory, $config);
    }

    public function list(): View
    {
        $posts = $this->postRepository->getLatest();

        return $this->compose('posts.list', [
            'posts' => $posts,
        ]);
    }

    public function create(): View
    {
        $tags = $this->tagRepository->getAll();

        $images = FileModel::all()->map(fn (FileModel $f) => ['title' => $f->name, 'value' => Storage::url($f->path)]);

        return $this->compose('posts.create', [
            'images' => $images,
            'tags' => $tags,
            'post' => optional(),
            'previews' => $this->fileRepository->getAllImages(),
            'postTagIds' => Collection::make(old('post_tags', [])),
        ]);
    }
}
