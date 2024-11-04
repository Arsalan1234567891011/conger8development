<?php
    
    $urole = get_user_role(session()->user_id);
    
    if($urole == 'churchadmin'){
    
      $att_link = get_att_link();
      //$att_link = get_att_link_church();
    }
    
    if($urole == 'user'){
    
      $att_link = get_sub_user_att_link();
      //$att_link = get_att_link_church();
    
    }
    
    
    if($urole == 'superadmin'){
    
      $att_link = "";
      //$att_link = get_att_link_church();
    
    }

?>
<style>
  .table {
    border: none !important;
  }

  .table th {
    background-color: var(--contact-bg);
    color: var(--contact-name);
    border: none !important;
  }

  .btn-refresh {
    border-radius: 24px;
    background: var(--button-bg);
    border: 1px solid var(--button-border);
    display: flex;
    width: 195px;
    height: 41px;
    padding: 11px 15px;
    justify-content: center;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
    color: var(--button-text);
    font-size: 12px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
  }

  .btn-csv {
    border-radius: 24px;
    background: var(--button-bg);
    border: 1px solid var(--button-border);
    display: flex;
    width: 161px;
    height: 41px;
    padding: 11px 15px;
    justify-content: center;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
    color: var(--button-text);
    font-size: 12px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
  }

  .btn-all:hover {
    color: var(--button-text);
  }

  .btn-refresh:hover {
    color: var(--button-text);
  }

  .table th,
  .table td {
    vertical-align: middle;
    border: none !important;
  }

  .table td label {
    color: var(--contact-name);
    font-weight: bold;
  }

  .table td a {
    color: var(--contact-text);
  }

  .table td.cont {
    color: var(--contact-text);
  }

  .table .btn-link {
    padding: 0;
  }

  .status-active {
    color: #1c9565;
  }

  .status-inactive {
    color: #951c1c;
  }

  /* Custom checkbox styling */
  /* Custom checkbox styling */
  .form-check-input {
    position: absolute;
    left: -9999px;
    /* Hide default checkbox */
  }

  .form-check-label {
    display: inline-block;
    width: 15px;
    height: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    background-color: #fff;
    /* Default background color */
    cursor: pointer;
    position: relative;
  }

  .form-check-label::after {
    content: "\2713";
    /* Unicode checkmark character */
    color: transparent;
    /* Transparent by default */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 12px;
  }

  .form-check-input:checked+.form-check-label {
    background-color: #e61515;
    /* Background color when checkbox is checked */
    border-color: #e61515;
    /* Border color when checkbox is checked */
  }

  .form-check-input:checked+.form-check-label::after {
    color: #fff;
    /* Color of checkmark when checkbox is checked */
  }

  /* delete model */
  /* The Modal (background) */
  .del-modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 48%;
    top: 0;
    overflow: hidden;
  }

  /* Modal Content */
  .del-modal .modal-content {
    margin-top: 35%;
    width: 277px;
    height: 205px;
    flex-shrink: 0;
    border-radius: 8px;
    background: var(--bg-color);
    box-shadow: 0px 10px 25px 0px var(--bg-color);
  }

  .delete-btn {
    width: 114px;
    height: 33px;
    border-radius: 6px;
    background: #FF003D;
    color: #FFF;
    text-align: center;
    border: none;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
  }

  .cancel-btn {
    border: none;
    width: 114px;
    height: 33px;
    border-radius: 6px;
    cursor: pointer;
    background: var(--button-bg);
    color: var(--button-text);
    border: 1px solid var(--button-border);
    text-align: center;
    font-size: 13px;
    font-weight: 600;
  }
</style>

</style>

       <div id="main-content">
          <div id="delete-modal" class="modal del-modal">
            <div class="modal-content">
              <svg style="margin:auto" xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57"
                fill="none">
                <circle cx="28.5" cy="28.5" r="28.5" fill="#FFF8F8" />
                <path
                  d="M21.6233 37.3019C21.6233 38.6812 22.6547 39.8095 23.9154 39.8095H33.0837C34.3444 39.8095 35.3757 38.6812 35.3757 37.3019V22.8452H21.6233V37.3019ZM37.0948 19.0754H32.7972L31.3583 17.1904H25.6409L24.2019 19.0754H19.9043V20.9603H37.0948V19.0754Z"
                  fill="#FF003D" />
              </svg>
              <p style="width: 213px; color: var(--card-text-color);margin: auto;margin-top: 0px;
                text-align: center; 
                font-size: 11px;
                font-weight: 600;">
                Are you sure you want to permanently delete these contacts?</p>
              <div class="button-container m-auto">
                <button id="confirm-delete" class="delete-btn">Delete</button>
                <button id="cancel-delete" class="cancel-btn">Cancel</button>
              </div>
            </div>
          </div>
          <div class="col-xl-12 col-lg-9" id="bg">

            <div class="card-cont" style="
                    background-color: transparent;
                    border: none;
                    color: var(--card-text-color);
                    transition: background-color 0.3s, color 0.3s;
                  ">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0" style="font-weight: bold;">Recent Contacts</h5>
                <div class="d-flex" style="gap: 20px;">
                  <button class="btn btn-refresh btn-sm" id="refresh-contacts"><svg xmlns="http://www.w3.org/2000/svg"
                      width="14" height="13" viewBox="0 0 14 13" fill="none">
                      <path
                        d="M12.6769 0.5C12.2219 0.5 11.8539 0.845072 11.8539 1.26995V3.06524C10.926 2.01406 9.85675 0.5 6.91388 0.5C3.37787 0.5 0.5 3.19141 0.5 6.5C0.5 9.80859 3.37787 12.5 6.91388 12.5C8.26556 12.5013 9.58306 12.1027 10.6779 11.3611C11.7727 10.6195 12.5887 9.57301 13.0092 8.37129C13.0437 8.27347 13.0571 8.17027 13.0489 8.06758C13.0407 7.96489 13.0109 7.86472 12.9613 7.7728C12.9117 7.68087 12.8432 7.59898 12.7598 7.5318C12.6764 7.46463 12.5796 7.41349 12.475 7.3813C12.3705 7.34911 12.2601 7.3365 12.1504 7.3442C12.0406 7.35189 11.9335 7.37973 11.8353 7.42614C11.6368 7.51986 11.4862 7.6835 11.4167 7.88105C11.1063 8.76896 10.5035 9.54225 9.6947 10.0903C8.8859 10.6383 7.91253 10.9329 6.91388 10.932C4.30087 10.932 2.17537 8.94363 2.17537 6.49924C2.17537 4.05485 4.30087 2.07563 6.91388 2.07563C8.76394 2.07563 9.79175 3.15265 10.6302 4.28211H8.56081C8.34252 4.28211 8.13317 4.36323 7.97882 4.50763C7.82446 4.65202 7.73775 4.84786 7.73775 5.05206C7.73775 5.25627 7.82446 5.45211 7.97882 5.5965C8.13317 5.7409 8.34252 5.82201 8.56081 5.82201H12.6769C12.785 5.82226 12.892 5.80257 12.9919 5.76406C13.0917 5.72555 13.1825 5.66898 13.259 5.5976C13.3354 5.52621 13.3961 5.44141 13.4374 5.34806C13.4788 5.25471 13.5001 5.15464 13.5 5.05358V1.26995C13.4999 1.06578 13.4131 0.869997 13.2588 0.725625C13.1045 0.581253 12.8952 0.500101 12.6769 0.5Z"
                        fill="#424657" />
                    </svg>
                    Refresh Contacts
                  </button>
                  <button class="btn btn-csv btn-sm" id="export-csv">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="21" viewBox="0 0 19 21" fill="none">
                      <g clip-path="url(#clip0_249_4385)">
                        <path
                          d="M14.8098 10.1151C14.8098 9.4101 14.8098 8.75221 14.8098 8.09433C14.8098 7.70782 14.7907 7.32056 14.816 6.93555C14.8359 6.62904 14.7116 6.56101 14.4186 6.564C13.0637 6.57745 11.708 6.57596 10.3531 6.564C10.09 6.56175 9.80915 6.53185 9.56825 6.43765C9.08567 6.24851 8.90308 5.83584 8.90077 5.35588C8.89234 3.76125 8.88697 2.16588 8.90921 0.571258C8.91152 0.397068 9.06036 0.166808 9.21303 0.0748537C9.3051 0.0195316 9.57822 0.137652 9.69561 0.251287C11.6129 2.10084 13.5225 3.95787 15.4167 5.82911C15.5571 5.96816 15.6338 6.22533 15.6369 6.42943C15.6568 7.63754 15.6469 8.84566 15.6469 10.1151C16.1716 10.1151 16.6772 10.0994 17.1813 10.1211C17.4698 10.1338 17.7751 10.1607 18.039 10.2646C18.6398 10.5016 18.972 10.9801 18.9796 11.6028C19.0019 13.3597 19.0165 15.1173 18.9758 16.8734C18.9543 17.7989 18.3183 18.3386 17.3248 18.3962C16.9296 18.4194 16.5322 18.4052 16.1363 18.4052C12.8634 18.4052 9.58973 18.4134 6.31681 18.3955C5.92016 18.3932 5.48822 18.3252 5.13607 18.1607C4.60439 17.9118 4.35505 17.4154 4.35198 16.8382C4.34277 15.106 4.32666 13.3739 4.35428 11.6424C4.36886 10.7124 5.05091 10.1203 6.03447 10.1181C8.78339 10.1121 11.5323 10.1158 14.2812 10.1158C14.4331 10.1158 14.585 10.1158 14.8106 10.1158L14.8098 10.1151ZM12.0671 12.0222C12.0671 12.0222 12.0671 12.0244 12.0671 12.0259C11.8239 12.0259 11.5806 12.0132 11.3382 12.0282C10.7881 12.0626 10.3401 12.4147 10.1805 12.9201C10.0094 13.4598 10.1575 13.9353 10.5994 14.2986C10.9362 14.5752 11.3328 14.6201 11.751 14.6156C12.1959 14.6111 12.4883 14.8459 12.4913 15.1928C12.4944 15.5299 12.2358 15.7437 11.7755 15.7587C11.3796 15.7721 10.983 15.7662 10.5863 15.7647C10.3309 15.7639 10.1199 15.811 10.1237 16.1243C10.1275 16.4173 10.3416 16.4644 10.571 16.4682C11.0183 16.4764 11.4663 16.4786 11.9136 16.4682C12.5113 16.454 13.0598 16.0166 13.1642 15.4866C13.2931 14.8317 13.0184 14.2471 12.4016 14.019C12.1031 13.9084 11.7563 13.9121 11.4303 13.883C10.9661 13.8411 10.6684 13.4254 10.9162 13.0778C11.0398 12.9044 11.3183 12.7728 11.5431 12.7444C11.9581 12.6913 12.3847 12.7272 12.8067 12.7264C13.0506 12.7264 13.191 12.6315 13.1872 12.3698C13.1834 12.1089 13.0383 12.02 12.7959 12.0222C12.5527 12.0237 12.3103 12.0222 12.0671 12.0222ZM7.04949 14.2627H7.05563C7.05563 13.9517 7.04719 13.64 7.05793 13.3297C7.06867 13.0374 7.22979 12.8341 7.51672 12.7519C8.15428 12.5694 8.52407 12.7803 8.75194 13.3851C8.79567 13.5009 9.00205 13.6191 9.13631 13.6221C9.22914 13.6243 9.39102 13.4404 9.4102 13.3223C9.47081 12.9537 9.29589 12.6509 9.03734 12.3855C8.68135 12.02 8.22486 12.0132 7.75916 12.0215C6.85539 12.0372 6.34059 12.5328 6.32755 13.418C6.31987 13.9405 6.33599 14.4639 6.32294 14.9864C6.3076 15.5688 6.47715 16.0689 7.04949 16.3119C7.67247 16.5766 8.31846 16.5953 8.91075 16.202C9.27287 15.9613 9.47005 15.6114 9.40867 15.1801C9.39256 15.0657 9.22684 14.8982 9.11713 14.8885C8.99975 14.8788 8.86318 15.0201 8.7458 15.1083C8.71511 15.1315 8.72508 15.2025 8.71127 15.2503C8.59312 15.654 8.25018 15.8178 7.65712 15.7535C7.23439 15.7079 7.07021 15.5344 7.05026 15.0844C7.03798 14.8107 7.04796 14.5371 7.04796 14.2627H7.04949ZM15.4597 14.8526C15.3615 14.6029 15.297 14.4579 15.2479 14.3084C15.03 13.646 14.8244 12.9791 14.5981 12.319C14.4976 12.0267 14.2375 11.9183 14.048 12.1097C13.9421 12.2158 13.9099 12.4723 13.9575 12.6292C14.3004 13.7611 14.6618 14.8877 15.0446 16.0069C15.1021 16.1744 15.284 16.3777 15.4459 16.4166C15.7044 16.4786 15.788 16.2259 15.8548 16.0174C16.0381 15.4484 16.2246 14.881 16.4087 14.3121C16.6005 13.72 16.7954 13.1279 16.9787 12.5336C17.044 12.3227 17.0156 12.1366 16.7563 12.0573C16.5299 11.9878 16.3842 12.0611 16.3082 12.2756C16.2668 12.393 16.2261 12.5111 16.187 12.6292C15.9553 13.3365 15.7236 14.0445 15.4589 14.8526H15.4597Z"
                          fill="#424657" />
                        <path
                          d="M0.834311 10.5053C0.834311 13.5458 0.834311 16.587 0.834311 19.6275C0.834311 20.1321 0.914101 20.2136 1.4335 20.2136C5.69153 20.2151 9.94956 20.2151 14.2076 20.2136C14.7377 20.2136 14.816 20.1306 14.8413 19.6028C14.8474 19.4817 14.8436 19.3284 14.915 19.2492C14.9932 19.1617 15.1735 19.0787 15.2694 19.1101C15.4014 19.1527 15.5548 19.2851 15.5985 19.4121C15.8226 20.0655 15.3914 20.7773 14.694 20.9268C14.4723 20.9746 14.2398 20.9956 14.0119 20.9956C9.89432 20.9993 5.77746 20.9985 1.65983 20.9985C1.54475 20.9985 1.42967 21.0008 1.31459 20.9933C0.464515 20.938 0.0310405 20.5193 0.011093 19.6858C-0.00885448 18.8514 0.00418812 18.0156 0.00418812 17.1813C0.00418812 11.9721 0.00418812 6.7628 0.00572255 1.55355C0.00572255 1.35469 0.0118602 1.15358 0.0448504 0.957713C0.128476 0.465795 0.507479 0.1062 1.01307 0.0336834C1.18953 0.0082651 1.36983 0.00153673 1.54782 0.00153673C3.49193 4.15331e-05 5.43528 4.15331e-05 7.37863 4.15331e-05C7.50599 4.15331e-05 7.63488 -0.00145366 7.76147 0.0134983C8.01158 0.0426546 8.15888 0.169746 8.14737 0.4329C8.1351 0.708016 7.96401 0.787261 7.71006 0.785766C7.03262 0.782028 6.3544 0.784271 5.67695 0.784271C4.27065 0.784271 2.86359 0.782776 1.45729 0.785018C0.899524 0.785766 0.834311 0.850059 0.834311 1.38235C0.834311 4.42283 0.834311 7.46405 0.834311 10.5045V10.5053Z"
                          fill="#424657" />
                        <path
                          d="M15.6584 19.4712C15.6584 19.2527 15.4767 19.0757 15.2525 19.0757C15.0284 19.0757 14.8467 19.2527 14.8467 19.4712V19.7717C14.8467 19.9901 15.0284 20.1672 15.2525 20.1672C15.4767 20.1672 15.6584 19.9901 15.6584 19.7717V19.4712Z"
                          fill="#424657" />
                        <path
                          d="M8.2998 0.393236V0.392488C8.2998 0.175723 8.11947 0 7.89702 0L7.5909 0C7.36845 0 7.18811 0.175723 7.18811 0.392488V0.393236C7.18811 0.610002 7.36845 0.785725 7.5909 0.785725H7.89702C8.11947 0.785725 8.2998 0.610002 8.2998 0.393236Z"
                          fill="#424657" />
                        <path d="M18.3629 11.0144H5.09473V17.4026H18.3629V11.0144Z" fill="#424657" />
                        <path
                          d="M7.99609 16.4247C7.60788 16.4247 7.27568 16.3417 6.99872 16.1765C6.72175 16.0113 6.50924 15.7803 6.36116 15.4842C6.21309 15.1882 6.13867 14.845 6.13867 14.4548C6.13867 14.0645 6.21309 13.7214 6.36116 13.4253C6.50924 13.1293 6.72175 12.899 6.99872 12.7331C7.27568 12.5678 7.60788 12.4849 7.99609 12.4849C8.44338 12.4849 8.81624 12.594 9.11469 12.8116C9.41313 13.0299 9.62258 13.3237 9.74303 13.693L9.08783 13.8687C9.01265 13.622 8.88376 13.4291 8.70269 13.2893C8.52086 13.1502 8.2861 13.0807 7.99686 13.0807C7.73601 13.0807 7.51965 13.1375 7.34626 13.2512C7.17287 13.3648 7.04245 13.5248 6.95575 13.7304C6.86829 13.9359 6.82379 14.1774 6.82226 14.454C6.82226 14.7306 6.86599 14.9721 6.95268 15.1777C7.04015 15.3833 7.17057 15.5433 7.34473 15.6569C7.51889 15.7706 7.73677 15.8274 7.99686 15.8274C8.2861 15.8274 8.52163 15.7571 8.70269 15.6173C8.88452 15.4775 9.01265 15.2846 9.08783 15.0394L9.74303 15.2151C9.62258 15.5844 9.41313 15.8782 9.11469 16.0965C8.81624 16.3148 8.44338 16.4232 7.99609 16.4232V16.4247Z"
                          fill="white" />
                        <path
                          d="M11.9347 16.4248C11.6508 16.4248 11.3953 16.377 11.1682 16.2805C10.9411 16.1841 10.7539 16.0465 10.6074 15.8671C10.4609 15.6877 10.368 15.4746 10.3281 15.2279L11.0017 15.1285C11.0593 15.3528 11.1774 15.5262 11.3562 15.6488C11.5349 15.7714 11.7413 15.8327 11.9746 15.8327C12.1127 15.8327 12.2431 15.8118 12.3651 15.7699C12.4871 15.7281 12.5868 15.6668 12.6628 15.586C12.7387 15.5053 12.7771 15.4066 12.7771 15.2892C12.7771 15.2369 12.7679 15.1883 12.7502 15.1434C12.7326 15.0986 12.7057 15.059 12.6704 15.0238C12.6351 14.9887 12.5906 14.9565 12.5354 14.9281C12.4809 14.899 12.4172 14.8743 12.3451 14.8534L11.3424 14.5648C11.2565 14.5401 11.1629 14.5072 11.0631 14.4661C10.9634 14.425 10.869 14.3682 10.78 14.2957C10.691 14.2231 10.6181 14.1304 10.5614 14.0176C10.5046 13.9047 10.4762 13.7649 10.4762 13.5989C10.4762 13.3552 10.5399 13.1511 10.6665 12.9859C10.7931 12.8207 10.9641 12.6966 11.1782 12.6143C11.393 12.5321 11.6316 12.4917 11.894 12.4932C12.1602 12.4947 12.3973 12.5388 12.6052 12.6255C12.8139 12.7123 12.988 12.8378 13.1284 13.0023C13.2688 13.1668 13.3671 13.3656 13.4246 13.5982L12.7264 13.7163C12.698 13.5832 12.6428 13.4696 12.5607 13.3761C12.4786 13.2827 12.3789 13.2109 12.2615 13.1623C12.1441 13.113 12.0183 13.0868 11.8856 13.0838C11.7559 13.0823 11.6362 13.101 11.5257 13.1399C11.4153 13.1795 11.3263 13.2356 11.2588 13.3096C11.1912 13.3828 11.1575 13.4688 11.1575 13.5668C11.1575 13.6595 11.1859 13.735 11.2434 13.794C11.3009 13.8523 11.3723 13.8994 11.4575 13.9331C11.5426 13.9675 11.6293 13.9959 11.7175 14.0183L12.4126 14.2074C12.5078 14.2321 12.6144 14.265 12.7333 14.3069C12.8523 14.3487 12.9658 14.4078 13.0755 14.4826C13.1852 14.5573 13.2758 14.6568 13.3463 14.7794C13.4177 14.902 13.453 15.0575 13.453 15.2466C13.453 15.4357 13.4115 15.6144 13.3279 15.7624C13.2443 15.9105 13.1315 16.0331 12.9896 16.1318C12.8476 16.2297 12.6858 16.3037 12.5032 16.3523C12.3206 16.4016 12.1295 16.4256 11.9301 16.4256L11.9347 16.4248Z"
                          fill="white" />
                        <path
                          d="M14.8077 16.3456L13.584 12.5635H14.2522L15.2765 15.731L16.3145 12.5635H16.9827L15.759 16.3456H14.8077Z"
                          fill="white" />
                      </g>
                      <defs>
                        <clipPath id="clip0_249_4385">
                          <rect width="19" height="21" fill="white" />
                        </clipPath>
                      </defs>
                    </svg>
                    Export CSV
                  </button>
                </div>
              </div>
              <div class="table-responsive">
                <div class="row mb-3 mt-3">
                    <div class="col-3">
                        <select class="form-control" id="status">
                          <option value="">Select Status</option> 
                          <option value="active">Active</option> 
                        </select>
                    </div>
                    <div class="col-3">
                        <select class="form-control" id="type">
                          <option value="">Select Type</option> 
                          <option value="Member">Member</option> 
                          <option value="Visitor">Visitor</option>
                          <option value="Non-member">Non-member</option>
                        </select>
                    </div>
                </div>  
                <table id="contact-data" class="table text-nowrap">
                  <thead>
                    <tr>
                      <th scope="col">
                        <div class="form-check">
                          <input class="form-check-input cont-checkbox" type="checkbox" id="select-all">
                          <label class="form-check-label" for="select-all"></label>
                        </div>
                      </th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Status</th>
                      <th scope="col">Type</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="contacts-table-body2">
                    <!-- Rows will be inserted here by JavaScript -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

</body>
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
  document
  .getElementById("refresh-contacts")
  .addEventListener("click", loadContacts);

document.getElementById("select-all").addEventListener("change", function () {
  const checkboxes = document.querySelectorAll(
    '#contacts-table-body2 input[type="checkbox"]'
  );
  checkboxes.forEach((checkbox) => (checkbox.checked = this.checked));
  updateDeleteIcons();
});

function loadContacts() {
 load_contacts_table(status,type);
  }
  
  function isChecked(contactId) {
    const checkbox = document.querySelector(`#contacts-table-body2 input[type="checkbox"][data-id="${contactId}"]`);
    return checkbox && checkbox.checked;
  }
  
  function updateDeleteIcons() {
    const checkboxes = document.querySelectorAll('#contacts-table-body2 input[type="checkbox"]');
    checkboxes.forEach((checkbox) => {
      const contactId = checkbox.getAttribute("data-id");
      const deleteIcon = document.getElementById(`delete-icon-${contactId}`);
      if (checkbox.checked) {
        deleteIcon.setAttribute("fill", "red");
      } else {
        deleteIcon.setAttribute("fill", "#9F9DA8");
      }
    });
  }
  
  document.getElementById("contacts-table-body2").addEventListener("click", function (event) {
    if (event.target.classList.contains("delete-contact")) {
      const contactId = event.target.getAttribute("data-id");
      if (isChecked(contactId)) {
        showModal(contactId);
      } else {
        alert("Please select the checkbox to delete the contact.");
      }
    }
  });
  
  let contactToDelete = null;

  function showModal(contactId) {
    contactToDelete = contactId;
    const modal = document.getElementById("delete-modal");
    modal.style.display = "block";
    document.getElementById("bg").classList.add("blur"); // Add blur class to main-content
  }
  
  document.getElementById("cancel-delete").addEventListener("click", function () {
    contactToDelete = null;
    closeModal();
  });
  
  window.addEventListener("click", function (event) {
    const modal = document.getElementById("delete-modal");
    if (event.target == modal) {
      contactToDelete = null;
      closeModal();
    }
  });
  
  function closeModal() {
    const modal = document.getElementById("delete-modal");
    modal.style.display = "none";
    document.getElementById("bg").classList.remove("blur"); // Remove blur class from main-content
  }
  
  function deleteContact(contactId) {
    const checkbox = document.querySelector(`#contacts-table-body2 input[type="checkbox"][data-id="${contactId}"]`);
    if (checkbox && checkbox.checked) {
      const index = contacts2.findIndex((contact) => contact.id == contactId);
      if (index > -1) {
        contacts2.splice(index, 1);
        loadContacts();
      } else {
        console.error("Error deleting contact: Contact not found");
      }
    } else {
      alert("Please select the checkbox to delete the contact.");
    }
  }
  
  // Initial load
  loadContacts();

  // export csv
  document.getElementById("export-csv").addEventListener("click", function () {
    // Select all table rows in the tbody
    const rows = document.querySelectorAll("#contacts-table-body2 tr");
  
    // Prepare CSV content with header
    let csvContent = "data:text/csv;charset=utf-8,";
    csvContent += "Name,Email,Phone,Status\n"; // Header line
  
    // Iterate over each row and extract cell data, skipping the checkbox cell
    rows.forEach((row) => {
      const rowData = [];
      const cells = row.querySelectorAll("td");
      cells.forEach((cell, index) => {
        if (index > 0) { // Skip the first cell (checkbox)
          // Replace commas and trim whitespace
          rowData.push(cell.textContent.trim().replace(/,/g, ""));
        }
      });
      csvContent += rowData.join(",") + "\n"; // Join cell data with commas
    });
  
    // Create a download link and trigger click
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "Contacts.csv");
    document.body.appendChild(link); // Required for Firefox
    link.click();
  
    // Clean up
    document.body.removeChild(link);
  });
  
</script>
<script src="<?php echo base_url(); ?>/public/Dashboard/index.js"></script>
<script src="<?php echo base_url(); ?>/app-assets/js/core/app-menu.js"></script>
<script src="<?php echo base_url(); ?>/app-assets/js/core/app.js"></script>
<script src="<?php echo base_url(); ?>/app-assets/vendors/js/extensions/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>/app-assets/js/scripts/pages/users-contacts.js"></script>
<!-- DataTables JS CDN -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var baseUrl = "<?php echo base_url() ?>"; 
</script>
<script>
    $(document).ready(function(){
        var status = "";
        var type = "" ;
        
        load_contacts_table(status,type);
        
        
        function load_contacts_table(status,type){
        
        
        
        if ( $.fn.dataTable.isDataTable( '#contact-data' ) ) {
          $( '#contact-data' ).DataTable().destroy();
        }
        
        
          var dataTable = $('#contact-data').DataTable({
        
           'processing': true,
        
           'serverSide': true,
        
           'serverMethod': 'POST',
        
           dom: 'Blfrtip',
           buttons: [
                 'copyHtml5',
                 'excelHtml5',
                 'csvHtml5',
                 'pdfHtml5'
           ],
        

        
           //'searching': false, // Remove default Search Control
        
           'ajax': {
        
              'url':'getcontacts',
        
              'data': function(data){
                data.searchByStatus = status;
                data.searchByType = type;
        
             }
        
           },
        
           'columns': [
              { data: 'id' }, 
        
              { data: 'name' }, 
        
              { data: 'email' },
        
              { data: 'phone' },
        
              { data: 'status' },
        
              { data: 'form_type' },
        
              { data: 'action' },
        
        
           ],
        
           
        
         });
        
          if(status != ""){
            dataTable.draw();
          }
        
          if(type != ""){
            dataTable.draw();
          }
        
        }
        $(document).on('click', '#confirm-delete', function(e) {
         
            var checkedIds = [];
            $('.cont-checkbox:checked').each(function() {
                var dataId = $(this).data('id');  
                checkedIds.push(dataId);  
            });
             $.ajax({
                url: baseUrl + "/contact-delete",
                type: "POST",
                data: {delid : checkedIds},
                dataType: "html",
                 error: function() {
                    alert('Something is wrong');
                 },
                 success: function(data) {
                       $('.cont-checkbox').prop('checked', false);
                      contactToDelete = null;
                      closeModal();
                      swal("Deleted!", "Contact Deleted Successfully.", "success");
                      load_contacts_table(status,type);
                 }
              });

        });

        
        $('#status').on('change', function() {
              load_contacts_table($(this).val(),$("#type").val());
        });
        
        $('#type').on('change', function() {
              load_contacts_table($("#status").val(),$(this).val());
        });
        
        $('#refresh-contacts').on('click', function() {
              load_contacts_table($("#status").val(),$("#type").val());
        });
        
    });

</script>

</html>