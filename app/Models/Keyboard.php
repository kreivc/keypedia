<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    use HasFactory;
    protected $table = "keyboards";
    protected $fillable =[
        'category_id','name','price','description'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function cart(){
        return $this->hasOne(Cart::class, 'id');
    }

}
