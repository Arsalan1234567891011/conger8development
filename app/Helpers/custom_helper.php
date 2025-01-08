

<?php
use App\Models\UserModel;
use App\Models\Billing;
use App\Models\PlanModel;
use App\Models\subscription_detail;
function get_att_link() {

	$db      = \Config\Database::connect();
	$userData = session()->get();


    //$sql = "SELECT att_link from users where id = ".$userData['user_id']." ";     


    $sql = "SELECT att_link from manage_church where id = ".session()->user_church_id." "; 

	//return $sql;
	$query = $db->query($sql); 
	$row = $query->getRow(); 
	if($row){
		return $row->att_link;
	}else{
		return "#";
	}
		// return $row->datetime1;

}
function getbillinguser() {

    $billing = new Billing();
    $data = $billing->where('bl_church', session()->user_church_id)->countAllResults();
    return $data;    
    
}
function getsubscription_detail() {
    $subscription = new subscription_detail();
    $data = $subscription->where('sd_church_id',session()->user_church_id)->where('sd_isdeleted','Y')->first();
    $subscription_id =  $data['sd_subscriptionid'];
    $stripe = new \Stripe\StripeClient(getenv("stripe.secret"));  
    $data = $stripe->subscriptions->retrieve($subscription_id,[]);  
    return $data;    
}
function getinvoices() {
    $subscription = new subscription_detail();
    $data = $subscription->where('sd_church_id', session()->user_church_id)->where('sd_isdeleted', 'Y')->first();
    $subscription_id = $data['sd_subscriptionid'];
    $stripe = new \Stripe\StripeClient(getenv("stripe.secret"));  
    $invoices = $stripe->invoices->all([
        'subscription' => $subscription_id,
    ]);
    $paidInvoices = array_filter($invoices->data, function ($invoice) {
        return $invoice->amount_paid != 0;
    });

    return $invoices;    
}
function getPlan() {

    $plan = new PlanModel();
    $data =  $plan->where('pm_visibility',1)->findAll();
    return $data;     
}

function get_plan_quantity($optionid,$id) {

	$db      = \Config\Database::connect();
	

	$sql = "SELECT pd_po_quantity FROM plan_detail where pd_po_ref=".$optionid." AND pd_isdeleted = 'Y' AND pd_pm_ref = ".$id."";       
	// return $sql;
	$query = $db->query($sql);      
	$row = $query->getRow();
	if (!empty($row)) {
        // Fetch the first row and return it
         $pd_po_quantity=$query->getRow();
		 return $pd_po_quantity->pd_po_quantity;
    } else {
        return null; // Return null if no matching row found
    }

}

function get_checkin_quantity($optionid,$id) {

	$db      = \Config\Database::connect();
	

	$sql = "SELECT pd_po_ref FROM plan_detail where pd_po_ref=".$optionid." AND pd_isdeleted = 'Y' AND pd_pm_ref = ".$id."";       
	// return $sql;
	$query = $db->query($sql);      
	$row = $query->getRow();
	if (!empty($row)) {
        // Fetch the first row and return it
         $pd_po_ref=$query->getRow();
		 return $pd_po_ref->pd_po_ref;
    } else {
        return null; // Return null if no matching row found
    }

}


function get_event_name($id) {

	$db      = \Config\Database::connect();
	$userData = session()->get();


    //$sql = "SELECT att_link from users where id = ".$userData['user_id']." ";     


    $sql = "SELECT mc_title from manage_checkins where  mc_id = $id "; 

	//return $sql;
	$query = $db->query($sql); 
	$row = $query->getRow(); 
	if($row){
		return $row->mc_title;
	}else{
		return "Main Church Check In";
	}
		// return $row->datetime1;

}



function get_church_by_att_link($id) {

	$db      = \Config\Database::connect();
	$userData = session()->get();

    //$sql = "SELECT att_link from users where id = ".$userData['user_id']." ";     

    $sql = "SELECT id from manage_church where att_link = '".$id."' "; 

	//return $sql;
	$query = $db->query($sql); 
	$row = $query->getRow(); 
	if($row){
		return $row->id;
	}else{
		return 0;
	}
		// return $row->datetime1;

}


function get_user_role($id) {

	$db      = \Config\Database::connect();

    $sql = "SELECT role from users where id = ".$id." ";     

	//return $sql;
	$query = $db->query($sql); 
	$row = $query->getRow(); 
	if($row){
		return $row->role;
	}else{
		return "#";
	}
		// return $row->datetime1;

}


function get_user_name($id) {

   $model=new UserModel();
   $row=$model->where('id',$id)->first();
   if($row){
		return $row['name'];
   }else{
		return "#";
	}


	$db      = \Config\Database::connect();
	

}


function get_user_email($id) {

   $model=new UserModel();
   $row=$model->where('id',$id)->first();
   if($row){
		return $row['email'];
   }else{
		return "#";
	}


	$db      = \Config\Database::connect();
	

}


function get_user_church() {

	$db      = \Config\Database::connect();
	$userData = session()->get();
    $sql = "SELECT church_id from users where id = ".$userData['user_id']." ";        
	//return $sql;
	$query = $db->query($sql);        
	$row = $query->getRow(); 
	if($row){
		return $row->church_id;
	}else{
		return 0;
	}
	// return $row->datetime1;
}


function getusercurrentplan()
{

	$db      = \Config\Database::connect();
	$userData = session()->get();

    $sql = "SELECT plan_id,pm_title FROM `Plan_Subscription`
JOIN plan_master ON Plan_Subscription.plan_id =plan_master.pm_id
WHERE  plan_rstatus='Y' AND plan_rstatus='Y' AND  church_id=".$userData['user_church_id']." ";      
	//return $sql;
	$query = $db->query($sql);        
	$row = $query->getRow(); 
	if($row){
		return $row->pm_title;
	}else{
		return 0;
	}



}


function get_contact_name($userid) {

	$db      = \Config\Database::connect();
	

	$sql = "SELECT name from contacts WHERE id = '".$userid."' ";       
	//return $sql;
	$query = $db->query($sql);      
	$row = $query->getRow();
	return $row->name;

}


function get_user_all_churches() {

	$db      = \Config\Database::connect();
	$userData = session()->get();
    //$sql = "SELECT church_id from users where id = ".$userData['user_id']." ";

    $sql = "SELECT
    manage_church.id as cid,manage_church.church_name,manage_church.church_email,
    manage_church.phone,manage_church.website,manage_church.pastor_name,
    manage_church.time_zone,manage_church.default_church
    FROM `manage_church` 
    inner join user_churches on manage_church.id = user_churches.church_ref
    where manage_church.rstatus = 'Y' and user_churches.rstatus = 'Y'
     ";

    $sql .= " AND manage_church.parentid = ".$userData['user_id'];
 
	//echo  $sql;
	$query = $db->query($sql);        
	$row = $query->getResultArray(); 
	
	return $row;
	
}


function get_switch_churches() {

	$db      = \Config\Database::connect();
	$userData = session()->get();
    //$sql = "SELECT church_id from users where id = ".$userData['user_id']." ";

    $sql = "SELECT id,(select church_name from manage_church where id = church_ref) as church_name,church_ref from user_churches where rstatus = 'Y'";
    $sql .= " AND user_ref = ".$userData['user_id'];
 
	//echo  $sql;
	$query = $db->query($sql);        
	$row = $query->getResultArray(); 
	
	return $row;
	
}



function get_sub_user_att_link() {

	$db      = \Config\Database::connect();
	$userData = session()->get();
	$parent = get_parent_user($userData['user_id']);   

    $sql = "SELECT att_link from users where id = ".$parent." ";       

	//return $sql;
	$query = $db->query($sql);   
	$row = $query->getRow(); 
	if($row){

		return $row->att_link;

	}else{

		return "#";

	}

}


function get_returning_visitors($church_id, $start_date, $end_date) {
    $db = \Config\Database::connect();
    $userData = session()->get();

    $sql = "SELECT count(cid) as cnt
    FROM (
        SELECT a.contact_id as cid, count(a.contact_id)
        FROM `tab_attandance` a
        LEFT JOIN contacts c ON c.id = a.contact_id
        WHERE c.r_status = 'Y' AND a.rstatus = 'Y' AND form_type = 'Visitor' AND a.church_id = ".$church_id;

if (isset($start_date) && $start_date !== "" && isset($end_date) && $end_date !== "") {
    $sql .= " AND DATE(a.check_in) >= '".$start_date."' AND DATE(a.check_in) <= '".$end_date."'";
}


    $sql .= " GROUP BY a.contact_id
    HAVING COUNT(a.contact_id) > 1
    ) AS A";

    $query = $db->query($sql);
    $row = $query->getRow();
    if (empty($row)) {
        return 0;
    } else {
        return $row->cnt;
    }
}



function get_parent_user($id) {
	$db      = \Config\Database::connect();
	$userData = session()->get();
    $sql = "SELECT parent from users where id = ".$id." "; 
	//return $sql;
	$query = $db->query($sql);    
	$row = $query->getRow(); 
	return $row->parent;
}



function get_time_zone($id) {
	$db      = \Config\Database::connect();
	$userData = session()->get();
    $sql = "SELECT church_id from contacts where id = ".$id." ";    
	$query = $db->query($sql);
	$row = $query->getRow(); 
	$sql1 = "SELECT time_zone from manage_church where id = ".$row->church_id." ";
	// echo $sql1;
    // exit();
	$query1 = $db->query($sql1);
	$row1 = $query1->getRow(); 
	return $row1->time_zone;
}
function get_All_visitors($church_id, $start_date, $end_date) {
    $db = \Config\Database::connect();
    $userData = session()->get();
  
    $sql = "SELECT count(*) as cntt FROM (
        SELECT a.contact_id as cnt
        FROM `tab_attandance` a
        LEFT JOIN contacts c ON c.id = a.contact_id
        WHERE c.r_status = 'Y' AND a.rstatus = 'Y' AND form_type = 'Visitor' AND a.church_id = ".$church_id;

if (isset($start_date) && $start_date !== "" && isset($end_date) && $end_date !== "") {
    $sql .= " AND DATE(a.check_in) >= '".$start_date."' AND DATE(a.check_in) <= '".$end_date."'";
}


    $sql .= " GROUP BY a.contact_id
    ) as A";


	//return  $sql;

    
    $query = $db->query($sql);
    $row = $query->getRow();

	if($row){
    return $row->cntt;

	}else{

		return 0;
	}
}

function first_time_visitors($church_id, $start_date, $end_date) {
    $db = \Config\Database::connect();
    $userData = session()->get();

    $sql = "SELECT count(cid) as cnt
        FROM (
            SELECT a.contact_id as cid, count(a.contact_id) 
            FROM `tab_attandance` a
            LEFT JOIN contacts c ON c.id = a.contact_id
            WHERE c.r_status = 'Y' AND a.rstatus = 'Y' AND form_type = 'Visitor' AND a.church_id = ".$church_id;

if (isset($start_date) && $start_date !== "" && isset($end_date) && $end_date !== "") {
    $sql .= " AND DATE(a.check_in) >= '".$start_date."' AND DATE(a.check_in) <= '".$end_date."'";
}


    $sql .= " GROUP BY a.contact_id
        HAVING COUNT(a.contact_id) = 1
    ) AS A";
    
    $query = $db->query($sql);
    $row = $query->getRow();
    if (empty($row)) {
        echo 0;
    } else {
        return $row->cnt;
    }
}


function new_contacts($church_id) {

	$db      = \Config\Database::connect();
	$userData = session()->get();

	$sql = "SELECT id,count(id) as cnt from contacts WHERE church_id = ".$church_id." AND id NOT IN (select contact_id from tab_attandance) GROUP by id";       
	//return $sql;
	$query = $db->query($sql);      
	$row = $query->getRow();
	if(empty($row))
	{
		echo 0;
	}
	else
	{
		return $row->cnt;
	}
	// return $row->datetime1;

}
function member_in_att($church_id, $start_date, $end_date) {
    $db = \Config\Database::connect();
    $userData = session()->get();

    $sql = "SELECT count(cnt) as cntt FROM (
        SELECT a.contact_id as cnt
        FROM `tab_attandance` a
        LEFT JOIN contacts c ON c.id = a.contact_id
        WHERE c.r_status = 'Y' AND a.rstatus = 'Y' AND form_type = 'Member' AND a.church_id = ".$church_id;

if (isset($start_date) && $start_date !== "" && isset($end_date) && $end_date !== "") {
    $sql .= " AND DATE(a.check_in) >= '".$start_date."' AND DATE(a.check_in) <= '".$end_date."'";
}


    $sql .= " GROUP BY a.contact_id
    ) AS A";
    
    $query = $db->query($sql);
    $row = $query->getRow();
    if (empty($row)) {
        return 0;
    } else {
        return $row->cntt;
    }
}



function sendmail($to,$subject,$message){


	$email = \Config\Services::email();

    $email->setTo($to);

    $email->setFrom('noreply@congreg8.org', 'congreg8');

    $email->setSubject($subject);

    $email->setMessage($message);

    if ($email->send()) 
    {
    	return true;
    } 
    else
    {
    	return false;
    }

}


function get_contact_by_manychat_id($manychatid) {

	$db      = \Config\Database::connect();
	$userData = session()->get();

	$sql = "SELECT * from contacts WHERE manychat_id = '".$manychatid."' ";       
	//return $sql;
	$query = $db->query($sql);      
	$row = $query->getRow();
	return $row;

}


function get_church_name($churchid) {

	$db      = \Config\Database::connect();
	

	$sql = "SELECT * from manage_church WHERE id = '".$churchid."' ";       
	//return $sql;
	$query = $db->query($sql);      
	$row = $query->getRow();
	return $row->church_name;

}


function get_user_image($userid) {

	$db      = \Config\Database::connect();
	

	$sql = "SELECT image from users WHERE id = '".$userid."' ";       
	//return $sql;
	$default = "/public/app-assets/images/portrait/small/avatar-s-1.png";

	$query = $db->query($sql);      
	$row = $query->getRow();
	if(!empty($row->image))
	{
	return '/uploads/'.$row->image;
	}
	else 
	{
		return $default;
	}

}

function get_contact_id_name($churchid) {

	$db      = \Config\Database::connect();
	

	$sql = "SELECT id,name from contacts WHERE church_id = '".$churchid."' ";       
	//return $sql;
	$query = $db->query($sql);      
	$row = $query->getResultArray();
	return $row;

}


function get_last_contact($churchid) {

	$db      = \Config\Database::connect();
	$sql="SELECT * FROM contacts WHERE church_id = ".$churchid." and r_status = 'Y'  ORDER BY ID DESC LIMIT 5";
	//return $sql;
	$query = $db->query($sql);      
	$row = $query->getResultArray();
	return $row;
}
function get_user_id_name($churchid) {

	$db      = \Config\Database::connect();
	

	$sql = "SELECT id,name from users WHERE church_id = '".$churchid."' AND rstatus = 'Y' ";       
	// return $sql;
	$query = $db->query($sql);      
	$row = $query->getResultArray();
	return $row;

}
// function getTimeZoneName() {
// 	 $date = new Date();
// 	 $timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
// 	return timeZone;
// }


function gettingmenuzero()
{
	$userData = session()->get();

	$db    = \Config\Database::connect();
	$role  = "SELECT * FROM `user_group` where user_id = ".$userData['user_id']."";
	$query = $db->query($role);
	$role  = $query->getRow();
		
		
	if(!isset($role)){

		$add_user_group="INSERT INTO `user_group` SET user_id = ".$userData['user_id'].",group_id = 2 ";
		$query = $db->query($add_user_group);

		$Frole = 2;

	}else{

		$Frole=$role->group_id;

	}

	$sql = "SELECT
    sm.menu_id,
    sm.parent,
    sm.title,
    sm.icon,
    sm.url,
    MAX(sm.isactive) AS menu_isactive,  
    MAX(sm.sorting) AS sorting,         
    MAX(gm.group_menu_id) AS group_menu_id,  
    MAX(gm.group_id) AS gm_group_id,         
    MAX(gm.isactive) AS group_menu_isactive,  
    MAX(gm.created_at) AS created_at,        
    MAX(ug.user_group_id) AS user_group_id, 
    MAX(ug.user_id) AS user_id,              
    MAX(ug.isactive) AS user_group_isactive  
	FROM side_menu AS sm 
	JOIN group_menu AS gm ON sm.menu_id = gm.sidebarmenu_id 
	JOIN user_group AS ug ON gm.group_id = ug.group_id 
	WHERE sm.parent = 0 AND ug.isactive = 'Y' AND gm.isactive = 'Y' AND gm.group_id=".$Frole."
	GROUP BY
		sm.menu_id,
		sm.parent,
		sm.title,
		sm.icon,
		sm.url
	ORDER BY sorting;
	";
	// var_dump($sql);
	// exit;

	$query = $db->query($sql);
	$row = $query->getResultArray();
	if (!empty($row)) {
        // Fetch the first row and return it
		 return $row;
    } else {
        return null; // Return null if no matching row found
    }

}
function gettingchild($parentid)
{
    $db = \Config\Database::connect();
    $userData = session()->get();
    $role = "SELECT * FROM `user_group` WHERE user_id = " . $userData['user_id'] . "";
    $query = $db->query($role);
    $role = $query->getRow();
    $Frole = $role->group_id;

    if ($Frole == "") {
        $Frole = 2;
    }

    $sql = "SELECT
        sm.menu_id,
        sm.parent,
        sm.title,
        sm.icon,
        sm.url,
        sm.type, -- Add type to the query
        MAX(sm.isactive) AS menu_isactive,  
        MAX(sm.sorting) AS sorting,         
        MAX(gm.group_menu_id) AS group_menu_id,  
        MAX(gm.group_id) AS gm_group_id,         
        MAX(gm.isactive) AS group_menu_isactive,  
        MAX(gm.created_at) AS created_at,        
        MAX(ug.user_group_id) AS user_group_id, 
        MAX(ug.user_id) AS user_id,              
        MAX(ug.isactive) AS user_group_isactive  
    FROM side_menu AS sm 
    JOIN group_menu AS gm ON sm.menu_id = gm.sidebarmenu_id 
    JOIN user_group AS ug ON gm.group_id = ug.group_id 
    WHERE sm.parent = " . $parentid . " AND ug.isactive = 'Y' AND gm.isactive = 'Y' AND gm.group_id = " . $Frole . "
    GROUP BY
        sm.menu_id,
        sm.parent,
        sm.title,
        sm.icon,
        sm.url,
        sm.type -- Include type in the grouping
    ORDER BY sorting;
    ";

    $query = $db->query($sql);
    $rows = $query->getResultArray();

    $output = '';
    if (!empty($rows)) {
        foreach ($rows as $row) {
            $url = $row['url'];

            // Check if the type is one
            if ($row['type'] == 1) {
                // Fetch the att_link from the user table based on the session user ID
                $uniqueId = fetchUniqueIdFromUserTable($userData['user_church_id']);
                if ($uniqueId !== false) {
                    // Create a custom URL based on the att_link and unique ID
                   $url = 'https://form.congreg8.org/markattendance.php?id=' . $uniqueId;
                }
            }

            $output .= '<li class="nav-item"><a href="' .base_url(). $url . '"><i class="' . $row['icon'] . '"></i><span class="menu-title" data-i18n="nav.dash.main">' . $row['title'] . '</span></a></li>';
        }
    }
    return $output;
}

function gettingchildnew($parentid)
{
    $db = \Config\Database::connect();
    $userData = session()->get();
    $role = "SELECT * FROM `user_group` WHERE user_id = " . $userData['user_id'] . "";
    $query = $db->query($role);
    $role = $query->getRow();
    $Frole = $role->group_id;

    if ($Frole == "") {
        $Frole = 2;
    }

    $sql = "SELECT
        sm.menu_id,
        sm.parent,
        sm.title,
        sm.icon,
        sm.url,
        sm.type, -- Add type to the query
        MAX(sm.isactive) AS menu_isactive,  
        MAX(sm.sorting) AS sorting,         
        MAX(gm.group_menu_id) AS group_menu_id,  
        MAX(gm.group_id) AS gm_group_id,         
        MAX(gm.isactive) AS group_menu_isactive,  
        MAX(gm.created_at) AS created_at,        
        MAX(ug.user_group_id) AS user_group_id, 
        MAX(ug.user_id) AS user_id,              
        MAX(ug.isactive) AS user_group_isactive  
    FROM side_menu AS sm 
    JOIN group_menu AS gm ON sm.menu_id = gm.sidebarmenu_id 
    JOIN user_group AS ug ON gm.group_id = ug.group_id 
    WHERE sm.parent = " . $parentid . " AND ug.isactive = 'Y' AND gm.isactive = 'Y' AND gm.group_id = " . $Frole . "
    GROUP BY
        sm.menu_id,
        sm.parent,
        sm.title,
        sm.icon,
        sm.url,
        sm.type -- Include type in the grouping
    ORDER BY sorting;
    ";

    $query = $db->query($sql);
    $rows = $query->getResultArray();

    $output = '';
    if (!empty($rows)) {
        foreach ($rows as $row) {
            $url = $row['url'];

            // Check if the type is one
            if ($row['type'] == 1) {
                // Fetch the att_link from the user table based on the session user ID
                $uniqueId = fetchUniqueIdFromUserTable($userData['user_church_id']);
                if ($uniqueId !== false) {
                    // Create a custom URL based on the att_link and unique ID
                   $url = 'https://form.congreg8.org/markattendance.php?id=' . $uniqueId;
                }
            }

            $output .= '<li class="nav-item"><a href="' . $url . '" class="nav-link">' . $row['title'] . ' </a></li>';       
        }
    }
    return $output;
}

// Modify this function to fetch the att_link from your user table
function fetchUniqueIdFromUserTable($userId) {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT att_link FROM `manage_church` WHERE id = " . $userId);
    $row = $query->getRow();

    if ($row !== null) {
        return $row->att_link;
    } else {
        return false; // Return false if the att_link couldn't be fetched
    }
}


?>