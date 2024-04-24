<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $check = Visitor::where([
            ['ip_address', $request->ip()],
            ['visited_at', date('Y-m-d')]
        ])->first();
        if (!$check) {
            Visitor::create([
                'ip_address' => $request->ip(),
                'visited_at' => date('Y-m-d')
            ]);
        }
        
        return $next($request);
    }
}
