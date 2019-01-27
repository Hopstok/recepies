<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Procedure as ProcedureReq;
use App\Repositories\Implementations\Procedure as ProcedureImp;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProceduresController extends Controller
{
    /** @var ProcedureImp $procedureImp */
    private $procedureImp;

    public function __construct (ProcedureImp $procedureImp)
    {
        $this->procedureImp = $procedureImp;
    }

    /**
     * Get all Procedure from DB.
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
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $data = $this->procedureImp->getById($id);

        return response()->json(['data' => $data], self::OK);
    }

    /**
     * Method to create a Procedure.
     *
     * @param ProcedureReq $request
     *
     * @return JsonResponse
     */
    public function create(ProcedureReq $request): JsonResponse
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
     * @param int $id
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
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
     * @param int $id
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
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
