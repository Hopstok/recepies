<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Procedure extends Model
{
    protected $table = ''
    protected $fillable = ['name'];

    public function recipe(): BelongsTo
    {
        return $this->belongsTo('App/Recipe');
    }
}
