<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Users;
use App\Mail\Recover;
use App\Mail\Welcome;
use App\Repositories\Implementations\UserImpl;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Exception;

class UsersController extends Controller
{

    private $userImp;
    private $user;
    private $email;

    public function __construct(User $user, Mailer $email, UserImpl $userImp)
    {
        $this->user = $user;
        $this->email = $email;
        $this->userImp = $userImp;
    }

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = $this->userImp->getAll();

        return response()->json(['data' => $data], self::OK);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $data = $this->userImp->getById($id);

        return response()->json(['data' => $data], self::OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Users $request
     * @return JsonResponse
     */
    public function create(Users $request): JsonResponse
    {
        $params             = $request->input();
        $password           = password_hash($params['password'], PASSWORD_BCRYPT);
        $params['password'] = $password;
        $us = $this->userImp->create($params);
        if (!empty($us)) {
            $res =  response()->json(['data' => $us], self::OK);
            $this->email->to($params['email'])->send(new Welcome($us));
        } else {
            $res = response()->json(['data' => $us], self::NOT_CREATED);
        }

        return $res;
    }

    /**
     * Method to delete a Recipe.
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function delete($id)
    {
        $data = $this->userImp->delete($id);
        if ($data === true) {
            $response = response()->json(['data' => $data], self::OK);
        } else {
            $response = response()->json(['message' => 'Resource not found' ], self::NOT_FOUND);
        }

        return $response;
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
     * Metodo che consente di modificare la password dopo aver richiesto il recover
     * @param Request $request
     * @return JsonResponse
     */
    public function passwordrecover(Request $request): JsonResponse
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

    /** Metodo che consente di richiedere il recover della password
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
