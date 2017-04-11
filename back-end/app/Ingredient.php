<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    protected $fillable = ['name'];

    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany('App/Recipe','recipes_ingredients','ingredient_id','recipe_id');
    }
}
