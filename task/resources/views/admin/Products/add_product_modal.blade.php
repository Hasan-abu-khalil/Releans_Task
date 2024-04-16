<div class="modal fade" id="addModalProduct" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form id="addProductForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="errMsgContainer mb-3">
                    <!-- Error messages will be displayed here -->
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product name">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Product Description">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter Product Price">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="stock">Product Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter Product Stock">
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="stock_low">Product Stock Low</label>
                        <input type="number" class="form-control" id="stock_low" name="stock_low" placeholder="Enter Product Stock Low">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_product">Save Product</button>
                </div>
            </div>
        </div>
    </form>
</div>
