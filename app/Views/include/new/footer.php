<div class="sidebar-sticky" id="sidebarSticky" style="display: none;">
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
<div id="responsive-head" class="responsive-header-2" style="display: none;">
  <div class="header-resp">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 px-4">
      <div class="d-block">
        <button class="btn btn-light" id="dateFilter2">
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

        <div style="cursor: pointer;" class="position-relative mr-3" id="notification-icon2">
          <svg width="24" height="28" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M12 27.75C12.663 27.75 13.2989 27.4866 13.7677 27.0178C14.2366 26.5489 14.5 25.913 14.5 25.25H9.49998C9.49998 25.913 9.76337 26.5489 10.2322 27.0178C10.7011 27.4866 11.3369 27.75 12 27.75ZM1.99998 22.75H22C22.2472 22.7499 22.4888 22.6766 22.6943 22.5393C22.8998 22.4019 23.06 22.2067 23.1546 21.9783C23.2492 21.7499 23.2739 21.4987 23.2257 21.2562C23.1775 21.0138 23.0585 20.7911 22.8837 20.6163L20.75 18.4825V11.5C20.746 9.39813 19.9861 7.3678 18.6092 5.77974C17.2322 4.19168 15.3301 3.15181 13.25 2.85V1.5C13.25 1.16848 13.1183 0.850537 12.8839 0.616116C12.6494 0.381696 12.3315 0.25 12 0.25C11.6685 0.25 11.3505 0.381696 11.1161 0.616116C10.8817 0.850537 10.75 1.16848 10.75 1.5V2.85C8.66988 3.15181 6.76771 4.19168 5.39078 5.77974C4.01384 7.3678 3.254 9.39813 3.24998 11.5V18.4825L1.11623 20.6163C0.941466 20.7911 0.822458 21.0138 0.774248 21.2562C0.726039 21.4987 0.750793 21.7499 0.84538 21.9783C0.939968 22.2067 1.10014 22.4019 1.30565 22.5393C1.51117 22.6766 1.75279 22.7499 1.99998 22.75ZM5.38373 19.8838C5.61816 19.6494 5.74991 19.3315 5.74998 19V11.5C5.74998 9.8424 6.40846 8.25269 7.58056 7.08058C8.75266 5.90848 10.3424 5.25 12 5.25C13.6576 5.25 15.2473 5.90848 16.4194 7.08058C17.5915 8.25269 18.25 9.8424 18.25 11.5V19C18.25 19.3315 18.3818 19.6494 18.6162 19.8838L18.9825 20.25H5.01748L5.38373 19.8838Z"
              fill="var(--button-text)" />
          </svg>
          <span class="badge badge-pill badge-danger position-absolute" style="top: 2px; right: -5px">1</span>
        </div>
        <div class="notification-card card" id="notification-card2">
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
          <img src="assets/profile-logo.svg" alt="User Profile" class="rounded-circle" width="40" height="40"
            id="profileImage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
          <div class="dropdown-icon d-flex align-items-center justify-content-center" style="background-color: var(--sidebar-bg-color);width: 20px;height: 20px;">
            <svg style="margin-top: 3px;" xmlns="http://www.w3.org/2000/svg" width="9" height="6" viewBox="0 0 9 6" fill="none">
              <path d="M1 1L4.5 4.5L8 1" stroke="var(--sidebar-text-color)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileImage">
            <div class="">
              <div class="d-flex align-items-center p-3">
                <img src="assets/profile-logo.svg" alt="User Profile" class="rounded-circle" width="40"
                  height="40" />
                <div class="ml-3">
                  <h6 class="mb-0">Larry Page</h6>
                  <small>larry.page@gmail.com</small>
                </div>
              </div>
              <div class="dropdown-divider mb-1"></div>
              <a class="dropdown-item d-flex align-items-center mb-1" href="#">
                <svg class="pr-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="none">
                  <path d="M8.00007 1.10345C6.17162 1.1055 4.41864 1.83275 3.12573 3.12567C1.83282 4.41858 1.10556 6.17155 1.10352 8.00001C1.10658 9.82814 1.83416 11.5805 3.12685 12.8732C4.41954 14.1659 6.17193 14.8935 8.00007 14.8966C9.82915 14.8966 11.5833 14.17 12.8767 12.8766C14.17 11.5832 14.8966 9.82908 14.8966 8.00001C14.8966 6.17093 14.17 4.41676 12.8767 3.12341C11.5833 1.83005 9.82915 1.10345 8.00007 1.10345ZM12.1948 11.9796C11.8075 11.1984 11.2096 10.5409 10.4685 10.0814C9.72737 9.62193 8.87261 9.3787 8.00063 9.37916C7.12865 9.37961 6.27415 9.62375 5.53353 10.084C4.79292 10.5443 4.19567 11.2024 3.80917 11.984C2.77795 10.9145 2.20334 9.48569 2.20696 8.00001C2.20696 6.46358 2.81731 4.99008 3.90372 3.90366C4.99014 2.81725 6.46364 2.2069 8.00007 2.2069C9.53649 2.2069 11.01 2.81725 12.0964 3.90366C13.1828 4.99008 13.7932 6.46358 13.7932 8.00001C13.7966 9.48361 13.2235 10.9105 12.1948 11.9796ZM8.00007 3.86207C7.50902 3.86207 7.02901 4.00769 6.62072 4.2805C6.21243 4.5533 5.89421 4.94106 5.7063 5.39472C5.51838 5.84839 5.46922 6.34759 5.56501 6.8292C5.66081 7.3108 5.89727 7.75319 6.24449 8.10041C6.59171 8.44763 7.0341 8.68409 7.5157 8.77989C7.99731 8.87568 8.49651 8.82652 8.95018 8.6386C9.40384 8.45069 9.7916 8.13247 10.0644 7.72418C10.3372 7.31589 10.4828 6.83588 10.4828 6.34483C10.4828 6.01879 10.4186 5.69594 10.2938 5.39472C10.1691 5.0935 9.98619 4.8198 9.75564 4.58926C9.5251 4.35871 9.2514 4.17583 8.95018 4.05106C8.64895 3.92629 8.32611 3.86208 8.00007 3.86207Z" fill="var(--sidebar-text-color)"/>
                </svg>
                <span class="mr-auto">Membership</span>
                <span class="badge" style="border-radius: 16px;
                background: #FEFFCF;
                padding: 6px 15px;
                color: #754E12;
                font-family: Manrope;
                font-size: 14px;
                font-style: normal;
                font-weight: 700;"
                >FREE</span>
              </a>
              <a class="dropdown-item d-flex align-items-center mb-1" href="#" id="accountsetting">
                <svg class="pr-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14" fill="none">
                  <g clip-path="url(#clip0_211_1311)">
                    <path d="M12.0426 5.54838C11.9345 5.1691 11.7836 4.80334 11.5929 4.45812L12.4626 2.6285C12.1398 2.22607 11.7739 1.86018 11.3715 1.53737L9.54187 2.40712C9.19655 2.21663 8.83082 2.06576 8.45163 1.95738L7.77087 0.044625C7.518 0.016625 7.26075 0 7 0C6.73925 0 6.482 0.016625 6.22913 0.044625L5.54838 1.95738C5.166 2.06763 4.80025 2.21812 4.459 2.40712L2.6285 1.53737C2.22607 1.86018 1.86018 2.22607 1.53737 2.6285L2.40712 4.45812C2.21663 4.80345 2.06576 5.16918 1.95738 5.54838L0.044625 6.22913C0.016625 6.482 0 6.73925 0 7C0 7.26075 0.016625 7.518 0.044625 7.77087L1.95825 8.45163C2.0685 8.83488 2.21813 9.19975 2.408 9.54187L1.53825 11.3715C1.86112 11.774 2.22688 12.1406 2.62937 12.4626L4.459 11.5929C4.80025 11.7819 5.166 11.9324 5.54925 12.0426L6.23 13.9563C6.482 13.9834 6.73925 14 7 14C7.26075 14 7.518 13.9834 7.77087 13.9554L8.45163 12.0417C8.83488 11.9315 9.19975 11.7819 9.54187 11.592L11.3715 12.4618C11.7741 12.1392 12.14 11.7733 12.4626 11.3706L11.5929 9.541C11.7834 9.19568 11.9342 8.82994 12.0426 8.45075L13.9563 7.77C13.9834 7.518 14 7.26075 14 7C14 6.73925 13.9834 6.482 13.9554 6.22913L12.0426 5.54838ZM7 10.5C6.07174 10.5 5.1815 10.1313 4.52513 9.47487C3.86875 8.8185 3.5 7.92826 3.5 7C3.5 6.07174 3.86875 5.1815 4.52513 4.52513C5.1815 3.86875 6.07174 3.5 7 3.5C7.92826 3.5 8.8185 3.86875 9.47487 4.52513C10.1313 5.1815 10.5 6.07174 10.5 7C10.5 7.92826 10.1313 8.8185 9.47487 9.47487C8.8185 10.1313 7.92826 10.5 7 10.5ZM5.25 7C5.25 7.46413 5.43437 7.90925 5.76256 8.23744C6.09075 8.56563 6.53587 8.75 7 8.75C7.46413 8.75 7.90925 8.56563 8.23744 8.23744C8.56563 7.90925 8.75 7.46413 8.75 7C8.75 6.53587 8.56563 6.09075 8.23744 5.76256C7.90925 5.43437 7.46413 5.25 7 5.25C6.53587 5.25 6.09075 5.43437 5.76256 5.76256C5.43437 6.09075 5.25 6.53587 5.25 7Z" fill="var(--sidebar-text-color)"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_211_1311">
                      <rect width="14" height="14" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
                Account Settings
              </a>
              <div class="dropdown-item d-flex align-items-center mb-1 justify-content-between toggle-switch">
                <span class="d-flex align-items-center">
                  <svg class="pr-1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 12 12" fill="none">
                    <g clip-path="url(#clip0_211_1318)">
                      <path d="M5.25751 0.434991C5.12249 0.240006 4.88626 0.146256 4.65749 0.202491C2.02501 0.851237 0.1875 3.20249 0.1875 5.92124C0.1875 9.16876 2.83125 11.8125 6.07876 11.8125C8.79751 11.8125 11.1487 9.97499 11.7975 7.34249C11.8537 7.11374 11.76 6.87749 11.565 6.74249C11.3738 6.61125 11.115 6.61501 10.9237 6.75C10.23 7.24125 9.2475 7.60001 8.4 7.60001C6.15375 7.60001 4.3275 5.77376 4.3275 3.52749C4.32751 2.68001 4.75875 1.76999 5.25 1.07625C5.385 0.884998 5.38875 0.626244 5.25751 0.434991Z" fill="var(--sidebar-text-color)"/>
                      <path d="M8.31073 1.55425C8.37237 1.37376 8.62763 1.37376 8.68927 1.55425L9.10467 2.7707C9.12468 2.82929 9.17071 2.87532 9.2293 2.89533L10.4458 3.31073C10.6262 3.37237 10.6262 3.62763 10.4458 3.68927L9.2293 4.10467C9.17071 4.12468 9.12468 4.17071 9.10467 4.2293L8.68927 5.44575C8.62763 5.62624 8.37237 5.62624 8.31073 5.44575L7.89533 4.2293C7.87532 4.17071 7.82929 4.12468 7.7707 4.10467L6.55425 3.68927C6.37376 3.62763 6.37376 3.37237 6.55425 3.31073L7.7707 2.89533C7.82929 2.87532 7.87532 2.82929 7.89533 2.7707L8.31073 1.55425Z" fill="var(--sidebar-text-color)"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_211_1318">
                        <rect width="12" height="12" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                  Dark Mode
                </span>
                <input type="checkbox" class="checkbox" id="checkbox2" id="theme-toggle2" />
                <label for="checkbox2" id="theme-toggle2" class="checkbox-label">
                  <img src="assets/moon.svg" width="18px" alt="" />
                  <img src="assets/sun 1.svg" width="16px" alt="" />
                  <span class="ball"></span>
                </label>
              </div>
              <a class="dropdown-item d-flex align-items-center mb-1" href="#">
                <svg class="pr-1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 13 13" fill="none">
                  <g clip-path="url(#clip0_211_1335)">
                    <path d="M6.49711 11.2018C3.9002 11.2018 1.795 9.09451 1.795 6.49508C1.795 3.89565 3.9002 1.78839 6.49711 1.78839C9.09401 1.78839 11.1992 3.89565 11.1992 6.49508C11.1992 9.09451 9.09401 11.2018 6.49711 11.2018Z" fill="var(--sidebar-text-color)"/>
                    <path d="M6.48634 11.4662C9.20651 11.4935 11.4281 9.27953 11.4616 6.50816C11.4942 3.81227 9.24401 1.53951 6.52628 1.52238C3.80163 1.50524 1.54413 3.72577 1.52782 6.46817C1.51111 9.23669 3.76331 11.4731 6.48634 11.4662ZM6.51446 10.7015C4.24188 10.7354 2.33413 8.86211 2.29459 6.55753C2.25464 4.24111 4.1469 2.31029 6.47859 2.28826C8.76911 2.26622 10.6589 4.13625 10.6944 6.46042C10.7299 8.77602 8.86694 10.6664 6.51446 10.7019V10.7015Z" fill="var(--sidebar-text-color)"/>
                    <path d="M2.5587 1.28103C2.55177 1.21084 2.54932 1.1378 2.53628 1.0664C2.5053 0.89788 2.34469 0.755068 2.1796 0.759965C2.00024 0.765269 1.83392 0.850956 1.8225 1.03131C1.79642 1.44342 1.7793 1.86084 1.81925 2.27051C1.84778 2.5643 2.20609 2.62428 2.46209 2.42393C2.86728 2.10648 3.26432 1.7723 3.7005 1.503C4.37881 1.08435 5.13253 0.859117 5.92946 0.788527C7.19314 0.676725 8.3757 0.935012 9.46043 1.59399C10.7347 2.36803 11.5863 3.48115 11.998 4.91295C12.4207 6.38106 12.2727 7.80347 11.5712 9.16426C11.5243 9.25485 11.4733 9.34339 11.433 9.43683C11.3453 9.64167 11.4159 9.85344 11.5956 9.9428C11.7774 10.033 11.9955 9.97625 12.1015 9.77509C12.2784 9.43928 12.4651 9.10224 12.5882 8.74521C13.3179 6.63281 13.0884 4.62079 11.8149 2.78137C10.7139 1.19085 9.16897 0.276443 7.2388 0.0479432C5.60376 -0.145874 4.11588 0.256449 2.76211 1.18228C2.71157 1.21656 2.65979 1.2492 2.60762 1.28062C2.59824 1.28633 2.58234 1.28143 2.5587 1.28143V1.28103Z" fill="var(--sidebar-text-color)"/>
                    <path d="M10.4335 11.6849C10.4413 11.7812 10.4417 11.8489 10.4523 11.9146C10.4845 12.1117 10.619 12.2239 10.8188 12.2247C11.0181 12.2255 11.1742 12.1162 11.1836 11.9187C11.2015 11.5392 11.2081 11.1573 11.1811 10.779C11.1734 10.6721 11.0527 10.5415 10.9492 10.4807C10.8012 10.3938 10.6504 10.4632 10.5257 10.5811C10.1197 10.9655 9.68144 11.3042 9.18372 11.5665C7.13452 12.6466 4.63814 12.4136 2.86124 10.9247C1.38763 9.68997 0.697091 8.08966 0.779434 6.16047C0.815307 5.31625 1.05377 4.53078 1.44511 3.78734C1.48628 3.7094 1.52908 3.63147 1.5621 3.54986C1.642 3.35115 1.57637 3.14958 1.40638 3.05736C1.23069 2.96147 1.00323 3.01411 0.89765 3.21323C0.716658 3.55435 0.522215 3.89628 0.401554 4.26066C-0.413723 6.72356 0.000844955 8.95551 1.73453 10.9027C2.7789 12.0758 4.11473 12.7364 5.66335 12.9404C7.33671 13.1607 8.86984 12.7629 10.2566 11.7999C10.3059 11.7656 10.3573 11.7342 10.4339 11.6845L10.4335 11.6849Z" fill="var(--sidebar-text-color)"/>
                    <path d="M9.61378 6.9766L8.51886 6.54449V8.58059H9.77398C9.83146 8.58059 9.87793 8.53367 9.87793 8.47613V7.30303C9.87793 7.16634 9.77602 7.04148 9.61378 6.9766Z" fill="var(--bg-color)"/>
                    <path d="M3.11261 7.30303V8.47613C3.11261 8.53367 3.15908 8.58059 3.21656 8.58059H4.47168V6.54449L3.37676 6.9766C3.21452 7.04107 3.11261 7.16634 3.11261 7.30303Z" fill="var(--bg-color)"/>
                    <path d="M4.81861 6.07849V8.58097H5.80101V7.24017C5.80101 6.85621 6.11204 6.54529 6.49522 6.54529C6.8784 6.54529 7.18943 6.85662 7.18943 7.24017V8.58097H8.19141V6.07849C8.19141 5.98791 8.14657 5.90263 8.07197 5.85081L6.83234 4.99271V4.52347H7.42301C7.50535 4.52347 7.5722 4.45655 7.5722 4.37413V3.98854C7.5722 3.90612 7.50535 3.8392 7.42301 3.8392H6.83234V3.32793C6.83234 3.24551 6.76549 3.17859 6.68314 3.17859H6.29793C6.21558 3.17859 6.14873 3.24551 6.14873 3.32793V3.8392H5.55806C5.47572 3.8392 5.40927 3.90612 5.40927 3.98854V4.37413C5.40927 4.45655 5.47572 4.52347 5.55806 4.52347H6.14873V5.01311L4.93764 5.85081C4.86304 5.90263 4.8182 5.98791 4.8182 6.07849H4.81861Z" fill="var(--bg-color)"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_211_1335">
                      <rect width="13" height="13" fill="var(--bg-color)" transform="matrix(-1 0 0 1 13 0)"/>
                    </clipPath>
                  </defs>
                </svg>
                Switch Church
              </a>
              <div class="ml-2 pl-3 mb-1" style="font-size: 14px">
                <a class="dropdown-item d-flex align-items-center mb-1" href="#">
                  <svg class="pr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 9 10" fill="none">
                    <g clip-path="url(#clip0_211_1315)">
                      <path d="M8.81532 6.58506L6.65224 5.65654H6.6501V3.43447C6.6501 3.32253 6.60455 3.21546 6.52378 3.13655L4.74855 1.40256V0.844259H5.14886C5.25881 0.844259 5.34812 0.757004 5.34812 0.649585V0.624556C5.34812 0.517137 5.25916 0.430229 5.14921 0.430229H4.74855V0.207049C4.74855 0.150037 4.72471 0.0978922 4.68628 0.0606955C4.64927 0.0245417 4.59945 0.001598 4.54359 -0.000140167C4.42296 -0.00396413 4.3244 0.0982398 4.3244 0.21574V0.430229H3.92373C3.81378 0.430229 3.72482 0.517137 3.72482 0.624556V0.649933C3.72482 0.757351 3.81378 0.844259 3.92373 0.844259H4.3244V1.40673L2.52461 3.16505C2.44384 3.24397 2.39829 3.35104 2.39829 3.46263V5.65654H2.37659L0.184676 6.59723C0.0725892 6.64555 0 6.75367 0 6.8736V9.78954C0 9.90565 0.0964298 9.99986 0.215277 9.99986H3.46756V8.09136C3.46756 7.5341 3.92978 7.08253 4.50018 7.08253C4.7852 7.08253 5.04317 7.19551 5.22998 7.37801C5.41679 7.56052 5.53244 7.81255 5.53244 8.09101V9.99986H8.78472C8.90357 9.99986 9 9.90565 9 9.78954V6.86143C9 6.7415 8.92741 6.63338 8.81532 6.58506ZM4.43648 5.18028C3.92978 5.18028 3.5188 4.77877 3.5188 4.28374C3.5188 3.78871 3.92978 3.38719 4.43648 3.38719C4.94319 3.38719 5.35417 3.78871 5.35417 4.28374C5.35417 4.77877 4.94319 5.18028 4.43648 5.18028Z" fill="var(--sidebar-text-color)"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_211_1315">
                        <rect width="9" height="10" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                  SDA General
                </a>
                <a class="dropdown-item d-flex align-items-start" href="#">
                  <svg class="pr-1 mt-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 9 9" fill="none">
                    <path d="M1.242 4.60837L0.168 5.13033C0.066 5.18132 0 5.28631 0 5.4003V8.70003C0 8.86501 0.135 9 0.3 9H1.242V4.60837ZM7.158 9V1.50063C7.158 1.38664 7.095 1.28465 6.993 1.23366L4.635 0.0337572C4.59345 0.0115936 4.54709 0 4.5 0C4.45291 0 4.40655 0.0115936 4.365 0.0337572L2.007 1.23366C1.905 1.28465 1.842 1.38664 1.842 1.50063V9H7.158ZM3.381 8.40005H2.442V7.33214H3.381V8.40005ZM5.019 8.40005H3.981V6.93318C3.981 6.6482 4.215 6.41422 4.5 6.41422C4.785 6.41422 5.019 6.6482 5.019 6.93318V8.40005ZM4.8 2.77853V4.50038C4.8 4.66537 4.665 4.80035 4.5 4.80035C4.335 4.80035 4.2 4.66537 4.2 4.50038V2.77853H3.411C3.246 2.77853 3.111 2.64354 3.111 2.47855C3.111 2.31356 3.246 2.17858 3.411 2.17858H4.2V1.50063C4.2 1.33565 4.335 1.20066 4.5 1.20066C4.665 1.20066 4.8 1.33565 4.8 1.50063V2.17858H5.589C5.754 2.17858 5.889 2.31356 5.889 2.47855C5.889 2.64354 5.754 2.77853 5.589 2.77853H4.8ZM6.558 8.40005H5.619V7.33214H6.558V8.40005ZM8.832 5.13033L7.758 4.60837V9H8.7C8.865 9 9 8.86501 9 8.70003V5.4003C9 5.28631 8.934 5.18132 8.832 5.13033Z" fill="var(--sidebar-text-color)"/>
                  </svg>
                  Congreg8 SDA Cragmoor <br> Church
                </a>
              </div>
              <a class="dropdown-item d-flex align-items-center mb-1" href="#">
                <svg class="pr-1" xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 16 16" fill="none">
                  <path d="M13.6001 9.39999L11.4667 8.53332L10.6001 6.39999C10.5334 6.13332 10.2667 5.99999 10.0001 5.99999C9.7334 5.99999 9.46673 6.13332 9.40007 6.39999L8.5334 8.53332L6.40007 9.39999C6.1334 9.46666 6.00007 9.73332 6.00007 9.99999C6.00007 10.2667 6.1334 10.5333 6.40007 10.6L8.5334 11.4667L9.40007 13.6C9.5334 13.8667 9.7334 14 10.0001 14C10.2667 14 10.5334 13.8667 10.6001 13.6L11.4667 11.4667L13.6001 10.6C13.8667 10.4667 14.0001 10.2667 14.0001 9.99999C14.0001 9.73332 13.8667 9.46666 13.6001 9.39999ZM10.7334 10.3333C10.6001 10.4 10.4667 10.5333 10.4001 10.6667L10.0001 11.6L9.66673 10.7333C9.60007 10.6 9.46673 10.4667 9.3334 10.4L8.40007 9.99999L9.26673 9.66665C9.40007 9.59999 9.5334 9.46665 9.60007 9.33332L9.9334 8.46665L10.2667 9.33332C10.3334 9.46665 10.4667 9.59999 10.6001 9.66665L11.4667 9.99999L10.7334 10.3333ZM6.66673 7.13332C6.66673 6.86665 6.5334 6.59999 6.26673 6.53332L5.26673 6.06666L4.80007 5.06665C4.7334 4.79999 4.46673 4.66665 4.20007 4.66665C3.9334 4.66665 3.66673 4.79999 3.60007 5.06665L3.1334 6.06666L2.1334 6.53332C1.86673 6.66666 1.7334 6.86665 1.7334 7.13332C1.7334 7.39999 1.86673 7.66666 2.1334 7.73332L3.1334 8.19999L3.60007 9.19999C3.7334 9.46665 3.9334 9.59999 4.20007 9.59999C4.46673 9.59999 4.7334 9.46665 4.80007 9.19999L5.26673 8.19999L6.26673 7.73332C6.5334 7.66666 6.66673 7.39999 6.66673 7.13332ZM4.20007 7.26665C4.1334 7.19999 4.1334 7.13332 4.06673 7.13332C4.1334 7.06665 4.20007 7.06665 4.20007 6.99999C4.26673 7.06665 4.26673 7.13332 4.3334 7.13332L4.20007 7.26665ZM9.46673 4.26665L10.0667 4.53332L10.3334 5.13332C10.4667 5.39999 10.6667 5.53332 10.9334 5.53332C11.2001 5.53332 11.4667 5.39999 11.5334 5.13332L11.8001 4.53332L12.4001 4.26665C12.6667 4.13332 12.8001 3.93332 12.8001 3.66665C12.8001 3.39999 12.6667 3.13332 12.4001 3.06665L11.8001 2.79999L11.5334 2.19999C11.4001 1.93332 11.2001 1.79999 10.9334 1.79999C10.6667 1.79999 10.4001 1.93332 10.3334 2.19999L10.0667 2.79999L9.46673 3.06665C9.20007 3.19999 9.06673 3.39999 9.06673 3.66665C9.06673 3.93332 9.26673 4.19999 9.46673 4.26665Z" fill="var(--sidebar-text-color)"/>
                </svg>
                Request a Feature / Feedback
              </a>
              <a class="dropdown-item d-flex align-items-center mb-1" href="#" id="billing">
                <svg class="pr-1" width="20" height="20" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14 7C14 10.866 10.866 14 7 14C3.13401 14 0 10.866 0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7Z" fill="#424657"/>
                  <path d="M12.3 7C12.3 9.92711 9.92711 12.3 7 12.3C4.07289 12.3 1.7 9.92711 1.7 7C1.7 4.07289 4.07289 1.7 7 1.7C9.92711 1.7 12.3 4.07289 12.3 7Z" fill="#424657" stroke="white" stroke-width="1.4"/>
                  <path d="M6.54823 9.6V8.88H7.36423V9.6H6.54823ZM6.54823 4.806V4.086H7.36423V4.806H6.54823ZM6.96223 9.09C6.65223 9.09 6.37523 9.033 6.13123 8.919C5.88723 8.803 5.68823 8.64 5.53423 8.43C5.38023 8.218 5.28223 7.968 5.24023 7.68L6.05023 7.554C6.10423 7.79 6.21723 7.978 6.38923 8.118C6.56323 8.258 6.77023 8.328 7.01023 8.328C7.23623 8.328 7.42323 8.275 7.57123 8.169C7.72123 8.063 7.79623 7.932 7.79623 7.776C7.79623 7.67 7.76323 7.583 7.69723 7.515C7.63323 7.445 7.53223 7.388 7.39423 7.344L6.32623 7.014C5.71023 6.824 5.40223 6.448 5.40223 5.886C5.40223 5.622 5.46423 5.393 5.58823 5.199C5.71423 5.005 5.89123 4.856 6.11923 4.752C6.34923 4.646 6.62023 4.594 6.93223 4.596C7.21823 4.6 7.47223 4.652 7.69423 4.752C7.91623 4.85 8.10123 4.993 8.24923 5.181C8.39923 5.367 8.50823 5.594 8.57623 5.862L7.73623 6.012C7.70823 5.884 7.65623 5.772 7.58023 5.676C7.50423 5.578 7.40923 5.502 7.29523 5.448C7.18323 5.392 7.05823 5.362 6.92023 5.358C6.78823 5.354 6.66823 5.373 6.56023 5.415C6.45423 5.457 6.36923 5.516 6.30523 5.592C6.24323 5.666 6.21223 5.75 6.21223 5.844C6.21223 5.948 6.25623 6.038 6.34423 6.114C6.43223 6.188 6.57223 6.252 6.76423 6.306L7.52623 6.522C7.90823 6.632 8.18323 6.781 8.35123 6.969C8.52123 7.157 8.60623 7.406 8.60623 7.716C8.60623 7.988 8.53723 8.227 8.39923 8.433C8.26123 8.639 8.06823 8.8 7.82023 8.916C7.57423 9.032 7.28823 9.09 6.96223 9.09Z" fill="white"/>
                  </svg>
                  
                Manage Billing
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger d-flex align-items-center" href="#">
                <img src="assets/logout-ico.svg" class="pr-2" alt="" />
                Logout
              </a>
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
<?php if (!empty($footerlinks)) : ?>
	<?php foreach ($footerlinks as $footerlink) : ?>
		<?= $footerlink . "\n" ?>
	<?php endforeach; ?>
<?php endif; ?>

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
  // Automatically close the sidebar on medium screens
  function autoCloseSidebar() {
      const sidebar = document.getElementById("mySidebar");
      const main = document.getElementById("main");
      if (window.innerWidth < 992) { // Bootstrap's medium breakpoint is <992px
          sidebar.classList.add("closed");
          main.classList.replace("col-md-9", "col-md-11");
          main.classList.replace("col-lg-9", "col-lg-11");
          main.classList.replace("col-xl-10", "col-xl-11");
      } else {
          sidebar.classList.remove("closed");
          main.classList.replace("col-md-11", "col-md-9");
          main.classList.replace("col-lg-11", "col-lg-9");
          main.classList.replace("col-xl-11", "col-xl-10");
      }
  }
  // Add event listener for window resize
  window.addEventListener("resize", autoCloseSidebar);
  // Call on page load to set the initial state
  document.addEventListener("DOMContentLoaded", autoCloseSidebar);
  document.getElementById('sidebartoggle').addEventListener('click', function () {
      const sidebar = document.getElementById('sidebarSticky');
      // Toggle style.display property
      if (sidebar.style.display === 'none' || sidebar.style.display === '') {
          sidebar.style.display = 'block'; // Show the sidebar
      } else {
          sidebar.style.display = 'none'; // Hide the sidebar
      }
  });
  document.getElementById('headerToggle').addEventListener('click', function () {
      const header = document.getElementById('responsive-head2');
      // Toggle style.display property
      if (header.style.display === 'none' || header.style.display === '') {
          header.style.display = 'flex'; // Show the sidebar
      } else {
          header.style.display = 'none'; // Hide the sidebar
      }
  });
</script>

</body>

</html>