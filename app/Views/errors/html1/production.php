<!DOCTYPE html>
 <?php
    // Fetch the HTTP status code using CI4's response object
    $response = service('response');
    $statusCode = $response->getStatusCode();
    ?>
<html lang="en">

<head>
<style>
body{margin-top:20px;}
.cover-background {
    position: relative !important;
    background-size: cover !important;
    overflow: hidden !important;
    background-position: center !important;
    background-repeat: no-repeat !important;
}
.p-0 {
    padding: 0!important;
}
section {
    padding: 120px 0;
    overflow: hidden;
    background: #fff;
}

.error-page {
    background-color: #BABABA4A;
    -webkit-backdrop-filter: blur(9px);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(234,234,235,0.2);
    padding: 80px 20px;
}
.text-center {
    text-align: center!important;
}
.error-page h1 {
    font-size: 200px;
    line-height: 1;
    font-weight: 600;
}
.text-secondary {
    color: #15395A !important;
}
.mb-4 {
    margin-bottom: 1.5rem!important;
}


</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $statusCode ?> Error</title>
    <!-- Include necessary CSS files -->
    <!-- ... -->
</head>

<body>
   

    <section class="p-0 bg-img cover-background" style="background-image: url(https://bootdey.com/img/Content/bg1.jpg);">
        <div class="container-fluid d-flex flex-column">
            <div class="row align-items-center justify-content-center min-vh-100">
                <div class="col-md-9 col-lg-6 my-5">
                    <div class="text-center error-page">
                        <h1 class="mb-0 text-secondary"><?php echo $statusCode ?></h1>
                        <h2 class="mb-4 text-white">Sorry, something went wrong!</h2>
                        <p class="w-sm-80 mx-auto mb-4 text-white">This page is incidentally inaccessible because of support. We will be back very shortly. Thank you for your understanding.</p>
                        <div>
                            <!-- Example: Return Home link -->
                            <a href="<?php echo base_url('/'); ?>" class="btn btn-info btn-lg me-sm-2 mb-2 mb-sm-0">Return Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include necessary JavaScript files -->
    <!-- ... -->
</body>

</html>
