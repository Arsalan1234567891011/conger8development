<?php 
 $plans = getPlan();
 $current_plan = getusercurrentplan();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $title ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/Dashboard/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- DataTables CSS CDN -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <style>
    :root {
      --input-color: #f9f9f9;
      --text-color: black;
      --input-border-color: #e2e8f0;
    }

    [data-theme="dark"] {
      --input-color: #24222C;
      --input-border-color: #3F3D48;
      --text-color: white;
    }

    .profile-header {
      background-color: var(--bg-color);
      padding-bottom: 20px;
      margin-bottom: 50px;
      position: relative;
    }

    .cover-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
    }

    .profile-pic {
      position: absolute;
      top: 145px;
      left: 15%;
      transform: translateX(-50%);
    }

    .profile-pic img {
      width: 120px;
      height: 120px;
    }

    .edit-icon {
      position: absolute;
      bottom: 10px;
      left: 88px;
    }

    .profile-name {
      margin-top: 62px;
      font-size: 18px;
      font-weight: bolder;
    }

    .profile-role {
      margin-top: -6px;
      color: var(--);
      font-size: 14px;
    }

    .profile-content {
      background-color: var(--bg-color);
      padding: 20px;
    }

    .card-img-top {
      height: 100px;
      object-fit: cover;
    }

    .card-body {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .card-title {
      font-size: 1.25rem;
      margin-bottom: 0.5rem;
      font-weight: bold;
    }

    .card-text {
      font-size: 10px;
      margin-bottom: 1rem;
    }

    .save-btn {
      border-radius: 7px;
      background: #FF003D;
      align-items: center;
      width: 150px;
      height: 35px;
      color: #fff;
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
    }

    .save-btn:hover {
      color: white;
    }

    .discard-btn {
      border-radius: 7px;
      background: var(--button-bg);
      align-items: center;
      width: 150px;
      height: 35px;
      color: var(--button-text);
      font-size: 12px;
      font-weight: 500;
      text-transform: uppercase;
    }

    .discard-btn:hover {
      color: #9f9da8;
    }

    .d-grid {
      max-width: 60%;
    }

    .usherbot-img {
      width: 270px;
      height: 200px;
      margin-right: -55px;
      margin-top: -90px;
    }

    .nav-tabs {
      margin-bottom: 10px;
      border-bottom: none;
      padding-left: 0;
    }

    .nav-tabs .nav-item {
      margin: 0;
      padding: 0;
      font-size: 13px;
    }

    .nav-tabs .nav-item .nav-link {
      color: #cbcbcb;
      margin-right: 0;
      border: none;
      padding-left: 0;
    }

    .nav-tabs .nav-item .nav-link.active {
      background: transparent;
      color: var(--text-color);
      border: none;
      font-weight: bold;
    }

    .tab-content {
      width: 100%;
      padding: 0;
    }

    .tab-pane {
      width: 100%;
    }

    .edit-cover-btn {
      position: absolute;
      bottom: 26px;
      right: 10px;
      border-radius: 4px;
      background: #fff;
      padding: 5px 15px;
      cursor: pointer;
      color: #73737c;
      font-size: 11px;
      font-weight: 700;
      text-transform: capitalize;
    }

    .form-control {
      border-radius: 7px;
      border: 1px solid var(--input-border-color);
      background: var(--input-color);
      color: var(--text-color);
    }

    .form-control:focus {
      color: var(--text-color);
      border-radius: 7px;
      border: 1px solid var(--input-border-color);
      background: var(--input-color);
    }

    .form-control::placeholder {
      color: var(--button-text);
      font-size: 13px;
      font-style: normal;
      font-weight: 500;
    }

    .input-with-icon {
      background: var(--input-color);
      background-image: url("public/profile/assets/firstname-ico.svg");
      background-repeat: no-repeat;
      background-position: 10px 50%;
      font-size: 13px;
      font-style: normal;
      font-weight: 500;
      background-size: 15px 15px;
      padding-left: 35px;
      color: var(--text-color);
    }

    .input-with-icon3 {
      background: var(--input-color);
      background-image: url("public/profile/assets/phone-nmb-ico.svg");
      background-repeat: no-repeat;
      background-position: 10px 50%;
      font-size: 13px;
      font-style: normal;
      font-weight: 500;
      background-size: 15px 15px;
      color: var(--text-color);
      padding-left: 35px;
    }

    .input-with-icon4 {
      background: var(--input-color);
      background-image: url("public/profile/assets/email-ico.svg");
      background-repeat: no-repeat;
      background-position: 10px 50%;
      background-size: 15px 15px;
      padding-left: 35px;
      font-size: 13px;
      font-style: normal;
      color: var(--text-color);
      font-weight: 500;
    }

    .input-with-icon:focus {
      background: var(--input-color);
      background-image: url("public/profile/assets/firstname-ico.svg");
      background-repeat: no-repeat;
      background-position: 10px 50%;
      background-size: 15px 15px;
      padding-left: 35px;
      color: var(--text-color);
    }

    .input-with-icon3:focus {
      color: var(--text-color);
      background: var(--input-color);
      background-image: url("public/profile/assets/phone-nmb-ico.svg");
      background-repeat: no-repeat;
      background-position: 10px 50%;
      background-size: 15px 15px;
      padding-left: 35px;
    }

    .input-with-icon4:focus {
      background: var(--input-color);
      background-image: url("public/profile/assets/email-ico.svg");
      background-repeat: no-repeat;
      background-position: 10px 50%;
      background-size: 15px 15px;
      padding-left: 35px;
      color: var(--text-color);
    }

    .input-with-icon5 {
      background: var(--input-color);
      background-image: url("public/profile/assets/password.svg");
      background-repeat: no-repeat;
      background-position: 10px 50%;
      background-size: 15px 15px;
      padding-left: 35px;
      color: var(--text-color);
      font-size: 13px;
      font-style: normal;
      font-weight: 500;
    }

    .input-group-text {
      background: var(--input-color);
      border-left: none !important;
      border-color: var(--input-border-color);
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }

    .usherbot-btn {
      width: 100px;
      height: 28px;
      border-radius: 5px;
      background: #565A71;
      color: #F7F8F8;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
    }

    .change-psw {
      width: 178px;
      height: 39px;
      border-radius: 7px;
      background: #FF003D;
      color: #FFF;
      font-size: 14px;
      font-weight: 600;
      text-transform: uppercase;
      margin-right: 10px;
    }

    .having-trob {
      width: 163px;
      height: 39px;
      border-radius: 7px;
      background: #ECECEC;
      color: #9F9DA8;
      font-size: 14px;
      font-weight: 600;
      text-transform: uppercase;
    }

    .input-with-icon5:focus {
      color: var(--text-color);
      /* Ensure color remains consistent on focus and active */
      background: var(--input-color);
      background-image: url("public/profile/assets/password.svg");
      background-repeat: no-repeat;
      background-position: 10px 50%;
      /* Adjust position as needed */
      background-size: 15px 15px;
      /* Adjust icon size as needed */
      padding-left: 35px;
    }
    
    .links-scroll {
      max-height: calc(100vh - 160px);
    }
    .links-scroll:hover {
      overflow-y: auto;
    }
    /* For Firefox */
    .links-scroll {
      scrollbar-width: thin;
      scrollbar-color: #ddd;
      /* thumb color track color */
    }
    .links-scroll .nav-item{
      width: 100% !important;
    }
  </style>
</head>

<body>
  <!-- Loader -->
  <div id="loader" class="loader-wrapper" style="display: none;">
    <div class="loader"></div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="pricingModal" tabindex="-1" aria-labelledby="pricingModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #ff003d; margin-right: 10px; font-size: 28px">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <h2 class="fw-bolder" id="pricingModalLabel" style="font-weight: 700; margin-top: -30px">
            Choose a Plan
          </h2>
          <p class="mb-3">
            Select on of our options below for peace of mind on your own time.
          </p>
          <div style=" border-radius: 54px" class="tabs">
            <div class="tab-item active" id="monthly-tab">Monthly</div>
            <div class="tab-item" id="yearly-tab">Yearly -20%</div>
          </div>
          <div class="tab-content mt-1" id="pricingTabContent">
            <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
              <div class="plan-container">
                <?php foreach($plans as $plan){ ?>
                    <?php if($plan['pm_id'] == 1){ ?>
                        <div class="plan-card current-plan">
                          <div style="margin-left: -20px" class="justify-content-start d-flex mb-4">
                            <?php if($current_plan == $plan['pm_title']) { ?>
                                <img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-current.svg" alt="" />
                            <?php } else { ?>
                                <img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-recom.svg" alt="" />
                            <?php } ?>
                         </div>
                          <img src="<?php echo base_url(); ?>/public/Dashboard/assets/free-logo.svg" alt="" />
                          <h1 class="mt-3 plan-head" style=" font-weight: bolder">
                           <?php echo   $plan['pm_title'] ?>
                          </h1>
                          <div class="d-flex justify-content-center align-items-center mt-4">
                          <img src="<?php echo base_url(); ?>/public/Dashboard/assets/free$0.svg" alt="" /><img src="<?php echo base_url(); ?>/public/Dashboard/assets/month per user.svg"
                              alt="" class="mx-2 mt-2" />
                          </div>
                          <p style="
                                  font-size: 12.5px;
                                  font-weight: 600;
                                  margin-top: 20px;
                                ">
                            Unlock the power of our platform with our Basic Plan -
                            designed for those who want to get started without
                            breaking the bank.
                          </p>
                            <a href="/buyplan/<?php echo $plan['pm_id']; ?>/m" 
                               class="btn plan-btn <?php if($current_plan == $plan['pm_title']) { echo 'disabled'; } ?>">
                                <?php echo $plan['pm_title']; ?> PLAN
                            </a>
                        </div>
                     <?php } ?>
                     <?php if($plan['pm_id'] == 2){ ?>
                        <div class="plan-card recommended">
                          <div style="margin-left: -20px" class="justify-content-start d-flex mb-4">
                            <?php if($current_plan == $plan['pm_title']) { ?>
                                <img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-current.svg" alt="" />
                            <?php } else { ?>
                                <img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-recom.svg" alt="" />
                            <?php } ?>
                         </div>
                          <img src="<?php echo base_url(); ?>/public/Dashboard/assets/pro-logo.svg" alt="" />
                          <h1 class="mt-3 plan-head" style="font-weight: bolder">
                             <?php echo   $plan['pm_title'] ?>
                          </h1>
                          <div class="d-flex justify-content-center align-items-center mt-4">
                            <img src="<?php echo base_url(); ?>/public/Dashboard/assets/pro$11.svg" alt="" /><img src="<?php echo base_url(); ?>/public/Dashboard/assets/month per user.svg"
                              alt="" class="mx-2 mt-2" />
                          </div>
                          <p style="
                                  font-size: 12.5px;
                                  font-weight: 600;
                                  margin-top: 20px;
                                ">
                            Unlock the power of our platform with our Pro Plan -
                            designed for those who want to get the most without
                            breaking the bank.
                          </p>
                            <a href="/buyplan/<?php echo $plan['pm_id']; ?>/m" 
                               class="btn plan-btn <?php if($current_plan == $plan['pm_title']) { echo 'disabled'; } ?>">
                                <?php echo $plan['pm_title']; ?> PLAN
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
              </div>
            </div>
            <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
              <div class="plan-container">
                 <?php foreach($plans as $plan){ ?>
                    <?php if($plan['pm_id'] == 1){ ?>
                        <div class="plan-card current-plan">
                         <div style="margin-left: -20px" class="justify-content-start d-flex mb-4">
                            <?php if($current_plan == $plan['pm_title']) { ?>
                                <img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-current.svg" alt="" />
                            <?php } else { ?>
                                <img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-recom.svg" alt="" />
                            <?php } ?>
                         </div>
                          <img src="<?php echo base_url(); ?>/public/Dashboard/assets/free-logo.svg" alt="" />
                          <h1 class="mt-3 plan-head" style=" font-weight: bolder">
                            <?php echo   $plan['pm_title'] ?>
                          </h1>
                          <div class="d-flex justify-content-center align-items-center mt-4">
                            <img src="<?php echo base_url(); ?>/public/Dashboard/assets/free$0.svg" alt="" /><img src="<?php echo base_url(); ?>/public/Dashboard/assets/Year per user.svg"
                              alt="" class="mx-2 mt-2" />
                          </div>
                          <p style="
                                  font-size: 12.5px;
                                  font-weight: 600;
                                  margin-top: 20px;
                                ">
                            Unlock the power of our platform with our Basic Plan -
                            designed for those who want to get started without
                            breaking the bank.
                          </p>
                            <a href="/buyplan/<?php echo $plan['pm_id']; ?>/y" 
                               class="btn plan-btn <?php if($current_plan == $plan['pm_title']) { echo 'disabled'; } ?>">
                                <?php echo $plan['pm_title']; ?> PLAN
                            </a>
                        </div>
                    <?php } ?>
                   <?php if($plan['pm_id'] == 2){ ?>
                        <div class="plan-card recommended">
                          <div style="margin-left: -20px" class="justify-content-start d-flex mb-4">
                            <?php if($current_plan == $plan['pm_title']) { ?>
                                <img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-current.svg" alt="" />
                            <?php } else { ?>
                                <img src="<?php echo base_url(); ?>/public/Dashboard/assets/badge-recom.svg" alt="" />
                            <?php } ?>
                          </div>
                          <img src="<?php echo base_url(); ?>/public/Dashboard/assets/pro-logo.svg" alt="" />
                          <h1 class="mt-3 plan-head" style=" font-weight: bolder">
                            PRO
                          </h1>
                          <div class="d-flex justify-content-center align-items-center mt-4">
                            <img src="<?php echo base_url(); ?>/public/Dashboard/assets/pro$8.svg" alt="" /><img src="<?php echo base_url(); ?>/public/Dashboard/assets/Year per user.svg"
                              alt="" class="mx-2 mt-2" />
                          </div>
                          <p style="
                                  font-size: 12.5px;
                                  font-weight: 600;
                                  margin-top: 20px;
                                ">
                            Unlock the power of our platform with our Pro Plan -
                            designed for those who want to get the most without
                            breaking the bank.
                          </p>
                            <a href="/buyplan/<?php echo $plan['pm_id']; ?>/y" 
                               class="btn plan-btn <?php if($current_plan == $plan['pm_title']) { echo 'disabled'; } ?>">
                                <?php echo $plan['pm_title']; ?> PLAN
                            </a>
                        </div> 
                    <?php } ?>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">