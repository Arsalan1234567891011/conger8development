<?php



 namespace App\Controllers;

 use App\Models\ContactModel;
 use App\Models\UserModel;
 use App\Models\IntegrationModel;
 use App\Models\SurveyModel;
 use App\Models\SurveySubmissionModel;


 class Integration extends BaseController



 



 {



    public function integrationDelete()







    {       







        $id=$this->request->getvar('delid');







        $IntegrationModel= new IntegrationModel();







        $data=[







            'rstatus'=> 'N'







        ];







        // $IntegrationModel->update($id,$data);







        if($IntegrationModel->update($id,$data)){







            echo "yes";







        }else{







            echo "no";







        }




}


    

   function integrationEdit()


    {
        $IntegrationModel= new IntegrationModel();
        $id=$this->request->getPost('delid');
        $task= $IntegrationModel->where('id =',$id)->first(); 
        echo json_encode($task);   
    }

    

    

    function integration_save()
    {
        $userid = session()->user_id;
        $church_id = get_user_church();
        $IntegrationModel=new IntegrationModel();
        $id=$this->request->getPost('id');
        $many_chat='many_chat';
        $id=$this->request->getPost('id');

      if(empty($id))

      {
            $data=[
                'many_chat' =>$many_chat,
                'church_id' => $church_id,
                'key_value' =>$this->request->getvar('key_value'),
                'user_id' => $userid,
                'rstatus' =>'Y',
            ];              
            $IntegrationModel->insert($data);

      }
      if(!empty($id))
      {
    
        $data=

            [
                'key_value' =>$this->request->getPost('key_value')
            ];
            $IntegrationModel->update($id,$data); 
      }
        return redirect()->to(base_url()."integration");

    }

    

    

        function index()



    {

        $church_id = get_user_church();

        $db = db_connect();

        $sql="select * from integration where rstatus ='Y' AND church_id = ".$church_id;

        $query =$db->query($sql);  

        $sqlu =$query->getResultArray();

        $data=[

            'integration'=>$sqlu,

        ];

        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 



        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('integration/index');

        echo view('/include/footer'); 

        //return view('dashboard/integration',$data);







    }



 }



?>