<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Procedures;
use App\Repositories\Implementations\ProcedureImpl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProceduresController extends Controller
{
    private $procedureImp;

    public function __construct (ProcedureImpl $procedureImp)
    {
        $this->procedureImp = $procedureImp;
    }

    /**
     * Get all Procedures from DB.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = $this->procedureImp->getAll();

        return response()->json(['data' => $data], self::OK);
    }

    /**
     * Get the specified Procedure from DB.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $data = $this->procedureImp->getById($id);

        return response()->json(['data' => $data], self::OK);
    }

    /**
     * Method to create a Procedure.
     *
     * @param Procedures $request
     *
     * @return JsonResponse
     */
    public function create(Procedures $request): JsonResponse
    {
        $params = $request->input();

        $procedures = $this->procedureImp->create($params);

        if (!empty($procedures)) {
            $res =  response()->json(['data' => $procedures], self::OK);
        } else {
            $res = response()->json(['data' => $procedures], self::NOT_CREATED);
        }

        return $res;
    }

    /**
     * Method to delete a Procedure.
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function delete($id)
    {
        $data = $this->procedureImp->delete($id);
        if ($data === true) {
            $response = response()->json(['data' => $data], self::OK);
        } else {
            $response = response()->json(['message' => 'Resource not found' ], self::NOT_FOUND);
        }

        return $response;
    }

    /**
     * Method to update Procedure data.
     *
     * @param $id
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update($id, Request $request)
    {
        $params = $request->input();
        $data = $this->procedureImp->update($id, $params);
        if ($data === true) {
            $response = response()->json(['data' => $data], self::OK);
        } else {
            $response = response()->json(['message' => 'Resource not found' ], self::NOT_FOUND);
        }

        return $response;
    }
}
