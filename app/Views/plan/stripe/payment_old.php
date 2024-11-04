<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
   

</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
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

                        <form id='checkout-form' method='post' action="<?php echo base_url('/stripe/create-charge'); ?>">
                            <input type='hidden' name='stripeToken' id='stripe-token-id'>

                            <input type='hidden' name='userid' value='<?php echo $userid  ?>'>
                            <input type='hidden' name='plan' value='<?php echo $plan?>'>
                            <input type='hidden' name='planid' value='<?php echo $planid?>'>

                            <input type='hidden' name='interval' value='<?php  echo  $interval?>'>
							<input type='hidden' name='amount' value='0'>


                            <h5 class="mb-4">Please Enter Card Detail</h5>
                            <div id="card-element" class="form-control"></div>
                            <button
    id='pay-btn'
    class="btn btn-success mt-3"
    type="button"
    style="width: 100%;"
    onclick="createToken()">
    PAY <?php echo  $price['pm_currency']; ?> 1
</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

       <script src="https://js.stripe.com/v3/" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        var stripe = Stripe("<?php echo getenv('stripe.key') ?>");
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        function createToken() {
            document.getElementById("pay-btn").disabled = true;
            stripe.createToken(cardElement).then(function(result) {
                if(typeof result.error != 'undefined') {
                    document.getElementById("pay-btn").disabled = false;
                                        toastr.error(result.error.message, 'Payment Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                }

                if(typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    document.getElementById('checkout-form').submit();
                }
            });
        }
    </script>
</body>
</html>
