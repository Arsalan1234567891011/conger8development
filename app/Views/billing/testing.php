<?php 
	$subscription = getsubscription_detail();
    $invoices = getinvoices();	
	if($subscription["plan"]["interval"]== 'month')
		$interval = "Monthly";
	else
		$interval = "Yearly";	
?>
<style>
  body {
    font-family: 'manrope';
  }

  /* Custom radio button styles */
  .custom-control .custom-control-input:checked~.custom-control-label::before {
    background-color: #fd023a;
    /* Change color here */
    border: none;
  }


  .payment-method-card {
    border-radius: 10px;
    background: var(--card-bg-color);
    box-shadow: 0px 12px 13px 0px var(--card-shadow);
  }

  .button-container {
    margin: 20px;
  }

  .add-new-btn {
    margin-right: 15px;
    width: 117px;
    height: 34px;
    flex-shrink: 0;
    border-radius: 5px;
    background: var(--button-bg);
    color: var(--button-text);
    font-size: 10px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    text-transform: uppercase;
  }

  .delete-all-btn {
    width: 120px;
    height: 34px;
    flex-shrink: 0;
    border-radius: 5px;
    border: 1px solid var(--button-border);
    background: var(--button-bg);
    color: var(--button-text);
    font-size: 10px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    text-transform: uppercase;
  }

  /* Additional styling for labels */
  .custom-control-label {
    padding-left: 0.5rem;
    /* Adjust spacing */
    color: var(--button-text);
    font-weight: bold;
  }

  .payment-method {
    gap: 30px;
  }

  .card-transfer-wrapper.head2 {
    border-top: 2px solid var(--button-border);
    padding-left: 45px;
    padding-top: 10px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--button-border);
  }

  /* Existing styles */
  .payment-method {
    margin-left: 20px;
  }

  .payment-method-card .card-header {
    background-color: var(--tab-bg-color);
    border-top-left-radius: 9px;
  }

  .payment-method img {
    width: 115px;
    border-radius: 12px;
    height: auto;
    cursor: pointer;
  }

  .payment-method img.selected {
    border: 3.5px solid red;
  }

  .card-transfer {
    gap: 20px;
    margin-left: 20px;
  }

  .card-transfer img {
    border-radius: 12px;
    height: auto;
    width: 200px;
    border: 2px solid transparent;
    cursor: pointer;
  }

  .billing-nav-link {
    color: var(--button-text);
    width: 174px;
    text-align: center;
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
  }

  .billing-nav-link.nav-link {
    border: unset !important;
  }

  .billing-nav-link:hover {
    color: var(--button-text);
  }

  .billing-nav-link.active {
    width: 174px;
    padding: 15px;
    background-color: var(--tab-bg-color) !important;
    text-align: center;
    color: var(--text-color) !important;
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
  }

  .subscription-card {
    background: linear-gradient(45deg, #ff416c, #ff4b2b);
    border-radius: 15px;
    color: white;
    padding: 20px;
    width: 100% !important;
    flex-shrink: 0;
    position: relative;
  }

  .subscription-card .pro-badge {
    position: absolute;
    width: 56px;
    height: 26px;
    flex-shrink: 0;
    text-align: center;
    top: 10px;
    right: 10px;
    border-radius: 22px;
    background: #cd103d;
    padding-top: 5px;
    color: #fff;
    font-size: 12px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
  }

  .subscription-card .btn-manage {
    width: 104px;
    height: 28px;
    flex-shrink: 0;
    border: none;
    border-radius: 6px;
    background: #fff;
    color: #ff003d;
    font-size: 11px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    text-transform: uppercase;
  }

  .subscription-card h4 {
    color: #fff;
    font-size: 19px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    margin-top: -7px;
  }

  .subscription-card p {
    margin-top: 10px;
    margin-bottom: 25px;
    width: 235px;
    color: #fff;
    font-size: 12px;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
  }

  .subscription-card-status {
    flex-shrink: 0;
    border-radius: 11px;
    background: var(--event-bg-color);
  }

  .subscription-card-status .card-title {
    color: var(--sidebar-text);
    font-size: 17px !important;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
  }

  .subscription-card-status .card-header {
    background: transparent;
  }

  .subscription-card-status .status {
    color: #1C9565;
    font-size: 12px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
  }

  .button-box {
    position: relative;
    border-radius: 30px;
    width: 60px;
    height: 20px;
    background: linear-gradient(0deg, #D8D8D8 0%, #D8D8D8 100%), #D8D8D8;
  }


  .button-box2 {
    position: relative;
    border-radius: 30px;
    width: 60px;
    height: 20px;
    background: linear-gradient(0deg, #D8D8D8 0%, #D8D8D8 100%), #D8D8D8;
  }

  .subscription-card-status .status2 {
    color: #FF003D;
    font-size: 12px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
  }

  .status-btn {
    width: 46px;
    height: 32px;
    cursor: pointer;
    background: transparent;
    margin-left: -22px;
    border: 0;
    font-size: 12px;
    outline: none;
    position: relative;
  }

  .status-btn:focus {
    border: 0;
    outline: none;
  }

  .billing-nav-item.nav-item {
    padding-left: unset !important;
    border-radius: 25px;
  }

  #toggle-btn-swipe {
    margin-left: 4px;
    top: 2px;
    position: absolute;
    width: 28px;
    height: 76%;
    background: #ffffff;
    border-radius: 30px;
    transition: .5s;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
  }

  #toggle-btn-swipe1 {
    margin-left: 4px;
    top: 2px;
    position: absolute;
    width: 28px;
    height: 76%;
    background: #ffffff;
    border-radius: 30px;
    transition: .5s;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
  }

  .table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.05);
  }

  @media (max-width: 998px) {
    .responsive-header {
      flex-direction: column !important;
      gap: 25px !important;
      align-items: flex-start !important;
    }

    .responsive-table th,
    .responsive-table td {
      font-size: 12px;
      white-space: nowrap;
    }
  }
</style>
<div id="main-content">
  <div class="row m-0"
    style="border-left: 1px solid var(--button-border); border-right: 1px solid var(--button-border); border-top: 1px solid var(--button-border);  border-top-right-radius: 15px;">
    <ul class="nav nav-tabs col-12" id="myTab" role="tablist" style="border-bottom: unset !important;">
      <li class="billing-nav-item nav-item">
        <a class="billing-nav-link nav-link active" id="payment-methods-tab" data-toggle="tab" href="#payment-methods"
          role="tab" aria-controls="payment-methods" aria-selected="true">Payment
          Methods</a>
      </li>
      <li class="billing-nav-item nav-item">
        <a class="billing-nav-link nav-link" id="subscriptions-tab" data-toggle="tab" href="#subscriptions" role="tab"
          aria-controls="subscriptions" aria-selected="false">Subscriptions</a>
      </li>
      <li class="billing-nav-item nav-item">
        <a class="billing-nav-link nav-link" id="payment-profile-tab" data-toggle="tab" href="#payment-profile"
          role="tab" aria-controls="payment-profile" aria-selected="false">Payment Profile</a>
      </li>
      <li class="billing-nav-item nav-item">
        <a class="billing-nav-link nav-link" id="payment-history-tab" data-toggle="tab" href="#payment-history"
          role="tab" aria-controls="payment-history" aria-selected="false">Payment History</a>
      </li>
    </ul>
  </div>
  <div class="row m-0"
    style="border: 1px solid var(--button-border); border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
    <div class="tab-content billing-tab-pane col-12" id="myTabContent">
      <!-- Payment Methods Tab -->
      <div class="billing-tab-pane tab-pane fade show active" id="payment-methods" role="tabpanel"
        aria-labelledby="payment-methods-tab">
        <div class="row" style="margin: unset !important;">
          <div class="col-xl-8 col-lg-12 col-md-12">
            <div class="payment-method-card mt-5">
              <div style="border: none" class="card-header">
                <div class="custom-control custom-radio">
                  <input type="radio" id="eWalletRadio" name="payment-method" class="custom-control-input method-radio"
                    data-target=".payment-method" />
                  <label style="cursor: pointer" class="custom-control-label" for="eWalletRadio">E-Wallet</label>
                </div>
              </div>
              <div class="card-body px-0">
                <div class="payment-method row mb-4">
                  <img src="<?php echo base_url(); ?>public/Billing/assets/gpay-icon.svg" alt="Google Pay" id="gpay" />
                  <img src="<?php echo base_url(); ?>public/Billing/assets/applepay-icon.svg" alt="Apple Pay" id="apay" />
                  <img src="<?php echo base_url(); ?>public/Billing/assets/pay[al=icon.svg" alt="PayPal" id="paypal" />
                  <img src="<?php echo base_url(); ?>public/Billing/assets/wisepay-icon.svg" alt="Wise" id="wise" />
                </div>
                <div class="card-transfer-wrapper head2" style="padding-left: 20px;">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="cardTransferRadio" name="payment-method"
                      class="custom-control-input method-radio" data-target=".card-transfer" />
                    <label style="cursor: pointer" class="custom-control-label" for="cardTransferRadio">Card
                      Transfer</label>
                  </div>
                </div>
                <div class="card-transfer row mt-4">
                  <img src="<?php echo base_url(); ?>public/Billing/assets/card-1.svg" alt="Mastercard" id="mastercard" />
                  <img src="<?php echo base_url(); ?>public/Billing/assets/card-2.svg" alt="Visa" id="visa" />
                </div>
                <div class="button-container">
                  <button class="btn add-new-btn">Add new Card</button>
                  <button class="btn delete-all-btn">Delete All Cards</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-12 col-md-12">
            <img src="<?php echo base_url(); ?>public/Billing/assets/bg-image.svg" alt="" width="335px" />
          </div>
        </div>
      </div>

      <!-- Subscriptions Tab -->
      <div class="billing-tab-pane tab-pane fade" id="subscriptions" role="tabpanel"
        aria-labelledby="subscriptions-tab">
        <div class="row my-5 px-3">
          <!-- Subscription Card -->
          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="subscription-card">
              <div class="pro-badge">PRO</div>
              <h4>Subscription</h4>
              <p>
                Your current “PRO” plan will be updated on
                <strong>April 4, 2024</strong>
              </p>
              <button class="btn-manage">MANAGE PLAN</button>
            </div>
          </div>

          <!-- Subscription Status Card -->
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="subscription-card-status">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="card-title mb-0">Subscription Status</h5>
                  <span class="status text-capitalize"><?php echo  $subscription["status"] ?></span>
                </div>
              </div>
              <div class="card-body px-3 py-2">
                <div class="d-flex justify-content-between align-items-center">
                  <p style="font-size: 13px;">Subscription Type</p>
                  <p style="font-weight: 600;font-size: 14px;"><?php echo  $interval ?></p>
                </div>
                <div class="d-flex justify-content-between align-items-center" style="margin-top: -5px;">
                  <p style="font-size: 13px;">Total Seats</p>
                  <p style="font-weight: 600;font-size: 15px;"><?php echo getbillinguser() ?></p>
                </div>
                <div class="d-flex justify-content-between" style="margin-top: -5px;">
                  <p style="font-size: 13px;">Renew Automatically</p>
                  <div class="form-box m-0">
                    <div class="button-box">
                      <div id="toggle-btn-swipe"></div>
                      <button type="button" class="toggle-btn status-btn" onclick="toggleYes()"> <b
                          class="ml-1">Yes</b></button>
                      <button type="button" class="toggle-btn status-btn" onclick="toggleNo()">No</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Next Payment Card -->
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="subscription-card-status">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="card-title mb-0">Next Payment</h5>
                  <span class="status2"> <?php echo  date("M d,Y ",$subscription->current_period_end) ?></span>
                </div>
              </div>
              <div class="card-body px-3 py-2">
                <div class="d-flex justify-content-between align-items-center">
                  <p style="font-size: 13px;">Subscription Type</p>
                  <p style="font-weight: 600;font-size: 14px;"><?php echo  $interval ?></p>
                </div>
                <div class="d-flex justify-content-between align-items-center" style="margin-top: -5px;">
                  <p style="font-size: 13px;">Total Seats</p>
                  <p style="font-weight: 600;font-size: 15px;"><?php echo  getbillinguser() ?></p>
                </div>
                <div class="d-flex justify-content-between" style="margin-top: -5px;">
                  <p style="font-size: 13px;">Renew Automatically</p>
                  <div class="form-box m-0">
                    <div class="button-box">
                      <div id="toggle-btn-swipe1"></div>
                      <button type="button" class="toggle-btn status-btn" onclick="toggleYes1()"> <b
                          class="ml-1">Yes</b></button>
                      <button type="button" class="toggle-btn status-btn" onclick="toggleNo1()">No</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Image Section -->
          <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center mb-4">
            <img src="<?php echo base_url(); ?>public/Billing/assets/subscription-image.svg" alt="" class="img-fluid" />
          </div>
        </div>

        <!-- Additional CSS -->
        <style>
          @media (max-width: 1200px) {

            .subscription-card,
            .subscription-card-status {
              margin-bottom: 20px;
            }
          }

          @media (max-width: 992px) {

            .btn-manage {
              width: auto;
              margin: 10px auto;
            }
          }

          @media (max-width: 576px) {
            .subscription-card-status {
              margin-bottom: 15px;
            }

            img {
              width: 100%;
              height: auto;
            }
          }
        </style>

      </div>

      <!-- Payment Profile Tab -->
      <div class="billing-tab-pane tab-pane fade" id="payment-profile" role="tabpanel"
        aria-labelledby="payment-profile-tab">
        Payment Profile content goes here.
      </div>

      <!-- Payment History Tab -->
      <div class="billing-tab-pane tab-pane fade" id="payment-history" role="tabpanel"
        aria-labelledby="payment-history-tab">
        <div class="mt-3 w-100">
          <div class="d-flex responsive-header align-items-center justify-content-between px-4 py-3"
            style="background-color: var(--event-bg-color);border-radius: 50px;">
            <div style="font-size: 14px;font-weight: 600;color: var(--sidebar-text);">
              Your Next Payment will be on <span
                style="margin-left: 10px; font-weight: 700;font-size: 12px; padding: 5px 15px;border-radius: 8px; background-color: var(--statusinactive-bg);color: var(--statusinactive-text);"><?php echo  date("M d,Y ",$subscription->current_period_end) ?></span>
            </div>
            <div class="d-flex justify-content-between align-items-center" style="gap: 12px;">
              <div style="font-size: 14px;font-weight: 700;color: var(--sidebar-text);">Current Balance: <span style="color: #FF003D;
                font-family: Manrope;
                font-size: 16px;
                font-style: normal;
                font-weight: 800;
                line-height: normal;"> $0</span></div>
              <button class="btn btn-dark" style="border-radius: 5px;
                  background: #424657;
                  color: #FFF;
                  text-align: right;
                  font-family: Manrope;
                  font-size: 13px;
                  font-style: normal;
                  font-weight: 800;
                  line-height: normal;" onclick="updateBalance()">Update Balance</button>
            </div>
          </div>
          <div class="table-responsive mt-4">
            <table class="table table-hover mt-4">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Users</th>
                  <th>Discount</th>
                  <th>Status</th>
                  <th>Actions</th>
                  <th>Invoice</th>
                </tr>
              </thead>
              <tbody style="font-size: 15px !important;">
			    <?php
					if (!empty(($invoices->data)) > 0) {
					 foreach ($invoices->data as $invoice) {
                        $pdfLinks=$invoice->hosted_invoice_url;
				?>
						<tr>
						  <td><?php echo  date("M d,Y ",$invoice->status_transitions['paid_at']) ?></td>
						  <td>$ <?php echo ($invoice->amount_paid / 100)?></td>
						  <td>5</td>
						  <td>---</td>
						  <td><span style="border-radius: 23px;
						  padding: 6px 18px;
						  background: var(--statusinactive-bg);
						  color: var(--statusinactive-text);
						  font-size: 11.5px;
						  font-weight: 700;"><?php echo  $invoice->status . PHP_EOL?></span></td>
						  <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 12 12" fill="none">
							  <g clip-path="url(#clip0_240_195)">
								<path
								  d="M6 0C2.6865 0 0 2.6865 0 6C0 9.3135 2.6865 12 6 12C9.3135 12 12 9.3135 12 6C12 2.6865 9.3135 0 6 0ZM5.25 5.25C5.25 5.05109 5.32902 4.86032 5.46967 4.71967C5.61032 4.57902 5.80109 4.5 6 4.5C6.19891 4.5 6.38968 4.57902 6.53033 4.71967C6.67098 4.86032 6.75 5.05109 6.75 5.25V9C6.75 9.19891 6.67098 9.38968 6.53033 9.53033C6.38968 9.67098 6.19891 9.75 6 9.75C5.80109 9.75 5.61032 9.67098 5.46967 9.53033C5.32902 9.38968 5.25 9.19891 5.25 9V5.25ZM6 3.762C5.90148 3.76198 5.80394 3.74255 5.71293 3.70482C5.62192 3.6671 5.53924 3.61182 5.46959 3.54214C5.39995 3.47246 5.34471 3.38975 5.30703 3.29872C5.26935 3.2077 5.24998 3.11014 5.25 3.01163C5.25002 2.91311 5.26945 2.81556 5.30718 2.72456C5.3449 2.63355 5.40018 2.55086 5.46986 2.48122C5.53954 2.41157 5.62225 2.35634 5.71328 2.31866C5.8043 2.28098 5.90186 2.2616 6.00037 2.26163C6.19934 2.26167 6.39013 2.34076 6.53078 2.48148C6.67143 2.62221 6.75042 2.81304 6.75037 3.012C6.75033 3.21096 6.67124 3.40176 6.53052 3.54241C6.38979 3.68306 6.19896 3.76205 6 3.762Z"
								  fill="#9F9DA8" />
							  </g>
							  <defs>
								<clipPath id="clip0_240_195">
								  <rect width="12" height="12" fill="white" />
								</clipPath>
							  </defs>
							</svg><svg xmlns="http://www.w3.org/2000/svg" style="margin-left: 5px;" width="16" height="16"
							  viewBox="0 0 12 12" fill="none">
							  <path
								d="M6 0C2.68625 0 0 2.68625 0 6C0 9.31375 2.68625 12 6 12C9.31375 12 12 9.31375 12 6C12 2.68625 9.31375 0 6 0ZM3.64437 4.125H8.34438C8.59375 4.125 8.465 4.445 8.32938 4.52688C8.19375 4.60812 6.31687 5.74375 6.24625 5.78562C6.17563 5.8275 6.08563 5.84812 5.99438 5.84812C5.90657 5.84992 5.81986 5.82835 5.74312 5.78562L3.65937 4.52688C3.52375 4.445 3.39562 4.125 3.64437 4.125ZM8.5 7.5625C8.5 7.69375 8.3425 7.875 8.2225 7.875H3.7775C3.6575 7.875 3.5 7.69375 3.5 7.5625V5.28312C3.5 5.22563 3.49875 5.15125 3.6075 5.21438L5.74312 6.47375C5.8185 6.51983 5.9062 6.54164 5.99438 6.53625C6.08563 6.53625 6.15188 6.52938 6.24625 6.47375L8.3925 5.215C8.50125 5.15125 8.5 5.22625 8.5 5.28375V7.5625Z"
								fill="#9F9DA8" />
							</svg></td>
						  <td><a target ="_blank" href="<?php echo  $pdfLinks ?>">Download Invoice</a> <svg style="margin-left: 8px;" xmlns="http://www.w3.org/2000/svg"
							  width="11" height="11" viewBox="0 0 11 11" fill="none">
							  <path
								d="M5.49889 8.25009C5.58937 8.25062 5.67907 8.23327 5.76283 8.19906C5.84659 8.16485 5.92278 8.11444 5.98702 8.05072L8.73703 5.30071C8.84966 5.16919 8.90851 5.00001 8.90183 4.82698C8.89515 4.65396 8.82342 4.48982 8.70098 4.36738C8.57854 4.24494 8.4144 4.17321 8.24138 4.16653C8.06835 4.15985 7.89917 4.2187 7.76765 4.33133L5.49889 6.59321L3.23701 4.33133C3.10549 4.2187 2.93631 4.15985 2.76328 4.16653C2.59025 4.17321 2.42612 4.24494 2.30368 4.36738C2.18124 4.48982 2.10951 4.65396 2.10283 4.82698C2.09615 5.00001 2.155 5.16919 2.26763 5.30071L5.01764 8.05072C5.1457 8.17773 5.31853 8.24933 5.49889 8.25009Z"
								fill="#7F7F7F" />
							  <path
								d="M5.49998 8.25003C5.68232 8.25003 5.85719 8.1776 5.98612 8.04866C6.11505 7.91973 6.18748 7.74486 6.18748 7.56253V0.687502C6.18748 0.505165 6.11505 0.330297 5.98612 0.201365C5.85719 0.0724332 5.68232 0 5.49998 0C5.31764 0 5.14278 0.0724332 5.01384 0.201365C4.88491 0.330297 4.81248 0.505165 4.81248 0.687502V7.56253C4.81248 7.74486 4.88491 7.91973 5.01384 8.04866C5.14278 8.1776 5.31764 8.25003 5.49998 8.25003ZM0.687464 11H10.3125C10.4948 11 10.6697 10.9276 10.7986 10.7987C10.9276 10.6697 11 10.4949 11 10.3125C11 10.1302 10.9276 9.95533 10.7986 9.8264C10.6697 9.69747 10.4948 9.62503 10.3125 9.62503H0.687464C0.505127 9.62503 0.330257 9.69747 0.201326 9.8264C0.0723944 9.95533 -3.8147e-05 10.1302 -3.8147e-05 10.3125C-3.8147e-05 10.4949 0.0723944 10.6697 0.201326 10.7987C0.330257 10.9276 0.505127 11 0.687464 11Z"
								fill="#7F7F7F" />
							</svg></td>
						</tr>
				<?php
					}
				}else{
				?>
				    <tr>
						<td colspan="7" class="text-center"><b>No invoices found</b></td>
					</tr>
					
				<?php
				}
				
				?>
   

               
                <!-- Add more rows as needed -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>

  $(document).ready(function () {
    $("#eWalletRadio").change(function () {
      if ($(this).is(":checked")) {
        // Deselect card transfer radio
        $("#cardTransferRadio").prop("checked", false);
        // Reset card transfer images
        $(".card-transfer img").css("border-color", "transparent");
      }
    });

    $("#cardTransferRadio").change(function () {
      if ($(this).is(":checked")) {
        // Deselect e-wallet radio
        $("#eWalletRadio").prop("checked", false);
        // Reset payment method images
        $(".payment-method img").removeClass("selected");
      }
    });

    $(".payment-method img").click(function () {
      if ($("#eWalletRadio").is(":checked")) {
        $(".payment-method img").removeClass("selected");
        $(this).addClass("selected");
      }
    });

    $(".card-transfer img").click(function () {
      if ($("#cardTransferRadio").is(":checked")) {
        $(".card-transfer img").css("border-color", "transparent");
        $(this).css("border-color", "#F6A79D");
      }
    });
  });
  //--------------------------------------------------------------------------------------------------
  // subscription status btn 

  var toggleBtnSwipe = document.getElementById("toggle-btn-swipe");

  function toggleYes() {
    toggleBtnSwipe.style.left = "0";
  }

  function toggleNo() {
    toggleBtnSwipe.style.left = "25px";
  }

  //---------------------------------------------------------------------------------------------------
  // Next Payment btn

  var toggleBtnSwipe1 = document.getElementById("toggle-btn-swipe1");

  function toggleYes1() {
    toggleBtnSwipe1.style.left = "0";
  }

  function toggleNo1() {
    toggleBtnSwipe1.style.left = "25px";
  }

  //--------------------------------------------------------------------------------------------------

  function updateBalance() {
    // Update balance logic here
    alert("Balance updated!");
  }

  function updateTable() {
    // Update table logic based on selected comments per page
    let commentsPerPage = document.getElementById("commentsPerPage").value;
    alert("Comments per page set to " + commentsPerPage);
  }
</script>