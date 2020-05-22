<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateauthAPIRequest;
use App\Http\Requests\API\UpdateauthAPIRequest;
use App\Models\User;

use App\Repositories\authRepository;
use App\Repositories\ContactRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;


/**
 * Class authController
 * @package App\Http\Controllers\API
 */

class authAPIController extends AppBaseController
{
    /** @var  authRepository */
    private $authRepository;
    /** @var  ContactRepository */
    private $contactRepository;

    public function __construct(authRepository $authRepo, ContactRepository $contactRepo)
    {
        $this->authRepository = $authRepo;
        $this->contactRepository = $contactRepo;
    }

    /**
     * Login.
     * POST /auths/login
     *
     * @param Request $request
     * @return Response
     */

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'message' => 'Validation Error',
                'validation'=>$validator->errors()->toArray()
            ]);
        }

        $users = User::where('email', $request['email'])->get();

        if (count($users) > 0) {
            $user = $users[0];
            if (Hash::check($request['password'], $user->password)) {

                /* Make Token */
                    $user->updateUserToken();

                return Response::json([
                    'token' => $user->token,
                    'success' => true,
                    'message' => 'login Successed'
                ]);
            }
        }

        return Response::json([
            'success' => false,
            'message' => 'login Failed'
        ]);
    }

    /**
     * Login.
     * POST /auths/register
     *
     * @param Request $request
     * @return Response
     */

    public function register(CreateauthAPIRequest $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255'
        ]);

        if ($validator->fails()) {

            $message = 'Validation Error';

            $errors = $validator->errors()->toArray();
            if (!empty($errors['email'])) {
                $messages = $errors['email'];
                if (is_array($messages)) {
                    $message = $messages[0];
                }
            }

            return Response::json([
                'success' => false,
                'message' => $message,
                'validation'=>$validator->errors()->toArray()
            ]);
        }

        $input = $request->all();

        $preRegistered = User::where('email', $request['email'])->get();

        if (count($preRegistered) > 0) {
            return Response::json([
                'success' => false,
                'message' => 'Same Email Already exist!'
            ]);
        }

        $input['password'] = Hash::make($input['password']);

        $auth = $this->authRepository->create($input);

        return $this->sendResponse($auth['email'], 'Registered successfully');
    }

    /**
     * Login.
     * POST /auths/update_email
     *
     * @param Request $request
     * @return Response
     */

    public function update_email(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'message' => 'Validation Error',
                'validation'=>$validator->errors()->toArray()
            ]);
        }

        /* Get: Parameter */
            $input = $request->only([
                'email'
            ]);

        /* Get: User Id */
            $user = $this->checkToken($request['token']);

        $updateUser = $user->update($input);

        return $this->sendResponse($user['email'], 'Updated successfully!');
    }

    /**
     * setContactInfo.
     * POST /set_contact_info
     *
     * @param Request $request
     * @return Response
     */

    public function setContactInfo (Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'message' => 'Validation Error',
                'validation'=>$validator->errors()->toArray()
            ]);
        }

        /* Set: Default Response */
            $response = [
                'success' => false,
                'message' => 'Not successed'
            ];

        /* Get: Parameter */
            $input = $request->only([
                'email',
                'message'
            ]);

        /* Get: User Id */
            $user = $this->checkToken($request['token']);
            $input['user_id'] = $user->id;

        /* Get: Data */
            if (!empty($input)) {
                /* Condition */
                $result = $this->contactRepository->create($input);
            }

        /* Check Data */
            if (!empty($result)) {
                $response = [
                    'success' => true,
                    'data' => $result,
                    'message' => 'Successfully set!'
                ];
            }

        return Response::json($response);
    }
}
