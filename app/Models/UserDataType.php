<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDataType extends Model
{
    use HasFactory;
    protected $table = "user_data_types";
    protected $fillable = ["value"];
}
