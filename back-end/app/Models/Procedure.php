<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Procedure extends Model
{
    /** @var string $table */
    protected $table = 'procedures';

    /** @var array $fillable */
    protected $fillable = ['recipe_id', 'step'];

    /** @var array $hidden */
    protected $hidden = ['created_at', 'updated_at'];

    public function recipe(): BelongsTo
    {
        return $this->belongsTo('Recipe');
    }
}
