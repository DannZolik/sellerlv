<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

    protected $table = "adverts";
    protected $fillable = ["title", "price", "description", "activeUntil", "status", "views", "userID", "categoryID"];

    public function user()
    {
        return $this->belongsTo(User::class, "userID");
    }
    public function category(){
        return $this->belongsTo(AdvertCategory::class, "categoryID");
    }
}
