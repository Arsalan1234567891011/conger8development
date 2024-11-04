<div class="content-body">
   <section class="row">
      <div class="col-3"></div>
      <div class="col-6">
         <div class="card">
            <div class="row justify-content-md-center">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">Church Details</h4>
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
                              <form class="form" action="<?php echo base_url(); ?>save_view_church" method="POST">
                                 
                                 <input type="hidden" name="id" id="id" value="<?php if(isset($user['id'])){echo $user['id'];} else {echo '';} ?>"> 
                                 <div class="form-body">
                                    <div class="form-body">
                                       <h4 class="form-section"><i class="fa fa-home"></i>Church Details</h4>
                                       <div class="form-group">

                                          <label for="name">Church Name</label>
                                          <input class="form-control border-primary" name="church_name" type="search" placeholder="Name" id="church_name" value="<?php if(isset($user['church_name'])){echo $user['church_name'];} else {echo '';} ?>">
                                       </div>
                                       <div class="form-group">
                                          <label for="userinput5">Church Email</label>
                                          <input class="form-control border-primary" type="email" name="church_email" placeholder="Email"   id="church_email" value="<?php if(isset($user['church_email'])){echo $user['church_email'];} else {echo '';} ?>">
                                       </div>
                                       <div class="form-group">
                                          <label for="userinput6">Website</label>
                                          <input class="form-control border-primary" type="text" name="website" placeholder="Website URL" id="website" value="<?php if(isset($user['website'])){echo $user['website'];} else {echo '';} ?>">                                            
                                       </div>
                                       <div class="form-group">
                                          <label>Contact Number</label>
                                          <input class="form-control border-primary"  type="text" placeholder="Contact Number" name="phone"  id="phone" value="<?php if(isset($user['phone'])){echo $user['phone'];} else {echo '';} ?>">
                                       </div>
                                       <div class="form-group">
                                          <label>Address</label>
                                          <input class="form-control border-primary" type="text" name="address" placeholder="Address"  id="address" value="<?php if(isset($user['address'])){echo $user['address'];} else {echo '';} ?>">
                                       </div>
                                       <div class="form-group">
                                          <label>Pastor's Name</label>
                                          <input class="form-control border-primary" type="tel" name="pastor_name" placeholder="Name" id="pastor_name" value="<?php if(isset($user['pastor_name'])){echo $user['pastor_name'];} else {echo '';} ?>">
                                       </div>
                                       <div class="form-group">
                                          <label>Time Zone</label>
                                          <select class="form-control border-primary"  id="time_zone" name="time_zone">
                                             <?php 
                                                $db = db_connect();  
                                                $sql = "SELECT * FROM time_zone_new";
                                                $query =$db->query($sql);                                   
                                                //  $row =$query->getResultArray(); 
                                                //  var_dump($row);
                                                //  exit;
                                                
                                                 foreach ($query->getResultArray() as $row){ ?>
                                             <option value="<?php echo $row['value']; ?>">
                                                <?php echo $row['title']; ?>
                                             </option>
                                             <?php } ?>
                                          </select>
                                       </div>
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