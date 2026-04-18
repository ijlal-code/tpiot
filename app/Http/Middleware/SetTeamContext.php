<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SetTeamContext
{
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user sudah login, kita paksa sistem menggunakan Tim ID 1
        // Di masa depan, kamu bisa mengganti angka 1 ini dengan $user->current_team_id
        if (Auth::check()) {
            setPermissionsTeamId(1);
        }

        return $next($request);
    }
}