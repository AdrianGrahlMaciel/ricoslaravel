<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function getByUser($user_id){
        $cart = Cart::where('user_id',$user_id)->first();
        if($cart){
            $details = CartDetail::where('cart_id',$cart->id)->get();
            $cart->details = $details;
            return response()->json([
                'cart' => $cart,
                'status' => 1
            ]);
        }else{
            return response()->json([
                'status' => 0
            ]);
        }
    }
    public function getById($cart_id){
        $cart = Cart::find($cart_id);
        if($cart){
            $details = CartDetail::where('cart_id',$cart->id)->get();
            $cart->details = $details;
            return response()->json([
                'cart' => $cart,
                'status' => 1
            ]);
        }else{
            return response()->json([
                'status' => 0
            ]);
        }
    }
    public function getDetails($cart_id){
        $cart = Cart::find($cart_id);
        if($cart){
            $details = CartDetail::where('cart_id',$cart->id)->get();
            return response()->json([
                'details' => $details,
                'status' => 1
            ]);
        }else{
            return response()->json([
                'status' => 0
            ]);
        }
    }

    public function totalQuantity($cart_id){
        $totalQuantity = 0;
        $totalQuantity = DB::table('carts_details')->where('cart_id',$cart_id)->sum('carts_details.quantity');
        if($totalQuantity){
            return response()->json([
                'cart_id' => $cart_id,
                'totalQuantity' => $totalQuantity,
                'status' => 1
            ]);
        }else{
            return response()->json([
                'cart_id' => $cart_id,
                'status' => 0
            ]);
        }
    }
}
