<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function itemInventories()
    {
        return $this->hasMany(ItemInventory::class);
    }

    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }

    public static function boot()
    {
        parent::boot();

        Inventory::deleting(function($inventory)
        {
            $inventory->characters()->detach();
        });
    }
}
