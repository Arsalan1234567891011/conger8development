<div class="app-content content">

         <div class="content-wrapper">

            <div class="content-header row">

               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

                  <h3 class="content-header-title mb-0 d-inline-block">Attendance</h3>

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

                           <li class="breadcrumb-item active">Attendance</li>

                           

                        </ol>

                     </div>

                  </div>

               </div>

               <div class="content-header-right col-md-4 col-12">

                  <div class="btn-group float-md-right">

                     <!-- <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings mr-1"></i>Action</button> -->

                     <div class="dropdown-menu arrow">

                        <a class="dropdown-item" href="#"><i class="fa fa-calendar mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>

                     </div>

                  </div>

               </div>

            

            </div>

            <br>

            <!-- <div class="content-detached content-right"> -->

            <div class="content-body">

               <section class="row">

                  <div class="col-12">

                     <div class="card">

                        <div class="card-head">

                           <div class="card-header">

                             <?php if(session()->user_role =='superadmin'){ ?>

                              <h4 class="card-title">Filter Results</h4>

                              <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>

                              <br>

                              <div  class="btn-group float-md-left" >

                                 <div id="filters">

                                    <select class="form-control" id="selchurch">

                                      <option value="0">Select Church</option> 

                                      <?php foreach ($churches as $c) { ?>

                                          <option value="<?php echo $c['id']; ?>">

                                            <?php echo $c['church_name']; ?>

                                          </option> 

                                      <?php } ?>

                                    </select>

                                 </div>

                              </div>

                              <br>

                            <?php } ?>

                              

                                       

                           </div>

                        </div>

                        <div class="card-content">

                           <div class="card-body">

                              <!-- Task List table -->

                              <div class="table-responsive">

                              <table id="attendance-data" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">

                                    <thead>

                                       <tr>

                                          <th class='admin_only'>Church Name</th>

                                          <th>Contact Name</th>

                                          <th>Phone</th>

                                          <th>Event</th>

                                          <th>Type</th>

                                          <th>Check_in</th>

                                          <th>Action</th>                                         

                                       </tr>

                                    </thead>                                  

                                 </table>

                              </div>

                           </div>

                        </div>

                     </div>

                  </div>

               </section>

            </div>

         </div>

      </div>
      