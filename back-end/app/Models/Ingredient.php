<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    /** @var string $table */
    protected $table = 'recipes_ingredients';

    /** @var array $fillable */
    protected $fillable = ['name'];

    /** @var array $hidden */
    protected $hidden = ['updated_at', 'created_at'];

    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany('App/Model/Recipe', $this->getTable(),'ingredient_id','recipe_id');
    }
}
