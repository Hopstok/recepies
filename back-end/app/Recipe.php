<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipe extends Model
{
    protected $fillable = ['name','people'];

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany('App/Ingredient','recipes_ingredients','recipe_id','ingredients_id');
    }

}
