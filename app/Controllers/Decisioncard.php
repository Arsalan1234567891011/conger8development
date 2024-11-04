<?php

namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\UserModel;
use App\Models\DecisioncardModel;


require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;






class Decisioncard extends BaseController
{

	public function index(){


		$data['title']="All Decision"; 
	
		$data['page']="Admin/dashboard"; 
	
	
	
		echo view('include/new/head',$data);
        echo view('/include/new/topheader',$data); 
        echo view('/include/new/sidenavbar',$data); 
		echo view('decisioncard/index');
	
	
	
	
	}


	public function getdecisiondata()
    {
        $db = db_connect();
    
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows displayed per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['data']; 
	
		
		// Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue = $_POST['search']['value']; // Search value
        $searchByChurch = $_POST['searchByChurch'];
        $searchByType = $_POST['searchByType'];
    
        $urole = get_user_role(session()->user_id);


$userid = session()->get('user_id');
$get_user_current_plan = get_user_current_plan($userid);
$user_plan_limit = user_plan_limit($get_user_current_plan, 21);

$sql = "SELECT * FROM decision_card WHERE churchid = " . session()->user_church_id . " AND isdeleted = 'N'";

// Apply search filter
if (!empty($searchValue)) {
    $sql .= " AND (name LIKE '%" . $searchValue . "%' OR email LIKE '%" . $searchValue . "%' OR phone LIKE '%" . $searchValue . "%' OR role LIKE '%" . $searchValue . "%')";
}

// Apply church and type filters if present
if (!empty($searchByChurch)) {
    $sql .= " AND church = '" . $searchByChurch . "'";
}
if (!empty($searchByType)) {
    $sql .= " AND type = '" . $searchByType . "'";
}

$sql .= " ORDER BY `" . $columnName . "` " . $columnSortOrder;

// Add the LIMIT clause here (only once)
if ($user_plan_limit != '0') {
    $sql .= " LIMIT " . intval($user_plan_limit);
}else{

$sql .= " LIMIT " . $row . "," . $rowperpage;

}

		
        $query = $db->query($sql);

        //var_dump($query);exit;
        $attendance = $query->getResultArray();

        $totalRecords = count($attendance);
    
        // Get total count with filter
        $query1 = $db->query($sql);
        $attendance1 = $query1->getResultArray();
        $totalRecordwithFilter = count($attendance1);
    
        $data = array();
    
        foreach ($attendance as $row) {
           if($row['prayer'])
           {
               $prayer = $row['prayer'];
           }
           else
           {
                $prayer ='<span class="text-danger">N/A</span>';
           }
			$data[] = array(
				'first_name' => $row['first_name'] . ' ' . $row['last_name'],
				"phone" => $row['phone'],
				"email" => $row['email'],
				"address" => $row['address'],
				"prayer" =>  $prayer,
				"pastoral_visit" => ($row['pastoral_visit'] == 1)?"Yes":"No",
				"prayer_request" => ($row['prayer_request'] == 1)?"Yes":"No",
				"bible_study" => ($row['bible_study'] == 1)?"Yes":"No",
				"baptism" => ($row['baptism'] == 1)?"Yes":"No",
				// "createdat" => date("m-d-Y", strtotime($row['createdat'])),
				"createdat" => $row['createdat'],

			);
			

        }
    
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );
    
        echo json_encode($response);
    }

	public function add(){


		$data['title']="Dashboard||Admin panel "; 
	
		$data['page']="Admin/dashboard"; 
	
	
	
		// echo view('/include/head',$data);
	
		// echo view('/include/topheader',$data); 
	
		// echo view('/include/sidenavbar',$data); 
	
		echo view('decisioncard/externalform');
	
		//echo view('/include/footer'); 
	
	
	}
	





	public function save()
    {
		$db = db_connect();

        	$DecisioncardModel= new DecisioncardModel();

			$prayer_request = $this->request->getvar('prayer_request');

			if($prayer_request==""){

				$pr=0;
			}else{
				$pr=1;

			}

			$bible_study = $this->request->getvar('bible_study');

			if($bible_study==""){

				$bi=0;
			}else{
				$bi=1;

			}

			$baptism = $this->request->getvar('baptism');

			if($baptism==""){

				$ba=0;
			}else{
				$ba=1;

			}
			
			

			
			$churchid = get_church_by_att_link($this->request->getvar('uid'));
			$sql="select time_zone from manage_church where id = $churchid";
			$query_time = $db->query($sql);
			$timezone = $query_time->getrow();
			$churchtime=$timezone->time_zone;
			if(!empty($churchtime))
			{
			$currentDateTime = \CodeIgniter\I18n\Time::now($churchtime);
			$currentDateTimeFormatted = $currentDateTime->toDateTimeString();
				// var_dump($churchtime);
				// var_dump($currentDateTimeFormatted);
				// exit;
			}
			else 
			{
				$currentDateTimeFormatted ="";
			}
            $data=[

                'first_name' =>$this->request->getvar('first_name'),

                'last_name' =>$this->request->getvar('last_name'),

                'address' =>$this->request->getvar('address'),

                'phone' =>$this->request->getvar('phone'),

                'email' =>$this->request->getvar('email'),
                
                'prayer' =>$this->request->getvar('prayer'),

                'prayer_request' =>$pr,

                'bible_study' =>$bi, 

                'baptism' =>$ba, 
                
                'pastoral_visit' => ($this->request->getvar('pastoral') !== null) ? 1 : 0,

                'churchid' => $churchid,
				'createdat'=>$currentDateTimeFormatted, 
            ];
            


            $DecisioncardModel->insert($data);

            return redirect()->to(base_url()."/adddecisioncard?id=".$this->request->getvar('uid')."&thankyou=success");
            exit();

        	}
    



 

public function PublicContactsSave()
{
	$ContactModel= new ContactModel();
	$db = db_connect();
	$id=$this->request->getpost('id');
	$sql = "SELECT id FROM `manage_church` WHERE att_link = '".$id."'";
    $query =$db->query($sql);    
    $results = $query->getRow();

	$name=$this->request->getpost('name');
	$email=$this->request->getpost('email');
	$phone=$this->request->getpost('phone');
	$address=$this->request->getpost('address');
	$gender=$this->request->getpost('gender');
	$birthday=$this->request->getpost('birthday');
	$selectedValue=$this->request->getpost('selectedValue');


	$data=[

		'parent'=>0,
		'name' =>$name,
		'email' =>$email,
		'phone' =>$phone,
		'address' =>$address,
		'gender' =>$gender,
		'birthday' =>$birthday,
		'source'	=>2,
		'form_type'	=> $selectedValue,
		'church_id' => $results->id,

	];

	$ContactModel->insert($data);

}






}







?>