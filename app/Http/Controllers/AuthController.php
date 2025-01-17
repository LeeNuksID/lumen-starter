<?php

namespace App\Http\Controllers;

use App\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    /**
     * Controller constructor.
     *
     * @param  \App\Auth  $auth
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse{
        $token = $this->auth->authenticateUsernameAndPassword(
            (string) $request->input('username'),
            (string) $request->input('password')
        );

        return response()->json($token, Response::HTTP_OK);
    }

    /**
     * Register then get JWT via given credentials.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request): JsonResponse
    {

        if (!$request->input('username')) {
            return response()->json(['error' => 'username dibutuhkan']);
        }elseif(!$request->input('password')){
            return response()->json(['error' => 'password dibutuhkan']);
        }
        
        User::create([
            'username'  => $request->input('username'),
            'password'  => $request->input('password')
        ]);

        $token = $this->auth->authenticateUsernameAndPassword(
            (string) $request->input('username'),
            (string) $request->input('password')
        );

        return response()->json($token, Response::HTTP_OK);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(): JsonResponse
    {
        $user = $this->auth->getAuthenticatedUser();

        return response()->json($user, Response::HTTP_OK);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(): JsonResponse
    {
        $token = $this->auth->refreshAuthenticationToken();

        return response()->json($token, Response::HTTP_OK);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(): JsonResponse
    {
        $this->auth->invalidateAuthenticationToken();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function update_email(Request $request, $id){
        $update = User::find($id)->update([
            'username'     => $request->username
        ]);
        if ($update) {
            return response()->json('success');
        }else{
            return response()->json('failed');
        }
    }

    public function update_pw(Request $request, $id){
        $update = User::find($id)->update([
            'password'     => $request->password
        ]);
        if ($update) {
            return response()->json('success');
        }else{
            return response()->json('failed');
        }
    }
}
