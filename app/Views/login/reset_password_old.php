<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="rtl">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">

    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">

    <meta name="author" content="PIXINVENT">

    <title>Reset Password - Congreg8</title>

    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>public/app-assets/images/ico/apple-icon-120.png">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>public/app-assets/images/ico/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">

    <!-- BEGIN VENDOR CSS-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/app-assets/css/vendors.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/app-assets/vendors/css/forms/icheck/icheck.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/app-assets/vendors/css/forms/icheck/custom.css">

    <!-- END VENDOR CSS-->

    <!-- BEGIN ROBUST CSS-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/app-assets/css/app.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/app-assets/css-rtl/custom-rtl.css">



    <!-- END ROBUST CSS-->

    <!-- BEGIN Page Level CSS-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/app-assets/css/core/menu/menu-types/vertical-menu.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/app-assets/css/core/colors/palette-gradient.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/app-assets/css/pages/login-register.css">

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

            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">

                <div class="card-header border-0 pb-0">

                    <div class="card-title text-center">

                        <!-- <img src="<?php //echo base_url(); ?>public/app-assets/images/logo/logo-dark.png" alt="branding logo"> -->

                        <h3 class="brand-text" >Congreg8</h3></li>



                    </div>

                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Reset Password</span></h6>

                </div>

                <div class="card-content">

                    <div class="card-body">

                        <form class="form-horizontal" action="<?php echo base_url('/reset'); ?>" method="POST">

                        <input type="hidden" name="verify_link" id="verify_link" value="">

                            <fieldset class="form-group position-relative has-icon-left">

                                <input type="email" class="form-control form-control-lg input-lg" id="email" name="email" placeholder="Your email address" required>

                                <div class="form-control-position">

                                    <i class="ft-mail"></i>

                                </div>

                            </fieldset>

                            <button type="submit" class="btn btn-outline-info btn-lg btn-block" name="forgot_pass"><i class="ft-unlock"></i>Submit </button>

                        </form>

                    </div>

                </div>

                <div class="card-footer border-0">

                    <p class="float-sm-left text-center"><a href="<?php echo base_url(); ?>login" >Login</a></p>

                    <p class="float-sm-right text-center">New to Congreg8 ? <a href="<?php echo base_url(); ?>signup" >Create Account</a></p>

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

    <script src="<?php echo base_url(); ?>public/app-assets/vendors/js/vendors.min.js"></script>

    <!-- BEGIN VENDOR JS-->

    <!-- BEGIN PAGE VENDOR JS-->

    <script src="<?php echo base_url(); ?>public/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>

    <!-- END PAGE VENDOR JS-->

    <!-- BEGIN ROBUST JS-->

    <script src="<?php echo base_url(); ?>public/app-assets/js/core/app-menu.js"></script>

    <script src="<?php echo base_url(); ?>public/app-assets/js/core/app.js"></script>

    <!-- END ROBUST JS-->

    <!-- BEGIN PAGE LEVEL JS-->

    <script src="<?php echo base_url(); ?>public/app-assets/js/scripts/forms/form-login-register.js"></script>

    <!-- END PAGE LEVEL JS-->

  </body>

</html>