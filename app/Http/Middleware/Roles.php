<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //get the current url route in the browser
        $routeName =url()->current();

        //split route url by / and save them as array 
        $route = explode('/', $routeName);

        //get allowed_route field from db and distinct the values then save them as an array
        //ex: $roleRoutes = ['admin',null];
        $roleRoutes = ['admin','supervisor'];

        if(auth()->check()){
            // اذا كان الرابط لا يحتوي علي اي كملة من ضمن الادوار  الموجودة في قاعدة البيانات 
            if(!in_array($route[3],$roleRoutes)){
                return $next($request);
            }else{
                // اذا كان الرابط يحتوي علي احدي الصلاحيات لكنها ليست ادمن  
                // (auth()->user()->roles[0]->allowed_route return admin )
                if($route[3] != 'admin'){         //notadmin.
                    $path = $route[3] == 'admin' ? $route[3]. '.auth-login' : ''. 'admin'. 'index';
                    return redirect()->route($path);
                    

                }else{
                    // the correct access
                    session('admin',true);
                    return $next($request);
                }
            }

        }else{
          

            if(in_array($route[3], $roleRoutes)){
                $routeDestination = $route[3] . '.auth-login'; // 
            }else{
                $routeDestination = 'login';
            }


            if($route[3] != ''){
                $path =  $routeDestination ;
            }else{
                $path = 'admin' . '.index';
            }
            
            return redirect()->route($path);
        }

    }
}
