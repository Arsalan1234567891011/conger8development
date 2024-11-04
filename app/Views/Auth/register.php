<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Register Page - Robust - Responsive Bootstrap 4 Admin Dashboard Template for Web Application</title>
    <link rel="apple-touch-icon" href="<?php echo base_url();?>public/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>public/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/css/vendosignupsavers.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/css/app.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/css/pages/login-register.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
			<div class="card border-grey border-lighten-3 px-2 py-2 m-0">
				<div class="card-header border-0">
					<div class="card-title text-center">
						<img src="<?php echo base_url();?>public/app-assets/images/logo/logo-dark.png" alt="branding logo">
					</div>
					<h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Create Account</span></h6>
				</div>
				<div class="card-content">	
					<div class="card-body">
						<form class="form-horizontal form-simple" action="index.html" novalidate>
							<fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="text" class="form-control form-control-lg input-lg" id="user-name" placeholder="User Name">
								<div class="form-control-position">
								    <i class="ft-user"></i>
								</div>
							</fieldset>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="text" class="form-control form-control-lg input-lg" id="user-phone" placeholder="Phone Number">
								<div class="form-control-position">
								    <i class="ft-phone"></i>
								</div>
							</fieldset>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="email" class="form-control form-control-lg input-lg" id="user-email" placeholder="Your Email Address" required>
								<div class="form-control-position">
								    <i class="ft-mail"></i>
								</div>
							</fieldset>
                            
							<fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="password" class="form-control form-control-lg input-lg" id="user-password" placeholder="Your Password" required>
								<div class="form-control-position">
                                <i class="fa fa-key"></i> 
								</div>
							</fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
								<input type="password" class="form-control form-control-lg input-lg " id="cpassword" placeholder="Enter confirm Password" required >
								<div class="form-control-position">
								    <i class="fa fa-key"></i>     
								</div>  
							</fieldset>
						
                         
                            <a href="<?php echo base_url();?>"type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Register</a>
						</form>
					</div>
					<p class="text-center">Already have an account ? <a href="<?php echo base_url();?>login" class="card-link">Login</a></p>
				</div>
			</div>
		</div>
	</div>
</section>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url();?>public/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url();?>public/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?php echo base_url();?>public/app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo base_url();?>public/app-assets/js/core/app.js"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo base_url();?>public/app-assets/js/scripts/forms/form-login-register.js"></script>

    <script>
        $(document).ready(function(){
            var create_url = base_url+"/"+register+"/create";

remove_validate();

var btn = $("#"+register+"create");

$("#"+controller+"create").click(function () {

    btn.prop('disabled', true);

    ajax('yes','no',create_url);

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

            console.log(result);
            
            btn.prop('disabled', false);

            if (result === "success") {

                reset_form('frm'+controller);
                toastr.success('Verification email sent successfully', 'Success!');
            }else{

                toastr.error(result, 'Error!');
            }

        },'html');


    }else{
        btn.prop('disabled', false);
        toastr.error('Please fill required fields', 'Error!');
    }

}
        });
        </script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>