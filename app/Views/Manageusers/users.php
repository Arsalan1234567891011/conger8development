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
<style>
       /* Dropdown container */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Button for the dropdown */
        .dropbtn {
            background-color: #3598db;
            color: white;
            padding: 16px 20px;
            font-size: 16px;
            font-family: Arial, sans-serif;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 8px;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: flex;
            align-items: center;
            font-family: Arial, sans-serif;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        /* Add margin for Font Awesome icons inside the links */
        .dropdown-content a i {
            margin-right: 10px;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        /* Change the background color of the button when the dropdown is clicked */
        .dropdown .dropbtn.active {
            background-color: #3e8e41;
        }
</style>

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
              <div class="table-responsive mt-3">
                <table id="users-contacts" class="table text-nowrap">
                  <thead>
                       <tr>
                          <!-- <th>Sr#</th> -->
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>View User</th>
                          <th>Role</th>
                          <th>Actions</th>
                       </tr>
                    </thead>
                    <tfoot>
                    <tr>
                          <!-- <th>Sr#</th> -->
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>View User</th>
                          <th>Role</th>
                          <th>Actions</th>
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
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        function toggleDropdown() {
            const dropdownMenu = document.getElementById("dropdownMenu");
            dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";

            // Toggle active class for button
            const button = document.querySelector(".dropbtn");
            button.classList.toggle("active");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                const dropdownMenu = document.getElementById("dropdownMenu");
                if (dropdownMenu.style.display === "block") {
                    dropdownMenu.style.display = "none";
                }
                
                // Remove active class from button
                const button = document.querySelector(".dropbtn");
                if (button.classList.contains("active")) {
                    button.classList.remove("active");
                }
            }
        }
    </script>

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
    
              'url':'getuserdataforadmin',
    
              'data': function(data){
                data.searchByChurch = church;
                data.searchByType = type;
    
             }
    
           },
    
           'columns': [
    
      
              { data: 'Name' }, 
    
              { data: 'Email' }, 
    
              { data: 'Phone' },
    
              { data: 'viewuser' },
    
    
              { data: 'Role' },
    
              { data: 'Actions' },
    
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
        $(document).on("click", '.del-record', function(event) { 



                var del_id = $(this).attr('id');


                    swal({

                        title: "Are you sure?",

                        text: "You  want to delete this record!",

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

                                    url: "delcontacts",

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



</html>