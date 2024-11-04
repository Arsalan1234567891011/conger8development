


$(document).ready(function(){

var base_url = "https://development.congreg8.org";

var save_url = base_url+"/"+controller+"/save";
   //alert(save_url);
remove_validate();



var btn = $("#"+controller+"save");



btn.click(function () {


    btn.prop('disabled', true);
    ajax('yes','no',save_url);

});



$('body').on( 'click', '.showpwd', function () {

    $(this).addClass("hidepwd");

    $(this).removeClass("showpwd");

    $('#password').attr('type', 'text');

});





$('body').on( 'click', '.hidepwd', function () {



    $(this).addClass("showpwd");

    $(this).removeClass("hidepwd");

    $('#password').attr('type', 'password');



});







 function ajax(redirect,update,url){

    if (validate('frm'+controller)) {



        var param = {



            name      : $('#name').val(),

            email     : $('#email').val(),

            password  : $('#password').val(),

            cpassword : $('#cpassword').val(),

            phone     : $('#phone').val()

        }





        $.post(url, param,function(result) {

            btn.prop('disabled', false);
			var response = JSON.parse(result);
            if (response.result === "success") {

                reset_form('frm'+controller);

                toastr.success('Verification email sent successfully', 'Success!');

                $('#signin').hide();

                $('#create_account').hide();

                $('#instruction').show();
				
				window.location.href = base_url+'/signup/verifyemail/'+response.value;

              
            
            }else{


                toastr.error(response.result, 'Error!');

             

              

            }



        },'html');


    }else{

        btn.prop('disabled', false);

        toastr.error('Please fill required fields', 'Error!');

    }



}

        });