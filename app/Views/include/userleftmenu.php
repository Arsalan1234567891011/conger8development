<div class="card">
        <div class="card-head">
            <div class="media p-1">
                <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="<?php echo base_url(); ?>/public/app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span></div>
                <div class="media-body media-middle">
                    <h5 class="media-heading"><?php echo get_contact_name($id);?></h5>
                </div>
            </div>
        </div>
       
        <div class="card-body ">
            <p class="lead">More</p>
            <ul class="list-group" style="list-style: none;">
              <li><a href="<?php echo base_url('/contacts-profile/'.$id); ?>" class="list-group-item <?php echo ($foractive == 'contacts-profile')?'active':'' ?>">Profile</a></li>

              <li><a href="<?php echo base_url('/contactsinsert/'.$id); ?>" class="list-group-item <?php echo ($foractive == 'contactsinsert')?'active':'' ?>">Interests</a></li>

              <li><a href="<?php echo base_url('/tasks/'.$id); ?>" class="list-group-item <?php echo ($foractive == 'tasks')?'active':'' ?>">Tasks</a></li>

              <li><a href="<?php echo base_url('/conversation/'.$id); ?>" class="list-group-item <?php echo ($foractive == 'conversation')?'active':'' ?>">Conversations</a></li>

              <li><a href="<?php echo base_url('/notes/'.$id); ?>" class="list-group-item <?php echo ($foractive == 'notes')?'active':'' ?>">Notes</a></li>

              <li><a href="<?php echo base_url('/userattendance/'.$id); ?>" class="list-group-item <?php echo ($foractive == 'userattendance')?'active':'' ?>">Attendance</a></li>
              <li><a href="<?php echo base_url('/survey/'.$id); ?>" class="list-group-item <?php echo ($foractive == 'survey')?'active':'' ?>">Survey</a></li>
              <li><a href="<?php echo base_url('/prayer-request/'.$id); ?>" class="list-group-item <?php echo ($foractive == 'prayerrequest')?'active':'' ?>">Prayer Request</a></li>
              <li><a href="<?php echo base_url('/biptism-request/'.$id); ?>" class="list-group-item <?php echo ($foractive == 'baptismrequest')?'active':'' ?>">Baptism Request</a></li>
              <li><a href="<?php echo base_url('/bible_study/'.$id); ?>" class="list-group-item <?php echo ($foractive == 'biblestudy')?'active':'' ?>">Bible Study</a></li>
              <li><a href="<?php echo base_url('/tags/'.$id); ?>" class="list-group-item <?php echo ($foractive == 'tags')?'active':'' ?>">Tags</a></li>
            </ul>
        </div>
        <!--/More-->

    </div>
    <!--/ Predefined Views -->


