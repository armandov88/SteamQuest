<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Steam; 
use App\Groups;

class ProfileController extends Controller
{
      
     private $users;
     private $userSteamId;

     public function __construct()
     {
         $this->users = User::all();
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listUsers = $this->users;        
        return view('users.profiles.index', compact('listUsers'));
    }

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = $this->users->find($id);
        $steamid = $user->steamid;
        $steamProfile = Steam::user($steamid)->getPlayerSummaries()[0];
        $level = Steam::player($steamid)->getSteamLevel();
        $groups = Groups::where('creator_id', $user->id)->get();

        $playerGames =Steam::player($steamid)->GetOwnedGames();
        return view('users.profiles.show', compact('user', 'steamProfile','level', 'playerGames', 'groups'));

    }
}
