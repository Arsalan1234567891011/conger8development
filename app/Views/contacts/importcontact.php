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

                           <li class="breadcrumb-item active">Import Contact

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

                                       <form action="<?php echo base_url(); ?>importcontact_upload" enctype="multipart/form-data" method="POST">

                                       <div class="row">


                                                <div class="col-md-6">

                                                   <label for="name" class="form-label">Select File</label>

                                                   <input class="form-control" name="userfile" type="file"   id="name">

                                                </div>


                                 </div> <!-- row end -->

                                 <br><br>

                                 <div class="row">

                                    <div class="col-md-6">

                                       <button type="submit"class="btn btn-primary w-md">Import Contacts</button>

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