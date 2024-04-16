

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function(){

        // Add User data
        $(document).on('click','.add_user',function(event){
            event.preventDefault(); 

            let name = $('#name').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let phone = $('#phone').val();
            let address = $('#address').val();
            let role = $('#role').val(); 

            $.ajax({
                url: "{{ route('add.user') }}",
                method:'post',
                data:{
                    name: name,
                    email: email,
                    password: password,
                    phone: phone,
                    address: address,
                    role: role 
                },
                success: function(res){
                    if(res.status == "success"){
                        $('#addModalUser').modal('hide');
                        $('#addUserForm')[0].reset('');
                        $('.table').load(location.href + ' .table'); 
                        toastr.success('User added successfully!');
                        $('.errMsgContainer').empty();
                    }
                },
                error: function(err) {
    let errors = err.responseJSON.errors;
    $('.errMsgContainer').html(''); // Clear previous error messages
    
    // Iterate over each field error
    $.each(errors, function(field, messages) {
        // Iterate over each error message for the field
        $.each(messages, function(index, message) {
            $('.errMsgContainer').append('<span class="text-danger">' + message + '</span>' + '<br>');
        });
    });
}
            });
        });

        

        // Show user update form
        $(document).on('click', '.update_user_form', function () {
    let id = $(this).data('id');
    let name = $(this).data('name');
    let email = $(this).data('email');
    let password = $(this).data('password');
    let phone = $(this).data('phone');
    let address = $(this).data('address');
    let role = $(this).data('role');

    $('#up_id').val(id);
    $('#up_name').val(name);
    $('#up_email').val(email);
    $('#up_password').val(password);
    $('#up_phone').val(phone);
    $('#up_address').val(address);
    $('#up_role').val(role);
});

        // Update user data
        $(document).on('click', '.update_user', function (e) {
            e.preventDefault();

            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_email = $('#up_email').val();
            let up_password = $('#up_password').val();
            let up_phone = $('#up_phone').val();
            let up_address = $('#up_address').val();
            let up_role = $('#up_role').val(); 

            $.ajax({
                url: "{{ route('update.user') }}",
                method: 'post',
                data: {
                    up_id: up_id,
                    up_name: up_name,
                    up_email: up_email,
                    up_password: up_password,
                    up_phone: up_phone,
                    up_address: up_address,

                    up_role: up_role 
                },
                success: function (res) {
                    if (res.status == 'success') {
                        $('#updateUserModal').modal('hide');
                        $('#updateUserForm')[0].reset('');
                        $('.table').load(location.href + ' .table');
                        toastr.success('User updated successfully!');
                        $('.errMsgContainer').empty();
                    }
                },
                error: function(err) {
    let errors = err.responseJSON.errors;
    $('.errMsgContainer').html(''); // Clear previous error messages
    
    // Iterate over each field error
    $.each(errors, function(field, messages) {
        // Iterate over each error message for the field
        $.each(messages, function(index, message) {
            $('.errMsgContainer').append('<span class="text-danger">' + message + '</span>' + '<br>');
        });
    });
}
            });
        });

        // Delete user data
        $(document).on('click', '.delete_user', function(event) {
            event.preventDefault();
            let user_id = $(this).data('id');
            if (confirm('Are you sure you want to delete this user?')){
                $.ajax({
                    url: "{{ route('delete.user') }}",
                    method:'post',
                    data :{ user_id: user_id },
                    success: function(res){
                        if(res.status == 'success'){
                            $('.table').load(location.href + ' .table');
                            toastr.success('User deleted successfully!');
                        }
                    },
                    error: function (err) {
                        toastr.error('Failed to delete user!');
                    }
                });
            }
        });

        // Search user
        $(document).on('keyup', '#search_user', function (e) {
    e.preventDefault();
    let search_string = $(this).val();
    $.ajax({
        url: "{{ route('search_user') }}",
        method: 'GET',
        data: { search_string: search_string },
        success: function (res) {
            if (res.status === 'success') {
                $('.table-responsive').html(res.html);
            } else if (res.status === 'nothing_found') {
                $('.table-responsive').html('<span class="text-danger">Nothing Found</span>');
            }
        }
    });
});

    });
</script>