<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Recipe
 */
class Recipe extends Model
{
    protected $fillable = ['name','people'];

    /**
     * @return BelongsToMany
     */
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany('App/Model/Ingredient','recipes_ingredients','recipe_id','ingredients_id');
    }

    public function procedures(): HasMany
    {
        return $this->hasMany('App/Procedure');
    }

}
