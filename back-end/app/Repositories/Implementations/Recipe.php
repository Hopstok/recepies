<?php declare(strict_types=1);

namespace App\Repositories\Implementations;

use App\Models\Recipe as RecipeModel;
use App\Repositories\Interfaces\Recipe as RecipeInt;

class Recipe extends Common implements RecipeInt
{
    /** @var RecipeModel $recipeù */
    private $recipe;

    public function __construct (RecipeModel $recipe)
    {
        parent::__construct($recipe);

        $this->recipe = $recipe;
    }
}
