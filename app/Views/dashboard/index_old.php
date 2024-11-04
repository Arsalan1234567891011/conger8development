<?php
$user_church_id = session()->user_church_id;
?>
<div class="app-content content">

      <div class="content-wrapper">

        <div class="content-header row">

        </div>

        <div class="content-body"><!-- Sales stats -->


        <!-- start filter -->

<div class="row">

<div class="col-12">

    <div class="card">

        <div class="card-content">

            <div class="card-body">

                <div class="row">

                    <div class="col-lg-2 col-sm-12 border-right-blue-grey border-right-lighten-5">

                        <label>From Date</label>

                        <input type="text" class="form-control validate dtpickdate" id="from_date" required="" autocomplete="off">

                    </div>


                    <div class="col-lg-2 col-sm-12 border-right-blue-grey border-right-lighten-5">

                        <label>To Date</label>

                        <input type="text" class="form-control validate dtpickdate" id="to_date" required="" autocomplete="off">
                    
                    </div>

                    <div class="col-lg-2 col-sm-12 border-right-blue-grey border-right-lighten-5">

                        <label>Action</label>

                        <input type="button" class="form-control btn btn-danger w-md" id="btnfilter" value="Filter">
                    
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>


<input type="hidden" value="<?php echo $user_church_id ?>" id="chr_id" >

<!-- end filter -->

<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-content">

                <div class="card-body">

                    <div class="row">

                        <div class="col-lg-4 col-sm-12 border-right-blue-grey border-right-lighten-5">

                            <div class="pb-1">

                                <div class="clearfix mb-1">

                                    <i class="icon-star font-large-1 blue-grey float-left mt-1"></i>

                                    <span class="font-large-2 text-bold-300 info float-right" id="get_All_visitors" attr="<?php echo $user_church_id ?>">
                                       
                                    </span>

                                </div>

                                <div class="clearfix">

                                    <span class="text-muted">Total Visitors</span>

                                </div>

                            </div>

                            <div class="progress mb-0" style="height: 7px;">

                                <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>

                            </div>

                        </div>

                        <div class="col-lg-4 col-sm-12 border-right-blue-grey border-right-lighten-5">

                            <div class="pb-1">

                                <div class="clearfix mb-1">

                                    <i class="icon-user font-large-1 blue-grey float-left mt-1"></i>

                                    <span class="font-large-2 text-bold-300 danger float-right" id="first_time_visitors" attr="<?php echo $user_church_id ?>">
                                      
                                    </span>

                                </div>

                                <div class="clearfix">

                                    <span class="text-muted">First Time Visitors</span>

                                  

                                </div>

                            </div>

                            <div class="progress mb-0" style="height: 7px;">

                                <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>

                            </div>

                        </div>

                        <div class="col-lg-4 col-sm-12 border-right-blue-grey border-right-lighten-5">

                            <div class="pb-1">

                                <div class="clearfix mb-1">

                                    <i class="icon-shuffle font-large-1 blue-grey float-left mt-1"></i>

                                    <span class="font-large-2 text-bold-300 success float-right" id="get_returning_visitors" attr="<?php echo $user_church_id ?>">
                                      
                                    </span>

                                </div>

                                <div class="clearfix">

                                    <span class="text-muted">Returning Visitors</span>

                                </div>

                            </div>

                            <div class="progress mb-0" style="height: 7px;">

                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>

                            </div>

                        </div>

                        

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>





<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-content">

                <div class="card-body">

                    <div class="row">

                        <div class="col-lg-4 col-sm-12 border-right-blue-grey border-right-lighten-5">

                            <div class="pb-1">

                                <div class="clearfix mb-1">

                                    <i class="icon-star font-large-1 blue-grey float-left mt-1"></i>

                                    <span class="font-large-2 text-bold-300 info float-right" id="member_in_att" attr="<?php $user_church_id ?>">
                                     
                                    </span>

                                </div>

                                <div class="clearfix">

                                    <span class="text-muted">Members in Attendnace</span>

                                </div>

                            </div>

                            <div class="progress mb-0" style="height: 7px;">

                                <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>

                            </div>

                        </div>

                        <div class="col-lg-4 col-sm-12 border-right-blue-grey border-right-lighten-5">

                            <div class="pb-1">

                                <div class="clearfix mb-1">

                                    <i class="icon-user font-large-1 blue-grey float-left mt-1"></i>

                                    <span class="font-large-2 text-bold-300 danger float-right"id="Congregation_in_Attendance">
                                     
                                    </span>

                                </div>

                                <div class="clearfix">

                                    <span class="text-muted">Congregation in Attendance</span>

                                  

                                </div>

                            </div>

                            <div class="progress mb-0" style="height: 7px;">

                                <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>

                            </div>

                        </div>

                        <div class="col-lg-4 col-sm-12 border-right-blue-grey border-right-lighten-5">

                            <div class="pb-1">

                                <div class="clearfix mb-1">

                                    <i class="icon-shuffle font-large-1 blue-grey float-left mt-1"></i>

                                    <span class="font-large-2 text-bold-300 success float-right">0</span>

                                </div>

                                <div class="clearfix">

                                    <span class="text-muted">Form Filled Out</span>

                                </div>

                            </div>

                            <div class="progress mb-0" style="height: 7px;">

                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>

                            </div>

                        </div>

                        

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>




<!--/ Sales stats -->

<!-- Sales by Campaigns & Year -->


<!--/ Sales by Campaigns & Year -->



<!-- Recent Orders -->

<div class="row">

    <div class="col-xl-4 col-lg-12">

        <div class="card white bg-info text-center">

            <div class="card-content">

                <div class="card-body py-3">

                    <img src="<?php echo base_url();?>public/app-assets/images/dashboard-img-1.jpg" alt="element 01" width="140" class="float-left">

                    <h4 class="white mt-3 mb-2">Learn About Our UsherBot</h4>

                    <p class="card-text">Generate More Interests And Baptisms</p>

                    <a href='https://usherbot.com/usherbot' class="btn btn-info btn-darken-3">Learn More</a>

                </div>

            </div>

        </div>

        <div class="card bg-info">

            <div class="card-content">

                <div class="card-body">

                    <div class="media">

                        <div class="media-left media-middle">

                            <i class="ft-bar-chart-2 white font-large-2 float-left"></i>

                        </div>

                        <div class="media-body white text-right">

                            <h3 class="white">1,278</h3>

                            <span>Most Loved</span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-xl-8 col-lg-12">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">Recent Contacts</h4>

                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>

                <div class="heading-elements">

                    <ul class="list-inline mb-0">

                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>

                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                    </ul>

                </div>

            </div>

            <div class="card-content">


                <div class="table-responsive">

                    <?php
                    $data=get_last_contact(get_user_church());
                    ?>

                    <table id="recent-orders" class="table table-hover mb-0">

                        <thead>

                            <tr>

                                <th>Name</th>

                                <th>Email</th>

                                <th>Phone</th>

                                <th>Status</th>

                                <th>Type</th>

                            </tr>

                        </thead>

                        <tbody>
                            <?php
                            $config         = new \Config\Encryption();
                            $encrypter = \Config\Services::encrypter($config);

                            foreach($data as $row)
                            {
                            ?>
                            <tr>
                                <td class="text-truncate"><a href="contacts-profile/<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a></td>

                                <td class="text-truncate"><?php echo $encrypter->decrypt(base64_decode($row['email'])); ?></td>

                                <td class="text-truncate"><?php echo $encrypter->decrypt(base64_decode($row['phone'])); ?></td>

                                <td class="text-truncate"><?php echo $row["status"]; ?></td>

                                <td class="text-truncate"><?php echo $row["form_type"]; ?></td>

                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<!--/ Recent Orders -->

<!-- Map Based Selling -->



<!--/ Map Based Selling -->



<!-- social updates -->



<!--/ social updates -->

<!-- most selling products -->



<!--/ most selling products-->



        </div>

      </div>

</div>


