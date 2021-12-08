<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    use HasFactory;
    protected $table = "keyboards";
    protected $fillable =[
        'name'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function cart(){
        return $this->hasOne(Cart::class);
    }

}
