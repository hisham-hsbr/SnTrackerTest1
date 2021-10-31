<div class="container">
    <div class="row product_data">

        <div class="col-md-4">
            <img src="{{ asset('products/image-1.jpg') }}" class="w-100" alt="Product 1">
            <h4>Product 1</h4>
            <input type="hidden" class="product_id" value="1"> <!-- Your Product ID -->
            <input type="text" class="qty-input" value="2"> <!-- Your Number of Quantity -->
            <button type="button" class="add-to-cart-btn btn btn-primary">Add to Cart</button>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('products/image-2.jpg') }}" class="w-100" alt="Product 2">
            <h4>Product 1</h4>
            <input type="hidden" class="product_id" value="2"> <!-- Your Product ID -->
            <input type="text" class="qty-input" value="2"> <!-- Your Number of Quantity -->
            <button type="button" class="add-to-cart-btn btn btn-primary">Add to Cart</button>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('products/image-3.jpg') }}" class="w-100" alt="Product 3">
            <h4>Product 1</h4>
            <input type="hidden" class="product_id" value="3"> <!-- Your Product ID -->
            <input type="text" class="qty-input" value="1"> <!-- Your Number of Quantity -->
            <button type="button" class="add-to-cart-btn btn btn-primary">Add to Cart</button>
        </div>

    </div>
</div>
<script>
     $(document).ready(function () {
        $('.add-to-cart-btn').click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var quantity = $(this).closest('.product_data').find('.qty-input').val();

            $.ajax({
                url: "/add-to-cart",
                method: "POST",
                data: {
                    'quantity': quantity,
                    'product_id': product_id,
                },
                success: function (response) {
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                },
            });
        });
    });
</script>


