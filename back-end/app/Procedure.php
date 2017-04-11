<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Procedure extends Model
{
    protected $fillable = ['name'];

    public function recipe(): BelongsTo
    {
        return $this->belongsTo('App/Recipe');
    }
}
