<?php
namespace App\Controllers;
use App\Models\ChurchModel;
use App\Models\UserChurchModel;
use App\Models\UserModel;
use App\Models\PlanModel;
use App\Models\subscription;



class Churches extends BaseController
{
    public function index()
    {       


        // $ChurchModel = new ChurchModel();

        // $all = $ChurchModel->where('rstatus','Y')->findAll();

        // //var_dump($all);


        // foreach($all as $a){

        //     $date = date('Y-m-d H:i:s');
        //     $r = rand(11111,99999);
        //     $combine = $date.$r;

        //     $att_link = md5($combine);

        //     $db = db_connect();

        //     $sql1 = "update manage_church set att_link = '".$att_link."' where id = ".$a['id']." ";

        //     $query1 =$db->query($sql1);  

        //     //exit();

     
        // }


        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('/churches/index');

        echo view('/include/footer'); 

        //return view('churches/index');
    }
    
    public function save_view_church()
    {
       
        $ChurchModel = new ChurchModel();
        $UserChurchModel = new UserChurchModel();
        $session = session();
        $userData = session()->get();
        $userid= $userData['user_id'];
        $id=$userData['id'];


        
        if(!empty($id))
        {
            
        $data=[
            'parentid' =>$userid,
            'church_name' =>$userData['name'],
            'church_email' =>$userData['email'],
            'phone' =>$this->request->getvar('phone'), 
            'website' =>$userData['website'],
            'address' =>$this->request->getvar('address'),
            'pastor_name' =>$this->request->getvar('pastor_name'),
            'time_zone' =>$this->request->getvar('time_zone'),     
            'is_filled'=>'1',    

        ];    
                      

       $result=$ChurchModel->update($id,$data);
       $session = session();
       $session->remove('website');
	   $session->remove('email');
	   $session->remove('id');
	   $session->remove('name');
       return redirect()->to(base_url()."signupsubscription");

        }
       
    
    }



    public function index_new()
    {       



        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('/churches/index_new');

        echo view('/include/footer'); 

        //return view('churches/index');
    }







    public function viewchurch()
{
	$session = session();
    $userid=session()->user_id;
    $ChurchModel=new ChurchModel;
    $data['user'] = $ChurchModel->where('parentid =',$userid)->first();

    $data['title']="Dashboard||Admin panel "; 

    $data['page']="Admin/dashboard"; 

  //  echo view('/include/head1',$data);

    //echo view('/include/topheader',$data); 

    // echo view('/include/sidenavbar',$data); 

    echo view('/churches/create',$data);

   // echo view('/include/footer');     
}
public function church_detail()
{      

       $data['title']="Dashboard||Admin panel "; 
       $data['page']="Admin/dashboard"; 
       $session = session();
       $session->start();
	   $id=$this->request->getvar('id');
	   $session = session();
	   $name=$this->request->getvar('church_name');
       $email= $this->request->getvar('church_email');
	   $website=$this->request->getvar('website');
	   
	   $session->set('id',$id);
	   $session->set('name',$name);
	   $session->set('email',$email);
	   $session->set('website',$website);
	   echo view('/churches/create1',$data);



}



 // public function save_church()
 //    {
        
       

 //        $ChurchModel = new ChurchModel();
 //        $UserChurchModel = new UserChurchModel();
 //        $session = session();
 //        $userData = session()->get();
 //        $userid= $userData['user_id'];
 //        $id=$this->request->getvar('id');

 //        $currentDate = date('Y-m-d H:i:s'); 



 //        $plan=$this->request->getvar('plan');







 //    if ($plan == 1) {
 //        $text = "Fre Plan";
 //        $expiryDate = "";
 //    } elseif ($plan == 2) {
 //        $text = "Pro Plan With !4 days Trial";
 //        $expiryDate =date('Y-m-d H:i:s', strtotime($currentDate . ' +14 days'));

 //    } else {
 //        $text = "Lifetime Plan Payment";
 //      $expiryDate =;
 //    }




        
 //        if(!empty($id))
 //        {

  

            
 //        $data=[
 //            'parentid' =>$userid,
 //            'church_name' =>$this->request->getvar('church_name'),
 //            'church_email' =>$this->request->getvar('church_email'),
 //            'phone' =>$this->request->getvar('phone'), 
 //            'website' =>$this->request->getvar('website'),
 //            'address' =>$this->request->getvar('address'),
 //            'pastor_name' =>$this->request->getvar('pastor_name'),
 //            'time_zone' =>$this->request->getvar('time_zone'),
 //            'plan_id' =>$planid,         


 //        ];    
                      

 //       $ChurchModel->update($id,$data);


     
 //     $subscription = new subscription();


 //            $row= $subscription->select('*')->where('church_id', $id)->findAll();


            

 //            if($row){

 //             $updatedRows = $subscription->where('church_id', $id)
 //            ->update([
 //                'plan_status' => 'N',
 //                'plan_rstatus' => 'N',
 //            ]);

 //        }


 

 //            // Set the values you want to insert
 //                $data2 = [
 //                    'user_id' => session()->user_id,
 //                    'church_id' => $id,
 //                    'plan_id' => $planid,
 //                    'plan_start' => $currentDate,
 //                    'plan_end' => $expiryDate,
 //                    'plan_type' => $text,
 //                    'plan_amount' => $amount, // Corrected this line
 //                    'plan_status' => "Y",
 //                    'plan_rstatus' => "Y",
 //                    // Add other columns and their values as needed
 //                ];


 //            // Insert data into the 'subscription' table
 //            $subscription->insert($data2);




 //       return $data;
 //        }
 //        else
 //        {
 //        $date = date('Y-m-d H:i:s');

 //        $att_link = md5($date);
        
 //        $data=[
 //            'parentid' =>$userid,
 //            'church_name' =>$this->request->getvar('church_name'),
 //            'church_email' =>$this->request->getvar('church_email'),
 //            'phone' =>$this->request->getvar('phone'), 
 //            'website' =>$this->request->getvar('website'),
 //            'address' =>$this->request->getvar('address'),
 //            'pastor_name' =>$this->request->getvar('pastor_name'),
 //            'time_zone' =>$this->request->getvar('time_zone'),            
 //            'att_link' => $att_link,

 //        ];    
                      

 //       $ChurchModel->insert($data);
 //       $db = db_connect();
 //       $church_id=$db->insertID();



   
 //            // Set the values you want to insert
 //                $data2 = [
 //                    'user_id' => session()->user_id,
 //                    'church_id' => $church_id,
 //                    'plan_id' => $planid,
 //                    'plan_start' => $currentDate,
 //                    'plan_end' => $expiryDate,
 //                    'plan_type' => $text,
 //                    'plan_amount' => $amount, // Corrected this line
 //                    'plan_status' => "Y",
 //                    'plan_rstatus' => "Y",
 //                    // Add other columns and their values as needed
 //                ];


 //            // Insert data into the 'subscription' table
 //            $subscription->insert($data2);



 //       $created_at = date('Y-m-d H:i:s');
       
 //       $data2=[
 //        'user_ref'=>$userid,
 //        'church_ref'=>$church_id,
 //        'createdat'=>$created_at,
 //        'createdby'=>$userid,
 //       ];
 //       $UserChurchModel->insert($data2); 
 //    }
    
 //    }

    public function save_church()
{

    $db = \Config\Database::connect();
 $ChurchModel = new ChurchModel();
$UserChurchModel = new UserChurchModel();
$subscription = new Subscription(); // Correct the capitalization of the model name

$session = session();
$userData = session()->get();
$userid = $userData['user_id'];
$id = $this->request->getVar('id');
$currentDate = date('Y-m-d H:i:s');
$plan = $this->request->getVar('plan');

// Define default values for $text and $expiryDate
$text = "";
$expiryDate = null; // Change to null as it will be set based on the plan later
$amount = ""; // Default amount

if ($plan == 1) {
    $text = "Free Plan";
    // No expiry for Free Plan
} elseif ($plan == 2) {
    $text = "Pro Plan With 14 days Trial";
    $expiryDate = date('Y-m-d H:i:s', strtotime($currentDate . ' +14 days'));
    $amount = 1; // Set the amount for the Pro Plan
} else {
    $text = "Lifetime Plan Payment";
    // Amount remains empty for Lifetime Plan
}
   
if (!empty($id)) {
    
     $church = $ChurchModel->where('id',$id)->first();

    if($plan == 2 && $plan != $church['plan_id'])
    {
        echo 1;
        exit();
    }
    $data = [
        'parentid' => $userid,
        'church_name' => $this->request->getVar('church_name'),
        'church_email' => $this->request->getVar('church_email'),
        'phone' => $this->request->getVar('phone'),
        'website' => $this->request->getVar('website'),
        'address' => $this->request->getVar('address'),
        'pastor_name' => $this->request->getVar('pastor_name'),
        'time_zone' => $this->request->getVar('time_zone'),
         'plan_id' => $plan,
    ];

    // Update the ChurchModel
    $ChurchModel->update($id, $data);

    // Check if there are records with the given 'church_id'
 $sql = "UPDATE Plan_Subscription SET plan_status = 'N', plan_rstatus = 'N' WHERE church_id = ?";

// Execute the query with the church_id value
$db->query($sql, [$id]);

  // Insert a new subscription record
    $data2 = [
        'user_id' => session()->user_id,
        'church_id' => $id,
        'plan_id' => $plan, // You need to set $planid
        'plan_start' => $currentDate,
        'plan_end' => $expiryDate,
        'plan_type' => $text,
        'plan_amount' => $amount, // You need to set $amount
        'plan_status' => "Y",
        'plan_rstatus' => "Y",
        // Add other columns and their values as needed
    ];

    $subscription->insert($data2);

    return $data;
    } else {
        // Insert a new church record
        $date = date('Y-m-d H:i:s');
        $att_link = md5($date);

        
        $data=[
            'parentid' =>$userid,
            'church_name' =>$this->request->getvar('church_name'),
            'church_email' =>$this->request->getvar('church_email'),
            'phone' =>$this->request->getvar('phone'), 
            'website' =>$this->request->getvar('website'),
            'address' =>$this->request->getvar('address'),
            'pastor_name' =>$this->request->getvar('pastor_name'),
            'time_zone' =>$this->request->getvar('time_zone'),            
            'att_link' => $att_link,
            'plan_id' =>$plan,         


        ];  

        $ChurchModel->insert($data);

        $db = db_connect();
        $church_id = $db->insertID();

        // Insert a new subscription record for the church
        $data2 = [
            'user_id' => session()->user_id,
            'church_id' => $church_id,
            'plan_id' => $plan, // You need to set $planid
            'plan_start' => $currentDate,
            'plan_end' => $expiryDate,
            'plan_type' => $text,
            'plan_amount' => $amount, // You need to set $amount
            'plan_status' => "Y",
            'plan_rstatus' => "Y",
            // Add other columns and their values as needed
        ];

        $subscription->insert($data2);

        $created_at = date('Y-m-d H:i:s');
        $data2 = [
            'user_ref' => $userid,
            'church_ref' => $church_id,
            'createdat' => $created_at,
            'createdby' => $userid,
        ];

        $UserChurchModel->insert($data2);
    }
}



    public function save_churchgggg()
    {
      
        $ChurchModel = new ChurchModel();
        $UserChurchModel = new UserChurchModel();
        $session = session();
        $userData = session()->get();
        $userid= $userData['user_id'];

        $date = date('Y-m-d H:i:s');

        $att_link = md5($date);
        
        $data=[
            'parentid' =>$userid,
            // 'id', 'parentid', 'church_name', 'church_email', 'website', 'address', 'pastor_name'

            'church_name' =>$this->request->getvar('church_name'),

            'church_email' =>$this->request->getvar('church_email'),

            'phone' =>$this->request->getvar('phone'), 

            'website' =>$this->request->getvar('website'),

            'address' =>$this->request->getvar('address'),

            'pastor_name' =>$this->request->getvar('pastor_name'),

            'time_zone' =>$this->request->getvar('time_zone'),            

            'att_link' => $att_link,

        ];    
                      

       $ChurchModel->insert($data);
       $db = db_connect();
       $church_id=$db->insertID();

       $created_at = date('Y-m-d H:i:s');
       
       $data2=[
        'user_ref'=>$userid,
        'church_ref'=>$church_id,
        'createdat'=>$created_at,
        'createdby'=>$userid,
       ];
       $UserChurchModel->insert($data2); 

    }
    public function get_church()
    {
       
        $session = session();
        $userData = session()->get();
        $userid= $userData['user_id'];

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



$sql = "SELECT
    manage_church.id as cid, manage_church.church_name, manage_church.church_email,manage_church.plan_id,
    manage_church.phone, manage_church.website, manage_church.pastor_name,
    manage_church.time_zone 
    FROM `manage_church` 
    INNER JOIN user_churches ON manage_church.id = user_churches.church_ref
    WHERE manage_church.rstatus = 'Y' AND user_churches.rstatus = 'Y'";


 $urole = get_user_role(session()->user_id);




if ($urole != 'superadmin') {
    // For non-superadmins, restrict the data based on the user_ref
    $sql .= " AND user_churches.user_ref = " . $userid;
}

// Your code continues...



        if(isset($searchByStatus) && $searchByStatus != ''){

		   $sql .= " and c.status ='".$searchByStatus."' ";

		}


		if(isset($searchByType) && $searchByType != ''){

		   $sql .= " and c.form_type ='".$searchByType."' ";

		}


        if($searchValue != ''){

		   $sql .= " and (church_name like '%".$searchValue."%' 
		   					or church_email like '%".$searchValue."%' 
		   					or website like '%".$searchValue."%'
		   					or address like '%".$searchValue."%'
		   					or pastor_name like '%".$searchValue."%'

		   				) ";

		}


        $sql .=" order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage." ";



 





        $query =$db->query($sql);  

        $attendance =$query->getResultArray();



        $totalRecords = count($attendance);


        // get total

        $sql1 = "SELECT 
        manage_church.id as cid,manage_church.church_name,manage_church.church_email,manage_church.plan_id,
        manage_church.phone,manage_church.website,manage_church.pastor_name,
        manage_church.time_zone 
         FROM `manage_church` 
        left join user_churches on manage_church.id = user_churches.church_ref
        where manage_church.rstatus = 'Y'
         ";



        if($urole !='superadmin')

        {

            $sql1 .= " AND manage_church.parentid = ".$userid;

        }

		$query1 =$db->query($sql1);  

        $attendance1 =$query1->getResultArray();


        $totalRecordwithFilter = count($attendance1);


        // end total



        //$totalRecordwithFilter = count($attendance);



        $data = array();

       

        foreach ($attendance as  $row) {


$plan_name = "";

if ($row['plan_id'] !== "") {
    $PlanModel = new PlanModel();
    $plan = $PlanModel->find($row['plan_id']);

    if ($plan) {
        // Assuming 'pm_title' is the field that contains the plan name
        $plan_name = $plan['pm_title'];
    } else {
      

      $plan_name="";
    }
}




		   $data[] = array(     
		     "church_name"=>$row['church_name'],
		     "church_email"=>$row['church_email'],
		     "website"=>$row['website'],
			 "phone"=>$row['phone'],
		     "pastor_name"=>$row['pastor_name'],
			 "time_zone"=>$row['time_zone'],
             "plan"=>$plan_name,
		     // "action"=>'<a href="/edit-church/'.$row['cid'].'">
             //    <i class="icon-pencil edit-record" style="color: blue;cursor:pointer;" ></i></a>  <i class="icon-trash church1-del-record" style="color: red;cursor:pointer;" id="'.$row['cid'].'"></i>',
             "action"=>'<i class="icon-pencil edit-church" id="'.$row['cid'].'" data-toggle="modal" data-target="#addChurch" style="color: blue;cursor:pointer;"></i><i class="icon-trash church1-del-record" style="color: red;cursor:pointer;" id="'.$row['cid'].'"></i>',

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



    function churchDelete()

    {       

        $id=$this->request->getvar('delid');

        $ChurchModel= new ChurchModel();

        $data=[

            'rstatus'=> 'N'

        ];

        // $ContactModel->update($id,$data);

        if($ChurchModel->update($id,$data)){

            echo "yes";

        }else{

            echo "no";

        }

    }



    public function switch($id){

        $userid = session()->user_id;

        $ChurchModel = new ChurchModel();

        $ChurchModel->set('default_church', 0)
                  ->where('parentid', $userid)
                  ->update();

        $ChurchModel->set('default_church', 1)
                  ->where('id', $id)
                  ->update();

        session()->set('user_church_id',$id);


        return redirect()->to(base_url()."");

        exit();

    }


        function edit_Church()

    {
        $id=$this->request->getvar('delid');
       $ChurchModel = new ChurchModel();
       $plan_master = new PlanModel;
       $data['church'] = $ChurchModel->where('id =',$id)->first();
       if($data['church']['plan_id']>0)
       {
            $plan = $plan_master->where('pm_id',$data['church']['plan_id'])->first();
             $data['plan']=  $plan['pm_title'];
       }
       else{
            $data['plan'] ="N/A";
       }
        return json_encode($data);
// var_dump($data1);



    }
  
}
?>