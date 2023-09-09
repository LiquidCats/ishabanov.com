<?php

namespace ishabanov\Pages\Application\Services;

use Illuminate\Contracts\View\{Factory, View};
use ishabanov\Core\Domain\Enums\ToolType;
use ishabanov\Pages\Domain\Contracts\Repositories\ExperienceRepositoryContract;
use ishabanov\Pages\Domain\Contracts\Services\PageComposerServiceContract;

readonly class PageComposerService implements PageComposerServiceContract
{
    public function __construct(
        private Factory $factory,
        private ExperienceRepositoryContract $experienceRepository
    ) {
    }

    public function homepage(): View
    {
        $languages = $this->experienceRepository->getTopToolByTypeJob(ToolType::LANGUAGE, 4);
        $frameworks = $this->experienceRepository->getTopToolByTypeJob(ToolType::FRAMEWORK);
        $experiences = $this->experienceRepository->getListOfExperiencesJob();
        $duration = $this->experienceRepository->calculateExperienceDurationJob($experiences->last());

        return $this->factory->make('index', [
            'duration' => $duration,
            'experiences' => $experiences,
            'languages' => $languages,
            'frameworks' => $frameworks,
        ]);
    }
}
