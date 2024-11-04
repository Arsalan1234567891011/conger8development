<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title><?php echo $title; ?></title>
    <link rel="apple-touch-icon" href="<?php echo base_url();?>public/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>public/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/css/vendors.css">
    <!-- END VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/css/plugins/extensions/toastr.css">
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
						<img width="220" height="73" src="<?php echo base_url(); ?>public/app-assets/images/logo/Branding/Congre8_logos-05.png" alt="branding logo">
					</div>
					<h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Add Contact</span></h6>
				</div>
                <div class="card-header border-0" style="padding: 0px !important;">
                    <div class="card-title text-center">
                        <input type="radio" name="color" value="Member">
                        Member
                        <input type="radio" name="color" value="Visitor">
                        Visitor
                    </div>
                </div>
				<div class="card-content">	
					<div class="card-body">
						<div class="form-horizontal form-simple" id="frm<?php echo $controller; ?>">
							<fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="text" class="form-control form-control-lg input-lg validate" id="name" name="name" placeholder="Full Name">
								<div class="form-control-position">
								    <i class="ft-user"></i>
								</div>
							</fieldset>
							<fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="email" class="form-control form-control-lg input-lg validate" id="email" name="email" placeholder="Your Email Address">
								<div class="form-control-position">
								    <i class="ft-mail"></i>
								</div>
							</fieldset>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="phone" class="form-control form-control-lg input-lg validate" id="phone" name="phone" placeholder="Phone">
								<div class="form-control-position">
								    <i class="ft-phone"></i>
								</div>
							</fieldset>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="text" class="form-control form-control-lg input-lg validate" id="address" name="address" placeholder="Address">
								<div class="form-control-position">
								    <i class="fa fa-address-book"></i>
								</div>
							</fieldset>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                                      <select name="gender" id="gender"  class="form-control ">
                                                         <option value="male">Male</option>
                                                         <option value="female">Female</option>
                                                         <option value="other">Other</option>
                                                      </select>
								<div class="form-control-position">
								    <i class="fa fa-venus-mars"></i>
								</div>
							</fieldset>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="Date" class="form-control form-control-lg input-lg validate" id="birthday" name="birthday" placeholder="Bithdate">
								<div class="form-control-position">
								    <i class="fa fa-birthday-cake"></i>
								</div>
							</fieldset>
							
             
           
							<button type="button" class="btn btn-info btn-lg btn-block submitContacts" >Create Contact</button>
						</div>
					</div>
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
    <script src="<?php echo base_url();?>public/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url();?>public/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?php echo base_url();?>public/app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo base_url();?>public/app-assets/js/core/app.js"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo base_url();?>public/app-assets/js/scripts/forms/form-login-register.js"></script>
    <!-- END PAGE LEVEL JS-->

    <script src="<?php echo base_url();?>public/assets/js/general.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/signup.js?ver=<?php echo rand(11111,99999); ?>"></script>
    <script src="<?php echo base_url();?>public/assets/js/signup.js"></script>
    <script>
    $(document).on('click', '.submitContacts', function(e) {

    e.preventDefault();
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id');
    var selectedValue = $('input[name="color"]:checked').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var address = $('#address').val();
    var gender = $('#gender').val();
    var birthday = $('#birthday').val();




    // alert("here "+message);return false;

    var url = '<?php echo base_url();?>public-contact-save';

    $.ajax({

        type: "POST",

        url: url,

        data:{
            id:id,
            name:name,
            email:email,
            phone:phone,
            address:address,
            gender:gender,
            birthday:birthday,
            selectedValue:selectedValue

        },

        success: function(data) {

            // console.log(data);   
            window.location.reload();
        }

    });

    });

</script>
    <style type="text/css">
      .form-simple input[type='password'] {
        margin-bottom: 0px;
      }
    </style>
  </body>


</html>