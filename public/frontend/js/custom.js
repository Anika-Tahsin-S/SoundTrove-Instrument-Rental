// increment and decrement of the product
$(document).ready(function () {
    loadcart();
    loadwishlist();
    
    function loadcart()
    {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "GET",
            url: "/load-cart-data",
     
            success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });
    }
    function loadwishlist()
    {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "GET",
            url: "/load-wishlist-count",
     
            success: function (response) {
                $('.wish-count').html('');
                $('.wish-count').html(response.count);
            }
        });
    }
    //---------------------------------
    $(".addToCartBtn").click(function (e) {
        e.preventDefault();

        var product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        var product_qty = $(this)
            .closest(".product_data")
            .find(".qty-inp")
            .val();
        var product_rent_days = $(this)
            .closest(".product_data")
            .find(".day-inp")
            .val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                product_qty: product_qty,
                product_rent_days: product_rent_days
            },
            success: function (response) {
                swal(response.status);
                loadcart()
            },
        });
    });

    $(".addToWishlist").click(function (e) {
        e.preventDefault();

        var product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: "/add-to-wishlist",
            data: {
                product_id: product_id,
            },
            success: function (response) {
                swal(response.status);
                loadwishlist()
            },
        });
    });
    //---------------------------------
    
    $(".increase-btn").click(function (e) {
        e.preventDefault();

        var value_inc = $(this).closest('.product_data').find('.qty-inp').val();
        var value = parseInt(value_inc, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty-inp').val(value);
        }
    });
    $(".decrease-btn").click(function (e) {
        e.preventDefault();

        var value_dec = $(this).closest(".product_data").find(".qty-inp").val();
        var value = parseInt(value_dec, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest(".product_data").find(".qty-inp").val(value);
        }
    });
    //---------------------------------
    $(".increase-btnn").click(function (e) {
        e.preventDefault();

        var value_inc = $(this).closest('.product_data').find('.day-inp').val();
        var value = parseInt(value_inc, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.day-inp').val(value);
        }
    });
    $(".decrease-btnn").click(function (e) {
        e.preventDefault();

        var value_dec = $(this).closest(".product_data").find(".day-inp").val();
        var value = parseInt(value_dec, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest(".product_data").find(".day-inp").val(value);
        }
    });

    $('.delete-cart-item').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest(".product_data").find(".product_id").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: "delete-cart-item",
            data: {
                'product_id':product_id,
            },
            success: function (response) {
                setTimeout(location.reload.bind(location), 1000);
                swal("",response.status,"success");
            }
        });
    });
    $('.delete-wish-item').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest(".product_data").find(".product_id").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: "delete-wish-item",
            data: {
                'product_id':product_id,
            },
            success: function (response) {
                setTimeout(location.reload.bind(location), 1000);
                swal("",response.status,"success");
            }
        });
    });
    //---------------------------------

    $('.changeQty').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest(".product_data").find(".product_id").val();
        var qty = $(this).closest(".product_data").find(".qty-inp").val();
        var days = $(this).closest(".product_data").find(".day-inp").val();
        data={
            'product_id':product_id,
            'product_qty':qty,
            'product_rent_days':days
        }
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                setTimeout(location.reload.bind(location), 1000);
                swal("",response.status,"success");
            }
        });
    });
});
