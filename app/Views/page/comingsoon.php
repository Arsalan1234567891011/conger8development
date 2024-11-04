<?php

$urole = get_user_role(session()->user_id);

if($urole == 'churchadmin'){

  $att_link = get_att_link();
  //$att_link = get_att_link_church();
}





if($urole == 'user'){

  $att_link = get_sub_user_att_link();
  //$att_link = get_att_link_church();

}



?>
      <div class="app-content content">

         <div class="content-wrapper">

            <div class="content-header row">



            </div>

            <!-- <div class="content-detached content-right"> -->

            <div class="content-body">

               <section class="row">

                  <div class="col-12">
                  <div class="row">
                                 
                          
                     </div>
                        
                     <div class="card">                   
                        

                     <div class="text-center">
                        <h5 class="card-text pb-2 " style="color: #141313;">COMING SOON.</h5>
                        <img src="public/app-assets/images/logo/Branding/Congre8_logos-08.png" class="img-responsive block width-300 mx-auto" width="300" alt="bg-img">
                        <div id="clockImage" class="card-text getting-started mt-3 d-inline-block" style="color: #141313;"></div>
                        <div class="col-12 pt-1">
                            <p class="card-text lead ">This website feature is under construction.</p>
                        </div>
                        <div class="col-12 text-center pt-2">
                            <p class="socialIcon card-text">
                                <a href="#"><i class="fa fa-facebook-square "style="color: #141313;"></i></a>
                                <a href="#"><i class="fa fa-twitter-square "style="color: #141313;"></i></a>
                                <a href="#"><i class="fa fa-google-plus-square "style="color: #141313;"></i></a>
                                <a href="#"><i class="fa fa-linkedin-square "style="color: #141313;"></i></a>
                            </p>
                        </div>
                    </div>

                  </div>

               </section>

               </div>

            </div>

         </div>

      
      <!-- BEGIN VENDOR JS-->

      <script src="<?php echo base_url(); ?>/app-assets/vendors/js/vendors.min.js"></script>

      <!-- BEGIN VENDOR JS-->
      


    

      <!-- BEGIN PAGE VENDOR JS-->

    


      <!-- END PAGE VENDOR JS-->

      <!-- BEGIN ROBUST JS-->

      <script src="<?php echo base_url(); ?>/app-assets/js/core/app-menu.js"></script>

      <script src="<?php echo base_url(); ?>/app-assets/js/core/app.js"></script>

      <script src="<?php echo base_url(); ?>/app-assets/vendors/js/extensions/sweetalert.min.js"></script>

      <!-- END ROBUST JS-->

      <!-- BEGIN PAGE LEVEL JS-->

      <script src="<?php echo base_url(); ?>/app-assets/js/scripts/pages/users-contacts.js"></script>

      <!-- END PAGE LEVEL JS-->

      <!-- <script type="text/javascript">

         $(document).ready(function () {

         

         var table = $('#users-contacts').DataTable({

         "processing": true,
         dom: 'Bfrtip',       

         "order": [[0, 'desc']],

         "columnDefs": [

                  {

                      "targets": [0],

                      "visible": false,

                      "orderable": false,

                      "searchable": false

                  }],

         "bDestroy": true

         });

         

         //table.columns( [0] ).visible( false );

         });

         

      </script> -->

