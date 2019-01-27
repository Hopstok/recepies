<?php declare(strict_types=1);

namespace App\Repositories\Implementations;

use App\Models\Ingredient as IngredientModel;
use App\Repositories\Interfaces\Ingredient as IngredientInt;

/**
 * Class Ingredient.
 *
 * The class specialize the common class method. For implement new feature
 * add the firm inside the ingredient interface and implement here the method.
 */
class Ingredient extends Common implements IngredientInt
{
    /** @var IngredientModel $ingredient */
    private $ingredient;

    public function __construct(IngredientModel $ingredient)
    {
        parent::__construct($ingredient);

        $this->ingredient = $ingredient;
    }
}
