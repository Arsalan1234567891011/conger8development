<div class="app-content content">

         <div class="content-wrapper">

            <div class="content-header row">

               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

                  <h3 class="content-header-title mb-0 d-inline-block">Group</h3>

                  <div class="row breadcrumbs-top d-inline-block">

                     <div class="breadcrumb-wrapper col-12">

                        <ol class="breadcrumb">

                           <li class="breadcrumb-item"><a href="

                           <?php 

                           $urole = get_user_role(session()->user_id);


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

                           <li class="breadcrumb-item active">Group</li>

                           

                        </ol>

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

                  

                        <div class="card-content">

                           <div class="card-body">
                              <!-- Task List table -->
                                 <div style="padding-left: 724px;">
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>

                                 </div>
                              <div class="table-responsive">
                               

                              <table id="example" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable no-footer" role="grid"  style="width: 987px;">

                                    <thead>

                                       <tr>

                                          <th>Id</th>
                                          <th>Group Name</th>
                                          <th>Action</th>  


                                       </tr>

                                    </thead>   
                                    <tbody>
                                    <?php foreach($result as $row) { ?>
                                          <tr>
                                               <td><?php echo $row['id']; ?></td>
                                             <td><?php echo $row['group_name']; ?></td>
                                             
                                            
                                             
                                             <td>
                                             <a href="#" data-toggle="modal" data-target="#myModal" class="edit-record" data-id="<?php echo $row['id']; ?>" style="color: blue; cursor: pointer;">
                                                      <i class="icon-pencil"></i>
                                                </a>
                                             <a href="delete-group/<?php echo $row['id']; ?>">
                                                   <i class="icon-trash" style="color: red;cursor:pointer;"></i>
                                             </a>
                                             <a href="sidebarmenuitems/<?php echo $row['id']; ?>">
                                                   <i class="ft-settings" style="color: green;cursor:pointer;"></i>
                                             </a>
                                            
                                          </td>
                                          </tr>
                                    <?php } ?>
                                 
                                        
                                       
                                    </tbody>
                                    <tfoot>
                                       <tr>

                                       <th>Id</th>
                                       <th>Group Name</th>
                                       <th>Action</th>  
                                    

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
         <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
            <label for="groupName">Group Name:</label>
               <input type="text" id="groupName" name="groupName" class="form-control" >
               <input type="hidden" id="id" name="id" class="form-control" >
            

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary" id="saveGroupButton">Save</button>
            </div>
         </div>

  </div>
</div>
<!-- New Modal -->


      </div>

      <script>
  $(document).ready(function() {
    $(".edit-record").click(function() {
        var groupId = $(this).data("id"); 
      // alert(groupId);
        $.ajax({
            url: "<?php echo base_url(); ?>getgroupdata", 
            method: "POST",
            data: { groupId: groupId },
            success: function(response) {
                
                var groupData = JSON.parse(response);
                console.log("Fetched group data:", groupData);

               //  alert();
                $("#groupName").val(groupData.editGroupName);
                $("#id").val(groupData.id);

                
               //  $("#editGroupModal").modal("show"); 
            },
            error: function(xhr, status, error) {
                console.error("Error fetching group data:", error);
            }
        });
    });
  });

</script>
     