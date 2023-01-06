<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'item_code';
    protected $fillable = ["item_code","name","exp_date","condition","room_id","type_item_id","supplier_id"];

    public function room() {
        return $this->belongsTo(Room::class,'room_id','room_code');
    }
    public function itemType() {
        return $this->belongsTo(ItemType::class,'type_item_id');
    }
    public function supplier() {
        return $this->belongsTo(Suppliers::class,'supplier_id','id');
    }
}
