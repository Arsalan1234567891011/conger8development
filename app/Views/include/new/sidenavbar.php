<!-- mode ends here -->
<div class="container-fluid">
  <div class="row">
    <div class="responsive-header">
      <svg id="sidebartoggle" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 226 170"
        fill="none">
        <path fill-rule="evenodd" clip-rule="evenodd"
          d="M0 10.625C0 7.80707 1.11612 5.10456 3.10284 3.11199C5.08955 1.11942 7.78411 0 10.5938 0H215.406C218.216 0 220.91 1.11942 222.897 3.11199C224.884 5.10456 226 7.80707 226 10.625C226 13.4429 224.884 16.1454 222.897 18.138C220.91 20.1306 218.216 21.25 215.406 21.25H10.5938C7.78411 21.25 5.08955 20.1306 3.10284 18.138C1.11612 16.1454 0 13.4429 0 10.625ZM0 159.375C0 156.557 1.11612 153.855 3.10284 151.862C5.08955 149.869 7.78411 148.75 10.5938 148.75H215.406C218.216 148.75 220.91 149.869 222.897 151.862C224.884 153.855 226 156.557 226 159.375C226 162.193 224.884 164.895 222.897 166.888C220.91 168.881 218.216 170 215.406 170H10.5938C7.78411 170 5.08955 168.881 3.10284 166.888C1.11612 164.895 0 162.193 0 159.375ZM0 85C0 82.1821 1.11612 79.4796 3.10284 77.487C5.08955 75.4944 7.78411 74.375 10.5938 74.375H116.531C119.341 74.375 122.035 75.4944 124.022 77.487C126.009 79.4796 127.125 82.1821 127.125 85C127.125 87.8179 126.009 90.5204 124.022 92.513C122.035 94.5056 119.341 95.625 116.531 95.625H10.5938C7.78411 95.625 5.08955 94.5056 3.10284 92.513C1.11612 90.5204 0 87.8179 0 85Z"
          fill="black" />
      </svg>
      <div class="slogomain1"></div>

      <svg id="headerToggle" xmlns="http://www.w3.org/2000/svg" width="7" height="28" viewBox="0 0 7 28" fill="none">
        <path
          d="M3.5 27.5C4.29565 27.5 5.05871 27.1839 5.62132 26.6213C6.18393 26.0587 6.5 25.2956 6.5 24.5C6.5 23.7044 6.18393 22.9413 5.62132 22.3787C5.05871 21.8161 4.29565 21.5 3.5 21.5C2.70435 21.5 1.94129 21.8161 1.37868 22.3787C0.816071 22.9413 0.5 23.7044 0.5 24.5C0.5 25.2956 0.816071 26.0587 1.37868 26.6213C1.94129 27.1839 2.70435 27.5 3.5 27.5ZM6.5 14C6.5 14.7956 6.18393 15.5587 5.62132 16.1213C5.05871 16.6839 4.29565 17 3.5 17C2.70435 17 1.94129 16.6839 1.37868 16.1213C0.816071 15.5587 0.5 14.7956 0.5 14C0.5 13.2044 0.816071 12.4413 1.37868 11.8787C1.94129 11.3161 2.70435 11 3.5 11C4.29565 11 5.05871 11.3161 5.62132 11.8787C6.18393 12.4413 6.5 13.2044 6.5 14ZM6.5 3.5C6.5 4.29565 6.18393 5.05871 5.62132 5.62132C5.05871 6.18393 4.29565 6.5 3.5 6.5C2.70435 6.5 1.94129 6.18393 1.37868 5.62132C0.816071 5.05871 0.5 4.29565 0.5 3.5C0.5 2.70435 0.816071 1.94129 1.37868 1.37868C1.94129 0.816071 2.70435 0.5 3.5 0.5C4.29565 0.5 5.05871 0.816071 5.62132 1.37868C6.18393 1.94129 6.5 2.70435 6.5 3.5Z"
          fill="black" />
      </svg>
    </div>
    <div class="sidebar-wrapper">
      <nav class="col-xl-2 col-lg-3 col-md-3 d-none d-md-block sidebar" id="mySidebar">
        <button class="toggle-btn" onclick="toggleNav()">
          <svg xmlns="http://www.w3.org/2000/svg" width="8" height="34" viewBox="0 0 4 24" fill="none">
            <path d="M2 2V22" class="sidebarclosingbtn" stroke-width="4" stroke-linecap="round" />
          </svg>
        </button>
        <div class="sidebar-sticky">
          <div class="text-center">
            <div class="slogomain"></div>
            <h6 class="logohead">Congreg8</h6>
            <div class="slogo"></div>
          </div>
            <ul class="nav w-100 links-scroll" style="padding: 0px 20px 20px;margin-top: 35px;">
                <?php
                $data = gettingmenuzero();
                foreach ($data as $row) {
                    $childItems = gettingchildnew($row['menu_id']);
                    
                    if (empty($childItems)) {
                       echo '<li class="nav-item sidebar-item  d-flex align-items-center w-100" data-id="' . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . '">';
						echo '<a class="iconlink" href="#">' . $row['icon'] . '</a>';
						echo '<a class="nav-link" href="' . base_url() . htmlspecialchars($row['url'], ENT_QUOTES, 'UTF-8') . '">';
					    echo '<span>' . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . '</span>';
						echo '</a>';
					    echo '</li>';

                    } else {
                        // Use # in the data-target to reference the id of the submenu
                        echo '<li class="nav-item sidebar-item w-100 d-block" data-toggle="collapse" data-target="#submenu_' . $row['menu_id'] . '" aria-expanded="false" aria-controls="submenu_' . $row['menu_id'] . '">';
                        echo '<div class="d-flex justify-content-between w-100 align-items-center closed-pos ">';
                        echo '<div class="d-flex align-items-center">';
                        echo '<a class="iconlink" href="#">
							  ' . $row['icon'] . '
							</a>';
                        echo '<a class="nav-link" href="#">' . $row['title'] . '</a>';
                        echo '</div>';
                        echo '<span style="color: #000;" class="ml-auto rotate-icon">&#9662;</span>';
                        echo '</div>';
                        // Add the id here with submenu_ prefix
                        echo '<ul class="collapse list-unstyled" id="submenu_' . $row['menu_id'] . '">';
                        echo $childItems;
                        echo '</ul>';
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        </div>
      </nav>
    </div>
    <main role="main" id="main" style="border: none" class="col-lg-9 col-md-9 ml-sm-auto col-xl-10 px-5">
      <div class="sticky-top">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 py-3">
          <div class="d-block">
            <button class="btn btn-light" id="dateFilter">
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="14" viewBox="0 0 23 14" fill="none">
                <path
                  d="M9.05556 12.8333C9.05556 13.4777 9.57789 14 10.2222 14H12.7778C13.4221 14 13.9444 13.4777 13.9444 12.8333C13.9444 12.189 13.4221 11.6667 12.7778 11.6667H10.2222C9.57789 11.6667 9.05556 12.189 9.05556 12.8333ZM1.66667 0C1.02233 0 0.5 0.522335 0.5 1.16667C0.5 1.811 1.02233 2.33333 1.66667 2.33333H21.3333C21.9777 2.33333 22.5 1.811 22.5 1.16667C22.5 0.522335 21.9777 0 21.3333 0H1.66667ZM4.16667 7C4.16667 7.64433 4.689 8.16667 5.33333 8.16667H17.6667C18.311 8.16667 18.8333 7.64433 18.8333 7C18.8333 6.35567 18.311 5.83333 17.6667 5.83333H5.33333C4.689 5.83333 4.16667 6.35567 4.16667 7Z"
                  fill="var(--button-text)" />
              </svg>
              Date Filter
            </button>
          </div>
          <div class="d-flex align-items-center">
            <button type="button" class="btn upgrade-btn " data-toggle="modal" data-target="#pricingModal">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                <path
                  d="M9.41902 5.71583C9.75762 4.88648 10.932 4.88648 11.2706 5.71583L13.1851 10.405C13.2867 10.6538 13.4841 10.8512 13.7329 10.9528L18.4221 12.8673C19.2514 13.2059 19.2514 14.3803 18.4221 14.7189L13.7329 16.6334C13.4841 16.7349 13.2867 16.9324 13.1851 17.1812L11.2706 21.8703C10.932 22.6997 9.75762 22.6997 9.41902 21.8703L7.50454 17.1812C7.40296 16.9324 7.20552 16.7349 6.95672 16.6334L2.26759 14.7189C1.43824 14.3803 1.43824 13.2059 2.26759 12.8673L6.95672 10.9528C7.20552 10.8512 7.40296 10.6538 7.50454 10.405L9.41902 5.71583Z"
                  fill="url(#paint0_linear_211_785)" />
                <path
                  d="M17.6228 2.01786C17.9771 1.23334 19.0911 1.23334 19.4455 2.01786L20.122 3.5158C20.2222 3.73766 20.3999 3.91535 20.6218 4.01555L22.1197 4.69209C22.9042 5.04641 22.9042 6.16048 22.1197 6.51481L20.6218 7.19135C20.3999 7.29155 20.2222 7.46924 20.122 7.69109L19.4455 9.18904C19.0911 9.97355 17.9771 9.97355 17.6228 9.18904L16.9462 7.69109C16.846 7.46924 16.6683 7.29155 16.4465 7.19135L14.9485 6.51481C14.164 6.16048 14.164 5.04641 14.9485 4.69209L16.4465 4.01555C16.6683 3.91535 16.846 3.73766 16.9462 3.5158L17.6228 2.01786Z"
                  fill="url(#paint1_linear_211_785)" />
                <path
                  d="M18.0815 18.2123C18.261 17.8276 18.8081 17.8276 18.9877 18.2123L19.6921 19.7216C19.7418 19.8281 19.8273 19.9136 19.9337 19.9633L21.4431 20.6677C21.8278 20.8472 21.8278 21.3943 21.4431 21.5739L19.9337 22.2783C19.8273 22.3279 19.7418 22.4135 19.6921 22.5199L18.9877 24.0293C18.8081 24.414 18.2611 24.414 18.0815 24.0293L17.3771 22.5199C17.3274 22.4135 17.2419 22.3279 17.1355 22.2783L15.6261 21.5739C15.2414 21.3943 15.2414 20.8472 15.6261 20.6677L17.1355 19.9633C17.2419 19.9136 17.3274 19.8281 17.3771 19.7216L18.0815 18.2123Z"
                  fill="url(#paint2_linear_211_785)" />
                <defs>
                  <linearGradient id="paint0_linear_211_785" x1="3.44828" y1="8.18962" x2="13.7931" y2="21.1207"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FF003D" />
                    <stop offset="0.56" stop-color="#FFB169" />
                    <stop offset="1" stop-color="#FF003D" />
                  </linearGradient>
                  <linearGradient id="paint1_linear_211_785" x1="15.7324" y1="2.40148" x2="22.5366" y2="11.2069"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FF003D" />
                    <stop offset="0.56" stop-color="#FFB169" />
                    <stop offset="1" stop-color="#FF003D" />
                  </linearGradient>
                  <linearGradient id="paint2_linear_211_785" x1="17.2415" y1="18.5346" x2="22.8449" y2="25.0001"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FF003D" />
                    <stop offset="0.56" stop-color="#FFB169" />
                    <stop offset="1" stop-color="#FF003D" />
                  </linearGradient>
                </defs>
              </svg>
              Upgrade Plan
            </button>

            <!-------------------------- Notification Pannel Starts ---------------------->

            <div style="cursor: pointer;" class="position-relative mr-3" id="notification-icon">
              <svg width="24" height="28" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M12 27.75C12.663 27.75 13.2989 27.4866 13.7677 27.0178C14.2366 26.5489 14.5 25.913 14.5 25.25H9.49998C9.49998 25.913 9.76337 26.5489 10.2322 27.0178C10.7011 27.4866 11.3369 27.75 12 27.75ZM1.99998 22.75H22C22.2472 22.7499 22.4888 22.6766 22.6943 22.5393C22.8998 22.4019 23.06 22.2067 23.1546 21.9783C23.2492 21.7499 23.2739 21.4987 23.2257 21.2562C23.1775 21.0138 23.0585 20.7911 22.8837 20.6163L20.75 18.4825V11.5C20.746 9.39813 19.9861 7.3678 18.6092 5.77974C17.2322 4.19168 15.3301 3.15181 13.25 2.85V1.5C13.25 1.16848 13.1183 0.850537 12.8839 0.616116C12.6494 0.381696 12.3315 0.25 12 0.25C11.6685 0.25 11.3505 0.381696 11.1161 0.616116C10.8817 0.850537 10.75 1.16848 10.75 1.5V2.85C8.66988 3.15181 6.76771 4.19168 5.39078 5.77974C4.01384 7.3678 3.254 9.39813 3.24998 11.5V18.4825L1.11623 20.6163C0.941466 20.7911 0.822458 21.0138 0.774248 21.2562C0.726039 21.4987 0.750793 21.7499 0.84538 21.9783C0.939968 22.2067 1.10014 22.4019 1.30565 22.5393C1.51117 22.6766 1.75279 22.7499 1.99998 22.75ZM5.38373 19.8838C5.61816 19.6494 5.74991 19.3315 5.74998 19V11.5C5.74998 9.8424 6.40846 8.25269 7.58056 7.08058C8.75266 5.90848 10.3424 5.25 12 5.25C13.6576 5.25 15.2473 5.90848 16.4194 7.08058C17.5915 8.25269 18.25 9.8424 18.25 11.5V19C18.25 19.3315 18.3818 19.6494 18.6162 19.8838L18.9825 20.25H5.01748L5.38373 19.8838Z"
                  fill="var(--button-text)" />
              </svg>
              <span class="badge badge-pill badge-danger position-absolute" style="top: 2px; right: -5px">1</span>
            </div>
            <div class="notification-card card" id="notification-card">
              <div class="notification-header card-header">
                <span style="font-weight: 700;">Notifications</span>
                <span class="float-right">Mark all as read</span>
              </div>
              <div class="notification-item">
                <img src="<?php echo base_url(); ?>/public/Dashboard/assets/notif1.svg" alt="AlphaMan01">
                <div>
                  <strong>AlphaMan01</strong> joined as a new member
                  <div class="text-muted">1 hour ago</div>
                </div>
              </div>
              <div class="notification-item">
                <img src="<?php echo base_url(); ?>/public/Dashboard/assets/notif2.svg" alt="Beta_Girl">
                <div>
                  <strong>Beta_Girl</strong> joined as a new member
                  <div class="text-muted">3 hours ago</div>
                </div>
              </div>
              <div class="notification-item">
                <img src="<?php echo base_url(); ?>/public/Dashboard/assets/notif3.svg" alt="Pastor James C. Stephen">
                <div>
                  <strong>Pastor James C. Stephen</strong> invited you to a meeting
                  <div class="text-muted">7 hours ago</div>
                </div>
              </div>
            </div>

            <!-------------------------- Notification Pannel Ends ---------------------->

            <div class="dropdown profile-dropdown">
                <img src="<?php echo base_url(get_user_image(session()->user_id)); ?>" alt="User Profile" class="rounded-circle" width="40"
                  height="40" id="profileImage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
                <div class="dropdown-icon">
                  <img src="<?php echo base_url(); ?>/public/Dashboard/assets/dropdown-ico.svg" alt="Dropdown Icon" />
                </div>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileImage">
                  <div class="">
                    <div class="d-flex align-items-center p-3">
                      <img src="<?php echo base_url(get_user_image(session()->user_id)); ?>" alt="User Profile" class="rounded-circle"
                        width="40" height="40" />
                      <div class="ml-3">
                        <h6 class="mb-0">
                            <?php echo get_user_name(session()->user_id);?>
                         </h6>
                        <small><?php echo  get_user_email(session()->user_id) ?></small>
                      </div>
                      <span class="badge badge-pill badge-primary ml-auto"><?php echo   $plan = getusercurrentplan(); ?></span>
                    </div>
                    <div class="dropdown-divider" style="display:none"></div>
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>view-profile" id="accountsetting">
                      <img src="<?php echo base_url(); ?>/public/Dashboard/assets/account-settin-ico.svg" class="pr-1" alt="" id="accountsetting" />
                      Account Settings
                    </a>
                    <div class="dropdown-item d-flex align-items-center justify-content-between toggle-switch">
                      <span class="d-flex align-items-center">
                        <img src="<?php echo base_url(); ?>/public/Dashboard/assets/dark-mode-ico.svg" class="pr-1" alt="" />Dark Mode
                      </span>
                      <input type="checkbox" class="checkbox" id="checkbox" id="theme-toggle" />
                      <label for="checkbox" id="theme-toggle" class="checkbox-label">
                        <img src="<?php echo base_url(); ?>/public/Dashboard/assets/moon.svg" width="18px" alt="" />
                        <img src="<?php echo base_url(); ?>/public/Dashboard/assets/sun 1.svg" width="16px" alt="" />
                        <span class="ball"></span>
                      </label>
                    </div>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <img src="<?php echo base_url(); ?>/public/Dashboard/assets/awitch-chu-ico.svg" class="pr-1" alt="" />
                      Switch Church
                    </a>
                    <div class="ml-2 pl-3" style="font-size: 14px">
                      <a class="dropdown-item d-flex align-items-center" href="#">
                        <img src="<?php echo base_url(); ?>/public/Dashboard/assets/sda-gen-ico.svg" class="pr-1" alt="" />
                        SDA General
                      </a>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                        <img src="<?php echo base_url(); ?>/public/Dashboard/assets/congreg-ico.svg" class="pr-1" alt="" />
                        Congreg8 SDA Cragmoor Church
                      </a>
                    </div>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <img src="<?php echo base_url(); ?>/public/Dashboard/assets/req-a-feat-ico.svg" class="pr-1" alt="" />
                      Request a Feature / Feedback
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#" id="billing">
                      <img src="<?php echo base_url(); ?>/public/Dashboard/assets/billing-ico.svg" class="pr-1" alt="" id="billing" />
                      Manage Billing
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger d-flex align-items-center" href="<?php echo base_url(); ?>logout">
                      <img src="<?php echo base_url(); ?>/public/Dashboard/assets/logout-ico.svg" class="pr-2" alt="" />
                      Logout
                    </a>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card date-card" id="dateCard">
        <div class="calendars">
          <div class="calendar-container">
            <input type="text" id="calendar1" class="calendar" placeholder="Select Date" />
          </div>
          <div class="calendar-container">
            <input type="text" id="calendar2" class="calendar" placeholder="Select Date" />
          </div>
        </div>
        <div class="btn-container">
          <button class="btn apply">Apply Filter</button>
          <button class="btn reset">Reset Filter</button>
        </div>
      </div>