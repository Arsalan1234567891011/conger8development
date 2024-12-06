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
  <?php if (!empty($link)) : ?>
	<?php foreach ($link as $asset) : ?>
		<?= $asset . "\n" ?>
	<?php endforeach; ?>
   <?php endif; ?>
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
                          <a href="<?= base_url('buyplan/' . $plan['pm_id'] . '/m') ?>" 
							class="btn plan-btn <?= ($current_plan == $plan['pm_title']) ? 'disabled' : '' ?>">
							<?= htmlspecialchars($plan['pm_title']) ?> PLAN
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
                            <a href="<?= base_url('buyplan/' . $plan['pm_id'] . '/m') ?>"
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
                            <a href="<?= base_url('buyplan/' . $plan['pm_id'] . '/y') ?>" 
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
                            <a href="<?= base_url('buyplan/' . $plan['pm_id'] . '/y') ?>" 
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