<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // protected $casts = [
    //     'date_of_birth' => 'datetime:Y-m-d',
    // ];
    protected $dates=['date_of_birth','Identity_grant_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function qualifications()
    {
        return $this->hasMany(Qualification::class);
    }
}
