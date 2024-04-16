<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function sales()
    {
        $salesData = Order::groupBy('created_at')
            ->selectRaw('DATE(created_at) as date, SUM(total) as total_sales')
            ->get();
        return view('admin.Report.sales', compact('salesData'));
    }

    public function stock()
    {
        $products = Product::all();
        return view('admin.Report.stock', compact('products'));
    }

    public function popularProducts()
    {
        
        $popularProducts = Product::orderBy('sold_count', 'desc')->take(10)->get();
        return view('admin.Report.popular_products', compact('popularProducts'));
    }
}
