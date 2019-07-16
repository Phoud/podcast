<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$types)
    {
        
            $user_type = Auth::user()->Usertype;
            foreach ($types as $type) {
                if ($user_type === $type) {
                    return $next($request);
                }
            }
            if ($user_type === 'super_admin') {
                dd('for super');
            }
    
            if ($user_type === 'admin') {
                dd('for admin');
            }
            if ($user_type === 'member') {
                return redirect('/');
            }
        }
      
}
