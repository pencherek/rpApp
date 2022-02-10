<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolePlayRequest;
use App\Models\{RolePlay,User};

class RolePlayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $rolePlaysMJ = $user->rolePlaysMJ()->oldest('name')->paginate(10);
        $rolePlaysPlayer = $user->rolePlaysPlayer()->oldest('name')->paginate(10);
        return view('role_play.index', compact('rolePlaysMJ','rolePlaysPlayer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role_play.role_play_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\RolePlayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolePlayRequest $request)
    {
        $request["user_id"] = auth()->user()->id;
        RolePlay::create($request->all());
        return redirect()->route('rolePlays.index')->with('info', 'Rp créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RolePlay $rolePlay)
    {
        if($rolePlay->users()->where('user_id', auth()->user()->getKey())->exists() || $rolePlay->user->id == auth()->user()->getKey()){
            return view('role_play.role_play_show', compact('rolePlay'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RolePlay $rolePlay)
    {
        $users = User::all();
        return view('role_play.role_play_edit', compact('rolePlay','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\RolePlayRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolePlayRequest $request, RolePlay $rolePlay)
    {
        $rolePlay->update($request->all());
        return redirect()->route('rolePlays.index')->with('info', 'Rp modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RolePlay $rolePlay)
    {
        if (auth()->user()->id == $rolePlay->user_id){
            $rolePlay->delete();
            return back()->with('info', 'Rp supprimé avec succés');
        }else{
            return back()->with('info', 'Tu n\'as pas le droit de supprimer ce rp');
        }
    }
}
