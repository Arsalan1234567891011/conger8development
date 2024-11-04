         <div class="content-body">
            <section class="row">
               <div class="col-3"></div>
               <div class="col-6">
                  <div class="card">
                     <div class="row justify-content-md-center">
                        <div class="col-md-12">
                           <div class="card">
                              <div class="card-header">
                                 <!-- <h4 class="card-title" id="basic-layout-colored-form-control">User Profile</h4> -->
                                 <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                 <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                       <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                       <!-- <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li> -->
                                       <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                       <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                    </ul>
                                 </div>
                              </div>
                              <div class="card-content collapse show">
                                 <div class="card-body">
                                    <?php 
                                       if(isset($validation)){ ?>
                                    <div style="color: red;">
                                       <?php echo $validation->listErrors(); ?>
                                       <?php  }
                                          ?>

                                          <?php
                                                echo "<p style='text-align: center; color: red;font-weight:bold;'>".session()->getFlashdata('success')."</p>";
                                                ?>
                                       <form class="form" action="<?php echo base_url(); ?>addoption" method="POST">
                                       <input type="hidden" name="id" id="id" value="<?php echo $id ?>"> 
                                          <div class="form-body">
                                             <h4 class="form-section"><?php echo $user["pm_title"]; ?></h4>
                                             <div class="form-group">
                                                      <label for="name"><strong><u>Quantify</u></strong></label>

                                                      <?php foreach ($PlanOptionresult as $row): ?>
                                                         <div class="form-check">
                                                               <input class="form-check-input" type="checkbox" id="<?php echo $row['po_id']; ?>" name="options[]" value="<?php echo $row['po_id']; ?>" <?php if(get_plan_quantity($row['po_id'],$id)) { echo 'checked'; } ?>>
                                                               <label class="form-check-label" for="<?php echo $row['po_id']; ?>">
                                                                  <?php echo $row['po_title']; ?>
                                                               </label>
 
                                                               <!-- <input type="text" name="quantity_<?php //echo $row['po_id']; ?>" value="<?php //echo get_plan_quantity($row['po_id'],$id); ?>"  placeholder="00" style="width: 50px;"> -->
                                                               <input type="text" name="quantity_<?php echo $row['po_id']; ?>" value="<?php echo get_plan_quantity($row['po_id'],$id); ?>" placeholder="00" style="width: 50px;">
 
                                                            </div>
                                                      <?php endforeach; ?>
                                                   </div>


                                                   <label for="name"><strong><u>Non-Quantify</u></strong></label>

                                                      <?php foreach ($PlanOption_NonQuntifired as $row): ?>
                                                      <div class="form-check">
                                                         <input class="form-check-input" type="checkbox" id="<?php echo $row['po_id']; ?>" name="options[]" value="<?php echo $row['po_id']; ?>" <?php if(get_checkin_quantity($row['po_id'],$id)) { echo 'checked'; } ?>>
                                                         <label class="form-check-label" for="<?php echo $row['po_id']; ?>">
                                                               <?php echo $row['po_title']; ?>
                                                         </label>
                                                      </div>
                                                   <?php endforeach; ?>

                                                   </div>

                                            
                                          </div>
                                          <div class="form-actions right">

                                             <?php 
                                                if(isset($user['id'])){
                                                   $btntext = "Update";
                                                } else {
                                                   $btntext = "Save";
                                                }
                                             ?>
                                           
                                             <button type="submit" class="btn btn-primary">
                                             <i class="fa fa-check-square-o"></i> <?php echo $btntext; ?>
                                             </button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-3"></div>
            </section>
            </div>
         </div>
      </div>
      <script>
         function myFunction() {
           var x = document.getElementById("password");
           if (x.type === "password") {
             x.type = "text";
           } else {
             x.type = "password";
           }
         }
      </script>
     
   </body>
</html>