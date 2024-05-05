<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidAdvert extends Model
{
    use HasFactory;
    protected $table = "paid_adverts";
    protected $fillable = ["status", "activeUntil", "views", "advertID"];

    public function advert(){
        return $this->belongsTo(Advert::class, 'advertID');
    }
}
