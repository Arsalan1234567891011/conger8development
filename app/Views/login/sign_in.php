<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign-up</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
      integrity="sha384-0n03KQF5TyJlGh5s9F8KDmFvN6v6VZ+6J6xsP7s7s7ExI5u/K5mH6m1hT4eA1vGz"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/Sign-in/style.css" />
  </head>
  <body>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-9 col-md-9 align-items-center" style="padding-top: 34px;padding-bottom: 34px;">
          <div class="card mb-5 p-4" >
            <!-- Logo and Sign-Up Text -->
            <div class="mb-3">
              <img
                src="<?php echo base_url(); ?>/public/Sign-in/assets/signup-logo.svg"
                alt="Logo"
                style="width: 50px"
              />
            </div>
            <h3 class="mb-1" style="font-weight: bold">
                Welcome Back    
            </h3>
            <p class="mb-4" style="font-size: 14px">
                Welcome Back! Please enter your details
            </p>
            
             <p class="mb-4" style="font-size: 14px">
               	<?php
    				 echo "<p style='text-align: center; color: green;'>".session()->getFlashdata('success')."</p>";
                    $validation =  \Config\Services::validation();	  	  
                    if(isset($check)  && $check == "yes"){
                        echo "<span style='color:red;'>Invalid Username / Password</span>";
                    }
                ?>
            </p>

            <!-- Sign-Up Form -->
           	 <form class="form-horizontal form-simple" action="<?php echo base_url(); ?>login" method="POST">
              <!-- Email Input -->
              <div class="mb-3 input-group">
                <input
                  type="email"
                  class="form-control input-with-icon2  <?php if($validation->getError('email')): ?>is-invalid<?php endif ?>"
                  placeholder="Email" name="email" id="email"
                  <?php if ($validation->getError('email')): ?>
                                    <div class="invalid-feedback" style="font-weight: bold;">
                                        <?= $validation->getError('email') ?>
                                    </div>                                
                  <?php endif; ?>
                />
              </div>
              <!-- Password Input -->
              <div class="mb-2 input-group">
                <input
                  style="border-right: none !important"
                  type="password"
                  class="form-control input-with-icon3"
                  id="password"
                  name="password"  required
                  placeholder="Password"
                />
                <span class="input-group-text"
                  ><img
                    src="<?php echo base_url(); ?>/public/Sign-in/assets/eye.svg"
                    alt=""
                    id="togglePassword"
                    style="cursor: pointer"
                /></span>
              </div>
              <!-- Terms and Conditions -->
              <div class="rem d-flex justify-content-between mb-3">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    id="agreeTerms"
                    name= "remember_me"
                  />
                  <label
                    class="form-check-label"
                    for="agreeTerms"
                    style="font-size: 13px; font-weight: 400"
                  >
                  Remember me
                  </label>
                </div>
                <div class="p">
                   <a href="<?php echo base_url('recover-password'); ?>" style="text-decoration: none;">
                        <p style="color: #9f9da8; font-size: 13px;">Having Trouble Logging in?</p>
                    </a>
                </div>
              </div>
              <!-- Sign Up and Sign In Buttons -->
              <div class="d-flex gap-3 mb-3">
                <button
                  style="
                    width: 120px;
                    height: 44px;
                    border-radius: 10px;
                    background: linear-gradient(to right, #f14b4b, #ff003d);
                    font-weight: 700;"
                  name="login"
                  type="submit"
                  class="btn btn-danger"
                >
                  SIGN IN
                </button>
                <button
                  style="
                    width: 120px;
                    height: 44px;
                    border-radius: 10px;
                    background: #f7f8f8;
                    color: #9f9da8;
                  "
                  type="button"
                  class="btn btn-light"
                ><a style="color: #9f9da8;text-decoration: none;" href="<?php echo base_url()?>signup">
                  SIGN UP
                </a>
                </button>
              </div>

              <!-- Separator Line -->
              <div class="row mb-3">
                <div
                  class="col-md-4 d-flex justify-content-start align-items-center"
                >
                  <img src="<?php echo base_url(); ?>/public/Sign-in/assets/line left.svg" alt="line left" />
                </div>
                <div
                  class="col-md-4 d-flex justify-content-center align-items-center"
                >
                  <span style="font-size: 20px; color: #9f9da8">OR</span>
                </div>
                <div
                  class="col-md-4 d-flex justify-content-end align-items-center"
                >
                  <img src="<?php echo base_url(); ?>/public/Sign-in/assets/line right.svg" alt="line right" />
                </div>
              </div>

              <!-- Continue with Google and Apple Buttons -->
              <div class="d-grid gap-2 mb-3">
                <button type="button" class="btn custom-btn">
                  <img src="assets/goog_icon.svg" alt="" class="icon" />
                  <span>Continue with Google</span>
                </button>
                <button type="button" class="btn custom-btn">
                  <img src="assets/apple_ico.svg" alt="" class="icon" />
                  <span>Continue with Apple</span>
                </button>
              </div>
              <div class="text-center" style="font-size: 10px;">
                <p>By Signing Up, You Are Agreeing To The Terms of Service</p>
                <p style="margin-top: -8px;"> Acknowledge You've Read Our Privacy Policy</p>
              </div>
            </form>
          </div>
        </div>

        <!-- Image Section -->
        <div class="col-lg-6 col-md-9 d-flex justify-content-end">
          <img
            src="<?php echo base_url(); ?>/public/Sign-in/assets/signin-logo.svg"
            width="480px"
            height="auto"
            alt="Sign in image"
          />
        </div>
      </div>
    </div>

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
    <!-- JavaScript for Password Toggle -->
    <script>
      document
        .getElementById("togglePassword")
        .addEventListener("click", function () {
          const passwordField = document.getElementById("password");
          const eyeIcon = this;
          const type =
            passwordField.getAttribute("type") === "password"
              ? "text"
              : "password";
          passwordField.setAttribute("type", type);
          eyeIcon.src =
            type === "password"
              ? "<?php echo base_url(); ?>/public/Sign-in/assets/eye.svg"
              : "<?php echo base_url(); ?>/public/Sign-in/assets/eye-slash-svgrepo-com.svg";
        });

      document
        .getElementById("toggleConfirmPassword")
        .addEventListener("click", function () {
          const passwordField = document.getElementById("confirmPassword");
          const eyeIcon = this;
          const type =
            passwordField.getAttribute("type") === "password"
              ? "text"
              : "password";
          passwordField.setAttribute("type", type);
          eyeIcon.src =
            type === "password"
              ? "<?php echo base_url(); ?>/public/Sign-in/assets/eye.svg"
              : "<?php echo base_url(); ?>/public/Sign-in/assets/eye-slash-svgrepo-com.svg";
        });
    </script>

    <!-- Bootstrap Bundle JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

