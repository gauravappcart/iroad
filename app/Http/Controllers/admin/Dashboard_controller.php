<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

use App\Models\Users_model;
use App\Models\Machines_model;
use App\Models\Material_model;
use App\Models\Activity_model;
use App\Models\Asset;
use App\Models\Departments;
use App\Models\Designations_model;
use App\Models\Labour;
use App\Models\Road_components_model;
use App\Models\Roles_model;
use App\Models\Sites_model;
use App\Models\Units;
use App\Scopes\GlobeScope;


class Dashboard_controller extends Controller
{
    //
    public function index()
    {
        // $result['users']=Users_model::whereNotIn('user_role',[1,2])->withTrashed()->get()->count();
        // $result['vendors']=Users_model::where('user_role',2)->withTrashed()->get()->count();
        // $result['machines']=Machines_model::withTrashed()->get()->count();
        // $result['materials']=Material_model::withTrashed()->get()->count();
        // $result['materials_asset']=Asset::withTrashed()->get()->count();
        // $result['activities']=Activity_model::withTrashed()->get()->count();
        // $result['sites']=Sites_model::withTrashed()->get()->count();
        // $result['projectComponents']=Road_components_model::withTrashed()->get()->count();
        // $result['units']=Units::withTrashed()->get()->count();
        // $result['labours']=Labour::withTrashed()->get()->count();
        // $result['designations']=Designations_model::withTrashed()->get()->count();
        // $result['roles']=Roles_model::withTrashed()->get()->count();

        $result['users']=Users_model::where('user_role','!=',1)->where('user_role','!=',2)->get()->count();
        // dd($result['users']);
        $result['vendors']=Users_model::where('user_role',2)->get()->count();
        $result['machines']=Machines_model::get()->count();
        $result['materials']=Material_model::get()->count();
        $result['materials_asset']=Asset::get()->count();
        $result['activities']=Activity_model::get()->count();
        $result['sites']=Sites_model::get()->count();
        $result['projectComponents']=Road_components_model::get()->count();
        $result['units']=Units::get()->count();
        $result['labours']=Labour::get()->count();
        $result['designations']=Designations_model::get()->count();
        $result['roles']=Roles_model::get()->count();

        // $pdf = PDF::loadView('admin/demo_mailer', $result);
        // $pdf->set_paper("a4", "portrait");
        // $output = $pdf->output();
        // file_put_contents('assets/invoice.pdf', $output);
        // PDF::loadView('admin/demo_mailer')
        // ->save('assets/invoice.pdf');
        // return $pdf->download('invoice.pdf');   //download in the desktop

        return view('admin/dashboard',$result);
    }

    public function logout(Request $request)
    {

        switch( $request->route()->getPrefix() ) {
                case '/admin':
                                $request->session()->forget('admin_token');
                                return redirect('admin');
                                break;
                case '/manager':
                                $request->session()->forget('manager_token');
                                return redirect('manager');
                                break;
                case '/store':
                                $request->session()->forget('store_token');
                                return redirect('store');
                                break;
                case '/purchase':
                                $request->session()->forget('purchase_token');
                                return redirect('purchase');
                                break;
                case '/employee': $role=""; break;
                case '/vendor':   $role=""; break;
                default: $role="";
        }

    }

    public function logged_user()
    {
        $request = app(\Illuminate\Http\Request::class);
        $token='';

        switch( $request->route()->getPrefix() ) {
            case '/admin':
                  $role=1;
                  $token=$request->session()->get('admin_token');
// dd(session()->all());
                  break;
            case '/manager':
                  $role=2;
                  $token=$request->session()->get('manager_token');
                  break;
            case '/store':
                 $role=7;
                 $token=$request->session()->get('store_token');
                 break;
            case '/purchase':
                 $role=8;
                 $token=$request->session()->get('purchase_token');
                 break;
            case '/employee': $role=""; break;
            case '/vendor':   $role=""; break;
            default: $role="";
        }


        $logged_user['user']=Users_model::withoutGlobalScopes([
                                            GlobeScope::class,'vendoruser'
                                        ])->select('*')->where(['token'=>$token])->first();
                                        // dd($logged_user['user']);
        $logged_user['route_name']=$request->route()->getName();
        $logged_user['company_id']=!empty($logged_user['user']->company_id)?$logged_user['user']->company_id:"";

        return $logged_user;
    }
}
