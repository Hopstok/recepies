<?php declare(strict_types=1);

namespace App\Repositories\Implementations;

use App\Models\Ingredient;
use App\Repositories\Interfaces\IngredientInt;

/**
 * Class IngredientImpl.
 *
 * The class specialize the common class method. For implement new feature
 * add the firm inside the ingredient interface and implement here the method.
 */
class IngredientImpl extends CommonImpl implements IngredientInt
{
    /** @var Ingredient $ingredient */
    private $ingredient;

    public function __construct(Ingredient $ingredient)
    {
        parent::__construct($ingredient);

        $this->ingredient = $ingredient;
    }
}
