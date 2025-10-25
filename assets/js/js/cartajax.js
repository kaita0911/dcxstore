$(document).ready(function() {
    load_cart_data();
    function load_cart_data() {
        $.ajax({
            url: "../sources/fetch_cart.php",
            method: "POST",
            dataType: "json",
            success: function(data) {
                $('.badge').text(data.number);
            }
        });
    }

    ////////////////addtocart/////////////////////
    $(document).on('click', '.AddtoBasket', function() {
        var id = $(this).attr("data-id");
        var pricesp = $(this).attr("data-price");
        var modal = $(this).attr("data-modal");
        var color = $(this).attr("data-color");
        var selected = $(this).attr("data-selected");
        var qty = $('#qty' + id).val();
        var namesp = $('#namesp' + id).val();
        var unique_key = $('#unique_key' + id).val();
        var check_show_size = $(this).attr("data-size");
        var check_choose_size = $(this).attr("data-check");
        var imgsp = $('#imgsp' + id).val();
        if (check_show_size == 1) {
            if (check_choose_size == 0) {
                alert('Vui lòng chọn loại!');
                return false;
            }

        }

        //var prsize = $(".sizepr:checked").val();
        $.ajax({
            url: "../sources/cartajax.php",
            type: "POST",
            //dataType: "json",
            data: {
                id: id,
                qty: qty,
                namesp: namesp,
                selected: selected,
                modal: modal,
                color: color,
                unique_key: unique_key,
                pricesp: pricesp,
                imgsp: imgsp

            },
            success: function(response) {
                const data = JSON.parse(response);
                $('#cart_details').html(data.cart_details);
                $(".box-cartajax").addClass('open');
                $(".bg-ajax").addClass('open');
                $('.badge').text(data.number);
            },
            error: function() {
                alert('error');
            }
        });

    });
    $(document).on('click', '.addnhanh', function() {
        var id = $(this).attr("data-id");
        var pricesp = $(this).attr("data-price");
        var modal = $(this).attr("data-modal");
        var qty = $('#qty' + id).val();
        var selected = $(this).attr("data-selected");
        var namesp = $('#namesp' + id).val();
        var unique_key = $('#unique_key' + id).val();
        var check_show_size = $(this).attr("data-size");
        var check_choose_size = $(this).attr("data-check");
        var imgsp = $('#imgsp' + id).val();
        if (check_show_size == 1) {
            if (check_choose_size == 0) {
                alert('Vui lòng chọn loại máy !');
                return false;
            }

        }

        //var prsize = $(".sizepr:checked").val();
        $.ajax({
            url: "../sources/cartajax_nocolorsize.php",
            type: "POST",
            //dataType: "json",
            data: {
                id: id,
                qty: qty,
                namesp: namesp,
                modal: modal,
                selected: selected,
                unique_key: unique_key,
                pricesp: pricesp,
                imgsp: imgsp

            },
            success: function(data) {
                window.location.href = '/gio-hang/dat-hang/';
            },
            error: function() {
                alert('error');
            }
        });

    });
    //xoa san pham ajax
    $(document).on('click', '.delete', function() {

        var id = $(this).attr("id");
        var pricesp = $(this).attr("data-price");
        var action = 'remove';
        if (confirm("Bạn muốn xóa sản phẩm này ko?")) {
            $.ajax({
                url: "../sources/deleteajax.php",
                method: "POST",
                data: {
                    id: id,
                    pricesp: pricesp,
                    action: action
                },
                success: function() {
                    load_cart_data();
                    $('#cart-popover').popover('hide');

                }
            })
        } else {
            return false;
        }
    });
   
    /////////check all cart //////////////

    $('#emptyCart').click(function() {
        $.ajax({
            type: 'POST',
            url: 'ajax_calls.php',
            dataType: 'json',
            data: {
                action: 'empty',
                empty_cart: true
            },
            success: function(data) {
                if (data.msg == 'success') {
                    window.location.href = 'cart.php';
                }
            }
        });
    });
});