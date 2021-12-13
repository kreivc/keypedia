<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        if($request->category == "null"){
            return redirect(route('createKeyboard'))->withErrors("Category Required!")->withInput();
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

    public function delete($id){
        $keyboard = Keyboard::find($id);
        Storage::delete($keyboard->image);
        $keyboard->delete();

        return redirect()->back();
    }

    public function update($id, Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'category' => 'required',
            'name' => 'required|string|unique:keyboards|max:255|min:5',
            'price' => 'required|integer',
            'description' =>  'string|min:20',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->category == "null"){
            return redirect()->back()->withErrors("Category Required!")->withInput();
        }

        $keyboard = Keyboard::find($id);
        // dd($keyboard);
        $keyboard->category_id = $request->category;
        $keyboard->name = $request->name;
        $keyboard->price = $request->price;
        $keyboard->description = $request->description;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $image->storeAs('public/assets/', $imageName);
            $keyboard->image = $imageName;
        }
        else{
            $keyboard->image = $keyboard->image;
        }

        $keyboard->save();
        $category = Category::find($request->category);
        $keyboards = Keyboard::where('category_id',  $request->category)->simplePaginate(8);
        return view('viewKeyboard', compact('keyboards', 'category'));
    }

    public function edit($id){
        $keyboard = Keyboard::find($id);
        $categories = Category::all();
        return view('editKeyboard', compact('keyboard','categories'));
    }
}
