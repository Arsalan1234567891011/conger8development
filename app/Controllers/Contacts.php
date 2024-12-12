<?php

namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\UserModel;
use CodeIgniter\Encryption\Encryption;

require "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Contacts extends BaseController
{
    public function get_contacts()
    {
        $config = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);
        $db = db_connect();
        
        // Get request data from DataTable
        $draw = $_POST["draw"];
        $row = $_POST["start"];
        $rowperpage = $_POST["length"]; // Rows per page (10, 20, etc.)
        $columnIndex = $_POST["order"][0]["column"]; // Column index
        $columnName = $_POST["columns"][$columnIndex]["data"]; // Column name
        $columnSortOrder = $_POST["order"][0]["dir"]; // asc or desc
        $searchValue = $this->request->getPost('searchvalue');//$_POST["search"]["value"]; // Search value
        
        $searchByStatus =$this->request->getPost('searchByStatus');
        $searchByType = $this->request->getPost('searchByType');
        $userid = session()->get("user_id");
        $user_church_id = session()->get("user_church_id");
        
        $UserModel = new UserModel();
        $data = ["id" => session()->user_id];
        $user = $UserModel->where($data)->first();
        
        $sql = "SELECT c.name, c.email, c.phone, c.address, c.gender, c.birthday, c.status, c.form_type, c.id as tabid, t.tags
                FROM contacts c
                LEFT JOIN tbl_tags t ON t.contact_id = c.id
                WHERE c.r_status = 'Y' AND c.name != '' ";
        
        // Apply filters based on user role
        $get_user_role = get_user_role(session()->user_id);
        
        if ($get_user_role != "superadmin") {
            $sql .= " AND c.church_id = " . session()->user_church_id . " ";
        }
      //  var_dump( $searchByStatus);exit();
        // Apply status filter
        if (isset($searchByStatus) && $searchByStatus != "") {
            $sql .= " AND c.status ='" . $searchByStatus . "' ";
        }
        
        // Apply type filter
        if (isset($searchByType) && $searchByType != "") {
            $sql .= " AND c.form_type ='" . $searchByType . "' ";
        }
        
        // Apply global search filter
        if ($searchValue != "") {
            $sql .= " AND (c.name LIKE '%" . $searchValue . "%' 
                        OR c.email LIKE '%" . $searchValue . "%'
                        OR c.address LIKE '%" . $searchValue . "%'
                        OR c.gender LIKE '%" . $searchValue . "%'
                        OR c.form_type LIKE '%" . $searchValue . "%')";
                        //OR t.tags LIKE '%" . $searchValue . "%') ";
        }
        
        // If column is 'id', explicitly refer to the alias 'tabid'
        if ($columnName == 'id') {
            $sql .= " ORDER BY c.id " . $columnSortOrder;
        } else {
            $sql .= " ORDER BY `" . $columnName . "` " . $columnSortOrder;
        }
        
        // Add limit for pagination
        $sql .= " LIMIT " . $row . "," . $rowperpage;
        
        $query = $db->query($sql);
        $attendance = $query->getResultArray();
        
        // Get the total number of records with the applied filters
        $sql1 = "SELECT COUNT(*) as allcount
                 FROM contacts c
                 WHERE c.r_status = 'Y' AND c.name != '' ";
        
        // Apply the same filters for counting
        if ($get_user_role != "superadmin") {
            $sql1 .= " AND c.church_id = " . session()->user_church_id . " ";
        }
        if (isset($searchByStatus) && $searchByStatus != "") {
            $sql1 .= " AND c.status ='" . $searchByStatus . "' ";
        }
        if (isset($searchByType) && $searchByType != "") {
            $sql1 .= " AND c.form_type ='" . $searchByType . "' ";
        }
        if ($searchValue != "") {
            $sql1 .= " AND (c.name LIKE '%" . $searchValue . "%'
                        OR c.email LIKE '%" . $searchValue . "%'
                        OR c.address LIKE '%" . $searchValue . "%'
                        OR c.gender LIKE '%" . $searchValue . "%'
                        OR c.form_type LIKE '%" . $searchValue . "%')";
                       // OR t.tags LIKE '%" . $searchValue . "%') ";
        }
        
        // Execute count query
        $query1 = $db->query($sql1);
        $totalRecordwithFilter = $query1->getRow()->allcount;
        
        $data = [];
        
        // Decrypt phone and email and prepare the data for DataTable
        foreach ($attendance as $row) {
            $d_phone = "";
            try {
                $d_phone = $encrypter->decrypt(base64_decode($row["phone"]));
            } catch (\Exception $e) {
                $d_phone = $row["phone"];
            }
        
            $d_email = ""; // $encrypter->decrypt(base64_decode($row["email"]));
            try {
                $d_email = $encrypter->decrypt(base64_decode($row["email"]));
            } catch (\Exception $e) {
                $d_email = $row["email"];
            }
        
            $type = ($row["form_type"] == "Member" || $row["form_type"] == 1) ? "Member" : "Visitor";
            $status = ($row["status"] == "active") ? '<span class="status-active">active</span>' : '<span class="status-inactive">inactive</span>';

            
            $data[] = [
                "id" => '<div class="form-check">
                                    <input class="form-check-input cont-checkbox" type="checkbox" id="checkbox-' . $row["tabid"] . '" data-id="' . $row["tabid"] . '" onchange="updateDeleteIcons()">
                                    <label class="form-check-label" for="checkbox-' . $row["tabid"] . '"></label>
                                </div>',
                "name" => '<a href="contacts-profile/' . $row["tabid"] . '">' . $row["name"] . '</a>',
                "email" => $d_email,
                "phone" => $d_phone,
                "form_type" => $type,
                "status" => $status ,
                "action" => ' <a href="contacts-profile/' . $row["tabid"] . '">
                                  <svg id="edit-icon-' . $row["tabid"] . '" style="cursor: pointer" class="edit-contact" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 11 11" fill="#9F9DA8">
                                   <path style="cursor: pointer" class="edit-contact" d="M0 8.70802V11H2.29198L9.05487 4.23712L6.76288 1.94513L0 8.70802ZM10.8212 2.47076C11.0596 2.23239 11.0596 1.84428 10.8212 1.60592L9.39408 0.178775C9.15571 -0.0595916 8.76761 -0.0595916 8.52924 0.178775L7.41075 1.29726L9.70273 3.58925L10.8212 2.47076Z"/>
                                  </svg>
                               </a>
                               <svg id="delete-icon-' . $row["tabid"] . '" data-id="' . $row["tabid"] . '" class="delete-contact" style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="12" height="15" viewBox="0 0 9 11" fill="#9F9DA8">
                                    <path id="delete-icon-' . $row["tabid"] . '" data-id="' . $row["tabid"] . '" style="cursor: pointer" class="delete-contact" d="M1.00491 9.78052C1.00491 10.4513 1.52343 11 2.1573 11H6.76683C7.40068 11 7.91919 10.4513 7.91919 9.78052V2.75H1.00491V9.78052ZM8.78348 0.916667H6.62277L5.89933 0H3.0248L2.30134 0.916667H0.140625V1.83333H8.78348V0.916667Z"/>
                               </svg>',
            ];

        }
        
        // Prepare the response
        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        ];
        
        echo json_encode($response);
    }

    function index()
    {
        $db = db_connect();

        $c_sql = "SELECT * from manage_church where rstatus = 'Y'";
        $c_query = $db->query($c_sql);
        $church_data = $c_query->getResultArray();

        $data = [
            "churches" => $church_data,
        ];

        $data["title"] = "All Contacts";

        $data["page"] = "Admin/dashboard";

        $data['title']="All Contact"; 
        $data['page']="Admin/dashboard"; 
        $data['link'] = [
            '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />',
            '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>',
            '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">',
            '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>',
            '<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">',
            '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">',
            '<link rel="stylesheet" href="' . base_url('public/all-contacts/contact.css') . '">',
            '<link rel="stylesheet" href="' . base_url('public/Dashboard/style.css') . '">'
        ];   
        $data['footerlinks'] = [
           '<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>',
           '<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>',
           '<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>',
            '<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>',
            '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>',
            '<script src="' . base_url() . '/public/Dashboard/index.js"></script>',
        ];         
        echo view('/include/new/header',$data); 
        echo view('/include/new/sidenavbar',$data); 
        echo view("contacts/index",$data);
        echo view('/include/new/footer',$data); 
    }

    function contactDelete()
    {
       
       $idArray = $this->request->getVar("delid");  // Get the array of IDs



$ContactModel = new ContactModel();

$data = [
    "r_status" => "N",
];

// Use whereIn to target multiple IDs and update them
$ContactModel->whereIn('id', $idArray)->set($data)->update();

if ($ContactModel->db->affectedRows() > 0) {
    echo "yes";
} else {
    echo "no";
}
    }

    public function importcontact_upload()
    {
        $session = session();
        $userData = session()->get();
        $userid = $userData["user_id"];
        $user_church_id = $userData["user_church_id"];

        // $input = $this->validate([
        // 	'file' => 'uploaded[file]|max_size[file,2048]|ext_in[file,csv],'
        // ]);
        // if (!$input) {
        // 	$data['validation'] = $this->validator;
        // 	return view( base_url()."/newcontacts", $data);
        // }else{
        $file = $this->request->getFile("userfile");

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move("uploads/csv", $newName);
            $file = fopen("uploads/csv/" . $newName, "r");
            $i = 0;
            $numberOfFields = 5;
            $csvArr = [];

            while (($filedata = fgetcsv($file, 1000, ",")) !== false) {
                $num = count($filedata);
                if ($i > 0 && $num == $numberOfFields) {
                    $csvArr[$i]["name"] = $filedata[0];
                    $csvArr[$i]["parent"] = $userid;
                    $csvArr[$i]["email"] = $filedata[1];
                    $csvArr[$i]["phone"] = $filedata[2];
                    $csvArr[$i]["status"] = $filedata[3];
                    $csvArr[$i]["form_type"] = $filedata[4];
                    $csvArr[$i]["church_id"] = $user_church_id;

                    //echo "sfssff";
                }
                $i++;
            }
            fclose($file);
            $count = 0;
            foreach ($csvArr as $userdata) {
                echo "yes";
                $ContactModel = new ContactModel();
                $findRecord = $ContactModel
                    ->where("email", $userdata["email"])
                    ->where("r_status =", "Y")
                    ->countAllResults();

                // $findRecord = $ContactModel->where('email', $userdata['email'])->countAllResults();
                if ($findRecord == 0) {
                    if ($ContactModel->insert($userdata)) {
                        $count++;
                    }
                }
            }
            session()->setFlashdata(
                "message",
                $count . " rows successfully added."
            );
            session()->setFlashdata("alert-class", "alert-success");
        } else {
            session()->setFlashdata(
                "message",
                "CSV file coud not be imported."
            );
            session()->setFlashdata("alert-class", "alert-danger");
        }
        // }else{
        // session()->setFlashdata('message', 'CSV file coud not be imported.');
        // session()->setFlashdata('alert-class', 'alert-danger');
        // }

        //return redirect()->to(base_url()."/contacts");
    }

    public function readExcel()
    {
        $session = session();
        $userData = session()->get();
        $userid = $userData["user_id"];
        $user_church_id = $userData["user_church_id"];
        $file = $this->request->getFile("userfile");
        $newName = $file->getRandomName();
        $file->move("importcontact", $newName);

        $filePath = "importcontact/" . $newName;

        $handle = fopen($filePath, "r");

        $rowData = []; // Array to hold all cell data
        $headerRow = []; // Array to store the header row
        $isFirstRow = true; // Flag to identify the header row
        $maxColumns = 0; // Variable to track the maximum number of columns

        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            if ($isFirstRow) {
                $isFirstRow = false;
                $headerRow = $data; // Store header row data
                continue; // Skip the first row (header)
            }
            $rowData[] = $data; // Store row data in the array

            // Update the maximum column count if a row with more columns is encountered
            $maxColumns = max($maxColumns, count($data));
        }
        fclose($handle);
        $header_array = [];
        foreach ($headerRow as $columnIndex => $columnName) {
            $header = $columnName;
            array_push($header_array, $header);
        }

        $db = db_connect();

        $sql = "SHOW COLUMNS from contacts";

        $query = $db->query($sql);

        $db_col = $query->getResultArray();
        //$db_col =$conn->query($sql);
        ?>

        <form method="post" action="readfile" class="ml-2">
        <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Excel column</th>
        <th>Database Column</th>
      </tr>
    </thead>
    <tbody>
	  <?php foreach ($header_array as $col) { ?>
      <tr>
        <td>
		      <div class="form-group">
               <input style="border: none" name="excelcol[]" type="text" class="form-control bg-white" value="<?php echo $col; ?>" readonly>
              </div>
		</td>
           <td>
        <div class="form-group">
        <select class="form-control" id="sel1" name="dbcol[]">
        <option value="">Select Column</option>
        <?php
        $j = "0";
        foreach ($db_col as $d_col) {
            $j++; ?>
        <option> <?php echo $d_col["Field"]; ?></option>
        <?php
        }
        $j = "0";
        ?>
      </select>
   
    </div>
        </td>
       
      </tr>
	  
	        <?php } ?>
     
     
    </tbody>
  </table>
  <input style="border: none" name="file_name" type="hidden" class="form-control bg-white" value="<?php echo $newName; ?>" readonly>
  <button class="btn btn-primary" type="submit">Submit</button>
  </form >
 <?php
    }

    public function readExcel1()
    {
        $session = session();
        $userData = session()->get();
        $userid = $userData["user_id"];
        $user_church_id = $userData["user_church_id"];

        $ContactModel = new ContactModel();

        $file = $this->request->getFile("userfile");

        if ($file->isValid() && !$file->hasMoved()) {

            $newName = $file->getRandomName();
            $file->move("uploads", $newName);

            // echo $newName;

            // exit();

            // Load the PHPExcel library

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $header_array = [];

            $spreadsheet = $reader->load("uploads/" . $newName);

            $d = $spreadsheet->getSheet(0)->toArray();

            $col = $spreadsheet->getActiveSheet()->getHighestColumn();

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            $i = 1;

            $col = $spreadsheet->getActiveSheet()->getHighestColumn();

            for ($i = "A"; $i <= $col; $i++) {
                $header = $spreadsheet
                    ->getActiveSheet()
                    ->getCell($i . "1")
                    ->getValue();
                array_push($header_array, $header);
            }

            // show  database table column

            $db = db_connect();

            $sql = "SHOW COLUMNS from contacts";

            $query = $db->query($sql);

            $db_col = $query->getResultArray();

            //$db_col =$conn->query($sql);
            ?>

        <form method="post" action="readfile" class="ml-2">
        <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Excel column</th>
        <th>Database Column</th>
      </tr>
    </thead>
    <tbody>
	  <?php foreach ($header_array as $col) { ?>
      <tr>
        <td>
		      <div class="form-group">
               <input style="border: none" name="excelcol[]" type="text" class="form-control bg-white" value="<?php echo $col; ?>" readonly>
              </div>
		</td>
           <td>
        <div class="form-group">
        <select class="form-control" id="sel1" name="dbcol[]">
        <option value="">Select Column</option>
        <?php
        $j = "0";
        foreach ($db_col as $d_col) {
            $j++; ?>
        <option> <?php echo $d_col["Field"]; ?></option>
        <?php
        }
        $j = "0";
        ?>
      </select>
   
    </div>
        </td>
       
      </tr>
	  
	        <?php } ?>
     
     
    </tbody>
  </table>
  <input style="border: none" name="file_name" type="text" class="form-control bg-white" value="<?php echo $newName; ?>" readonly>
  <button class="btn btn-primary" type="submit">Submit</button>
  </form >
 <?php
        } else {
            echo "Error uploading file: " . $file->getErrorString();
        }
    }

    function readfile()
    {
        define("table_name", "contacts");
        $isFirstRow = true; // Initialize $isFirstRow]]
        $maxColumns = 0; // Variable to track the maximum number of columns
        $header_array = [];
        $database_col = [];
        $e_col = [];
        $db12 = db_connect();
        $excel_col = $_REQUEST["excelcol"];
        $db_col = $_REQUEST["dbcol"];
        $file_name = $_REQUEST["file_name"];
        // insert excel_header and database column
        $i = 0;
        foreach ($excel_col as $e) {
            // echo $e."-".$db_col[$i]."<br>";
            $sql = "INSERT INTO temporary_table (db_col, excel_col, ref_name) VALUES ('$db_col[$i]','$e','$file_name')";
            $db12->query($sql);
            $i++;
        }

        $filePath = "importcontact/" . $file_name;
        $handle = fopen($filePath, "r");

        $rowData = []; // Array to hold all cell data
        $headerRow = []; // Array to store the header row

        // Initialize variables for tracking maximum columns and the first row
        $maxColumns = 0;
        $isFirstRow = true;

        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            if ($isFirstRow) {
                $isFirstRow = false;
                $headerRow = $data; // Store header row data
                continue; // Skip the first row (header)
            }
            $rowData[] = $data; // Store row data in the array

            // Update the maximum column count if a row with more columns is encountered
            $maxColumns = max($maxColumns, count($data));
        }

        fclose($handle);

        $header_array = [];
        foreach ($headerRow as $columnName) {
            $header_array[] = $columnName;
        }

        // Loop through all rows and columns to display cell data
        foreach ($rowData as $rowIndex => $row) {
            array_push($database_col, "church_id");
            array_push($e_col, session()->user_church_id);
            foreach ($row as $columnIndex => $cellData) {
                $columnName = isset($header_array[$columnIndex])
                    ? $header_array[$columnIndex]
                    : "Column $columnIndex";

                //col,row

                $header = $this->get_db_col($columnName, $file_name);
                array_push($database_col, $header);

                $val = $cellData;
                array_push($e_col, $val);
            }
            echo "<br/>";
            $db = "";
            $excel = "";
            $count = "0";

            //getting  db column and excel column
            foreach ($database_col as $key => $d) {
                $db .= $d;
                $excel .= "'" . $e_col[$key] . "'";
                //determine the  last  iteration
                if ($count != count($database_col) - 1) {
                    $db .= ",";
                    $excel .= ",";
                }

                $count++;
            }

            $sql =
                "INSERT INTO " .
                table_name .
                "(" .
                $db .
                ") VALUES (" .
                $excel .
                ")";
            $db12->query($sql);
            $e_col = [];
            $database_col = [];
        }

        return redirect()->to(base_url("contacts"));
    }

    function readfile1()
    {
        define("table_name", "contacts");
        $header_array = [];
        $database_col = [];
        $e_col = [];
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $db12 = db_connect();
        $excel_col = $_REQUEST["excelcol"];
        $db_col = $_REQUEST["dbcol"];
        $file_name = $_REQUEST["file_name"];
        // insert excel_header and database column
        $i = 0;
        foreach ($excel_col as $e) {
            // echo $e."-".$db_col[$i]."<br>";
            $sql = "INSERT INTO temporary_table (db_col, excel_col, ref_name) VALUES ('$db_col[$i]','$e','$file_name')";
            $db12->query($sql);
            $i++;
        }

        // read excel file
        $spreadsheet = $reader->load("uploads/" . $file_name);

        $d = $spreadsheet->getSheet(0)->toArray();

        //echo   count($d);
        $col = $spreadsheet->getActiveSheet()->getHighestColumn();

        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $i = 1;
        $col = $spreadsheet->getActiveSheet()->getHighestColumn();
        $row = $spreadsheet->getActiveSheet()->getHighestRow();

        //unset($sheetData[0]);

        //echo $sheetData[0][1];

        for ($j = "2"; $j <= $row; $j++) {
            $k = "1";
            //for col
            for ($i = "A"; $i <= $col; $i++) {
                //col,row
                if ($j == "2") {
                    $header = $this->get_db_col(
                        $spreadsheet
                            ->getActiveSheet()
                            ->getCellByColumnAndRow($k, 1)
                            ->getValue(),
                        $file_name
                    );
                    array_push($database_col, $header);
                }
                $val = $spreadsheet
                    ->getActiveSheet()
                    ->getCellByColumnAndRow($k, $j)
                    ->getValue();
                array_push($e_col, $val);
                $k++;
            }
            echo "<br/>";
            $db = "";
            $excel = "";
            $count = "0";
            //getting  db column and excel column
            foreach ($database_col as $d) {
                $db .= $d;
                $excel .= "'$e_col[$count]'";
                //determine the  last  iteration
                if ($count != count($database_col) - 1) {
                    $db .= ",";
                    $excel .= ",";
                }

                $count++;
            }

            $sql =
                "INSERT INTO " .
                table_name .
                "(" .
                $db .
                ") VALUES (" .
                $excel .
                ")";
            $db12->query($sql);
            $e_col = [];
        }
    }

    function get_db_col($header, $filename)
    {
        $db12 = db_connect();

        $sql =
            "SELECT * FROM temporary_table WHERE ref_name	 = '" .
            $filename .
            "' AND excel_col = '" .
            $header .
            "' LIMIT 1 ";
        //echo $sql;
        $query = $db12->query($sql); //$conn->query($sql);

        $results = $query->getResultArray();

        foreach ($results as $row) {
            return $row["db_col"];
        }
    }

    function importcontact()
    {
        $data["title"] = "Dashboard||Admin panel ";

        $data["page"] = "Admin/dashboard";

        echo view("/include/head", $data);

        echo view("/include/topheader", $data);

        echo view("/include/sidenavbar", $data);

        echo view("contacts/importcontact");

        echo view("/include/footer");

        //return view('dashboard/import-contact');
    }

    public function add()
    {
        $data["title"] = "Dashboard||Admin panel ";

        $data["page"] = "Admin/dashboard";

        echo view("/include/head", $data);

        echo view("/include/topheader", $data);

        echo view("/include/sidenavbar", $data);

        echo view("contacts/add");

        echo view("/include/footer");
    }

    public function save()
    {
        $config = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);

        if (strtolower($this->request->getMethod()) !== "post") {
            return view("dashboard/add-contacts", [
                "validation" => Services::validation(),
            ]);
        }

        $rules = [
            "name" => "required",
            "phone" => "required|numeric",
        ];

        if (!$this->validate($rules)) {
            $data["title"] = "Dashboard||Admin panel ";

            $data["page"] = "Admin/dashboard";

            $data["validation"] = $this->validator;

            echo view("/include/head", $data);

            echo view("/include/topheader", $data);

            echo view("/include/sidenavbar", $data);

            echo view("contacts/add");

            echo view("/include/footer");

            // return view('contacts/add', [
            //     'validation' => $this->validator,
            // ]);
        } else {
            $userid = session()->get("user_id");

            $user_church_id = session()->get("user_church_id");

            $get_user_current_plan = get_user_current_plan($user_church_id);

            $user_plan_limit = user_plan_limit($get_user_current_plan, 10);

            $get_user_contacts_limit = get_user_contacts_limit($user_church_id);

            if ($get_user_contacts_limit >= $user_plan_limit) {
                $checks = [
                    "check" => "Contact Creation Limit Reached",
                ];

                // window alert

                return redirect()
                    ->to("/contacts")
                    ->with("checks", $checks);
                exit();
            }

            $ContactModel = new ContactModel();
            $phone = preg_replace(
                "/[^0-9]/",
                "",
                $this->request->getvar("phone")
            );

            // Trim the leading '1' if it exists
            if (substr($phone, 0, 1) == "1") {
                $phone = substr($phone, 1);
            }
            $user = $ContactModel->where("phone", $phone)->first();

            if (!$user) {
                $email = $this->request->getvar("email");
                $birthday = $this->request->getvar("birthday");
                $address = $this->request->getvar("address");
                $d_phone = base64_encode($encrypter->encrypt($phone));
                $d_email = base64_encode($encrypter->encrypt($email));
                $d_birthday = base64_encode($encrypter->encrypt($birthday));
                $address = base64_encode($encrypter->encrypt($address));

                $data = [
                    "parent" => session()->user_id,

                    "name" => $this->request->getvar("name"),

                    "email" => $d_email,

                    "phone" => $d_phone,

                    "address" => $address,

                    "gender" => $this->request->getvar("gender"),

                    "birthday" => $d_birthday,

                    "created_by" => $this->request->getvar("created_by"),

                    "church_id" => $user_church_id,

                    "form_type" => $this->request->getvar("form_type"),
                ];

                $ContactModel->insert($data);

                return redirect()->to(base_url() . "contacts");
                exit();
            } else {
                session()->setFlashdata(
                    "Phone_number_already_exists",
                    "Phone number already exists"
                );
                return redirect()->to(base_url() . "addcontacts");
            }
        }
    }

    public function PublicContacts()
    {
        $data["title"] = "Contacts";
        $data["controller"] = $this->request->uri->getSegment(1);

        echo view("contacts/public_contacts", $data);
    }

    public function PublicContactsSave()
    {
        $ContactModel = new ContactModel();
        $db = db_connect();
        $id = $this->request->getpost("id");
        $sql = "SELECT id FROM `manage_church` WHERE att_link = '" . $id . "'";
        $query = $db->query($sql);
        $results = $query->getRow();

        $name = $this->request->getpost("name");
        $email = $this->request->getpost("email");
        $phone = $this->request->getpost("phone");
        $address = $this->request->getpost("address");
        $gender = $this->request->getpost("gender");
        $birthday = $this->request->getpost("birthday");
        $selectedValue = $this->request->getpost("selectedValue");

        $data = [
            "parent" => 0,
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
            "address" => $address,
            "gender" => $gender,
            "birthday" => $birthday,
            "source" => 2,
            "form_type" => $selectedValue,
            "church_id" => $results->id,
        ];

        $ContactModel->insert($data);
    }
    public function addexternalcontact()
    {
        $data["title"] = "Dashboard||Admin panel ";

        $data["page"] = "Admin/dashboard";

        // echo view('/include/head',$data);

        // echo view('/include/topheader',$data);

        // echo view('/include/sidenavbar',$data);

        echo view("contacts/externalform");

        //echo view('/include/footer');
    }
    public function saveexternalcontact()
    {
        $config = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);
        $ContactModel = new ContactModel();
        $phone = preg_replace("/[^0-9]/", "", $this->request->getvar("phone"));

        // Trim the leading '1' if it exists
        if (substr($phone, 0, 1) == "1") {
            $phone = substr($phone, 1);
        }
        $user = $ContactModel->where("phone", $phone)->first();

        if (!$user) {
            $email = $this->request->getvar("email");
            $birthday = $this->request->getvar("birthday");
            $d_phone = base64_encode($encrypter->encrypt($phone));
            $d_email = base64_encode($encrypter->encrypt($email));
            $d_birthday = base64_encode($encrypter->encrypt($birthday));

            $data = [
                "parent" => session()->user_id,

                "name" => $this->request->getvar("name"),

                "email" => $d_email,

                "phone" => $d_phone,

                "address" => $this->request->getvar("address"),

                "gender" => $this->request->getvar("gender"),

                "birthday" => $d_birthday,

                "created_by" => $this->request->getvar("created_by"),

                "source" => 2,

                "church_id" => get_user_church(),

                "form_type" => $this->request->getvar("form_type"),
            ];

            $ContactModel->insert($data);

            return redirect()->to(
                base_url() .
                    "/addexternalcontact?id=" .
                    $this->request->getvar("uid") .
                    "&thankyou=success"
            );
            exit();
        } else {
            return redirect()->to(
                base_url() .
                    "/addexternalcontact?id=" .
                    $this->request->getvar("uid") .
                    "&wrongnumber=success"
            );
            exit();
        }
    }
}
