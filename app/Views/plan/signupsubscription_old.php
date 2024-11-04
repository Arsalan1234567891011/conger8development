
   <body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
      <!-- ////////////////////////////////////////////////////////////////////////////-->
      <div class="content-body">
         <section class="row">
            <div class="col-2"></div>
            <div class="col-9">
               <div class="card">
                  <div class="row justify-content-md-center">
                     <div class="row col-12">
                        <div class="card col-12">
                           <div class="card-header">
                              <h4 class="card-title" id="basic-layout-colored-form-control">Subscriptions</h4>
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
                           <div class="row">
                              <div class="col-md-2"></div>
                              <div class="col-2">
                                 <button type="button" class="btn  active" onclick="changeButtonColor(this)">Monthly</button>
                              </div>
                              <div class="col-2">
                                 <button type="button" class="btn active" onclick="changeButtonColor(this)">Yearly</button>
                              </div>
                              <div class="col-2">
                                 <button type="button" class="btn active" onclick="changeButtonColor(this)">Lifetime</button>
                              </div>
                           </div>
                           <!-- <div class="card-content collapse show"> -->
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
                                 <!-- //start -->
                                 <div class="container">
                                    <div class="row">
                                       <?php
                                          foreach($result as $row) {
                                          ?>
                                       <div class="col-md-4">
                                          <div class="card profile-card-with-cover">
                                             <div class="card-content card-deck text-center">
                                                <div class="card box-shadow">
                                                   <div class="card-header" style="background-color:<?php echo $row['pm_color']; ?> ;" !implements>
                                                      <h3 class="my-0 font-weight-bold text-white"><?php echo $row['pm_title'];?></h3>
                                                   </div>
                                                   <div class="card-body">
                                                      <h1 class="pricing-card-title" attr="<?php echo $row['pm_id'] ?>"><?php echo $row['pm_price']?><span><?php echo $row['pm_currency']; ?></span> <small class="text-muted">/ mo</small></h1>
                                                      <ul class="list-unstyled mt-2 mb-2">
                                                         <?php
                                                            //   $db = db_connect();                                                  
                                                            
                                                            //   $query = $db->table('plan_detail pd')
                                                            //   ->join('plan_master pm', 'pd.pd_pm_ref = pm.pm_id')
                                                            //   ->join('plan_option po', 'pd.pd_po_ref = po.po_id')
                                                            //   ->select('pm.pm_id, pm.pm_title, pm.pm_price, pm.pm_currency, pm.pm_color, pm.pm_isactive, pm.pm_user_ref, pm.pm_isdelete, pm.pm_sysdate, po.po_id, po.po_title, po.po_isactive, po.po_user_ref, po.po_delete, po.po_sysdate, pd.pd_id, pd.pd_pm_ref, pd.pd_po_ref, pd.pd_isactive, pd.pd_user_ref, pd.pd_isdeleted, pd.pd_sysdata')
                                                            //   ->where('pm.pm_id', $row['pm_id'])
                                                            //   ->where('pd.pd_isdeleted', 'Y')
                                                            //   ->where('po.po_delete', 'Y')
                                                            //   ->get();
                                                                               
                                                            
                                                            
                                                            // $option = $query->getResult();
                                                            
                                                            //   foreach($option as $Orow) {
                                                            // ?>
                                                         <li><?php //echo $Orow->po_title; ?></li>
                                                         <li><?php echo $row['pm_texteditor'] ?></li>
                                                         <?php
                                                            //   }
                                                            
                                                              ?>
                                                      </ul>
                                                      <a class="btn btn-lg btn-block btn-glow text-white signupButton" style="background-color:<?php echo $row['pm_color']; ?> ;"
                                                id="signupButton" href="payment/<?php echo $row['pm_id']; ?>">
                                                <?php echo $row['type'] ?>
                                                </a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- add another col-xl-4 div here to display another card in the same row -->
                                       </div>
                                       <?php
                                          }
                                          ?>
                                    </div>
                                 </div>
                                 <!-- //end -->
                              </div>
                              <!-- </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-2"></div>
         </section>
         </div>
      </div>
      </div>
      <script>


$(document).ready(function(){
    var btn="";
    changeButtonColor(btn);

});

         function myFunction() {
           var x = document.getElementById("password");
           if (x.type === "password") {
             x.type = "text";
           } else {
             x.type = "password";
           }
         }
         
         function changeButtonColor(btn) {


            if(btn==="")
            {

               var buttontext = "Monthly";

            }else{

      
 
               var buttontext = $(btn).text();
         
            }
            
      
        
         
         // remove the active class from all buttons
         $('.btn').removeClass('btn-primary');
         
         // add the active class to the clicked button
         $(btn).addClass('btn-primary');
         // alert('gemdrge');
         $.ajax({
         type: "POST",
         
         url: "<?php echo base_url(); ?>getpackagesbytime", //Enter full URL
         data: { id: buttontext },
         dataType: 'json',
         success: function(data) {
         
         $('.pricing-card-title').each(function(index) {
         var pmPrice;

         if (buttontext == "Monthly") {
                pmPrice = data[index].pm_price;
                planParam = 'm';
            } else if (buttontext == "Yearly") {
                pmPrice = data[index].pm_yearly;
                planParam = 'y';
            } else {
                pmPrice = data[index].pm_lifetime;
                planParam = 'l';
            }
         $(this).empty().html(pmPrice + '<span>' + data[index].pm_currency + '</span> <small class="text-muted">/ mo</small>');

         var pmId = data[index].pm_id; // Assuming you have a way to get the plan ID
            var signupButton = $(this).siblings('.signupButton');

            // Update the link in the "Sign up" button with the plan parameter
            signupButton.attr('href', 'payment/' + pmId + '/' + planParam);
         });
         
         }
         });
         
         }
         
         
         
      </script>
<!-- <script>
   $(document).ready(function() {
   $(".signupButton").click(function() {
      var pmId = $(this).data("pm-id"); 
      // alert(pmId);
      $.ajax({
         type: "POST", 
         url: "<?php //echo base_url(); ?>getplanid", 
         data: { pmId: pmId },
         success: function(response) {
         
         console.log(response); 
         window.location.href = "<?php echo base_url(); ?>";
         },
         error: function(xhr, status, error) {
         
         console.error(error);
         }
      });
   });
   });
</script> -->
   </body>
</html>