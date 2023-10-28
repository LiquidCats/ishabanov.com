<?php

namespace App\Pages\Application\Services;

use App\Domains\Homepage\Contracts\Repositories\ExperienceRepositoryContract;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use App\Foundation\Enums\ToolType;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

readonly class HomepageService implements PageComposerServiceContract
{
    public function __construct(
        private Factory $factory,
        private ExperienceRepositoryContract $experienceRepository
    ) {
    }

    public function view(Request $request): View
    {
        $languages = $this->experienceRepository->getTopToolByTypeJob(ToolType::LANGUAGE, 4);
        $frameworks = $this->experienceRepository->getTopToolByTypeJob(ToolType::FRAMEWORK);
        $experiences = $this->experienceRepository->getListOfExperiencesJob();

        return $this->factory->make('pages.home.index', [
            'experiences' => $experiences,
            'languages' => $languages,
            'frameworks' => $frameworks,
        ]);
    }
}
