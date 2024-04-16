
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function(){

        // add cart
            $(document).on('click','.add_cart',function(event){
            event.preventDefault();

            let order_id = $('#order_id').val();
            let product_id = $('#product_id').val();
            let quantity = $('#quantity').val();


            $.ajax({
                url: "{{ route('add.cart') }}",
                method: 'POST',
                data: {
                    order_id: order_id,
                    product_id: product_id,
                    quantity: quantity,
                },
                success: function (res) {   
                 if(res.status == "success"){
                        $('#addModalCart').modal('hide');
                        $('#addCartForm')[0].reset('');
                        $('.table').load(location.href + ' .table'); 
                        toastr.success('cart added successfully!');
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


        // Show product update form
        $(document).on('click', '.update_cart_form', function () {
            let id = $(this).data('id');
            let order_id = $(this).data('order_id');
            let product_id = $(this).data('product_id');
            let quantity = $(this).data('quantity');


            $('#up_id').val(id);
            $('#up_order_id').val(order_id);
            $('#up_product_id').val(product_id);
            $('#up_quantity').val(quantity);
           


        });

        // Update cart data
        $(document).on('click', '.update_cart', function (e) {
            e.preventDefault();

           

            let up_id = $('#up_id').val();
    let up_order_id = $('#up_order_id').val(); 
    let up_product_id = $('#up_product_id').val();
    let up_quantity = $('#up_quantity').val();

            $.ajax({
                url: "{{ route("update.cart") }}",
                method: 'post',
                data: { 
                    up_id: up_id,
                    up_order_id: up_order_id, 
                    up_product_id: up_product_id, 
                    up_quantity: up_quantity, 
                     },
                success: function (res) {
                    if (res.status == 'success') {
                        $('#updateCartModal').modal('hide');
                        $('#updateCartForm')[0].reset('');
                        $('.table').load(location.href + ' .table');
                        toastr.success('Cart updated successfully!');
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


         // delete cart
         $(document).on('click', '.delete_cart', function(event) {
             event.preventDefault();
             let cart_id = $(this).data('id');
           if (confirm('are you sure to delete cart ??')){
            $.ajax({
               url: "{{route("delete.cart")}}",
               method:'post',
               data :{cart_id: cart_id},
               success: function(res){
                  if(res.status == 'success'){
                      $('.table').load(location.href + ' .table');
                      toastr.success('cart delete successfully!');
                     }
                 }
               })
            }
        });



        $(document).on('keyup', '#search_cart', function (e) {
    e.preventDefault();
    let search_string = $(this).val();
    $.ajax({
        url: "{{ route('search_cart') }}",
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
