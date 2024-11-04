<?php
$urole = get_user_role(session()->user_id);

if($urole == 'churchadmin'){

  $att_link = get_att_link();
  //$att_link = get_att_link_church();
}

if($urole == 'superadmin'){

  $att_link = "";
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
               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                  <h3 class="content-header-title mb-0 d-inline-block">Decisions</h3>
                  <div class="row breadcrumbs-top d-inline-block">
                     <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/">Home</a>
                           </li>
                           <li class="breadcrumb-item active">Decisions</li>
                           
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
            <br>
            <!-- <div class="content-detached content-right"> -->
            <div class="content-body">
               <section class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-head">
                           <div class="card-header">
                              <h4 class="card-title">All Decisions</h4>
                              <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                              <div class="heading-elements">  
                              <a target="_blank" href='<?php echo base_url('/adddecisioncard')."?id=".$att_link; ?>' class="btn btn-danger">Visit Decision Link</a>                               
                              </div> 
                              <?php 
                              $user_role = get_user_role(session()->user_id); 
                         ?>
                                       
                           </div>
                        </div>
                        <div class="card-content">
                           <div class="card-body">
                              <!-- Task List table -->
                              <div class="table-responsive">
                                 <table id="decision" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                    <thead>
                                       <tr>
                                          <!-- <th>Sr#</th> -->
                                          <th>Name</th>
                                          <th>Phone</th>
                                          <th>Email</th>
                                          <th>Address</th>
                                          <th>Prayer</th>
                                          <th>Prayer Request</th>
                                          <th>Pastoral Visit</th>
                                          <th>Bible Study</th>
                                          <th>Baptism</th>
                                          <th>Created</th>
                
                                       </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                          <!-- <th>Sr#</th> -->
                                          <th>Name</th>
                                          <th>Phone</th>
                                          <th>Email</th>
                                          <th>Address</th>
                                          <th>Prayer</th>
                                          <th>Prayer Request</th>
                                          <th>Pastoral Visit</th>
                                          <th>Bible Study</th>
                                          <th>Baptism</th>
                                          <th>Created</th>
                                
                                       </tr>
                                    </tfoot>
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

      <script>

         $(document).ready(function(){

          var church = "";
          var type = "" ;

          load_interests_table(church,type);


          function load_interests_table(church,type){

            

            if ( $.fn.dataTable.isDataTable( '#decision' ) ) {
              $( '#decision' ).DataTable().destroy();
            }


              var dataTable = $('#decision').DataTable({

               'processing': true,

               'serverSide': true,
               'searchable': true,

               'serverMethod': 'POST',

               dom: 'Blfrtip',
               buttons: [
                     'copyHtml5',
                     'excelHtml5',
                     'csvHtml5',
                     'pdfHtml5'
               ],

               //'searching': false, // Remove default Search Control

               'ajax': {

                  'url':'getdecisiondata',

                  'data': function(data){
                    data.searchByChurch = church;
                    data.searchByType = type;

                 }

               },

               'columns': [

          
                  { data: 'first_name' }, 

                  { data: 'phone' }, 

                  { data: 'email' },

                  { data: 'address' },
                  
                   { data: 'prayer' },

                  { data: 'prayer_request' },
                  { data: 'pastoral_visit' },

                  { data: 'bible_study' },

                  { data: 'baptism' },

                  { data: 'createdat' },

               ]

             });

              if(status != ""){
                dataTable.draw();
              }

              if(type != ""){
                dataTable.draw();
              }

          }


          $('#status').on('change', function() {
                  load_interests_table($(this).val(),$("#type").val());
          });


          $('#type').on('change', function() {
                  load_interests_table($("#status").val(),$(this).val());
          });

 
         });

      </script>

      <!-- 15.march.2023 start -->
