<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Resources;

use App\Data\Database\Eloquent\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

/**
 * @property-read UserModel $resource
 */
class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var UserModel $user */
        $user = Auth::user();

        return [
            'id' => $this->resource->getKey()->value,
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'is_current_user' => $user === null ? null : $this->resource->getKey()->equals($user->getKey()),
            'is_verified' => $this->resource?->email_verified_at !== null,
            'has_2fa' => $this->resource?->g2fa_secret !== null,
            //
            'posts_count' => $this->resource->getAttribute('posts_count'),
            //
            'posts' => PostResource::collection($this->whenLoaded('posts')),
        ];
    }
}
