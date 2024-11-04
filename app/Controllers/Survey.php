<?php



namespace App\Controllers;



use App\Models\ContactModel;

use App\Models\UserModel;

use App\Models\IntegrationModel;

use App\Models\SurveyModel;

use App\Models\SurveySubmissionModel;









class Survey extends BaseController
{

    function survey_qestion_answer($id)

    {

        $db = db_connect(); 

        $session = session();

        $userData = $session->get();

        $church_id=$userData['user_church_id'];

        $SurveySubmissionModel=new SurveySubmissionModel();

        $sql_many="select manychat_id from contacts where id=".$id;     

        $query =$db->query($sql_many);

        $many_chat =$query->getRow(); 

        $manychat_id = $many_chat->manychat_id;

        $m_d = ($manychat_id == "")?"0":$manychat_id;



    //    echo($manychat_id);

    //     exit;



        $survy_data=$SurveySubmissionModel->where('church_id = ',$church_id)->where('manychat_id = ',$m_d)->findAll();

        $data=[

            'survy_data'=>$survy_data,

        ];



        return view('dashboard/survey_question',$data);



    }

	function survey_qestion($id)

    {

        $SurveySubmissionModel=new SurveySubmissionModel();

        $SurveyModel=new SurveyModel();

        $survy_data=$SurveyModel->where('submission_id =', $id)->where('rstatus', 'Y')->where('type IS NULL')->findAll();

        $data=[

            'survy_data'=>$survy_data,

        ];

        return view('dashboard/show_survey_question',$data);

       

    }

    function prayer_request($id)

    {

        $db = db_connect(); 

        $session = session();

        $userData = $session->get();

        $church_id=$userData['user_church_id'];

        $SurveySubmissionModel=new SurveySubmissionModel();

        $sql_many="select manychat_id from contacts where id=".$id;     

        $query =$db->query($sql_many);

        $many_chat =$query->getRow(); 

        $manychat_id = $many_chat->manychat_id;



        $m_d = ($manychat_id == "")?"0":$manychat_id;



        $sql="SELECT * FROM survey s LEFT JOIN survey_submission ss ON ss.id = s.submission_id where ss.manychat_id = $m_d  and s.type = 'prayer_request' and s.rstatus = 'Y' and ss.rstatus = 'Y' order by s.sysdate ASC";

        //echo $sql;

        $query =$db->query($sql);  

        $submission =$query->getResultArray();

        $data=[

            'submission'=> $submission,
            'title'=>"Dashboard||Admin panel"

        ];


        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('survey/prayer-request');

        echo view('/include/footer');

        //return view('survey/prayer-request',$data);

    }

    function biptism_request($id)

    {

        $db = db_connect(); 

        $session = session();

        $userData = $session->get();

        $church_id=$userData['user_church_id'];

        $SurveySubmissionModel=new SurveySubmissionModel();

        $sql_many="select manychat_id from contacts where id=".$id;     

        $query =$db->query($sql_many);

        $many_chat =$query->getRow(); 

        $manychat_id = $many_chat->manychat_id;

        $m_d = ($manychat_id == "")?"0":$manychat_id;



        $sql="SELECT * FROM survey s LEFT JOIN survey_submission ss ON ss.id = s.submission_id where ss.manychat_id = $m_d and s.type = 'baptism_request' and s.rstatus = 'Y' and ss.rstatus = 'Y' order by s.sysdate DESC";

        $query =$db->query($sql);  

        $submission =$query->getResultArray();

        $data=[

            'submission'=> $submission,
            'title'=>"Dashboard||Admin panel"

        ];


        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('survey/baptism-request');

        echo view('/include/footer');

        //return view('dashboard/baptism_req',$data);

    }

    function bible_study($id)

    {

        $db = db_connect(); 

        $session = session();

        $userData = $session->get();

        $church_id=$userData['user_church_id'];

        $SurveySubmissionModel=new SurveySubmissionModel();

        $sql_many="select manychat_id from contacts where id=".$id;     

        $query =$db->query($sql_many);

        $many_chat =$query->getRow(); 

        $manychat_id = $many_chat->manychat_id;

        $m_d = ($manychat_id == "")?"0":$manychat_id;



        $sql="SELECT * FROM survey s LEFT JOIN survey_submission ss ON ss.id = s.submission_id where ss.manychat_id = $m_d   and s.type = 'bible_study' and s.rstatus = 'Y' and ss.rstatus = 'Y' order by s.sysdate ASC";

        $query =$db->query($sql);  

        $submission =$query->getResultArray();

        $data=[

            'submission'=> $submission,
            'title'=>"Dashboard||Admin panel"

        ];



        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('survey/bible-study');

        echo view('/include/footer');

        //return view('dashboard/bible_study',$data);

    }



    public function Surveys()
    {
       $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 



        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('survey/index',$data);

        echo view('/include/footer'); 




    }


public function getsurvey(){

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


        // Start building the SQL query
        $sql = "SELECT *  
                FROM survey_submission  
                WHERE rstatus = 'Y' ";

        // Add a condition for non-superadmin users
        if (session()->user_role != 'superadmin') {
            // Replace $user['church_id'] with the correct way to get the church_id for the user
            $sql .= "AND church_id = " . $user['church_id'] . " ";
        }

        // Initialize an array to keep track of loaded records for each typ








        $query =$db->query($sql);  
        $attendance =$query->getResultArray();
        $totalRecords = count($attendance);
        $totalRecordwithFilter = count($attendance);
        $data = array();



        foreach ($attendance as  $row) {

      

            $get_contact_by_manychat_id = get_contact_by_manychat_id($row['manychat_id']);
            

            // var_dump($get_contact_by_manychat_id->name);exit;

        if($get_contact_by_manychat_id->name){

           $name = $get_contact_by_manychat_id->name;

        }else{


            $name="";
        }


            $contactid = $get_contact_by_manychat_id->id;
        
$data[] = [
    "name" => '<a href="contacts-profile/' . $contactid . '">' . $get_contact_by_manychat_id->name . '</a>',
    "date" => $row['createdate'],
    "title" => $row['title'],
    "Answer" => '<a href="'.base_url().'/viewsurveyanswer/'.$row['id'] .'"><i class="fas fa-eye fa-lg" style="cursor: pointer;"></i></a>',
    "type" => $row['type'],
];





        }





        $response = array(

          "draw" => intval($draw),

          "iTotalRecords" => $totalRecords,

          "iTotalDisplayRecords" => $totalRecordwithFilter,

          "aaData" => $data

        );



        echo json_encode($response);



    }


        public function viewsurveyanswer($id)
    {

        // var_dump($id);exit;
       $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 
 
         $data['id']=$id;

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('survey/answer',$data);

        echo view('/include/footer'); 




    }



    public function getsurveyanswer()
    {
       

        $db = db_connect();


        $draw = $_POST['draw'];

        $row = $_POST['start'];

        $rowperpage = $_POST['length']; // Rows display per page

        $columnIndex = $_POST['order'][0]['column']; // Column index

        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name

        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc

        $searchValue = $_POST['search']['value']; // Search value


        $subid = $_POST['subid'];


        $UserModel=new UserModel();
        $data = array('id'=>session()->user_id);  
        
        $user =  $UserModel->where($data)->first(); 


        $userid = session()->get('user_id');


        // Start building the SQL query
        $sql = "SELECT *  
                FROM survey  
                WHERE rstatus = 'Y' AND submission_id =".$subid;


        // Initialize an array to keep track of loaded records for each typ








        $query =$db->query($sql);  
        $attendance =$query->getResultArray();
        $totalRecords = count($attendance);
        $totalRecordwithFilter = count($attendance);
        $data = array();



        foreach ($attendance as  $row) {

            
            $data[] = [
                "question" => $row['question'],
                "Answer" => $row['answer'],
                "date" => $row['sysdate'],
                "type" => $row['type'],
            ];





        }


        $response = array(

          "draw" => intval($draw),

          "iTotalRecords" => $totalRecords,

          "iTotalDisplayRecords" => $totalRecordwithFilter,

          "aaData" => $data

        );



        echo json_encode($response);




    }

}



?>