<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create New Password</title>
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/create-new-psw/styles.css" />
      <!-- END Custom CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  </head>
  <style>
    body {
      background-color: #f7f7f7;
    }

    .change-password-card {
      width: 461px;
      height: auto;
      flex-shrink: 0;
      border-radius: 15px;
      background: #fff;
      box-shadow: 0px 10px 25px 0px rgba(193, 193, 193, 0.25);
    }

    .change-password-card .card-header img {
      object-fit: cover;
      object-position: top;
      height: 180px;
    }
    .input-with-icon3 {
      background: url("assets/password.svg") no-repeat scroll 10.5px 10.5px;
      background-size: 15px 15px;
      padding-left: 35px;
    }
    .input-with-icon4 {
      background: url("assets/confirm-pass.svg") no-repeat scroll 10.5px 10.5px;
      background-size: 15px 15px;
      padding-left: 35px;
    }
    .form-control {
      background-color: #f9f9f9;
      border: 1px solid #e2e8f0;
    }
    .form-control::placeholder {
      color: #9b9da8;
      font-size: 15px;
      line-height: 40px;
    }
    .button-container {
      display: flex;
      justify-content: start;
      gap: 20px;
      margin-top: 20px;
    }

    .change-psw {
      border-radius: 7px;
      background: #ff003d;
      width: 178px;
      height: 39px;
      flex-shrink: 0;
      color: #fff;
      font-size: 14px;
      font-style: normal;
      font-weight: 500;
      line-height: normal;
      text-transform: uppercase;
      border: none !important;
    }
  </style>
  <body>
    <div
      class="container d-flex justify-content-center align-items-center min-vh-100"
    >
      <div class="card change-password-card">
        <div class="card-header p-0">
          <img
            src="<?php echo base_url(); ?>/public/create-new-psw/assets/bg-image.svg"
            alt="Reset Password Image"
            class="w-100"
          />
        </div>
        <form class="form-horizontal" action="<?php echo base_url('/savenewpassword'); ?>" method="POST">
            <input type="hidden" name="userid" id="userid" value="<?php echo $userid; ?>">
            <div class="card-body p-0 text-center">
              <div
                style="
                  border-top-left-radius: 10px;
                  background-color: rgb(255, 255, 255);
                  padding: 25px 30px 35px;
                  margin-top: -30px;
                  border-top-right-radius: 10px;
                  border-bottom-left-radius: 15px;
                  border-bottom-right-radius: 15px;
                  border: none;
                "
              >
                <h4 style="font-weight: bold" class="card-title">
                  Create new password
                </h4>
                <!-- Password Input -->
                <div class="mb-3 input-group mt-3">
                  <input
                    style="border-right: none !important"
                    type="password"
                    class="form-control input-with-icon3"
                    id="password" name="password"
                    placeholder="Password"
                  />
                  <span
                    style="
                      background: #f9f9f9;
                      border-left: none !important;
                      border: 1px solid #e2e8f0;
                    "
                    class="input-group-text"
                    ><img
                      src="<?php echo base_url(); ?>/public/create-new-psw/assets/eye.svg"
                      alt=""
                      id="togglePassword"
                      style="cursor: pointer"
                  /></span>
                </div>
                <!-- Confirm Password Input -->
                <div class="mb-3 input-group">
                  <input
                    style="border-right: none !important"
                    type="password"
                    class="form-control input-with-icon4"
                    id="confirm_password" name="confirm_password"
                    placeholder="Confirm Password"
                  />
                  <span
                    style="
                      background: #f9f9f9;
                      border-left: none !important;
                      border: 1px solid #e2e8f0;
                    "
                    class="input-group-text"
                    ><img
                      src="<?php echo base_url(); ?>/public/create-new-psw/assets/eye.svg"
                      alt=""
                      id="toggleConfirmPassword"
                      style="cursor: pointer"
                  /></span>
                </div>
    
                <!-- Password Requirements -->
                <p
                  class="mb-3"
                  style="
                    text-align: left;
                    font-weight: 500;
                    display: flex;
                    align-items: center;
                    font-size: 11px;
                  "
                >
                  <img
                    src="<?php echo base_url(); ?>/public/create-new-psw/assets/alert.svg"
                    alt="alert svg for warning"
                    style="margin-right: 10px; margin-left: 3px"
                  />Use 8 or more characters with a mix of letters, numbers &
                  symbols.
                </p>
                <div class="button-container mt-4">
                  <button type="submit" class="change-psw">CHANGE PASSWORD</button>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- END PAGE LEVEL JS-->
    <script>
        $(document).ready(function() {
            // Function to show a toast notification
            function showToast(message) {
                Toastify({
                    text: message,
                    duration: 5000, // 5 seconds
                    gravity: "top", // Display toast at the top
                    position: "right", // Display toast on the right side
                    backgroundColor: "#f44336", // Red for error
                }).showToast();
            }

            // Check if there's a session variable for password_mismatch_error
            <?php if (session()->has('password_mismatch_error')): ?>
                showToast("<?php echo session()->get('password_mismatch_error'); ?>");
            <?php endif; ?>

            // Clear the session variable after displaying the toast
            <?php session()->remove('password_mismatch_error'); ?>
        });
    </script>

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
              ? "<?php echo base_url(); ?>/public/create-new-psw/assets/eye.svg"
              : "<?php echo base_url(); ?>/public/create-new-psw/assets/eye-slash-svgrepo-com.svg";
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
              ? "<?php echo base_url(); ?>/public/create-new-psw/assets/eye.svg"
              : "<?php echo base_url(); ?>/public/create-new-psw/assets/eye-slash-svgrepo-com.svg";
        });
    </script>
  </body>
</html>
