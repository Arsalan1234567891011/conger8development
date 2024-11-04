<?php

namespace App\Controllers;

use App\Models\ChurchModel;
use App\Models\UserModel;





class Interests extends BaseController
{


	function index()

	{
		$churchmodel = new ChurchModel();
		
		$userid = session()->user_id;

		if($userid == 1){
			$data['churches'] = $churchmodel->where('rstatus','Y')->where('church_name !=','')->findall();
		}else{
			$data['churches'] = $churchmodel->where('rstatus','Y')->where('church_name !=','')->where('parentid',session()->user_id)->findall();
		}

		
		$data['churches'] = $churchmodel->where('rstatus','Y')->where('church_name !=','')->where('parentid',session()->user_id)->findall();


		$data['title']="Dashboard||Admin panel "; 

	    $data['page']="Admin/dashboard"; 



	    echo view('/include/head',$data);

	    echo view('/include/topheader',$data); 

	    echo view('/include/sidenavbar',$data); 

	    echo view('interests/index',$data);

	    echo view('/include/footer'); 


	}



	public function get_interests(){

		$db = db_connect();


		$draw = $_POST['draw'];

		$row = $_POST['start'];

		$rowperpage = $_POST['length']; // Rows display per page

		$columnIndex = $_POST['order'][0]['column']; // Column index

		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name

		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc

		$searchValue = $_POST['search']['value']; // Search value


		$searchByChurch = $_POST['searchByChurch'];
		$searchByType = $_POST['searchByType'];


		$UserModel=new UserModel();
        $data = array('id'=>session()->user_id);  
        
        $user =  $UserModel->where($data)->first(); 


        $userid = session()->get('user_id');

// Define an array to store the user plan limits for each type
$userPlanLimits = [];

// Get the user's plan limits for each type
$get_user_current_plan = get_user_current_plan($userid);
$userPlanLimits['surveys'] = user_plan_limit($get_user_current_plan, 5);
$userPlanLimits['prayer_request'] = user_plan_limit($get_user_current_plan, 6);
$userPlanLimits['baptism_request'] = user_plan_limit($get_user_current_plan, 7);
$userPlanLimits['bible_study'] = user_plan_limit($get_user_current_plan, 8);

// Define the $user variable if it's not already defined (replace this with your actual method)
// $user = your_method_to_get_user_data(session()->user_id);

// Start building the SQL query
$sql = "SELECT *  
        FROM requests_master  
        WHERE rstatus = 'Y' ";

// Add a condition for non-superadmin users
if (session()->user_role != 'superadmin') {
    // Replace $user['church_id'] with the correct way to get the church_id for the user
    $sql .= "AND church_id = " . $user['church_id'] . " ";
}

// Initialize an array to keep track of loaded records for each type
$loadedRecords = [];

// Check if a specific type is selected
if (isset($searchByType) && $searchByType != '') {
    // Check if the type is valid based on userPlanLimits
    if (array_key_exists($searchByType, $userPlanLimits)) {
        // Get the user's plan limit for the selected type
        $typeLimit = $userPlanLimits[$searchByType];

        // If the type limit is greater than zero, add a condition for the selected type
        if ($typeLimit > 0) {
            $sql .= "AND type = '" . $searchByType . "' ";

            // Add the limit for pagination using the type limit
            $sql .= "LIMIT " . $row . "," . min($rowperpage, $typeLimit);

            // Keep track of the loaded records for this type
            $loadedRecords[$searchByType] = $typeLimit;
        }
    } else {
        // Handle the case when $searchByType is not valid here
        // For example, you can add a default behavior or throw an error.
    }
} else {
    $sql .= "AND type = '' ";
}



// var_dump($sql);exit;




        $query =$db->query($sql);  

        $attendance =$query->getResultArray();



        $totalRecords = count($attendance);


        $totalRecordwithFilter = count($attendance);


        // end total



        //$totalRecordwithFilter = count($attendance);



        $data = array();



        foreach ($attendance as  $row) {

      

	        $get_contact_by_manychat_id = get_contact_by_manychat_id($row['manychatid']);

	        // var_dump($get_contact_by_manychat_id);exit;

	        $name = $get_contact_by_manychat_id->name;

	        // var_dump($name);exit;

	        $contactid = $get_contact_by_manychat_id->id;

	        //$get_church_name = get_church_name($row['church_id']);

		   $data[] = array(

			
		     "name"=>'<a href="contacts-profile/'.$contactid.'">'.$get_contact_by_manychat_id->name.'</a>',

		     //"church_id"=>$get_church_name,

		     "Answer"=>$row['answer'],

			 "type"=>$row['type'],

			 "date"=>$row['sysdate'],

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


	function getsubmissions($id)

	{
		
	    $db = db_connect();

		$c_sql = "SELECT * from survey where submission_id = $id";
	    $c_query =$db->query($c_sql);    
	    
	    $data['submissions'] =$c_query->getResultArray();  

	    $data['title']="Dashboard||Admin panel "; 

	    $data['page']="Admin/dashboard"; 



	    echo view('/include/head',$data);

	    echo view('/include/topheader',$data); 

	    echo view('/include/sidenavbar',$data); 

	    echo view('interests/getsubmissions',$data);

	    echo view('/include/footer'); 

	}

function Newcontacts()

{

	$db = db_connect();

	$c_sql = "SELECT * from manage_church where rstatus = 'Y'";
    $c_query =$db->query($c_sql);    
    $church_data =$c_query->getResultArray();  

    $data = [
            'churches'=>$church_data,
            ]; 

	return view('dashboard/newcontacts',$data);



}	

function contactDelete()

{       

	$id=$this->request->getvar('delid');

	$ContactModel= new ContactModel();

	$data=[

		'r_status'=> 'N'

	];

	// $ContactModel->update($id,$data);

	if($ContactModel->update($id,$data)){

		echo "yes";

	}else{

		echo "no";

	}

   



}
public function importCsvToDb()
{
	$session=session();
	$userData = session()->get();        
	$userid= $userData['user_id'];
	$user_church_id= $userData['user_church_id'];


	// $input = $this->validate([
	// 	'file' => 'uploaded[file]|max_size[file,2048]|ext_in[file,csv],'
	// ]);
	// if (!$input) {
	// 	$data['validation'] = $this->validator;
	// 	return view( base_url()."/newcontacts", $data); 
	// }else{
		if($file = $this->request->getFile('file')) {
			
		if ($file->isValid() && ! $file->hasMoved()) {
			
			$newName = $file->getRandomName();
			$file->move('uploads/csv', $newName);
			$file = fopen('uploads/csv/'.$newName,"r");
			$i = 0;
			$numberOfFields = 5;
			$csvArr = array();
			
			while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
				$num = count($filedata);
				if($i > 0 && $num == $numberOfFields){ 
					$csvArr[$i]['name'] = $filedata[0];
					$csvArr[$i]['parent'] = $userid;
					$csvArr[$i]['email'] = $filedata[1];
					$csvArr[$i]['phone'] = $filedata[2];
					$csvArr[$i]['status'] = $filedata[3];
					$csvArr[$i]['form_type'] = $filedata[4];
					$csvArr[$i]['church_id'] = $user_church_id;


				}
				$i++;
			}
			fclose($file);
			$count = 0;
			foreach($csvArr as $userdata){
				$ContactModel= new ContactModel();
				$findRecord = $ContactModel->where('email', $userdata['email'])->where('r_status =','Y')->countAllResults();

				// $findRecord = $ContactModel->where('email', $userdata['email'])->countAllResults();
				if($findRecord == 0){
					if($ContactModel->insert($userdata)){
						$count++;
					}
				}
			}
			session()->setFlashdata('message', $count.' rows successfully added.');
			session()->setFlashdata('alert-class', 'alert-success');
		}
		else{
			session()->setFlashdata('message', 'CSV file coud not be imported.');
			session()->setFlashdata('alert-class', 'alert-danger');
		}
		// }else{
		// session()->setFlashdata('message', 'CSV file coud not be imported.');
		// session()->setFlashdata('alert-class', 'alert-danger');
		// }
	}
	return redirect()->to(base_url()."contacts");
	 
}
function Import_contact()
{
	return view('dashboard/import-contact');

}






}







?>