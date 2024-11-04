<?php

namespace App\Controllers;

class Register extends BaseController
{

    public function index()
    {
        echo view('Auth/register');
    
    }
    
	public function create(){


        $UserModel= new UserModel();

        $data = array(
            'phone'=>$this->request->getVar('phone'),
            'email'=>$this->request->getVar('email')
        );

        $user =  $UserModel->where($data)->first();  
          
    	$date = date('Y-m-d H:i:s');

        $resetlink = md5($date);

        $user =  $UserModel->where($data)->first();  

        if($user){

        	echo "User with phone already exists";

        }else {

        	if($this->request->getvar('password') != $this->request->getvar('cpassword')){
        		echo "Confirm password does not match";
        		return;
        	}

        	$data=
            [
                'name' =>$this->request->getvar('name'),

                'phone' =>$this->request->getvar('phone'),              

                'email' =>$this->request->getvar('email'),

                'role' => 'churchadmin',

                'status'=>'verify',

                'password' =>$this->request->getvar('password'),

                'verify_link'=> $resetlink,
            ];

       
        }
	}


	public function verificationsent(){

		$data['title'] = "Verificaiton Email Sent";
		$data['controller'] = $this->request->uri->getSegment(1);

		echo view($this->request->uri->getSegment(1).'/verificationsent',$data);

	}

}
