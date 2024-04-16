
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function(){

        // add order
            $(document).on('click','.add_order',function(event){
            event.preventDefault();

            let user_id = $('#user_id').val();
            let total = $('#total').val();

            $.ajax({
                url: "{{ route('add.order') }}",
                method: 'POST',
                data: {
                    user_id: user_id,
                    total: total,
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {   
                 if(res.status == "success"){
                        $('#addModalOrder').modal('hide');
                        $('#addOrderForm')[0].reset('');
                        $('.table').load(location.href + ' .table'); 
                        toastr.success('Order added successfully!');
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


        // delete order
        $(document).on('click', '.delete_order', function(event) {
             event.preventDefault();
             let order_id = $(this).data('id');
           if (confirm('are you sure to delete order ??')){
            $.ajax({
               url: "{{route("delete.order")}}",
               method:'post',
               data :{order_id: order_id},
               success: function(res){
                  if(res.status == 'success'){
                      $('.table').load(location.href + ' .table');
                      toastr.success('Order delete successfully!');
                     }
                 }
               })
            }
        });




        $(document).on('keyup', '#search_order', function (e) {
    e.preventDefault();
    let search_string = $(this).val();
    $.ajax({
        url: "{{ route('search_order') }}",
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
