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
                                            <div class="button-row">
                                                      <button class="btn btn-primary w-md">Prayer Request</button>
                                                      <button class="btn btn-primary w-md">Baptism Request</button>
                                                      <button class="btn btn-primary w-md">Bible Study</button>
                                                  </div>
                                                <div class="card-body p-4">
                                                
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            
                                                        </div>  
                                                        <div class="col-lg-12">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr. No</th>
                                                                    <th>Title</th>
                                                                    <th>Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>BIBLE</td>
                                                                    <td>2023-07-26</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>PRAYER</td>
                                                                    <td>2023-07-27</td>
                                                                </tr>
                                                                <!-- Add more rows here as needed -->
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