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