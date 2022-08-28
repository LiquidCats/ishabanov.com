@component('mail::message')
    # Feedback Received

    - User: {{ $name }}
    - Email: {{ $email }}
    - Message: {{ $message }}
    - Subject: {{ $subject }}

    ENV: {{ app()->environment() }}
@endcomponent
