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
                                       <form class="form" action="<?php echo base_url(); ?>addmenuoption" method="POST">
                                             <input type="hidden" name="group_id" id="group_id" value="<?php echo $id ?>"> 
                                             <div class="form-body">
                                                <div class="form-group">
                                                      <label for="name"><strong><u>Side Bar Menu</u></strong></label>
                                                      <?php foreach ($menuitems as $row): ?>
                                                         <?php
                                                            // Check if this menu item is selected for the current group
                                                            $isChecked = false;
                                                            foreach ($groupmenu as $groupMenuItem) {
                                                                  if ($groupMenuItem['sidebarmenu_id'] == $row['menu_id']) {
                                                                     $isChecked = true;
                                                                     break;
                                                                  }
                                                            }
                                                         ?>
                                                         <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="<?php echo $row['menu_id']; ?>" name="options[]" value="<?php echo $row['menu_id']; ?>" <?php if ($isChecked) echo "checked"; ?>>
                                                            <label class="form-check-label" for="<?php echo $row['title']; ?>">
                                                                  <?php echo $row['title']; ?>
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