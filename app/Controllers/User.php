<?php



namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Encryption\Encryption;
use App\Models\ContactModel;  
use App\Models\NotesModel;
use App\Models\AttendanceModel;
use App\Models\ChurchModel;
use App\Models\Billing;
use App\Models\PlanOptionModel;
use App\Models\PlanDetailsModel;
use App\Models\UserGroupModel;
use App\Models\PlanModel;
use App\Models\subscription;
use App\Models\subscription_detail;
use Ramsey\Uuid\Uuid;
use Stripe;



class User extends BaseController

{

    public function index()

    {


    

        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 

        $data['styles'] = ['public/app-assets/vendors/css/tables/datatable/datatables.min.css'];



        $data['script'] = ['public/app-assets/js/scripts/tables/datatables/datatable-basic.js','

        public/app-assets/vendors/js/tables/datatable/datatables.min.js'];

        

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('Admin/View-user');

        echo view('/include/footer'); 

    

    }



    public function create($id = null)
    {
        $config         = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);
        $data['title']="Dashboard||Admin panel "; 
        $data['page']="Admin/dashboard"; 
        $data['styles'] = ['public/app-assets/vendors/css/tables/datatable/datatables.min.css'];
        $data['script'] = ['public/app-assets/js/scripts/tables/datatables/datatable-basic.js','public/app-assets/vendors/js/tables/datatable/datatables.min.js'];
        $UserModel= new UserModel();
        $PlanModel= new PlanModel();		
        if($id){
			$user = $UserModel->where('id', $id)->first();
			$data2['Plan'] = $PlanModel->where('pm_isactive', "Y")->findAll();
			$password=$user['password'];
			$phone=$user['phone'];
			$d_password = $encrypter->decrypt(base64_decode($password));
			$d_phone = $encrypter->decrypt(base64_decode($phone));
			$data2['user'] = $user;
			$data2['password'] = $d_password;
			$data2['phone'] = $d_phone;
        }else{
            $data2['user'] = "";
            $data2['Plan'] = $PlanModel->where('pm_isactive', "Y")->findAll();
        }
        echo view('/include/head',$data);
        echo view('/include/topheader',$data); 
        echo view('/include/sidenavbar',$data); 
        echo view('users/create',$data2);
        echo view('/include/footer'); 
    }

	public function save()
	{
		// Create a config instance and an encrypter
		$config = new \Config\Encryption();
		$encrypter = \Config\Services::encrypter($config);

		// Get POST data
		$id = $this->request->getPost('id');
		$name = $this->request->getPost('name');
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
		$phone = $this->request->getPost('phone');
		$fetchrole = $this->request->getPost('fetchrole');
		$church_id = session()->user_church_id;
		$parent_id = session()->user_id;

		$info = $this->request->getPost('info');

		// Get the current time
		$currenttime = date('Y-m-d h:i:s');

		$UserModel = new UserModel();
		$UserGroupModel = new UserGroupModel();

		// Encrypt password and phone
		$password_encrypt = base64_encode($encrypter->encrypt($password));
		$phone_encrypt = base64_encode($encrypter->encrypt($phone));

	 

		if (empty($id)) {


		  $userid = session()->get('user_id');


			$user_church_id = session()->get('user_church_id');


		  $get_user_current_plan = get_user_current_plan($user_church_id);
		  



			$user_plan_limit = user_plan_limit($get_user_current_plan,28);



			$get_user_count = get_user_count($userid);


			 if($get_user_count >= $user_plan_limit && $get_user_current_plan=='1'){

				// window alert
				$checks = [
					'check' => "User Creation Limit Reached",
				];
				return redirect()->to('/users')->with('checks', $checks);

				exit();
			}



	   $data1 = [
			'name' => $name,
			'email' => $email,
			'password' => $password_encrypt,
			'phone' => $phone_encrypt,
			'church_id' => $user_church_id,
			'status' => "active",
			'parent' => $parent_id,
			'rstatus' => "Y",
			'role' => 'user'
		];


			// Insert scenario
			$UserModel->insert($data1);
			$new_insert_id = $UserModel->getInsertID();

			// Determine user role
			$role = 2; // Default role is 'user'

			// Insert user role
			$data45 = [
				'user_id' => $new_insert_id,
				'group_id' => $role,
				'isactive' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),

			];
			$UserGroupModel->insert($data45);

			// Send email notification
			$to = $email;
			$email = \Config\Services::email();

			$email->setTo($to);
			$email->setFrom('noreply@congreg8.org', 'congreg8');

			$subject = "Login Information";
			$message = "Dear $name,\n\n";
			$message .= "Please find your login details below:\n\n";
			$message .= "Username: $to\n";
			$message .= "Password: $password\n\n";
			$message .= "Regards,\n";
			$message .= "Congreg8 Team";

			$email->setSubject($subject);
			$email->setMessage($message);
			
		   //upgrade plan subscription 
		   $church_id = session()->user_church_id;   
		   $subcription_detail = new subscription_detail();
		   $sub_detail = $subcription_detail->where('status','active')->where('sd_isdeleted','Y')->where('sd_church_id',$church_id)->first();
		   $PlanModel = new PlanModel();
		   $plan = $PlanModel->where("pm_id", $sub_detail['sd_palnid'])->first();

		   if($sub_detail['sd_intervaltype'] == 'year')
		   {
			   $amount=$sub_detail['sd_amount']+(12*$plan['pm_yearly']);
		   }
		   else
		   {
				$amount = $sub_detail['sd_amount']+$plan['pm_price'];
		   }
		   
		   $subscription_id = $sub_detail['sd_subscriptionid'];
		   
		   $stripe = new \Stripe\StripeClient(getenv("stripe.secret"));
			
		   $subscription = $stripe->subscriptions->retrieve($subscription_id,[]);

		   $items = $subscription->items->data;

		   foreach ($items as $key=>$item) {
				 $sub_item_id = $item->id;
			}
			
			$product = $stripe->products->create([
				'name' => $plan["pm_title"],
			]);
		   //Create a price for the product
			$price = $stripe->prices->create([
				'product' => $product->id, 
				'unit_amount' => $amount,
				'currency' => 'usd',
				'recurring' => [
					'interval' => $sub_detail['sd_intervaltype'],
				],
			]);

			// Now you can use $price->id as the new price ID
			$new_price_id = $price->id;
			$stripe->subscriptions->update($subscription_id,
			[
				'items' => [
				  [
					'id' => $sub_item_id,
					'price' =>  $new_price_id,
				  ],
				],
			]);


			  Stripe\Stripe::setApiKey(getenv("stripe.secret"));
			  $subscription = \Stripe\Subscription::retrieve($subscription_id);
			  // Retrieve subscription data
			  $subsData = $subscription->jsonSerialize();
			
			  //update subscription detail table
			  $data = ["sd_amount" => $amount];
			  $subcription_detail->where('sd_id', $sub_detail['sd_id'])->set($data)->update();
			  //update subscription detail table
			  $model = new UserModel();
			  $data2 = ["user_plan" => $plan['pm_id']];
			  $model->where('id', $new_insert_id)->set($data2)->update();
			  
			  //add billing data
			  $billing = new Billing;
			  $data =[
					   'bl_user' => $new_insert_id,
					   'bl_parent' => session()->user_id,
					   'bl_church'=> session()->user_church_id
					 ];
			 
			  $billing->insert($data);
			  
			  if ($email->send()) {
					$checks = [
						'check' => "User Saved and email sent successfully",
					];
		
					return redirect()->to('/users')->with('checks', $checks);
			  } else {
					$checks = [
						'check' => "User Saved successfully",
					];
					return redirect()->to('/users')->with('checks', $checks);
				}
		} else {

	$user_role = get_user_role(session()->user_id);
	if ($user_role == 'superadmin'){

	$role45=$fetchrole;

	}else{

	$role45="user";

	}

			  $data2 = [
			'name' => $name,
			'email' => $email,
			'password' => $password_encrypt,
			'phone' => $phone_encrypt,
			'church_id' => $user_church_id,
			'status' => "active",
			'parent' => $parent_id,
			'rstatus' => "Y",
			'role' => $role45
		];
			// Update scenario
			$UserModel->update($id, $data2);

			// Check for existing user group
			$UserGroup = $UserGroupModel->where('user_id', $id)->where('isactive', 'Y')->findAll();

			if (empty($UserGroup)) {
				// No existing user group found, insert a new one
				if ($fetchrole == 'user') {
					$role11 = 2;
				} else {
					$role11 = 1;
				}

				$data23 = [
					'user_id' => $id,
					'group_id' => $role11,
					'isactive' => 'Y',
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
				];

				$UserGroupModel->insert($data23);
			} else {
				// Update existing user groups and set 'isactive' to 'N'
				foreach ($UserGroup as $group) {
					$dataToUpdate = [
						'isactive' => 'N',
						'updated_at' => date('Y-m-d H:i:s'),
					];
					$UserGroupModel->update($group['user_group_id'], $dataToUpdate);
				}

				// Insert the new user group
				if ($fetchrole == 'user') {
					$role11 = 2;
				} else {
					$role11 = 1;
				}

				$data23 = [
					'user_id' => $id,
					'group_id' => $role11,
					'isactive' => 'Y',
					'created_at' => date('Y-m-d H:i:s'),
				];

				$UserGroupModel->insert($data23);
			}

			$checks = [
				'check' => "User Updated successfully",
			];

			if ($user_role == 'superadmin'){

			return redirect()->to('/users')->with('checks', $checks);
		}else{

			return redirect()->to('/manage-users')->with('checks', $checks);


		}

		}
	}

	public function sendinfo($id)
	{
		$UserModel= new UserModel();
		$user = $UserModel->where('id', $id)->first();

		
			$name = $user['name'];
			$to = $user['email'];
			$password = $user['password'];
			$phone = $user['phone'];
			$church_id = $user['church_id'];
		   
			
				// Insert scenario
			  
			  
				$email = \Config\Services::email();
		
				$email->setTo($to);
				$email->setFrom('noreply@congreg8.org', 'congreg8');
		
				$subject = "Login Information";
				$message = "Dear $name,\n\n";
				$message .= "Please find your login details below:\n\n";
				$message .= "Username: $to\n";
				$message .= "Password: $password\n\n";
				$message .= "Regards,\n";
				$message .= "Congreg8 Team";
		
				$email->setSubject($subject);
				$email->setMessage($message);
		
				if ($email->send()) {
					$checks = [
						'check' => "email sent successfully",
					];
		
					return redirect()->to('/adduser/'.$id)->with('checks', $checks);
				} else {
				   
				$checks = [
					'check' => "Email not sent",
				];
		
				return redirect()->to('/adduser/'.$id)->with('checks', $checks);
			}
		
			



	}
}





