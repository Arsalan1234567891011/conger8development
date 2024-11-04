<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Login - Congreg8</title>
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>/public/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>/public/app-assets/images/logo/Branding/Congre8_logos-03.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/app-assets/css-rtl/custom-rtl.css">

    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/app-assets/css/pages/login-register.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css">
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
            <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <!-- ///////////////////////logo///////////// -->
                        <!-- <div class="p-1"><h3>Congreg8</h3></div> -->
                        <li  class="nav-item"><div style="background-color:white;"><img class="brand-logo" alt="robust admin logo" width="220" height="80" src="<?php echo base_url(); ?>/public/app-assets/images/logo/Branding/Congre8_logos-05.png"></div>
                        </li>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Login with Congreg8</span></h6>
                </div>
                <div class="card-content">
                    
                            
                    <?php 
                    echo "<p style='text-align: center; color: green;'>".session()->getFlashdata('success')."</p>";
                    $validation =  \Config\Services::validation(); ?>
                    <div class="card-body">
                        <div class="col-md-12" style="text-align: center;">

                            <?php
                            if(isset($check)  && $check == "yes"){
                                echo "<span style='color:red;'>Invalid Username / Password</span>";
                            }
                            ?>


                        </div>   
                                
                        <form class="form-horizontal form-simple" action="<?php echo base_url(); ?>login" method="POST">
                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                
                                <input type="text" class="form-control input-lg <?php if($validation->getError('email')): ?>is-invalid<?php endif ?>" name="email" placeholder="Email"/>
                                    <?php if ($validation->getError('email')): ?>
                                    <div class="invalid-feedback" style="font-weight: bold;">
                                        <?= $validation->getError('email') ?>
                                    </div>                                
                                <?php endif; ?>
                                
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                                    </br>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <!-- <input type="password" class="form-control form-control-lg input-lg" name='password' id="user-password" placeholder="Enter Password"> -->
                                <input class="form-control form-control-lg input-lg " type="password" placeholder="Password" id="password" name="password" value="<?php if(isset($user['password'])){echo $user['password'];} else {echo '';} ?>" >

                                <div class="form-control-position" style="right: 0 !important">
                                    <i class="ft-eye" onclick="myFunction()" style="cursor:pointer;"></i>
                                </div>
                            

                                    <?php if ($validation->getError('password')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password') ?>
                                    </div>                                
                                <?php endif; ?>
                                <div class="form-control-position">
                                    <i class="fa fa-key"></i>
                                </div>
                            </fieldset>


                            <fieldset class="form-group position-relative has-icon-left">

                                <div class="form-group row">
                                    <div class="col-md-6 col-12 text-center text-md-left">
                                        <fieldset>
                                            <input type="checkbox" id="remember_me" name="remember_me" value="1" class="chk-remember">
                                            <label for="remember-me"> Remember Me</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 col-12 text-center text-md-right">
                                        <a href="<?php echo base_url(); ?>recover-password" class="card-link">Forgot Password?</a> 
                                    </div>
                                </div>

                            </fieldset>
                            
                            <button type="submit" name="login" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                        </form>
                        
                    </div>
                    
                </div>
                <div class="card-footer">
                    <div class="">
                        <!-- <p class="float-sm-left text-center m-0"><a href="<?php //echo base_url();?>/recover-password" class="card-link">Recover password</a></p> -->
                        <p class="float-sm text-center m-0">New to Congreg8? <a href="<?php echo base_url(); ?>signup" >Sign Up</a></p>
                    </div>
                </div>
                    <div class="">
                        <p class="float-sm-left text-center m-0"></p>
                        <p class="float-sm-right text-center m-0"> </p>
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
         function myFunction() {
           var x = document.getElementById("password");
           if (x.type === "password") {
             x.type = "text";
           } else {
             x.type = "password";
           }
         }
      </script>
      <style type="text/css">
          form .form-group {
                margin-bottom: 0.5rem;
            }
      </style>
  </body>
</html>