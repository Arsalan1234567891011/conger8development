      <?php

$urole = get_user_role(session()->user_id);

if($urole == 'churchadmin'){

  $att_link = get_att_link();
  //$att_link = get_att_link_church();
}





if($urole == 'user'){

  $att_link = get_sub_user_att_link();
  //$att_link = get_att_link_church();

}



?>
      <div class="app-content content">

         <div class="content-wrapper">

            <div class="content-header row">

               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

                  <h3 class="content-header-title mb-0 d-inline-block">Task Details</h3>

                  <div class="row breadcrumbs-top d-inline-block">

                     <div class="breadcrumb-wrapper col-12">

                        <ol class="breadcrumb">

                           <li class="breadcrumb-item"><a href="">Home</a>

                           </li>

                           <li class="breadcrumb-item active">Task Details</li>

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
           
            <div class="modal fade" id="myModal" role="dialog">
               <div class="modal-dialog">
               
                  <!-- Modal content-->
                  <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title" style="color: #3bafda;">Modal Header</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     
                  </div>
                  <div class="modal-body">
                    <input type="hidden" id="input" value="">
                    <div class="row">
                        <div class="col-md-12">
                        <label for="title">Title:</label>
                              <p type="text" id='title' value="" disabled></p>
                        </div>
                        <div class="col-md-12">
                           <label for="title">Description :</label>
                        </div>
                        <div class="col-md-12">

                              <p type="text" id='description' value="" disabled></p>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status1">
                           <option value="1">Pending</option>
                           <option value="2">Complete</option>
                        </select>
                     </div>
                  <div class="form-group">
                        <label for="comment">Add Comment:</label>
                        <textarea class="form-control" id="taskcomment" rows="3"></textarea>
                  </div>
                  <button type="button" class="btn btn-primary " id="saveComment" onclick="savecomments()">Save Comment</button>
                  <hr>
                  <h5>Comments:</h5>
                  <ul class="list-group" id="commentList">
                  <div id="commentsContainer"></div>
                  </ul>
                                 
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default closecomments" data-dismiss="modal">Close</button>
                  </div>
                  </div>
                  
               </div>
            </div>

            <!-- <div class="content-detached content-right"> -->

            <div class="content-body">

               <section class="row">

                  <div class="col-12">
                  <div class="row">
                                 
                          
                     </div>
                        
                     <div class="card">                   
                        

                        <div class="card-head">

                           <div class="card-header">

                            
                         

                              </div>
                              <div class="heading-elements">  
                                   <h3>Task Details</h3>                               
                                    </div>
                              <div class="">
                              <!-- <div class="content-header-right col-md-4 col-12"> -->
                              

                           </div>

                           <div class="card-content">

                              <!-- /////////////////////////////////////// -->

                              <div class="card-body">

                                 <!-- Task List table -->

                                 <div class="table-responsive">
                                                           

                              <table id="task-details" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">

                                    <thead>
                                          
                                       <tr>                                
                                       

                                            <th>Task Title</th>
                                            <th>Owner</th>
                                            <th>Stasus</th>
                                            <th>Due Date</th>
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

      
      <!-- BEGIN VENDOR JS-->

      <script src="<?php echo base_url(); ?>/app-assets/vendors/js/vendors.min.js"></script>

      <!-- BEGIN VENDOR JS-->
      


    

      <!-- BEGIN PAGE VENDOR JS-->

    


      <!-- END PAGE VENDOR JS-->

      <!-- BEGIN ROBUST JS-->

      <script src="<?php echo base_url(); ?>/app-assets/js/core/app-menu.js"></script>

      <script src="<?php echo base_url(); ?>/app-assets/js/core/app.js"></script>

      <script src="<?php echo base_url(); ?>/app-assets/vendors/js/extensions/sweetalert.min.js"></script>

      <!-- END ROBUST JS-->

      <!-- BEGIN PAGE LEVEL JS-->

      <script src="<?php echo base_url(); ?>/app-assets/js/scripts/pages/users-contacts.js"></script>

      <!-- END PAGE LEVEL JS-->

      <!-- <script type="text/javascript">

         $(document).ready(function () {

         

         var table = $('#users-contacts').DataTable({

         "processing": true,
         dom: 'Bfrtip',       

         "order": [[0, 'desc']],

         "columnDefs": [

                  {

                      "targets": [0],

                      "visible": false,

                      "orderable": false,

                      "searchable": false

                  }],

         "bDestroy": true

         });

         

         //table.columns( [0] ).visible( false );

         });

         

      </script> -->

