<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        $permission = session()->get('permission');
        $current_url = \Route::current()->uri();
        if ($permission->$current_url == 0) {
            // abort(401);
            return redirect('dashboard');
        }

        $response = $next($request);

        $response->headers->set('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate');

        $response->headers->set('Pragma', 'no-cache');

        $response->headers->set('Expires', 'Sun, 02 Jan 1990 00:00:00 GMT');

        return $response;
    }
}
