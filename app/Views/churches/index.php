<?php
$urole = get_user_role(session()->user_id);
?>
      <div class="app-content content">

         <div class="content-wrapper">

            <div class="content-header row">

               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

                  <h3 class="content-header-title mb-0 d-inline-block">Churches</h3>
Church Details
                  <div class="row breadcrumbs-top d-inline-block">

                     <div class="breadcrumb-wrapper col-12">

                        <ol class="breadcrumb">

                           <li class="breadcrumb-item"><a href="
                           <?php 
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

                           <li class="breadcrumb-item active">Church</li>

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
                  <div class="row">
                     
                          
                     </div>
                        
                     <div class="card">                   
                        

                        <div class="card-head">

                           <div class="card-header">
                           
                            
                              
                                
                              <div class="heading-elements">
                              <!-- <div class="content-header-right col-md-4 col-12"> -->
                                 <div class="btn-group float-md-right">
                                 <button class="btn btn-info" type="button" data-toggle="modal" data-target="#addChurch"  ><i class="icon-plus mr-1"></i>ADD</button>
                               
                                 <!-- </div> -->
                              </div>

                       


                                 
                              </div>

                           </div>

                           <div class="card-content">

                              <!-- /////////////////////////////////////// -->

                              <div class="card-body">

                                 <!-- Task List table -->
                                    
                                 <div class="table-responsive">
                                                           

                                 <table id="church-data" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">


                                    <thead>
                                          
                                       <tr>                                
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Website</th>
                                       <th>Pastor Name</th>
                                       <th>Phone</th>
                                       <th>Time Zone</th>
                                       <th>Plan</th>
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


      <!-- Start Modal -->

      <div class="modal" id="addChurch">
               <div class="modal-dialog">
                  <div class="modal-content">
                  
                  <!-- Modal Header -->
                  
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                              <input type="hidden" name="id" id="id" value="<?php if(isset($user['id'])){echo $user['id'];} else {echo '';} ?>"> 
                           <!-- <form class="form" action="<?php //echo base_url(); ?>/add-church" method="POST"> -->
                     

                              <div class="form-body">

                                 <h4 class="form-section"><i class="fa fa-home"></i>Church Details</h4>

                                 <div class="form-group">

                                    <label for="name">Church Name</label>

                                    <input class="form-control border-primary" name="church_name" type="search" placeholder="Name" id="church_name">

                                 </div>

                                 <div class="form-group">

                                    <label for="userinput5">Church Email</label>

                                    <input class="form-control border-primary" type="email" name="church_email" placeholder="Email"   id="church_email">

                                 </div>

                                 <div class="form-group">

                                    <label for="userinput6">Website</label>

                                    <input class="form-control border-primary" type="text" name="website" placeholder="Website URL" id="website">                                            

                                 </div>

                                 <div class="form-group">

                                    <label>Contact Number</label>

                                    <input class="form-control border-primary"  type="text" placeholder="Contact Number" name="phone"  id="phone">

                                 </div>

                                 <div class="form-group">

                                    <label>Address</label>

                                    <input class="form-control border-primary" type="text" name="address" placeholder="Address"  id="address">

                                 </div>

                                 <div class="form-group">

                                    <label>Pastor's Name</label>

                                    <input class="form-control border-primary" type="tel" name="pastor_name" placeholder="Name" id="pastor_name">

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


                                               <div class="form-group">

                                          <label>Plan</label>

                                          <select class="form-control border-primary"  id="plan" name="plan">
                                              <option value="" selected>
                                                      Select Plan
                                                </option>

                                             <?php 
                                             $db = db_connect();  
                                             $sql = "SELECT * FROM plan_master";
                                             $query =$db->query($sql);                                   
                                             //  $row =$query->getResultArray(); 
                                             //  var_dump($row);
                                             //  exit;



                                              foreach ($query->getResultArray() as $row){ ?>
                                             
                                                <option value="<?php echo $row['pm_id']; ?>">
                                                      <?php echo $row['pm_title']; ?>
                                                </option>
                                             

                                             
                                             <?php } ?>

                                          </select>

                                    </div>

                                 

                              </div>

                              <div class="form-actions right ">
                                 <?php                                  

                                       $btntext = "Save";                                  

                                 ?>

                              

                                 <button type="button" class="btn btn-primary " id='save_church'>

                                 <i class="fa fa-check-square-o "></i> <?php echo $btntext; ?>

                                 </button>
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


                              </div>
                              </div>


                          

                  </div>
                  
                  <!-- Modal footer -->
                  
                  
                  </div>
               </div>


      <!-- End Modal -->
   
      <script type="text/javascript">

         $(document).ready(function() {

            // Delete Record

            $(document).on("click", '.del-record', function(event) { 



                var del_id = $(this).attr('id');



                    swal({

                        title: "Are you sure?",

                        text: "You will not be able to recover this record!",

                        icon: "warning",

                        showCancelButton: true,

                        buttons: {

                                cancel: {

                                    text: "No, cancel please!",

                                    value: null,

                                    visible: true,

                                    className: "btn-warning",

                                    closeModal: false,

                                },

                                confirm: {

                                    text: "Yes, delete it!",

                                    value: true,

                                    visible: true,

                                    className: "",

                                    closeModal: false

                                }

                        }

                    }).then(isConfirm => {

                    if (isConfirm) {



                            var request =  $.ajax({

                                    url: "delchurch",

                                    type: "POST",

                                    data: {delid : del_id},

                                    dataType: "html"

                                });





                            request.done(function(msg) {



                                if(msg === "yes"){

                                    swal("Deleted!", "Record Deleted Successfully", "success");  

                                    // attendance_data();

                                    $('#contact-data').DataTable().ajax.reload();

                                }else{

                                    alert('Updation Failed');

                                }

                                

                            });



                            

                        } else {

                            swal("Cancelled", "Operation Cancelled", "error");

                        }

                    });

            });

                        

         

         });

      </script>


<script>
   function myFunction() {
   var x = document.getElementById("myDIV");
   if (x.style.display === "none") {
      x.style.display = "block";
   } else {
      x.style.display = "none";
   }
   }
</script>

<style type="text/css">
  div.dt-buttons {
    float: right;
}
</style>


<!-- ////////////////////////////// -->
<!-- <script type="text/javascript">
	$(document).ready(function() { 
      // alert('vnfdklgbnd');
      
       $('#save_church').click(function(){
         var church_name = $("#church_name").val(); 
         var church_email = $("#church_email").val(); 
         var phone = $("#phone").val(); 
         var website = $("#website").val(); 
         var address = $("#address").val(); 
         var pastor_name = $("#pastor_name").val(); 
         var time_zone = $("#time_zone").val(); 

         $.ajax({

            url: "save_churches",
            data:{
               church_name:church_name,
               church_email:church_email,
               phone:phone,
               website:website,
               address:address,
               pastor_name:pastor_name,
               time_zone:time_zone,
            },
            type: "POST",
            dataType: "html",
            success:function(data) {
                     $('#addChurch').modal('toggle');
                     toastr.success('Church Created Successfully', 'Success!');
                     load_contacts_table(status = "",type = "");
                  }

         });
   });	
        
});
</script> -->



   </body>

</html>