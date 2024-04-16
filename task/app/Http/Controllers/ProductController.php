<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // index for page product 
    public function product()
    {
        $products = Product::all();
        return view("admin/Products/product", compact("products"));
    }

    // add product
    public function addproduct(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:products|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ], [
            'name.required' => 'Name is required',
            'name.unique' => 'Product name must be unique',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name cannot exceed 50 characters',
            'description.string' => 'Description must be a string',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'price.min' => 'Price must be at least 0',
            'stock.required' => 'Stock is required',
            'stock.integer' => 'Stock must be an integer',
            'stock.min' => 'Stock must be at least 0',
        ]);

        $products = new Product($request->all());
        $products->save();
        return response()->json([
            'status' => 'success',
        ]);

    }

    // update Product
    public function updateProduct(Request $request)
    {

        $request->validate([
            'up_name' => 'required|unique:products,name,' . $request->up_id,
            'up_description' => 'required|string',
            'up_price' => 'required|numeric|min:0',
            'up_stock' => 'required|integer|min:0',
            'up_stock_low' => 'required|integer|min:0',

        ], [
            'up_name.required' => 'Name is required',
            'up_name.unique' => 'Product name must be unique',
            'up_description.required' => 'Description is required',
            'up_description.string' => 'Description must be a string',
            'up_price.required' => 'Price is required',
            'up_price.numeric' => 'Price must be a number',
            'up_stock.required' => 'Stock is required',
            'up_stock.integer' => 'Stock must be an integer',
            'up_stock_low.required' => 'Stock low is required',
            'up_stock_low.integer' => 'Stock low must be an integer',
        ]);

        Product::where('id', $request->up_id)->update([
            'name' => $request->up_name,
            'description' => $request->up_description,
            'price' => $request->up_price,
            'stock' => $request->up_stock,
            'stock_low' => $request->up_stock_low,


        ]);

        return response()->json(['status' => 'success']);

    }

    // delete Product
    public function deleteproduct(Request $request)
    {
        Product::find($request->product_id)->delete();
        return response()->json(['status' => 'success']);
    }


    // search
    public function search(Request $request)
    {
        $searchString = $request->input('search_string');

        // Perform the search query
        $products = Product::where('name', 'like', '%' . $searchString . '%')
            ->orWhere('description', 'like', '%' . $searchString . '%')
            ->orWhere('price', 'like', '%' . $searchString . '%')
            ->orWhere('stock', 'like', '%' . $searchString . '%')
            ->orderBy("id", "desc")
            ->get();

        if ($products->count() >= 1) {
            return response()->json(['status' => 'success', 'html' => view('admin.Products.search_results', compact('products'))->render()]);
        } else {
            return response()->json(["status" => "nothing_found"]);
        }
    }




    // update Stock increment and decrement
    public function updateStock(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        if ($request->action === 'increment') {
            $product->stock += 1;
        } elseif ($request->action === 'decrement') {
            if ($product->stock > 0) {
                $product->stock -= 1;
            } else {
                return response()->json(['status' => 'error', 'message' => 'Stock cannot be less than 0']);
            }
        }
        $product->save();
        return response()->json(['status' => 'success']);
    }

}
