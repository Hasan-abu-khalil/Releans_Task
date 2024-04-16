@extends('admin/layout/layout')

@section('title', 'Orders')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Orders</h3>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card ">
                    <div class="card">
                        <div class="card-body">
                            <a href="" class="btn btn-primary my-3" data-bs-toggle="modal"
                                data-bs-target="#addModalOrder">Add Order</a>
                                <input type="text" name='search_order' id='search_order' class='mb-3 form-control' placeholder='Search Here...'>
                                <hr style="background:#8080ff;">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Name</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $key => $order)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->total }}</td>
                                                <td>
                                                    <a href="" class="btn btn-danger delete_order"
                                                        data-id="{{ $order->id }}">
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

        @include('admin/Orders/add_order_modal')
        @include('admin/Orders/order_js')
    </div>

   
   
@endsection
