         <div class="content-body">
            <section class="row">
               <div class="col-3"></div>
               <div class="col-6">
                  <div class="card">
                     <div class="row justify-content-md-center">
                        <div class="col-md-12">
                           <div class="card">
                              <div class="card-header">
                                 <h4 class="card-title" id="basic-layout-colored-form-control">User Profile</h4>
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
                                       <form class="form" action="<?php echo base_url(); ?>saveuser" method="POST">
                                       <input type="hidden" name="id" id="id" value="<?php if(isset($user['id'])){echo $user['id'];} else {echo '';} ?>"> 
                                          <div class="form-body">
                                             <h4 class="form-section"><i class="fa fa-eye"></i>  About User</h4>
                                             <div class="form-group">
                                                <label for="name">Name</label>
                                                <input class="form-control border-primary" type="search" placeholder="Name" id="name" name="name" value="<?php if(isset($user['name'])){echo $user['name'];} else {echo '';} ?>">
                                             </div>
                                             <div class="form-group">
                                                <label for="userinput5">Email</label>
                                                <input class="form-control border-primary" type="email" placeholder="Email" id="email" name="email" value="<?php if(isset($user['email'])){echo $user['email'];} else {echo '';} ?>">
                                             </div>
                                             
                                             <div class="form-group">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <label for="userinput6">Password</label>                                                
                                                      <input class="form-control border-primary" type="password" placeholder="Password" id="password" name="password" value="<?php if(isset($password)){echo $password;} else {echo '';} ?>" >
                                                   </div>
                                                   <?php if (isset($user['id'])) { ?>
                                                      <div class="col-md-12 text-primary">
                                                         <a href="<?php echo base_url().'/sendinfo/'.$user['id']; ?>" class="card-link">Forgot Password?</a>
                                                      </div>
                                                   <?php } else { ?>
                                                      <div class="col-md-12 text-primary">
                                                         <label for="send-login-info" class="checkbox-inline">
                                                               <input type="checkbox" id="send-login-info" name="info" value="1">
                                                               Send login information
                                                         </label>
                                                         
                                                      </div>
                                                   
                                                   <?php } ?>


                                                </div>                                                                                              
                                             </div>
                                            
                                               
                                                
                                             <div class="form-group">                                             
                                                <label>Contact Number</label>
                                                <input class="form-control border-primary" id="phone" type="tel" placeholder="Contact Number" name="phone" value="<?php if(isset($phone)){echo $phone;} else {echo '';} ?>">
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