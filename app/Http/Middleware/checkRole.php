<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->role =="admin") {
            return response()->view('master');
        }else if($request->role =="employee"){
            $message ="Bạn không có quyền truy cập chức năng này";
            return response()->view('master', compact('message'));
        }else if($request->role =="client"){
            $message ="Bạn không có quyền truy cập chức năng này";
            return response()->view('master', compact('message'));
        }
        return $next($request);
    }
}
