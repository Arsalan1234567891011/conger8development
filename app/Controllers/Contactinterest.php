<?php



namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ContactModel;



class Contactinterest extends BaseController

{
    function contactsInsert($id)

    {
        $ContactModel= new ContactModel();

        $user = $ContactModel->where('id',$id)->first();  

        // echo $ContactModel->getLastQuery();

        // $session = session();             

        // $session->set('contact_name', $user['name'] );

        // $session->set('contact_id',$user['id']);

        // $contactData = session()->get();

        $data = [  
			'user'=>$user,
            'id'=>$id,
            'title'=>"Dashboard||Admin panel",
            'foractive' => 'contactsinsert'
		];  


        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('contactsInsert/index');

        echo view('/include/footer');     


		//return view('dashboard/users-profile', $data);      

    } 
}





