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
use Illuminate\Support\Facades\Validator;



class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getCart($id)
    {
        $cartItems = Cart::where('user_id', $id)->with('product')->get();

        $total = 0;
        foreach ($cartItems as $cartItem) {
            $cartItem->subtotal = $cartItem->quantity * $cartItem->product->price;
            $total += $cartItem->subtotal;
        }

        return response()->json([
            'cart_items' => $cartItems,
            'total' => $total,
        ]);
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
            'subtotal'=>$request->quantity * $product->price,
            'expired_at' => now()->addMinutes(5)
        ]);

        $product->stock_number = $product->stock_number - $cart->quantity;
        $product->save();
        // dd($product->stock_number);
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
    public function updateCart($id, Request $request)
    {
        // dd($request->quantity);
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        $old_quantity = $cart->quantity;

        $cart->quantity = $request->quantity;
        $cart->save();

        if ($cart->quantity == 0) {
            $cart->delete();
            return response()->json(['message' => 'Item removed from cart']);
        }

        $product->stock_number = $product->stock_number - ($cart->quantity - $old_quantity);
        $product->save();

        $cart->load('product');
        $cart->subtotal = $cart->quantity * $cart->product->price;

        $cart->save();

        return response()->json([
            'message' => 'Cart item updated successfully',
            'cart' => $cart,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteCartItem($user_id, $id)
    {
        $cart = Cart::where('user_id', $user_id)->where('id', $id)->first();
    
        if (!$cart) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }
    
        $cart->delete();
    
        return response()->json(['message' => 'Item removed from cart successfully']);
    }
}
