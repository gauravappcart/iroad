<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users_model;

class AuthenticateWithApiToken
{
    // public function handle(Request $request, Closure $next)
    // {
    //     $token = $request->bearerToken();
    //     if (!$token || !$user = Users_model::where('api_token', $token)->first()) {
    //         return response()->json(['message' => 'Unauthorized'], 401);
    //         return response()->json(['status'=>false,'msg'=>'Invalid User.']);
    //     }

    //     // Auth::login($user);

    //     return $next($request);
    // }


    public function handle(Request $request, Closure $next)
    {

        $authorizationHeader = $request->header('Authorization');

        $token = null;
        if (preg_match('/Bearer\s+(\S+)/', $authorizationHeader, $matches)) {
            $request['token'] = $token = $matches[1];
        }

        if($token)
            {
              $user = Users_model::select('*')->where('api_token',$token)->first();

              if(empty($user))
              {
                  return response()->json(['status'=>false,'msg'=>'Invalid User.']);
                //   return response()->json(['status'=>false,'msg'=>'Session Expired ! Please Logged In Again.']);
              } else {
                $request['logged_user']=$user->toArray();
              }
            } else {

                return response()->json(['status'=>false,'msg'=>'Invalid User.']);
            }

        return $next($request);
    }
}
