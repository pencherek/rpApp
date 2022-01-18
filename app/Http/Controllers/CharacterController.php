<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Http\Requests\CharacterRequest;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = auth()->user()->characters();
        $characters = $query->oldest('name')->paginate(10);
        return view('character.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('character.character_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CharacterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CharacterRequest $request)
    {
        $request["stats"] = '[]';
        $character = Character::create($request->all());
        $character->users()->syncWithPivotValues(auth()->user()->id,['created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]);
        $character->users()->attach($character->rolePlay->user_id,['created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]);
        return redirect()->route('characters.index')->with('info', 'Personnage créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        return view('character.character_show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        return view('character.character_edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CharacterRequest  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(CharacterRequest $request, Character $character)
    {
        $request["user_id"] = array_filter(array_unique($request["user_id"]),function ($value){
            return ($value > 0);
        });
        $character->update($request->all());
        $character->users()->sync($request["user_id"]);
        return redirect()->route('characters.index')->with('info', 'Personnage modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        if (auth()->user()->id == $character->rolePlay->user_id){
            $character->delete();
            return back()->with('info', 'Personnage supprimé avec succés');
        }else{
            return back()->with('info', 'Seul le MJ peut supprimer un personnage');
        }
    }
}
