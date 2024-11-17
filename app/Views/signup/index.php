<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign-up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" integrity="sha384-0n03KQF5TyJlGh5s9F8KDmFvN6v6VZ+6J6xsP7s7s7ExI5u/K5mH6m1hT4eA1vGz" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/sign-up/styles.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
  <div class="container-fluid mt-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-xl-4 col-lg-9 col-md-9">
        <div class="card mb-5 p-4">
          <!-- Logo and Sign-Up Text -->
          <div class="mb-3">
            <img src="<?php echo base_url(); ?>/public/sign-up/assets/signup-logo.svg" alt="Logo" style="width: 50px">
          </div>
          <h3 class="mb-1" style="font-weight: bold">Join Our Church Family</h3>
          <p class="mb-4" style="font-size: 14px">Sign Up for Our App | Deepen connections, stay informed, and<br />discover ways to serve.</p>
          
          <!-- Sign-Up Form -->
          <form  method="post"  id="frmsignup">
            <!-- Username Input -->
            <div class="mb-3 input-group">
              <input type="text" class="form-control input-with-icon" id="name" name="name" placeholder="Your Username" required>
            </div>
            <!-- Contact Number Input -->
            <div class="mb-3 input-group">
              <span class="input-group-text"><img src="<?php echo base_url(); ?>/public/sign-up/assets/contact-no.svg" alt=""></span>
              <input type="text" class="form-control" name="phone" id ="phone" placeholder="+1 (415) 555-0132" required>
            </div>
            <!-- Email Input -->
            <div class="mb-3 input-group">
              <input type="email" class="form-control input-with-icon2" name="email" id="email"  placeholder="Email" required>
            </div>
            <!-- Password Input -->
            <div class="mb-3 input-group">
              <input style="border-right: none !important" type="password" id="password" name="password" class="form-control input-with-icon3"  placeholder="Password" required>
              <span class="input-group-text"><img src="<?php echo base_url(); ?>/public/sign-up/assets/eye.svg" alt="" id="togglePassword" style="cursor: pointer"></span>
            </div>
            <!-- Confirm Password Input -->
            <div class="mb-3 input-group">
              <input style="border-right: none !important" type="password"  name="cpassword" class="form-control input-with-icon4" id="confirmPassword" placeholder="Confirm Password" required>
              <span class="input-group-text"><img src="<?php echo base_url(); ?>/public/sign-up/assets/eye.svg" alt="" id="toggleConfirmPassword" style="cursor: pointer"></span>
            </div>
            
            <!-- Password Requirements -->
            <p class="mb-3" style="font-weight: 500; display: flex; align-items: center; font-size: smaller;">
              <img src="<?php echo base_url(); ?>/public/sign-up/assets/alert.svg" alt="alert svg for warning" style="margin-right: 10px">Use 8 or more characters with a mix of letters, numbers & symbols.
            </p>
            
            <!-- Terms and Conditions -->
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" id="agreeTerms" required>
              <label class="form-check-label" for="agreeTerms" style="font-size: 13px; font-weight: 400">
                By Creating an account, I agree to our <a class="px-1" style="font-size: 13px; color: black" href="#">Terms of use</a> and <a class="px-1" style="font-size: 13px; color: black" href="#">Privacy Policy.</a>
              </label>
            </div>
            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" id="agreeMarketing" required>
              <label class="form-check-label" for="agreeMarketing" style="font-size: 13px; font-weight: 400">
                By Creating an account, I am also consenting to receive SMS and emails, including product's new feature updates, events and marketing promotions.
              </label>
            </div>
            
            <!-- Sign Up and Sign In Buttons -->
            <div class="d-flex gap-3 mb-3">
              <button style="width: 120px; height: 44px; border-radius: 10px; background: linear-gradient(to right, #f14b4b, #ff003d); font-weight: 700;" type="submit"  id="signupbtn"  class="btn btn-danger">SIGN UP</button>
              <button style="width: 120px; height: 44px; border-radius: 10px; background: #f7f8f8; color: #9f9da8;" type="button" class="btn btn-light"><a style="color: #9f9da8; text-decoration: none;" href="<?php echo base_url(); ?>login">SIGN IN </a></button>
            </div>
            
            <!-- Separator Line -->
            <div class="row mb-3">
              <div class="col-md-4 d-flex justify-content-start align-items-center">
                <img src="<?php echo base_url(); ?>/public/sign-up/assets/line left.svg" alt="line left">
              </div>
              <div class="col-md-4 d-flex justify-content-center align-items-center">
                <span style="font-size: 20px; color: #9f9da8">OR</span>
              </div>
              <div class="col-md-4 d-flex justify-content-end align-items-center">
                <img src="<?php echo base_url(); ?>/public/sign-up/assets/line right.svg" alt="line right">
              </div>
            </div>
            
            <!-- Continue with Google and Apple Buttons -->
            <div class="d-grid gap-2">
              <button type="button" class="btn custom-btn">
                <img src="assets/goog_icon.svg" alt="" class="icon"> <span>Continue with Google</span>
              </button>
              <button type="button" class="btn custom-btn">
                <img src="assets/apple_ico.svg" alt="" class="icon"> <span>Continue with Apple</span>
              </button>
            </div>
          </form>
        </div>
      </div>
      
      <!-- Image Section -->
      <div class="col-lg-6 col-md-9 d-flex justify-content-end">
        <img src="<?php echo base_url(); ?>/public/sign-up/assets/signup-img.svg" width="480px" height="auto" alt="Sign up image">
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
  <script src="<?php echo base_url(); ?>/public/contry-codes/js/intlTelInput.js"></script>
  <!-- JavaScript for Password Toggle -->
  <script>
    document.getElementById("togglePassword").addEventListener("click", function () {
      const passwordField = document.getElementById("password");
      const eyeIcon = this;
      const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
      passwordField.setAttribute("type", type);
      eyeIcon.src = type === "password" ? "<?php echo base_url(); ?>/public/sign-up/assets/eye.svg" : "<?php echo base_url(); ?>/public/sign-up/assets/eye-slash-svgrepo-com.svg";
    });

    document.getElementById("toggleConfirmPassword").addEventListener("click", function () {
      const passwordField = document.getElementById("confirmPassword");
      const eyeIcon = this;
      const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
      passwordField.setAttribute("type", type);
      eyeIcon.src = type === "password" ? "<?php echo base_url(); ?>/public/sign-up/assets/eye.svg" : "<?php echo base_url(); ?>/public/sign-up/assets/eye-slash-svgrepo-com.svg";
    });
    $(document).ready(function(){
        var base_url =  "<?php echo base_url(); ?>";
        var save_url = base_url+"/signup/save";
     
        $('#frmsignup').on('submit', function(e) {
        e.preventDefault(); 
        if($('#confirmPassword').val() != $('#password').val())
        {
            toastr.error("Confirm password does not match", 'Error!');
            return false;
        }
        $('#signupbtn').prop('disabled', true);
        let formData = $(this).serialize();
        $.ajax({
          url: save_url, 
          method: 'POST',
          data: formData,
          success: function(result) {
            var response = JSON.parse(result);
            $('#frmsignup')[0].reset();
            toastr.success('Data submitted Successfully', 'Success!');
            //window.location.href = base_url+'/signup/verifyemail/'+response.value;
			window.location.href = base_url;
          },
          error: function(xhr, status, error) {
            // Handle the error response
            $('#signupbtn').prop('disabled', false);
            alert('An error occurred!');
            console.log(xhr.responseText);
          }
        });
      });
    });
       

  </script>
  
  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
