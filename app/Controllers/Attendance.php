<?php

namespace App\Controllers;



use App\Models\AttendanceModel;

use App\Models\UserModel;




class Attendance extends BaseController
    


{


	function userattendance($id)



    {

        $AttendanceModel=new AttendanceModel();

        $user = $AttendanceModel->where('contact_id =',$id)->findAll();

        $today = date('Y-m-d');



        $check_attendance = $AttendanceModel->where('contact_id =',$id)->where('DATE(check_in) =',$today)->find();



        if($check_attendance){

            $check = "yes";

        }else{

            $check = "no";

        }       



		$data = [



			'users'=>$user,

            'id'=>$id,

            'check'=>$check,

            'foractive' => 'userattendance',

            'title'=>"Dashboard||Admin panel"



		];


		echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('attendance/userattendance');

        echo view('/include/footer');

        //return view('dashboard/attendance', $data);

    }



	public function get_attendance(){





		$db = db_connect();







		$draw = $_POST['draw'];

		$row = $_POST['start'];

		$rowperpage = $_POST['length']; // Rows display per page

		$columnIndex = $_POST['order'][0]['column']; // Column index

		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name

		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc

		$searchValue = $_POST['search']['value']; // Search value



		$searchByChurch = $_POST['searchByChurch'];



$userid = session()->get('user_id');
$get_user_current_plan = get_user_current_plan($userid);
$user_plan_limit = user_plan_limit($get_user_current_plan, 14);



		$UserModel=new UserModel();
        $data = array('id'=>session()->user_id);  
        
        $user =  $UserModel->where($data)->first(); 

        $church_id = session()->user_church_id;

		$sql = "SELECT c.name,c.phone,c.phone_old,ta.check_in,mc.church_name,ta.check_in,c.form_type,ta.id as tabid,c.id as contactid,ta.att_type,c.phone_d

		       FROM tab_attandance ta

		       LEFT JOIN manage_church mc on mc.id = ta.church_id

		       LEFT JOIN contacts c on c.id = ta.contact_id

		       LEFT JOIN users u on u.id = mc.parentid WHERE ta.rstatus = 'Y' and c.id > 1";



        if(session()->user_role !='superadmin')

        {

           

            $sql .= " and ta.church_id = ".$church_id." ";

        }



        if(isset($searchByChurch) && $searchByChurch > '0'){

		   $sql .= " and mc.id ='".$searchByChurch."' ";

		}





        if($searchValue != ''){

		   $sql .= " and (c.name like '%".$searchValue."%' or church_name like '%".$searchValue."%' or form_type like '%".$searchValue."%') ";

		}





  $sql .= " ORDER BY `" . $columnName . "` " . $columnSortOrder;

// Add the LIMIT clause here (only once)
if ($user_plan_limit != '0') {
    $sql .= " LIMIT " . intval($user_plan_limit);
}else{

$sql .= " LIMIT " . $row . "," . $rowperpage;

}




        //echo $sql;





        $query =$db->query($sql);  

        $attendance =$query->getResultArray();



        $totalRecords = count($attendance);


        // start records total

        $sql1 = "SELECT c.name,ta.check_in,mc.church_name,ta.check_in,c.form_type,ta.id as tabid,ta.att_type 

		       FROM tab_attandance ta

		       LEFT JOIN manage_church mc on mc.id = ta.church_id

		       LEFT JOIN contacts c on c.id = ta.contact_id

		       LEFT JOIN users u on u.id = mc.parentid WHERE ta.rstatus = 'Y' and c.id > 1";



        if(session()->user_role !='superadmin')

        {

           

            $sql1 .= " and ta.church_id = ".$church_id." ";

        }


        $query1 =$db->query($sql1);  

        $attendance1 =$query1->getResultArray();


        $totalRecordwithFilter = count($attendance1);

        // end records total



        //$totalRecordwithFilter = count($attendance);



        $data = array();

        $config         = new \Config\Encryption();
		$encrypter = \Config\Services::encrypter($config);


        foreach ($attendance as $row) {

            $event = get_event_name($row['att_type']);

            $d_phone = $encrypter->decrypt(base64_decode($row['phone']));

            //$phone_d = $encrypter->decrypt(base64_decode($row['phone_d']));

            $form_type = ($row['form_type'] == 1)?"Member":"Visitor";

		   $data[] = array(

		     "church_name"=>$row['church_name'],

		     "name"=>'<a href="contacts-profile/'.$row['contactid'].'">'.$row['name'].'</a>',

             "phone"=>$d_phone,

             "att_type"=>$event,

		     "form_type"=>$form_type,

		     "check_in"=>$row['check_in'],

		     "action"=>'<i class="icon-trash Adel-record" style="color: red;cursor:pointer;" id="'.$row['tabid'].'"></i>',

		   );

		}





		$response = array(

		  "draw" => intval($draw),

		  "iTotalRecords" => $totalRecords,

		  "iTotalDisplayRecords" => $totalRecordwithFilter,

		  "aaData" => $data

		);



		echo json_encode($response);
		// exit;



	}







	public function del_attendance(){



		$am = new AttendanceModel();



		$data = [

              'rstatus' => 'N',

           ];



        if($am->update($this->request->getPost('delid'),$data)){

        	echo "yes";

        }else{

        	echo "no";

        }



	}


	function SaveAttendance()

    {

        $UserModel=new UserModel();

        $data = array('id'=>session()->user_id);  

        

        $user =  $UserModel->where($data)->first();    



        $get_time_zone = get_time_zone($this->request->getvar('userid'));



        date_default_timezone_set($get_time_zone);



        $AttendanceModel= new AttendanceModel();

        $date = date('Y-m-d H:i:s');

            $data=

            [

                'church_id' =>$user['church_id'],

                'contact_id' => $this->request->getvar('userid'),

                'check_in' => $date,

                'datetime' => $date,

            ];  

            // var_dump($data);

            // exit;         



            $AttendanceModel->insert($data);           



        return redirect()->to(base_url()."userattendance/".$this->request->getvar('userid'));



    }

}





?>