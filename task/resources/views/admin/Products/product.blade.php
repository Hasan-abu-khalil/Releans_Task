@extends('admin/layout/layout')

@section('title', 'Products')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Products</h3>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card ">
                    <div class="card">
                        <div class="card-body">
                            <a href="" class="btn btn-primary my-3" data-bs-toggle="modal"
                                data-bs-target="#addModalProduct">Add Product</a>
                                <input type="text" name='search' id='search' class='mb-3 form-control' placeholder='Search Here...'>
                                <hr style="background:#8080ff;">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Stock</th> 
                                            <th>Stock Low</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $key => $product)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>
                                                 <div class="description" >
                                                   <span class="full-description" style="display: none;">{{ $product->description }}</span>
                                                  <span class="truncated-description">{{ \Illuminate\Support\Str::limit($product->description, 50) }}</span>
                                                  <button class="btn btn-sm btn-link show-more">Show more</button>
                                                 </div>
                                                 </td>
                                                <td>$ {{ $product->price }}</td>
                                               
                                                <td>
                                                
                                                    <button class="btn btn-success btn-sm increment_stock " data-id="{{ $product->id }}">+</button>
                                                   
                                                    <button class="btn btn-danger btn-sm decrement_stock mr-3" data-id="{{ $product->id }}">-</button>
                                                    {{ $product->stock }}

                                                    @if($product->stock <= $product->stock_low)
                                                       <span class="text-danger ml-1">Stock almost exhausted!</span>
                                                     @endif
                                                    
                                                 </td>
                                                <td>{{ $product->stock_low }}</td>

                                               

                                                <td>
                                                    <a href="#" class="btn btn-success update_product_form"
                                                        data-bs-toggle="modal" data-bs-target="#updateProductModal"
                                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                        data-description="{{ $product->description }}"
                                                        data-price="{{ $product->price }}"
                                                        data-stock="{{ $product->stock }}"
                                                        data-stock_low="{{ $product->stock_low }}">
                                                        
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>

                                                    <a href="" class="btn btn-danger delete_product"
                                                        data-id="{{ $product->id }}">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Hasan Abu-Khalil
                    2024</span>

            </div>
        </footer>
        <!-- partial -->

        @include('admin/Products/update_product_modal')
        @include('admin/Products/add_product_modal')
        @include('admin/Products/product_js')
    </div>

   
   
@endsection
