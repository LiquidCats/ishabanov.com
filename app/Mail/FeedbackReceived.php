<?php

declare(strict_types=1);

namespace App\Mail;

use App\Data\Enums\FeedbackType;
use App\Http\Requests\UserFeedbackRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackReceived extends Mailable
{
    use Queueable, SerializesModels;

    protected string $userName;
    protected string $userEmail;
    protected string $userMessage;
    protected int $userType;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(UserFeedbackRequest $request)
    {
        $this->userName = $request->validated('name');
        $this->userEmail = $request->validated('email');
        $this->userMessage = $request->validated('message');
        $this->userType = (int) $request->validated('subject');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        $subject = FeedbackType::from($this->userType);

        return $this
            ->markdown('emails.feedback')
            ->tag('feedback')
            ->metadata('subject', $subject->getText())
            ->with([
                'name' => $this->userName,
                'email' => $this->userEmail,
                'message' => $this->userMessage,
                'subject' => $subject->getText(),
            ]);
    }
}
