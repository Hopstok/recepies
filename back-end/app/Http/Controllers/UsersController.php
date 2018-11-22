<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Mail\Recover;
use App\Mail\Welcome;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Exception;

/**
 * Class UsersController
 */
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $user = new User();
            $list = $user->getAll();
        } catch (Exception $e) {
            return response()->json(['code' => 400, 'status' => 'unsuccess','exception' => $e->getMessage()],400);
        }
        return response()->json(['code' => 200, 'status' => 'success', 'data' => $list], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $params             = $request->input();
        $password           = password_hash($params['password'], PASSWORD_BCRYPT);
        $params['password'] = $password;

        try {
            $us = $this->user->create($params);
            $this->email->to($params['email'])->send(new Welcome($us));
        } catch(Exception $e) {
            return response()->json(['code' => 400, 'status' => 'unsuccess','exception' => $e->getMessage()],400);
        }
        return response()->json(['code' => 200, 'status' => 'success', 'data' => $us], 200);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $us = $this->user->select('name', 'surname', 'username', 'email')
                ->where('id', '=', $id)
                ->first();
        } catch (Exception $e) {
            return response()->json(['code' => 400, 'status' => 'unsuccess','exception' => $e->getMessage()],400);
        }

        if (is_null($us)) {
            return response()->json(['code' => 404, 'status' => 'unsuccess']);
        } else {
            return response()->json(['code' => 200, 'status' => 'success', 'data' => $us], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $params = $request->input();

        if (isset($params['password'])) {
            $password           = password_hash($params['password'], PASSWORD_BCRYPT);
            $params['password'] = $password;
        }

        try {
            $us = $this->user->where('id', '=', $id)
                ->update($params);
        } catch (Exception $e) {
            return response()->json(['code' => 400, 'status' => 'unsuccess','exception' => $e->getMessage()],400);
        }

        if ($us === 1) {
            return response()->json(['code' => 200, 'status' => 'success'], 200);
        } else {
            return response()->json(['code' => 404, 'status' => 'unsuccess', 'message' => 'User not found']);

        }
    }

    /**
     * Fucntion that implement the login of a new user.
     *
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
        try {
            $us = $this->user->select('password')
                ->where('email', '=', $email)
                ->first();
        } catch (Exception $e) {
            return response()->json(['code' => 400, 'status' => 'unsuccess','exception' => $e->getMessage()],400);
        }

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
     * Metodo che consente di modificare la password dopo aver richiesto il recover.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function recover(Request $request): JsonResponse
    {
        // @TODO mancano le validation
        $params         = $request->input();
        $email          = $params['email'];
        $newPassword    = $params['password'];

        try {
            $user = $this->user->select('id')
                ->where('email', '=', $email)
                ->first();
        } catch (Exception $e) {
            return response()->json(['code' => 400, 'status' => 'unsuccess','exception' => $e->getMessage()],400);
        }

        if (is_null($user)) {

            return response()->json(['code' => 404, 'status' => 'unsuccess','message' => "User not found"]);

        } else {

            $id             = $user['id'];
            $newPassword    = password_hash($newPassword, PASSWORD_BCRYPT);
            $us             = $this->user->where('id', '=', $id)
                                ->update(array('password' => $newPassword));

            if ($us === 1) {
                return response()->json(['code' => 200, 'status' => 'success'], 200);
            } else {
                return response()->json(['code' => 404, 'status' => 'unsuccess', 'message' => 'User not found']);
            }
        }
    }

    /** Metodo che consente di richiedere il recover della password.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function passwordreset(Request $request): JsonResponse
    {

        $params         = $request->input();
        $email          = $params['email'];

        try {
            $user = $this->user->select('id')
                ->where('email', '=', $email)
                ->first();
            $this->email->to($params['email'])->send(new Recover($user));
        }catch (Exception $e) {
            return response()->json(['code' => 400, 'status' => 'unsuccess','exception' => $e->getMessage()],400);
        }
        return response()->json(['code' => 200, 'status' => 'success'], 200);
    }
}

