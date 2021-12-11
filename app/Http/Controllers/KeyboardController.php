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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($validator->fails()){
            return redirect(route('createKeyboard'))->withErrors($validator)->withInput();
        }

        $image = $request->file('image');
        $imageName = time().$image->getClientOriginalName();
        $image->storeAs('public/assets/', $imageName);

        $keyboard = new Keyboard();
        $keyboard->category_id = $request->category;
        $keyboard->name = $request->name;
        $keyboard->price = $request->price;
        $keyboard->description = $request->description;
        $keyboard->image = $imageName;
        $keyboard->save();

        return redirect(route('createKeyboard'))->with('success','Data Success Send to database!');

    }
}
