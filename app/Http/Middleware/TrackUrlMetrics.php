<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Urls;
use App\Models\UrlMetric;
use Closure;

class TrackUrlMetrics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $code= $request->route('shorten_url');
        $url= Urls::where('shorten_url',$code)->first();
        
        if($url){
            UrlMetric::create([
                'url_id'     => $url->id,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }
        return $next($request);
    }
    
}
