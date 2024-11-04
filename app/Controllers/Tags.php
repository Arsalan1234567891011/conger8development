<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ContactModel;
use App\Models\NotesModel;
use App\Models\AttendanceModel;
use App\Models\ChurchModel;
use App\Models\TagsModel;

class Tags extends BaseController
{
    public function index($id)

    {
        
        
        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 

        $data['styles'] = ['public/app-assets/vendors/css/tables/datatable/datatables.min.css'];



        $data['script'] = ['public/app-assets/js/scripts/tables/datatables/datatable-basic.js','

        public/app-assets/vendors/js/tables/datatable/datatables.min.js'];

        $data2['id']=$id;
        $tagmodel=new TagsModel();
        $data2['all_tags'] = $tagmodel->where('contact_id =', $id)->first();
        // $data2['all_tags'] = $data3['tagsdata']["tags"];

        $data = [
            'foractive' => 'tags',
            'title' => 'tags'
        ]; 

    
        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 
        // echo view('/include/userleftmenu',$data); 

        echo view('tags/index',$data2);

        echo view('/include/footer'); 

    }
    public function insert_tag()
    {
        $tagmodel=new TagsModel();
        $Contact_id=$this->request->getpost('id');
        $details=$this->request->getpost('details');
        $contactid = $tagmodel->where('contact_id =', $Contact_id)->first();
        

       $data= str_replace("×",",",$details);
       $data2= str_replace("#","",$data);
    //    $words = explode( " ", $data2 );
    if(!isset($contactid))
        {
            $main_data=[
                'contact_id'=>$Contact_id,
                'tags'=>$data2,
            ];
       $tagmodel->insert($main_data);

       return $main_data;
        }
        else{
            $id = $contactid['id'];
            $main_data=[
                'contact_id'=>$Contact_id,
                'tags'=>$data2,
            ];
       $tagmodel->update($id,$main_data);
        } 
        return $main_data;

    }

}