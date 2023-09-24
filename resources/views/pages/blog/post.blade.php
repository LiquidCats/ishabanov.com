@php
    /** @var App\Data\Database\Eloquent\Models\Post $post */
    $title = $post->title;
    $content = $post->content
@endphp
<div>{{ $title }}</div>
<div>{{ $content }}</div>
<hr/>
