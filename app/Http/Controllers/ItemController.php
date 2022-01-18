<?php

namespace App\Http\Controllers;

use App\Models\{Item, Category};
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param String $slug
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null)
    {
        $query = $slug ? Category::whereSlug($slug)->firstOrFail()->items() : Item::query();
        $items = $query->oldest('name')->paginate(10);
        $categories = Category::all();
        return view('item.index', compact('items', 'categories', 'slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('item.item_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        Item::create($request->all());
        return redirect()->route('items.index')->with('info', 'Item créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $category = $item->category;
        return view('item.item_show', compact('item', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('item.item_edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ItemRequest  $request
     * @param  App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, Item $item)
    {
        $item->update($request->all());
        return redirect()->route('items.index')->with('info', 'Item modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return back()->with('info', 'Item supprimé avec succés');
    }
}
