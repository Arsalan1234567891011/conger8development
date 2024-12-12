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



?>


<div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">



      <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

      <!-- <ul class="menu-content"> -->





      <?php
          $data = gettingmenuzero();

          foreach ($data as $row) {
              echo '<li class="nav-item">';
              echo '<a href="' . base_url() .$row['url'] . '"><i class="' . $row['icon'] . '"></i><span class="menu-title" data-i18n="nav.dash.main">' . $row['title'] . '</span></a>';
              
              // Check if child items exist before showing the dropdown
              $childItems = gettingchild($row['menu_id']);

            

              if (!empty($childItems)) {
                  echo '<ul class="sub-menu">'; // Start the dropdown
                  echo $childItems; // Display child items
                  echo '</ul>'; // End the dropdown
              }
              
              echo '</li>';
          }
          ?>

            <!-- </ul> -->
          
              </ul>



      </div>



    </div>
    
    <style>
        .main-menu .navigation li > a > i, .main-menu .dropdown-menu i, .main-menu .dropdown-user > a > i, .main-menu .navigation > li > a > i {
    float: left;
}
    </style>