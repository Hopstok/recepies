<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\JsonResponse;

/**
 * Class IngredientsController.
 */
class IngredientsController extends Controller
{
    /**
     * Get all ingredients.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $ingredients = new Ingredient();

        return response()->json(['data' => $ingredients->getIngedients()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ingredients = new Ingredient();

        return response()->json(['data'=> $ingredients->getIngedients($id)], 200);
    }
}
