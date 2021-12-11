<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KeyboardController extends Controller
{
    public function addKeyboard(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,[
            
        ]);
    }
}
