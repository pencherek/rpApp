<?php

namespace App\Http\Controllers;

use App\Models\{Inventory, RolePlay,ItemInventory,Item};
use Spatie\Permission\Models\Permission;
use App\Http\Requests\{InventoryRequest, ItemInventoryRequest};
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = 0)
    {
        $characters = ($id > 0) ? auth()->user()->characters()->where('id',$id)->get() : auth()->user()->characters()->oldest('name')->get();
        return view('inventory.index', compact('characters', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $characters = auth()->user()->characters()->orderBy('role_play_id')->get();
        return view('inventory.inventory_create', compact('characters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\InventoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryRequest $request)
    {
        $inventory = Inventory::create($request->all());
        $inventory->characters()->syncWithPivotValues($request->all()['character_id'],['created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]);
        $inventory->characters()->attach($inventory->characters[0]->rolePlay->user_id,['created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]);
        return redirect()->route('inventories.index')->with('info', 'Inventaire créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Inventory $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $exist = !empty(DB::table('users')
            ->join('character_user', 'character_user.user_id', '=', 'users.id')
            ->join('characters', 'characters.id', '=', 'character_user.character_id')
            ->join('character_inventory', 'character_inventory.character_id', '=', 'characters.id')
            ->join('inventories', 'inventories.id', '=', 'character_inventory.inventory_id')
            ->where('users.id','=',auth()->user()->id)
            ->where('inventories.id','=',$id)
            ->get()->toArray());
        if ($exist){
            $inventory = Inventory::find($id);
            return view('inventory.inventory_show', compact('inventory'));
        }else{
            return redirect()->route('inventories.index')->with('error', 'Vous ne pouvez pas voir cet inventaire');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Inventory $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $exist = !empty(DB::table('users')
            ->join('character_user', 'character_user.user_id', '=', 'users.id')
            ->join('characters', 'characters.id', '=', 'character_user.character_id')
            ->join('character_inventory', 'character_inventory.character_id', '=', 'characters.id')
            ->join('inventories', 'inventories.id', '=', 'character_inventory.inventory_id')
            ->where('users.id','=',auth()->user()->id)
            ->where('inventories.id','=',$id)
            ->get()->toArray());
        if ($exist){
            $inventory = Inventory::find($id);
            $characters = auth()->user()->characters()->where('role_play_id',$inventory->characters[0]->role_play_id)->get();
            return view('inventory.inventory_edit', compact('inventory', 'characters'));
        }else{
            return redirect()->route('inventories.index')->with('error', 'Vous ne pouvez pas modifier cet inventaire');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\InventoryRequest $request
     * @param  App\Models\Inventory $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryRequest $request, Inventory $inventory)
    {
        $inventory->update($request->all());
        $inventory->characters()->syncWithPivotValues($request->all()['character_id'],['created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]);
        $inventory->characters()->attach($inventory->characters[0]->rolePlay->user_id,['created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]);
        return redirect()->route('inventories.index')->with('info', 'Inventaire modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Inventory $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return back()->with('info', 'Inventaire supprimé avec succés');
    }

    public function createItemInventory($slug = null){
        $inventory = Inventory::findOrFail($slug);
        $items = Item::all();
        return view('inventory.itemInventory_create', compact('inventory', 'items'));
    }

    public function storeItemInventory(ItemInventoryRequest $request, $slug = null){
        $item = Item::findOrFail($request['item_id']);
        $request['durability'] = ($request['durability'] > $item->maxDurability) ? $item->maxDurability : $request["durability"];
        ItemInventory::create($request->all());
        unset($item);
        $inventory = Inventory::findOrFail($slug);
        return view('inventory.inventory_show', compact('inventory'));
    }
}
