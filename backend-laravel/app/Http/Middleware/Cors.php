<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Allow requests from http://localhost:7000
        $response = $next($request)
                    ->header('Access-Control-Allow-Origin', '*')
                    ->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                    ->header('Access-Control-Allow-Headers', 'DNT,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Range,Authorization')
                    ->header('Access-Control-Max-Age', '86400');

        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, POST, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'DNT,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Range,Authorization',
            'Access-Control-Allow-Max-Age' => '86400'
        ];
        
        // Handle preflight OPTIONS request
        if ($request->getMethod() === 'OPTIONS') {
            return response('OK', 200, $headers);
            // return response('OK', 200)
            //         ->header('Access-Control-Allow-Origin', '*')
            //         ->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
            //         ->header('Access-Control-Allow-Headers', 'Content-Type');
            //         ->header('Access-Control-Max-Age', '86400')
        }

        return $response;
    }
}
