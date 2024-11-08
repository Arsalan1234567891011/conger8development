<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ContactModel;
use App\Models\NotesModel;
use App\Models\AttendanceModel;
use App\Models\ChurchModel;
use CodeIgniter\Encryption\Encryption;

class ProfileController extends BaseController
{

        ////////////////////////////////////////Edit User Profile///////////////////////

        function EditView()

        {
            $config         = new \Config\Encryption();
            $encrypter = \Config\Services::encrypter($config);

            $UserModel= new UserModel();

           $userData = session()->get();        

           $userid= $userData['user_id'];          

           $user = $UserModel->where('id=',$userid)->first();    
           $d_pwd = $user['phone'];
           $d_pwd1 = $encrypter->decrypt(base64_decode($d_pwd));
        //    var_dump($d_pwd1);
        //    exit;
            $data = [

                'user'=>$user,    
                'd_pwd1'=>$d_pwd1,
            ];


            $data['title']="Dashboard||Admin panel "; 
            echo view('include/new/head',$data);
            echo view('/include/new/topheader',$data); 
            echo view('/include/new/sidenavbar',$data); 
            echo view('profile/edit', $data); 
            
            exit();
            echo view('/include/head',$data);

            echo view('/include/topheader',$data); 

            echo view('/include/sidenavbar',$data); 

            echo view('profile/edit_old', $data); 

            echo view('/include/footer'); 

        }

        

        function UpdateView()

        {
            $config         = new \Config\Encryption();
		    $encrypter = \Config\Services::encrypter($config);
            $phone = preg_replace('/[^0-9]/', '', $this->request->getPost('phone'));

            // Trim the leading '1' if it exists
            if (substr($phone, 0, 1) == '1') {
                $phone = substr($phone, 1);
            }

            $UserModel= new UserModel();



            $session=session();

            $userData = session()->get();        

            $userid= $userData['user_id'];

            $file=$this->request->getFile('image');

            $imageName = '';

            if(!empty($file))
            {
                if($file->isValid() &&! $file->hasMoved())
    
                {
    
                    $imageName = $file->getRandomName();
    
                    $file->move('uploads/',$imageName);
    
                }
            }

            $data = array();
            $phone_encrypt = base64_encode($encrypter->encrypt($phone));
            $data = [

                    'name' =>$this->request->getPost('name'), 

                    'email' =>$this->request->getPost('email'),                             

                    'phone' =>$phone_encrypt,    

                    'image'=>$imageName,                        



                ];

            $UserModel->update($userid,$data);        

            return redirect()->to(base_url()."view-profile");   

    

        }

        function Editpassword()

        {


            $data['title']="Dashboard||Admin panel "; 

            echo view('/include/head',$data);

            echo view('/include/topheader',$data); 

            echo view('/include/sidenavbar',$data); 

            echo view('profile/edit-password', $data); 

            echo view('/include/footer'); 

    

        }

        function updatepassword()

        {
            $config         = new \Config\Encryption();
            $encrypter = \Config\Services::encrypter($config);

            $UserModel= new UserModel();
            $session=session();
            $userData = session()->get();     
            $old_password=$this->request->getPost('oldpass');
            if($this->request->getPost('password') != $this->request->getPost('confirm_password')  )
            {
                session()->setFlashdata('password_mismatch_error', 'Confirm password does not match');
                return redirect()->to(base_url() . '/view-profile');
            }
            
            // ->where('password =', $this->request->getPost('oldpass'))
            $userid= $userData['user_id'];
            $user = $UserModel->where('id=',$userid)->first();    
            $passworde = $user['password'];
            $encrypt_old_password = $encrypter->decrypt(base64_decode($passworde));
           
            if($user && $old_password == $encrypt_old_password)

            {
                $new_password=$this->request->getPost('password');
                $new_password_encrypt = base64_encode($encrypter->encrypt($new_password));
                
                $data = [

                    'password' => $new_password_encrypt,                         

                ];

              $UserModel->update($userid,$data);  

              session()->setFlashdata('password_change', 'Password Change Successfully');
              return redirect()->to(base_url() . '/view-profile');

            }

            else

            {
                session()->setFlashdata('password_mismatch_error', 'Old password does not match');
                return redirect()->to(base_url() . '/view-profile');
            }

            

           





            

    

        }

}