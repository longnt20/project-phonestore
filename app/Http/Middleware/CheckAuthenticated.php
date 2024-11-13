<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $nameMethod = $request->route()->getActionMethod();
        $getName = $request->route()->getName();
        $action = str_replace('.'.$nameMethod, '', $getName);
        // dd($action);
        $user = session('user');
        if (empty($user)) {
            return redirect('/loginadmin');
        }

        if ($user->type == 'admin') {
            return $next($request);
        }
        if ($user->type == 'employee') {
            $employeeAbilities = ['iphones', 'users.profile', 'Closure'];
            if (in_array($action, $employeeAbilities)) {
                return $next($request);
            }elseif(in_array($getName, $employeeAbilities)){
                return $next($request);
            }elseif(in_array($nameMethod, $employeeAbilities)){
                return $next($request);
            }
        }
        if ($user->type == 'client') {
            $clientAbilities = ['some_route_name', 'another_route_name'];
            if (in_array($action, $clientAbilities) || in_array($getName, $clientAbilities)) {
                return $next($request);
            }
            
        }
        return abort(403, 'Bạn không có quyền truy cập.');
    }
}
