$(document).ready(function() {

    //debugger;
    /*CLIENTS*/
    $('#submitClient').click (function(){
        if (clientName !== "" && clientEmail !== "" && voucherCode !=="") {
            debugger;
            $.ajax({
                url: "send.php",
                type: "POST",
                data: {clientName: $('#clientName').val(), clientEmail: $('#clientEmail').val(), voucherCode: $('#myPassword').val()},
                success: function (data) {
                    alert(data + ', Got data!');
                    $('.modal-after').fadeIn(1000).html("Data is added! <br/>You can use your code!");


                },
                error: function () {
                    alert('ошибка');
                }
            });
        }
    });
    /*OFFERS*/
    $('#submitOffer').click (function(){
        if (offerName!== "" && discount !== "" && expDate !== "") {
            debugger;
            $.ajax({
                data: {offerName: $('#offerName').val(), discount: $('#discount').val(), expDate: $('#expDate').val()},
                url: "send.php",
                type: "POST",
                //   dataType:'json',
                // data:$('#clientForm').serialize(),
                success: function (data) {
                    alert(data + ', Получили данные');
                    $('.modal-after').fadeIn(1000).html("Data is added! <br/>You can use your code!");

                },
                error: function () {
                    alert('ошибка');
                }
            });
        }
    });

});



