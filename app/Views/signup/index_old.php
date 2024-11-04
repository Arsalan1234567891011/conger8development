<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/contry-codes/css/demo.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/contry-codes/css/intlTelInput.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/newassets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/newassets/css/signup.css">
	 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>

    <div class="main-email-sec row">
        <div class="col-md-5 text-white text-sec-desk-pr p-5">

            <!-- --------for desktop-------- -->
            <div class="email-bg-text-sec ">
                <h2>A Church App That<br>Wins Souls</h2>
                <p>It’s an interest, membership, and evangelistic<br>
                    management tool all in one app!</p>
            </div>
        </div>

        <div class="col-md-5 text-white text-sec-mb-pr">

            <!-- --------for mobile-------- -->
            <div class="email-bg-text-sec-mb pt-4 text-center">
                <h2>A Church App That Wins Souls</h2>
                <p>It’s an interest, membership, and evangelistic
                    management tool all in one app!</p>
            </div>

        </div>
        <div class="col-md-7">
            <div class="sign-up-sec p-4">
                <div class="p-4 "  id="frm<?php echo $controller; ?>">
                    <h3>Sign up now</h3>
                    <h6 class="mt-2 mb-3">Welcome to our church app</h6>
                    
                   
                        <input style="height: 35px;" class="form-control mb-2" id="name" type="text" placeholder="Your Username">
                        <input style="height: 35px; width: 100%;" class="form-control" type="tel"  id="phone"
                            placeholder="+1 Phone Number">
                        <input style="height: 35px;" class="form-control mt-2" type="email" id="email" placeholder="Email">

                        <div class="pwd-field mt-2">
                            <input style="height: 35px;" type="password" id="password" placeholder="Password" id="password">
                            <img class="closeeye" style="display:none" src="<?php echo base_url(); ?>/public/newassets/images/eye-close.png" >
							 <img class="openeye" src="<?php echo base_url(); ?>/public/newassets/images/eye-open.png" >
                        </div>
                        <span style="font-size: 10px;">Use 8 or more characters with a mix of letters, numbers & symbols.</span>
                       
                        <div class="pwd-field mt-2">
                            <input style="height: 35px;" type="password" placeholder="Confirm Password" id="cpassword">
                            <img class="closeeye" style="display:none" src="<?php echo base_url(); ?>/public/newassets/images/eye-close.png" >
							 <img class="openeye" src="<?php echo base_url(); ?>/public/newassets/images/eye-open.png" >
                        </div>

                        <div class="d-flex checkbox-field mt-2">
                            <div class="col-1">
                            <input type="checkbox">
                            </div>
                            <div class="col-11">
                            <p >By Creating an account, I agree to our <a href="#">Terms of use</a> and <a href="#">Privacy Policy</a> </p>
                            </div>
                        </div>

                        <div class="d-flex checkbox-field ">
                            <div class="col-1">
                            <input type="checkbox">
                            </div>
                            <div class="col-11">
                            <p >By Creating an account, I am also consenting to receive SMS and emails,
                                including product's new feature updates, events and marketing promotions.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <button  type="submit" id="<?php echo $controller."save"; ?>"  class="btn btn-dark">Sign up</button>
                            </div>
                            <div class="col-md-9">
                                <p class="mt-2">Already have an account? <a href="<?php echo base_url(); ?>login">Login</a></p>
                            </div>
                        </div>

                </div>


            </div>
        </div>
    </div>


    
    <script src="<?php echo base_url();?>public/app-assets/vendors/js/vendors.min.js"></script>
   
    <script src="<?php echo base_url();?>public/app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo base_url();?>public/app-assets/js/core/app.js"></script>
    <script src="<?php echo base_url();?>public/app-assets/js/scripts/forms/form-login-register.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/definations.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/global.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/signup.js"></script>
    <script src="<?php echo base_url(); ?>/public/contry-codes/js/intlTelInput.js"></script>
	
	
<script>
     var input = document.querySelector("#phone");
    window.intlTelInput(input, {});    
</script>

<script>
$(document).ready(function(){
  $(".openeye").click(function(){
  
    $(this).hide(); // Hide the current element with class 'openeye'
    $(this).siblings('.closeeye').show(); // Show the sibling element with class 'closeeye'
    $(this).siblings('input').attr('type', 'text');
});
	
	
$(".closeeye").click(function(){
	$(this).hide(); // Hide the current element with class 'openeye'
    $(this).siblings('.openeye').show(); // Show the sibling element with class 'closeeye'
    $(this).siblings('input').attr('type', 'password');
	
	
	});	
});
</script>

</body>

</html>