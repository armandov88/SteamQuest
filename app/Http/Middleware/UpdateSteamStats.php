<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Steam;
use Cookie;

class UpdateSteamStats
{
    public function __construct()
    {
        $this->user = Auth::user();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Cookie::has('personaName') && Cookie::has('avatar')){
            return $next($request);
        }

        $personaName = Steam::user($this->user->steamid)->getPlayerSummaries()[0]->personaName;
        $avatar = Steam::user($this->user->steamid)->getPlayerSummaries()[0]->avatarUrl;
        Cookie::queue('personaName', $personaName, 1 );
        Cookie::queue('avatar', $avatar, 1);

        return $next($request);
 
    }
}
