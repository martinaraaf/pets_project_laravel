<?php

namespace App\Http\Controllers\API;

use App\Models\Cart;
use App\Models\Proudct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CartItemRequest;
use App\Http\Controllers\ProudctController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getCart()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function addToCart(CartItemRequest $request)
    {
        $product = Proudct::find($request->product_id);

        if ($product->stock_number < $request->quantity) {
            return response()->json(['message' => 'Insufficient product stock'], 422);
        }
        // $access_token=$request->header("access_token");
        // $user = Auth::user;
        $user = $request->user_id;
        // if($access_token !==null){
        //     $user=User::where("access_token","=",$access_token)->first();
        // }
        $cart = Cart::firstOrCreate([
            'user_id'=> $user,
            'product_id'=>$request->product_id,
            'quantity'=>$request->quantity,
            'subtotal'=>$request->quantity * $product->price
        ]);

        // $cart->quantity = $request->quantity;
        // $cart->save();

        // $cart->load('product');
        // $cart->subtotal = $cart->quantity * $cart->product->price;

        return response()->json([
            'message' => 'Item added to cart successfully',
            'cart' => $cart,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateCart(CartItemRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteCartItem(string $id)
    {
        //
    }
}
