<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $table = "user_data";
    protected $fillable = ["value", "isPrivate", "userID", "userDataTypeID"];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
    public function userDataType(){
        return $this->belongsTo(UserDataType::class, 'userDataTypeID');
    }
}
