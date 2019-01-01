<?php declare(strict_types=1);

namespace App\Repositories\Implementations;

use App\Models\Recipe;
use App\Repositories\Interfaces\RecipeInt;

class RecipeImpl extends CommonImpl implements RecipeInt
{
    private $recipe;

    public function __construct (Recipe $recipe)
    {
        parent::__construct($recipe);

        $this->recipe = $recipe;
    }
}
