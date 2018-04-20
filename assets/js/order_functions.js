var base = "http://localhost/cashir/";
$(document).ready(function () {
    $("#toggler").click(function () {
        //if ($("#pill_cont").hasClass("hidden")) {
        //  $("#pill_cont").removeClass("hidden").fadeIn( "slow" );
        $("#pill_cont").toggle("slow");
        //} else {
        //  $("#pill_cont").addClass("hidden").fadeOut( "slow" );

        // }

    });
    var list_items = [];
    var ids = [];
    var index = 0;
    //var meals=[];
    //var numbers=[];
    // var cats=[];
    // var costs=[];


    var number = 0;
    var total_price = 0;
    var total = parseInt($('#total').html(), 10);
    var table = $('#table_num').html();
    var order = $('#pill_num').val();
   
   // alert(total);
    $(".add").click(function () {
        var id = $(this).children(".number").data('id');

        var price = $(this).children(".price").html();

        if (list_items[id] === undefined || list_items[id] === null || list_items[id]['delete'] === 1 && id != null) {
            var type = $(this).children(".price").data("type");
            var meal_name = $(this).children(".meal-name").html();
            ids[index++] = id;
            number = 1;
            total_price = price;
            total += parseInt(price, 10);
            $('#currently').empty();
            $(".pill").before('<tr class="order_data" id="m' + id + '" data-id="' + id + '"><td>' + type + '</td><td>' + meal_name + '</td><td class="meal_num">' + number + '</td><td >' + price + '</td><td class="meal_price">' + total_price + '</td><td class="no_print"><a class="delete" ><i class="fa fa-close"></i></a></td></tr>');
            list_items[id] = {'id': id, 'type': type, 'number': parseInt(number, 10), 'total_price': parseInt(total_price, 10), 'delete': 0};
            $(this).children(".number").html(1);

        } else {
            number = parseInt($("#m" + id).children(".meal_num").html(), 10) + 1;
            total_price = parseInt($("#m" + id).children(".meal_price").html(), 10) + parseInt(price, 10);
            total += parseInt(price, 10);
            list_items[id]['number'] = number;
            list_items[id]['total_price'] = total_price;
            $("#m" + id).children(".meal_num").html(number);
            $("#m" + id).children(".meal_price").html(total_price);
            $(this).children(".number").html(number);
        }

        $('#total').html(total);
        $('#total_pill_v').val(total);
        // alert(total);
    });

    $("body").on('click', '#done_order', function (event) {
        event.preventDefault();

        var total_pill_v = parseInt($('#total').html(), 10);
        alert(total_pill_v);
        $.ajax({
            method: "POST",
            url: base + "Order/add",
            dataType: 'json',
            data: {list_items: list_items, ids: ids, table: table, order: order, total: total_pill_v},
            success: function (data) {

                if (data.status) {
                    // element.children(':nth-child(6)').html(':nth-child(6)').html(data.place_status);
                    bootbox.alert(data.msg);
                    window.location = '/cashir/User';


                } else {
                    bootbox.alert(data.msg);

                }
            },
            error: function (textStatus) {
                alert(textStatus);
            }
        });



    });



    $("body").on('click', '.delete', function () {

        var id = $(this).parents("td").parent(".order_data");

        $('#total').html(parseInt($('#total').html(), 10) - parseInt($(this).parents("td").siblings(".meal_price").html(), 10));
        $('#total_pill_v').val($('#total').html());
        console.log(id.data('id'));
        list_items[id.data('id')]['delete'] = 1;
        id.remove();
        $('#add' + id.data('id')).children('.number').html("");
        total = parseInt($('#total').html(), 10);


        $('.add').each(function (i, obj) {
            if (id.data('id') === $(this).children(".number").data('id')) {
             $(this).children(".number").html("");
            }
        });
        if ($('#order_table').children('tbody').children('.order_data').length == 0) {
            $("#currently").html('لا يوجد طلبات مضافة حاليا');
        }


    });



});
		