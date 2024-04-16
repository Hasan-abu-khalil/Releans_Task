<div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateProductForm">
        @csrf
        <input type="hidden" id='up_id' name="up_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="errMsgContainer mb-3">

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="up_name">Product Name</label>
                        <input type="text" class="form-control" name="up_name" id="up_name">
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="up_description">Product Description</label>
                        <input type="text" class="form-control" name="up_description" id="up_description">
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="up_price">Product Price</label>
                        <input type="number" class="form-control" name="up_price" id="up_price">
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="up_stock">Product Stock</label>
                        <input type="number" class="form-control" name="up_stock" id="up_stock">
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="up_stock_low">Product Stock Low</label>
                        <input type="number" class="form-control" name="up_stock_low" id="up_stock_low">
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_product">Update Product</button>
                </div>
            </div>
        </div>
</div>
</form>