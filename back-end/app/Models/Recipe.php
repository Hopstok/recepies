<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Recipe extends Model
{
    /** @var string $table */
    protected $table = 'recipes';

    /** @var array $fillable */
    protected $fillable = ['name', 'people', 'user_id'];

    /** @var array $hidden */
    protected $hidden = ['created_at', 'updated_at'];

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany('Ingredient', 'recipes_ingredients', 'recipe_id', 'ingredients_id');
    }

    public function procedures(): HasMany
    {
        return $this->hasMany('Procedure');
    }

    public function users(): HasOne
    {
        return $this->hasOne('User');
    }
}
