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







class Group extends BaseController
{
    function group_details()
    {
        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 



        $data['styles'] = ['public/app-assets/vendors/css/tables/datatable/datatables.min.css'];



        $data['script'] = ['public/app-assets/js/scripts/tables/datatables/datatable-basic.js','

        public/app-assets/vendors/js/tables/datatable/datatables.min.js'];

        

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 
        $GroupModel = new GroupModel();
        $data['result'] = $GroupModel->where('isdeleted', 'Y')->findAll();
     

        echo view('group/groupdetails',$data);

        echo view('/include/footer'); 

    }

    function savegroupdetails()
    {
        $GroupModel= new GroupModel();

        $id=$this->request->getvar('id');
        $groupName=$this->request->getvar('groupName');

        if(empty($id))
            {

            $data=[

                'group_name'=>$groupName,


            ];
            $GroupModel->insert($data);    
        }
        else
        {

             $GroupModel->set( 'group_name', $groupName );
            $GroupModel->where( 'id', $id );
            $GroupModel->update();
        }
    }

    function getgroupdata()
    {
        $id=$this->request->getvar('groupId');
       
        $GroupModel = new GroupModel();
        $data = $GroupModel->where('id',$id )->first();
      
        $response = [
            'id' => $id, // The data you want to send

            'editGroupName' => $data['group_name'] // The data you want to send
        ];
    
        echo json_encode($response);

    }

    public function delete_group($id)
    {
        
        $GroupModel= new GroupModel();
        $GroupModel->set( 'isdeleted','N');
        $GroupModel->where( 'id', $id );
        $GroupModel->update();
        return redirect()->to(base_url('/group-details'));

    }



    public function sidebarmenuitems($id)

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
        $GroupMenuModel = new GroupMenuModel();

        // $db = db_connect();                                                  
        // $builder = $db->table('plan_detail');
        
        // $ids = explode(',', $data['id']);
        
        // foreach ($ids as $id) {
        //     $builder->set('pd_isdeleted', 'N');
        //     $builder->where('pd_pm_ref', $id);
        //     $builder->update();
        // }
        
        
        $SideMenuModel = new SideMenuModel();
        // $PlanOptionModel = new PlanOptionModel();
        $data['groupmenu'] = $GroupMenuModel->where('isactive','Y')->where('group_id',$id)->findAll();
        // var_dump($data['groupmenu']);
        // exit;
        // $data['user'] = $PlanModel->where('pm_id', $id)->first();
        $data['menuitems'] = $SideMenuModel->where('isactive','1')->findAll();
   
        
        echo view('group/sidebarmenu', $data);

        echo view('/include/footer'); 

    

    }
    public function addmenuoption()
    {
        $GroupMenuModel = new GroupMenuModel();

        
            $id = $this->request->getVar('group_id');
            $options = $this->request->getVar('options');

            $db = db_connect();                                                  
            $builder = $db->table('group_menu');
            
            $ids = explode(',', $id);
            
            foreach ($ids as $id) {
                $builder->set('isactive', 'N');
                $builder->where('group_id', $id);
                $builder->update();
            }
            foreach ($options as $row) {
               
                $quantity = $this->request->getVar('quantity_' . $row);              
               
                if (empty($quantity) || is_null($quantity)) {
                    $quantity = 0;
                }                
                $data = array(
                    'group_id' => $id,
                    'sidebarmenu_id' => filter_var($row, FILTER_SANITIZE_STRING),
                    'isactive' => 'Y',
                    // 'sidebarmenu_id' => $quantity,
                );

                $user = $GroupMenuModel->insert($data);
            }

            // Redirect after processing
            return redirect()->to(base_url()."group-details");

    }
}