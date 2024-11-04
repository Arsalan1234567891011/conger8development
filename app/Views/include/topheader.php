<!-- fixed-top-->

<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">

      <div class="navbar-wrapper">

        <div class="navbar-header" style="padding: 0px !important;">

          <ul class="nav navbar-nav flex-row">

            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <!-- <li  class="nav-item"><div style="background-color:white;"><img class="brand-logo" alt="robust admin logo" width="240" height="63" src="<?php echo base_url(); ?>/app-assets/images/logo/Branding/Congre8_logos-05.png"></div> -->
            <?php
              $urole=get_user_role(session()->user_id);
              // var_dump($urole);
              // exit;
            ?>

            <li class="nav-item" style="margin-left: 1rem;">
              <a class="navbar-brand" href="
              <?php 
              if($urole == 'churchadmin')
                {
                  echo base_url("/churchadmin");
                } 
              else if($urole == 'user')
                {
                  
                  echo base_url("/subusers");
                } 
              else if($urole == 'superadmin')
                { 
                  echo base_url("/");
                }
            ?>
              
              "><img class="brand-logo" alt="robust admin logo" src="<?php echo base_url(); ?>public/app-assets/images/logo/Branding/Congre8_logos-07.png">

                <h3 class="brand-text">Congreg8</h3></a></li>

            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
            

          </ul>

        </div>

        <div class="navbar-container content">

          <div class="collapse navbar-collapse" id="navbar-mobile">

            <ul class="nav navbar-nav mr-auto float-left">

              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu">         </i></a></li>

              <!-- <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Mega</a> -->

                <ul class="mega-dropdown-menu dropdown-menu row">

                  <li class="col-md-2">

                    <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="fa fa-newspaper-o"></i> News</h6>

                    <div id="mega-menu-carousel-example">

                      <div><img class="rounded img-fluid mb-1" src="<?php echo base_url(); ?>/app-assets/images/slider/slider-2.png" alt="First slide"><a class="news-title mb-0" href="#">Poster Frame PSD</a>

                        <p class="news-content"><span class="font-small-2">January 26, 2018</span></p>

                      </div>

                    </div>

                  </li>

                  <li class="col-md-3">

                    <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-random"></i> Drill down menu</h6>

                    <ul class="drilldown-menu">

                      <li class="menu-list">

                        <ul>

                          <li><a class="dropdown-item" href="layout-2-columns.html"><i class="ft-file"></i> Page layouts & Templates</a></li>

                          <li><a href="#"><i class="ft-align-left"></i> Multi level menu</a>

                            <ul>

                              <li><a class="dropdown-item" href="#"><i class="fa fa-file-o"></i>  Second level</a></li>

                              <li><a href="#"><i class="fa fa-star-o"></i> Second level menu</a>

                                <ul>

                                  <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i>  Third level</a></li>

                                  <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> Third level</a></li>

                                  <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> Third level</a></li>

                                  <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> Third level</a></li>

                                </ul>

                              </li>

                              <li><a class="dropdown-item" href="#"><i class="fa fa-film"></i> Second level, third link</a></li>

                              <li><a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Second level, fourth link</a></li>

                            </ul>

                          </li>

                          <li><a class="dropdown-item" href="color-palette-primary.html"><i class="ft-camera"></i> Color palette system</a></li>

                          <li><a class="dropdown-item" href="../../../starter-kit/ltr/vertical-menu-template/layout-2-columns.html"><i class="ft-edit"></i> Page starter kit</a></li>

                          <li><a class="dropdown-item" href="changelog.html"><i class="ft-minimize-2"></i> Change log</a></li>

                          <li><a class="dropdown-item" href="https://pixinvent.ticksy.com/"><i class="fa fa-life-ring"></i> Customer support center</a></li>

                        </ul>

                      </li>

                    </ul>

                  </li>

                  <li class="col-md-3">

                    <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-list"></i> Accordion</h6>

                    <div id="accordionWrap" role="tablist" aria-multiselectable="true">

                      <div class="card border-0 box-shadow-0 collapse-icon accordion-icon-rotate">

                        <div class="card-header p-0 pb-2 border-0" id="headingOne" role="tab"><a data-toggle="collapse" data-parent="#accordionWrap" href="#accordionOne" aria-expanded="true" aria-controls="accordionOne">Accordion Item #1</a></div>

                        <div class="card-collapse collapse show" id="accordionOne" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true">

                          <div class="card-content">

                            <p class="accordion-text text-small-3">Caramels dessert chocolate cake pastry jujubes bonbon. Jelly wafer jelly beans. Caramels chocolate cake liquorice cake wafer jelly beans croissant apple pie.</p>

                          </div>

                        </div>

                        <div class="card-header p-0 pb-2 border-0" id="headingTwo" role="tab"><a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap" href="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">Accordion Item #2</a></div>

                        <div class="card-collapse collapse" id="accordionTwo" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">

                          <div class="card-content">

                            <p class="accordion-text">Sugar plum bear claw oat cake chocolate jelly tiramisu dessert pie. Tiramisu macaroon muffin jelly marshmallow cake. Pastry oat cake chupa chups.</p>

                          </div>

                        </div>

                        <div class="card-header p-0 pb-2 border-0" id="headingThree" role="tab"><a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap" href="#accordionThree" aria-expanded="false" aria-controls="accordionThree">Accordion Item #3</a></div>

                        <div class="card-collapse collapse" id="accordionThree" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">

                          <div class="card-content">

                            <p class="accordion-text">Candy cupcake sugar plum oat cake wafer marzipan jujubes lollipop macaroon. Cake dragée jujubes donut chocolate bar chocolate cake cupcake chocolate topping.</p>

                          </div>

                        </div>

                      </div>

                    </div>

                  </li>

                  <li class="col-md-4">

                    <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="fa fa-envelope"></i> Contact Us</h6>

                    <form class="form form-horizontal">

                      <div class="form-body">

                        <div class="form-group row">

                          <label class="col-sm-3 form-control-label" for="inputName1">Name</label>

                          <div class="col-sm-9">

                            <div class="position-relative has-icon-left">

                              <input class="form-control" type="text" id="inputName1" placeholder="John Doe">

                              <div class="form-control-position pl-1"><i class="fa fa-user"></i></div>

                            </div>

                          </div>

                        </div>

                        <div class="form-group row">

                          <label class="col-sm-3 form-control-label" for="inputEmail1">Email</label>

                          <div class="col-sm-9">

                            <div class="position-relative has-icon-left">

                              <input class="form-control" type="email" id="inputEmail1" placeholder="john@example.com">

                              <div class="form-control-position pl-1"><i class="fa fa-envelope"></i></div>

                            </div>

                          </div>

                        </div>

                        <div class="form-group row">

                          <label class="col-sm-3 form-control-label" for="inputMessage1">Message</label>

                          <div class="col-sm-9">

                            <div class="position-relative has-icon-left">

                              <textarea class="form-control" id="inputMessage1" rows="2" placeholder="Simple Textarea"></textarea>

                              <div class="form-control-position pl-1"><i class="fa fa-comments"></i></div>

                            </div>

                          </div>

                        </div>

                        <div class="row">

                          <div class="col-sm-12 mb-1">

                            <button class="btn btn-info float-right" type="button"><i class="fa fa-paper-plane"></i> Send          </button>

                          </div>

                        </div>

                      </div>

                    </form>

                  </li>

                </ul>

              </li>

              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"></a></li>

              <!-- <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a> -->

                <div class="search-input">

                  <input class="input" type="text" placeholder="Explore Robust...">

                </div>

              </li>

            </ul>

            <ul class="nav navbar-nav float-right">         

              <!-- <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span>English</span><span class="selected-language"></span></a> -->

                <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a></div>

              </li>
                <?php
               $db = db_connect();
               $user_id = session()->get('user_id');
               $query = $db->table('tbl_task_alert')
                           ->where('user', $user_id)
                           ->where('is_read','N')
                           ->countAllResults();
               $count = $query;
               if(empty($count))
               {
                $count=0;
               }
               else
               {
                $count;
               }
               
                ?>
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown" onclick="fetchNotificationCount()"><i class="ficon ft-bell"></i><span class="badge badge-pill badge-default badge-danger badge-default badge-up"  onclick="fetchNotificationCount()" ><?php echo $count; ?></span></a>

                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">

                  <li class="dropdown-menu-header">

                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6><span class="notification-tag badge badge-default badge-danger float-right m-0"><?php echo $count; ?></span>

                  </li>

                  <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">

                      <div class="media">

                        <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                        <?php if(empty($count)) 
                        {
                        ?>
                        <div class="media-body">
                          <h6 class="media-heading">No New Notification!</h6>                       

                        </div>
                        <?php
                        }
                        else
                        {
                          $db = db_connect();
                            $user_id = session()->get('user_id');
                            $query = $db->table('tbl_task_alert')
                                        ->where('user', $user_id)
                                        ->where('is_read', 'N')
                                        ->get();

                            $result = $query->getResultArray();
                            // var_dump($result);
                            
                        ?>
                    
                          <div class="media-body">
                            <?php 
                            foreach($result as $row)
                            {
                              ?>
                          <h6 class="media-heading"><?php echo $row['message']; ?></h6>                       
                          <?php 
                            }
                              ?>
                        </div>
                        <?php
                            
                        }
                        ?>
                      </div></a>

                    </li>

                  <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>

                </ul>

              </li>

              <!-- <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail"></i><span class="badge badge-pill badge-default badge-info badge-default badge-up">5              </span></a> -->

                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">

                  <li class="dropdown-menu-header">

                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span></h6><span class="notification-tag badge badge-default badge-warning float-right m-0">4 New</span>

                  </li>

                  <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
     

                      <div class="media">

                        <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="<?php echo base_url(); ?>/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span></div>

                        <div class="media-body">

                          <h6 class="media-heading">Margaret Govan</h6>

                          <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start.</p><small>

                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time></small>

                        </div>
                        <?php
                            $session = session();
                            $userData = $session->get();                    
                            $id=$userData['user_id'];

                            $db = db_connect();
                            $sql = "SELECT image from users where id = ". $id;                    
                            $query =$db->query($sql);    
                            $user =$query->getResultArray();   
                         ?>

                      </div></a><a href="javascript:void(0)">

                      <div class="media">

                        <div class="media-left"><span class="avatar avatar-sm avatar-busy rounded-circle"><img src="<?php echo base_url(); ?>/writable/uploads/<?php echo $user[0]['image'] ?>" alt="avatar"><i></i></span></div>

                        <div class="media-body">

                          <h6 class="media-heading">Bret Lezama</h6>

                          <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p><small>

                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Tuesday</time></small>

                        </div>

                      </div></a><a href="javascript:void(0)">

                      <div class="media">

                        <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="<?php echo base_url(); ?>/app-assets/images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span></div>

                        <div class="media-body">

                          <h6 class="media-heading">Carie Berra</h6>

                          <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p><small>

                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Friday</time></small>

                        </div>

                      </div></a><a href="javascript:void(0)">

                      <div class="media">

                        <div class="media-left"><span class="avatar avatar-sm avatar-away rounded-circle"><img src="<?php echo base_url(); ?>/app-assets/images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span></div>

                        <div class="media-body">

                          <h6 class="media-heading">Eric Alsobrook</h6>

                          <p class="notification-text font-small-3 text-muted">We have project party this saturday.</p><small>

                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">last month</time></small>

                        </div>

                      </div></a></li>

                  <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all messages</a></li>

                </ul>

              </li>

              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online">
                <img src="<?php echo base_url(get_user_image(session()->user_id)); ?>">
                <i></i></span>
                <span class="user-name">

                <?php
                 echo get_user_name(session()->user_id);
                ?>

              </span></a>

                <div class="dropdown-menu dropdown-menu-right">



<a class="dropdown-item" href="<?php echo base_url();?>signupsubscription">
  <i class="ft-user"></i>Current Plan: <?php echo   $plan = getusercurrentplan(); ?> 
  <span class="red-button">
    <?php if($plan == 'PRO') { 
      echo "Downgrade"; 
    } else { 
      echo "Upgrade"; 
    } ?>
  </span>
</a>




                  <a class="dropdown-item" href="<?php echo base_url();?>view-profile"><i class="ft-user"></i> Edit Profile</a>


                  <?php
//echo session()->user_church_id;
                  $style = "style='background:#3bafda;color:white;'";

                $get_user_all_churches = get_switch_churches();

                foreach ($get_user_all_churches as $churches) { ?>

                    <a class="dropdown-item" href="<?php echo base_url()."/switch/".$churches['church_ref'];?>"
                      <?php if($churches['church_ref'] == session()->user_church_id){echo $style;} ?>
                      ><i class="ft-user"></i>   <?php echo $churches['church_name']; ?>
                    </a>

                <?php } ?>

                <!-- <a class="dropdown-item" href="email-application.html"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="user-cards.html"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="chat-application.html"><i class="ft-message-square"></i> Chats</a> -->

                  <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo base_url(); ?>logout"><i class="ft-power"></i> Logout</a>

                </div>

              </li>

            </ul>

          </div>

        </div>

      </div>

    </nav>



    <!-- ////////////////////////////////////////////////////////////////////////////-->



