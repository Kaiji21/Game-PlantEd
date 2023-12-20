<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Traits\GeneralTrait;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AssingGuard
{
    use GeneralTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard != null) {
            auth()->shouldUse($guard);
            $token = $request->header('auth-token');
            $request->headers->set('auth-token', (string) $token, true);
            $request->headers->set('Authorization', 'Bearer ' . $token, true);
            try {
                $user = JWTAuth::parseToken()->authenticate();
                if ($guard === 'api' && $user) {
                    return $next($request);
                } elseif (!$user ||!str_contains($guard, $user->role)  ) {
                    return $this->returnError('401', 'Unauthorized user');
                }

            } catch (TokenExpiredException $e) {
                return $this->returnError('401', 'Unauthenticated user');
            } catch (JWTException $e) {
                return $this->returnError('', 'token_invalid ' . $e->getMessage());
            }
        }
        return $next($request);
    }
}
