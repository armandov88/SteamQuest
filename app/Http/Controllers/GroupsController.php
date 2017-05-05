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
        $this->middleware('auth');
        $this->user = User::find(1);
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
        $steamid = $this->user->steamid;  
        $games =Steam::player($steamid)->GetOwnedGames();
        $gameList = [];

        foreach($games as $game)
        {
            $gameList[$game->appId] = $game->name;
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
        $group = Groups::create([
            'creator_id' => $this->user->id,
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
        $group = Groups::find(1);
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
        $group = Groups::findOrFail($id);
        $steamid = $this->user->steamid;  
        $games =Steam::player($steamid)->GetOwnedGames();
        $gameList = [];

        foreach($games as $game)
        {
            $gameList[$game->appId] = $game->name;
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
        $group = Groups::find(1);
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
        $group = Groups::find(1);
        $group->delete();

        return redirect('dashboard');
    }
}
