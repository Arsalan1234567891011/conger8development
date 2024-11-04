<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/newassets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/newassets/css/church-confirmation.css">
</head>

<body>




    <div class="main-email-sec row">
        <div class="col-md-3 bg-white detail-left-sec-mb">
            <div>
                <img src="<?php echo base_url(); ?>/public/newassets/images/green-tick.png" width="30px" alt="">
            </div>
            <hr style="width: 30px;">
            <div>
                <img src="<?php echo base_url(); ?>/public/newassets/images/green-tick.png" width="30px" alt="">
            </div>
            <hr style="width: 30px;">
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
                    <img src="<?php echo base_url(); ?>/public/newassets/images/green-tick.png" width="30px" alt="">
                </div>
                <div class="col-10">
                    <p class="mt-1 margin-left">Confirmation</p>
                </div>
            </div>

            <div class="vert-line"></div>

            <div class="row">
                <div class="col-2">
                    <img src="<?php echo base_url(); ?>/public/newassets/images/green-tick.png" width="30px" alt="">
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


        <div class="col-md-9 detail-right-sec">
            <!-- <h3 class="text-white">Get Started by letting us know <br>
                more about yourself and your organization</h3> -->

            <div class="ch-details">
                <h5>Pastor's</h5>
              <form class="form" action="<?php echo base_url(); ?>save_view_church" method="POST">
                    <div class="form-group">
                        <div class="pwd-field mt-2">
                            <input style="height: 35px;" name="pastor_name"  id="pastor_name" type="text" placeholder="Pastor's Name">
                            <img style="display:none" src="<?php echo base_url(); ?>/public/newassets/images/green.png" id="eyeicon">
                        </div>
                    </div>

                 
                        <div class="form-group">
                            <div class="pwd-field mt-2">
                                <input style="height: 35px;"  name="phone"  id="phone" type="text" placeholder="Contact Number">
                                <img  style="display:none" src="<?php echo base_url(); ?>/public/newassets/images/green.png" id="eyeicon">
                            </div>
                        </div>

                      
                            <div class="form-group">
                                <div class="pwd-field mt-2">
                                    <input style="height: 35px;" name="address"  id="address"  type="text" placeholder="Church Address">
                                    <img style="display:none"  src="<?php echo base_url(); ?>/public/newassets/images/green.png" id="eyeicon">
                                </div>
                            </div>

                                <div class="form-group">
                                    <label for="">Time Zone</label>
                                    <select id="time_zone" name="time_zone"  class="form-control">
                                         <?php 
                                                $db = db_connect();  
                                                $sql = "SELECT * FROM time_zone_new";
                                                $query =$db->query($sql);                                   
                                                //  $row =$query->getResultArray(); 
                                                //  var_dump($row);
                                                //  exit;
                                                
                                                 foreach ($query->getResultArray() as $row){ ?>
                                             <option value="<?php echo $row['value']; ?>">
                                                <?php echo $row['title']; ?>
                                             </option>
                                             <?php } ?>
                                    </select>
                                </div>
    
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-dark">Next</button>
                               <a style="text-decoration:none" type="buttton " href="<?php echo base_url(); ?>viewchurch">
							  <span>
                                    <img src="<?php echo base_url(); ?>/public/newassets/images/arrow.png" style="width: 23px;" alt="">
                                    Go back
                                </span>
								</a>

                            </div>

                        </form>
            </div>
        </div>
    </div>
	
 <script src="<?php echo base_url(); ?>/public/assets/js/custom.js"></script>
</body>

</html>