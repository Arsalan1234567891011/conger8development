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
             <div class="modal fade" id="myModal" role="dialog">
               <div class="modal-dialog">
               
                  <!-- Modal content-->
                  <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title" style="color: #3bafda;">Task Detail</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     
                  </div>
                  <div class="modal-body">
                    <input type="hidden" id="input" value="">
                    <div class="row">
                        <div class="col-md-12">
                        <label for="title">Title:</label>
                              <p type="text" id='title' value="" disabled></p>
                        </div>
                        <div class="col-md-12">
                           <label for="title">Description :</label>
                        </div>
                        <div class="col-md-12">

                              <p type="text" id='description' value="" disabled></p>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status1">
                           <option value="1">Pending</option>
                           <option value="2">Complete</option>
                        </select>
                     </div>
                  <div class="form-group">
                        <label for="comment">Add Comment:</label>
                        <textarea class="form-control" id="taskcomment" rows="3"></textarea>
                  </div>
                  <button type="button" class="btn btn-primary " id="saveComment" onclick="savecomments()">Save Comment</button>
                  <hr>
                  <h5>Comments:</h5>
                  <ul class="list-group" id="commentList">
                  <div id="commentsContainer"></div>
                  </ul>
                                 
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default closecomments" data-dismiss="modal">Close</button>
                  </div>
                  </div>
                  
               </div>
            </div>

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
                <h5 class="mb-0" style="font-weight: bold;"><?php echo $page ?></h5>
              </div>
              <div class="table-responsive mt-3">
                <table id="task-details" class="table text-nowrap">
                     <thead>
                       <tr>                                
                        <th>Task Title</th>
                        <th>Owner</th>
                        <th>Stasus</th>
                        <th>Due Date</th>
                        <th>Action</th>
                       </tr>
                    </thead>  
                    <tfoot>
                        <tr>
                          <th>Task Title</th>
                          <th>Owner</th>
                          <th>Stasus</th>
                          <th>Due Date</th>
                          <th>Action</th>
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
      $(document).ready(function() {
        
        $('.closecomments').on('click', function() {
          var status = "";
    var type = "" ;
    load_contacts_table(status,type);
            // alert('Close comments clicked!');
        });
    });
    var status = "";
    var type = "" ;
    load_contacts_table(status,type);
    function load_contacts_table(status,type){
  
      if ( $.fn.dataTable.isDataTable( '#task-details' ) ) {
        $( '#task-details' ).DataTable().destroy();
      }

        var dataTable = $('#task-details').DataTable({

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

          columnDefs: [
              {
                  target: 1,
                  visible: false,
              },
          ],

          //'searching': false, // Remove default Search Control

          'ajax': {

            'url':'gettaskdetails',

            'data': function(data){
              data.searchByStatus = status;
              data.searchByType = type;

            }

          },

          'columns': [

            { data: 'title' }, 

            { data: 'owner' },

            { data: 'stasus' },

            { data: 'duedate' },

            { data: 'action' },

            

           

          ],

          

        });

        if(status != ""){
          dataTable.draw();
        }

        if(type != ""){
          dataTable.draw();
        }

    }


    $('#status').on('change', function() {
            load_contacts_table($(this).val(),$("#type").val());
    });


    $('#type').on('change', function() {
            load_contacts_table($("#status").val(),$(this).val());
    });


    });

</script>
<script>
    function openModalWithId(id) {

        $.ajax({
          url: baseUrl+'gettaskdetailsid',
            type: 'GET',
            data: { id: id }, 
            dataType: 'json', 
            success: function (data) {
              console.log(data);
              $('#title').text(data.notes.title);
                $('#description').text(data.notes.text);
                $('#comments').text(data.comments.comments);
                if (data.comments && Array.isArray(data.comments)) {
                    // Get the comments container
                    var commentsContainer = $('#commentsContainer');
                    commentsContainer.empty(); // Clear any previous comments

                    // Loop through comments and append them as <p> elements
                    $.each(data.comments, function (index, value) {
                        commentsContainer.append('<p class="list-group-item">' + value.comments + '</p>');
                    });
                }

                $('#input').val(id);
                $('#myModal').modal('show');
            },
            error: function (xhr, status, error) {
              alert("Error occurred while fetching data from the server: " + error);
            }
        });
    }
</script>
<script>
    function savecomments() {
      var id=$('#input').val();
      var status=$('#status1').val();

      var description=$('#taskcomment').val();

        $.ajax({
          url: 'https://app.congreg8.org//savetaskcomment',
            type: 'GET',
            data: { id: id ,description: description,status: status}, 
            dataType: 'json', 
            success: function (data) {
              var commentItem = '<li class="list-group-item">' + data.comments + '</li>';
                $('#commentList').append(commentItem);

                // Clear the textarea after successfully saving the comment
                $('#taskcomment').val('');
             
            
            },
            error: function (xhr, status, error) {
              alert("Error occurred while fetching data awais from the server: " + error);
            }
        });
        
    }
   
</script>



</html>