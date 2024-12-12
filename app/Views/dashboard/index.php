<div id="main-content" class="row justify-content-sm-center">
    <div class="col-xl-4 col-lg-6 col-md-9 col-12 onec">
        <div class="card d-flex flex-row align-items-center">
            <!-- Left side content (legends and text) -->
            <div class="card-body">
                <div class="card-content">
                    <h3 class="card-title">Visitors</h3>
                    <p class="card-text mb-4" style="font-size: 13.7px; margin-top: -9px">
                        Get a grip on who visits
                    </p>
                    <div class="custom-legend" style="font-size: 13px">
                        <div data-dataset="1" class="mb-2">
                            <span class="legend-color lc1"></span>
                            Total Visitors
                        </div>
                        <div data-dataset="2">
                            <span class="legend-color lc2"></span>
                            First Time Visitors
                        </div>
                        <div data-dataset="0" class="mt-2">
                            <span class="legend-color lc3"></span>
                            Returning Visitors
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right side content (chart) -->
            <div class="mr-3">
                <canvas id="myPieChart" width="147" height="147"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-9 col-12">
        <div class="card d-flex flex-row align-items-center">
            <div class="card-body">
                <div class="card-content">
                    <h3 class="card-title">Attendance</h3>
                    <p class="card-text" style="font-size: 13.7px; margin-top: -9px">
                        Attendance tagline goes here
                    </p>
                    <div class="legend mb-2 mt-5" style="font-size: 13px">
                        <div class="mb-2">
                            <span class="members"></span> Members in Attendance
                        </div>
                        <div>
                            <span class="congregation"></span> Congregation in
                            Attendance
                        </div>
                    </div>
                </div>
            </div>
            <div class="bar-chart mt-5">
                <div>
                    <div class="bar members" id="members-bar"></div>
                    <div style="color: #f2454e" class="bar-value" id="members-value">
                        0
                    </div>
                </div>
                <div>
                    <div class="bar congregation" id="congregation-bar"></div>
                    <div style="color: #ffb169" class="bar-value" id="congregation-value">
                        0
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-9 col-12">
        <div class="card form">
            <div class="card-body">
                <div class="card-content">
                    <h3 class="card-title">Forms</h3>
                    <p class="card-text" style="font-size: 13.7px; margin-top: -9px">
                        Attendance tagline goes here
                    </p>
                    <div style="
                          background: #f2454e;
                          position: absolute;
                          bottom: 0px;
                          left: 0;
                          padding: 20px;
                          border-top-right-radius: 15px;
                          border-bottom-left-radius: 15px;
                        ">
                        <img src="<?php echo base_url(); ?>/public/Dashboard/assets/Form-ico.svg" alt="" style="width: 30px; cursor: pointer" />
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div style="margin-left: 50%" class="chart-container">
                    <canvas id="myChart"> </canvas>
                    <h3 style="
                          position: relative;
                          left: 50px;
                          bottom: 35px;
                          color: #f2454e;
                        ">
                        50:00
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="grid col-xl-4 col-lg-6 col-md-9 col-12" style="margin-top: 4%">
        <div class="">
            <div style="height: 210px" class="card d-flex flex-row align-items-center">
                <div class="card-body">
                    <div class="card-content">
                        <h4 class="card-title" style="font-weight: bold; margin-top: -10px">
                            Learn about our UserBot
                        </h4>
                        <p class="card-text mt-1" style="
                            font-size: 10px;
                            margin-top: -9px;
                            font-weight: 500;
                            margin-bottom: 35px;
                          ">
                            Generate More Interests And Baptisms
                        </p>
                        <button style="
                            background-color: #565a71;
                            color: white;
                            border-radius: 7px;
                          " class="btn px-4 px-sm-3">
                            Learn More
                        </button>
                    </div>
                </div>
                <div class="card-body pr-0" style="margin-left: -15%">
                    <img src="<?php echo base_url(); ?>/public/Dashboard/assets/Ai-Robot 1.svg" width="170px" alt="" />
                </div>
            </div>
        </div>
        <div style="margin-top: 12%">
            <div class="card absent-members-card py-3">
                <div class="card-body">
                    <h5 class="card-title">Absent Members</h5>
                    <h1 style="color: #d12f2f" class="card-text">12</h1>
                    <button class="btn btn-dark px-4" style="background-color: #4a1212">
                        View List
                    </button>
                </div>
                <div class="card-img-overlay d-flex justify-content-end align-items-end">
                    <img src="<?php echo base_url(); ?>/public/Dashboard/assets/absent-mem.svg" alt="Illustration" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-9 col-12" style="margin-top: 4%">
        <div style="
                    height: 85%;
                    padding-left: 20px;
                    padding-right: 20px;
                    padding-bottom: 20px;
                  " class="card">
            <div class="d-flex card-header justify-content-between align-items-center px-0">
                <h4>Upcoming Events</h4>
                <a class="event-link" style="font-weight: 600" href="#">See all</a>
            </div>
            <div class="list-group" id="event-list">
                <!-- Event cards will be appended here by JavaScript -->
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-9 col-12" style="margin-top: 4%">
        <div class="container">
            <div class="task-card card">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Tasks</h3>
                    <div class="task-menu">
                        <svg style="cursor: pointer; margin-top: -15px" xmlns="http://www.w3.org/2000/svg" width="26"
                            height="6" viewBox="0 0 26 6" fill="none" id="dropdownToggle">
                            <circle cx="3" cy="3" r="3" fill="#D9D9D9" />
                            <circle cx="13" cy="3" r="3" fill="#D9D9D9" />
                            <circle cx="23" cy="3" r="3" fill="#D9D9D9" />
                        </svg>
                        <div class="dropdown-menu task-dropdownmenu" id="dropdownMenu">
                            <a class="iconlink" href="#" id="mark-all-done"><svg style="margin-right: 5px"
                                    xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8"
                                    fill="none">
                                    <path class="task-icon"
                                        d="M8.59365 0.136071C8.52843 0.0844333 8.45362 0.0462231 8.37355 0.0236461C8.29348 0.00106908 8.20974 -0.00542785 8.12715 0.00453011C8.04455 0.0144881 7.96475 0.0407039 7.89234 0.0816647C7.81993 0.122625 7.75635 0.17752 7.70527 0.243181L3.29489 5.91368L1.1338 3.28005C1.08311 3.21257 1.01938 3.15596 0.946391 3.11359C0.873403 3.07122 0.792646 3.04394 0.708914 3.03338C0.625182 3.02281 0.54018 3.02918 0.458956 3.0521C0.377732 3.07502 0.30194 3.11402 0.236079 3.1668C0.170218 3.21957 0.11563 3.28504 0.0755568 3.35931C0.0354833 3.43359 0.0107405 3.51515 0.00279702 3.59918C-0.00514645 3.6832 0.00387146 3.76796 0.0293152 3.84843C0.054759 3.9289 0.0961101 4.00343 0.150914 4.06761L2.77824 7.3313C2.83754 7.4044 2.91247 7.46328 2.99751 7.50362C3.08256 7.54397 3.17556 7.56474 3.26969 7.56442C3.3696 7.56888 3.46914 7.54949 3.56007 7.50786C3.65101 7.46623 3.73072 7.40355 3.79263 7.325L8.72596 1.02445C8.77626 0.957679 8.81277 0.881568 8.83335 0.80055C8.85395 0.719532 8.85821 0.635227 8.84589 0.552545C8.83358 0.469863 8.80493 0.390459 8.76163 0.318957C8.71832 0.247455 8.66122 0.185286 8.59365 0.136071ZM11.7439 0.136071C11.6787 0.0844333 11.6039 0.0462231 11.5238 0.0236461C11.4438 0.00106908 11.36 -0.00542785 11.2774 0.00453011C11.1948 0.0144881 11.115 0.0407039 11.0426 0.0816647C10.9702 0.122625 10.9066 0.17752 10.8555 0.243181L6.44516 5.91368L6.06083 5.44113L5.26696 6.46182L5.96002 7.325C6.01932 7.3981 6.09425 7.45698 6.17929 7.49732C6.26433 7.53766 6.35734 7.55844 6.45146 7.55812C6.5461 7.55768 6.63942 7.53593 6.7245 7.49448C6.80958 7.45303 6.88423 7.39295 6.94291 7.3187L11.8762 1.01815C11.9255 0.951574 11.9612 0.875928 11.9813 0.795539C12.0013 0.715151 12.0053 0.6316 11.993 0.549668C11.9807 0.467735 11.9524 0.389032 11.9097 0.318061C11.8669 0.247091 11.8106 0.185248 11.7439 0.136071Z"
                                        fill="black" />
                                    <path
                                        d="M3.60984 4.45201L4.42261 3.43132L4.2966 3.2801C4.24686 3.21119 4.18369 3.15305 4.11089 3.10919C4.03809 3.06532 3.95717 3.03664 3.873 3.02487C3.78883 3.0131 3.70314 3.01848 3.6211 3.04069C3.53906 3.06289 3.46237 3.10147 3.39562 3.15409C3.3309 3.20609 3.27709 3.27036 3.23729 3.34322C3.19749 3.41607 3.17247 3.49608 3.16369 3.57864C3.15491 3.66119 3.16253 3.74467 3.18611 3.82427C3.2097 3.90387 3.24878 3.97802 3.30112 4.04247L3.60984 4.45201Z"
                                        fill="black" />
                                </svg>
                                Mark all as Done</a>
                            <a class="iconlink" href="#" id="delete-all-tasks"><svg style="margin-right: 9px"
                                    xmlns="http://www.w3.org/2000/svg" width="8" height="10" viewBox="0 0 8 10"
                                    fill="none">
                                    <path class="task-icon"
                                        d="M0.8 8.89138C0.8 9.5012 1.27995 10 1.86668 10H6.13335C6.72005 10 7.2 9.5012 7.2 8.89138V2.5H0.8V8.89138ZM8 0.833333H6L5.33038 0H2.66965L2 0.833333H0V1.66667H8V0.833333Z"
                                        fill="black" />
                                </svg>
                                Delete all Tasks</a>
                        </div>
                    </div>
                </div>
                <div id="task-list" class="list-group mt-3">
                    <!-- Task items will be appended here by JavaScript -->
                </div>
            </div>
            <div class="refer-card d-flex justify-content-between mt-4 px-4 py-3">
                <div class="d-block">
                    <h4>Refer A</h4>
                    <h2 style="font-weight: 600">Church</h2>
                </div>
                <img src="<?php echo base_url(); ?>/public/Dashboard/assets/church-img.svg" alt="Church Image" class="img-fluid" />
            </div>
        </div>
    </div>
    <div class="col-12">
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
                                fill="var(--button-text)" />
                        </svg>
                        Refresh Contacts
                    </button>
                    <button class="btn btn-all btn-sm" id="all-contacts-btn"><svg xmlns="http://www.w3.org/2000/svg"
                            width="25" height="19" viewBox="0 0 25 19" fill="none">
                            <g clip-path="url(#clip0_161_1025)">
                                <path
                                    d="M11.4467 0.0182C14.4972 0.0182 17.5477 0.0572815 20.5968 -0.000274916C21.9502 -0.0258555 22.9333 1.02437 22.92 2.37446C22.8809 6.4233 22.9067 10.4721 22.906 14.521C22.906 16.0196 22.0396 16.9007 20.5591 16.9007C14.4825 16.9021 8.406 16.9021 2.32875 16.9007C0.878259 16.9007 0.000698695 16.0054 0.000698695 14.5359C0 10.4515 -0.000698695 6.36646 0.00139739 2.28208C0.00209608 1.14872 0.645594 0.272585 1.63704 0.062966C1.85084 0.0182 2.07652 0.0196211 2.29661 0.0196211C5.34641 0.0167788 8.39691 0.0182 11.4467 0.0182ZM11.4516 15.864C14.4895 15.864 17.5275 15.864 20.5654 15.864C21.4835 15.864 21.8838 15.4568 21.8845 14.5231C21.8852 10.475 21.8845 6.42614 21.8845 2.37801C21.8845 1.43721 21.4898 1.02792 20.5731 1.02792C14.4972 1.0265 8.42137 1.0265 2.34482 1.02792C1.41905 1.02792 1.02848 1.4294 1.02848 2.37091C1.02848 6.41904 1.02848 10.4679 1.02848 14.516C1.02848 15.471 1.42045 15.8647 2.37277 15.8654C5.39881 15.8654 8.42556 15.8654 11.4516 15.8654V15.864Z"
                                    fill="var(--button-text)" />
                                <path
                                    d="M13.6479 18.9992C10.5394 18.9992 7.43162 18.9999 4.32312 18.9985C3.80749 18.9985 3.64539 18.8393 3.68032 18.4009C3.70059 18.1479 3.83264 18.0108 4.07299 17.9838C4.22251 17.9674 4.37483 17.966 4.52574 17.966C10.4395 17.9653 16.3533 17.966 22.267 17.966C22.4067 17.966 22.5465 17.9674 22.6862 17.9653C23.5715 17.9525 23.9816 17.534 23.9823 16.6287C23.9837 12.5799 23.983 8.53032 23.9823 4.48148C23.9823 3.89242 24.0955 3.70411 24.456 3.69559C24.8396 3.68635 24.9989 3.90947 24.9989 4.47224C24.9996 8.54525 25.001 12.6175 24.9989 16.6905C24.9982 17.814 24.4602 18.5977 23.4506 18.9168C23.2026 18.9949 22.9238 18.9956 22.659 18.9956C19.6553 19.0006 16.6523 18.9992 13.6486 18.9985L13.6479 18.9992Z"
                                    fill="var(--button-text)" />
                                <path
                                    d="M7.28479 12.6631C6.34295 12.6631 5.39902 12.6233 4.45997 12.673C3.23516 12.7377 2.98363 11.88 3.19533 10.9577C3.32808 10.3779 3.70398 9.99133 4.2273 9.74121C6.26749 8.76417 8.30628 8.76773 10.3472 9.74121C11.1318 10.1157 11.5615 10.9087 11.4315 11.7692C11.3512 12.3021 10.9662 12.6546 10.424 12.6588C9.37738 12.6666 8.33144 12.661 7.28479 12.661V12.6624V12.6631ZM4.177 11.6022H10.394C10.4625 11.2199 10.38 10.9051 10.039 10.7488C9.25441 10.3893 8.44532 10.0972 7.57615 10.034C6.56095 9.96007 5.63028 10.2855 4.7108 10.6642C4.25106 10.8533 4.14136 11.0394 4.177 11.6022Z"
                                    fill="var(--button-text)" />
                                <path
                                    d="M5.22461 6.32774C5.22601 5.16382 6.1399 4.23084 7.28087 4.22658C8.43092 4.22231 9.35739 5.17306 9.3511 6.35119C9.34481 7.508 8.41695 8.43672 7.27528 8.42748C6.12453 8.41895 5.22321 7.49592 5.22461 6.32703V6.32774ZM7.28157 5.26472C6.70515 5.26685 6.23772 5.73441 6.22794 6.31779C6.21816 6.90188 6.71283 7.40852 7.28925 7.40639C7.85729 7.40426 8.32821 6.92604 8.3345 6.34479C8.34079 5.73868 7.87616 5.26188 7.28087 5.26401L7.28157 5.26472Z"
                                    fill="var(--button-text)" />
                                <path
                                    d="M16.1452 6.30765C15.1341 6.30765 14.1224 6.30907 13.1114 6.30765C12.6908 6.30765 12.5238 6.17193 12.5196 5.83725C12.5147 5.47273 12.688 5.28869 13.0926 5.28727C15.1265 5.28087 17.1611 5.28087 19.195 5.28727C19.61 5.28869 19.7672 5.4578 19.7588 5.8337C19.7511 6.19112 19.6121 6.30694 19.1789 6.30765C18.1679 6.30907 17.1562 6.30765 16.1452 6.30765Z"
                                    fill="var(--button-text)" />
                                <path
                                    d="M16.1276 9.48271C15.1152 9.48271 14.1028 9.48484 13.0904 9.482C12.6831 9.48058 12.5168 9.33136 12.5196 8.98744C12.5224 8.64637 12.7005 8.47867 13.0883 8.47796C15.125 8.47512 17.161 8.47512 19.1977 8.47796C19.5973 8.47796 19.7573 8.63216 19.7594 8.98531C19.7615 9.35054 19.6204 9.48058 19.1998 9.48129C18.1755 9.48413 17.1519 9.482 16.1276 9.482V9.48271Z"
                                    fill="var(--button-text)" />
                                <path
                                    d="M16.1447 11.6647C17.1557 11.6647 18.1668 11.6619 19.1778 11.6647C19.6054 11.6662 19.7556 11.7948 19.7591 12.1408C19.7626 12.4862 19.6179 12.6432 19.1917 12.6453C17.1585 12.6553 15.1246 12.6567 13.0907 12.6446C12.6366 12.6418 12.4347 12.3746 12.5367 11.9994C12.6079 11.7386 12.7938 11.6619 13.0411 11.6626C14.0752 11.6662 15.11 11.664 16.144 11.664L16.1447 11.6647Z"
                                    fill="var(--button-text)" />
                            </g>
                            <defs>
                                <clipPath id="clip0_161_1025">
                                    <rect width="25" height="19" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        All Contacts
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody id="contacts-table-body">
                        <!-- Rows will be inserted here by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="footer mt-4 justify-content-center align-items-center">
        <p style="
                    color: #73737c;
                    text-align: center;
                    font-size: 13px;
                    font-style: normal;
                    font-weight: 500;
                    line-height: normal;
                  ">
            Copyright © 2024 Congreg8 , All rights reserved.
        </p>
    </div>
</div>