<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class ItemInventory extends Model
{
    use HasFactory;
    //TODO  ajouter un champ description
    protected $fillable = ['inventory_id','item_id','quantity','durability'];
    public function item()
    {
        //return $this->belongsTo(Item::class,'id','id');
        return $this->belongsTo(Item::class,'item_id','id');
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class,'inventory_id','id');
    }

    public static function boot()
    {
        parent::boot();

        ItemInventory::created(function($itemInventory)
        {
            User::find($itemInventory->inventory->characters[0]->rolePlay->user_id)->givePermissionTo(Permission::create(['name'=>'ItemInventory.show.durability.'.$itemInventory->id]));
            User::find($itemInventory->inventory->characters[0]->rolePlay->user_id)->givePermissionTo(Permission::create(['name'=>'Item.show.priceBase.'.$itemInventory->id]));
        });

        ItemInventory::deleted(function($itemInventory)
        {
            Permission::findByName('ItemInventory.show.durability.'.$itemInventory->id)->delete();
            Permission::findByName('Item.show.priceBase.'.$itemInventory->id)->delete();
        });
    }
}
