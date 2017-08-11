$(document).ready(function () {

    $("#btnCampaingChk").click(function () {

        if ($('#inputCampCode').val() == '') {

            //alert("Please enter Camapign Code.");
            $('#myModal').modal('show')

        } else {

            //$('.modal-loading').show();
            var id_search = $("#inputCampCode").val();
            $.ajax({
                url: "./_model/func-booking.php",
                type: "POST",
                data: { key_search: id_search },
                //dataType: "json",
                cache: false,
                beforeSend: function () {

                },
                success: function (data) {

                    //alert(data);
                    if (trimStr(data) == '') {
                        alert('No Data');
                    } else {
                        $('.s-control').show();
                        var result = data.split("|");
                        var name = trimStr(result[0]);
                        var objective = result[1];
                        var product = 'BA';
                        var product = trimStr(result[2].toUpperCase());
                        var startDate = result[3];
                        var endDate = result[4];
                        var campType = result[5];
                        $('#inputCampName').val(name);
                        $('#inputslProduct').val(product);
                        $('#inputObjective').val(objective);
                        $('#datepickerFrom').val(startDate);
                        $('#datepickerFrom').datepicker('update', startDate);
                        $('#datepickerTo').val(endDate);
                        $('#datepickerTo').datepicker('update', endDate);

                    }

                    //$('.modal-loading').hide();
                    console.log('Search Finished\n' + data);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    // Fail message
                    console.log('error: ' + thrownError + ' ' + ajaxOptions);
                    $('#success_sm').html("<div class='alert alert-danger'>");
                    $('#success_sm > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success_sm > .alert-danger').append("<strong>ขออภัย เกิดข้อผิดพลาดในขณะนี้. กรุณาลองใหม่อีกครั้ง!<br>" + xhr.status + "<br>" + thrownError);
                    $('#success_sm > .alert-danger').append('</div>');
                    //clear all fields
                    $('#smSearchForm').trigger("reset");

                }
            });
            // result display // 
        }
    });

});