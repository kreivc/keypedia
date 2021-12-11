<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('manageCategory', compact('categories'));
    }

    public function delete($id){
        $category = Category::find($id);
        Storage::delete($category->image);
        $category->delete();

        return redirect()->back();
    }

    public function update($id, Request $request){
        $category = $request->all();
        $validator = Validator::make($category, [
            'name' => 'required|string|unique:categories|max:255|min:5',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = Category::find($id); 
        $category->name = $request->name;

        if($request->has('image')){
            Storage::delete($category->image);
            $path = $request->file('image')->store('public/assets');
            $temp = $request->file('image')->store('');
            $category->image = $temp;
        }else{
            $path = $category->image;
        }

        $category->save();
        $categories = Category::all();
        return view('manageCategory', compact('categories'));
    }

    public function edit($id){
        $category = Category::find($id);
        return view('editCategory', compact('category'));
    }
}
