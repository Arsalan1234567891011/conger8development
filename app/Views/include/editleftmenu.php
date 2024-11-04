<?php

$request = \Config\Services::request();

$foractive = $request->uri->getSegment(1);

?>



<div class="card">



        <div class="card-head">



            <div class="media p-1">



                <div class="media-left pr-1">

                    <span class="avatar avatar-sm avatar-online rounded-circle">

                    <img src="<?php echo base_url(); ?>public/app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i>

                    </span>
                </div>



                <div class="media-body media-middle">



                    



                <?php







                // $session = session();



                //  $contactData = session()->get();



                // echo ($contactData['contact_name']);







                //  var_dump($userData);







                //  exit;










                 echo get_user_name(session()->user_id);





                ?>



                                </div>



            </div>



        </div>



       



        <div class="card-body ">



            <p class="lead">More</p>



            <ul class="list-group" style="    list-style: none;">



            <li><a href="<?php echo base_url('/view-profile'); ?>" class="list-group-item <?php echo ($foractive == 'view-profile')?'active':'' ?>">Profile</a></li>

            <li><a href="<?php echo base_url('/edit-password'); ?>" class="list-group-item <?php echo ($foractive == 'edit-password')?'active':'' ?>">Security</a></li>          





              



            </ul>



        </div>



        <!--/More-->







    </div>



    <!--/ Predefined Views -->



