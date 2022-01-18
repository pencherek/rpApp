<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','name','maxDurability','priceBase','weight','description'];

    public function itemInventory()
    {
        return $this->belongsTo(ItemInventory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
