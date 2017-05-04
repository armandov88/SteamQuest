<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Steam; 

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = $this->users->find(1);
        $steamid = $user->steamid;
        $steamProfile = Steam::user($steamid)->getPlayerSummaries()[0];
        $level = Steam::player($steamid)->getSteamLevel();

        $playerGames =Steam::player($steamid)->GetOwnedGames();
        return view('users.profiles.show', compact('user', 'steamProfile','level', 'playerGames'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
