<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/newassets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/newassets/css/signin.css">
</head>

<body>

    <div class="main-email-sec row">
        <div class="col-md-5 text-white text-sec-desk-pr p-5">

            <!-- --------for desktop-------- -->
            <div class="email-bg-text-sec ">
                <!-- <h2>A Church App That<br>Wins Souls</h2>
                <p>It’s an interest, membership, and evangelistic<br>
                    management tool all in one app!</p> -->
            </div>
        </div>

        <div class="col-md-5 text-white text-sec-mb-pr">

            <!-- --------for mobile-------- -->
            <div class="email-bg-text-sec-mb pt-4 text-center">
                <!-- <h2>A Church App That Wins Souls</h2>
                <p>It’s an interest, membership, and evangelistic
                    management tool all in one app!</p> -->
            </div>

        </div>
        <div class="col-md-7">
            <div class="sign-up-sec p-4">
                <div class="p-4">
                    <h3 class="mb-4">Log in</h3>
                     
                    <div class="">
					
                        <div>
								  <?php
							 echo "<p style='text-align: center; color: green;'>".session()->getFlashdata('success')."</p>";
                            $validation =  \Config\Services::validation();	  	  
                            if(isset($check)  && $check == "yes"){
                                echo "<span style='color:red;'>Invalid Username / Password</span>";
                            }
                            ?>
						 <form class="form-horizontal form-simple" action="<?php echo base_url(); ?>login" method="POST">
                            <div class="form-group">

                                <input name="email" type="email"  class="form-control <?php if($validation->getError('email')): ?>is-invalid<?php endif ?>" placeholder="Email Here" id="email" required >
								   <?php if ($validation->getError('email')): ?>
                                    <div class="invalid-feedback" style="font-weight: bold;">
                                        <?= $validation->getError('email') ?>
                                    </div>                                
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <div class="pwd-field mt-2">
                                    <input style="height: 35px;" type="password" value="<?php if(isset($user['password'])){echo $user['password'];} else {echo '';} ?>" placeholder="Enter Password" name="password" id="password" required>
                                     <img class="closeeye" style="display:none" src="<?php echo base_url(); ?>/public/newassets/images/eye-close.png" >
							        <img class="openeye" src="<?php echo base_url(); ?>/public/newassets/images/eye-open.png" >
                                </div>
								  <?php if ($validation->getError('password')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password') ?>
                                    </div>                                
                                <?php endif; ?>
        
                          
                            </div>

                            <div class="d-flex">
                                <div class=" "><button name="login" class="btn btn-dark">Login</button></div>
                                <div class="form-check ml-auto pt-2">
                                    <input class="form-check-input" type="checkbox" value="" id="form2Example31"
                                        checked />
                                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                                </div>

                            </div>
							</form>

                            <div style="text-align: center;" class="mt-3">
                                <a href="<?php echo base_url()?>recover-password" class="text-dark" style="font-size:13px ;text-decoration: none;"><u>Forgot
                                        Username or Password</u></a>
                            </div>


                            <div class="d-flex mt-3 mb-3  justify-content-center my-4">
                                <div class="border-top flex-grow-1 mt-3 mx-2"></div>
                                <p class="text-center fw-bold mb-0">Or</p>
                                <div class="border-top flex-grow-1 mt-3 mx-2"></div>
                            </div>


                            <div style="text-align: center;">
                                <span>Don't have an account? <a href="<?php echo base_url()?>signup" class="text-dark"
                                        style="text-decoration: none;"><u><b>Signup</b></u></a></span>
                            </div>

                            <div class="row mt-3 justify-content-center text-nowrap">
                                <div class="rounded mr-3 mb-2 p-2"
                                    style="border: black solid 2px; display: flex; align-items: center;">
                                    <!-- <i style="font-size: 25px; margin-top: 3px;" class="fab fa-google mr-1"></i> -->
                                    <img src="<?php echo base_url(); ?>/public/newassets/images/google-icon.png" style="width: 22px; margin-top: 3px;" class="mr-1" >
                                    <span style="font-size: 12px;">Login with Google</span>
                                </div>

                                <div class="rounded mr-3 mb-2 p-2"
                                    style="border: black solid 2px; display: flex; align-items: center;">
                                    <i style="font-size: 25px; margin-top: 3px;" class="fab fa-apple mr-1"></i>
                                    <span style="font-size: 12px;">Login with Google</span>
                                </div>
                            </div>

                            <div style="text-align: center" class="mt-3">
                                <span class="" style="color:gray;font-size: 13px; display: block;">By signing
                                    up, you are agreeing to the <a href="#">Terms of Service</a></span>
                                <span class="" style="color:gray;font-size: 13px; display: block;">and
                                    acknowledge you've read our <a href="#">Privacy Policy</a></span>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>




    <script>
        let eyeicon = document.getElementById("eyeicon");
        let password = document.getElementById("password");

        eyeicon.onclick = function () {
			
            if (password.type == "password") {
                password.type == "text";
            } else {
                password.type == "password";
            }
        }
    </script>
	
	
	
	
	 <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url(); ?>/public/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url(); ?>/public/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?php echo base_url(); ?>/public/app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo base_url(); ?>/public/app-assets/js/core/app.js"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo base_url(); ?>/public/app-assets/js/scripts/forms/form-login-register.js"></script>
    <!-- END PAGE LEVEL JS-->
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