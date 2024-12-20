<style>
  :root {
    --input-color: #f9f9f9;
    --text-color: black;
    --input-border-color: #e2e8f0;
  }

  [data-theme="dark"] {
    --input-color: #24222C !important;
    --input-border-color: #3F3D48 !important;
    --text-color: white !important;
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
    left: 11.5%;
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
    width: 100%;
    border-radius: 7px;
    padding: 10px 10px 10px 35px !important;
    font-family: 'Manrope';
    font-size: 13px;
    font-weight: 500;
    outline: none;
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

  .input-group {
    display: flex;
    justify-content: space-between;
  }

  .input-icon-wrapper {
    position: relative;
    display: flex;
    align-items: center;
  }

  .input-icon {
    position: absolute;
    left: 15px;
    pointer-events: none;
    /* Make sure the icon doesn't interfere with input interactions */
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

  @media (max-width: 991.98px) {

    /* For md and smaller screens */
    .custom-margin {
      margin-top: 3rem !important;
      /* Bootstrap mt-5 equivalent */
    }
  }

  @media (min-width: 992px) {

    /* For lg and larger screens */
    .custom-margin {
      margin-top: -80px !important;
      /* Negative margin for larger screens */
    }
  }

  /* Adjust image size and layout for smaller screens */

  @media (max-width: 991.98px) {
    .profile-pic img {
      width: 80px;
      /* Smaller image size */
      height: 80px;
    }

    .profile-pic .edit-icon button {
      width: 30px;
      height: 30px;
      padding: 0;
    }

    .edit-icon {
      left: 56px;
      top: 54px;
    }

    .profile-name {
      margin-top: 44px !important;
      margin-left: 10px !important;
      font-size: 1rem;
      /* Smaller font size for the name */
    }

    .profile-pic .profile-role {
      margin-left: 10px !important;
      font-size: 0.875rem;
      /* Smaller font size for the role */
    }

    .profile-pic {
      top: 165px !important;
      left: 110px !important;
    }
  }

  @media (min-width: 992px) and (max-width: 1439px) {
    .profile-pic img {
      width: 90px;
      /* Default image size for larger screens */
      height: 90px;
    }

    .profile-pic .edit-icon button {
      width: 30px;
      height: 30px;
      padding: 0.35rem;
    }

    .edit-icon {
      left: 62px;
      top: 60px;
    }

    .profile-name {
      margin-top: 50px !important;
      margin-left: 6px !important;
      font-size: 1.10rem;
      /* Larger font size for the name */
    }

    .profile-pic .profile-role {
      margin-left: 6px !important;
      font-size: 0.8rem;
      /* Default font size for the role */
    }

    .profile-pic {
      top: 160px !important;
      left: 140px !important;
    }
  }
</style>
<div id="main-content">
  <div>
    <div class="profile-header">
      <img src="<?php echo base_url()?>/public/profile/assets/cover-bg.png" alt="Cover Image" class="cover-img" id="profilecoverimg" />
      <div class="edit-cover-btn align-items-center" onclick="document.getElementById('fileInput1').click();">
        <input type="file" id="fileInput1" style="display: none;" accept="image/*" onchange="handleFileChange(event)" />
        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" style="margin-right: 3px" viewBox="0 0 9 9"
          fill="none">
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
        <img src="<?php echo base_url()?>/public/profile/assets/profile-img.png" alt="Profile Picture" class="rounded-circle"
          id="profilecoverimg1" />
        <div class="edit-icon">
          <input type="file" id="fileInput" style="display: none;" accept="image/*"
            onchange="handleFileChange1(event)" />
          <button style="background-color: #fc0239; border: 3px solid #fff; border-radius: 50px;" class="btn btn-sm"
            onclick="document.getElementById('fileInput').click();">
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
          <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password"
            aria-selected="false">Change Password</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="row">
            <div class="col-12 col-xl-8">
              <form id="profileForm">
                <div class="d-flex justify-content-between py-3" style="gap: 15px">
                  <div class="form-group mb-0 w-100 ">
                    <div class="input-icon-wrapper">
                      <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="12" height="14"
                        viewBox="0 0 12 14" fill="none">
                        <g clip-path="url(#clip0_1304_132)">
                          <path
                            d="M5.85195 13.9989C4.54246 13.9989 3.23297 13.9994 1.92349 13.9989C0.628139 13.9979 -0.148125 13.1053 0.0236796 11.8157C0.317005 9.61683 1.99734 8.14392 4.21247 8.14392C5.37372 8.14392 6.53445 8.13973 7.69571 8.14497C9.84327 8.1544 11.6739 9.95206 11.73 12.1001C11.7588 13.2074 10.9988 13.9942 9.88465 13.9979C8.54007 14.0026 7.19601 13.9989 5.85143 13.9989H5.85195Z"
                            fill="#9B9DA8" />
                          <path
                            d="M5.8639 0C7.81713 0 9.38118 1.56353 9.37856 3.51362C9.37647 5.45638 7.79303 7.02776 5.84923 7.01624C3.90752 7.00524 2.34923 5.4459 2.34766 3.51205C2.34556 1.56248 3.91066 0 5.8639 0Z"
                            fill="#9B9DA8" />
                        </g>
                        <defs>
                          <clipPath id="clip0_1304_132">
                            <rect width="11.7309" height="14" fill="white" />
                          </clipPath>
                        </defs>
                      </svg>
                      <input type="text" class="form-control" id="firstName" placeholder="First Name" required>
                    </div>
                  </div>
                  <div class="form-group mb-0 w-100 ">
                    <div class="input-icon-wrapper">
                      <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="12" height="14"
                        viewBox="0 0 12 14" fill="none">
                        <g clip-path="url(#clip0_1304_132)">
                          <path
                            d="M5.85195 13.9989C4.54246 13.9989 3.23297 13.9994 1.92349 13.9989C0.628139 13.9979 -0.148125 13.1053 0.0236796 11.8157C0.317005 9.61683 1.99734 8.14392 4.21247 8.14392C5.37372 8.14392 6.53445 8.13973 7.69571 8.14497C9.84327 8.1544 11.6739 9.95206 11.73 12.1001C11.7588 13.2074 10.9988 13.9942 9.88465 13.9979C8.54007 14.0026 7.19601 13.9989 5.85143 13.9989H5.85195Z"
                            fill="#9B9DA8" />
                          <path
                            d="M5.8639 0C7.81713 0 9.38118 1.56353 9.37856 3.51362C9.37647 5.45638 7.79303 7.02776 5.84923 7.01624C3.90752 7.00524 2.34923 5.4459 2.34766 3.51205C2.34556 1.56248 3.91066 0 5.8639 0Z"
                            fill="#9B9DA8" />
                        </g>
                        <defs>
                          <clipPath id="clip0_1304_132">
                            <rect width="11.7309" height="14" fill="white" />
                          </clipPath>
                        </defs>
                      </svg>
                      <input type="text" class="form-control" id="lastName" placeholder="Last Name" required>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between pb-3" style="gap: 15px">
                  <div class="form-group mb-0 w-100 ">
                    <div class="input-icon-wrapper">
                      <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                        viewBox="0 0 13 13" fill="none">
                        <path
                          d="M9.72846 8.68955L9.35384 8.89263C8.72183 9.23872 7.92111 9.12145 7.40921 8.60946L4.38933 5.589C3.87744 5.07701 3.76019 4.27613 4.10622 3.64114L4.30926 3.26931C4.53804 2.84598 4.62097 2.37118 4.55234 1.89637C4.48751 1.42252 4.26841 0.983231 3.92891 0.646425C3.51139 0.228823 2.9566 0 2.36464 0C1.77267 0 1.21502 0.228823 0.797502 0.646425L0.651655 0.79516C-0.120474 1.56744 -0.209126 2.89747 0.399999 4.54499C0.974806 6.11815 2.133 7.82288 3.65438 9.34456C5.97363 11.6642 8.55597 13 10.4091 13C11.1412 13 11.7617 12.7912 12.2021 12.3507L12.3508 12.202C12.5568 11.9962 12.7201 11.7519 12.8315 11.4829C12.9429 11.214 13.0002 10.9257 13 10.6345C12.996 10.0483 12.763 9.4868 12.3508 9.06997C11.6616 8.38064 10.5835 8.22618 9.72846 8.68955Z"
                          fill="#9B9DA8" />
                      </svg>
                      <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number" required>
                    </div>
                  </div>
                  <div class="form-group mb-0 w-100 ">
                    <div class="input-icon-wrapper">
                      <svg style="left: 13px !important;" class="input-icon" xmlns="http://www.w3.org/2000/svg"
                        width="16" height="11" viewBox="0 0 16 11" fill="none">
                        <path
                          d="M7.99833 4.92544L14.9361 0.46854C14.6572 0.259328 14.3185 0.145157 13.9698 0.142822H2.02684C1.67818 0.145157 1.33947 0.259328 1.06055 0.46854L7.99833 4.92544Z"
                          fill="#9B9DA8" />
                        <path
                          d="M8.29361 6.02739L8.20132 6.07082H8.15789C8.10791 6.09315 8.05483 6.10779 8.00046 6.11425C7.9554 6.11992 7.90981 6.11992 7.86475 6.11425H7.82132L7.72903 6.07082L0.454677 1.36963C0.419922 1.50075 0.401685 1.6357 0.400391 1.77135V9.37142C0.400391 9.80335 0.571973 10.2176 0.877393 10.523C1.18281 10.8284 1.59705 11 2.02898 11H13.9719C14.4039 11 14.8181 10.8284 15.1235 10.523C15.429 10.2176 15.6005 9.80335 15.6005 9.37142V1.77135C15.5992 1.6357 15.581 1.50075 15.5462 1.36963L8.29361 6.02739Z"
                          fill="#9B9DA8" />
                      </svg>
                      <input type="email" class="form-control" id="email" placeholder="E-Mail" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <textarea style="padding-left: 13px !important;" class="form-control" id="bio" rows="4"
                    placeholder="Bio" required></textarea>
                </div>
                <button type="button" class="btn save-btn mt-2 mr-2" onclick="saveChanges()">
                  Save Changes
                </button>
                <button type="button" class="btn discard-btn mt-2" onclick="discardChanges()">
                  Discard Changes
                </button>
              </form>
            </div>
            <div class="col-12 col-xl-4 mt-5 mt-xl-0">
              <div class="card">
                <img src="<?php echo base_url()?>/public/profile/assets/usherbot-bg.png" class="card-img-top" alt="UsherBot" />
                <div class="card-body">
                  <div class="d-grid">
                    <h5 class="card-title">Learn about our UsherBot</h5>
                    <p class="card-text">
                      Generate More Interests And Baptisms.
                    </p>
                    <a href="#" class="btn usherbot-btn">Learn More</a>
                  </div>
                  <img src="<?php echo base_url()?>/public/profile/assets/usherbot-img.png" class="usherbot-img" alt="usherbot-img" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
          <div class="row justify-content-between">
            <div class="col-12 col-xl-5 mt-3">
              <form id="passwordForm">
                <!--Old Password Input -->
                <div class="mb-3 input-group">
                  <div class="form-group mb-0 w-100 ">
                    <div class="input-icon-wrapper">
                      <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="12"
                        viewBox="0 0 10 12" fill="none">
                        <path
                          d="M1.26726 5.05621C1.26726 4.44722 1.26591 3.84979 1.26726 3.25236C1.27266 1.43848 2.84891 0.0268711 4.96091 -0.000126912C6.86347 -0.0240394 8.37455 1.1415 8.67523 2.69235C8.71569 2.89984 8.72108 3.1139 8.72378 3.32526C8.73007 3.90301 8.72602 4.48038 8.72602 5.0593C9.13458 5.14106 9.46943 5.29225 9.71258 5.57805C9.92653 5.82913 9.9944 6.10836 9.9935 6.41267C9.989 7.7564 9.97102 9.10051 9.99934 10.4435C10.0164 11.2592 9.31032 11.82 8.39118 11.8173C6.42075 11.8115 4.45033 11.8169 2.4799 11.8146C2.08348 11.8142 1.68436 11.8215 1.29108 11.7872C0.554422 11.7224 0.0128249 11.2137 0.00833032 10.5788C-0.00245668 9.15798 -0.00245668 7.73711 0.00653249 6.31663C0.0105776 5.65827 0.416438 5.26256 1.26816 5.05583L1.26726 5.05621ZM7.15562 5.03654C7.15562 4.40325 7.16416 3.78769 7.15382 3.17252C7.13764 2.23608 6.28412 1.44465 5.22519 1.3706C4.0575 1.28922 3.03453 1.91133 2.89206 2.88095C2.79542 3.53893 2.84936 4.21349 2.83767 4.88073C2.83677 4.93009 2.84621 4.97946 2.8516 5.03654H7.15607H7.15562Z"
                          fill="#9B9DA8" />
                      </svg>
                      <input style="padding-right: 42px !important;" type="password" class="form-control"
                        id="confirmPassword" placeholder="Old Password" required>
                      <span style="position: absolute;right: 13px;"><img
                          src="<?php echo base_url()?>/public/profile/assets/eye-slash-svgrepo-com.svg" alt="" id="toggleConfirmPassword"
                          style="cursor: pointer"></span>
                    </div>
                  </div>
                </div>
                <!--New Password Input -->
                <div class="mb-3 input-group">
                  <div class="form-group mb-0 w-100 ">
                    <div class="input-icon-wrapper">
                      <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="12"
                        viewBox="0 0 10 12" fill="none">
                        <path
                          d="M1.26726 5.05621C1.26726 4.44722 1.26591 3.84979 1.26726 3.25236C1.27266 1.43848 2.84891 0.0268711 4.96091 -0.000126912C6.86347 -0.0240394 8.37455 1.1415 8.67523 2.69235C8.71569 2.89984 8.72108 3.1139 8.72378 3.32526C8.73007 3.90301 8.72602 4.48038 8.72602 5.0593C9.13458 5.14106 9.46943 5.29225 9.71258 5.57805C9.92653 5.82913 9.9944 6.10836 9.9935 6.41267C9.989 7.7564 9.97102 9.10051 9.99934 10.4435C10.0164 11.2592 9.31032 11.82 8.39118 11.8173C6.42075 11.8115 4.45033 11.8169 2.4799 11.8146C2.08348 11.8142 1.68436 11.8215 1.29108 11.7872C0.554422 11.7224 0.0128249 11.2137 0.00833032 10.5788C-0.00245668 9.15798 -0.00245668 7.73711 0.00653249 6.31663C0.0105776 5.65827 0.416438 5.26256 1.26816 5.05583L1.26726 5.05621ZM7.15562 5.03654C7.15562 4.40325 7.16416 3.78769 7.15382 3.17252C7.13764 2.23608 6.28412 1.44465 5.22519 1.3706C4.0575 1.28922 3.03453 1.91133 2.89206 2.88095C2.79542 3.53893 2.84936 4.21349 2.83767 4.88073C2.83677 4.93009 2.84621 4.97946 2.8516 5.03654H7.15607H7.15562Z"
                          fill="#9B9DA8" />
                      </svg>
                      <input style="padding-right: 42px !important;" type="password" class="form-control"
                        id="confirmPassword2" placeholder="New Password" required>
                      <span style="position: absolute;right: 13px;"><img
                          src="<?php echo base_url()?>/public/profile/assets/eye-slash-svgrepo-com.svg" alt="" id="toggleConfirmPassword2"
                          style="cursor: pointer"></span>
                    </div>
                  </div>
                </div>
                <!--Confirm Password Input -->
                <div class="mb-3 input-group">
                  <div class="form-group mb-0 w-100 ">
                    <div class="input-icon-wrapper">
                      <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="12"
                        viewBox="0 0 10 12" fill="none">
                        <path
                          d="M1.26726 5.05621C1.26726 4.44722 1.26591 3.84979 1.26726 3.25236C1.27266 1.43848 2.84891 0.0268711 4.96091 -0.000126912C6.86347 -0.0240394 8.37455 1.1415 8.67523 2.69235C8.71569 2.89984 8.72108 3.1139 8.72378 3.32526C8.73007 3.90301 8.72602 4.48038 8.72602 5.0593C9.13458 5.14106 9.46943 5.29225 9.71258 5.57805C9.92653 5.82913 9.9944 6.10836 9.9935 6.41267C9.989 7.7564 9.97102 9.10051 9.99934 10.4435C10.0164 11.2592 9.31032 11.82 8.39118 11.8173C6.42075 11.8115 4.45033 11.8169 2.4799 11.8146C2.08348 11.8142 1.68436 11.8215 1.29108 11.7872C0.554422 11.7224 0.0128249 11.2137 0.00833032 10.5788C-0.00245668 9.15798 -0.00245668 7.73711 0.00653249 6.31663C0.0105776 5.65827 0.416438 5.26256 1.26816 5.05583L1.26726 5.05621ZM7.15562 5.03654C7.15562 4.40325 7.16416 3.78769 7.15382 3.17252C7.13764 2.23608 6.28412 1.44465 5.22519 1.3706C4.0575 1.28922 3.03453 1.91133 2.89206 2.88095C2.79542 3.53893 2.84936 4.21349 2.83767 4.88073C2.83677 4.93009 2.84621 4.97946 2.8516 5.03654H7.15607H7.15562Z"
                          fill="#9B9DA8" />
                      </svg>
                      <input style="padding-right: 42px !important;" type="password" class="form-control"
                        id="confirmPassword3" placeholder="Confirm Password" required>
                      <span style="position: absolute;right: 13px;"><img
                          src="<?php echo base_url()?>/public/profile/assets/eye-slash-svgrepo-com.svg" alt="" id="toggleConfirmPassword3"
                          style="cursor: pointer"></span>
                    </div>
                  </div>
                </div>
                <!-- Password Requirements -->
                <p class="mb-4" style="
                text-align: left;
                font-weight: 600;
                display: flex;
                align-items: center;
                font-size: 11px;
              ">
                  <svg style="margin-right: 10px; margin-left: 3px" width="13" height="12" viewBox="0 0 8 7" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M3.99095 4.90715C3.91945 4.90715 3.84956 4.9276 3.79011 4.96593C3.73066 5.00426 3.68432 5.05873 3.65696 5.12247C3.6296 5.1862 3.62244 5.25633 3.63639 5.32399C3.65033 5.39166 3.68477 5.45381 3.73532 5.50259C3.78588 5.55137 3.8503 5.58459 3.92043 5.59804C3.99055 5.6115 4.06324 5.6046 4.1293 5.5782C4.19536 5.5518 4.25182 5.50709 4.29154 5.44973C4.33127 5.39237 4.35247 5.32493 4.35247 5.25595C4.35247 5.16344 4.31438 5.07472 4.24658 5.00931C4.17879 4.94389 4.08683 4.90715 3.99095 4.90715ZM7.84832 5.41988L4.93812 0.536675C4.84406 0.373965 4.70668 0.238436 4.54017 0.144089C4.37365 0.0497427 4.18405 0 3.99095 0C3.79785 0 3.60825 0.0497427 3.44174 0.144089C3.27523 0.238436 3.13785 0.373965 3.04378 0.536675L0.151662 5.41988C0.0543408 5.57824 0.0020465 5.75858 5.8855e-05 5.94267C-0.00192879 6.12677 0.0464606 6.30811 0.140342 6.46839C0.234223 6.62868 0.370272 6.76223 0.534754 6.85556C0.699236 6.94888 0.886328 6.99869 1.07714 6.99995H6.90477C7.09711 7.00178 7.2865 6.95422 7.45351 6.86214C7.62053 6.77007 7.75915 6.6368 7.85518 6.47599C7.95121 6.31518 8.00118 6.13262 7.99998 5.94704C7.99877 5.76145 7.94643 5.57952 7.84832 5.41988ZM7.2229 6.11748C7.19121 6.17188 7.14498 6.21708 7.08903 6.24837C7.03307 6.27965 6.96944 6.29589 6.90477 6.29537H1.07714C1.01247 6.29589 0.948839 6.27965 0.892883 6.24837C0.836928 6.21708 0.790696 6.17188 0.759008 6.11748C0.727278 6.06446 0.710574 6.00431 0.710574 5.94308C0.710574 5.88186 0.727278 5.82171 0.759008 5.76868L3.65113 0.885476C3.68147 0.828342 3.72756 0.780394 3.78433 0.746912C3.8411 0.713431 3.90634 0.695715 3.97288 0.695715C4.03941 0.695715 4.10466 0.713431 4.16143 0.746912C4.2182 0.780394 4.26429 0.828342 4.29463 0.885476L7.20482 5.76868C7.24069 5.82095 7.2613 5.88157 7.26448 5.94418C7.26766 6.00678 7.2533 6.06906 7.2229 6.12446V6.11748ZM3.99095 2.11674C3.89507 2.11674 3.80312 2.15349 3.73532 2.2189C3.66753 2.28432 3.62944 2.37303 3.62944 2.46554V3.86074C3.62944 3.95325 3.66753 4.04197 3.73532 4.10738C3.80312 4.1728 3.89507 4.20955 3.99095 4.20955C4.08683 4.20955 4.17879 4.1728 4.24658 4.10738C4.31438 4.04197 4.35247 3.95325 4.35247 3.86074V2.46554C4.35247 2.37303 4.31438 2.28432 4.24658 2.2189C4.17879 2.15349 4.08683 2.11674 3.99095 2.11674Z"
                      fill="var(--text-color)" />
                  </svg>Use 8 or more characters with a mix of letters,
                  numbers &
                  symbols.
                </p>
                <button type="button" class="btn change-psw" onclick="changePassword()">
                  Change Password
                </button>
                <button type="button" class="btn having-trob">
                  Having Trouble?
                </button>
              </form>
            </div>
            <div class="col-12 col-xl-5 custom-margin">
              <img src="<?php echo base_url()?>/public/profile/assets/security-bg.svg" class="img-fluid" alt="Security" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function toggleSidebar() {
    document.querySelector(".sidebar").classList.toggle("collapsed");
    document.querySelector(".main-content").classList.toggle("expanded");
    document.querySelector(".toggle-btn").classList.toggle("collapsed");
  }
</script>
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
    const passwordField = document.getElementById("confirmPassword");
    const eyeIcon = this;
    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);
    eyeIcon.src = type === "password" ? "<?php echo base_url()?>/public/profile/assets/eye-slash-svgrepo-com.svg" : "<?php echo base_url()?>/public/profile/assets/eye.svg";
  });
  document.getElementById("toggleConfirmPassword2").addEventListener("click", function () {
    const passwordField = document.getElementById("confirmPassword2");
    const eyeIcon = this;
    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);
    eyeIcon.src = type === "password" ? "<?php echo base_url()?>/public/profile/assets/eye-slash-svgrepo-com.svg" : "<?php echo base_url()?>/public/profile/assets/eye.svg";
  });
  document.getElementById("toggleConfirmPassword3").addEventListener("click", function () {
    const passwordField = document.getElementById("confirmPassword3");
    const eyeIcon = this;
    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);
    eyeIcon.src = type === "password" ? "<?php echo base_url()?>/public/profile/assets/eye-slash-svgrepo-com.svg" : "<?php echo base_url()?>/public/profile/assets/eye.svg";
  });
</script>

<script>
  function handleFileChange(event) {
    const file = event.target.files[0]; // Get the selected file
    if (file) {
      const reader = new FileReader();

      // Set the src of the image to the selected file
      reader.onload = function (e) {
        const profileImage = document.getElementById('profilecoverimg');
        profileImage.src = e.target.result;
      };

      reader.readAsDataURL(file); // Read the file as a data URL
    }
  }
  function handleFileChange1(event) {
    const file = event.target.files[0]; // Get the selected file
    if (file) {
      const reader = new FileReader();

      // Set the src of the image to the selected file
      reader.onload = function (e) {
        const profileImage = document.getElementById('profilecoverimg1');
        profileImage.src = e.target.result;
      };

      reader.readAsDataURL(file); // Read the file as a data URL
    }
  }
</script>