<?php



namespace App\Controllers;
use App\Models\PlanModel;
use App\Models\PlanOptionModel;
use App\Models\PlanDetailsModel;
use App\Models\UserModel;
use App\Models\SideMenuModel;
use App\Models\GroupModel;
use App\Models\GroupMenuModel;
use App\Models\UserGroupModel;
use App\Models\FormModel;
use App\Models\FormMainModel;
use App\Models\FormDetailModel;






class Dynamicform extends BaseController
{
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
     

        echo view('Dynamicform/index',$data);

        echo view('/include/footer'); 

    }

       public function addnewdynamicform()
    {
        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 


    
        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 
     

        echo view('Dynamicform/addnewdynamicform',$data);

        echo view('/include/footer'); 

    }


          public function viewdynamicelement($id)
    {
        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 


    $data['id']=$id;
        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 
     

        echo view('Dynamicform/viewdynamicelement',$data);

        echo view('/include/footer'); 

    }

 public function store()
    {
        $formModel = new FormModel();

        $urole = get_user_role(session()->user_id);

        if($urole == 'superadmin'){

  $church_id = "";
  //$att_link = get_att_link_church();
}else{


  $church_id = session()->user_church_id;



}

        $data = [
            'ID' => md5(time()),
            'code' => $this->request->getPost('html'),
            'Title' => $this->request->getPost('title'),
            'church_id' =>$church_id,

        ];

        $formModel->insert($data);

        $id = $formModel->insertID();


if($id){


    echo "success";
    }
}



public function viewsavedynamicform()
{
    $FormMainModel = new FormMainModel();
    $FormDetailModel = new FormDetailModel();

    $title = $this->request->getPost('title');
    $value = $this->request->getPost('value');
    $id = $this->request->getPost('id');

    // Create the main form entry
    $mainFormData = [
        'form_id' => $id,
        'session_id' => "", // Adjust as needed
        'fm_status' => 1,
        'fd_created_at' => date('Y-m-d H:i:s'), // Use 'H' for 24-hour format
    ];

    $FormMainModel->insert($mainFormData);

    // Get the ID of the newly inserted main form entry
    $mainFormId = $FormMainModel->insertID();

    if ($mainFormId) {
        $data = [];

        // Ensure both title and value arrays have the same number of elements
        if (count($title) == count($value)) {
            for ($i = 0; $i < count($title); $i++) {
                $data[] = [
                    'fd_title' => $title[$i],
                    'fd_value' => $value[$i],
                    'fm_fd_ref' => $mainFormId,
                    'fd_status' => 1,
                    'fd_created_at' => date('Y-m-d H:i:s'), // Use 'H' for 24-hour format
                ];
            }

            // Insert the data into the FormDetailModel
            $FormDetailModel->insertBatch($data);

            // Create an instance of the FormModel
            $FormModel = new FormModel();

            // Retrieve the record from FormModel using the instance
            $form = $FormModel->find($id);

            $response = [];
            // Add the HTML content to the response array
            $response['html'] = '
                <center>
                    <h2>THANK YOU</h2>
                    <h3>Your Submission Has Been Received!</h3>
                    <h4>Someone will reach out to you shortly.</h4>
                    <a style="padding: 12px; margin-bottom: 15px;" href="' . base_url('/viewdynamicformforuser') . "?ID=" . $form['ID'] . '" class="btn btn-danger">Make Another Submission</a>
                </center>';

            // Encode the HTML content as JSON
            echo json_encode($response);
        } else {
            // Respond with an error message if arrays have different lengths
            echo "error";
        }
    } else {
        // Handle the case where the main form entry couldn't be inserted
        echo "error";
    }
}





    public function saveDynamicFormData()
    {
      

        // You can now process and store the data as needed
        // For example, you can use a Model to insert the data into a database table
        // Replace 'YourModel' and 'your_table_name' with your actual model and table name

    }



    public function viewForm($id)
    {
        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 


    
        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

         $formModel = new FormModel();
        $data2['form'] = $formModel->where('form_id', $id)->first();

     

        echo view('Dynamicform/viewdynamicform',$data2);

        echo view('/include/footer'); 

    }

public function getformdata(){

        $db = db_connect();


        $draw = $_POST['draw'];

        $row = $_POST['start'];

        $rowperpage = $_POST['length']; // Rows display per page

        $columnIndex = $_POST['order'][0]['column']; // Column index

        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name

        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc

        $searchValue = $_POST['search']['value']; // Search value




           $sql = "SELECT form_id, ID, Title, f_status
        FROM form
        WHERE f_status != 2";

$urole = get_user_role(session()->user_id);

if ($urole == 'churchadmin') {
    $sql .= " AND church_id = " . session()->user_church_id;
}

$sql .= " ORDER BY `" . $columnName . "` " . $columnSortOrder;







        //echo $sql;





        $query =$db->query($sql);  

        $attendance =$query->getResultArray();



        $totalRecords = count($attendance);


        // start records total



        $query1 =$db->query($sql);  

        $attendance1 =$query1->getResultArray();


        $totalRecordwithFilter = count($attendance1);

        // end records total



        //$totalRecordwithFilter = count($attendance);



        $data = array();

        $config         = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);


        foreach ($attendance as $row) {


                if($row['f_status']==1){

                $status="Active";

                }elseif($row['f_status']==0){

                $status="In Active";


                }
$data[] = array(
//  '<a href="' . base_url() . '/viewdynamicelement/' . $row['form_id'] . '"><i class="fas fa-eye ml-1" style="color: green; cursor: pointer;"></i></a>' 
    "Title" => $row['Title'],
    "Status" => $status,
    "action" => '<div>' .
                '<i class="icon-pencil Aedit-record" style="color: blue; cursor: pointer;" id="' . $row['form_id'] . '"></i>' .
                '<i class="icon-trash Adel-record ml-1" style="color: red; cursor: pointer;" id="' . $row['form_id'] . '"></i> ' .
                '<a href="' . base_url() . '/viewdynamicformforuser?ID=' . $row['ID'] . '"><i class="icon-link ml-1" style="color: green; cursor: pointer;"></i></a>' .
                '<a ><i data-id="'. $row['form_id'] . '" class="fas fa-eye ml-1" style="color: green; cursor: pointer;"></i></a>' .
                '</div'
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
public function ajaxgetusersubmitteddata() {
    $db = \Config\Database::connect(); // Get the database connection
    $query = $db->table('form_detail');
    $query->select('fd_title, fd_value, fd_created_at');
    $query->where('fd_status', 1);
    $query->whereIn('fm_fd_ref', function ($builder) {
        $builder->select('fm_id')
            ->from('form_main')
            ->where('fm_status', 1)
            ->where('form_id',$this->request->getPost('id'));
    });

    $results = $query->get()->getResult();
    $html = '';
    $i = 0;
    foreach ($results as $result) {
        $html .= '
            <div class="col-11 mb-1 pr-2 d-flex ml-2" style="padding-top: 10px; border-radius: 5px; height: 40px; padding-left: 20px; border: 1px solid black;">
                <label class="text-nowrap" for="email"> '.$result->fd_title.'</label>
                <label class="text-nowrap ml-5" for="email">'.$result->fd_title.'</label>
            </div>
        ';
    }

    $response = array(
        'success' => true,
        'html' => $html
    );

    return json_encode($response);
}


public function getusersubmitteddata() {
    $db = db_connect();
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    $searchValue = $_POST['search']['value']; // Search value
    $id = $_POST['subid'];

    $sql = "SELECT fd_title, fd_value, fd_created_at
            FROM form_detail
            WHERE fd_status = 1
            AND fm_fd_ref IN (SELECT concat(fm_id) as uid FROM form_main WHERE fm_status = 1 AND form_id = " . $id . ")";

    // Modify the ORDER BY clause to use the correct column name
    $sql .= " ORDER BY `" . $columnName . "` " . $columnSortOrder;

    $query = $db->query($sql);
    $attendance = $query->getResultArray();
    $totalRecords = count($attendance);

    // start records total
    $query1 = $db->query($sql);
    $attendance1 = $query1->getResultArray();
    $totalRecordwithFilter = count($attendance1);

    $data = array();

    foreach ($attendance as $row) {
        $data[] = array(
            "fd_title" => $row['fd_title'],
            "fd_value" => $row['fd_value'],
            "fd_created_at" => $row['fd_created_at'],
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















public function getdynamicformdataofuser(){

        $db = db_connect();


        $draw = $_POST['draw'];

        $row = $_POST['start'];

        $rowperpage = $_POST['length']; // Rows display per page

        $columnIndex = $_POST['order'][0]['column']; // Column index

        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name

        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc

        $searchValue = $_POST['search']['value']; // Search value




           $sql = "SELECT form_id, ID, Title, f_status
        FROM form
        WHERE f_status != 2";

$urole = get_user_role(session()->user_id);

if ($urole == 'churchadmin') {
    $sql .= " AND church_id = " . session()->user_church_id;
}

$sql .= " ORDER BY `" . $columnName . "` " . $columnSortOrder;







        //echo $sql;





        $query =$db->query($sql);  

        $attendance =$query->getResultArray();



        $totalRecords = count($attendance);


        // start records total



        $query1 =$db->query($sql);  

        $attendance1 =$query1->getResultArray();


        $totalRecordwithFilter = count($attendance1);

        // end records total



        //$totalRecordwithFilter = count($attendance);



        $data = array();

        $config         = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);


        foreach ($attendance as $row) {


                if($row['f_status']==1){

                $status="Active";

                }elseif($row['f_status']==0){

                $status="In Active";


                }

  $data[] = array(
    "Title" => $row['Title'],
    "Status" => $status,
    "action" => '<div>' .
                '<i class="icon-pencil Aedit-record" style="color: blue; cursor: pointer;" id="' . $row['form_id'] . '"></i>' .
                '<i class="icon-trash Adel-record ml-1" style="color: red; cursor: pointer;" id="' . $row['form_id'] . '"></i> ' .
                '<a href="' . base_url() . '/viewdynamicformforuser?ID=' . $row['ID'] . '"><i class="icon-link ml-1" style="color: green; cursor: pointer;"></i></a>' .
                '<a href="' . base_url() . '/viewdynamicelement?ID=' . $row['id'] . '"><i class="fas fa-eye ml-1" style="color: green; cursor: pointer;"></i></a>' .
                '</div'
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




  public function viewdynamicformforuser()
    {
        $id = $this->request->getGet('ID');

       

         $formModel = new FormModel();
        $data2['form'] = $formModel->where('ID', $id)->first();
        
        $data2['ID']=$id;

        echo view('Dynamicform/externaldynamicformuser',$data2);


    }



}