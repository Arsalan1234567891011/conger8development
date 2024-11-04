<?php

namespace App\Controllers;
use App\Models\NotesModel;
use App\Models\ContactModel;
use App\Models\UserModel;
use App\Models\TaskcommentModel;
use App\Models\TaskalertModel;


require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;






class Taskdetails extends BaseController
{

function index()
{

	$db = db_connect();

	$c_sql = "SELECT * from manage_church where rstatus = 'Y'";
    $c_query =$db->query($c_sql);    
    $church_data =$c_query->getResultArray();  

    $data = [
            'churches'=>$church_data,
            ]; 



    $data['title']="Task Detail"; 

    $data['page']="Task Detail"; 

    echo view('include/new/head',$data);
    echo view('/include/new/topheader',$data); 
    echo view('/include/new/sidenavbar',$data); 
    echo view('taskdetails/index');


	//return view('contacts/index',$data);



}

	public function get_contacts(){

		$db = db_connect();
		$draw = $_POST['draw'];
		$row = $_POST['start'];
		$rowperpage = $_POST['length']; // Rows display per page
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		$searchValue = $_POST['search']['value']; // Search value
		$searchByStatus = $_POST['searchByStatus'];
		$searchByType = $_POST['searchByType'];
		// $searchByTag = $_POST['searchByTag'];

		$UserModel=new UserModel();
       $data = array('id'=>session()->user_id);  
      
       $sql="SELECT * FROM tbl_task_alert JOIN notes ON tbl_task_alert.taskid = notes.id where assign_to =".session()->user_id;
        $query =$db->query($sql);  
        $attendance =$query->getResultArray();
		// var_dump($attendance);
		// exit;

        $totalRecords = count($attendance);
		 $sql1 = "SELECT * FROM tbl_task_alert JOIN notes ON tbl_task_alert.taskid = notes.id where assign_to =".session()->user_id;

		$query1 =$db->query($sql1);  
        $attendance1 =$query1->getResultArray();
        $totalRecordwithFilter = count($attendance1);


        // end total



        //$totalRecordwithFilter = count($attendance);

	



        $data = array();
        foreach ($attendance as  $row) {
			$status = ($row['status'] == 1) ? 'Pending' : 'Completed';
		   $data[] = array(		

		     "title"=>$row['title'],

		     "owner"=>get_user_name($row['user']),

			 "stasus"=>$status,

		     "duedate"=>$row['due_date'],

		     "action" => '<button type="button" class="btn btn-info btn-lg" onclick="openModalWithId(' . $row['id'] . ')" data-toggle="modal" data-target="#myModal">Open Modal</button>',

		     

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

	function gettaskdetailsid()
	{
		$TaskcommentModel = new TaskcommentModel();
		$NotesModel = new NotesModel();
		$id = $this->request->getVar('id'); // Use getVar() instead of getvar() for Laravel
	
		// Fetch data from NotesModel based on the provided ID
		$data1 =  $NotesModel->where('id', $id)->first();
	
		// Fetch data from TaskcommentModel based on the provided task_id
		$data2 =  $TaskcommentModel->where('task_id', $id)->findAll();
	
		// Create an associative array with both sets of data
		$result = array(
			'notes' => $data1,
			'comments' => $data2
		);
	
		$data['notes']=$data1;
		$data['comments']=$data2;
		// Convert the array to JSON and echo the JSON data
		$json_data = json_encode($data);
		echo $json_data;
	}
	

function savetaskcomment()
{
	$db = db_connect();

	$TaskcommentModel= new TaskcommentModel();
	$TaskalertModel= new TaskalertModel();

	$status=$this->request->getvar('status');

	$id=$this->request->getvar('id');
	$description=$this->request->getvar('description');
	$data = [
		'task_id'=>$id,
		'user_id'=>session()->user_id,
		'comments'=>$description,
	];
	$user= $TaskcommentModel->insert($data);

		if(!empty($status))
	{
		$sql="UPDATE tbl_task_alert
			SET status = ".$status."
			WHERE taskid =".$id;
			$query = $db->query($sql);
	}
	$commentData = $TaskcommentModel->find($user); // Assuming 'user' holds the primary key of the newly inserted row
    echo json_encode($commentData);
	
}
	



}