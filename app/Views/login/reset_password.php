<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/Password-reset/styles.css" />
  </head>
  <style>
    body {
      background-color: #f7f7f7;
    }

    .reset-password-card {
      width: 461px;
      height: auto;
      flex-shrink: 0;
      border-radius: 8px;
      background: #fff;
      box-shadow: 0px 10px 25px 0px rgba(193, 193, 193, 0.25);
    }

    .reset-password-card .card-header img {
      object-position: top;
      height: 180px;
      object-fit: cover;
    }
    .input-with-icon2 {
      background: url("assets/email.svg") no-repeat scroll 10.5px 10.5px;
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
      justify-content: center;
      gap: 20px;
      margin-top: 20px;
    }

    .request-link {
      border-radius: 7px;
      background: #ff003d;
      width: 132px;
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

    .back-to-login {
      border-radius: 7px;
      border: none;
      background: #ececec;
      width: 139px;
      height: 39px;
      flex-shrink: 0;
      color: #9f9da8;
      font-size: 14px;
      font-style: normal;
      font-weight: 500;
      line-height: normal;
      text-transform: uppercase;
    }
  </style>
  <body>
    <div
      class="container d-flex justify-content-center align-items-center min-vh-100"
    >
      <div class="card reset-password-card">
        <div class="card-header p-0">
          <img src="<?php echo base_url(); ?>/public/Password-reset/assets/bg-image.svg" alt="Reset Password Image" class="w-100" />
        </div>
        <div class="card-body p-0 text-center">
        <div style="border-top-left-radius: 10px;background-color: white; padding: 25px 20px 35px;margin-top: -30px;border-top-right-radius: 10px;">
          <h3 class="card-title">Reset your password</h3>
          <p
            style="
              color: #73737c;
              text-align: center;
              font-size: 13px;
              font-style: normal;
              font-weight: 500;
              line-height: normal;
            "
            class="card-text"
          >
            Enter the email address you used to register with and we will send
            an email with instructions to reset your password
          </p>
          <p class="text-danger"><?php echo  $extra ?? "" ?><p>
          <form class="form-horizontal" action="<?php echo base_url('/reset'); ?>" method="POST">
              <input type="hidden" name="verify_link" id="verify_link" value="">
              <!-- Email Input -->
              <div class="mb-3 input-group">
                <input
                  type="email"
                  name="email"
                  class="form-control input-with-icon2"
                  placeholder="E-Mail"
                />
              </div>
              <div class="button-container">
                <button type="submit" class="request-link">Request Link</button>
                  <button type="button" class="back-to-login" onclick="window.location.href='<?php echo base_url('/login'); ?>';">Back to Login</button>
              </div>
          </form>
        </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
