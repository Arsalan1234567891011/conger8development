<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Contacts</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/contacts">Contacts</a>
                  </li>
                  <li class="breadcrumb-item active">View Contact
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
                                                            
                                                        </div>  
                                                        <div class="col-lg-12">
                                                        <form class="row gx-3 gy-2 align-items-center" action="<?php echo site_url('updatecontact'); ?>" method="POST">
                                                                    <input type="hidden" name="id" id="id" value="<?php echo $user['id'];?>">

                                                                    <div class="col-md-6">
                                                                      <label for="name" class="form-label">Name</label>
                                                                      <input class="form-control" name="name" type="search" value="<?php echo $user['name'];?>"  id="name">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                      <label for="email" class="form-label">Email</label>
                                                                      <input class="form-control" name="email" type="Email" value="<?php echo $email;?>"  id="email">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                      <label for="phone" class="form-label">Phone</label>
                                                                      <input class="form-control" name="phone" type="tel" value="<?php echo $phone;?>"  id="phone">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                      <label for="address" class="form-label">address</label>
                                                                      <input class="form-control" name="address" type="search" value="<?php echo $address;?>"  id="address">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                      <label for="gender" class="form-label">Gender</label>
                                                                      <select name="gender" id="gender"  class="form-control ">
                                                                        <option value="male" <?php if($user['gender']== "male"){echo "selected";}?>>Male</option>
                                                                        <option value="female" <?php if($user['gender']== "female"){echo "selected";}?>>Female</option>
                                                                        <option value="other" <?php if($user['gender']== "other"){echo "selected";}?>>Other</option>
                                                                      </select>
                                                                          
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                      <label for="birthday" class="form-label">Birthday</label>
                                                                     <input class="form-control" name="birthday" type="Date" id="birthday"  value="<?php echo $user['birthday'];?>">
                                                                    </div>
                                                                   
                                                                    <div class="col-md-6">
                                                                        <label for="membertype" class="form-label">Member Type</label>
                                                                        <select class="form-control" name="membertype" id="membertype">
                                                                            <option value="Visitor" <?php echo ($user['form_type'] == 'Visitor') ? 'selected' : ''; ?>>Visitor</option>
                                                                            <option value="Member" <?php echo ($user['form_type'] == 'Member') ? 'selected' : ''; ?>>Member</option>
                                                                            <option value="Visiting Member" <?php echo ($user['form_type'] == 'Visiting Member') ? 'selected' : ''; ?>>Visiting Member</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                      
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                        
                                                                      </div>
                                                                    <div class="col-md-6">
                                                                      
                                                                    </div>
                                                                  
                                                                  <div class="col-md-6">
                                                                  <button type="submit"class="btn btn-primary w-md">Update</button>
                                                                  </div>
                                                        </form>
                                                               
                                                               
                                                                
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