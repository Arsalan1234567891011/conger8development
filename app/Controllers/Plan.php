<?php



namespace App\Controllers;
use App\Models\PlanModel;
use App\Models\PlanOptionModel;
use App\Models\PlanDetailsModel;




class Plan extends BaseController

{
    public function create()

    {

        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 



        $data['styles'] = ['public/app-assets/vendors/css/tables/datatable/datatables.min.css'];



        $data['script'] = ['public/app-assets/js/scripts/tables/datatables/datatable-basic.js','

        public/app-assets/vendors/js/tables/datatable/datatables.min.js'];

        

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('plan/create');

        echo view('/include/footer'); 

    

    }
    public function edit($id)

    {

        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 



        $data['styles'] = ['public/app-assets/vendors/css/tables/datatable/datatables.min.css'];



        $data['script'] = ['public/app-assets/js/scripts/tables/datatables/datatable-basic.js','

        public/app-assets/vendors/js/tables/datatable/datatables.min.js'];

        

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 
        $PlanModel = new PlanModel();
        $data['user'] = $PlanModel->where('pm_id', $id)->first();
        
        echo view('plan/create',$data);

        echo view('/include/footer'); 

    

    }
    function addcreate()
    {
   
        $id=$this->request->getvar('id');
        $PlanModel= new PlanModel();

        if(empty($id))
        {
            $data=
             
            [
                'pm_title' =>$this->request->getvar('pm_title'),
                'pm_price' =>$this->request->getvar('pm_price'),
                'pm_yearly' =>$this->request->getvar('pm_yearly'),
                'pm_lifetime' =>$this->request->getvar('pm_lifetime'),
                'pm_currency' =>$this->request->getvar('pm_currency'),
                'pm_color' =>$this->request->getvar('pm_color'),
                'pm_user_ref' =>session()->user_id,
              
            ];
           
            
               $user= $PlanModel->insert($data);
        return redirect()->to(base_url()."/createnew");

        }
        else
        {
            $data = [
                'pm_title' => $this->request->getvar('pm_title'),
                'pm_price' => $this->request->getvar('pm_price'),
                'pm_yearly' =>$this->request->getvar('pm_yearly'),
                'pm_lifetime' =>$this->request->getvar('pm_lifetime'),
                'pm_currency' => $this->request->getvar('pm_currency'),
                'pm_color' => $this->request->getvar('pm_color'),
                // 'pm_user_ref' => session()->user_id,
            ];
          
           
            $PlanModel = new PlanModel();   
            
           
            $PlanModel->update($id,$data);
    
        return redirect()->to(base_url()."manage-plan");

        }            

    }


    function signupsubscription()
      {
        
        $data['title']="Subscription "; 

        $data['page']="Admin/dashboard"; 

        $data['styles'] = ['/public/newassets/css/bootstrap.min.css','/public/newassets/css/choose-plan.css'];

        //echo view('/include/head1',$data);

        //echo view('/include/topheader',$data); 
       
        $PlanModel = new PlanModel();
        $PlanOptionModel = new PlanOptionModel();
        $data['PlanOptionresult'] = $PlanOptionModel->where('po_delete','Y')->findAll();

        $data['result'] = $PlanModel->where('pm_isdelete', 'Y')->where('pm_isactive','Y')->where('pm_visibility','1')->findAll();        
      
        
        
        echo view('plan/plan',$data);
      // echo view('plan/signupsubscription_old',$data);
       // echo view('/include/footer'); 
         
      }

      
    function manageplan()
    {
        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 



        $data['styles'] = ['public/app-assets/vendors/css/tables/datatable/datatables.min.css'];



        $data['script'] = ['public/app-assets/js/scripts/tables/datatables/datatable-basic.js','

        public/app-assets/vendors/js/tables/datatable/datatables.min.js'];

        

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 
        $PlanModel = new PlanModel();
        $data['result'] = $PlanModel->where('pm_isdelete', 'Y')->findAll();
     

        echo view('plan/manageplan',$data);

        echo view('/include/footer'); 

    }
    function delete($id)
    {
        $data = [
            'pm_isdelete' => 'N',
        ];
       
        $PlanModel = new PlanModel();
     
        
       
        $PlanModel->update($id,$data);
    return redirect()->to(base_url()."/manage-plan");
    }

    function subscription()
    {
        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 



        $data['styles'] = ['public/app-assets/vendors/css/tables/datatable/datatables.min.css'];



        $data['script'] = ['public/app-assets/js/scripts/tables/datatables/datatable-basic.js','

        public/app-assets/vendors/js/tables/datatable/datatables.min.js'];

        

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 
        $PlanModel = new PlanModel();
        $PlanOptionModel = new PlanOptionModel();
        $data['PlanOptionresult'] = $PlanOptionModel->where('po_delete','Y')->findAll();

        $data['result'] = $PlanModel->where('pm_isdelete', 'Y')->findAll();        
      
        
        
        echo view('plan/subscription',$data);

        echo view('/include/footer'); 
    }
  
    public function plandetail($id)

    {

        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 



        $data['styles'] = ['public/app-assets/vendors/css/tables/datatable/datatables.min.css'];



        $data['script'] = ['public/app-assets/js/scripts/tables/datatables/datatable-basic.js','

        public/app-assets/vendors/js/tables/datatable/datatables.min.js'];

        

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 
        $data['id']=$id;

        // $db = db_connect();                                                  
        // $builder = $db->table('plan_detail');
        
        // $ids = explode(',', $data['id']);
        
        // foreach ($ids as $id) {
        //     $builder->set('pd_isdeleted', 'N');
        //     $builder->where('pd_pm_ref', $id);
        //     $builder->update();
        // }
        
        
        $PlanModel = new PlanModel();
        $PlanOptionModel = new PlanOptionModel();
        $data['PlanOptionresult'] = $PlanOptionModel->where('po_delete','Y')->where('po_isactive','Y')->where('po_type','Q')->findAll();
        $data['user'] = $PlanModel->where('pm_id', $id)->first();
        $data['PlanOption_NonQuntifired'] = $PlanOptionModel->where('po_delete','Y')->where('po_isactive','Y')->where('po_type','N')->findAll();
        
        echo view('plan/plandetail', $data);

        echo view('/include/footer'); 

    

    }
    function addoption()
    {
        $PlanDetailsModel = new PlanDetailsModel();
    
        $id = $this->request->getVar('id');
        $options = $this->request->getVar('options');
         $db = db_connect();                                                  
        $builder = $db->table('plan_detail');
        
        $ids = explode(',', $id);
        
        foreach ($ids as $id) {
            $builder->set('pd_isdeleted', 'N');
            $builder->where('pd_pm_ref', $id);
            $builder->update();
        }
        foreach ($options as $row) {
            $quantity = $this->request->getVar('quantity_' . $row); // Fetch the quantity value for each option
            
            // Check if quantity is empty or null and set it to 0
            if (empty($quantity) || is_null($quantity)) {
                $quantity = 0;
            }
            
            $data = array(
                'pd_pm_ref' => $id,
                'pd_po_ref' => filter_var($row, FILTER_SANITIZE_STRING),
                'pd_user_ref' => session()->user_id,
                'pd_po_quantity' => $quantity,
            );
        
            $user = $PlanDetailsModel->insert($data);
        }
        
        return redirect()->to(base_url()."manage-plan");
    }
//option crud
function optionplan()
    {
        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 



        $data['styles'] = ['public/app-assets/vendors/css/tables/datatable/datatables.min.css'];



        $data['script'] = ['public/app-assets/js/scripts/tables/datatables/datatable-basic.js','

        public/app-assets/vendors/js/tables/datatable/datatables.min.js'];

        

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 
    
        $PlanOptionModel = new PlanOptionModel();
        $data['PlanOptionresult'] = $PlanOptionModel->where('po_delete','Y')->findAll();

        echo view('plan/optionplan',$data);

        echo view('/include/footer'); 

    }
    function optiondelete($id)
    {
        $data = [
            'po_delete' => 'N',
        ];
       
        $PlanOptionModel = new PlanOptionModel();
        $PlanOptionModel->update($id,$data);

    return redirect()->to(base_url()."/option-plan");
    }
    function addnewoption()
    {

        $id = $this->request->getvar('hidden_id');

        if($id==""){

        $PlanOptionModel = new PlanOptionModel();

        $data=
             
            [
                'po_title' =>$this->request->getvar('po_title'),
                'po_user_ref' =>session()->user_id,
              
            ];
            
               $user= $PlanOptionModel->insert($data);

        }else
        {

            $data=
             
            [
                'po_title' =>$this->request->getvar('po_title'),  
            ]; 

            $PlanOptionModel = new PlanOptionModel();
            $PlanOptionModel->update($id,$data);

        }
        return redirect()->to(base_url()."/option-plan");
    }
    // function editoption($id)
    // {
    //     $PlanOptionModel = new PlanOptionModel();

    //     $data=
             
    //         [
    //             'po_title' =>$this->request->getvar('po_title'),              
    //         ];
            
    //         $PlanOptionModel->update($id,$data);
    //     return redirect()->to(base_url()."/option-plan");
    // }
    public function get_option() {
        $PlanOptionModel = new PlanOptionModel();

    $id= $this->request->getvar('id');
    $data = $PlanOptionModel->where('po_id', $id)->first();
    $json_data = json_encode($data);
    header('Content-Type: application/json');
    echo $json_data;

       
      }

      public function getpackagesbytime()
      {
        $id = $this->request->getVar('id');
        $planOptionModel = new PlanModel();
        $data = $planOptionModel->where('pm_isdelete !=', 'N')->findAll();
        $json_data = json_encode($data);
        header('Content-Type: application/json');
        echo $json_data;
        
        
      }

      public function changeoptionstatus()
      {
        $id = $this->request->getVar('dataId');
        $isChecked = $this->request->getVar('isChecked');

       if($isChecked=="true")
       {
           $status="Y";

       }else
       {

        $status="N";
       }
        $data=
             
        [
            'po_isactive' =>$status,  
        ]; 

        $PlanOptionModel = new PlanOptionModel();
        $PlanOptionModel->update($id,$data);


      }




      public function getplanid()
      {
        $db = db_connect();                                                  

        $UserModel = new UserModel();

        $user_plan = $this->request->getVar('pmId');
        $id = session()->user_id;
        $data=[
            "user_plan"=>$user_plan,

        ];
        $UserModel->update($id, $data);
        
        $updateQuery = $db->table('user_plans')
        ->where('user_id', $id)
        ->update(['is_active' => 0]);

    // Insert the new entry
        $insertQuery = $db->table('user_plans')
        ->insert([
        'user_id' => $id,
        'plan_id' => $user_plan,
        ]);
        


      }


}