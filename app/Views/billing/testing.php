<style>
    /* Custom radio button styles */
    .custom-control .custom-control-input:checked~.custom-control-label::before {
      background-color: #fd023a;
      /* Change color here */
      border: none;
    }


    .payment-method-card {
      border-radius: 10px;
      background: var(--card-bg-color);
      box-shadow: 0px 12px 13px 0px rgba(207, 207, 207, 0.15);
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
      background: #f5f6f6;
      color: #424657;
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
      border: 1px solid #fff;
      background: #fbfbfb;
      color: #424657;
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
      color: #424657;
      font-weight: bold;
    }

    .payment-method {
      gap: 30px;
    }

    .card-transfer-wrapper.head2 {
      border-top: 2px solid #e9e8ea;
      padding-left: 45px;
      padding-top: 10px;
      padding-bottom: 10px;
      border-bottom: 2px solid #e9e8ea;
    }

    /* Existing styles */
    .payment-method {
      margin-left: 20px;
    }

    .payment-method-card .card-header {
      background-color: #F7F8F8;
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
      color: #9f9da8;
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
      color: #9f9da8;
    }

    .billing-nav-link.active {
      width: 174px;
      padding: 15px;
      background-color: #f0f0f0 !important;
      text-align: center;
      color: #424657;
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
      width: 327px;
      height: 153px;
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
      width: 284px;
      height: 153px;
      flex-shrink: 0;
      border-radius: 11px;
      background: #F7F8F8;
    }

    .subscription-card-status .card-title {
      color: #424657;
      font-size: 17px;
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

    .unpaid {
      color: red;
    }

    .paid {
      color: green;
    }
  </style>
<div id="main-content">
  <div class="row m-0"
    style="border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-top: 1px solid #E6E6E6;  border-top-right-radius: 15px;">
    <ul class="nav nav-tabs col-12" id="myTab" role="tablist" style="border-bottom: unset !important;">
      <li class="billing-nav-item nav-item">
        <a class="billing-nav-link nav-link active" id="payment-methods-tab" data-toggle="tab"
          href="#payment-methods" role="tab" aria-controls="payment-methods" aria-selected="true">Payment
          Methods</a>
      </li>
      <li class="billing-nav-item nav-item">
        <a class="billing-nav-link nav-link" id="subscriptions-tab" data-toggle="tab" href="#subscriptions"
          role="tab" aria-controls="subscriptions" aria-selected="false">Subscriptions</a>
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
    style="border: 1px solid #E6E6E6; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
    <div class="tab-content billing-tab-pane col-12" id="myTabContent">
      <!-- Payment Methods Tab -->
      <div class="billing-tab-pane tab-pane fade show active" id="payment-methods" role="tabpanel"
        aria-labelledby="payment-methods-tab">
        <div class="row" style="margin: unset !important;">
          <div class="col-xl-8 col-lg-12 col-md-12">
            <div class="payment-method-card mt-5">
              <div style="border: none" class="card-header">
                <div class="custom-control custom-radio">
                  <input type="radio" id="eWalletRadio" name="payment-method"
                    class="custom-control-input method-radio" data-target=".payment-method" />
                  <label style="cursor: pointer" class="custom-control-label"
                    for="eWalletRadio">E-Wallet</label>
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
        <div class="row my-5">

          <div style="max-width: 29% !important;" class="col-xl-4 col-lg-12">
            <div class="subscription-card mr-3">
              <div class="pro-badge">PRO</div>
              <h4>Subscription</h4>
              <p>
                Your current “PRO” plan will be updated on
                <strong>April 4, 2024</strong>
              </p>
              <button class="btn-manage">MANAGE PLAN</button>
            </div>
          </div>

          <div class="col-xl-3 col-lg-12">
            <div class="subscription-card-status mr-3">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="card-title mb-0">Subscription Status</h5>
                  <span class="status">Active</span>
                </div>
              </div>
              <div class="card-body px-3 py-2">
                <div class="d-flex justify-content-between align-items-center">
                  <p style="font-size: 13px;">Subscription Type</p>
                  <p style="font-weight: 600;font-size: 14px;">Monthly</p>
                </div>
                <div style="margin-top: -5px;" class="d-flex justify-content-between align-items-center">
                  <p style="font-size: 13px;">Total Seats</p>
                  <p style="font-weight: 600;font-size: 15px;">5</p>
                </div>
                <div style="margin-top: -5px;" class="d-flex justify-content-between">
                  <p style="font-size: 13px;">Renew Automatically</p>
                  <div class="form-box m-0">
                    <div class="button-box">
                      <div id="toggle-btn-swipe"></div>
                      <button type="button" class="toggle-btn status-btn" onclick="toggleYes()">
                        <b class="ml-1">Yes</b>
                      </button>
                      <button type="button" class="toggle-btn status-btn" onclick="toggleNo()">No</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-12">
            <div class="subscription-card-status mr-3">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="card-title mb-0">Next Payment</h5>
                  <span class="status2">Apr 04, 2024</span>
                </div>
              </div>
              <div class="card-body px-3 py-2">
                <div class="d-flex justify-content-between align-items-center">
                  <p style="font-size: 13px;">Subscription Type</p>
                  <p style="font-weight: 600;font-size: 14px;">Monthly</p>
                </div>
                <div style="margin-top: -5px;" class="d-flex justify-content-between align-items-center">
                  <p style="font-size: 13px;">Total Seats</p>
                  <p style="font-weight: 600;font-size: 15px;">5</p>
                </div>
                <div style="margin-top: -5px;" class="d-flex justify-content-between">
                  <p style="font-size: 13px;">Renew Automatically</p>
                  <div class="form-box m-0">
                    <div class="button-box">
                      <div id="toggle-btn-swipe1"></div>
                      <button type="button" class="toggle-btn status-btn" onclick="toggleYes1()"><b
                          class="ml-1">Yes</b></button>
                      <button type="button" class="toggle-btn status-btn" onclick="toggleNo1()">No</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-lg-12">
            <img src="<?php echo base_url(); ?>public/Billing/assets/subscription-image.svg" alt="" />
          </div>
        </div>
      </div>

      <!-- Payment Profile Tab -->
      <div class="billing-tab-pane tab-pane fade" id="payment-profile" role="tabpanel"
        aria-labelledby="payment-profile-tab">
        Payment Profile content goes here.
      </div>

      <!-- Payment History Tab -->
      <div class="billing-tab-pane tab-pane fade" id="payment-history" role="tabpanel"
        aria-labelledby="payment-history-tab">
        <div class="mt-3">
          <div class="d-flex justify-content-between mb-3">
            <div class="alert alert-light" role="alert">
              Your Next Payment will be on <span class="badge badge-danger">June 04, 2024</span>
            </div>
            <div class="d-flex justify-content-between mb-3 align-items-center">
              <div>Current Balance: <span class="badge badge-danger">$0</span></div>
              <button class="btn btn-primary" onclick="updateBalance()">Update Balance</button>
            </div>
          </div>
          <table class="table table-hover">
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
            <tbody>
              <tr>
                <td>March 04, 2024</td>
                <td>$24.95</td>
                <td>5</td>
                <td>---</td>
                <td class="unpaid">Unpaid</td>
                <td><button class="btn btn-info btn-sm">Info</button></td>
                <td><a href="#">Download Invoice</a></td>
              </tr>
              <tr>
                <td>February 04, 2024</td>
                <td>$19.96</td>
                <td>4</td>
                <td>30%</td>
                <td class="paid">Paid</td>
                <td><button class="btn btn-info btn-sm">Info</button></td>
                <td><a href="#">Download Invoice</a></td>
              </tr>
              <tr>
                <td>February 04, 2024</td>
                <td>$19.96</td>
                <td>4</td>
                <td>30%</td>
                <td class="paid">Paid</td>
                <td><button class="btn btn-info btn-sm">Info</button></td>
                <td><a href="#">Download Invoice</a></td>
              </tr>
              <tr>
                <td>February 04, 2024</td>
                <td>$19.96</td>
                <td>4</td>
                <td>30%</td>
                <td class="paid">Paid</td>
                <td><button class="btn btn-info btn-sm">Info</button></td>
                <td><a href="#">Download Invoice</a></td>
              </tr>
              <tr>
                <td>February 04, 2024</td>
                <td>$19.96</td>
                <td>4</td>
                <td>30%</td>
                <td class="paid">Paid</td>
                <td><button class="btn btn-info btn-sm">Info</button></td>
                <td><a href="#">Download Invoice</a></td>
              </tr>
              <tr>
                <td>February 04, 2024</td>
                <td>$19.96</td>
                <td>4</td>
                <td>30%</td>
                <td class="paid">Paid</td>
                <td><button class="btn btn-info btn-sm">Info</button></td>
                <td><a href="#">Download Invoice</a></td>
              </tr>
              <tr>
                <td>February 04, 2024</td>
                <td>$19.96</td>
                <td>4</td>
                <td>30%</td>
                <td class="paid">Paid</td>
                <td><button class="btn btn-info btn-sm">Info</button></td>
                <td><a href="#">Download Invoice</a></td>
              </tr>
              <!-- Add more rows as needed -->
            </tbody>
          </table>
          <div class="d-flex justify-content-between">
            <select class="custom-select w-auto" id="commentsPerPage" onchange="updateTable()">
              <option selected>Comments Per Page</option>
              <option value="7">7</option>
              <option value="14">14</option>
              <option value="21">21</option>
            </select>
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </nav>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script>
  function toggleSidebar() {
    document.querySelector(".sidebar").classList.toggle("collapsed");
    document.querySelector(".main-content").classList.toggle("expanded");
    document.querySelector(".toggle-btn").classList.toggle("collapsed");
  }
</script>
<script src="../Dashboard/index.js"></script>
<script>
  // Notification Pannel javascript
  $(document).ready(function () {
    const $blurBackground = $("#main-content");

    $('#notification-icon').click(function (event) {
      event.stopPropagation(); // Prevent the click from propagating to the document
      $('#notification-card').toggle();
      $blurBackground.toggleClass("blur");
    });

    $(document).click(function (event) {
      if (!$(event.target).closest('#notification-card, #notification-icon').length) {
        if ($('#notification-card').is(":visible")) {
          $('#notification-card').hide();
          $blurBackground.removeClass("blur");
        }
      }
    });

    $('#notification-card').click(function (event) {
      event.stopPropagation(); // Prevent the click inside the card from closing it
    });
  });

  //-----------------------------------------------------------------------------------------------

  // Ensure the theme is set correctly on page load
  (function () {
    const currentTheme = localStorage.getItem("theme") || "light";
    document.documentElement.setAttribute("data-theme", "light"); // Always set to light mode on page load
    localStorage.setItem("theme", "light"); // Update localStorage to store light mode
  })();

  document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.getElementById("theme-toggle");

    toggleButton.addEventListener("click", () => {
      const newTheme = document.documentElement.getAttribute("data-theme") === "light" ? "dark" : "light";
      document.documentElement.setAttribute("data-theme", newTheme);
      localStorage.setItem("theme", newTheme);
    });
  });
</script>