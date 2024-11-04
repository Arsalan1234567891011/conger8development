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
        <div class="col-sm-3 nopadd h-100">
            <div id="modules" class="col-sm-12 drag-field nopadd">
                <!-- Module Buttons -->
				<h6 class="ml-2">Custom</h6>
                <p class="drag col-sm-12"><a class="btn btn-default">Text</a></p>
                <p class="drag col-sm-12"><a class="btn btn-default">Textarea</a></p>
                <p class="drag col-sm-12"><a class="btn btn-default">Date Picker</a></p>
                <p class="drag col-sm-12"><a class="btn btn-default">Radio Button</a></p>
				<p class="drag col-sm-12"><a class="btn btn-default">Image</a></p>
				<h6 class="ml-2">Personal Info</h6>
				<p class="drag col-sm-12"><a class="btn btn-default">Full Name</a></p>
				<p class="drag col-sm-12"><a class="btn btn-default">First Name</a></p>
				<p class="drag col-sm-12"><a class="btn btn-default">Last Name</a></p>
				<p class="drag col-sm-12"><a class="btn btn-default">Date of Birth</a></p>
				<p class="drag col-sm-12"><a class="btn btn-default">Gender</a></p>
				<h6 class="ml-2">Contact Info</h6>
				 <p class="drag col-sm-12"><a class="btn btn-default">Email</a></p>
				   <p class="drag col-sm-12"><a class="btn btn-default">Phone</a></p>
				   <h6 class="ml-2">Address</h6>
				  <p class="drag col-sm-12"><a class="btn btn-default">Address</a></p>
				  <p class="drag col-sm-12"><a class="btn btn-default">City</a></p>
				  <p class="drag col-sm-12"><a class="btn btn-default">State</a></p>
				  <p class="drag col-sm-12"><a class="btn btn-default">Country</a></p>
				  <p class="drag col-sm-12"><a class="btn btn-default">Zip Code</a></p>
				   <p class="drag col-sm-12"><a class="btn btn-default">Church</a></p>
				 
            </div>
        </div>
        <div class="col-sm-9 nopadd h-100">
            <div id="dropzone" class="col-sm-12" style="background:#f2f2f2;">
                <!-- Form Editing Area -->
                <label>
                    <h3 id="title" onclick="editLabel(this)">Form Title</h3>
                    <input type="text" value="" name="" class="edit" id="edit" style="display: none;">
                </label>
                <form id="form1" method="post" action="#"></form>
                <button class="btn btn-primary" style="float:right" id="btn1">Save</button>
                <div>
                    <!-- Additional Elements -->
                    <div id="dropzone1" style="height:900px"  class="col-sm-12"></div>
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
            $('.drag').draggable({
                appendTo: 'body',
                helper: 'clone'
            });
            $('#dropzone').droppable({
                activeClass: 'active',
                hoverClass: 'hover',
                accept: ":not(.ui-sortable-helper)", // Reject clones generated by sortable
                drop: function(e, ui) {
                    // var theval = ui.draggable.text().trim(); 
                    // console.log(theval.length);
					
                    if (ui.draggable.text().trim() === "Date Picker") {

                        var $el = $(
                            '<div class="drop-item form-group"><label><p class="getlabel_value" onclick="editLabel(this)">Click to Edit Label</p><input type="text" value="" name="" class="edit" id="edit" style="display: none;"></label><input class="form-control getvalue" type="date" /></div>'
                        );
                        $el.append($(
                            '<button type="button" class="remove"><span class="icon-trash"></span></button>'
                        ).click(function(event) {

                            $(this).parent().detach();
                        }));
                        $('#form1').append($el);
                    } 
					else if (ui.draggable.text().trim() === "Date of Birth") {

                        var $el = $(
                            '<div class="drop-item form-group"><label><p class="getlabel_value" >Date Of Birth</p><input type="text" value="" name="" class="edit" id="edit" style="display: none;"></label><input class="form-control getvalue" type="date" /></div>'
                        );
                        $el.append($(
                            '<button type="button" class="remove"><span class="icon-trash"></span></button>'
                        ).click(function(event) {

                            $(this).parent().detach();
                        }));
                        $('#form1').append($el);
                    }
					
					
					
					else if (ui.draggable.text().trim() == "Textarea") {
                        var $el = $(
                            '<div class="drop-item form-group"><label><p class="getlabel_value"  onclick="editLabel(this)">Click to Edit Label</p><input type="text" value="" name="" class="edit" id="edit" style="display: none;"></label><textarea class="form-control getvalue"/></div>'
                        );
                        $el.append($(
                            '<button type="button" class="remove"><span class="icon-trash"></span></button>'
                        ).click(function() {
                            $(this).parent().detach();
                        }));
                        $('#form1').append($el);
                    } 
					
					else if (ui.draggable.text().trim() == "Address") {
                        var $el = $(
                            '<div class="drop-item form-group"><label><p class="getlabel_value"  >Address</p><input type="text" value="" name="" class="edit" id="edit" style="display: none;"></label><textarea class="form-control getvalue"/></div>'
                        );
                        $el.append($(
                            '<button type="button" class="remove"><span class="icon-trash"></span></button>'
                        ).click(function() {
                            $(this).parent().detach();
                        }));
                        $('#form1').append($el);
                    } 
						else if (ui.draggable.text().trim() == "Phone") {
                        var $el = $(
                            '<div class="drop-item form-group"><label><p class="getlabel_value"  onclick="editLabel(this)">Phone</p><input type="text" value="" name="" class="edit" id="edit" style="display: none;"></label><input class="form-control getvalue" type="email" /></div>'
                        );
                        $el.append($(
                            '<button type="button" class="remove"><span class="icon-trash"></span></button>'
                        ).click(function() {
                            $(this).parent().detach();
                        }));
                        $('#form1').append($el);
                    } 
	                 else if (ui.draggable.text().trim() == "Image") {
                        var $el = $(
                            '<div class="drop-item form-group"><label><p class="getlabel_value"  onclick="editLabel(this)">Click  to Edit Label</p><input type="text" value="" name="" class="edit" id="edit" style="display: none;"></label><input class="form-control getvalue" type="file" /></div>'
                        );
                        $el.append($(
                            '<button type="button" class="remove"><span class="icon-trash"></span></button>'
                        ).click(function() {
                            $(this).parent().detach();
                        }));
                        $('#form1').append($el);
                    } 
					else if (ui.draggable.text().trim() == "Email") {
                        var $el = $(
                            '<div class="drop-item form-group"><label><p class="getlabel_value"  onclick="editLabel(this)">Email</p><input type="email" value="" name="" class="edit" id="edit" style="display: none;"></label><input class="form-control getvalue" type="email" /></div>'
                        );
                        $el.append($(
                            '<button type="button" class="remove"><span class="icon-trash"></span></button>'
                        ).click(function() {
                            $(this).parent().detach();
                        }));
                        $('#form1').append($el);
                    }
                    else if (ui.draggable.text().trim() == "Gender") {
                        var $el = $(
                            '<div class="drop-item form-group"><label><p class="getlabel_value" onclick="editLabel(this)">Gender</p><input type="text" value="" name="" class="edit" id="edit" style="display: none;"></label><div class="radio"><label><input type="radio" name="optradio" class="getvalue" ><label class="ml-1"><p>Male</p><input type="text" value="" name="" class="edit" id="edit" style="display: none;"></label></label><label style="margin-left:20px"><input  type="radio" name="optradio" class="getvalue" ><label class="ml-1"><p  >Female</p><input type="text" value="" name="" class="edit" id="edit" style="display: none;"></label></label></div></div>'
                        );
                        $el.append($(
                            '<button type="button" class="remove"><span class="icon-trash"></span></button>'
                        ).click(function() {
                            $(this).parent().detach();
                        }));
                        $('#form1').append($el);
                    } 					
					else if (ui.draggable.text().trim() == "Radio Button") {
                        var $el = $(
                            '<div class="drop-item form-group"><label><p class="getlabel_value" onclick="editLabel(this)">Click to Edit Label</p><input type="text" value="" name="" class="edit" id="edit" style="display: none;"></label><div class="radio"><label><input type="radio" name="optradio" class="getvalue" ><label class="ml-1"><p   onclick="editLabel(this)">Click to Edit Option1</p><input type="text" value="" name="" class="edit" id="edit" style="display: none;"></label></label><label style="margin-left:20px"><input  type="radio" name="optradio" class="getvalue" ><label class="ml-1"><p   onclick="editLabel(this)">Click to Edit Option2</p><input type="text" value="" name="" class="edit" id="edit" style="display: none;"></label></label></div></div>'
                        );
                        $el.append($(
                            '<button type="button" class="remove"><span class="icon-trash"></span></button>'
                        ).click(function() {
                            $(this).parent().detach();
                        }));
                        $('#form1').append($el);
                    } 
					else if(ui.draggable.text().trim() == "Text") {
                      var $el = $(
                            '<div class="drop-item form-group"><label><p class="getlabel_value " onclick="editLabel(this)"  >Click to Edit Label</p><input type="text" value="" name="" class="edit" id="edit" style="display: none;"></label><input class="form-control getvalue" type="email" /></div>'
                        );
                        $el.append($(
                            '<button type="button" class="remove"><span class="icon-trash"></span></button>'
                        ).click(function() {
                            $(this).parent().detach();
                        }));
                        $('#form1').append($el);
                    }else {
                      var $el = $(
                            '<div class="drop-item form-group"><label><p class="getlabel_value"   >'+ui.draggable.text().trim()+'</p><input type="text" value="" name="" class="edit" id="edit" style="display: none;"></label><input class="form-control getvalue" type="email" /></div>'
                        );
                        $el.append($(
                            '<button type="button" class="remove"><span class="icon-trash"></span></button>'
                        ).click(function() {
                            $(this).parent().detach();
                        }));
                        $('#form1').append($el);
                    }
                }
            }).sortable({
                items: '.drop-item',
                sort: function() {
                    $(this).removeClass("active");
                }
            });

            function editLabel(elm) {
                var jelm = $(elm);
                var htmlElm = jelm[0];
                $(htmlElm).hide();
                $(htmlElm).siblings('.edit').show();
                $(htmlElm).siblings('.edit').focus();
                var initial_text = $(htmlElm).text();
                $(htmlElm).siblings('.edit').focusout(function() {
                    var editedInput = $(htmlElm).siblings('.edit').val();
                    $(htmlElm).siblings('.edit').hide();
                    if (editedInput != '') {
                        $(htmlElm).show().text(editedInput);
                    } else {
                        $(htmlElm).show().text(initial_text);
                    }
                });
            }
            </script>

            <script>
     $(document).ready(function() {
    $("#btn1").click(function() {
        var title = $('#title').text();
        var htmlCode = $('#form1').html();
        $.ajax({
            url: "<?php echo base_url(); ?>savedynamicform",
            dataType: 'html',
            type: 'POST',
            data: {
                _token: '{!! csrf_token() !!}',
                html: htmlCode,
                title: title
            },
            success: function(data) {
                // Check the response for success
                if (data ==="success") {

               
                    toastr.success("Form saved successfully!");
                     window.location.href = "<?php echo base_url(); ?>/dynamic_form";
                } else {
                    toastr.error("Form save failed. Please try again.");
                }
            },
            error: function() {
                toastr.error("An error occurred while saving the form.");
            }
        });
    });
});
</script>
      