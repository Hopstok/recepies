<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    /** @var array $fillable */
    protected $fillable = ['name'];

    /** @var array $hidden */
    protected $hidden = ['updated_at', 'created_at'];

    /**
     * Method to get all Ingredients.
     *
     * @return Collection
     */
    public static function getAllIngredient(): Collection
    {
        return self::all();
    }

    /**
     * Method to get specified Ingredient.
     *
     * @param $id
     *
     * @return Model|null
     */
    public static function getSpecifiedIngredients($id)
    {
        return self::find($id);
    }

    /**
     * Method to create n Ingredient.
     *
     * @param $name
     *
     * @return Model
     */
    public static function createIngredients($name)
    {
        $ingredient = self::where('name', $name)
            ->get();

        if (count($ingredient) === 0) {

            $ingredient = self::create([
                'name' => $name
            ]);
        }

        return $ingredient;
    }

    /**
     * Method to delete an Ingredient.
     * @param $id
     *
     * @return bool
     */
    public static function deleteIngredient($id): bool
    {
        $ret = false;
        $ingredient =  self::find($id);
        if ($ingredient !== null){
            $ret = $ingredient->delete();
        }

        return $ret;
    }

    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany('App/Model/Recipe','recipes_ingredients','ingredient_id','recipe_id');
    }
}
