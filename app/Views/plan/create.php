         <div class="content-body">
            <section class="row">
               <div class="col-3"></div>
               <div class="col-6">
                  <div class="card">
                     <div class="row justify-content-md-center">
                        <div class="col-md-12">
                           <div class="card">
                              <div class="card-header">
                                 <h4 class="card-title" id="basic-layout-colored-form-control">Create New Plans</h4>
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
                                       <form class="form" action="<?php echo base_url(); ?>/add-createnew" method="POST">
                                       <input type="hidden" name="id" id="id" value="<?php if(isset($user['pm_id'])){echo $user['pm_id'];} else {echo '';} ?>"> 
                                          <div class="form-body">
                                             <h4 class="form-section"><i class="ft-codepen"></i>  Create Plans</h4>
                                             <div class="form-group">
                                                <label for="name">Title</label>
                                                <input class="form-control border-primary" type="search" placeholder="title" id="pm_title" name="pm_title" value="<?php if(isset($user['pm_title'])){echo $user['pm_title'];} else {echo '';} ?>">
                                             </div>
                                             <div class="form-group">
                                                <label for="userinput5">Monthly Price</label>
                                                <input class="form-control border-primary" type="text" placeholder="price" id="pm_price" name="pm_price" value="<?php if(isset($user['pm_price'])){echo $user['pm_price'];} else {echo '';} ?>">
                                             </div>
                                             <div class="form-group">
                                                <label for="userinput5">yearly Price</label>
                                                <input class="form-control border-primary" type="text" placeholder="price" id="pm_yearly" name="pm_yearly" value="<?php if(isset($user['pm_yearly'])){echo $user['pm_yearly'];} else {echo '';} ?>">
                                             </div>
                                             <div class="form-group">
                                                <label for="userinput5">Life Time</label>
                                                <input class="form-control border-primary" type="text" placeholder="price" id="pm_lifetime" name="pm_lifetime" value="<?php if(isset($user['pm_lifetime'])){echo $user['pm_lifetime'];} else {echo '';} ?>">
                                             </div>
                                             
                                             <div class="form-group">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <label for="userinput6">Currency</label>                                                
                                                      <input class="form-control border-primary" type="text" placeholder="" id="pm_currency" name="pm_currency" value="<?php if(isset($user['pm_currency'])){echo $user['pm_currency'];} else {echo '';} ?>" >
                                                   </div>
                                                  
                                                </div>                                                                                              
                                             </div>
                                             <div class="form-group">
                                                <label for="userinput5">Color Code</label>
                                                <input class="form-control border-primary" type="text" placeholder="#98a90" id="pm_color" name="pm_color" value="<?php if(isset($user['pm_color'])){echo $user['pm_color'];} else {echo '';} ?>">
                                             </div>
                                              
                                          </div>
                                          <div class="form-group">
                                                <label for="userinput8">Plan Description</label>
                                                <textarea class="form-control border-primary" id="editor" name="editor">
                                                   <?php if (isset($user['pm_texteditor'])) {
                                                      echo $user['pm_texteditor'];
                                                   } else {
                                                      echo '';
                                                   } ?>
                                                   </textarea>
                                             
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