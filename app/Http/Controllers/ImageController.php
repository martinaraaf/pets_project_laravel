<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function index(){
        return view('image-form');
    }

    public function storeImage(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imgName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imgName);

        return back()->with('success', 'Image uploaded Successfully!')->with('image', $imgName);
    }
}
