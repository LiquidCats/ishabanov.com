<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Views\Components\Posts;

use App\Data\Database\Eloquent\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function route;

class PrevNext extends Component
{
    public function __construct(
        private readonly ?Post $post,
        private readonly string $type = 'next'
    ) {
    }

    public function shouldRender(): bool
    {
        return $this->post !== null;
    }

    public function render(): View
    {
        return view('themes.default.components.posts.prev-next')
            ->with('link', $this->getLink())
            ->with('title', $this->post->title)
            ->with('type', $this->type);
    }

    protected function getLink(): string
    {
        if ($this->shouldRender()) {
            return route('pages.blog.post', ['post_id' => $this->post?->getKey()]);
        }

        return '#';
    }
}
