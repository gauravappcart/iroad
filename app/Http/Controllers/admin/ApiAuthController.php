<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Sites_model;
use App\Models\Users_model;
#use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        echo Hash::make('123456')."<br>";exit;
        // dd("TEST");
        // dd($request->all());
        // dd($request->email);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Users_model::where('email_id', $request->email)->first();
        // dd($user->password);
        // if (!$user || !Hash::check($request->password, $user->password)) {
        if (!$user || !Hash::check($request['password'].config('global.passkey'), $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = Str::random(60);

        $user->api_token = hash('sha256', $token);
        $user->save();

        return response()->json(['api_token' => hash('sha256', $token), 'token_type' => 'Bearer','company_id'=>$user->company_id]);
        // return response()->json(['api_token' => $token, 'token_type' => 'Bearer','company_id'=>$user->company_id]);
    }

    function sitesList(Request $request){
        $result['sites']=Sites_model::with('associated_project_components')->where('company_id',$request->company_id)->get();
        if(count($result['sites'])>0){
            return response()->json(
        ['data' => $result,
         'message' => 'Site List Found',
         'status'=>true
        ],200);
        }else{
            return response()->json(
                ['data' => $result,
                 'message' => 'Site List Not Found',
                 'status'=>false
                ],200);
        }
    }

    public function logout(Request $request)
    {
        $api_token = $request->bearerToken();
        $update=Users_model::where('api_token',$api_token)->update(['api_token'=>null]);
        if($update){
            return response()->json(['data' => '',
            'message' => 'User Logged Out Successfully.',
            'status'=>true
           ],200);
        }else{
            return response()->json(['data' => '',
            'message' => 'Something Went Wrong,Please Try Again.',
            'status'=>false
           ],200);
        }
    }

    public function projects_details_save(Request $request){
            dd($request->all());
    }
}
