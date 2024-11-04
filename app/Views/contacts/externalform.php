<!DOCTYPE html>
<html lang="en">
<head>
  <title>External Contacts</title>
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
    margin-bottom: 15px;" href='<?php echo base_url('/addexternalcontact')."?id=".$_REQUEST['id']; ?>' 
    class="btn btn-danger">Make Another Submission</a>                               
    </center>

<?php  
exit();
} ?>
<?php if(isset($_REQUEST['wrongnumber'])){ ?>

<center>
<h2>Phone Number Already Exists</h2>
<!-- <h3>Your Submission Has Been Received !</h3> -->
<h4>Try Another Number</h4>
<a style="padding: 12px;
margin-bottom: 15px;" href='<?php echo base_url('/addexternalcontact')."?id=".$_REQUEST['id']; ?>' 
class="btn btn-danger">Make Another Submission</a>                               
</center>

<?php  
exit();
} ?>
  <h2 style="text-align: center;margin-top: 0px;    margin-bottom: 26px;">External Contacts</h2>
  <form class="form-horizontal" action="<?php echo base_url(); ?>saveexternalcontact" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Email</label>
      <div class="col-sm-10">          
        <input type="email" class="form-control" id="email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Phone:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="phone" name="phone">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Address:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="address" name="address">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Choose Gender: </label>
      
      <div class="col-sm-10">          
      <select name="gender" id="gender"  class="form-control ">
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
      </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Birthday:</label>
      <div class="col-sm-10">          
      <input class="form-control validate dtpickdate" name="birthday" type="Date" id="birthday">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Form Type:</label>
      <div class="col-sm-10">          
      <select class="form-control" name="form_type" id="form_type">
        <option value="Member">Member</option>
        <option value="Visitor">Visitor</option>
      </select>  
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type='hidden' name='uid' value='<?php echo $_REQUEST['id']; ?>' />
        <button type="submit" class="btn btn-lg btn-danger">Submit For External Contact</button>
      </div>
    </div>
    
  </form>
</div>

</body>
</html>
