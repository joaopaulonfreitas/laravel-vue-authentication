<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthController extends Controller
{
    public function hello()
    {
        return 'Hello from controller';
    }

    public function register(RegisterRequest $request)
    {
        try{

            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);        
            $user->save();

            return response()->json($user, Response::HTTP_CREATED);

        }
        catch(Exception $e)
        {
            return response()->json([
                'error' => $e->getMessage()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }


    public function login(Request $request)
    {
        try{

            if(!Auth::attempt($request->only('email', 'password')))
            {
                return response()->json([
                    'error' => __('auth.unauthorized')
                ], Response::HTTP_UNAUTHORIZED);
            }

            $user = Auth::user();

            $token = $user->createToken('tokenUserlogin')->plainTextToken;
            $cookie = cookie('tokenUserlogin', $token, 60 * 24);

            return response()->json([
                'token' => $token
            ])->withCookie($cookie);

        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }

    }

    public function user(Request $request)
    {
        try{
           
           return response()->json($request->user());

        }catch(Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }

    }

    public function logout(Request $request)
    {
        try{

            $cookie = Cookie::forget('tokenUserlogin');
            
            return response()->json([
                'message' => 'success'
            ])->withCookie($cookie);

        }catch(Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }

    }

}
