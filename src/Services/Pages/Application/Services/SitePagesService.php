<?php

declare(strict_types=1);

namespace App\Pages\Application\Services;

use App\Domains\Blog\Contracts\Repositories\ExperienceRepositoryContract;
use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\Pages\Contracts\ComposerContract;
use App\Domains\Pages\Contracts\Services\SitePagesServiceContract;
use App\Foundation\Enums\ToolType;
use Carbon\Carbon;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

use function abort;
use function now;

readonly class SitePagesService implements SitePagesServiceContract
{
    public function __construct(
        private Repository $config,
        private ComposerContract $composer,
        private PostRepositoryContract $postRepository,
        private ExperienceRepositoryContract $experienceRepository,
        Factory $factory,
    ) {
    }

    public function posts(): View
    {
        $posts = $this->postRepository->getWithTags();

        return $this->composer->compose('posts.list', ['posts' => $posts]);
    }

    public function post(PostId $postId): View
    {
        $post = $this->postRepository->findById($postId);

        if (! Auth::check()) {
            if ($post->is_draft || $post->published_at->greaterThan(now())) {
                abort(404);
            }
        }

        $prev = $this->postRepository->getPrevious($postId);
        $next = $this->postRepository->getNext($postId);
        $similar = $this->postRepository->getSimilarByTag($postId, $post->tags);

        return $this->composer->compose('post.article', [
            'prev' => $prev,
            'next' => $next,
            'similar' => $similar,
            'post' => $post,
        ]);
    }

    public function homepage(): View
    {
        $languages = $this->experienceRepository->getTopToolByTypeJob(ToolType::LANGUAGE, 4);
        $frameworks = $this->experienceRepository->getTopToolByTypeJob(ToolType::FRAMEWORK);
        $experiences = $this->experienceRepository->getListOfExperiencesJob();

        $duration = Carbon::parse('2015-08-01 00:00:00')->diffInYears(now(), 2);

        return $this->composer->compose('home.index', [
            'experiences' => $experiences,
            'languages' => $languages,
            'frameworks' => $frameworks,
            'duration' => $duration,
            'socials' => Collection::make($this->config->get('appearance.site.links.socials', [])),
        ]);
    }

    public function about(): View
    {
        $duration = Carbon::parse('2015-08-01 00:00:00')->longAbsoluteDiffForHumans(now(), 2);

        return $this->composer->compose('about.index', [
            'duration' => $duration,
        ]);
    }
}
