<!DOCTYPE html>
<html>

<head>
     <title>Thank You</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/newassets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/newassets/css/style.css">
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
            <div class="email-verify-sec p-5">
                <div class="p-1">
                    <h3>Sorry! We<br>
                        Couldn't Verify you</h3>
                    <p class="text-danger">Link is Invalid or Expired!</p>
                    <br>
                    <div class="text-center">
                    <img src="<?php echo base_url(); ?>/public/newassets/images/invalid.png" alt="Successful" width="60px" >
                    </div>
                    <br>
                    <a href="<?php echo base_url(); ?>login" class="btn btn-dark btn-block">Retry</a>


                </div>


            </div>
        </div>
    </div>

</body>

</html>