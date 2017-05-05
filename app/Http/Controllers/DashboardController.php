<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Steam;
use App\Groups;
use App\User;
use Cookie;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $user;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('SteamUpdate');
        $this->user = User::find(1);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $player = $this->user;
        $steamId = $player->steamid;
        $steamInfo = Steam::user($steamId)->getPlayerSummaries()[0];
        $steamLevel = Steam::player($steamId)->GetSteamLevel();
        $groups = Groups::where('creator_id', $player->id)->get();
        
        if(Cookie::has('personaName') && Cookie::has('avatar')){
            echo "<script>console.log('injected') </script>";
            if( Auth::user()->personaName != Cookie::get('personaName')){
                echo "<script>console.log('name injected') </script>";
                DB::table('users')->update(['personaName' => Cookie::get('personaName') ]);
            }

            if( Auth::user()->avatar != Cookie::get('avatar')){
                echo "<script>console.log('avatar injected') </script>";
                DB::table('users')->update(['avatar' => Cookie::get('avatar')]);
            }
        }

        return view('dashboard', compact('player','steamLevel', 'groups', 'steamInfo'));
    }
}
