<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ["item_code","name","exp_date","condition","room_id","type_item_id","supplier_id"];

    public function room() {
        return $this->belongsTo(Room::class,'room_id','room_code');
    }
    public function itemType() {
        return $this->belongsTo(ItemType::class,'type_item_id');
    }
}
