<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use JWTFactory;

class AuthController extends Controller
{


    public function login(Request $request)
    {
      $credentials = $request->only(['email', 'password']);

      if (! $token = JWTAuth::attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
      }
      return $this->respondWithToken($token);
    }

    public function logout( Request $request ) {

        $token = $request->header( 'Authorization' );

        try {
            JWTAuth::parseToken()->invalidate( $token );

            return response()->json( [
                'error'   => false,
                'message' => trans( 'auth.logged_out' )
            ] );
        } catch ( TokenExpiredException $exception ) {
            return response()->json( [
                'error'   => true,
                'message' => trans( 'auth.token.expired' )

            ], 401 );
        } catch ( TokenInvalidException $exception ) {
            return response()->json( [
                'error'   => true,
                'message' => trans( 'auth.token.invalid' )
            ], 401 );

        } catch ( JWTException $exception ) {
            return response()->json( [
                'error'   => true,
                'message' => trans( 'auth.token.missing' )
            ], 500 );
        }
    }

    protected function respondWithToken($token)
    {
      return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => JWTFactory::getTTL() * 60
      ]);
    }
}
