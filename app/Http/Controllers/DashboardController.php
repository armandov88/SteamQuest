<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Steam;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $steamId = Auth::user()->steamid;
        $player = Steam::user($steamId)->GetPlayerSummaries()[0];
        $steamLevel = Steam::player($steamId)->GetSteamLevel();

        return view('dashboard', compact('player', 'steamLevel'));
    }
}
