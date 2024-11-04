<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UserChurchModel;
use CodeIgniter\Encryption\Encryption;

class Login extends BaseController

{
    public function checkCookies()
        {
            $request = service('request');
            
            // Get the email and password cookies
            $emailCookie = $request->getCookie('hash_cookie_email');
            $passwordCookie = $request->getCookie('hash_cookie_password');

            if ($emailCookie !== null && $passwordCookie !== null) {
                // Both cookies are present, you can use them to log in the user or perform other actions.
                // For example, you might have a login functionality here.
                echo "Email cookie value: " . $emailCookie . "<br>";
                echo "Password cookie value: " . $passwordCookie;
            } else {
                // Either or both of the cookies are not present.
                echo "Email and/or password cookies are not saved.";
            }
        }

    public function index()

    {  
        $config         = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);
        
        if(isset($_REQUEST['login'])){
            $check=$this->request->getVar('remember_me');
            $email=$this->request->getVar('email');
            $password=$this->request->getVar('password');
            
            $session = session();

            $UserModel=new UserModel();
            $UserChurchModel = new UserChurchModel();

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $user = $UserModel->where('email', $email)->first();
              

			if(!$user)
			{
				  $data = [
                        'check'=>"yes",        
                    ];

                    

                return view('login/sign_in', $data);
			}
		
            $d_pwd = $user['password'];
            // echo $d_pwd;
            // exit();
            $d_pwd1 = $encrypter->decrypt(base64_decode($d_pwd));
         
            if($user && $d_pwd1==$password)
            {         
                session()->set('user_id',$user['id']);

                session()->set('user_church_id',$user['church_id']);
                

                if ($check == 1) {
                    $cookie_hash = md5(uniqid()."sghsgd876mbjb");
                    $response = service('response');
                    
                    
                    $response->setCookie('hash_cookie_email', $email, 36000); // Set the email as a cookie
                    $response->setCookie('hash_cookie_password', $password, 36000); // Set the password as a cookie
                    
                } else {
                  
                    $response = service('response');
                    $response->setCookie('hash_cookie_email', ''); // Set an empty value to remove the cookie
                    $response->setCookie('hash_cookie_password', ''); // Set an empty value to remove the cookie
                }


                   return redirect()->to(base_url());

                


            }else{

                $data = [
                        'check'=>"yes",        
                    ];

                    

                return view('login/sign_in', $data);
            }

        }

       echo   view('login/sign_in');

     

    }


    function logout()

    {
        session()->destroy();

        return redirect()->to(base_url());

    }
    function resetpass()
{
    $UserModel = new UserModel();
    $email = $this->request->getVar('email');
    $user = $UserModel->where('email', $email)->first();

    
    if (!empty($user)) {
        $id=$user['id'];
        $date = date('Y-m-d H:i:s');
        $resetlink = md5($date);
        $resetDateTime = date('Y-m-d H:i:s');

        $data =
        [
            'reset_link' => $resetlink, 
            'reset_datetime'=>$resetDateTime,

        ];
        $UserModel->update($id,$data);
        $to = $email;
        $subject = 'Create New Password';
        $resetlink = base_url() . '/reset/verify/' . $resetlink;

        // Assuming this is your controller code
        $currentYear = date('Y');

        $message = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <title></title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        </head>
        <body>
        <h1>Reset Your Password</h1>
        <p>Click the following link to create a new password:</p>
        <a href="' . $resetlink . '">' . $resetlink . '</a>
        <p>&copy; ' . $currentYear . ' Congreg8</p>
        </body>
        </html>';
    

        if (sendmail($to, $subject, $message)) {
            $data = [
                'check' => "Success",
            ];
            
            //return view('dashboard/Reset_Thank_you', $data);
             return view('login/checkemail.php', $data);
        }
        else{

        $data = [
                'check'=>"email not verified",        
            ];

            

            return view('dashboard/Reset_Thank_you',$data);
    } 
    } else {
        $data = [
            'check'=>"wrong email",        
        ];

        

        return view('dashboard/Reset_Thank_you',$data);
    }
}

public function verify($id)
    {
        $db      = \Config\Database::connect();
        $key=$id;
        

        $UserModel= new UserModel();


        $user = $UserModel->where('reset_link', $key)->first();
        
        if ($user) {
            $userid=$user['id'];
            
        $data['userid']=$userid;
            return view('login/comformpassword',$data);
        }
        else
        {
            $data = [
                'check'=>"email not verified",        
            ];

            

            return view('dashboard/Reset_Thank_you',$data);
        }
    }

    public function savenewpassword()
    {
        $UserModel = new UserModel();
        $userid = $this->request->getVar('userid');
        $user = $UserModel->where('id', $userid)->first();
        $resetlink = $user['reset_link'];
    
        $password = $this->request->getVar('password');
        $confirm_password = $this->request->getVar('confirm_password');
    
        if ($password != $confirm_password) {
            // Store error message in session
            session()->setFlashdata('password_mismatch_error', 'Confirm password does not match');
            return redirect()->to(base_url() . 'reset/verify/' . $resetlink); // Redirect back to the 'reset/verify' page with the 'reset_link' as a parameter
        }
        else
        {
                
            $db      = \Config\Database::connect();
            $userid = $this->request->getVar('userid');
            $password = $this->request->getVar('password');
            $query = $db->table('users')
            ->select('*')
            ->where('id', $userid)
            ->where('TIMESTAMPDIFF(MINUTE, reset_datetime, NOW()) >', 0)
            ->where('TIMESTAMPDIFF(MINUTE, reset_datetime, NOW()) <', 21)
            ->get();
    
            $user = $query->getRow();
           
            if (!$user) 
            {
                $data = [
                    'reset_link' => "ok",
                ];
    
                $db->table("users")
                ->where('id', $userid)
                ->update($data);
            }

            $data =
            [
                'password' => $password, 
            ];
            $UserModel->update($userid,$data);
            
          
            
            $data = [
                'check' => "Success reset",
            ];
        
            return view('dashboard/Reset_Thank_you', $data);

            }
            
            }

}
