<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $carts = Cart::all();
        $orders = Order::all();
        $products = Product::all();


        return view("admin/Carts/cart", compact("carts", "orders", "products"));
    }


    public function addCart(Request $request)
    {
        $carts = new Cart($request->all());
        $carts->save();
        return response()->json([
            'status' => 'success',
        ]);

    }




    public function updateCart(Request $request)
    {

        Cart::where('id', $request->up_id)->update([
            'order_id' => $request->up_order_id,
            'product_id' => $request->up_product_id,
            'quantity' => $request->up_quantity,



        ]);

        return response()->json(['status' => 'success']);

    }

    public function deleteCart(Request $request)
    {
        Cart::find($request->cart_id)->delete();
        return response()->json(['status' => 'success']);
    }



    // search_cart
    public function search_cart(Request $request)
    {
        $searchString = $request->input('search_string');

        // Perform the search query
        $carts = Cart::where('order_id', 'like', '%' . $searchString . '%')
            ->orWhere('product_id', 'like', '%' . $searchString . '%')
            ->orWhere('quantity', 'like', '%' . $searchString . '%')
            ->orderBy("id", "desc")
            ->get();

        if ($carts->count() >= 1) {
            return response()->json(['status' => 'success', 'html' => view('admin/Carts/search_results', compact('carts'))->render()]);
        } else {
            return response()->json(["status" => "nothing_found"]);
        }
    }
}
