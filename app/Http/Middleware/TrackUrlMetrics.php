<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Urls;
use App\Models\UrlMetric;
use App\Events\UrlClicked;
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
            $metric=URLMetric::create([
                'url_id'     => $url->id,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            $totalClicks=$url->metrics()->count();
            \Log::info('Disparando evento UrlClicked', [
            'url_id' => $url->id,
            'total_clicks' => $totalClicks
        ]);
            event(new UrlClicked(
    $url->id,
    $metric,
    $totalClicks
));
        }
        return $next($request);
    }
    
}