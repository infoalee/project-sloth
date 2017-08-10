function encode_pass(obj_pass) { //trim User-defined function
	var key_encode='kbanknet';
	var base64 = $.base64.encode(obj_pass.value, key_encode, true);
	var val_pass;
	val_pass = obj_pass.value + base64;
	obj_pass.value = trimStr(val_pass);
}

$('#btnClear').on('click', function () {
    $('#loginForm').trigger("reset");
    $('#username').focus();
});

$(function() {
    $("input,textarea").not("[type=submit]").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();

            var username = $("input#username").val();
            var pass = $("input#password").val();
			//alert(check_username);
            var firstName = username; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "./_model/test-func-login.php",
                type: "POST",
              data: {tUsername : username, tPassword: pass},
                cache: false,
				beforeSend:function(){

				},
                success: function(data) {
					
					// Enable button & show success message
					$("#btnSubmit").attr("disabled", false);
					//alert(trimStr(data));
					
					if(trimStr(data)=='Y'){
							/* $('#success').html("<div class='alert alert-success'>");
							$('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
								.append("</button>");
							$('#success > .alert-success')
								.append("<strong>Login Success</strong>");
							$('#success > .alert-success')
								.append('</div>');
							*/
							//$.session.set("home","landing_page.php?bp=1");

                            window.location = 'index1.php';

					}else if(trimStr(data)=='X'){
							$('#success').html("<div class='alert alert-danger'>");
							$('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
								.append("</button>");
							$('#success > .alert-danger')
								.append("<strong>ไม่สามารถ Login ได้ !!! <br /> Username : <span class='badge'>" +  username.toUpperCase()  +"</span> ไม่มีสิทธิ์เข้าใช้งานด้วย Computer เครื่องนี้ <br /> ติดต่อผู้ดูแลระบบ</strong>");
							$('#success > .alert-danger')
								.append('</div>');

							$('#username').focus
					}else{
							$('#success').html("<div class='alert alert-danger'>");
							$('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
								.append("</button>");
							$('#success > .alert-danger')
								.append("<strong>ไม่สามารถ Login ได้ !!! <br /> Username หรือ Password ไม่ถูกต้อง</strong>");
							$('#success > .alert-danger')
								.append('</div>');

							$('#username').focus
					}
							

                    //clear all fields
                    $('#loginForm').trigger("reset");
					$('#username').focus

                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>ขออภัย " + firstName + " ไม่สามาถเข้าสู่ระบบได้ในขณะนี้. กรุณาลองใหม่อีกครั้ง!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#loginForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// When clicking on Full hide fail/success boxes
$('#username').focus(function() {
    $('#success').html('');
});
