<?php
namespace App\Controllers;
use App\Models\ChurchModel;
use App\Models\UserChurchModel;
use App\Models\UserModel;
use App\Models\PlanModel;
use App\Models\FeedbackModel;



class FeedbackController extends BaseController
{
    public function index()
    {  
        $data['title']="Feedback"; 

        $data['page']="Feedback"; 

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('/Feedback/create');

        echo view('/include/footer'); 

    }
    
     public function store()
    {
        $image = $this->request->getFile('image');
        $feedback = $this->request->getPost('feedback'); 
        $category = $this->request->getPost('category');
        $title = $this->request->getPost('title');
        $userID = session()->get('user_id'); 
        $db12 = db_connect();
        $sql = "INSERT INTO `feedback` (`feedback`, `uid`, `f_category`, `f_title`) VALUES ('$feedback', '$userID', '$category', '$title')";
        if ($image && $image->isValid())
        {
            $newName = $image->getRandomName();
            $image->move('./feedbackuploads', $newName);  
            $sql = "INSERT INTO `feedback` (`feedback`, `uid`, `f_category`, `f_title` ,`f_image`)  VALUES ('$feedback', '$userID', '$category', '$title','$newName')";
       
        }
        $db12->query($sql);
        return json_encode("Feedback Submitted Successfully"); 
    }
      public function fetch()
    {
        $config         = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);
        $db = db_connect();
    
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows displayed per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue = $_POST['search']['value']; // Search value
        $searchByChurch = $_POST['searchByChurch'];
        $searchByType = $_POST['searchByType'];
        $urole = get_user_role(session()->user_id);
        $sql = "SELECT *FROM users INNER JOIN feedback ON feedback.uid = users.id  WHERE f_status = '1'";
       
    
        // Apply search filter
        if (!empty($searchValue)) {
            // $sql .= " AND (name LIKE '%" . $searchValue . "%' OR email LIKE '%" . $searchValue . "%' OR phone LIKE '%" . $searchValue . "%' OR role LIKE '%" . $searchValue . "%')";
        }
    
      
    
        $sql .= " ORDER BY `" . $columnName . "` " . $columnSortOrder . " LIMIT " . $row . "," . $rowperpage;
    
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
            $image = "";
            if($row['f_category']=1)
            {
                $category = "Existing Feature";
            }
            if($row['f_category']=2)
            {
                $category = "New Feature Request";
            }
            if($row['f_category']=3)
            {
                $category = "Other";
            }
            
           if ($row['f_image'] != null) {
             $image = '<a data-fancybox="gallery"  href="' . base_url() . '/feedbackuploads/' . $row['f_image'] . '"> <img style="width:150px;height:100px" src="' . base_url() . '/feedbackuploads/' . $row['f_image'] . '" ></a>';
            }
          
            $data[] = array(
                "f_id" => $row['f_id'],
                "uid" => $row['name'],
                "f_title" => $row['f_title'],
                "feedback" => $row['feedback'],
                "f_category" => $category,
                "f_image" => $image ,
                "created_at" => date("d M,Y", strtotime($row['created_at'])),
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
    
     public function adminfeddback()
    {
        
        $UserModel = new UserModel();

       $urole = get_user_role(session()->user_id);

       $data = [
   
        'title'=>"Feedback" 
       ];  

        echo view('include/new/head',$data);
        echo view('/include/new/topheader',$data); 
        echo view('/include/new/sidenavbar',$data); 
        echo view('Feedback/index');


		//return view('dashboard/users', $data);   
    }
    


}
?>