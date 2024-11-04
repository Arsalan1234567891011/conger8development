<div id="main-content">
          <div>
            <div class="profile-header">
              <img src="<?php echo base_url(); ?>/public/profile/assets/cover-bg.png" alt="Cover Image" class="cover-img" />
              <div class="edit-cover-btn align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" style="margin-right: 3px"
                  viewBox="0 0 9 9" fill="none">
                  <path
                    d="M7.60806 0.128462C7.43678 -0.0428206 7.1639 -0.0428206 6.99264 0.128462L3.68618 3.4349C3.63393 3.48426 3.5991 3.54812 3.57587 3.61779L3.03593 5.42052C2.98947 5.57439 3.03302 5.73984 3.14624 5.85306C3.22751 5.93726 3.34073 5.98079 3.45395 5.98079C3.49458 5.98079 3.53813 5.97498 3.57878 5.96337L5.38149 5.42343C5.45118 5.4002 5.51503 5.36536 5.56438 5.31311L8.87084 2.00666C8.95213 1.92538 8.99857 1.81507 8.99857 1.69895C8.99857 1.58284 8.95213 1.47253 8.87084 1.39124L7.60806 0.128462Z"
                    fill="#73737C" />
                  <path
                    d="M8.56369 4.0651C8.32314 4.0651 8.12824 4.26014 8.12824 4.50054V7.40348C8.12824 7.80377 7.80266 8.12922 7.40251 8.12922H1.59662C1.19647 8.12922 0.870883 7.80377 0.870883 7.40348V1.5976C0.870883 1.19731 1.19647 0.87186 1.59662 0.87186H4.49956C4.7401 0.87186 4.93501 0.676817 4.93501 0.436418C4.93501 0.19602 4.7401 0.000976562 4.49956 0.000976562H1.59662C0.71624 0.000976562 0 0.717356 0 1.5976V7.40348C0 8.28372 0.71624 9.0001 1.59662 9.0001H7.40251C8.28289 9.0001 8.99913 8.28372 8.99913 7.40348V4.50054C8.99913 4.26014 8.80423 4.0651 8.56369 4.0651Z"
                    fill="#73737C" />
                </svg>
                Edit Cover
              </div>
              <div class="profile-pic d-flex">
                  <?php if ($user['image'] == null) { ?>
                    <img src="<?php echo base_url(); ?>/public/profile/assets/profile-img.png" alt="Profile Picture" class="rounded-circle" />
                  <?php } else { ?>
                    <img src="<?php echo base_url(); ?>/uploads/<?php echo $user['image']; ?>" alt="Profile Picture" class="rounded-circle" />
                  <?php } ?>
                <div class="edit-icon">
                  <button style="
                    background-color: #fc0239;
                    border: 3px solid #fff;
                    border-radius: 50px;
                  " class="btn btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                      <path
                        d="M0 10.2913V13H2.70871L10.7012 5.0075L7.9925 2.29879L0 10.2913ZM12.7887 2.91999C13.0704 2.63828 13.0704 2.17961 12.7887 1.8979L11.1021 0.211279C10.8204 -0.0704264 10.3617 -0.0704264 10.08 0.211279L8.75816 1.53313L11.4669 4.24184L12.7887 2.91999Z"
                        fill="white" />
                    </svg>
                  </button>
                </div>
                <div class="d-grid ml-2">
                  <h3 class="profile-name">Larry Page</h3>
                  <p class="profile-role">Pastor</p>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div class="profile-content">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="true">Profile Settings</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab"
                    aria-controls="password" aria-selected="false">Change Password</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="row">
                    <div class="col-12 col-xl-8">
                      <form id="profileForm" class="form" action="<?php echo base_url(); ?>/update-view" method="POST" enctype="multipart/form-data">
                         <input type="hidden" name="id" id="id" value="<?php if(isset($user['id'])){echo $user['id'];} else {echo '';} ?>"> 
                        <div class="d-flex justify-content-between py-3" style="gap: 15px">
                          <input type="text" class="form-control input-with-icon" value="<?php if(isset($user['name'])){echo $user['name'];} else {echo '';} ?>"  name="name"  id="name"
                            placeholder="First Name" />
                          <input type="text" class="form-control input-with-icon"  value=""  name="lname"  id="lname"
                            placeholder="Last Name" />
                        </div>
                        <div class="d-flex justify-content-between pb-3" style="gap: 15px">
                          <input type="tel" class="form-control input-with-icon3"id="phone" type="tel" placeholder="Contact Number" name="phone" value="<?php if(isset($d_pwd1)){echo $d_pwd1;} else {echo '';} ?>"
                            placeholder="Phone Number" />
                          <input type="email" class="form-control input-with-icon4" name="email" value="<?php if(isset($user['email'])){echo $user['email'];} else {echo '';} ?>"   id="email" placeholder="E-Mail" />
                        </div>
                        <div class="form-group">
                          <textarea class="form-control" id="bio" rows="4" placeholder="Bio"></textarea>
                        </div>
                        <button type="submit" class="btn save-btn mt-2 mr-2" >
                          Save Changes
                        </button>
                        <button type="button" class="btn discard-btn mt-2" onclick="discardChanges()">
                          Discard Changes
                        </button>
                      </form>
                    </div>
                    <div class="col-12 col-xl-4">
                      <div class="card">
                        <img src="<?php echo base_url(); ?>/public/profile/assets/usherbot-bg.png" class="card-img-top" alt="UsherBot" />
                        <div class="card-body">
                          <div class="d-grid">
                            <h5 class="card-title">Learn about our UsherBot</h5>
                            <p class="card-text">
                              Generate More Interests And Baptisms.
                            </p>
                            <a href="#" class="btn usherbot-btn">Learn More</a>
                          </div>
                          <img src="<?php echo base_url(); ?>/public/profile/assets/usherbot-img.png" class="usherbot-img" alt="usherbot-img" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                  <div class="row justify-content-between">
                    <div class="col-12 col-xl-5 mt-3">
                        <form id="passwordForm" class="form" action="<?php echo base_url(); ?>/update-password" method="POST" enctype="multipart/form-data">
                        <!--Old Password Input -->
                        <div class="mb-3 input-group">
                          <input style="border-right: none !important;" type="password"
                            class="form-control input-with-icon5" name="oldpass" id ="oldpass" placeholder="Old Password">
                          <span class="input-group-text"><img src="<?php echo base_url(); ?>/public/profile/assets/eye.svg" alt=""
                              id="toggleConfirmPassword" style="cursor: pointer"></span>
                        </div>
                        <!--New Password Input -->
                        <div class="mb-3 input-group">
                          <input style="border-right: none !important;" type="password"
                            class="form-control input-with-icon5" name="password" id="newpassword" placeholder="New Password">
                          <span class="input-group-text"><img src="<?php echo base_url(); ?>/public/profile/assets/eye.svg" alt=""
                              id="toggleConfirmPassword2" style="cursor: pointer"></span>
                        </div>
                        <!--Confirm Password Input -->
                        <div class="mb-3 input-group">
                          <input style="border-right: none !important;" type="password"
                            class="form-control input-with-icon5" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                          <span class="input-group-text"><img src="<?php echo base_url(); ?>/public/profile/assets/eye.svg" alt=""
                              id="toggleConfirmPassword3" style="cursor: pointer"></span>
                        </div>
                        <!-- Password Requirements -->
                        <p class="mb-4" style="
                        text-align: left;
                        font-weight: 600;
                        display: flex;
                        align-items: center;
                        font-size: 11px;
                      ">
                          <svg style="margin-right: 10px; margin-left: 3px" width="13" height="12" viewBox="0 0 8 7"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                              d="M3.99095 4.90715C3.91945 4.90715 3.84956 4.9276 3.79011 4.96593C3.73066 5.00426 3.68432 5.05873 3.65696 5.12247C3.6296 5.1862 3.62244 5.25633 3.63639 5.32399C3.65033 5.39166 3.68477 5.45381 3.73532 5.50259C3.78588 5.55137 3.8503 5.58459 3.92043 5.59804C3.99055 5.6115 4.06324 5.6046 4.1293 5.5782C4.19536 5.5518 4.25182 5.50709 4.29154 5.44973C4.33127 5.39237 4.35247 5.32493 4.35247 5.25595C4.35247 5.16344 4.31438 5.07472 4.24658 5.00931C4.17879 4.94389 4.08683 4.90715 3.99095 4.90715ZM7.84832 5.41988L4.93812 0.536675C4.84406 0.373965 4.70668 0.238436 4.54017 0.144089C4.37365 0.0497427 4.18405 0 3.99095 0C3.79785 0 3.60825 0.0497427 3.44174 0.144089C3.27523 0.238436 3.13785 0.373965 3.04378 0.536675L0.151662 5.41988C0.0543408 5.57824 0.0020465 5.75858 5.8855e-05 5.94267C-0.00192879 6.12677 0.0464606 6.30811 0.140342 6.46839C0.234223 6.62868 0.370272 6.76223 0.534754 6.85556C0.699236 6.94888 0.886328 6.99869 1.07714 6.99995H6.90477C7.09711 7.00178 7.2865 6.95422 7.45351 6.86214C7.62053 6.77007 7.75915 6.6368 7.85518 6.47599C7.95121 6.31518 8.00118 6.13262 7.99998 5.94704C7.99877 5.76145 7.94643 5.57952 7.84832 5.41988ZM7.2229 6.11748C7.19121 6.17188 7.14498 6.21708 7.08903 6.24837C7.03307 6.27965 6.96944 6.29589 6.90477 6.29537H1.07714C1.01247 6.29589 0.948839 6.27965 0.892883 6.24837C0.836928 6.21708 0.790696 6.17188 0.759008 6.11748C0.727278 6.06446 0.710574 6.00431 0.710574 5.94308C0.710574 5.88186 0.727278 5.82171 0.759008 5.76868L3.65113 0.885476C3.68147 0.828342 3.72756 0.780394 3.78433 0.746912C3.8411 0.713431 3.90634 0.695715 3.97288 0.695715C4.03941 0.695715 4.10466 0.713431 4.16143 0.746912C4.2182 0.780394 4.26429 0.828342 4.29463 0.885476L7.20482 5.76868C7.24069 5.82095 7.2613 5.88157 7.26448 5.94418C7.26766 6.00678 7.2533 6.06906 7.2229 6.12446V6.11748ZM3.99095 2.11674C3.89507 2.11674 3.80312 2.15349 3.73532 2.2189C3.66753 2.28432 3.62944 2.37303 3.62944 2.46554V3.86074C3.62944 3.95325 3.66753 4.04197 3.73532 4.10738C3.80312 4.1728 3.89507 4.20955 3.99095 4.20955C4.08683 4.20955 4.17879 4.1728 4.24658 4.10738C4.31438 4.04197 4.35247 3.95325 4.35247 3.86074V2.46554C4.35247 2.37303 4.31438 2.28432 4.24658 2.2189C4.17879 2.15349 4.08683 2.11674 3.99095 2.11674Z"
                              fill="var(--text-color)" />
                          </svg>Use 8 or more characters with a mix of letters,
                          numbers &
                          symbols.
                        </p>
                        <button type="submit" class="btn change-psw" onclick="changePassword()">
                          Change Password
                        </button>
                        <button type="button" class="btn having-trob" onclick="document.location='<?= base_url("/recover-password") ?>'">
                            Having Trouble?
                        </button>

                      </form>
                    </div>
                    <div class="col-12 col-xl-5" style="margin-top: -80px !important;">
                      <img src="<?php echo base_url(); ?>/public/profile/assets/security-bg.svg" class="img-fluid" alt="Security" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- Add Bootstrap and jQuery JS for functionality -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- jQuery (required for Toastr) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    function saveChanges() {
      const form = document.getElementById("profileForm");
      const formData = new FormData(form);
      const data = {};
      formData.forEach((value, key) => (data[key] = value));
      console.log("Saved Data:", data);
    }

    function discardChanges() {
      document.getElementById("profileForm").reset();
    }

    function changePassword() {
      const form = document.getElementById("passwordForm");
      const formData = new FormData(form);
      const data = {};
      formData.forEach((value, key) => (data[key] = value));
      console.log("Password Data:", data);
    }
    // JavaScript for Password Toggle
    document.getElementById("toggleConfirmPassword").addEventListener("click", function () {
      const passwordField = document.getElementById("oldpass");
      const eyeIcon = this;
      const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
      passwordField.setAttribute("type", type);
      eyeIcon.src = type === "password" ? "<?php echo base_url(); ?>/public/profile/assets/eye.svg" : "<?php echo base_url(); ?>/public/profile/assets/eye-slash-svgrepo-com.svg";
    });
    document.getElementById("toggleConfirmPassword2").addEventListener("click", function () {
      const passwordField = document.getElementById("newpassword");
      const eyeIcon = this;
      const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
      passwordField.setAttribute("type", type);
      eyeIcon.src = type === "password" ? "<?php echo base_url(); ?>/public/profile/assets/eye.svg" : "<?php echo base_url(); ?>/public/profile/assets/eye-slash-svgrepo-com.svg";
    });
    document.getElementById("toggleConfirmPassword3").addEventListener("click", function () {
      const passwordField = document.getElementById("confirm_password");
      const eyeIcon = this;
      const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
      passwordField.setAttribute("type", type);
      eyeIcon.src = type === "password" ? "<?php echo base_url(); ?>/public/profile/assets/eye.svg" : "<?php echo base_url(); ?>/public/profile/assets/eye-slash-svgrepo-com.svg";
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script>
    function toggleSidebar() {
      document.querySelector(".sidebar").classList.toggle("collapsed");
      document.querySelector(".main-content").classList.toggle("expanded");
      document.querySelector(".toggle-btn").classList.toggle("collapsed");
    }
  </script>
  <script src="<?php echo base_url(); ?>/public/Dashboard/index.js"></script>
  <script>
    // Notification Pannel javascript
    $(document).ready(function () {
      const $blurBackground = $("#main-content");
      <?php if (session()->getFlashdata('password_mismatch_error')): ?>
         toastr.error('<?= session()->getFlashdata('password_mismatch_error'); ?>', 'Error!');
      <?php endif; ?>
       <?php if (session()->getFlashdata('password_change')): ?>
        toastr.success('<?= session()->getFlashdata('password_change'); ?>', 'Success');
      <?php endif; ?>

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
</body>

</html>