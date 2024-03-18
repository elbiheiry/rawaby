var bar = $('.bar');
var percent = $('.percent');

$('.ajax-form').ajaxForm({
    beforeSend: function() {
        // status.text('');
        var percentVal = '0%';
        var posterValue = $('input[name=file]').fieldValue();
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    success: function(response) {
        // var percentVal = 'Wait, Saving';
        //
        // bar.width(percentVal)
        // percent.html(percentVal);

        if (response.status === "success") {
            var alertSelector = '.SuccessMessage';
            var alertOpSelector = '.ErrorMessage';
        } else if (response.status === "error") {
            var alertSelector = '.ErrorMessage';
            var alertOpSelector = '.SuccessMessage';
        }
        $(alertSelector).html(response.data);
        $(alertSelector).hide().removeClass('d-none').fadeIn();
        setTimeout(function () {
            $(alertSelector).fadeOut().addClass('d-none');
        }, 3000);
        $(alertOpSelector).fadeOut().addClass('d-none');

        $('.ajax-form').clearForm();
    },
    complete: function(xhr) {
        // status.html(xhr.responseText);
    }
});

$('.CartBTN').on('click',function () {
    var url = $(this).data('url');

    $.ajax({
        url : url,
        method : 'POST',
        dataType: 'json',
        data : {_token : $(this).data('token')},
        success : function (response) {
            $('#Cart-Content-Tab').html(response.html);
        }
    });
    $.ajaxSetup({
        headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
    });
    return false;
});
$('.cart-form').on('submit' ,function () {
    var form = $(this);
    var url = form.attr('action');

    $.ajax({
        url : url,
        method : 'POST',
        dataType: 'json',
        data : form.serialize(),
        success : function (response) {
            $('#Cart-Content-Tab').html(response.html);
            if (response.status === "success") {
                var alertSelector = '.SuccessMessage';
                var alertOpSelector = '.ErrorMessage';
            } else if (response.status === "error") {
                var alertSelector = '.ErrorMessage';
                var alertOpSelector = '.SuccessMessage';
            }
            $(alertSelector).html(response.data);
            $(alertSelector).hide().removeClass('d-none').fadeIn();
            setTimeout(function () {
                $(alertSelector).fadeOut().addClass('d-none');
            }, 3000);
            $(alertOpSelector).fadeOut().addClass('d-none');
        }
    });
    $.ajaxSetup({
        headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
    });
    return false;
});

$('.cart-amount-btn').on('click' ,function () {
    var itemRow = $(this).closest('.cart-item-row');
    var itemRowId = itemRow.attr('id');
    if ($(this).data('type') == 'increase'){
        var itemNewAmount = parseInt($('#' + itemRowId).find('.cart-amount-input').val()) + 1; // value is not accurate
    }else {
        var itemNewAmount = parseInt($('#' + itemRowId).find('.cart-amount-input').val()) - 1; // value is not accurate
    }

    // console.log(parseInt(itemNewAmount) + 1);

    $.ajax({
        method: 'post',
        url: $(this).attr('href'),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            rowId: $(itemRow).data('item-id'),
            qty: itemNewAmount,
            // _token : itemRow.find($('input[name="_token"]')).val()
        },
        dataType: 'json',
        success: function (data) {
            // Success function
            if (data.status == 'success') {
                $(itemRow).find('.cart-item-total').text(data.rowTotal + ' ر.س ');
                $('#cartTotal').text(data.subTotal + ' ر.س');
                
                $('.totalPrice').text(data.totalPrice + ' ر.س');
            }
        }
    });
    return false;
});

$('.updatePrice').on('click' ,function () {
    if ($(this).data('type') == 'increase') {
        var qty = parseInt($('#ItemQty').val()) + 1;
    }else{
        var qty = parseInt($('#ItemQty').val()) - 1;
    }
   var price = $("input[name='kind']:checked").data('value');

   var total = qty * price;

    if(total != 0){
       $('#ItemPrice').val(price);
       $('.totalPrice').text(total);     
    }
   
});

$("input[name='kind']").on('change' ,function () {
    var qty = parseInt($('#ItemQty').val());

    var price = $("input[name='kind']:checked").data('value');

    var total = qty * price;
    
    if(total != 0){
       $('#ItemPrice').val(price);
       $('.totalPrice').text(total);     
    }
});