<?php
$uri = new \CodeIgniter\HTTP\URI(current_url());
$segment = $uri->getSegment(2);
// echo $segment;exit;
if($segment == 'contacts'){
  $title = CONTACTS;
}

if($segment == 'attendance'){
  $title = ATTENDANCE;
}

if($segment == 'churches'){
  $title = CHURCHES;
}

if($segment == 'users'){
  $title = USERS;
}

if($segment == 'adduser'){
  $title = ADDUSER;
}

if($segment == 'integration'){
  $title = INTEGRATION;
}

if($segment == 'interests'){
  $title = INTERESTS;
}

if($segment == 'contacts-profile'){
  $title = CONTACTSPROFILE;
}

if($segment == 'tasks'){
  $title = TASKS;
}

if($segment == 'conversation'){
  $title = CONVERSATION;
}

if($segment == 'notes'){
  $title = NOTES;
}

if($segment == 'userattendance'){
  $title = USERATTENDANCE;
}

if($segment == 'survey'){
  $title = SURVEY;
}

if($segment == 'prayer-request'){
  $title = PRAYERREQUEST;
}

if($segment == 'biptism-request'){
  $title = BIPTISMREQUEST;
}

if($segment == 'bible_study'){
  $title = BIBLE_STUDY;
}

if($segment == 'tags'){
  $title = TAGS;
}
?>

<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">

    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">

    <meta name="author" content="PIXINVENT">

    <title><?php echo $title ?></title>

    <link rel="apple-touch-icon" href="<?php echo base_url();?>public/app-assets/images/ico/apple-icon-120.png">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>public/app-assets/images/ico/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">

    <!-- BEGIN VENDOR CSS-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/css/vendors.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/vendors/css/charts/morris.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/vendors/css/extensions/unslider.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/vendors/css/weather-icons/climacons.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Include the Bootstrap Toggle CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <!-- END VENDOR CSS-->

    <!-- BEGIN ROBUST CSS-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/css/app.css">

    <!-- END ROBUST CSS-->

    <!-- BEGIN Page Level CSS-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/css/core/menu/menu-types/vertical-menu.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/css/core/colors/palette-gradient.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/css/core/colors/palette-gradient.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/css/plugins/calendars/clndr.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/app-assets/fonts/meteocons/style.min.css">

    <!-- END Page Level CSS-->

    <!-- BEGIN Custom CSS-->

     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">

      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/app-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css">

      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">


      <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/datetimepicker/daterangepicker.css">

      <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/datetimepicker/jquery.datetimepicker.min.css">

      <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/datetimepicker/pickadate.css">

      <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />

    <!-- END ROBUST CSS-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/app-assets/vendors/css/forms/tags/tagging.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/dragSec.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <?php 

 if(!empty($styles)){

    foreach($styles as $style){

       

        echo '<link rel="stylesheet" type="text/css" href="'.base_url().''.$style.'">';

    }

  }



    ?>



    <!--Arsalan END Page Level CSS-->


 <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
"></script>
  <!-- Include Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- BEGIN Custom CSS-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/style.css">

    <!-- END Custom CSS-->


    <style type="text/css">
      

.red-button {
  background-color: red;
  color: white;
  padding: 5px 10px;
  border-radius: 5px;
  text-decoration: none; /* Remove underline from the link */
}

    .h-100,
    #modules,
   #dropzone {
        height: 100%;
    }

    .nomrgn {
        margin-left: 0px !important;
        margin-right: 0px !important;
    }

    .nopadd {
        padding: 0px !important;
    }

    #modules {
    background-color: #f5f5f5; /* Background color */
    border: 1px solid #ddd; /* Border */
    padding: 10px; /* Spacing around the buttons */
    border-radius: 5px; /* Rounded corners */
}

.drag {
    margin-bottom: 10px; /* Space between buttons */
}

.drag a.btn {
    width: 100%; /* Button width */
    text-align: center; /* Center text within the button */
    padding: 10px 0; /* Vertical padding */
    border-radius: 3px; /* Rounded corners for buttons */
    background-color: #3498db; /* Button background color */
    color: #fff; /* Button text color */
    text-decoration: none; /* Remove underline from links */
    transition: background-color 0.3s ease; /* Smooth background color transition */
}

.drag a.btn:hover {
    background-color: #2980b9; /* Hover background color */
    color: #fff; /* Hover text color */
}


    #modules {
        background: #eee;
        z-index: 1;
    }

    .drag-field {
        padding-top: 15px !important;
    }

    .drag-field a {
        width: 100%;
    }

    #dropzone {
        padding: 20px;
        background: #fff;
        z-index: 0;
    }



    .drop-item .remove {
        display: none;
    }

    .drop-item:hover .remove {
        display: inherit;
    }

    .remove {
        background: no-repeat;
        border: none;
        font-size: 11px;
        color: red;
    }

    .drop-item {
        cursor: move;
        margin-bottom: 10px;
        background-color: rgb(255, 255, 255);
        padding: 20px;
        border: 1px solid rgb(204, 204, 204);
        position: relative;
    }

    .drop-item p {
        cursor: pointer;
        margin: 0;
    }

    .drop-item .remove {
        position: absolute;
        top: 4px;
        right: 4px;
    }

      
    </style>

  </head>



  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">