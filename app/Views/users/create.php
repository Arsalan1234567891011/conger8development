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
    <input type="hidden" name="id" id="id" value="<?php echo isset($user['id']) ? $user['id'] : ''; ?>"> 
    <div class="form-body">
        <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4>
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control border-primary" type="text" placeholder="Name" id="name" name="name" value="<?php echo isset($user['name']) ? $user['name'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control border-primary" type="email" placeholder="Email" id="email" name="email" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>">
        </div>

<?php
$user_role = get_user_role(session()->user_id);
if ($user_role == 'superadmin' && isset($user['id'])):
?>
<div class="form-group">
    <label for="fetchval">Select Role</label>
    <select name="fetchrole" id="fetchval" class="form-control border-primary">
        <option value="" disable="" selected>Select Role</option>
        <option value="churchadmin" <?php echo isset($user['role']) && $user['role'] == 'churchadmin' ? 'selected' : ''; ?>>Church Admin</option>
        <option value="user" <?php echo isset($user['role']) && $user['role'] == 'user' ? 'selected' : ''; ?>>User</option>
    </select>
</div>
<?php endif; ?>




        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control border-primary" type="password" placeholder="Password" id="password" name="password" value="<?php echo isset($password) ? $password : ''; ?>">
        </div>

        <?php if (isset($user['id'])): ?>
        <div class="form-group">
            <a href="<?php echo base_url().'/sendinfo/'.$user['id']; ?>" class="text-primary">Forgot Password?</a>
        </div>
        <?php else: ?>
        <div class="form-group">
            <label for="send-login-info" class="checkbox-inline">
                <input type="checkbox" id="send-login-info" name="info" value="1">
                Send login information
            </label>
        </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input class="form-control border-primary" id="phone" type="tel" placeholder="Contact Number" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>">
        </div>
    </div>

    <div class="form-actions right">
        <?php $btntext = isset($user['id']) ? "Update" : "Save"; ?>
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