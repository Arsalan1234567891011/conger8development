<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ContactModel;
use App\Models\NotesModel;
use App\Models\AttendanceModel;
use App\Models\ChurchModel;


class Notes extends BaseController

{

        function index($id)

        {

            $NotesModel= new NotesModel();

            $notes = $NotesModel->where('type =','notes')->where('userid =',$id)->where('r_status =','y')->orderBy('id', 'DESC')->findAll();   
            $data = [

                'users'=>$notes,
                'id'=>$id,
                'title'=>"Dashboard||Admin panel",
                'foractive' => 'notes'
            ];


            echo view('/include/head',$data);

            echo view('/include/topheader',$data); 

            echo view('/include/sidenavbar',$data); 

            echo view('notes/index');

            echo view('/include/footer');

            //return view('dashboard/task', $data);
        }



        // 15.march.2023
        function SaveNotes()

        {

                    $userid = session()->get('user_id');

                    $user_church_id = session()->get('user_church_id');


        $get_user_current_plan = get_user_current_plan($user_church_id);

        $user_plan_limit = user_plan_limit($get_user_current_plan,4);

        $get_user_notes_limit = get_user_notes_limit($this->request->getvar('userid'),"Notes");


        if($get_user_notes_limit >= $user_plan_limit ){

            // window 
        $checks = [
    'check' => "Notes Creation Limit Reached",
];

return redirect()->to(base_url() . "tasks/" . $this->request->getvar('userid'))->with('checks', $checks);

        }
    
            $NotesModel= new NotesModel();
    
            $notesid=$this->request->getPost('notes_id');

           
            $get_time_zone = get_time_zone($this->request->getvar('userid'));
           
            date_default_timezone_set($get_time_zone);
    
            $date = date('Y-m-d H:i:s');
    
            if(empty($notesid))
    
            {
    
                $data=
    
                [
    
                    'type' =>'Notes',
    
                    'title' =>'A',
    
                    'text' =>$this->request->getvar('text'),
    
                    'userid' => $this->request->getvar('userid'),
    
                    'created_at' => $date,
                    
                    'created_by'=>session()->user_id,
                    // 'assign_to' => $this->request->getvar('assign_to')
      
    
                ];
              
                $id = $this->request->getvar('userid');
    
                $NotesModel->insert($data);
    
            }
    
            else if($notesid!=0)
    
            {
    
                $data=
    
                [
    
    
    
                    'type' =>'Notes',
    
                    'title' =>'A',
    
                    'text' =>$this->request->getPost('text'),
    
                    
    
                    // 'assign_to' => $this->request->getvar('assign_to')
    
    
    
                    
    
                ];
    
               
    
                $NotesModel->update($notesid,$data);
    
            } 
            return redirect()->to(base_url()."notes/".$this->request->getvar('userid'));
    
        }
        public function del_notes()

        {
            $am = new NotesModel();
    
            $data = [
    
                  'r_status' => 'N',
    
               ];
    
            if($am->update($this->request->getPost('delid'),$data)){
    
                echo "yes";
    
            }else{
    
                echo "no";
    
            }
    
        }

        function edit_notes()



        {
    
            // echo('dddd');
    
            // exit;
    
            $NotesModel= new NotesModel();
    
            $id=$this->request->getPost('delid');
    
            $task= $NotesModel->where('id =',$id)->first();  
    
            echo json_encode($task);     
    
    
    
        }



}