<?php

declare(strict_types=1);

namespace App\Domains\Feedback\Jobs;

use App\Http\Requests\UserFeedbackRequest;
use App\Mail\FeedbackReceived;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Mail\Mailer;
use Lucid\Units\Job;

class MailFeedbackToAdminJob extends Job
{
    public function __construct(protected UserFeedbackRequest $request)
    {
    }

    public function handle(Repository $config, Mailer $mailer): void
    {
        $mailer->to($config->get('mail.to.admin'))
            ->send(new FeedbackReceived($this->request));
    }
}
