<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/newassets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/newassets/css/style.css'); ?>">
	<style>
	.disabled {
    pointer-events: none; /* Disable pointer events */
    color: gray;
	cursor:not-allowed
}
	
	</style>
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
                    <h3>Verify Your Email!</h3>
                    <p>We sent you a verification link via email,<br>
                        please click it to verify your email address. If you don't see it. <br>
                        please wait up to 5 mins or check your SPAM folder.
                    </p>
                    <br>
                    <a href="" class="btn btn-dark btn-block">Open email</a>
                    <br>
                    <h2 class="text-center" id="timer">05:00</h2>
                    <p class="text-center"><a style="text-decoration: underline;cursor:pointer" class="disabled text-dark" data-id="<?php echo  $id ?>" id="resendemail">Resend
                            email verification</a></p>


                </div>


            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
$(document).ready(function(){
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
  
  
var minutes = 5; // Initial minutes
var seconds = 0; // Initial seconds
updateTimerDisplay(minutes, seconds);
function updateTimerDisplay(min, sec) {
    var interval = setInterval(function() {
        if (min === 0 && sec === 0) {
            clearInterval(interval); // Stop the interval when the timer reaches 0
            $('#timer').html("00:00");
			$('#resendemail').removeClass('disabled'); // Remove the 'disabled' class

            // Add your logic for when the timer reaches 0 here
        } else {
            if (sec === 0) {
                min--; // Decrement minutes when seconds reach 0
                sec = 59; // Reset seconds to 59
            } else {
                sec--; // Decrement seconds
            }

            // Pad single digit minutes and seconds with a leading zero
            var formattedMinutes = (min < 10) ? "0" + min : min;
            var formattedSeconds = (sec < 10) ? "0" + sec : sec;
            $('#timer').html(formattedMinutes + ":" + formattedSeconds);
			$('#resendemail').addClass('disabled'); // Add the 'disabled' class
        }
    }, 1000); // 1000 milliseconds = 1 second
}

  

    var base_url = "<?php echo base_url(); ?>";
    $("#resendemail").click(function(){
     $('#resendemail').addClass('disabled');
      var id=$(this).data('id');
        $.ajax({  
            url: "<?php echo base_url('/signup/verificationEmail'); ?>",
            type: 'post',
            dataType: 'json',
            data: {id: id},
            success: function(response){
                if(response == "success") {
                    toastr.success('Email Sent Successfully', 'Success');
					updateTimerDisplay(minutes, seconds);
                } else if(response === "exist") {
                    toastr.error('Email Already Verified!', 'Error');
                } else {
                    toastr.error('Email not  Sent!', 'Error');
                }
            },
            error: function(xhr, status, error) {
               alert(xhr.responseText); // Log any error messages in the console
            }
        });
    });
});

</script>

</body>

</html>