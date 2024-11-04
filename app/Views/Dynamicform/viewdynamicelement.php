<div class="app-content content">

         <div class="content-wrapper">

            <div class="content-header row">

               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

                  <h3 class="content-header-title mb-0 d-inline-block">Form</h3>

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

                           <li class="breadcrumb-item active">Form</li>

                           

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

            <input type="hidden" id="id" value="<?php echo $id ?>">

            <!-- <div class="content-detached content-right"> -->
                 <div class="content-body">
                      <section class="row">
                          <div class="col-12">
                              <div class="card">
                                  <div class="card-content">
                                      <div class="card-body d-flex justify-content-between align-items-center">
                                          <!-- Add New Button on the Right -->
                                          <div>
                                              <h4 class="card-title">Form submitted data</h4>
                                          </div>
                              

                                      </div>
                                      <!-- Task List table -->
                                      <div class="table-responsive">
                                          <table id="form-submitted-data" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                              <thead>
                                                  <tr>
                                                      <th>Title</th>
                                                      <th>Value</th>
                                                      <th>Date</th>
                                                  </tr>
                                              </thead>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </section>
                  </div>



         </div>

      </div>
      