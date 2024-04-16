<div class="modal fade" id="updateCartModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateCartForm">
        @csrf
        <input type="hidden" id='up_id' name="up_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="errMsgContainer mb-3">

                </div>
                
                <div class="modal-body">
    <div class="form-group">
        <label for="up_order_id">Order</label>
        <select class="form-control" id="up_order_id" name="up_order_id">
            <option value="">Select Order</option>
            @foreach($orders as $order)
                <option value="{{ $order->id }}">{{ $order->id }} - {{ $order->user->name }}</option>
            @endforeach
        </select>
    </div>
</div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="up_product_id">Product</label>
                        <select class="form-control" id="up_product_id" name="up_product_id">
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                
                <div class="modal-body">
                    <div class="form-group">
                        <label for="up_quantity">Quantity</label>
                        <input type="number" class="form-control" id="up_quantity" name="up_quantity" placeholder="Enter Quantity" min="1">
                    </div>
                </div>

                


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_cart">Update Cart</button>
                </div>
            </div>
        </div>
</div>
</form>