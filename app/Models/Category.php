<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable =[
        'category_id','name','price','description'
    ];

    public function keyboard(){
        return $this->hasMany(Keyboard::class);
    }

}
