<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProudctResourse;
use App\Models\Category;
use App\Models\Proudct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiProudctController extends Controller
{
    //
    public function all(){
    //  $proudcts=  Proudct::all();

    $proudcts = Proudct::with('category')->get();
    // dd($proudcts);

    // Modify the products data to include category name instead of category id
    $productsData = $proudcts->map(function ($proudct) {
        return [
            'id' => $proudct->id,
            'name' => $proudct->title,
            'description' => $proudct->desc,
            'image' => asset('storage/' . $proudct->image),
            'price' => $proudct->price,
            'category_name' => $proudct->category->name, // Access the category name
        ];
    });
    //   return ProudctResourse::collection($proudcts);
        //   return ProudctResourse::collection($productsData);
        return response()->json($productsData);



    }

    public function show($id){
        $proudct =  Proudct::find($id);
        if( $proudct == null ){
            return response()->json([
                "msg"=>"product not found"
               ],404);
            }
                return new ProudctResourse($proudct);
      }

      public function store(Request $request){
        //validation
            $validator=Validator::make($request->all(),[
                "category_id"=>"required|exists:categories,id",
                // "category"=>"required|string|max:255",
                "title"=>"required|string|max:255",
                "desc"=>"required|string",
                "price"=>"required|numeric",
                "image"=>"image|mimes:png,jpg,jpeg",

            ]);
            if($validator->fails()){
                return response()->json([
                    "errors"=>$validator->errors()
                ],301);
            }
            $imageName=Storage::putFile("Product",$request->image);
            Proudct::create([
                "category_id"=>$request->category_id,
                "category_name"=>$request->category,
                "product_id"=>$request->id,
                "title"=>$request->title,
                "desc"=>$request->desc,
                "price"=>$request->price,
                "image"=>$imageName,
                "user_id"=>9
            ]);
            return response()->json([
                "msg"=>"Product added successuflly"
            ],201);

        }




        public function update($id,Request $request){
            $validator=Validator::make($request->all(),[
                "category_id"=>"required|exists:categories,id",
                // "category"=>"required|string|max:255",
                "title"=>"required|string|max:255",
                "desc"=>"required|string",
                "price"=>"required|numeric",
                "image"=>"image|mimes:png,jpg,jpeg",
            ]);
            if($validator->fails()){
                return response()->json([
                    "errors"=>$validator->errors()
                ],301);
            }
            $proudct=Proudct::find($id);
            if($proudct==null){
                return response()->json([
                    "msg"=>"Product not found"
                ],404);
            }
            $imageName=$proudct->image;
            if($request->has("image")){
                Storage::delete($imageName);
                $imageName=Storage::putFile("Product",$request->image);
            }

            $proudct->update([
                "category_id"=>$request->category_id,
                "title"=>$request->title,
                "desc"=>$request->desc,
                "price"=>$request->price,
                "image"=>$imageName,
            ]);
            return response()->json([
                "msg"=>"Product updated successuflly",
                "product"=>new ProudctResourse($proudct)

            ],201);
      }




      public function delete($id){
        $proudct=Proudct::find($id);
        if($proudct==null){
        return response()->json([
            "msg"=>"Product not found"
        ],404);
    }
    if($proudct->image !==null){
        Storage::delete($proudct->image);
    }
    $proudct->delete();
    return response()->json([
        "success"=>"Product deleted successuflly"

    ],200);
      }

      public function search(Request $request)
{
    $query = $request->input('query');

    $proudcts = Proudct::where('title', 'like', "%$query%")
                        ->orWhere('desc', 'like', "%$query%")
                        ->get();

    return response()->json(['proudcts' => $proudcts], 200);
}
    }
