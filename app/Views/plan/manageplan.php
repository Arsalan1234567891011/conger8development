<div class="app-content content">

         <div class="content-wrapper">

            <div class="content-header row">

               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

                  <h3 class="content-header-title mb-0 d-inline-block">Manage Plan</h3>

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

                           <li class="breadcrumb-item active">Manage Plan</li>

                           

                        </ol>

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

                  

                        <div class="card-content">

                           <div class="card-body">

                              <!-- Task List table -->

                              <div class="table-responsive">
                               

                              <table id="example" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable no-footer" role="grid"  style="width: 987px;">

                                    <thead>

                                       <tr>

                                          <th>Title</th>
                                          <th>Monthly Price</th>
                                          <th>Yearly Price</th>
                                          <th>Life Time</th>
                                          <th>Status</th>
                                          <th>Action</th>                                       

                                       </tr>

                                    </thead>   
                                    <tbody>
                                    <?php foreach($result as $row) { ?>
                                          <tr>
                                             <td><?php echo $row['pm_title']; ?></td>
                                             <td><?php echo $row['pm_price'] . ' ' . $row['pm_currency']; ?></td>
                                             
                                             <td><?php echo $row['pm_yearly'] . ' ' . $row['pm_currency']; ?></td>
                                             <td><?php echo $row['pm_lifetime'] . ' ' . $row['pm_currency']; ?></td>
                                             <td><?php  if($row['pm_isactive'] == 'Y')
                                             {
                                                echo 'Active';
                                             }
                                             else
                                             {
                                                echo 'Not Active';
                                             }
                                             
                                             ?></td>
                                             <td>
                                             <a href="edit/<?php echo $row['pm_id']; ?>">
                                                   <i class="icon-pencil edit-record" style="color: blue;cursor:pointer;"></i>
                                             </a>
                                             <a href="delete/<?php echo $row['pm_id']; ?>">
                                                   <i class="icon-trash" style="color: red;cursor:pointer;"></i>
                                             </a>
                                             <a href="plan-detail/<?php echo $row['pm_id']; ?>">
                                                   <i class="ft-settings" style="color: green;cursor:pointer;"></i>
                                             </a>
                                            
                                          </td>
                                          </tr>
                                    <?php } ?>
                                 
                                        
                                       
                                    </tbody>
                                    <tfoot>
                                       <tr>

                                          <th>Title</th>
                                          <th>Monthly Price</th>
                                          <th>Yearly Price</th>
                                          <th>Life Time</th>
                                          <th>Status</th>
                                          <th>Action</th>                                     

                                       </tr>
                                    </tfoot>
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
      