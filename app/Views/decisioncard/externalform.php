<!DOCTYPE html>
<html lang="en">
<head>
  <title>Decision Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="border: 1px solid lightgray;width: 500px;">
    
<p style="text-align: center;">
<img style="width: 200px;" src="<?php echo base_url();?>public/app-assets/images/logo/Branding/Congre8_logos-05.png" alt="branding logo">
</p>

<?php if(isset($_REQUEST['thankyou'])){ ?>

    <center>
    <h2>THANK YOU</h2>
    <h3>Your Submission Has Been Received !</h3>
    <h4>Someone will reach you out shortly</h4>
    <a style="padding: 12px;
    margin-bottom: 15px;" href='<?php echo base_url('/adddecisioncard')."?id=".$_REQUEST['id']; ?>' 
    class="btn btn-danger">Make Another Submission</a>                               
    </center>

<?php  
exit();
} ?>
  <h2 style="text-align: center;margin-top: 0px;    margin-bottom: 26px;">Decision Card</h2>
  <form class="form-horizontal" action="<?php echo base_url(); ?>add-decisioncard" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2">First Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="first_name" name="first_name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Last Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="last_name" name="last_name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Phone:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="phone" name="phone">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Email:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="email" name="email">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Address:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="address" name="address">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="prayer_request" id="prayer_request"> Prayer Request</label>
           <input type="text" id="prayer" name="prayer" class="form-control " style="margin-top:20px;display:none" placeholder="Type your prayer request here....">
        </div>
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="bible_study"> Bible Study</label>
        </div>
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="baptism"> Baptism</label>
        </div>
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="pastoral"> Pastoral Visit</label>
        </div>
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type='hidden' name='uid' value='<?php echo $_REQUEST['id']; ?>' />
        <button type="submit" class="btn btn-lg btn-danger">Submit Decision Card</button>
      </div>
    </div>
  </form>
</div>
<script>
$(document).ready(function(){
 $('#prayer_request').change(function(){
        if($(this).is(':checked')) {
           $('#prayer').show();
        } else {
            $('#prayer').hide();
            $('#prayer').val('');
        }
    });
});
</script>
</body>
</html>
