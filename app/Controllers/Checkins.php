<?php



 namespace App\Controllers;

 use App\Models\UserModel;
 use App\Models\ManageCheckinModel;


 class Checkins extends BaseController



 



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


    

   function mcedit()


    {
        $ManageCheckinModel= new ManageCheckinModel();
        $id=$this->request->getPost('mc_id');
        $ManageCheckin= $ManageCheckinModel->where('mc_id =',$id)->first(); 
        echo json_encode($ManageCheckin);   
    }



    public function mcdel()
    {       
        $id=$this->request->getvar('delid');

        $ManageCheckinModel= new ManageCheckinModel();

        $data=[
            'mc_rstatus'=> 'N'
        ];

        if($ManageCheckinModel->update($id,$data)){
            echo "yes";
        }else{
            echo "no";
        }
}

    

    

    function savemanagecheckins()
    {
        $userid = session()->user_id;
        $church_id = get_user_church();

        $MangeCheckinModel = new ManageCheckinModel();

        $id=$this->request->getPost('id');

        $datetime = date('Y-m-d H:i:s');

        $mc_link = md5($datetime);

      if(empty($id))

      {
            $data=[
                'mc_title' => $this->request->getvar('mc_title'),
                'mc_church_id' => $church_id,
                'mc_link' => $mc_link,
                'mc_rstatus' => 'Y',
                'mc_sysdate' => $datetime,
                'mc_u_ref' => $userid,
            ];              

            $MangeCheckinModel->insert($data);

      }
      if(!empty($id))
      {
    
        $data=

            [
                'mc_title' =>$this->request->getPost('mc_title')
            ];
            $MangeCheckinModel->update($id,$data); 
      }
        return redirect()->to(base_url()."managecheckins");

    }

    

    

        function manage()



    {

        $church_id = get_user_church();

        $db = db_connect();

        $sql="select * from manage_checkins where mc_rstatus ='Y' AND mc_church_id = ".$church_id;

        $query =$db->query($sql);  

        $sqlu =$query->getResultArray();

        $data=[

            'data'=>$sqlu,

        ];

        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 



        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('checkins/manage');

        echo view('/include/footer'); 

        //return view('dashboard/integration',$data);







    }



 }



?>