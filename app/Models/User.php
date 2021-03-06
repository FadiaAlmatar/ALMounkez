<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts()
    {
       return $this->hasMany(Post::class);
    }
    public function messages()
    {
       return $this->hasMany(Message::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    public function order()
    {
        return $this->hasOne(Order::class);
    }
    public function fullorders()
    {
        return $this->hasMany(FullOrder::class);
    }









    public function conversations()
    {
        return $this->belongsToMany(Conversation::class);
    }
    public function talkedTo()
    {
        return $this->hasMany(Message::class,'user_id');
    }
    public function relatedTo()
    {
        return $this->hasMany(Message::class,'friend_id');
    }

}


