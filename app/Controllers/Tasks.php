<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ContactModel;
use App\Models\NotesModel;
use App\Models\AttendanceModel;
use App\Models\ChurchModel;
use App\Models\TaskalertModel;



class Tasks extends BaseController

{

        function index($id)

        {

            $NotesModel= new NotesModel();

            $tasks = $NotesModel->where('type =','task')->where('userid =',$id)->where('r_status =','y')->orderBy('id', 'DESC')->findAll();   

            $data = [

                'users'=>$tasks,
                'id'=>$id,
                'title'=>"Dashboard||Admin panel",
                'foractive' => 'tasks'
            ];


            echo view('/include/head',$data);

            echo view('/include/topheader',$data); 

           echo view('/include/sidenavbar',$data); 

           echo view('tasks/index');

            echo view('/include/footer');

            //return view('dashboard/task', $data);
        }

        
    function Savetask()
    {





        $NotesModel= new NotesModel();
        $TaskalertModel= new TaskalertModel();


        $taskid=$this->request->getPost('notes_id');
        

      if(empty($taskid))

        {
           

        $userid = session()->get('user_id');

        $user_church_id = session()->get('user_church_id');


        $get_user_current_plan = get_user_current_plan($user_church_id);

        $user_plan_limit = user_plan_limit($get_user_current_plan,3);

        $get_user_notes_limit = get_user_notes_limit($this->request->getvar('userid'),"Task");



// var_dump($get_user_notes_limit);exit;

        if($get_user_notes_limit >= $user_plan_limit){


        $checks = [
    'check' => "Tasks Creation Limit Reached",
];

            return redirect()->to(base_url()."tasks/".$this->request->getvar('userid'))->with('checks', $checks);
            exit();
        }
      

                $data=
                [
                    'type' =>'Task',
                    'text' =>$this->request->getvar('text'),
                    'title' =>$this->request->getvar('title'),
                    'userid' => $this->request->getvar('userid'),
                    'assign_to' => $this->request->getvar('assign_to'),
                    'created_by' =>  $userid,
                    'due_date' => $this->request->getvar('due_date')
                ];
                $NotesModel->insert($data); 
                $inserted_taskid = $NotesModel->insertID();

                $data1=
                [
                    'user' => $this->request->getvar('assign_to'),
                    'is_read' => 'N',
                    'message' => 'New task assigned',
                     'taskid'=> $inserted_taskid,
                ];
                $TaskalertModel->insert($data1); 
        }

        else if($taskid != 0)

        {

            $data=

            [

                'type' =>'Task',

                'text' =>$this->request->getPost('text'),

                'title' =>$this->request->getPost('title'),

                'userid' => $this->request->getPost('userid'),

                'assign_to' => $this->request->getPost('assign_to'),

                'due_date' => $this->request->getPost('due_date')



            ];

            $NotesModel->update($taskid,$data); 



        }



        return redirect()->to(base_url()."tasks/".$this->request->getvar('userid'));

    }
    public function del_task()
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
    function edit_task()
    {

        $NotesModel= new NotesModel();

        $id=$this->request->getPost('taskid');

		$task= $NotesModel->where('id =',$id)->first();  

        echo json_encode($task);     



    }
    function tasknotification()
    {
        $TaskalertModel = new TaskalertModel();
        $user_id = session()->get('user_id');
        $tasks = $TaskalertModel->where('user', $user_id)->findAll();
    
        if (!empty($tasks)) {
            foreach ($tasks as $taskToUpdate) {
                $taskToUpdate['is_read'] = 'Y';
                $TaskalertModel->update($taskToUpdate['id'], $taskToUpdate);
            }
        }
    }
    



}