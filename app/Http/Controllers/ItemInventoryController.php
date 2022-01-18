<?php

namespace App\Http\Controllers;

use App\Models\{ItemInventory, Inventory, Item, Category, RolePlay};
use App\Http\Requests\ItemInventoryRequest;
use Illuminate\Support\Facades\DB;

class ItemInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param String $slug1
     * @param int $slug2
     * @return \Illuminate\Http\Response
     */
    public function index($slug1 = null, $slug2 = null)
    {
        $rolePlays = RolePlay::all();
        if (isset($slug1) || ($slug2 > 0)){
            $rolePlay = RolePlay::whereSlug($slug1)->firstOrFail();
            $inventories = $rolePlay->inventories()->oldest('id')->paginate(10);
            $itemInventories = ($slug2 > 0) ? Inventory::findOrFail(intval($slug2))->itemInventories()->oldest('id')->paginate(10) : RolePlay::whereSlug($slug1)->firstOrFail()->itemInventories()->oldest('id')->paginate(10);
        }else{
            $inventories = Inventory::query()->oldest('id')->paginate(10);
            $itemInventories = ItemInventory::query()->oldest('id')->paginate(10);
        }
        return view('itemInventory.index', compact('itemInventories', 'rolePlays', 'inventories', 'slug1', 'slug2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventories = Inventory::all();
        $items = Item::all();
        return view('itemInventory.itemInventory_create', compact('inventories','items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ItemInventoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemInventoryRequest $request)
    {
        $item = Item::findOrFail($request['item_id']);
        $request['durability'] = ($request['durability'] > $item->maxDurability) ? $item->maxDurability : $request["durability"];
        ItemInventory::create($request->all());
        unset($item);
        return redirect()->route('itemInventories.index')->with('info', 'Item dans l\'inventaire créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\ItemInventory  $itemInventory
     * @return \Illuminate\Http\Response
     */
    public function show(ItemInventory $itemInventory)
    {
        return view('itemInventory.itemInventory_show', compact('itemInventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\ItemInventory  $itemInventory
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemInventory $itemInventory)
    {
        $inventories = Inventory::all();
        $items = Item::all();
        return view('itemInventory.itemInventory_edit', compact('itemInventory', 'inventories', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ItemInventoryRequest  $request
     * @param  App\Models\ItemInventory  $itemInventory
     * @return \Illuminate\Http\Response
     */
    public function update(ItemInventoryRequest $request, ItemInventory $itemInventory)
    {
        $item = Item::findOrFail($request['item_id']);
        $request['durability'] = ($request['durability'] > $item->maxDurability) ? $item->maxDurability : $request["durability"];
        $itemInventory->update($request->all());
        unset($item);
        return redirect()->route('itemInventories.index')->with('info', 'Item dans inventaire modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\ItemInventory  $itemInventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemInventory $itemInventory)
    {
        $itemInventory->delete();
        return back()->with('info', 'Item dans inventaire supprimé avec succés');
    }
}
