<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $us = $us = $this->user->all();
        return response()->json(['code' => 200, 'status' => 'success', 'data' => $us], 200);
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        //create Rules @TODO manca la transaction
        $params             = $request->input();
        $password           = password_hash($params['password'], PASSWORD_BCRYPT);
        $params['password'] = $password;
        $us = $this->user->create($params);
        // @TODO manca l'invio delle email

        return response()->json(['code' => 200, 'status' => 'success', 'data' => $us], 200);

    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $us = $this->user->select('name', 'surname', 'username', 'email')
            ->where('id', '=', $id)
            ->first();

        if (is_null($us)) {
            return response()->json(['code' => 404, 'status' => 'unsuccess']);
        } else {
            return response()->json(['code' => 200, 'status' => 'success', 'data' => $us], 200);
        }
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        //update Rules @TODO manca anche la transaction
        $params = $request->input();

        if (isset($params['password'])) {
            $password           = password_hash($params['password'], PASSWORD_BCRYPT);
            $params['password'] = $password;
        }

        $us = $this->user->where('id', '=', $id)
            ->update($params);

        if ($us === 1) {
            // @TODO manca l'invio delle email
            return response()->json(['code' => 200, 'status' => 'success'], 200);
        } else {
            return response()->json(['code' => 404, 'status' => 'unsuccess', 'message' => 'User not found']);

        }
    }

    /**
     * Fucntion that implement the login of a new user
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        // @TODO mancano le validation
        // @TODO manca l'autentiacation.

        $params     = $request->input();
        $email      = $params['email'];
        $password   = $params['password'];

        //tiro su dalla request la email faccio la query nel database e cerco l'ash della password associata alla email.

        $us = $this->user->select('password')
            ->where('email','=',$email)
            ->first();

        if (is_null($us)) {
            return response()->json(['code' => 404, 'status' => 'unsuccess','message' => "User not found"]);
        } else {

            $flag = password_verify($password, $us['password']);

            if ($flag === true) {

                return response()->json(['code' => 200, 'status' => 'success', 'token' => "TOKEN"], 200);

            } else {

                return response()->json(['code' => 404, 'status' => 'unsuccess', 'message' => 'Wrong password']);

            }

        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function recover(Request $request): JsonResponse
    {
        // @TODO mancano le validation
        $params         = $request->input();
        $email          = $params['email'];
        $newPassword    = $params['password'];

        $us = $this->user->select('id')
            ->where('email','=',$email)
            ->first();

        if (is_null($us)) {

            return response()->json(['code' => 404, 'status' => 'unsuccess','message' => "User not found"]);

        } else {
            // @TODO aggiorno la password e invio la email.
            $id             = $us['id'];
            $newPassword    = password_hash($newPassword, PASSWORD_BCRYPT);
            $us             = $this->user->where('id', '=', $id)
                                ->update(array('password' => $newPassword));

            if ($us === 1) {
                // @TODO invio della email con password
                return response()->json(['code' => 200, 'status' => 'success'], 200);
            } else {
                return response()->json(['code' => 404, 'status' => 'unsuccess', 'message' => 'User not found']);
            }
        }
    }
}

