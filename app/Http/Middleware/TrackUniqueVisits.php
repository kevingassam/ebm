<?php

namespace App\Http\Middleware;


use Closure;
use App\Models\PageVisit;
use Illuminate\Support\Facades\Request;
use Carbon\Carbon;

class TrackUniqueVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $pageName = $request->route()->getName();
        $userIp = $request->ip();
        $currentDate = Carbon::now()->startOfMonth();

        // Vérifie si une visite a déjà été enregistrée pour cette IP, cette page et ce mois
        $visitExists = PageVisit::where('page_name', $pageName)
            ->where('user_ip', $userIp)
            ->where('visit_date', '>=', $currentDate)
            ->exists();

        if (!$visitExists) {
            // Enregistre une nouvelle visite
            PageVisit::create([
                'page_name' => $pageName,
                'user_ip' => $userIp,
                'visit_date' => Carbon::now()->toDateString(),
            ]);
        }

        return $next($request);
    }
}
