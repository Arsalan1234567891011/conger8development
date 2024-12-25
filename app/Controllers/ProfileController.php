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

            $data['title']="Edit Profile"; 
            $data['page']="Admin/dashboard"; 
            $data['link'] = [
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />',
                '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>',
                '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>',
                '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">',
                '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>',
                '<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">',
               '<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">',
                '<link rel="stylesheet" href="' . base_url('public/Dashboard/style.css') . '">'
            ];   
            $data['footerlinks'] = [
                '<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>',
                '<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>',
                '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>',
                '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>',
                '<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>',
                '<script src="' . base_url() . '/public/Dashboard/index.js"></script>',
            ];        
            echo view('/include/new/header',$data); 
            echo view('/include/new/sidenavbar',$data); 
            echo view('profile/edit', $data); 
            echo view('/include/new/footer',$data); 

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
                   // 'email' =>$this->request->getPost('email'),                             
                    'phone' =>$phone_encrypt,   
                    'lname' =>$this->request->getPost('lname'),  
                    'bio' =>$this->request->getPost('bio'),    
                    'image'=>$imageName,                       
                ];
            $UserModel->update($userid,$data);  
            return $this->response->setJSON([
                'message' => 'Profile Updated successfully',
            ]);
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
        function updateprofileimage()
        {
            $UserModel= new UserModel();
            $userData = session()->get();        
            $userid= $userData['user_id'];
            $file = $this->request->getFile('profileImage');
            $imageName = $file->getRandomName();
            $file->move('uploads/',$imageName);            
            $data = array();
            $data = ['image'=>$imageName];
            $UserModel->update($userid,$data);  
            return $this->response->setJSON([
                    'success' =>true,
                    'message' => 'Profile Image Updated Successfully',
            ]);
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
                return $this->response->setJSON([
                    'error' =>true,
                    'message' => 'Confirm password does not match',
                ]);
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


              return $this->response->setJSON([
                'success' =>true,
                'message' => 'Password Change Successfully',
            ]);

            }

            else

            {
                return $this->response->setJSON([
                    'error' =>true,
                    'message' => 'Old password does not match',
                ]);
            }

            

           





            

    

        }

}