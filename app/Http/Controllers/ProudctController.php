<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Proudct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProudctController extends Controller
{
    //
    public function all(){


        $proudcts = Proudct::all();

        $proudcts= Proudct::paginate(10);
    return view('Proudcts.all', ['proudcts' => $proudcts]);
        // $products = Proudct::paginate(10);
        // return view("Proudcts.all", compact("proudcts"));
    }
    public function show($id){
        $proudct=Proudct::findOrFail($id);
        return view("Proudcts.show",compact("proudct"));

    }
    public function create(){
        $categories=Category::all();
        return view("Proudcts.create")->with("categories",$categories);
    }
    public function store(Request $request){
        $data=$request->validate([
            "category_id"=>"required|exists:categories,id",
            // "category"=>"required|string|max:255",
            // "category_name"=>"required|exists:categories,name",
            "weight"=>"required",
            "stock_number"=>"required|integer",
            "ingredients"=>"string",
            "title"=>"required|string|max:255",
            "desc"=>"required|string",
            "price"=>"required|numeric",
            "image"=>"required|image|mimes:png,jpg,jpeg",
        ]);
       $image=Storage::putFile("products",$data['image']);
      $data['image']=$image;
$data["user_id"]=1;
        Proudct::create($data);
        return redirect(url("proudcts/all"))->with("success","data inserted successfully");

    }

    public function edit($id){
        $proudct=Proudct::findOrFail($id);
        $categories=Category::all();

        return view("Proudcts.edit",compact("proudct","categories"));
    }

    public function updata(Request $request,$id){
        // $data=$request->validate([
        //     "category_id"=>"required|exists:categories,id",
        //     // "category"=>"required|string|max:255",
        //     "name"=>"required|string|max:255",
        //     "desc"=>"required|string",
        //     "price"=>"required|numeric",
        //     "quantity"=>"required|integer",
        //     "image"=>"image|mimes:png,jpg,jpeg",
        // ]);
        $data=$request->all();
        // dd($data);
        $catId =  $request->category_id;
        $catname =  $request->category_name;

            // Category::findOrFail()
        $proudct=Proudct::findOrFail($id);
       if($request->has("image")){
            Storage::delete($proudct->image);
            // $image=Storage::putFile("storage\products",$data['image']);
            $image = $request->file('image')->store('products', 'public');

            $data['image']=$image;


       }
        $proudct->update($data);
        return redirect()->route('allProduct');

    }

    public function delete($id){
        $proudct = Proudct::findOrFail($id);
        Storage::delete($proudct->image);
        $proudct->delete();
        return redirect()->route('allProduct');
        }





        public function search(Request $request)
        {
            $query = $request->input('query');

            // Perform a database query to find products matching the search query
            $proudcts = Proudct::where('title', 'like', "%$query%")->paginate(10);

            // Return the view with the matched products
            return view('proudcts.all')->with('proudcts', $proudcts);
        }



    }
