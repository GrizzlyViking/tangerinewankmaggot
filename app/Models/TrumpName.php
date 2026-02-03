<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property string $name
 * @property string $author
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */
class TrumpName extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'author',
    ];

    protected array $dates = [
        'deleted_at',
    ];
}
