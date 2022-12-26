<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModels extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'email',
        'address',
        'phone',
    ];
}
