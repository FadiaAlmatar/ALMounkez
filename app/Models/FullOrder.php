<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FullOrder extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // protected $fillable = ['replace_reasons'];

    // public function setCategoryAttribute($value)
    // {
    //     $this->attributes['replace_reasons'] = json_encode($value);
    // }

    // public function getCategoryAttribute($value)
    // {
    //     return $this->attributes['replace_reasons'] = json_decode($value);
    // }
}
