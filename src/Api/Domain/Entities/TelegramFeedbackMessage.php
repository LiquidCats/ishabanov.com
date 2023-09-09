<?php

namespace ishabanov\Api\Domain\Entities;

use ishabanov\Core\Domain\Enums\FeedbackType;
use Stringable;

readonly class TelegramFeedbackMessage implements Stringable
{
    public function __construct(
        public string $email,
        public string $name,
        public string $message,
        public string $environment,
        public FeedbackType $subject,
    )
    {
    }

    public function toText(): string
    {
        $message = "Name: {$this->email}\n";
        $message .= "Email: {$this->name}\n";
        $message .= "Subject: {$this->subject->getText()}\n";
        $message .= "Message: {$this->message}\n\n";
        $message .= 'ENV: '. $this->environment;

        return $message;
    }

    public function __toString()
    {
        return $this->toText();
    }
}
