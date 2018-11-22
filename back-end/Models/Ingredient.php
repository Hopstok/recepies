<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Ingredient
 */
class Ingredient extends Model
{
    protected $fillable = ['name'];

    protected $table = 'ingredients';

    /**
     * Get the ingredients.
     *
     * @param int|null $id
     *
     * @return Ingredient[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getIngedients(int $id = null)
    {
        if ($id !== null) {
            return self::find(1);
        } else {
            return self::find($id);
        }
    }

    /**
     *
     *
     * @return BelongsToMany
     */
    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany('App/Models/Recipe','recipes_ingredients','ingredient_id','recipe_id');
    }
}
