<?php
 
namespace App\View\Composers; 
use Session;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Users_model;
 
class ProfileComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
   
 
    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct()
    {
       
    }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    { 
        $profile_data=array();
        if (session()->has('admin_token')) {                
            $token=\Session::get('admin_token'); 
            $profile_data['profile_data']=Users_model::where('token',$token)->first();  
            $profile_data['prefix']=url(\Request::route()->getPrefix());      
        } else if(session()->has('store_token')){              
            $token=\Session::get('store_token');  
            $profile_data['profile_data']=Users_model::where('token',$token)->first();  
            $profile_data['prefix']=url(\Request::route()->getPrefix());      
        } else if(session()->has('purchase_token')){               
            $token=\Session::get('purchase_token');  
            $profile_data['profile_data']=Users_model::where('token',$token)->first();  
            $profile_data['prefix']=url(\Request::route()->getPrefix());      
        } else {
            $token="";  
        }

        // $profile_data['profile_data']=Users_model::where('token',$token)->first();      
        $view->with('profile_data', $profile_data);
    }
}