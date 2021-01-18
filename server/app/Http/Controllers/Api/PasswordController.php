<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PasswordController extends Controller
{
    public function forgot(Request $request)
    {
        $email = $request->email;    
        $token = Str::random(12);  
        
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
        ]);

        Mail::send('emails.reset', ['token' => $token], function(Message $message) use ($email){
            $message->subject('Recupere sua senha!');
            $message->to($email);
        });

        return response()->json([
            'message' => 'Check your email!'
        ]);
    }

    public function reset(ResetRequest $request)
    {
        $passwordReset = DB::table('password_resets')
        ->where('token', $request->token)->first();    

        if(!$user = User::where('email', $passwordReset->email)->first())
        {
            throw new NotFoundHttpException('User not found');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'message' => 'success'
        ], Response::HTTP_OK);
    }
}
