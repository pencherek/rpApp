<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{InventoryController, GestionXmlController, CategoryController, ItemController, ItemInventoryController, RolePlayController, CharacterController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::resource('inventories', InventoryController::class, ['parameters' => [
        'inventories' => 'inventory'
    ]]);
    Route::get('inventories/character/{id}', [InventoryController::class, 'index'])->name('inventories.character');
    //Route::get('inventory/{slug}/inventories', [InventoryController::class, 'index'])->name('inventories.rolePlay');
    Route::get('inventory/{slug}/itemInventory/create', [InventoryController::class, 'createItemInventory'])->name('inventories.itemInventory.create');
    Route::post('inventory/{slug}/itemInventory/store', [InventoryController::class, 'storeItemInventory'])->name('inventories.itemInventory.store');
    Route::resource('categories', CategoryController::class, ['parameters' => [
        'categories' => 'category'
    ]]);
    Route::resource('items', ItemController::class, ['parameters' => [
        'items' => 'item'
    ]]);
    Route::get('item/{slug}/items', [ItemController::class, 'index'])->name('items.category');
    Route::resource('itemInventories', ItemInventoryController::class, ['parameters' => [
        'itemInventories' => 'itemInventory'
    ]]);
    Route::get('itemInventory/{slug1}/{slug2}/itemInventories', [ItemInventoryController::class, 'index'])->name('itemInventories.rolePlay.inventory');
    Route::get('gestionXml', [GestionXmlController::class, 'index']);
    Route::resource('rolePlays', RolePlayController::class, ['parameters' => [
        'rolePlays' => 'rolePlay'
    ]]);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('characters', CharacterController::class, ['parameters' => [
        'characters' => 'character'
    ]]);
});





