/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {

    initcheckboxes();






    $(document).on('click', '.permcheckbox', function (e) {
        console.log(this.id + "-----" + this.checked);
//id: this.id, checked: this.checked 
        $.ajax({
            url: "/user-right/ajx-change-restrictions",
            type: 'post',
            // dataType: 'json',
            //showNoty: false,
            data: {
                id: this.id,
                checked: this.checked
            },
            beforeSend: function () {
//                    $("#myklantdatagridloader").show();
//                    $('#myklantdatagrid').hide();
            }
            ,
            success: function (result) {
//                     console.log(result);
//                    $("#myklantdatagridloader").hide();
//                    $('#myklantdatagrid').show();
//                    $('#myklantdatagrid').html(result);
            },
            error: function (jqxhr, textStatus, errorThrown) {
//                    $("#myklantdatagridloader").hide();
//                    console.log(errorThrown);
            }
        });

    });



    function initcheckboxes() {

        $.ajax({
            url: "/user-right/ajx-get-restrictions",
            type: 'get',
            // dataType: 'json',
            //showNoty: false,
            data: {
                //fotoid: $(input#klant-klantnaam').val(),
//                    KlantSearch:
//                            {
//                                'klantid': $('input#klantsearch-klantid').val(),
//                                'klantnaam': $('input#klantsearch-klantnaam').val(),
//                                'straat': $('input#klantsearch-straat').val(),
//                                'nr': $('input#klantsearch-nr').val(),
//                                'gemeenid': $('input#klantsearch-gemeenid').val(),
//                                'email': $('input#klantsearch-email').val(),
//                                'tel': $('input#klantsearch-tel').val(),
//
//                            },
            },
            beforeSend: function () {
//                    $("#myklantdatagridloader").show();
//                    $('#myklantdatagrid').hide();
            }
            ,
            success: function (result) {

                $.each(result, function (index, value) {
                    //$("#" + value)
                    $("input[name='" + value + "']").prop("checked", true);

                });
//                     console.log(result);
//                    $("#myklantdatagridloader").hide();
//                    $('#myklantdatagrid').show();
//                    $('#myklantdatagrid').html(result);
            },
            error: function (jqxhr, textStatus, errorThrown) {
//                    $("#myklantdatagridloader").hide();
//                    console.log(errorThrown);
            }
        });

    }

});
