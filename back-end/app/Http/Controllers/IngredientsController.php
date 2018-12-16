<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Ingredients;
use App\Models\Ingredient;
use Illuminate\Http\JsonResponse;

class IngredientsController extends Controller
{
    /**
     * Get all ingredients from DB.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = Ingredient::getAllIngredient();
        return response()->json(['data' => $data ], self::OK);

    }

    /**
     * Get the specified ingredients from DB.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): JsonResponse
    {
        $data = Ingredient::getSpecifiedIngredients($id);
        return response()->json(['data' => $data ], self::OK);

    }

    /**
     * Method to create an Ingredient.
     *
     * @param Ingredients $request
     *
     * @return JsonResponse
     */
    public function create(Ingredients $request): JsonResponse
    {
        $name = $request->input('name');
        $newIngredient = Ingredient::createIngredients($name);
        return response()->json(['data' => $newIngredient], self::OK);

    }

    /**
     * Method to delete an Ingredient.
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function delete($id)
    {
        $deleteIngredient = Ingredient::deleteIngredient($id);
        if ($deleteIngredient === true) {
            return response()->json(['data' => $deleteIngredient], self::OK);
        } else {
            return response()->json(['message' => 'Resource not found' ], self::NOT_FOUND);
        }
    }

}
