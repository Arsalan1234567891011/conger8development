         <div class="content-body">
            <section class="row">
               <div class="col-3"></div>
               <div class="col-6">
                  <div class="card">
                     <div class="row justify-content-md-center">
                        <div class="col-md-12">
                           <div class="card">
                              <div class="card-header">
                                 <h4 class="card-title" id="basic-layout-colored-form-control">Feedback</h4>
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
                                 <form class="form" id="feedbackform" action="<?php echo base_url(); ?>/feedbackform/store" method="POST">
    <input type="hidden" name="id" id="id" value="<?php echo isset($user['id']) ? $user['id'] : ''; ?>"> 
    <div class="form-body">
        <h4 class="form-section"><i class="fa fa-eye"></i>Feedback</h4>
        <div class="form-group">
            <label for="name">Feedback</label>
           <textarea id="feedback" class="form-control" placeholder="Give feedback here" name="feedback" rows="10"></textarea>
         </div>
          <div class="form-group">
            <label for="name">Title</label>
           <input name="title"  id="title" class="form-control" placeholder="Enter Title" >
         </div>
          <div class="form-group">
            <label for="name">Category</label>
            <select name="category" class="form-control" >
                <option value="1">Existing Feature</option>
                <option value="2">New Feature Request</option>
                <option value="3">Other</option></option>
            </select>
         </div>
          <div class="form-group">
            <label for="name">Image</label>
            <input class="form-control" name="image" type="file">
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
      <script>
      $(document).ready(function() {
      $(document).on("submit", '#feedbackform', function(e) { 
           e.preventDefault();
            $.ajax({
                     url: "<?php echo base_url(); ?>/feedback/store",
                    type: 'post',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(data){
                         $('#feedbackform')[0].reset();
                          toastr.success(data, 'Success'); 
                    }
                });

});
});
      </script>
     
   </body>
</html>