<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if ($request->age <=18) {
            $message = 'Bạn chưa đủ 18 tuổi để truy cập trang';
            return response()->view('master',compact('message'));
        }  
        return $next($request);
    }
}
