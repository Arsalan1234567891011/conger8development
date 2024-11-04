<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Check Mail</title>
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/Check-Email/styles.css" />
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
      object-position: top;
      height: 180px;
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
      <div class="card change-password-card">
        <div class="card-header p-0">
          <img
            src="<?php echo base_url(); ?>/public/Check-Email/assets/bg-image.svg"
            alt="Reset Password Image"
            class="w-100"
          />
        </div>
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
            <h3 style="font-weight: bold" class="card-title">
              Check your mail
            </h3>
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
              We’ve sent you an email that contains a link to reset you
              password. Did not receive the email? Check your spam filter or try
              another email address
            </p>
            <div class="button-container mt-4">
              <button type="button"  class="request-link"  onclick="window.location.href='<?php echo base_url('/login'); ?>';">Back to Login</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
