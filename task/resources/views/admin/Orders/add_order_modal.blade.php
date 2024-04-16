<div class="modal fade" id="addModalOrder" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form id="addOrderForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="errMsgContainer mb-3">
                    <!-- Error messages will be displayed here -->
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    <label for="user_id">User</label>
                        <select class="form-control" id="user_id" name="user_id">
                           <option value="">Select User</option>
                             @foreach($users as $user)
                                 <option value="{{ $user->id }}">{{ $user->name }}</option>
                             @endforeach
                          </select>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="description"> Total Price</label>
                        <input type="number" class="form-control" id="total" name="total" placeholder="Enter Product Totle">
                    </div>
                </div>
                

                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_order">Save Order</button>
                </div>
            </div>
        </div>
    </form>
</div>
