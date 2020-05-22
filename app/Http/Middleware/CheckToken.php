<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Response;
class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty($request['token'])) {
            return Response::json([
                'success' => false,
                'message' => 'Token should be provided'
            ]);
        }

        if ($this->checkToken($request['token']) == false) {
            return Response::json([
                'success' => false,
                'message' => 'Unauthorized Token.'
            ]);                
        }

        return $next($request);
    }

    private function checkToken($token) {
        $users = User::where('token', $token)->get();
        if (count($users) > 0) return $users[0];
        return false;
    }
}
