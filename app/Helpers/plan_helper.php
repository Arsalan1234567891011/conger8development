<?php

//Savetask = 3

// savenotes=4

function set_toast_message($message, $type)
    {
        $session = \Config\Services::session();
        $session->setFlashdata('toast_message', [
            'message' => $message,
            'type' => $type,
        ]);
    }

function get_user_notes_limit($userid,$type){

	$db      = \Config\Database::connect();


    $sql = "SELECT count(*) as cnt from notes where userid = ".$userid." and type = '".$type."' and r_status = 'Y' "; 

	$query = $db->query($sql); 

	$row = $query->getRow(); 

	if($row){

		return $row->cnt;

	}else{

		return 0;
	}

}


function get_user_contacts_limit($userid){

	$db      = \Config\Database::connect();


    $sql = "SELECT count(*) as cnt from contacts where church_id = ".$userid." and r_status = 'Y' "; 

	$query = $db->query($sql); 

	$row = $query->getRow(); 

	if($row){

		return $row->cnt;

	}else{

		return 0;
	}

}



// option=28

function get_user_count($userid){

	$db      = \Config\Database::connect();

    $sql = "SELECT count(*) as cnt from users where parent = ".$userid." and rstatus = 'Y' "; 

	$query = $db->query($sql); 

	$row = $query->getRow(); 

	if($row){

		return $row->cnt;

	}else{

		return 0;
	}

}











function user_plan_limit($planid,$optionid) {

	$db      = \Config\Database::connect();


    $sql = "SELECT pd_po_quantity from plan_detail where pd_pm_ref = ".$planid." and pd_po_ref = ".$optionid." and pd_isdeleted = 'Y' "; 

	$query = $db->query($sql); 
	$row = $query->getRow(); 
	if($row){
		return $row->pd_po_quantity;
	}else{
		return 0;
	}

}


function get_user_current_plan($id) {

	$db      = \Config\Database::connect();


    $sql = "SELECT plan_id from Plan_Subscription where church_id = ".$id."  and plan_status = 'Y' and plan_rstatus = 'Y'"; 

	$query = $db->query($sql); 

	$row = $query->getRow(); 
	
	if($row){
		return $row->plan_id;
	}else{
		return 0;
	}

}





?>