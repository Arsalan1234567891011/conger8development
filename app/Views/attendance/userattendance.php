<div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

            <h3 class="content-header-title mb-0 d-inline-block">Contacts</h3>

            <div class="row breadcrumbs-top d-inline-block">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="<?php base_url();?>/">Home</a>

                  </li>

                  <li class="breadcrumb-item"><a href="<?php base_url();?>/contacts">Contacts</a>

                  </li>

                  <li class="breadcrumb-item active">Attendance

                  </li>

                </ol>

              </div>

            </div>

          </div>

          <div class="content-header-right col-md-4 col-12">

            <div class="btn-group float-md-right">

              <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings mr-1"></i>Action</button>

              <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>

                <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>

              </div>

            </div>

          </div>

        </div>

        <div class="content-detached content-right">

          <div class="content-body"><section class="row">

	<div class="col-12">

	    <div class="card">

	        <div class="card-head">

	            

	        </div>

	        <div class="card-content">

	            <div class="card-body">

	                <!-- Task List table -->

	                <div class="table-responsive">

						<!-- ///change from profile -->

		                <div class="card-content">

                                <!-- ///////////////////////////////////Add-user////////////////////////// -->

                                    <div class="row">

                                        <div class="col-12">

                                            <div class="card">

                                                <div class="card-body p-4">



                                                    <div class="row">

                                                        <div class="col-md-12">

                                                            <h2></h2>

                                                            <br>

                                                        </div>  

                                                        <div class="col-lg-12">

                                                                <form class="row gx-3 gy-2 align-items-center" action="<?php echo base_url('attendancesave'); ?>" method="POST">

                                                                    

                                                                <input type="hidden" name="userid" id="userid" value="<?php echo $id;?>">

                                                                <input type="hidden" name="church_id" id="church_id" value="<?php //echo $id;?>">

                                                                <input type="hidden" name="check_in" id="check_in" value="<?php //echo $id;?>">

                                                                <input type="hidden" name="datetime" id="datetime" value="<?php //echo $id;?>">

                                                                    <div class="col-md-12" style="text-align: center;">

                                                                        <?php
                                                                        if($check == "yes"){
                                                                            echo "<span style='color:red;'>Todays attendnace already marked</span>";
                                                                        }else{ ?>

                                                                            <button type="submit"class="btn btn-primary w-md">+ Mark Attendance</button> 

                                                                        <?php }
                                                                        ?>
                                                                        

                                                                    </div>   

                                                            </form>

                                                                <br>

                                                                <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">

                                                                                <thead>

                                                                                    <tr>

                                                                                        

                                                                                        

                                                                                        <th>id</th>

                                                                                        <th>Check_In</th>



                                                                                        



                                                                                    </tr>

                                                                                </thead>

                                                                                    <tbody>

                                                                                            <?php

                                                                                                

                                                                                                   foreach($users as $user)

                                                                                                    {

                                                                                                    ?>

                                                                                                    <tr>

                                                                                                        <td><?php echo $user['id'];?></td>


                                                                                                        <td><?php echo $user['check_in'];?></td>

                                                                                                      


                                                                                                        

                                                                                                    </tr>

                                                                                                    <?php

                                                                                                    }

                                                                                                  

                                                                                            ?>

                                                                                      </tbody>  

                                                                </table>

                                                                

                                                        </div>



                                                    </div>

                                                </div>

                                            </div>

                                        </div> <!-- end col -->

                                    </div>

                                    

                                <!-- end row -->

                        </div>

				    </div>

				</div>

			</div>

		</div>

	</div>

</section>

          </div>

        </div>

        <div class="sidebar-detached sidebar-left">

          <div class="sidebar"><div class="bug-list-sidebar-content">

    <!-- Predefined Views -->

	<?php echo view('include/userleftmenu.php'); ?>

</div>

          </div>

        </div>

      </div>

    </div>