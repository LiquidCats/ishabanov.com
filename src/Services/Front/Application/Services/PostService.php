<?php

declare(strict_types=1);

namespace App\Front\Application\Services;

use App\Data\Database\Eloquent\Models\PostModel;
use App\Domains\Blog\Contracts\Repositories\ExperienceRepositoryContract;
use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\ValueObjects\PostId;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

readonly class PostService
{
    public function __construct(
        private PostRepositoryContract $postRepository,
        private ExperienceRepositoryContract $experienceRepository,
    ) {}

    /**
     * @return LengthAwarePaginator<PostModel>
     */
    public function getPosts(): LengthAwarePaginator
    {
        return $this->postRepository->getWithTags();
    }

    public function getPost(PostId $postId): PostModel
    {
        return $this->postRepository->findById($postId);
    }

    public function getExperiences(): Collection
    {
        return $this->experienceRepository->getListOfExperiencesJob();
    }
}
