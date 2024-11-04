<?php
namespace App\Controllers;
use App\Models\ChurchModel;
use App\Models\UserChurchModel;
use App\Models\UserModel;
use App\Models\PlanModel;
use App\Models\FeedbackModel;
use App\Models\subscription_detail;


class BillingController extends BaseController
{
    public function index()
    {
        $stripe = new \Stripe\StripeClient(getenv("stripe.secret"));
            
          // $subscription = $stripe->subscriptions->retrieve('sub_1P3KgNIhlAPV43xDvv9Q6W9O',[]);
          // dd( $subscription->jsonSerialize());
        $data['title']="Billing"; 

        $data['page']="Billing"; 

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('billing/index');

        echo view('/include/footer');
        
        
        

    }
     public function detail()
    {  
        
        $subscription_id =  $this->request->getGet('sub');
        
           $stripe = new \Stripe\StripeClient(getenv("stripe.secret"));
        
          $data['subscription'] = $stripe->subscriptions->retrieve($subscription_id,[]);
        // dd(   $data['subscription']->jsonSerialize());

        
        $data['title']="Billing Detail "; 

        $data['page']="Billing Detail"; 

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('billing/detail');

        echo view('/include/footer');

    }
    
     public function getbilling()
    {  
        $config  = new \Config\Encryption();
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
 
        $sql = "SELECT * FROM Subscription_detail WHERE";

        $sql .=" sd_church_id = ".session()->user_church_id." AND sd_isdeleted='Y'";
        
    
        // Apply search filter
        if (!empty($searchValue)) {
            $sql .= " AND (name LIKE '%" . $searchValue . "%' OR email LIKE '%" . $searchValue . "%' OR phone LIKE '%" . $searchValue . "%' OR role LIKE '%" . $searchValue . "%')";
        }
    
        // Apply church and type filters if present
        if (!empty($searchByChurch)) {
           // $sql .= " AND church = '" . $searchByChurch . "'";
        }
        if (!empty($searchByType)) {
          //  $sql .= " AND type = '" . $searchByType . "'";
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
          

            $data[] = array(
                "created_at" =>date("Y-m-d", strtotime($row['created_at'])),
                "Users" => getbillinguser(),
                "amount" => $row['sd_amount'],
                "Status" => '<span class="text-success">Active</span>',
                "Actions" => '<a  href="/billing/detail?sub='.$row['sd_subscriptionid'].'"  class="btn btn-primary mt-1" ><i class="fas fa-eye"></i></a>',
            

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
    
    
    
    
    
    
    


}
?>