<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Presenters;

use App\Domains\Blocks\Contracts\PresenterContract;
use App\Domains\Blocks\Enums\BlockType;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\Uid\AbstractUid;
use Symfony\Component\Uid\Uuid;

readonly class RemarkPresenter implements Arrayable, PresenterContract
{
    public function __construct(
        public BlockType $type,
        public AbstractUid $key,
        public Collection $content,
    ) {
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'key' => $this->key->toRfc4122(),
            'content' => $this->content->toArray(),
        ];
    }

    public static function createAs(
        BlockType $type,
        #[ArrayShape([
            'key' => 'string',
            'content' => Collection::class,
        ])] array $data,
    ): self {
        $key = Uuid::isValid($data['key'] ?? '')
           ? Uuid::fromString($data['key'])
           : Uuid::v7();

        return new static(
            type: $type,
            key: $key,
            content: $data['content'],
        );
    }
}
