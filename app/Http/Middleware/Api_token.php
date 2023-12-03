<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Api_token
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiToken = $request->header('Authorization');

        if (!$apiToken || !$this->isValidApiToken($apiToken)){
            return response()->json(
                [
                    'status' =>401,
                    'error' => 'Unauthorized',
                    'message'=>'Invalid or missing API token'
                ]
                );
        }
        return $next($request);
    }
    private function isValidApiToken($apiToken)
    {
        $expectedToken = env('API_TOKEN', 'vU6BhF23VjDIagNTSTUvrp1W8KsPuCeLy');

        return trim(str_replace('Bearer', '', $apiToken)) === trim($expectedToken);
    }
}
