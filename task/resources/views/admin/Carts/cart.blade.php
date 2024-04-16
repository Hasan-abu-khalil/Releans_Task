@extends('admin/layout/layout')

@section('title', 'Cart')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Carts</h3>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card ">
                    <div class="card">
                        <div class="card-body">
                            <a href="" class="btn btn-primary my-3" data-bs-toggle="modal"
                                data-bs-target="#addModalCart">Add Cart</a>
                                <input type="text" name='search_cart' id='search_cart' class='mb-3 form-control' placeholder='Search Here...'>
                                <hr style="background:#8080ff;">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>order_id</th>
                                            <th>product_id</th>
                                            <th>quantity</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $key => $cart)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $cart->order_id }}</td>
                                                <td>{{ $cart->product_id }}</td>
                                                <td>{{ $cart->quantity }}</td>

                                                <td>
                                                    <a href="#" class="btn btn-success update_cart_form"
                                                        data-bs-toggle="modal" data-bs-target="#updateCartModal"
                                                        data-id="{{ $cart->id }}" data-order_id="{{ $cart->order_id }}"
                                                        data-product_id="{{ $cart->product_id }}"
                                                        data-quantity="{{ $cart->quantity }}">
                                                        
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>

                                                    <a href="" class="btn btn-danger delete_cart"
                                                        data-id="{{ $cart->id }}">
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

        @include('admin/Carts/update_cart_modal')
        @include('admin/Carts/add_cart_modal')
        @include('admin/Carts/cart_js')
    </div>

   
   
@endsection
