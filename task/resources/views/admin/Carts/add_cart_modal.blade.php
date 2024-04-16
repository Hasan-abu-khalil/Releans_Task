<div class="modal fade" id="addModalCart" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form id="addCartForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="errMsgContainer mb-3">
                    <!-- Error messages will be displayed here -->
                </div>
                <div class="modal-body">
                  <div class="form-group">
                        <label for="order_id">Order</label>
                        <select class="form-control" id="order_id" name="order_id">
                            <option value="">Select Order</option>
                            @foreach($orders as $order)
                            <option value="{{ $order->id }}">{{ $order->id }} - {{ $order->user->name }}</option>
                            @endforeach
                        </select>
                  </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="product_id">Product</label>
                        <select class="form-control" id="product_id" name="product_id">
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                
                <div class="modal-body">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" min="1">
                    </div>
                </div>

                <!-- <div class="modal-body">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" readonly>
                    </div>
                </div>
                
                <div class="modal-body">
                    <div class="form-group">
                        <label for="total">Total Price</label>
                        <input type="number" class="form-control" id="total" name="total" placeholder="Total Price" readonly>
                    </div>
                </div> -->
                

                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_cart">Save Cart</button>
                </div>
            </div>
        </div>
    </form>
</div>
