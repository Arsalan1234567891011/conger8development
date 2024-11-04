<div class="app-content content">

         <div class="content-wrapper">

            <div class="content-header row">

               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

                  <h3 class="content-header-title mb-0 d-inline-block">Contacts</h3>

                  <div class="row breadcrumbs-top d-inline-block">

                     <div class="breadcrumb-wrapper col-12">

                        <ol class="breadcrumb">

                           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a>

                           </li>

                           <li class="breadcrumb-item"><a href="<?php echo base_url();?>/contacts">Contacts</a>

                           </li>

                           <li class="breadcrumb-item active">Add Contact

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

                                       <form action="<?php echo base_url(); ?>add-contacts" method="POST">

                                       <div class="row">


                                                <div class="col-md-6">

                                                   <label for="name" class="form-label">Name</label>

                                                   <input class="form-control" name="name" type="search"   id="name">

                                                </div>

                                                <div class="col-md-6">

                                                   <label for="email" class="form-label">Email</label>

                                                   <input class="form-control" name="email" type="Email" id="email">

                                                </div>

                                                <div class="col-md-6">

                                                   <label for="phone" class="form-label">Phone</label>

                                                   <input class="form-control" name="phone" type="tel"  id="phone">

                                                </div>

                                                <div class="col-md-6">

                                                   <label for="address" class="form-label">address</label>

                                                   <textarea class="form-control" name="address" type="search" id="address"></textarea>

                                                </div>

                                                <div class="col-md-6">
                                                
                                                   <!-- <label for="gender"   class="dropbtn"">Gender</label>

                                                   <input class="form-control" type="search" name="gender"  id="gender"> -->
                                                   <label class="form-label" for="cars">Choose Gender:</label>
                                                      <select name="gender" id="gender"  class="form-control ">
                                                         <option value="male">Male</option>
                                                         <option value="female">Female</option>
                                                         <option value="other">Other</option>
                                                      </select>
                                                   
                                        
                                                      </div>

                                          

                                          <div class="col-md-6">

                                          <label for="birthday" class="form-label">Birthday</label>

                                          <input type="text" class="form-control validate dtpickdate" id="birthday" name="birthday" required="" autocomplete="off" fdprocessedid="xmli8">

                                          <!-- <input type="text" class="form-control validate dtpickdate" id="birthday" name="birthday" required="" autocomplete="off" fdprocessedid="xmli8"> -->
                                          <!-- <label>Birthday</label>
                                          <div class='input-group'>
                                             <input type='text' class="form-control singledate" />
                                             <div class="input-group-append">
                                                <span class="input-group-text">
                                                   <span class="fa fa-calendar"></span>
                                                </span>
                                             </div>
                                          </div> -->
         
                                       </div>
                                       <div class="col-md-6">
                                          <label for="form_type" class="form-label">Form Type</label>
                                             <select class="form-control" name="form_type" id="form_type">
                                                <option value="Member">Member</option>
                                                <option value="Visitor">Visitor</option>
                                                <option value="Visiting Member">Visiting Member</option>
                                             </select>                                   
                                        </div>
                                        </div> <!-- row end -->

                                 <br><br>

                                 <div class="row">

                                    <div class="col-md-6">

                                       <button type="submit"class="btn btn-primary w-md">Create Contact</button>

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