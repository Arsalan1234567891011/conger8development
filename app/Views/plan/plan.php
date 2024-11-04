<!DOCTYPE html>
<html>
<head>
<title><?php echo $title  ?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/public/newassets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/public/newassets/css/choose-plan.css">
</head>
<body>
<?php
$session = session();
$errorMessage = $session->getFlashdata('error');
?>
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
                <img src="<?php echo base_url(); ?>/public/newassets/images/green-tick.png" width="30px" alt="">
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
                    <img src="<?php echo base_url(); ?>/public/newassets/images/green-tick.png" width="30px" alt="">
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
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-white mb-0 text-cent-mb">Choose a Plan</h2>
                    <p style="font-size: 10px;" class="text-white text-cent-mb">Select on of our options below for peace of mind on your own time.</p>        
                </div>
                <div class="col-md-6">
                    <div class="form-box">
                        <div class="button-box">
                            <div id="btn"></div>
                            <button type="button" value="y" class="toggle-btn" onclick="leftClick()">Yearly</button>
                            <button type="button" value="m" class="toggle-btn" onclick="rightClick()">Monthly</button>
                        </div>
                    </div>
                    <div class="text-right">
                        <span>20% off on
                        <img src="<?php echo base_url(); ?>/public/newassets/images/round-arrow.png" alt="">
                    </span>
                    </div>
                
                </div>
            </div>

            <div class="row">
			  <?php
                 foreach($result as $row) {
                    if($row['type']=="Pro Plan with 14 days trail")
                    {  
				 ?>
				  
				<div class="col-md-6 mb-2">
                     <h3><?php echo $row['pm_title'];  ?></h3>
                    <div class="pro-sec">
                        <img src="<?php echo base_url(); ?>/public/newassets/images/lable.png" alt="">
                        <span class="d-flex pro-for">
                           	<h2 class="pricing-card-title mr-1" attr="<?php echo $row['pm_id'] ?>"><?php echo $row['pm_yearly']?><span><?php echo $row['pm_currency']; ?></span> <small class="text-muted"> per month user</small></h2>
                        </span>
                       
                        <hr class="mt-0 mb-1">
                        <p class="text-center">with 14 day trial</p>

                        <p class="text-center">    
     					    <?php echo $row['pm_texteditor'] ?>
						</p>
                    </div>
                   <a  class="signupButton"  href="payment/<?php echo $row['pm_id']; ?>/y"> <button style="background: rgb(250, 114, 2); width: 100%; height: 50px;" class=" text-dark  btn mt-3"><?php echo $row['type'];?></button></a>
                </div>
				 <?php
					}
				else if($row['type']=="Free Plan")
				    {
                  ?>
				  
				   <div class="col-md-6 mb-2">
                    <h3><?php echo $row['pm_title'] ; ?></h3>
                    <div class="free-sec">
                        
                        <span class="d-flex free-for">
						  <h2 class="pricing-card-title mr-1" attr="<?php echo $row['pm_id'] ?>"><?php echo $row['pm_yearly']?><span><?php echo $row['pm_currency']; ?></span> <small class="text-muted">/ mo</small></h2>
                         
                        </span>
                       
                        <hr class="mt-0">
                        <br>
                        <p class="text-center">    
     					    <?php echo $row['pm_texteditor'] ?>
						</p>

                    </div>
                    <a class="signupButton"  href="payment/<?php echo $row['pm_id']; ?>/y">  <button style="background: rgb(29, 29, 29); width: 100%; color: #fff; height: 50px;" class="btn mt-3"  href="payment/<?php echo $row['pm_id']; ?>"><?php echo $row['type'];  ?></button></a>
                </div>
               
               
				
				 <?php
					}
				else
				    {
                  ?>
				  
				   <div class="col-md-6 mb-2">
                    <h3><?php echo $row['pm_title'];  ?></h3>
                    <div class="free-sec">
                        
                        <span class="d-flex free-for">
                           <h2 class="pricing-card-title mr-1" attr="<?php echo $row['pm_id'] ?>"><?php echo $row['pm_yearly']?><span><?php echo $row['pm_currency']; ?></span> <small class="text-muted">/ mo</small></h2>
                        </span>
                       
                        <hr class="mt-0">
                        <br>
                        <p class="text-center">    
     					    <?php echo $row['pm_texteditor'] ?>
						</p>
                    </div>
                    <a class="signupButton"  href="payment/<?php echo $row['pm_id']; ?>/y">  <button style="background: rgb(29, 29, 29); width: 100%; color: #fff; height: 50px;" class="btn mt-3"  href="payment/<?php echo $row['pm_id']; ?>"><?php echo $row['type'];  ?></button></a>
			   </div>
               
                
                <?php
					}
					
					}
                  ?>
            </div>

           <div class="text-right mt-3">
            <span  style="padding-right: 20px; cursor: pointer;">
                <img src="<?php echo base_url(); ?>/public/newassets/images/arrow.png" width="20px" alt=""> Go Back
            </span>
           </div>

        </div>
    </div>
<script src="<?php echo base_url(); ?>/public/newassets/js/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
$(document).ready(function(){
	var error="<?php echo  $errorMessage  ?>"
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
if(error)
{
	toastr.error(error, 'Error');
}
  $(".toggle-btn").click(function(){
   var buttontext=$(this).val();


    $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>getpackagesbytime", //Enter full URL
         data: { id: buttontext},
         dataType: 'json',
         success: function(data) {

         $('.pricing-card-title').each(function(index) {
         if (buttontext == "m") {
                pmPrice = data[index].pm_price;
                planParam = 'm';
            } else if (buttontext == "y") {
                pmPrice = data[index].pm_yearly;
                planParam = 'y';
            } 
		  $(this).empty().html(pmPrice + '<span>' + data[index].pm_currency + '</span> <small class="text-muted">/ mo</small>');
		 var pmId = data[index].pm_id; // Assuming you have a way to get the plan ID
         $('.signupButton').eq(index).attr('href', 'payment/' + pmId + '/' + planParam);
         });
         }
         });
   
  });
});
</script>
</body>
</html>