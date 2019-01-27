<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Ingredient as IngredientReq;
use App\Repositories\Implementations\Ingredient as IngredientImp;
use Illuminate\Http\JsonResponse;

class IngredientsController extends Controller
{
    /** @var IngredientImp $ingredientImp */
    private $ingredientImp;

    public function __construct(IngredientImp $ingredientImp)
    {
        $this->ingredientImp = $ingredientImp;
    }

    /**
     * Get all Ingredient from DB.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = $this->ingredientImp->getAll();

        return response()->json(['data' => $data], self::OK);
    }

    /**
     * Get the specified Ingredient from DB.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $data = $this->ingredientImp->getById($id);

        return response()->json(['data' => $data], self::OK);
    }

    /**
     * Method to create an Ingredient.
     *
     * @param IngredientReq $request
     *
     * @return JsonResponse
     */
    public function create(IngredientReq $request): JsonResponse
    {
        $name = $request->input('name');

        $ingredients = $this->ingredientImp->create(['name' => $name]);

        if (!empty($ingredients)) {
            $res =  response()->json(['data' => $ingredients], self::OK);
        } else {
            $res = response()->json(['data' => $ingredients], self::NOT_CREATED);
        }

        return $res;
    }

    /**
     * Method to delete an Ingredient.
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function delete(int $id)
    {
        $data = $this->ingredientImp->delete($id);
        if ($data === true) {
            $response = response()->json(['data' => $data], self::OK);
        } else {
            $response = response()->json(['message' => 'Resource not found' ], self::NOT_FOUND);
        }

        return $response;
    }
}
