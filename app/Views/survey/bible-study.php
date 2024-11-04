<div class="app-content content">



         <div class="content-wrapper">



            <div class="content-header row">



               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">



                  <h3 class="content-header-title mb-0 d-inline-block">Bible Study</h3>



                  <div class="row breadcrumbs-top d-inline-block">



                     <div class="breadcrumb-wrapper col-12">



                        <ol class="breadcrumb">



                           <li class="breadcrumb-item"><a href="">Home</a>



                           </li>



                           <li class="breadcrumb-item active">Bible Study</li>



                           



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



            <!-- <div class="content-detached content-right"> -->



            <div class="content-body">



               <section class="row">



                  <div class="col-12">



                     <div class="card">



                        <div class="card-head">



                           <div class="card-header">



                              <h4 class="card-title">All Bible Study</h4>



                              <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>



                              <div class="heading-elements">



                                        	<!-- <a href="<?php //echo base_url('/addcontacts'); ?>" style="color: #fff !important;    padding: 12px 22px;

                                       font-size: 15px;" class="dropdown-item btn-primary btn-sm"><i class="ft-plus white"></i> Add contact</a> -->



                              </div>

                              <?php 

                              $user_role = get_user_role(session()->user_id);   

                              if( $user_role=='superadmin')

                              {

                              ?>

                              <br><br>

                              <div  class="btn-group float-md-left" >

                                 <div >

                                    

                                    <select name="fetchval" id="fetchval">

                                       <option value="" disable="" selected="">Select Church</option>     

                                       <option value="churchadmin" >Churchadmin</option>  

                                       <option value="user" >Users</option> 

                                       <option value="superadmin" >superadmin</option>                                   







                                    </select>

                                 </div>

                                 <br>

                                 <div >

                                    

                                    <select name="fetchval" id="fetchval">

                                       <option value="" disable="" selected="">Select Type</option>     

                                       <option value="churchadmin" >Member</option>  

                                       <option value="user" >Visitor</option> 

                                       <option value="superadmin" >Non Member</option>                                   







                                    </select>

                                 </div>



                              

                              <br>

                              <?php 

                              }

                           

                              ?> 

                           </div>



                        </div>



                        <div class="card-content">



                           <!-- /////////////////////////////////////// -->



                   



<div class="card-body">



   <!-- Task List table -->



   <div class="table-responsive">



      <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">



         <thead>



         <!-- `id`, `name`, `email`, `phone`, `address`, `gender`, `birthday`, `status`, 



         `source`, `created_by`, `created_at`, `update_at`, `r_status -->



            <tr>              



               <th>Date</th>

               <th>Questions</th>

               <th>Answers</th>





            </tr>



         </thead>



         <tbody>



            <?php



            

            // var_dump($sqlu);

            // exit;

               foreach($submission as $user)



               {



               ?>



            <tr>



               <td><?php echo $user['createdate'];?></td>

               <td><?php echo $user['question'];?></td>              

               <td><?php echo $user['answer'];?></td>



               

               





               



            </tr>



            <?php

               }



               ?>



         </tbody>



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