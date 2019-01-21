<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Recipes;
use App\Repositories\Implementations\RecipeImpl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    /** @var RecipeImpl $recipeImp */
    private $recipeImp;

    public function __construct(RecipeImpl $recipeImp)
    {
        $this->recipeImp = $recipeImp;
    }

    /**
     * Get all Recipes from DB.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = $this->recipeImp->getAll();

        return response()->json(['data' => $data], self::OK);
    }

    /**
     * Get the specified Recipe from DB.
     *
     * @param int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $data = $this->recipeImp->getById($id);

        return response()->json(['data' => $data], self::OK);
    }

    /**
     * Method to create a Recipe.
     *
     * @param Recipes $request
     *
     * @return JsonResponse
     */
    public function create(Recipes $request): JsonResponse
    {
        $params = $request->input();

        $recipe =  $this->recipeImp->create($params);

        if (!empty($recipe)) {
            $res =  response()->json(['data' => $recipe], self::OK);
        } else {
            $res = response()->json(['data' => $recipe], self::NOT_CREATED);
        }

        return $res;
    }

    /**
     * Method to delete a Recipe.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $data = $this->recipeImp->delete($id);
        if ($data === true) {
            $response = response()->json(['data' => $data], self::OK);
        } else {
            $response = response()->json(['message' => 'Resource not found' ], self::NOT_FOUND);
        }

        return $response;
    }

    /**
     * Method to update Recipe data.
     *
     * @param int $id
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
    {
        $params = $request->input();
        $data = $this->recipeImp->update($id, $params);
        if ($data === true) {
            $response = response()->json(['data' => $data], self::OK);
        } else {
            $response = response()->json(['message' => 'Resource not found' ], self::NOT_FOUND);
        }

        return $response;
    }
}
