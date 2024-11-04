<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/newassets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/newassets/css/church-detail.css">
</head>
<body>

    <div class="main-email-sec row">
        <div class="col-md-3 bg-white detail-left-sec-mb">
            <div>
                <img src="<?php echo base_url(); ?>/public/newassets/images/green-tick.png" width="30px" alt="">
            </div>
            <hr style="width: 30px;">
            <div>
                <img src="<?php echo base_url(); ?>/public/newassets/images/circle.png" width="30px" alt="">
            </div>
            <hr style="width: 30px;">
            <div>
                <img src="<?php echo base_url(); ?>/public/newassets/images/circle.png" width="30px" alt="">
            </div>
            <hr style="width: 30px;">
            <div>
                <img src="<?php echo base_url(); ?>/public/newassets/images/circle.png" width="30px" alt="">
            </div>
            <hr style="width: 30px;">
            <div>
                <img src="<?php echo base_url(); ?>/public/newassets/images/circle.png" width="30px" alt="">
            </div>
        </div>
    
        <div class="col-md-3 bg-white detail-left-sec">

            <div class="row">
                <div class="col-2">
                    <img src="<?php echo base_url(); ?>/public/newassets/images/green-tick.png" width="30px" alt="">
                </div>
                <div class="col-10">
                    <p class="mt-1 margin-left">Account Registration</p>
                </div>
            </div>

            <div class="vert-line"></div>

            <div class="row">
                <div class="col-2">
                    <img src="<?php echo base_url(); ?>/public/newassets/images/circle.png" width="30px" alt="">
                </div>
                <div class="col-10">
                    <p class="mt-1 margin-left">Confirmation</p>
                </div>
            </div>

            <div class="vert-line"></div>

            <div class="row">
                <div class="col-2">
                    <img src="<?php echo base_url(); ?>/public/newassets/images/circle.png" width="30px" alt="">
                </div>
                <div class="col-10">
                    <p class="mt-1 margin-left">Choose Goals</p>
                </div>
            </div>

            <div class="vert-line"></div>

            <div class="row">
                <div class="col-2">
                    <img src="<?php echo base_url(); ?>/public/newassets/images/circle.png" width="30px" alt="">
                </div>
                <div class="col-10">
                    <p class="mt-1 margin-left">Choose Plan</p>
                </div>
            </div>

            <div class="vert-line"></div>

            <div class="row">
                <div class="col-2">
                    <img src="<?php echo base_url(); ?>/public/newassets/images/circle.png" width="30px" alt="">
                </div>
                <div class="col-10">
                    <p class="mt-1 margin-left">Payment Method</p>
                </div>
            </div>


        </div>
         <?php 
		 $session = session();
         $session->start();
		 
		 ?>

        <div class="col-md-9 detail-right-sec">
            <h3 class="text-white detail-desc">Get Started by letting us know <br>
                more about yourself and your organization</h3>

            <div class="ch-details">
                <h5>Church Details</h5>
                      <form class="form" action="<?php echo base_url(); ?>church_detail" method="POST">                   
					  <div class="form-group">
                          <input type="hidden" name="id" id="id" value="<?php if(isset($user['id'])){echo $user['id'];} else {echo '';} ?>"> 
					   <div class="pwd-field mt-2">
                        <input value="<?php echo ($session->has('name')) ? $session->get('name') : ''; ?>" style="height: 35px;" type="text" id="church_name" name="church_name" placeholder="Church Name">
                            <img  style="display:none"  src="<?php echo base_url(); ?>/public/newassets/images/green.png" id="eyeicon">
                        </div>
                    </div>

             
                        <div class="form-group">
                            <div class="pwd-field mt-2">
                                <input value="<?php echo ($session->has('email')) ? $session->get('email') : ''; ?>"  style="height: 35px;"  name="church_email" id="church_email" type="text" placeholder="Church Email">
                                <img style="display:none" src="<?php echo base_url(); ?>/public/newassets/images/green.png" id="eyeicon">
                            </div>
                        </div>

                      
                            <div class="form-group">
                                <div class="pwd-field mt-2">
                                    <input style="height: 35px;" value="<?php echo ($session->has('website')) ? $session->get('website') : ''; ?>"  name="website" id="website" type="text" placeholder="Website">
                                    <img  style="display:none"  src="<?php echo base_url(); ?>/public/newassets/images/green.png" id="eyeicon">
                                </div>
                            </div>

                            <button class="btn btn-dark">Next</button>

                        </form>
            </div>
        </div>
    </div>

 <script src="<?php echo base_url(); ?>/public/assets/js/custom.js"></script>

</body>


</html>
