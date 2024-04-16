<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        $orders = Order::all();
        $users = User::all();

        return view("admin/Orders/order", compact("orders", "users"));
    }


    // add Order
    public function addOrder(Request $request)
    {
        $products = new Order($request->all());
        $products->save();
        return response()->json([
            'status' => 'success',
        ]);
    }

    // delete Order
    public function deleteOrder(Request $request)
    {
        Order::find($request->order_id)->delete();
        return response()->json(['status' => 'success']);
    }




    // search_order
    public function search_order(Request $request)
    {
        $searchString = $request->input('search_string');

        // Perform the search query
        $orders = Order::whereHas('user', function ($query) use ($searchString) {
            $query->where('name', 'like', '%' . $searchString . '%');
        })
            ->orderBy("id", "desc")
            ->get();

        if ($orders->count() >= 1) {
            return response()->json(['status' => 'success', 'html' => view('admin/Orders/search_results', compact('orders'))->render()]);
        } else {
            return response()->json(["status" => "nothing_found"]);
        }
    }
}
