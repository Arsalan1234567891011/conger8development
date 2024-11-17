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
      <img src="<?php echo base_url(); ?>/public/newassets/images/green-tick.png" width="30px" alt="">
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
        <img src="<?php echo base_url(); ?>/public/newassets/images/green-tick.png" width="30px" alt="">
      </div>
      <div class="col-10">
        <p class="mt-1 margin-left">Payment Method</p>
      </div>
    </div>
  </div>
  <div class="col-md-9 detail-right-sec">
    <h2 class="text-white">Final Step to Get Started!</h2>
    <div class="Payment-sec">
      <div class="row">
        <div class="col-md-6">
          <h3>Final step, make the payment.</h3>
         <p>
		 No funds will be taken out of your account until 14 days later if you do not cancel before then. Enter your card details to confirm your trial
          </p>
		  
		  <!-------To finalize subscription, kindly complete your <br>
            payment using a valid  credit card.------>
	
        
		  <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success text-center mb-4">
                                    Payment Successful!
                                </div>
                            <?php endif ?>

                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger text-center mb-4">
                                    <?php echo session()->getFlashdata('error'); ?>
                                </div>
                            <?php endif ?>
							<form
							role="form"
							action="<?php echo base_url('/stripe/create-charge'); ?>"
							method="post"
							class="require-validation"
							data-cc-on-file="false"
							data-stripe-publishable-key="<?php echo getenv("stripe.key") ?>"
							id="payment-form">
							<input type='hidden' name='userid' value='<?php echo $userid  ?>'>
							<input type='hidden' name='plan' value='<?php echo $plan?>'>
							<input type='hidden' name='planid' value='<?php echo $planid?>'>
							<input type='hidden' name='interval' value='<?php echo $interval?>'>
							<input type='hidden' name='amount' value='0'>
							<div class="pwd-field mt-2">
							  <span>Card Number</span>
							  <img src="<?php echo base_url(); ?>/public/newassets/images/mastercard.png">
							  <input data-label="Card Number" id="cardNumberInput" class="card-number required" style="height: 35px;" type="text" placeholder="0000 3287 0800 3278">
							</div>
							<div class="row mt-1">
							  <div class="col-6">
								<span>Expiry Date</span>
								<input id="expiryDateInput" data-label="Expiry Date" class="form-control required" type="text" name="expirydate" placeholder="12 /26">
							  </div>
							  <div class="col-6">
								<span>CVC</span>
								<input id="cvcInput" data-label="CSV"  name="csv" class="form-control required card-cvc" type="text" placeholder="X X X">
							  </div>
							</div>
							<div class="mt-3">
							  <span>Discount Code (Optional)</span>
							  <div class="pwd-fields mt-1">
								<input style="height: 35px;" type="password" name="discount_code" placeholder=" ">
								<p>Apply</p>
							  </div>
							</div>
							<button id='pay-btn' class="btn btn-primary mt-3" type="button">
								PAY <?php echo $currency.number_format($plan_price ,0); ?>
							</button>
						</form>

        </div>
        <div class="col-md-6">
          <div class="payment-righ-sec">
            <h4 class="mb-0">You've to pay</h4>
            <span class="d-flex">
              <h2><?php echo $currency.number_format($plan_price ,2); ?></h2>
            </span>
            <div class="d-flex mt-3">
              <img src="<?php echo base_url(); ?>/public/newassets/images/tik.png" width="22px" height="23px" alt="">
              <h5 class="pl-2">Payment & Invoice</h5>
            </div>
            <p style="font-size: 12px;">We'll worry about all the transactions and payment. You can sit back and relax while you 
              make your clients happy.
            </p>
            <div class="d-flex mt-3">
              <img src="<?php echo base_url(); ?>/public/newassets/images/tik.png" width="22px" height="23px" alt="">
              <h6 class="pl-2">Safe & Secure</h6>
            </div>
            <p style="font-size: 12px;">Subscribe with confidence knowing that your payment is safe and secure on our website, utilizing industry-leading encryption and security measures to protect your sensitive information.
            </p>
            <div style="padding: 10px 10px; border-radius: 10px;" class="bg-dark text-white mt-4">
              <p style="font-size: 14px; margin-bottom: 0px;">100% Guarantee Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, eligendi.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
   $(function () {
      var currentDate = new Date();
      var currentYear = currentDate.getFullYear().toString();
      var firstTwoDigits = currentYear.substring(0, 2);

      toastr.options = {
         "closeButton": true,
         "positionClass": "toast-top-right",
         "timeOut": "5000",
         "progressBar": true
      };
      var $form = $(".require-validation");

      $('#pay-btn').on('click', function (e) {
         e.preventDefault();
         var hasEmptyField = false;

         $('#payment-form').find('input.required:visible, textarea.required:visible').each(function () {
            if ($(this).val().trim() === '') {
               var labelText = $(this).data('label');
               toastr.error(labelText + " is required");
               hasEmptyField = true;
               return false;
            }
         });

         if (hasEmptyField) return;

         if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));

            var expiryDate = document.getElementById('expiryDateInput').value;
            var expMonth = expiryDate.split('/')[0];
            var expYear = firstTwoDigits + expiryDate.split('/')[1];

            Stripe.createToken({
               number: $('.card-number').val(),
               cvc: $('.card-cvc').val(),
               exp_month: expMonth,
               exp_year: expYear
            }, stripeResponseHandler);
         }
      });

      function stripeResponseHandler(status, response) {
         if (response.error) {
            toastr.error(response.error.message);
         } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' id='stripe-token-id' value='" + token + "'/>");
            $('#pay-btn').prop('disabled', true);
            $form.get(0).submit();
         }
      }
   });
</script>
</body>
</html>
