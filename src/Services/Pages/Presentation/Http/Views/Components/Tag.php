<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Views\Components;

use App\Data\Database\Eloquent\Models\TagModel as TagModel;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tag extends Component
{
    public function __construct(private readonly TagModel $tag)
    {
    }

    public function render(): View
    {
        return $this->view('themes.default.components.tag')
            ->with('text', $this->tag->name);
    }
}
