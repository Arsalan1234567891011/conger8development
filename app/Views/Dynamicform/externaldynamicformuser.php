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

<div class="container" id="content" style="border: 1px solid lightgray; width: 500px;">
    
    <p style="text-align: center;">
        <img style="width: 200px;" src="<?= base_url('public/app-assets/images/logo/Branding/Congre8_logos-05.png'); ?>" alt="branding logo">
    </p>

    <?php if(isset($_REQUEST['thankyou'])): ?>

    <center>
        <h2>THANK YOU</h2>
        <h3>Your Submission Has Been Received!</h3>
        <h4>Someone will reach out to you shortly</h4>
        <a style="padding: 12px; margin-bottom: 15px;" href="<?= base_url('/adddecisioncard') . "?id=" . $_REQUEST['id']; ?>" class="btn btn-danger">Make Another Submission</a>
    </center>

    <?php  
    exit();
    endif;
    ?>

    <h2 style="text-align: center; margin-top: 0; margin-bottom: 26px;">
        <h3><?= $form['Title']; ?></h3>
    </h2>

    <form class="nopadd h-100" action="<?= base_url('add-decisioncard'); ?>" method="POST">
        <?= $form['code']; ?>

    
    </form>

           <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type='hidden' id='uid' value='<?php echo  $form['form_id'];?>' />
        <button type="submit" id="btn1" class="btn btn-lg btn-danger" style="margin-left: 280px; margin-bottom:10px;">Submit</button>
      </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $(".remove").hide();

        $("#btn1").click(function() {
            var id = $('#uid').val();
            var title = [];
            var value = [];

            $('.getvalue').each(function() {
                var type = $(this).attr('type');
                if (type == 'radio') {
                    if ($(this).is(':checked')) {
                        title.push($(this).closest('label').text());
                    }
                } else {
                    title.push(this.value);
                }
            });

            $('.getlabel_value').each(function() {
                value.push($(this).text());
            });

            $.ajax({
                url: "<?php echo base_url(); ?>viewsavedynamicform",
                dataType: 'json',
                type: 'POST',
                data: {
                    _token: '{!! csrf_token() !!}',
                    value: title,
                    title: value,
                    id: id
                },
                success: function(data) {
                    
                        // Clear the existing content
                        $('#content').empty();
                        
                        // Append the HTML from the response
                        $('#content').append(data.html);
                   
                }
            });
        });
    });
</script>



</body>
</html>

