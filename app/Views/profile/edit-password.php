<div class="app-content content">







        <div class="content-wrapper">







            <div class="content-header row">







            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">







                <h3 class="content-header-title mb-0 d-inline-block">Edit Profile</h3>







                <div class="row breadcrumbs-top d-inline-block">







                <div class="breadcrumb-wrapper col-12">







                    <ol class="breadcrumb">







                    <li class="breadcrumb-item"><a href="

                    <?php 

                    $urole = get_user_role(session()->user_id);

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

                    ">Home</a>







                    </li>







                    <!-- <li class="breadcrumb-item"><a href="<?php echo base_url();?>/users">Users</a>







                    </li> -->







                    <li class="breadcrumb-item active">Edit Profile







                    </li>







                    </ol>







                </div>







                </div>







            </div>







            <div class="content-header-right col-md-4 col-12">







                <div class="btn-group float-md-right">







                <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>







                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>







                </div>







                </div>







            </div>







            </div>







            <!-- <div class="content-detached content-right"> -->







            <div class="content-body">



            <section class="row">



               <div class="col-4">

            <?php echo view('include/editleftmenu.php'); ?>



               </div>



               <div class="col-8">



                  <div class="card">



                     <div class="row justify-content-md-center">



                        <div class="col-md-12">



                           <div class="card">



                              <div class="card-header">



                                 <!-- <h4 class="card-title" id="basic-layout-colored-form-control">Church</h4> -->



                                 <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>



                                 <div class="heading-elements">



                                    <ul class="list-inline mb-0">



                                       <li><a data-action="collapse"><i class="ft-minus"></i></a></li>



                                       <!-- <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li> -->



                                       <li><a data-action="expand"><i class="ft-maximize"></i></a></li>



                                       <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->



                                    </ul>



                                 </div>



                              </div>



                              <div class="card-content collapse show">



                                 <div class="card-body">



                                        <?php 







                                            if(isset($validation)){ ?>



                                            <div style="color: red;">



                                                <?php echo $validation->listErrors(); ?>



                                            <?php }



                                        ?>

                                        <?php

                                            if(isset($check)  && $check == "no"){

                                                echo "<span style='color:red;'>Invalid  Password</span>";

                                            }

                                            if(isset($check)  && $check == "yes"){

                                                echo "<span style='color:green;'>Password Changed Successfully</span>";

                                            }

                                        ?>

                                       <form class="form" action="<?php echo base_url(); ?>/update-password" method="POST" enctype="multipart/form-data">



                                       <input type="hidden" name="id" id="id" value="<?php if(isset($user['id'])){echo $user['id'];} else {echo '';} ?>"> 



                                        <div class="form-body">



                                             <h4 class="form-section"><i class="icon-user"></i>Password Reset</h4>



                                            <div class="form-group">



                                                <label for="name">Old Password</label>



                                                <input class="form-control border-primary" name="oldpass" type="password"  placeholder="Password"  id="oldpass">



                                            </div>



                                            <div class="form-group">



                                                <label for="userinput5">New Password</label>



                                                <input class="form-control border-primary" type="password" placeholder="Password" id="password" name="password" required>



                                            </div>   

                                            <div class="form-group">



                                                <label for="userinput5">Re-enter Password</label>



                                                <input class="form-control border-primary" type="password" placeholder="Confirm Password" id="confirm_password" required>



                                            </div>                        



                                        </div>

                             



        <!-- <button type="submit" class="pure-button pure-button-primary">Confirm</button> -->



                                          <div class="form-actions right">                                           



                                             <button type="submit" class="btn btn-primary">



                                             <i class="fa fa-check-square-o"></i> Update



                                             </button>



                                          </div>



                                       </form>



                                    </div>



                                 </div>



                              </div>



                           </div>



                        </div>



                     </div>



                  </div>



                  <!-- <div class="col-3"></div> -->



            </section>

            <!-- ///////////////////////W8 -->



            </div>



         </div>







        </div>