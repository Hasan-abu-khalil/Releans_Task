

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function(){

        // Add Product data
        $(document).on('click','.add_product',function(event){
            event.preventDefault(); 

            let name = $('#name').val();
            let description = $('#description').val();
            let price = $('#price').val();
            let stock = $('#stock').val();
            let stock_low = $('#stock_low').val();

            // console.log(name);

            $.ajax({
                url: "{{route("add.product")}}",
                method:'post',
                data:{name:name,
                    description:description,
                    price:price,
                    stock:stock,
                    stock_low:stock_low,
                },

                success: function(res){
                    if(res.status == "success"){
                        $('#addModalProduct').modal('hide');
                        $('#addProductForm')[0].reset('');
                        $('.table').load(location.href + ' .table'); 
                        toastr.success('Product added successfully!');
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
        $(document).on('click', '.update_product_form', function () {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let description = $(this).data('description');
            let price = $(this).data('price');
            let stock = $(this).data('stock');
            let stock_low = $(this).data('stock_low');



            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_description').val(description);
            $('#up_price').val(price);
            $('#up_stock').val(stock);
            $('#up_stock_low').val(stock_low);


        });

        // Update product data
        $(document).on('click', '.update_product', function (e) {
            e.preventDefault();

            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_description = $('#up_description').val();
            let up_price = $('#up_price').val();
            let up_stock = $('#up_stock').val();
            let up_stock_low = $('#up_stock_low').val();



            $.ajax({
                url: "{{ route("update.product") }}",
                method: 'post',
                data: { 
                    up_id: up_id,
                     up_name: up_name, 
                     up_description: up_description, 
                     up_price: up_price, 
                     up_stock: up_stock,
                     up_stock_low:up_stock_low, 

                     },
                success: function (res) {
                    if (res.status == 'success') {
                        $('#updateProductModal').modal('hide');
                        $('#updateProductForm')[0].reset('');
                        $('.table').load(location.href + ' .table');
                        toastr.success('Product updated successfully!');
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



        // Delete product data
        $(document).on('click', '.delete_product', function(event) {
    event.preventDefault();
    let product_id = $(this).data('id');
    // alert(product_id);
    if (confirm('are you sure to delete product ??')){
        $.ajax({
            url: "{{route("delete.product")}}",
            method:'post',
            data :{product_id: product_id},
            success: function(res){
                if(res.status == 'success'){
                    $('.table').load(location.href + ' .table');
                    toastr.success('Product delete successfully!');
                }
            }
        })
    }
});



 // Search product Form the input
$(document).on('keyup', '#search', function (e) {
    e.preventDefault();
    let search_string = $(this).val();
    // console.log(search_string);
    $.ajax({
        url: "{{ route('search_product') }}",
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




 // Increment stock
 $(document).on('click', '.increment_stock', function (e) {
        e.preventDefault();
        let productId = $(this).data('id');
        updateStock(productId, 'increment');
    });

    // Decrement stock
    $(document).on('click', '.decrement_stock', function (e) {
        e.preventDefault();
        let productId = $(this).data('id');
        updateStock(productId, 'decrement');
    });

    // Function to update stock via AJAX
    function updateStock(productId, action) {
        $.ajax({
            url: "{{ route('update.stock') }}",
            method: 'POST',
            data: {
                product_id: productId,
                action: action
            },
            success: function (res) {
                if (res.status === 'success') {
                    $('.table').load(location.href + ' .table');
                    toastr.success('Stock updated successfully!');
                }
            },
            error: function (err) {
                toastr.error('Failed to update stock!');
            }
        });
    }

    $(document).on('click', '.show-more', function() {
            var $description = $(this).closest('.description');
            $description.find('.truncated-description').hide();
            $description.find('.full-description').show();
            $(this).text('Show less').removeClass('show-more').addClass('show-less');
        });

        $(document).on('click', '.show-less', function() {
            var $description = $(this).closest('.description');
            $description.find('.full-description').hide();
            $description.find('.truncated-description').show();
            $(this).text('Show more').removeClass('show-less').addClass('show-more');
        });




});

</script>