<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = ["description","is_accepted","item_code","is_accepted"];

    public function item() {
        return $this->belongsTo(Item::class,'item_code','item_code');
    }
}
