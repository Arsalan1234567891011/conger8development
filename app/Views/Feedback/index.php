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
    
    
    if($urole == 'superadmin'){
    
      $att_link = "";
      //$att_link = get_att_link_church();
    
    }

?>

        <div id="main-content">
          <div id="delete-modal" class="modal del-modal">
            <div class="modal-content">
              <svg style="margin:auto" xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57"
                fill="none">
                <circle cx="28.5" cy="28.5" r="28.5" fill="#FFF8F8" />
                <path
                  d="M21.6233 37.3019C21.6233 38.6812 22.6547 39.8095 23.9154 39.8095H33.0837C34.3444 39.8095 35.3757 38.6812 35.3757 37.3019V22.8452H21.6233V37.3019ZM37.0948 19.0754H32.7972L31.3583 17.1904H25.6409L24.2019 19.0754H19.9043V20.9603H37.0948V19.0754Z"
                  fill="#FF003D" />
              </svg>
              <p style="width: 213px; color: var(--card-text-color);margin: auto;margin-top: 0px;
                text-align: center; 
                font-size: 11px;
                font-weight: 600;">
                Are you sure you want to permanently delete these contacts?</p>
              <div class="button-container m-auto">
                <button id="confirm-delete" class="delete-btn">Delete</button>
                <button id="cancel-delete" class="cancel-btn">Cancel</button>
              </div>
            </div>
          </div>
          <div class="col-xl-12 col-lg-9" id="bg">

            <div class="card-cont" style="
                    background-color: transparent;
                    border: none;
                    color: var(--card-text-color);
                    transition: background-color 0.3s, color 0.3s;
                  ">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0" style="font-weight: bold;">Decisions</h5>
              </div>
              <div class="table-responsive mt-3">
                <table id="users-contacts" class="table text-nowrap">
                <thead>
                   <tr>
                       <th>Sr</th> 
                      <th>User Name</th>
                      <th>Title</th>
                      <th>Feedback</th>
                      <th>Category</th>
                      <th>Image</th>
                      <th>Created_at</th>
                   </tr>
                </thead>
                <tfoot>
                <tr>
                   <th>Sr</th> 
                    <th>User Name</th>
                    <th>Title</th>
                    <th>Feedback</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Created_at</th>
                   </tr>
                </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script>
  function toggleSidebar() {
    document.querySelector(".sidebar").classList.toggle("collapsed");
    document.querySelector(".main-content").classList.toggle("expanded");
    document.querySelector(".toggle-btn").classList.toggle("collapsed");
  }
</script>
<script src="<?php echo base_url(); ?>/public/Dashboard/index.js"></script>
<script src="<?php echo base_url(); ?>/app-assets/js/core/app-menu.js"></script>
<script src="<?php echo base_url(); ?>/app-assets/js/core/app.js"></script>
<script src="<?php echo base_url(); ?>/app-assets/vendors/js/extensions/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>/app-assets/js/scripts/pages/users-contacts.js"></script>
<!-- DataTables JS CDN -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var baseUrl = "<?php echo base_url() ?>"; 
</script>
   <script>

         $(document).ready(function(){
          var church = "";
          var type = "" ;

          load_interests_table(church,type);


          function load_interests_table(church,type){

            

            if ( $.fn.dataTable.isDataTable( '#users-contacts' ) ) {
              $( '#users-contacts' ).DataTable().destroy();
            }


              var dataTable = $('#users-contacts').DataTable({

               'processing': true,

               'serverSide': true,

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

                  'url':'/feedback/fetch',

                  'data': function(data){
                    data.searchByChurch = church;
                    data.searchByType = type;

                 }

               },

               'columns': [

          
                  { data: 'f_id' }, 

                  { data: 'uid' }, 
                  
                  { data: 'f_title' }, 

                  { data: 'feedback' },
                  
                  { data: 'f_category' },
                   { data: 'f_image' },

                  { data: 'created_at' },


               ],
               'order': [
                    [0, 'desc'] 
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
</html>