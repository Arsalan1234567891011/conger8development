<div class="app-content content">

      <div class="content-wrapper">

      <div class="content-header row">

         <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

            <h3 class="content-header-title mb-0 d-inline-block">Contacts</h3>

            <div class="row breadcrumbs-top d-inline-block">

               <div class="breadcrumb-wrapper col-12">

                  <ol class="breadcrumb">

                     <li class="breadcrumb-item"><a href="

                      

                        ">Home</a>

                     </li>

                     <li class="breadcrumb-item"><a href="<?php echo base_url();?>/contacts">Contacts</a>

                     </li>

                     <li class="breadcrumb-item active">Notes

                     </li>

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

                  <div class="table-responsive" style = "overflow-x:hidden">

                     <!-- ///change from profile -->

                     <div class="card-content">

                        <!-- ///////////////////////////////////Add-user////////////////////////// -->

                        <div class="row">

                           <div class="col-12">

                              <div class="card">

                                 <div class="card-body p-4">

                                    <div class="row">

                                       <div class="col-md-12">

                                          <h2>Notes</h2>

                                          <br>

                                       </div>

                                       <div class="col-lg-12">

                                          <button type="submit"class="btn btn-primary w-md float-right" onclick="myFunction()"><i class=" text-white bg-dark plus"></i>Add Notes</button> 

                                          <br><br>

                                          <div id="myDIV" style="display:none">

                                             <form class="row gx-3 gy-2 align-items-center" action="<?php echo base_url('notesave'); ?>" method="POST">

                                                <input type="hidden" name="userid" id="userid" value="<?php echo $id;?>">

                                                <input type="hidden" name="notes_id" >

                                                <div class="container" class="col-md-6"  >

                                                   <label for="notes" class="form-label"></label>

                                                   <!-- <input class="form-control"   name="notes" type="notes" value="<?//php echo $user['name'];?>"  id="name"> -->

                                                   <textarea id="w3review" class="form-control "  name="text" rows="4" cols="50"></textarea>

                                                   <br>

                                                </div>

                                                <!-- <div class="col-md-6"></div>                                                        -->

                                                <div class="col-md-6">

                                                   <br>

                                                   <button type="submit"class="btn btn-primary w-md">Save</button> 

                                                   <button type="reset"   class="btn btn-danger w-md cancel">Cancel</button> 





                                                </div>

                                             </form>

                                          </div>

                                          <br>

                                          <br>

                                          <div class="content-body">

                                          </div>

                                          <!-- <-----Starting----> 

                                          <?php

                                             foreach($users as $user)

                                              {

                                                

                                               

                                              ?>

                                          <div class="lobilist-wrapper ps-container ps-theme-dark " id="task_form">

                                             <div id="lobilist-list-1" class="lobilist ">

                                                <div class="lobilist-header ui-sortable-handle">

                                                   <div class="lobilist-actions">

                                                      <div class="lobilist-body">

                                                         <ul class="lobilist-items ui-sortable">

                                                            <li data-id="2" class="lobilist-item">

                                                               <!-- <label>Description :</label> -->

                                                               <div class="row">

                                                                  <div class="col-12">

                                                                     <div class="lobilist-item-description"><?php echo $user['text'];?></div>

                                                                     <?php

                                                                       

                                                                       $uname = get_contact_name($id);

                                                                        

                                                                        ?>

                                                                  </div>

                                                                  <div class="col-md-4">

                                                                     <div class="lobilist-item-duedate font-weight-bold "><?php echo date("Y-m-d ". "<br>" ."h:i:s",strtotime($user['created_at']));?></div>

                                                                  </div>

                                                                  <div class="col-4">

                                                                     <div class="lobilist-item-duedate  ">By: <span class="font-weight-bold"><?php echo get_user_name($user['created_by'])?></div>

                                                                     </span> 

                                                                  </div>

                                                                  <div class="col-3">

                                                                     <a class="text-success edit-record" onclick="myFunction()" id='<?php echo $user['id'];?>' ><i class="ft-edit-2"></i></a>                                                                         

                                                                     <a class="text-danger del-record-notes" id='<?php echo $user['id'];?>' ><i class="ft-trash-2"></i></a> 

                                                                  </div>

                                                         </ul>

                                                         </div>

                                                      </div>

                                                      <?php

                                                         }

                                                         ?>

                                                      <!-- <-----Ending----> 

                                                   </div>

                                                </div>

                                             </div>

                                          </div>

                                          <!-- end col -->

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

      <div class="sidebar">

      <div class="bug-list-sidebar-content">

      <!-- Predefined Views -->

      <?php echo view('include/userleftmenu.php'); ?>

      </div>

      </div>

      </div>

      </div>

      </div>