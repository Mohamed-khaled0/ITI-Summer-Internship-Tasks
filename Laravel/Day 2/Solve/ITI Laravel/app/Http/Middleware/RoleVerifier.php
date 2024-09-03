<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleVerifier
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
        if ($user && $this->verifyRole($user, $role)) {
            return $next($request);
        }

        return redirect('/');
    }

    private function verifyRole($user, $role)
    {
        if ($role === 'admin') {
            return $user->email === 'admin@example.com';
        } elseif ($role === 'user') {
            return $user->email !== 'user@example.com';
        }

        return false;
    }
}

