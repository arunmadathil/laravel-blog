<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
     {

      if($request->user()->checkRole($role) !='user' ) {
           abort(404);
       }
       if($permission !== null && !$request->user()->can($permission)) {
          abort(404);
      }
      return $next($request);
    }
}
