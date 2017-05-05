<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Groups;
use Auth;
use Steam;


class GroupsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => array('index', 'show')]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::all();
         
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::id());
        $steamid = $user->steamid;  
        $games =Steam::player($steamid)->GetOwnedGames();
        $gameList = [];

        foreach($games as $game)
        {
            $gameList[$game->name] = $game->name;
        }
        return view('groups.create', compact('gameList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        $group = Groups::create([
            'creator_id' => $user->id,
            'creator_name' => $user->personaName,
            'group_name' => $request->input('group_name'),
            'app_name' =>  $request->input('app_name'),
            'description' => $request->input('description'),
        ]);

        return redirect('/g/'.$group->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Groups::find($id);
        return view('groups.profile', compact('group'));
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
        $group = Groups::find($id);
        $steamid = $this->user->steamid;  
        $games =Steam::player($steamid)->GetOwnedGames();
        $gameList = [];

        foreach($games as $game)
        {
            $gameList[$game->name] = $game->name;
        }
        return view('groups.edit', compact('group', 'gameList'));
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
        $group = Groups::find($id);
        $group->update([
            'creator_id' => $this->user->id,
            'group_name' =>  $request->input('group_name'),
            'app_name' => $request->input('app_name'),
            'description' => $request->input('description'),
        ]);

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Groups::find($id);
        $group->delete();

        return redirect('dashboard');
    }
}
