<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function all(){

 //mvc
 //model
 $categories=Category::select('name','desc','id')->get();
 return view('Categories.all', compact('categories'));


   }

   public function show ($id){
$category = Category::findOrFail($id);
return view('Categories.show', compact("category"));

   }
// public function show($id) {
//     $categories = Category::all(); // Fetch all categories
//     $category = Category::findOrFail($id);
//     return view('Categories.show', compact("categories", "category"));
// }

public function create()
{
    return view('Categories.create');
}

public function store(Request $request)
{
    //validation
    $request->validate([
        "name"=>'required|string',
        "desc"=>'required|string',
    ]);
    //store
Category::create([
"name"=>$request->name,
"desc"=>$request->desc,

]);

    //redirection
    return redirect(url("categories"));
}

public function edit($id){
    $category = Category::findOrFail($id);
    return view('Categories.edit',compact("category"));

}

public function update($id, Request $request){

    //validation
   $data= $request->validate([
        "name"=>'required|string',
        "desc"=>'required|string',
    ]);
   $category = Category::findOrFail($id);
   $category->update($data);
   return redirect(url("categories/show/$category->id"));


}




public function delete($id){
$category = Category::findOrFail($id);
$category->delete();
return redirect(url('categories'));
}


}

