<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use App\Admin;

use Closure;

class Adminlogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty(session()->has('adminSession'))){
            return redirect('/admin');
        }else{
            // Get Admin/Sub Admin Details
            $adminDetails = Admin::where('username',session()->get('adminSession'))->first();
            $adminDetails = json_decode(json_encode($adminDetails),true);
            if($adminDetails['type']=="Admin"){
                $adminDetails['categories_full_access']=1;
                $adminDetails['categories_view_access']=1;
                $adminDetails['categories_edit_access']=1;
                $adminDetails['products_access']=1;
                $adminDetails['orders_access']=1;
                $adminDetails['users_access']=1;
            }
            session()->put('adminDetails',$adminDetails);
            /*echo "<pre>"; print_r(Session::get('adminDetails')); die;*/

            // Get Current Path
            $currentPath= Route::getFacadeRoot()->current()->uri();

            if($currentPath=="admin/view-categories" && session()->get('adminDetails')['categories_view_access']==0){
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }

            if($currentPath=="admin/view-products" && session()->get('adminDetails')['products_access']==0){
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }

            if($currentPath=="admin/add-product" && session()->get('adminDetails')['products_access']==0){
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }

        }
        return $next($request);
    }
}
