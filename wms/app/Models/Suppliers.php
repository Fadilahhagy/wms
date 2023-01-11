<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Suppliers extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'email',
        'address',
        'phone',
    ];

    public function items() {
        return $this->hasMany(Item::class,'supplier_id','id');
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone
        ];
    }
}
