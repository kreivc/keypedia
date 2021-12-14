<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "transactions";

    protected $fillable =[
        'user_id','keyboard_id','history_id','quantity'
    ];

    public function keyboard(){
        return $this->belongsTo(Keyboard::class,'keyboard_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function History(){
        return $this->belongsTo(History::class,'history_id');
    }
}
