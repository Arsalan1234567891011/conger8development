<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thank You</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
    <?php
if ($check == "Success") {
?>
    <div class="card-header border-0">
        <div class="card-title text-center">
            <img style="width: 20%; margin-top:140px" src="<?php echo base_url(); ?>public/app-assets/images/logo/Branding/Congre8_logos-05.png" alt="branding logo">
        </div>
    </div>
          
    <div class="vh-90 d-flex justify-content-center align-items-center">
    <!-- <img style="width: 30%;" src="<?php //echo base_url(); ?>public/app-assets/images/logo/Branding/Congre8_logos-08.png" alt="branding logo"> -->
       
        <div>
            <div class="mb-4 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
            </div>
            <div class="text-center">
                <h1>Thank You!</h1>
                <p>Password reset link is sent on your email address</p>
                <a href="<?php echo base_url() . '/login'; ?>" class="btn btn-primary">Back to login</a>
            </div>
        </div>
    </div>
<?php }
else if ($check == "Success reset") {
    ?>
        <div class="card-header border-0">
            <div class="card-title text-center">
                <img style="width: 20%; margin-top:140px" src="<?php echo base_url(); ?>public/app-assets/images/logo/Branding/Congre8_logos-05.png" alt="branding logo">
            </div>
        </div>
              
        <div class="vh-90 d-flex justify-content-center align-items-center">
        <!-- <img style="width: 30%;" src="<?php //echo base_url(); ?>public/app-assets/images/logo/Branding/Congre8_logos-08.png" alt="branding logo"> -->
           
            <div>
                <div class="mb-4 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                </div>
                <div class="text-center">
                    <h1>Thank You!</h1>
                    <p>Your Password has been reset

                    </p>
                    <a href="<?php echo base_url() . '/login'; ?>" class="btn btn-primary">Back to login</a>
                </div>
            </div>
        </div>
    <?php }
else if ($check == "wrong email") {
    ?>
         <div class="card-header border-0">
        <div class="card-title text-center">
            <img style="width: 20%; margin-top:140px" src="<?php echo base_url(); ?>public/app-assets/images/logo/Branding/Congre8_logos-05.png" alt="branding logo">
        </div>
    </div>
    <div class="vh-90 d-flex justify-content-center align-items-center">
        <div>
            <div class="mb-4 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="75" height="75" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zm3.53 11.53a.75.75 0 0 1-1.06 1.06L8 9.06l-2.47 2.47a.75.75 0 0 1-1.06-1.06L6.94 8 4.47 5.53a.75.75 0 0 1 1.06-1.06L8 6.94l2.47-2.47a.75.75 0 0 1 1.06 1.06L9.06 8l2.47 2.47z" />
                </svg>
            </div>
            <div class="text-center">
                <h1>Sorry!</h1>
                <p>Wrong Email</p>
                <a href="<?php echo base_url() . '/login'; ?>" class="btn btn-primary">Back To Login</a>
            </div>
        </div>
    </div>
    <?php }
else { ?>
    <div class="card-header border-0">
        <div class="card-title text-center">
            <img style="width: 20%; margin-top:140px" src="<?php echo base_url(); ?>public/app-assets/images/logo/Branding/Congre8_logos-05.png" alt="branding logo">
        </div>
    </div>
    <div class="vh-90 d-flex justify-content-center align-items-center">
        <div>
            <div class="mb-4 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="75" height="75" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zm3.53 11.53a.75.75 0 0 1-1.06 1.06L8 9.06l-2.47 2.47a.75.75 0 0 1-1.06-1.06L6.94 8 4.47 5.53a.75.75 0 0 1 1.06-1.06L8 6.94l2.47-2.47a.75.75 0 0 1 1.06 1.06L9.06 8l2.47 2.47z" />
                </svg>
            </div>
            <div class="text-center">
                <h1>Sorry!</h1>
                <p>Link is Invalid Or expired!</p>
                <a href="<?php echo base_url() . '/login'; ?>" class="btn btn-primary">Back To Login</a>
            </div>
        </div>
    </div>
<?php } ?>

    </body>

</html>