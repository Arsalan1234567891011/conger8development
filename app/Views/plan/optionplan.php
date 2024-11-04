<div class="app-content content">

         <div class="content-wrapper">

            <div class="content-header row">

               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

                  <h3 class="content-header-title mb-0 d-inline-block">Plan Option</h3>

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

                           <li class="breadcrumb-item active">Plan Option</li>

                           

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
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-left: 678px;">Add Option</button>

                              <!-- Task List table -->

                              <div class="table-responsive">
                               

                              <table id="example" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable no-footer" role="grid"  style="width: 987px;">

                                    <thead>

                                       <tr>

                                          <th>Title</th>
                                          <th>Active</th>
                                          <th>Action</th>
                                                                          

                                       </tr>

                                    </thead>   
                                    <tbody>
                                    <?php foreach($PlanOptionresult as $row) { ?>
                                          <tr>
                                             <td><?php echo $row['po_title']; ?></td>
                                             <td>
                                                <?php if($row['po_isactive']=="Y") {?>
                                                <input type="checkbox" class="changestatus"  id="toggle-button" value="1" data-id="<?php echo $row['po_id']; ?>"  data-size="xs" data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="primary" data-offstyle="secondary" checked>
                                             <?php }else{?>
                                                <input type="checkbox" class="changestatus" id="toggle-button" value="0" data-id="<?php echo $row['po_id']; ?>"  data-size="xs" data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="primary" data-offstyle="secondary" >
                                             
                                             <?php } ?>
                                                <td>
                                            
                                             <i class="icon-pencil edit-record" data-id="<?php echo $row['po_id']; ?>" data-toggle="modal" data-target="#myModal" style="color: blue; cursor: pointer;"></i>


                                             
                                             <a href="optiondelete/<?php echo $row['po_id']; ?>">
                                                   <i class="icon-trash" style="color: red;cursor:pointer;"></i>
                                             </a>
                                            
                                            
                                          </td>
                                          </tr>
                                    <?php } ?>
                                 
                                        
                                       
                                    </tbody>
                                    <tfoot>
                                       <tr>
                                           <th>Title</th>
                                          <th>Active</th>
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
<!-- model start -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Plan Option</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="form" action="<?php echo base_url(); ?>/addnew-option" method="POST">

          <div class="form-group">
            <label for="textInput">Option</label>
            <input type="text" class="form-control" id="po_title" name="po_title">
            <input type="hidden" class="form-control" id="hidden_id" name="hidden_id">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>



      </div>
      <!-- jQuery script to handle submit button click -->

      <script>
    $(function() {
        $('#toggle-button').bootstrapToggle();
    })
</script>
<!-- model end -->


<script>
$(document).ready(function() {
   $(document).on( 'change', '.changestatus', function () {
      var isChecked = $(this).is(':checked');
      
    var dataId = $(this).data('id');

    

      $.ajax({
         url: "<?php echo base_url(); ?>changeoptionstatus",//Enter full URL
        type: 'POST',
        data: {isChecked: isChecked, dataId: dataId},
        success: function(response) {
          console.log('AJAX response:', response);
        },
      });
});
});




</script>

