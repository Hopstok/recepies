<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    protected $fillable = ['name','people'];

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany('App/Ingredient','recipes_ingredients','recipe_id','ingredients_id');
    }

    public function procedures(): HasMany
    {
        return $this->hasMany('App/Procedure');
    }

}
