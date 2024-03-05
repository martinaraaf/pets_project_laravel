<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResourse;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiCategoryController extends Controller
{
    public function all(){
      $categories =  Category::all();
      return CategoryResourse::collection($categories);
    }

    public function show($id){
        $category =  Category::find($id);
        if( $category == null ){
            return response()->json([
                "msg"=>"category not found"
               ],404);
            }
                return new CategoryResourse($category);
      }




public function store(Request $request){
//validation

$validator = Validator::make($request->all(),[
    "name"=>"required|string",
    "desc"=>"required|string",
]);

if($validator->fails()){
    return response()->json([
"msg"=>$validator->errors()
    ],301);
}
Category::create([
"name"=>$request->name,
"desc"=>$request->desc

]);
return response()->json([
    "msg"=>"data created succssfully"
        ],201);

}

public function update($id, Request $request){

    //validate
    $validator = Validator::make($request->all(),[
        "name"=>"required|string",
        "desc"=>"required|string",
    ]);

    if($validator->fails()){
        return response()->json([
    "msg"=>$validator->errors()
        ],301);
    }
    //find
    $category =  Category::find($id);
    if( $category == null ){
        return response()->json([
            "msg"=>"category not found"
           ],404);
        }
          $category->update([
"name"=>$request->name,
"desc"=>$request->desc,

             ]);
             return response()->json([
                "msg"=>"data updated succssfully"
                    ],201);

            }

        public function delete($id){
            $category =  Category::find($id);
            if( $category == null ){
                return response()->json([
                    "msg"=>"category not found"
                   ],404);
                }
 $category->delete();
 return response()->json([
    "msg"=>"deleted successfully"
   ],200);
        }

        
  }












