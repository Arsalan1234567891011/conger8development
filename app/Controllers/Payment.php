<?php

namespace App\Controllers;
use App\Models\PlanModel;
use App\Models\PlanOptionModel;
use App\Models\PlanDetailsModel;
use App\Models\UserModel;
use App\Models\subscription;
use App\Models\UserChurchModel;
use App\Models\ChurchModel;
use App\Models\Billing;
use App\Models\subscription_detail;
use Ramsey\Uuid\Uuid;
use Stripe;

class Payment extends BaseController
{
    public function index($id, $plan)
    { 
        $db = \Config\Database::connect();
        $userData = session()->get();

        $sql ="SELECT Plan_Subscription.id , plan_id,pm_title FROM `Plan_Subscription`
               JOIN plan_master ON Plan_Subscription.plan_id =plan_master.pm_id
               WHERE plan_rstatus='Y' AND plan_status='Y' AND  church_id=" .
               $userData["user_church_id"] ." ";
        //return $sql;
        $query = $db->query($sql);
        $row = $query->getRow();
        if ($row) {
            $existingPlan = $row->plan_id;
        } else {
            $existingPlan = 0;
        }

        if ($existingPlan == $id) {
            return redirect()
                ->back()
                ->with("error", "you have already subscribe this plan");
        }

        // var_dump($plan);exit;
        $PlanModel = new PlanModel();

        if ($plan == "m") {
            $data2["price"] = $PlanModel
                ->select("pm_price, pm_currency")
                ->where("pm_id", $id)
                ->first();
            $data2["plan"] = 1;
            $pm_price = $data2["price"]["pm_price"];
        } elseif ($plan == "y") {
            $data2["price"] = $PlanModel
                ->select("pm_yearly as pm_price, pm_currency")
                ->where("pm_id", $id)
                ->first();
            $data2["plan"] = 2;
            $pm_price = $data2["price"]["pm_price"]*12;
        } else {
            $data2["price"] = $PlanModel
                ->select("pm_lifetime as pm_price, pm_currency")
                ->where("pm_id", $id)
                ->first();
            $data2["plan"] = 3;
        }

        //$pm_price = $data2["price"]["pm_price"];

        if ($pm_price == "0") {
            $userSessionId = session()->user_id;
            if ($existingPlan == "2") {
                Stripe\Stripe::setApiKey(getenv("stripe.secret"));
                $detail = new subscription_detail();
                $subscription = $detail
                    ->where("sd_church_id", $userData["user_church_id"])
                    ->where("sd_isdeleted", "Y")
                    ->first();

                $sql =
                    "UPDATE Subscription_detail SET sd_isdeleted = 'N' WHERE sd_church_id=" .
                    $userData["user_church_id"] .
                    " ";
                $query = $db->query($sql);

                if (!empty($subscription)) {
                     $subscription_cancel=\Stripe\Subscription::update(
                       $subscription["sd_subscriptionid"],
                        [
                             "cancel_at_period_end" => false // Cancel immediately
                        ]
                    );
					
					
				  $canceledSubscription = $subscription_cancel->cancel();

                    $subscription = \Stripe\Subscription::retrieve(
                        $subscription["sd_subscriptionid"]
                    );
                    
                    //delete billing 
                    $billing = new Billing;
                    $billing->where('bl_church', session()->user_church_id)->delete();
                   // return json_encode("User remove Successfully");
                    // Retrieve subscription data
                    $subsData = $subscription->jsonSerialize();
		
                    $sql =
                        "UPDATE Subscription_detail SET sd_isdeleted = 'N' ,status='cancelled' WHERE sd_church_id=" .
                        $userData["user_church_id"] .
                        " ";
                    $query = $db->query($sql);
                }
            }
            $userModel = new UserModel();
            $subscription = new subscription();
            $currentDate = date("Y-m-d H:i:s"); // Current date and time in 'Y-m-d H:i:s' format
            $user = $userModel->find($userSessionId);
            $church_id = $user["church_id"];

            $row = $subscription
                ->select("*")
                ->where("church_id", $church_id)
                ->findAll();

            if ($row) {
                /*  $updatedRows = $subscription
                    ->where("church_id", $church_id)
                    ->update([
                        "plan_status" => "N",
                        "plan_rstatus" => "N",
                    ]);*/
                $sql =
                    "UPDATE Plan_Subscription SET plan_rstatus = 'N',plan_status='N' WHERE church_id=" .
                    $church_id .
                    " ";
                $query = $db->query($sql);
            }
            // Rows were updated successfully, now you can insert a new record
            $data = [
                "user_id" => session()->user_id,
                "church_id" => $church_id,
                "plan_id" => $id,
                "plan_start" => $currentDate,
                "plan_end" => "",
                "plan_type" => "free",
                "plan_amount" => 0,
                "plan_status" => "Y",
                "plan_rstatus" => "Y",
                // Add other columns and their values as needed
            ];

            $subscription->insert($data);

            // Insert data into the 'subscription' table

            $data2 = [
                "user_plan" => $id,
                "plan_price" => $pm_price,
            ];

            $userModel = new UserModel();

            $userModel->update($userSessionId, $data2);

            $data3 = [
                "plan_id" => $id,
            ];

            $ChurchModel = new ChurchModel();

            // Perform the update
            $ChurchModel->update($church_id, $data3);

            return redirect()
                ->to(base_url("/"))
                ->with("success", "Thanks For Subscribing To the free plan!");
        }

        // var_dump( $data2);exit;

        $data["title"] = "Dashboard||Admin panel ";

        $data["page"] = "Admin/dashboard";

        $data2["planid"] = $id;

        $data2["interval"] = $plan;
        $data2["currency"] = $data2["price"]["pm_currency"];

        $data2["plan_price"] = $pm_price;

        $data2["userid"] = session()->user_id;

        $data["styles"] = [
            "/public/newassets/css/bootstrap.min.css",
            "public/newassets/css/payment.css",
        ];

        $data["script"] = [];

        echo view("/include/head", $data);

        echo view("/include/topheader", $data);

        echo view("/plan/stripe/payment", $data2);

        echo view("/include/footer");
    }
    public function plandetail()
    { 
        $session = session();
        $plan_model = new PlanModel();
        $plan =  $plan_model->where('pm_visibility',1)->where('pm_id', $this->request->getVar("id"))->first();

        if($this->request->getVar("interval") == 'm'){
            $data['price'] =   $plan['pm_price'];
        } else {
            $data['price'] =   $plan['pm_yearly'] * 12;
        }

        $data['currency'] =   $plan['pm_currency'];
        $data["planid"] = $plan['pm_id'];
        $data["interval"] = $this->request->getVar("interval");
        $data["userid"] = session()->user_id;

		return  json_encode($data);
    }

    public function bill(){


        $planTitle = session()->get('Plan_title');
        $amount = session()->get('amount');
        $intervalType = session()->get('intervaltype');
        $intervalCount = session()->get('interval_count');
        $txrId = session()->get('txrid');
        $session = session();
        $userid = session()->user_id;		

        $UserModel= new UserModel();
        $data12["Plan_title"] = $planTitle;
        $data12["amount"] = $amount ;
        $data12["intervaltype"] = $intervalType;
        $data12["interval_count"] =$intervalCount;
        $data12["txrid"] = $txrId ;
        $data12["user"] =  $UserModel->where('id',$userid)->first();


        $data["styles"] = [
            "/public/newassets/css/bootstrap.min.css",
            "/public/newassets/css/depost.css",
        ];
        $data['user'] =

        $data["title"] = "Payment Successful";

        echo view("/include/head", $data);

        echo view("/include/topheader");

        echo view("/plan/stripe/bill", $data12);

        echo view("/include/footer");
    }

    public function createCharge()
    {

        $ChurchModel = new ChurchModel();
        $UserChurchModel = new UserChurchModel();
        $session = session();
        $userData = session()->get();
        $userid= $userData['user_id'];
        $id=$userData['user_church_id'];
        $UserModel= new UserModel();
        $userdata=[
            'otp' => null,

        ]; 
        $UserModel->update(session()->user_id,$userdata);
        
        $data=[
            'parentid' =>$userid,
            'church_name' =>$userData['name'],
            'church_email' =>$userData['email'],
            'phone' =>$this->request->getvar('phone'), 
            'website' =>$userData['website'],
            'address' =>$this->request->getvar('address'),
            'pastor_name' =>$this->request->getvar('pastor_name'),
            'time_zone' =>$this->request->getvar('time_zone'),     
            'is_filled'=>'1',    

        ];    
                      

       $result=$ChurchModel->update($id,$data);
       $session = session();
       $session->remove('website');
	   $session->remove('email');
	   $session->remove('id');
	   $session->remove('name');




        $UserModel = new UserModel();
       // $sub_user = $UserModel->where("church_id",  session()->user_church_id)->where('parent',session()->user_id)->get()->getResult();
        $sub_user = $UserModel->where("church_id",  session()->user_church_id)->where("id",'!',session()->user_id)->get()->getResult();
        $admin = $UserModel->where("id", session()->user_id)->get()->getResult();
        $mergedusers = array_merge($sub_user, $admin);
        $sub_user_count = count($mergedusers);
        $planid = $this->request->getVar("planid");
        $PlanModel = new PlanModel();
        $plan = $PlanModel->where("pm_id", $planid)->first();
        $planName = $plan["pm_title"];
        $userid = session()->user_id;
        if ($this->request->getVar("interval") == "y") {
            $planPrice = $plan["pm_yearly"]*12*$sub_user_count;
            $interval = "year";
        } else {
            $planPrice = $plan["pm_price"]*$sub_user_count;
            $interval = "month";
        }
        $emailData = $UserModel->where("id", $userid)->first();
        $email = $emailData["email"];
        $stripe_api_key = $emailData["stripe_key_id"];

        $db = db_connect();
        Stripe\Stripe::setApiKey(getenv("stripe.secret"));

        $plan = $this->request->getVar("plan");

        $currentDate = date("Y-m-d H:i:s"); // Current date and time in 'Y-m-d H:i:s' format
        $expiryDateTime = date(
            "Y-m-d H:i:s",
            strtotime($currentDate . " +14 days")
        );

        if ($plan == "m") {
            $text = "Monthly Plan Payment";
            $expiryDate = date(
                "Y-m-d",
                strtotime("+1 month", strtotime($currentDate))
            ); // Add 1 month to current date
        } elseif ($plan == "y") {
            $text = "Yearly Plan Payment";
            $expiryDate = date(
                "Y-m-d",
                strtotime("+1 year", strtotime($currentDate))
            ); // Add 1 year to current date
        } else {
            $text = "Lifetime Plan Payment";
            // No need to modify the expiry date for lifetime plans
        }

        $email = $emailData["email"];
        $stripe_api_key = $emailData["stripe_key_id"];

        // check  plan already  subscribe
        $subcription_detail = new subscription_detail();

        $existing_plan = $subcription_detail
            ->where("subscription_end >", date("Y-m-d H:i:s"))
            ->where("status", "active")
            ->where("sd_palnid", $planid)
            ->where("sd_church_id", session()->user_church_id)
            ->where("sd_isdeleted", "Y")
            ->countAllResults();
			

        if ($existing_plan > 0) {
            $error = "You have already subscribed to this plan";
            return redirect()
                ->back()
                ->with("error", $error);
        }

        $uuid = Uuid::uuid4();

        // Convert UUID to string
        $userUniqueId = $uuid->toString();

        try {
            // Add customer to Stripe
            if ($stripe_api_key == "") {
                $customer = \Stripe\Customer::create([
                    "email" => $email,
                    "source" => $this->request->getVar("stripeToken"),
                ]);
            } else {
                $customer = \Stripe\Customer::retrieve($stripe_api_key);
            }

            // Convert price to cents
            $priceCents = round($planPrice * 100);

            // Create a plan
            $plan = \Stripe\Plan::create([
                "product" => [
                    "name" => $planName,
                ],
                "amount" => $priceCents,
                "currency" => "usd",
                "interval" => $interval,
                "interval_count" => 1,
                "trial_period_days" => 14, // Set the trial period to 14 days
            ]);

            // Creates a new subscription
            $subscription = \Stripe\Subscription::create([
                "customer" => $customer->id,
                "items" => [
                    [
                        "plan" => $plan->id,
                    ],
                ],
            ]);

            // Retrieve subscription data
            $subsData = $subscription->jsonSerialize();

            //subscription detail  insertion

            $data = [
                "sd_interval" => $subsData["plan"]["interval_count"],
                "sd_intervaltype" => $subsData["plan"]["interval"],

                "sd_amount" => $subsData["plan"]["amount"] / 100,
                "sd_subscriptionid" => $subsData["id"],

                "sd_palnid" => $planid,
                "trial_period" => $subsData["plan"]["trial_period_days"],
                "custmer_id" => $subsData["customer"],
                "sd_church_id" => session()->user_church_id,
                "sd_customerid" => $subsData["customer"],
                "status" => $subsData["status"],
                "sd_txrid" => "Txr_" . time(),
                "subscription_end" => date(
                    "Y-m-d H:i:s",
                    $subsData["current_period_end"]
                ),
                "created_at" => date(
                    "Y-m-d H:i:s",
                    $subsData["current_period_start"]
                ),
            ];

            $subcription_detail->insert($data);
            $new_insert_id = $subcription_detail->getInsertID();

            // Update user data after successful payment
            $userData = [
                "stripe_key_id" => $customer->id,
                "user_plan" => $planid,
            ];

            $UserModel->update($userid, $userData);

            $user = $UserModel->find($userid);

            $church_id = $user["church_id"];

            $data3 = [
                "plan_id" => $planid,
            ];

            $ChurchModel = new ChurchModel();

            // Perform the update
            $ChurchModel->update($church_id, $data3);

            $subscription = new subscription();

            $row = $subscription
                ->select("*")
                ->where("church_id", $church_id)
                ->findAll();

            if ($row) {
                $query =
                    "UPDATE Plan_Subscription  SET plan_status = 'N', plan_rstatus= 'N ' WHERE church_id =" .
                    $church_id; // Replace with your SQL update query
                $result = $db->query($query); // Execute the update query
            }

            // Set the values you want to insert
            $data = [
                "user_id" => session()->user_id,
                "church_id" => $church_id,
                "plan_id" => $planid,
                "plan_start" => $currentDate,
                "plan_end" => $expiryDateTime,
                "plan_type" => "trial",
                "plan_amount" => $subsData["plan"]["amount"] / 100,
                "plan_status" => "Y",
                "plan_rstatus" => "Y",
                // Add other columns and their values as needed
            ];

            // Insert data into the 'subscription' table
            $subscription->insert($data);
            //add billing data
            $billing = new Billing;
            foreach($mergedusers as $user){
                
                $parent = 0;
                if(session()->user_id !=  $user->id)
                {
                    $parent = session()->user_id;
                }
                $data =[
                   'bl_user' => $user->id,
                   'bl_parent' => $parent,
                   'bl_church'=> session()->user_church_id
                ];

                
                $billing->insert($data);
            }
            
            $subscriptiondetail = $subcription_detail->where("sd_id", $new_insert_id)->first();

            session()->set('Plan_title',$planName);
            session()->set('amount', $subsData["plan"]["amount"] / 100);
            session()->set('intervaltype', $subsData["plan"]["interval"]);
            session()->set('interval_count', $subsData["plan"]["interval_count"]);
            session()->set('txrid',  $subscriptiondetail["sd_txrid"]);
            session()->set('user', $emailData);

            return redirect('stripe/bill');

            // return redirect('/')->with("success", "Payment Successful!");
        } catch (\Stripe\Exception\CardException $e) {
            // Handle card errors and show appropriate error message
            $error = $e->getMessage();
            return redirect()
                ->back()
                ->with("error", $error);
        } catch (\Exception $e) {
            echo $error = $e->getMessage();
            // Handle other errors and show a generic error message
            $error = "An error occurred while processing your payment.";
            return redirect()
                ->back()
                ->with("error", $error);
        }
    }

}
