<?php

declare(strict_types=1);

namespace App\Data\Database\Eloquent\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $hash
 * @property string $type
 * @property string $path
 * @property string $extension
 * @property string $name
 * @property int $file_size
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 */
class File extends Model
{
    protected $primaryKey = 'hash';

    protected $keyType = 'string';

    protected $casts = [
        'hash' => 'string',
        'type' => 'string',
        'path' => 'string',
        'extension' => 'string',
        'name' => 'string',
        'file_size' => 'int',
    ];
}
