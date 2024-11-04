<div class="app-content content">

         <div class="content-wrapper">

            <div class="content-header row">

               <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

                  <h3 class="content-header-title mb-0 d-inline-block">Form</h3>

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

                           <li class="breadcrumb-item active">Form</li>

                           

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

   <div class="content-body">
    <section class="row">
        <div class="col-12">
            <div class="row nomrgn">
                <div class="col-12 nopadd h-100" style="background:#f2f2f2;">



              <input type="hidden" value="<?php echo $form['form_id'] ?>" id="id">
                    <div style="width:100%; margin: 0 auto">
                        <h3><?= $form['Title']; ?></h3>

                        <?= $form['code']; ?>

                        <button type="submit" id="btn1" class="btn btn-primary">Submit</button>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>





  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


         </div>

      </div>


<script>
    $(document).ready(function() {
        $(".glyphicon-trash").hide();

        $("#btn1").click(function() {
            var id=$('#id').val(); // This line will alert the message


alert(id);
            var title = [];
            var value = [];

            $('.getvalue').each(function() {
                var type = $(this).attr('type');
                if (type == 'radio') {
                    if ($(this).is(':checked')) {
                        title.push($(this).closest('label').text());
                    }
                } else {
                    title.push(this.value);
                }
            });

            $('.getlabel_value').each(function() {
                value.push($(this).text());
            });

            $.ajax({
                url: "<?php echo base_url(); ?>viewsavedynamicform",
                dataType: 'html',
                type: 'POST',
                data: {
                    _token: '{!! csrf_token() !!}',
                    value: title,
                    title: value,
                    id:id // Add the ID here
                },
                success: function(data) {
                      if (data ==="success") {

                  alert('success')
                    toastr.success("Form saved successfully!");
                     window.location.href = "<?php echo base_url(); ?>/dynamic_form";
                } else {
                    toastr.error("Form save failed. Please try again.");
                }
                    location.reload();
                }
            });
        });
    });
</script>

      