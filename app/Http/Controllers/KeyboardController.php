<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyboard;
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
            'name' => 'required|string|unique:keyboards|max:255|min:5',
            'price' => 'required|integer',
            'description' =>  'required|string|unique:keyboards|min:20',
            'image' => 'required|image|max:10240'
        ]);
        if($validator->fails()){
            return redirect(route('createKeyboard'))->withErrors($validator)->withInput();
        }

        $path = $request->file('image')->store('assets');

        Keyboard::create([
            'category_id'=> $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path
        ]);
        return redirect(route('createKeyboard'))->with('success','Data Success Send to database!');

    }
}
