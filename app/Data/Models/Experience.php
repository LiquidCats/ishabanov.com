<?php

namespace App\Data\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Experience.
 *
 * @property int         $id
 * @property string      $company_name
 * @property string      $company_url
 * @property string      $company_logo
 * @property string      $position
 * @property string      $description
 * @property Carbon      $started_at
 * @property Carbon|null $ended_at
 */
class Experience extends Model
{
    use HasFactory;

    protected $casts = [
        'company_name' => 'string',
        'company_url' => 'string',
        'company_logo' => 'string',
        'position' => 'string',
        'description' => 'string',
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    protected $dates = [
        'started_at',
        'ended_at',
    ];
}
