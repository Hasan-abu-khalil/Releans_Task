<div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateUserForm">
        @csrf
        <input type="hidden" id='up_id' name="up_id">
        <input type="hidden" id='up_email' name="up_email">
        <input type="hidden" id='up_password' name="up_password">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="errMsgContainer mb-3">

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="up_name">Name</label>
                        <input type="text" class="form-control" id="up_name" name="up_name" placeholder="Enter user name">
                    </div>
                </div>
                
                
                <div class="modal-body">
                    <div class="form-group">
                        <label for="up_phone">Phone</label>
                        <input type="number" class="form-control" id="up_phone" name="up_phone" placeholder="Enter your phone">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="up_address">Address</label>
                        <input type="text" class="form-control" id="up_address" name="up_address" placeholder="Enter Your address">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="up_role">Role</label>
                        <select class="form-control" id="up_role" name="up_role">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="managers">Manager</option>
                        </select>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_user">Update User</button>
                </div>
            </div>
        </div>
</div>
</form>