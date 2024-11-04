<div class="app-content content">

         <div class="content-wrapper">

            <div class="content-header row">

               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

                  <h3 class="content-header-title mb-0 d-inline-block">Decisions</h3>

                  <div class="row breadcrumbs-top d-inline-block">

                     <div class="breadcrumb-wrapper col-12">

                        <ol class="breadcrumb">

                           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a>

</li>

                           <li class="breadcrumb-item active">Decisions

                           </li>

                        </ol>

                     </div>

                  </div>

               </div>

               <div class="content-header-right col-md-4 col-12">

                  <div class="btn-group float-md-right">

                     <div class="dropdown-menu arrow">

                        <a class="dropdown-item" href="#"><i class="fa fa-calendar mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>

                     </div>

                  </div>

               </div>

            </div>

            <!-- <div class="content-detached content-right"> -->

            <div class="content-body">

               <section class="row">

                  <div class="col-12">

                     <div class="card">

                        <div class="card-head">

                           <div class="card-header">

                              <h4 class="card-title"></h4>

                              <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>

                              <div class="heading-elements">

                                 

                              </div>

                           </div>

                        </div>

                        <div class="card-content">

                           <!-- ///////////////////////////////////Add-user////////////////////////// -->

                           <div class="row">

                              <div class="col-12">

                                 <div class="card">

                                    <div class="card-body p-4">

                                       <?php 

                                        if(isset($validation)){ ?>
                                          <div style="color: red;">
                                             <?php echo $validation->listErrors(); ?>
                                       <?php }
                                       ?>

                                       <form action="<?php echo base_url(); ?>add-decisioncard" method="POST">

                                       <div class="row">


                                                <div class="col-md-6">

                                                   <label for="name" class="form-label"> Fisrt Name</label>

                                                   <input class="form-control" name="first_name" type="search"   id="first_name" placeholder="First Name">

                                                </div>

                                                <div class="col-md-6">

                                                   <label for="email" class="form-label">Last Name</label>

                                                   <input class="form-control" name="last_name" type="last_name" id="last_name" placeholder="Last Name">

                                                </div>

                                                <div class="col-md-6">

                                                      <label for="phone" class="form-label">Phone</label>

                                                      <input class="form-control" name="phone" type="tel"  id="phone">

                                                      </div>
                                                      <div class="col-md-6">

                                                      <label for="email" class="form-label">Email</label>

                                                      <input class="form-control" name="email" type="email"  id="email">

                                                      </div>

                                              
                                                <div class="col-md-12">

                                                   <label for="address" class="form-label">Address</label>

                                                   <textarea class="form-control" name="address" type="search" id="address"></textarea>

                                                </div>

                                                <div class="col-md-12">
                                                   <label class="form-label">Options</label>
                                                   <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" name="prayer_request" value="prayer_request" id="prayer_request">
                                                      <label class="form-check-label" for="prayer_request">
                                                            Prayer Request
                                                      </label>
                                                   </div>
                                                   <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" name="bible_study" value="bible_study" id="bible_study">
                                                      <label class="form-check-label" for="bible_study">
                                                            Bible Study
                                                      </label>
                                                   </div>
                                                   <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" name="baptism" value="baptism" id="baptism">
                                                      <label class="form-check-label" for="baptism">
                                                            Baptism
                                                      </label>
                                                   </div>
                                                </div>

                   

                                          

                                          

                                    

                                 </div> <!-- row end -->

                                 <br><br>

                                 <div class="row">

                                    <div class="col-md-6">

                                       <button type="submit"class="btn btn-primary w-md">Save</button>

                                    </div>

                                 </div> <!-- row end -->

                                 </form>

                              </div>

                           </div>

                        </div>

                        <!-- end col -->

                     </div>

                     <!-- end row -->

                  </div>

            </div>

         </div>

         </section>

      </div>

      </div>

      </div>