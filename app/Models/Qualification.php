<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $fillable = ['qualification','side','country','finishyear','rate','Specialization'];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
