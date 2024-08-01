<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $AuthriazationStaff = [
            'admin',
            'product.index',
            'product.create',
            'product.store',
            'product.edit',
            'product.update',
            'product.destroy',
            'category.index',
            'category.create',
            'category.store',
            'category.edit',
            'category.update',
            'category.destroy',
            'order.index',

        ];
        $user = Auth::user();
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if ($user->id_roles == 1) {
            return $next($request);
        }
        if ($user->id_roles == 2) {
            if (in_array($request->route()->getName(), $AuthriazationStaff)) {
                return $next($request);
            }else{
                abort(403,'Bạn Không Đủ Thầm Quyền | Liên Hệ ADMIN NGOCHAI Để Được Cấp Quyền ');
            }
        }
        abort(403,'Bạn Không Đủ Thầm Quyền | Liên Hệ ADMIN NGOCHAI Để Được Cấp Quyền ');

    }
}
