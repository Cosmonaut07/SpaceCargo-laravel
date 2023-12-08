<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'package_code',
        'price',
        'item_count',
        'shop_address',
        'comment',
    ];
}
