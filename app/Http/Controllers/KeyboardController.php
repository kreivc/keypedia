<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KeyboardController extends Controller
{

    public function index(){
        $categories = Category::all();
        return view('createKeyboard', compact('categories'));
    }

    public function add(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,[
            'category' => 'required',
            'name' => 'required|'
        ]);
    }
}
