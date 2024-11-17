<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ChurchModel;
use App\Models\UserChurchModel;
use CodeIgniter\Encryption\Encryption;
use App\Models\UserGroupModel;


class Signup extends BaseController
{
	public function index(){
       $cache = \Config\Services::cache();

        // Clear all caches
        $cache->clean();
		$UserModel = new UserModel();
		$config         = new \Config\Encryption();
		$encrypter = \Config\Services::encrypter($config);

		$passworde = "123456";
		$password_encrypt = base64_encode($encrypter->encrypt($passworde));

		$data = ['password' => $password_encrypt];
		$UserModel->update("138", $data);



		$data['title'] = "Signup with Congreg8";
		$data['controller'] = $this->request->uri->getSegment(1);

		echo view('signup/index',$data);
		
		//echo view('signup/verify-email',$data);
		
	}
	
	
	public  function verifyemail($id)
	{
		
		$data['id'] = $id;
		$data['title'] = "Email Verification";
	    echo view('signup/verify-email',$data);
	}


	public function save()
	{
	
      	$config         = new \Config\Encryption();
		$encrypter = \Config\Services::encrypter($config);
		$UserModel = new UserModel();
		$UserChurchModel = new UserChurchModel();
		
		$UserGroupModel = new UserGroupModel();


		// $phone = preg_replace('/[^0-9]/', '', $this->request->getVar('phone'));
		$phone = preg_replace('/[^0-9]/', '', $this->request->getVar('phone'));

		// Trim the leading '1' if it exists
		if (substr($phone, 0, 1) == '1') {
			$phone = substr($phone, 1);
		}
		
		$data = [
			
			'email' => $this->request->getVar('email')
		];
	
		$user = $UserModel->where($data)->first();
		
		if ($user) {
			echo json_encode(array("result" => "Email already exists", "value" => ""));
			exit();
		} else {
			if ($this->request->getVar('password') != $this->request->getVar('cpassword')) {
				echo json_encode(array("result" => "Confirm password does not match", "value" => ""));
				return;
			}
	
			$date = date('Y-m-d H:i:s');
			$resetlink = md5($date);
			$verifylink = md5($date);
			$passworde=$this->request->getVar('password');
			$email=$this->request->getVar('email');

			
			$password_encrypt = base64_encode($encrypter->encrypt($passworde));
			$phone_encrypt = base64_encode($encrypter->encrypt($phone));
			$otp = rand(1000, 9999);

			$userData = [
				'name' => $this->request->getVar('name'),
				'phone' => $phone_encrypt,
				'email' => $email,
				'role' => 'churchadmin',
				'status' => 'verify',
				'password' => $password_encrypt,
				'verify_link' => $resetlink,
				'otp' => $otp
			];
	
			if ($UserModel->insert($userData)) {
				$new_insert_id = $UserModel->getInsertID();
	
				$ChurchModel = new ChurchModel();
				$date = date('Y-m-d H:i:s');
				$rand = rand(11111, 99999);
				$val = $date . '' . $rand;
				$att_link = md5($val);
	
				$churchData = [
					'church_name' => 'Your Church',
					'parentid' => $new_insert_id,
					'att_link' => $att_link,
					'default_church' => 1
				];
	
				$ChurchModel->insert($churchData);
				$new_church_id = $ChurchModel->getInsertID();
	
				$userChurchData = [
					'user_ref' => $new_insert_id,
					'church_ref' => $new_church_id,
					'createdat' => $date,
					'createdby' => $new_insert_id
				];

				  $role=1;
                    $data45=[

                        // 'group_name'=>$groupName,
                        'user_id'=>$new_insert_id,
                        'group_id'=>$role
        
                    ];
                    $UserGroupModel->insert($data45);    
	
				$UserChurchModel->insert($userChurchData);
	
				$data = ['church_id' => $new_church_id];
				$UserModel->update($new_insert_id, $data);

				$session = session();
				session()->set('user_id',$new_insert_id);
                session()->set('user_church_id',$new_church_id);
	
				$to = $this->request->getVar('email');
				$subject = 'Verify Email Address';
				$resetlink = base_url() . 'signup/verify/' . $resetlink;
	
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
				<h1>Verify Your Email Address</h1>
				<p>Your verification  OTP is:</p>
				<h2 >' . $otp  . '</h2>
				<p>&copy; ' . $currentYear . ' Congreg8</p>
				</body>
				</html>';
	
				//if (sendmail($to, $subject, $message)) {
			    if (sendmail('malikarsalanhhg2244@gmail.com', $subject, $message)) {
					echo json_encode(array("result" => "success", "value" => $verifylink));
					exit();
				} else {
					
					echo json_encode(array("result" => "Unable to send verification email", "value" => ""));
					exit();
				}
			} else {
				   echo json_encode(array("result" => "Unable to create user", "value" => ""));
				   exit();
				
			}
		}
	}
	


	public function verificationsent(){

		$data['title'] = "Verificaiton Email Sent";
		$data['controller'] = $this->request->uri->getSegment(1);

		echo view($this->request->uri->getSegment(1).'/verificationsent',$data);

	}

    public function verificationEmail()
	{
		
	$id = $this->request->getVar('id');
			$UserModel = new UserModel();
$user = $UserModel->where('id', $id)->first();
if ($user && $user['verify_link'] === "ok") {
   return json_encode("exist");
    exit();
}

		$to =$user['email'];
				$subject = 'Verify Email Address';
				$resetlink = base_url() . 'signup/verify/' .$user['verify_link'];
	
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
				<h1>Verify Your Email Address</h1>
				<p>Click the following link to verify your email address:</p>
				<a href="' . $resetlink . '">' . $resetlink . '</a>
				<p>&copy; ' . $currentYear . ' Congreg8</p>
				</body>
				</html>';
	
				if (sendmail($to, $subject, $message)) {
					return json_encode("success");
				} else {
					return json_encode("not  verified");
				}
		
	}

	public function verifyotp()
	{ 

		$session = session();
        $userid = session()->user_id;		

		$db      = \Config\Database::connect();
		$UserModel= new UserModel();
		$otp = $this->request->getPost('otp');
		$user = $UserModel->where('id',$userid)->where('otp',$otp)->first();

		if (empty($user)) {

			$data = [
				'error' => true,
				'message' => 'OTP is not matched!'
			];
			return  json_encode($data);
		}

		$ChurchModel=new ChurchModel;
		$church = $ChurchModel->where('parentid =',$userid)->first();

		$id = $church['id'];
		$session = session();
		$name=$this->request->getvar('church_name');
		$email= $this->request->getvar('church_email');
		$website=$this->request->getvar('website');

		$address = $this->request->getVar('address');
        $pastor_name = $this->request->getVar('pastor_name');
        $timezone = $this->request->getVar('time_zone');


		
		$session->set('id',$id);
		$session->set('name',$name);
		$session->set('email',$email);
		$session->set('website',$website);
		$session->set('otp', $otp);
		$session->set('address', $address);
		$session->set('pastorname', $pastor_name);
		$session->set('timezone', $timezone);
	
		$data = [
				'success' => true,
				'message' => "Otp Verified Successfully"
		];


		return  json_encode($data);
	}

	public function verify($id)
	{ //sdfsfsdf
		$db      = \Config\Database::connect();
		$key=$id;

		$UserModel= new UserModel();


		$user = $UserModel->where('verify_link', $key)->first();

		if ($user) {
			$data = [
				'verify_link' => "ok",
			];
		
			// $builder = $this->db->table('users');
			// $builder->where('id', $user['id']);
			// $builder->update($data);

			$db->table("users")
			->where('id', $user['id'])
			->update($data);
		
			session()->set('user_id', $user['id']);
			session()->set('user_church_id', $user['church_id']);
		
			// Get user role using a separate function
			$user_role = get_user_role($user['id']);
			
			$data = [
				'check' => "email verified",
			];
		    return view('dashboard/verify-successful', $data);
			//return view('dashboard/Thank_you', $data);
		}
		else{
		  
		$data = [
				'check'=>"email not verified",        
			];

			
			return view('dashboard/invalid_link',$data);
			//return view('dashboard/Thank_you',$data);
	}



}
	
}
	

