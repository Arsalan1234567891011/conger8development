<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Tags</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/contacts">Tags</a>
                  </li>
                  <li class="breadcrumb-item active">View Tags
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right col-md-4 col-12">
            <div class="btn-group float-md-right">
              <!-- <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings mr-1"></i>Action</button> -->
              <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
              </div>
            </div>
          </div>
        </div>
        <div class="content-detached content-right">
          <div class="content-body">
            <section class="row">
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
                                                            
                                                        </div>  
                                                        <div class="col-lg-12">
                                                        
                                                                <fieldset>
                            <label>Enter Tags</label>
                            <div class="form-group">
                            <input type="hidden" name="userid" id="userid" value="<?php echo $id;?>">

                                <div class="case-sensitive form-control" data-tags-input-name="case-sensitive" id='details'><?php  if(isset($all_tags)){ echo $all_tags['tags']; }  ?></div>
                               
                            </div>
                            <div>
                                <button type='submit'  class="btn btn-primary" name='sendmessage' id="save_tags_data">Save</button>
                            </div>
                        </fieldset>
                                                               
                                                                
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
   <?php 
  

  $data = [       
    'id'=>$id,
  ];
  
  echo view('include/userleftmenu', $data); ?>
</div>
          </div>
        </div>
      </div>
    </div>