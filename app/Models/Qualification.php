<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $fillable = ['qualification','university','country','graduation_year','graduation_rate','Specialization'];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
