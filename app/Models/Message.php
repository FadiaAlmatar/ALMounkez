<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;


    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function sender()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class,'friend_id');
    }
}
