
<div class="main-email-sec row">
  <div class="col-md-5 text-white text-sec-desk-pr p-5">
    <!-- --------for desktop-------- -->
    <div class="email-bg-text-sec ">
      <h2>A Church App That<br>Wins Souls</h2>
      <p>It’s an interest, membership, and evangelistic<br>
        management tool all in one app!
      </p>
    </div>
  </div>
  <div class="col-md-5 text-white text-sec-mb-pr">
    <!-- --------for mobile-------- -->
    <div class="email-bg-text-sec-mb pt-4 text-center">
      <h2>A Church App That Wins Souls</h2>
      <p>It’s an interest, membership, and evangelistic
        management tool all in one app!
      </p>
    </div>
  </div>
  <div class="col-md-7">
    <div class="email-verify-sec"    >
      <div class="" id="printableContent" >
        <h3 class="text-center text-success">Payment Successfull!</h3>
        <div class="text-center">
          <img src="<?php echo base_url(); ?>/public/newassets/images/green-tick.png" alt="">
        </div>
        <?php
          // Hash a string using MD5
          $config= new \Config\Encryption();
          $encrypter = \Config\Services::encrypter($config);
          $phone_decrypt = $encrypter->decrypt(base64_decode($user['phone']));
          
          
          ?>
        <div class="d-flex justify-content-between mb-1">
          <h6 class="mb-0">Plan Title</h6>
          <p class="mb-0"><?php echo $Plan_title ?></p>
        </div>
        <div class="d-flex justify-content-between mb-1">
          <h6 class="mb-0">Valid For </h6>
          <p class="mb-0"><?php echo   $interval_count." ".$intervaltype ?></p>
        </div>
        <div class="d-flex justify-content-between mb-1">
          <h6 class="mb-0">Mobile</h6>
          <p class="mb-0"><?php echo  $phone_decrypt ?></p>
        </div>
        <div class="d-flex justify-content-between mb-3">
          <h6 class="mb-0">Email</h6>
          <p class="mb-0"><?php echo  $user['email'] ?></p>
        </div>
        <div class="d-flex justify-content-between mb-3">
          <h6 class="mb-0">Amount paid </br> after 14 days trail</h6>
          <p class="mb-0">$<?php echo  $amount ?></p>
        </div>
        <div class="d-flex justify-content-between mb-1">
          <h6 class="mb-0">Transaction ID</h6>
          <p class="mb-0"><?php  echo $txrid ?></p>
        </div>
        <br>
        <div class="row">
          <div class="col-6">
            <div class="text-right">
              <button id="printBtn" class="btn btn-primary">PRINT</button>
            </div>
          </div>
          <div class="col-6">
            <div>
              <button  id="closebtn" class="btn btn-primary">Dashboard</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div style="cursor: pointer;" class="text-center mt-3">
      <a href="<?php echo base_url();?>"> <img src="<?php echo base_url(); ?>/public/newassets/images/view-dash.png" width="200px" alt=""> </a>
    </div>
  </div>
</div>
</body>
<script>
  $(document).ready(function () {
    var base_url =  "<?php echo base_url(); ?>";
	$('#closebtn').on('click', function () {
	  window.location.href = base_url;	 
    }); 
    $('#printBtn').on('click', function () {
      $('#printBtn,#closebtn').hide();
      var contentToPrint = $('#printableContent').html();
      var originalContent = $('body').html();

      $('body').html(contentToPrint);

      window.print();

      $('body').html(originalContent);
      $('#printBtn,#closebtn').show();
    });
  }); 
</script>
</html>