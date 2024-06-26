<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertCategory extends Model
{
    use HasFactory;
    protected $table = "advert_categories";
    protected $fillable = ["value", "image", 'route'];
}
