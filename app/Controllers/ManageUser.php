<?php



namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Encryption\Encryption;

use App\Models\UserGroupModel;


class ManageUser extends BaseController

{


public function UserData()
    {

       $UserModel = new UserModel();
       $urole = get_user_role(session()->user_id);
       $user = $UserModel->where('rstatus','Y')->findAll();

            $data = [
                'users'=>$user,
                'title'=>"Dashboard||Admin panel" ,
                'page'=> "Manage Users"
            ];  

        echo view('include/new/head',$data);
        echo view('/include/new/topheader',$data); 
        echo view('/include/new/sidenavbar',$data); 
        echo view('Manageusers/users');

        // echo view('/include/head',$data);
        //  echo view('/include/topheader',$data); 
        //  echo view('/include/sidenavbar',$data); 
        //  echo view('Manageusers/users');
        //  echo view('/include/footer');
        //return view('dashboard/users', $data);   



    }

public function viewchurchuser($id)

    {



        $data2['churchadminid']=$id;



        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 

        $data['styles'] = ['public/app-assets/vendors/css/tables/datatable/datatables.min.css'];



        $data['script'] = ['public/app-assets/js/scripts/tables/datatables/datatable-basic.js','

        public/app-assets/vendors/js/tables/datatable/datatables.min.js'];

        

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('Manageusers/viewchurchusers',$data2);

        echo view('/include/footer'); 

    

    }




    public function getuserdataforadmin()
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
    
        $sql = "SELECT * FROM users WHERE role='churchadmin' AND rstatus = 'Y'";

                
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
            $d_pwd1 = $encrypter->decrypt(base64_decode($row['phone']));

$viewUserIcon = '<i class="ft-eye" style="font-size: 20px;"></i>'; // Adjust the font-size as needed
$viewUserLink = '<a href="' . base_url('/viewuser/' . $row['id']) . '">' . $viewUserIcon . '</a>';

$data[] = array(
    "Name" => $row['name'],
    "Email" => $row['email'],
    "Phone" => $d_pwd1,
    "viewuser" => $viewUserLink,
    "Role" => $row['role'],
    "Actions" => '
         <div class="dropdown">
        <button class="dropbtn" onclick="toggleDropdown()"> <i class="fas fa-chevron-down"></i></button>
        <div class="dropdown-content" id="dropdownMenu">
             <a href="' . base_url('/adduser/' . $row['id']) . '" class="dropdown-item">
                    <i class="fas fa-edit"></i> Edit
             </a>
             <a href="#" class="dropdown-item del-record" id="' . $row['id'] . '">
                    <i class="fas fa-trash"></i> Delete
             </a>
        </div>
    </div>
    ',
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



    public function getuserdataforchurchurchusers()
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
        $churchid = $_POST['churchid'];
      
    
        $urole = get_user_role(session()->user_id);
    


  
        
            $sql = "SELECT * FROM users WHERE parent = " .$churchid. " AND rstatus = 'Y'";


        
    
        // Apply search filter
        if (!empty($searchValue)) {
            $sql .= " AND (name LIKE '%" . $searchValue . "%' OR email LIKE '%" . $searchValue . "%' OR phone LIKE '%" . $searchValue . "%' OR role LIKE '%" . $searchValue . "%')";
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
            $d_pwd1 = $encrypter->decrypt(base64_decode($row['phone']));

            $data[] = array(
                "Name" => $row['name'],
                "Email" => $row['email'],
                "Phone" => $d_pwd1,
                "Role" => $row['role'],
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




    public function index()

    {
    

  
        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 

        $data['styles'] = ['public/app-assets/vendors/css/tables/datatable/datatables.min.css'];



        $data['script'] = ['public/app-assets/js/scripts/tables/datatables/datatable-basic.js','

        public/app-assets/vendors/js/tables/datatable/datatables.min.js'];

        

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('Admin/View-user');

        echo view('/include/footer'); 

    

    }











    public function create($id = null)

    {
        $config         = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);

        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 



        $data['styles'] = ['public/app-assets/vendors/css/tables/datatable/datatables.min.css'];

        $data['script'] = ['public/app-assets/js/scripts/tables/datatables/datatable-basic.js','

        public/app-assets/vendors/js/tables/datatable/datatables.min.js'];


        if($id){
            $UserModel= new UserModel();


		$user = $UserModel->where('id', $id)->first();
        $password=$user['password'];
        $phone=$user['phone'];
        $d_password = $encrypter->decrypt(base64_decode($password));
        $d_phone = $encrypter->decrypt(base64_decode($phone));
        // echo ($d_password);
        // echo ($d_phone);
        // exit;
            $data2['user'] = $user;
            $data2['password'] = $d_password;
            $data2['phone'] = $d_phone;

        }else{
            $data2['user'] = "";
        }

        // exit();

        

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('users/create',$data2);

        echo view('/include/footer'); 

    

    }

    public function save()
{
    $config         = new \Config\Encryption();
    $encrypter = \Config\Services::encrypter($config);

    $id = $this->request->getPost('id');
    $name = $this->request->getPost('name');
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $phone = $this->request->getPost('phone');
    $church_id = session()->user_church_id;
    $parent_id = session()->user_id;





    $info = $this->request->getPost('info');

    $currenttime = date('Y-m-d h:i:s');
    $UserModel = new UserModel();
    $UserGroupModel = new UserGroupModel();


	$password_encrypt = base64_encode($encrypter->encrypt($password));
	$phone_encrypt = base64_encode($encrypter->encrypt($phone));


    $data = [
        'name' => $name,
        'email' => $email,
        'password' => $password_encrypt,
        'phone' => $phone_encrypt,
        'church_id' => $church_id,
        'status' => "active",
        'parent' => $parent_id,
        'rstatus'=>"Y",
        'role'=>'user'
    ];

    if ($id == "") {
        // Insert scenario
        $UserModel->insert($data);

        $new_insert_id = $UserModel->getInsertID();



          $UserModel = new UserModel();
           $role=2;
                $data45=[
                        'user_id'=>$new_insert_id,
                        'group_id'=>$role
                    ];
         $UserGroupModel->insert($data45);    



        $to = $email;
        $email = \Config\Services::email();

        $email->setTo($to);
        $email->setFrom('noreply@congreg8.org', 'congreg8');

        $subject = "Login Information";
        $message = "Dear $name,\n\n";
        $message .= "Please find your login details below:\n\n";
        $message .= "Username: $to\n";
        $message .= "Password: $password\n\n";
        $message .= "Regards,\n";
        $message .= "Congreg8 Team";

        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) {
            $checks = [
                'check' => "User Saved and email sent successfully",
            ];

            return redirect()->to('/users')->with('checks', $checks);
        } else {
           
        $checks = [
            'check' => "User Saved successfully",
        ];

        return redirect()->to('/users')->with('checks', $checks);
    }

    } else {
        
        // Update scenario
        $UserModel->update($id, $data); 
        $checks = [
            'check' => "User Updated successfully",
        ];

            return redirect()->to('/users')->with('checks', $checks);
        }
    
}

public function sendinfo($id)
{
    $UserModel= new UserModel();
    $user = $UserModel->where('id', $id)->first();

    
        $name = $user['name'];
        $to = $user['email'];
        $password = $user['password'];
        $phone = $user['phone'];
        $church_id = $user['church_id'];
       
        
            // Insert scenario
          
          
            $email = \Config\Services::email();
    
            $email->setTo($to);
            $email->setFrom('noreply@congreg8.org', 'congreg8');
    
            $subject = "Login Information";
            $message = "Dear $name,\n\n";
            $message .= "Please find your login details below:\n\n";
            $message .= "Username: $to\n";
            $message .= "Password: $password\n\n";
            $message .= "Regards,\n";
            $message .= "Congreg8 Team";
    
            $email->setSubject($subject);
            $email->setMessage($message);
    
            if ($email->send()) {
                $checks = [
                    'check' => "email sent successfully",
                ];
    
                return redirect()->to('/adduser/'.$id)->with('checks', $checks);
            } else {
               
            $checks = [
                'check' => "Email not sent",
            ];
    
            return redirect()->to('/adduser/'.$id)->with('checks', $checks);
        }
    
        



}
// function encryptallpass()
// {
//     $config         = new \Config\Encryption();
//     $encrypter = \Config\Services::encrypter($config);
//     $UserModel= new UserModel();
//     $user = $UserModel->FindAll();
//     if(empty($user))
//     {
//         echo "empty";
//         exit;
//     }
//     else
//     {
//         foreach($user as $row)
//         {
//             $password=$row['password'];
//             $password_encrypt = base64_encode($encrypter->encrypt($password));
//             $data = [
//                 'encrypt_pwd'=>$password_encrypt,
//             ];
//             $UserModel->update($row['id'], $data); 


//         }
//     }
// }

}





