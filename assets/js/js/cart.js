$(document).ready(function() {

$('.qty-plus, .qty-minus').on('click', function () {
    const input = $(this).siblings('.cart-qty-single');
    let val = parseInt(input.val());
    if ($(this).hasClass('qty-plus')) val++;
    if ($(this).hasClass('qty-minus') && val > 1) val--;
    input.val(val).trigger('change'); // trigger update
});
 //update quatity ajax
    $(".cart-qty-single").change(function() {
        let id = $(this).data('item-id');
        let pricesp = $(this).attr("data-price");
        let qty = $(this).val();    
        //console.log(pricesp);
        $.ajax({
            url: '../sources/ajax_calls.php',
            method: 'POST',

            //dataType: 'json',
            data: {
                //action: 'update-qty',
                id: id,
                pricesp: pricesp,
                qty: qty
            },
            success: function(response) {
                const data = JSON.parse(response);
                $('#item-total-' + id + pricesp).text(data.item_total);
                $('#cart-qty').text(data.cart_qty);
                $('#item_'+ id).val(qty);
                $('#cart-total').text(data.cart_total);
            }
        });
    });
//////////////////////////

    $(document).on('change', '.cart-item-checkbox', function () {
        let options = [];
        ids = $(this).data('id');
        prices = $(this).data('price');
        options.push({
            id: $(this).data('id'),
            price: $(this).data('price'),
            qty: $(this).val(),
            checked: $(this).is(':checked') ? 1 : 0
        });
        fetch('../sources/ajax_update_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ items: options,ids:ids, prices:prices })
        })
        .then(res => res.json())    
        .then(data => {
            console.log('Raw response:', data); // Debug
            document.getElementById('cart-total').textContent = data.total;
            document.getElementById('cart-qty').textContent = data.qty;
        });
    });
    ////////////////////////
    const selectAll = document.getElementById('selectAll');
    const items = document.querySelectorAll('.cart-item-checkbox');

    selectAll.addEventListener('change', () => {
      items.forEach(item => {
        item.checked = selectAll.checked;
      });
    });

    items.forEach(item => {
      item.addEventListener('change', () => {
        selectAll.checked = Array.from(items).every(item => item.checked);
      });
    });


    selectAll.addEventListener('change', () => {

      if (!selectAll.checked) {
        items.forEach(item => {
            item.checked = false;
            let options = [];
            ids = item.dataset.id;
            prices = item.dataset.price;
            options.push({
                id: item.dataset.id,
                price: item.dataset.price,
                qty: item.value,
                checked: 0
            });
            fetch('../sources/ajax_update_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ items: options,ids:ids, prices:prices })
            })
            .then(res => res.json())    
            .then(data => {
                console.log('Raw response:', data); // Debug
                document.getElementById('cart-total').textContent = data.total;
                document.getElementById('cart-qty').textContent = data.qty;
            });
        });
      }
      else {
        // "Select All" is checked — check all item checkboxes
           items.forEach(item => {
                item.checked = true;
                let options = [];
                ids = item.dataset.id;
                prices = item.dataset.price;
                options.push({
                    id: item.dataset.id,
                    price: item.dataset.price,
                    qty: item.value,
                    checked: 1
                });
                console.log(options);
                fetch('../sources/ajax_update_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ items: options,ids:ids, prices:prices })
                })
                .then(res => res.json())    
                .then(data => {
                    console.log('Raw response:', data); // Debug
                    document.getElementById('cart-total').textContent = data.total;
                    document.getElementById('cart-qty').textContent = data.qty;
                });
            });
            console.log('All items are now checked.');
        }
      
    });

    // Check if all items are checked on page load
    window.addEventListener('DOMContentLoaded', () => {

      const allChecked = Array.from(items).every(item => item.checked);

      selectAll.checked = allChecked;

    });

    ////////////////////
     //xóa sản phẩm page giỏ hàng
    $(document).on('click', '.delete-item', function() {

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

                    window.location.href = '/gio-hang/';
                }
            })
        } else {
            return false;
        }
    });
    const noticeText = document.getElementById('cart-qty').textContent;
    if (noticeText == 0) {
        //alert("Your cart is currently empty."); // or show a DOM notice instead
        $('.flex-cart').addClass('empty');
        $('.flex-buy').addClass('is-active');
    }
});