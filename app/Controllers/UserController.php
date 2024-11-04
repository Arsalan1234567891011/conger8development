<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\PlanModel;
use App\Models\Billing;
use App\Models\ContactModel;  
use App\Models\NotesModel;
use App\Models\AttendanceModel;
use App\Models\ChurchModel;
use App\Models\PlanOptionModel;
use App\Models\PlanDetailsModel;
use App\Models\subscription;
use App\Models\subscription_detail;
use Ramsey\Uuid\Uuid;
use Stripe;
use CodeIgniter\Encryption\Encryption;

class UserController extends BaseController



{

        function FormBuilder()



        {



            return view('dashboard/add-on-drag-drop');



        }



      ////////////////////////RecoverPassword//////
      
       public function buyplan($id, $plan)
    {
           $config         = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);
        $db = db_connect();
        // var_dump($plan);exit;
        $PlanModel = new PlanModel();

        if ($plan == "m") {
            $data2["price"] = $PlanModel
                ->select("pm_price, pm_currency")
                ->where("pm_id", $id)
                ->first();
            $data2["plan"] = 1;
        } elseif ($plan == "y") {
            $data2["price"] = $PlanModel
                ->select("pm_yearly as pm_price, pm_currency")
                ->where("pm_id", $id)
                ->first();
            $data2["plan"] = 2;
        } 

        $pm_price = $data2["price"]["pm_price"];

        if ($id == "1") {
            
            $userSessionId = session()->user_id;
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
        
        $userModel = new UserModel();
        $users = $userModel->where('parent',session()->user_id)->where('status','active')->countAllResults();
        if ($plan == "m") {
            
            $data2["plan_price"] = $pm_price*$users;
            
        }
        elseif ($plan == "y") {
             $data2["plan_price"] = ($pm_price*12)*$users;
            
        }
 

        $data2["userid"] = session()->user_id;

        $data["styles"] = [
            "/public/newassets/css/bootstrap.min.css",
            "public/newassets/css/payment.css",
        ];

        $data["script"] = [];

        echo view("/include/head", $data);

        echo view("/include/topheader", $data);

        echo view("/users/payment", $data2);

        echo view("/include/footer");
    }

        
      function signupsubscription()
      {
        
        $data['title']="Subscription "; 

        $data['page']="Admin/dashboard"; 

        $data['styles'] = ['/public/newassets/css/bootstrap.min.css','/public/newassets/css/choose-plan.css'];

        //echo view('/include/head1',$data);

        //echo view('/include/topheader',$data); 
       
        $PlanModel = new PlanModel();
        $PlanOptionModel = new PlanOptionModel();
        $data['PlanOptionresult'] = $PlanOptionModel->where('po_delete','Y')->findAll();

        $data['result'] = $PlanModel->where('pm_isdelete', 'Y')->where('pm_isactive','Y')->where('pm_visibility','1')->findAll();        
      
        
        
        echo view('users/plan',$data);
    
         
      }


      function RecoverPassword()

      {
        $data1['extra'] = "";
        return view('login/reset_password',$data1);


      }

      //////////////////////SendEmail//////////

      function forgot_pass_10jan2023()

        {

            $UserModel= new UserModel();

            $email=$this->request->getvar('email');

           $user = $UserModel->where('email =',$email)->first();



           $status='verify';

        $resetlink = md5(rand(111111,999999));

            if($user)

            {         

                $data=

                [

            

                    'email' =>$this->request->getvar('email'),

                    'role' => 'churchadmin',

                    'status'=>$status,

                    'verify_link'=> $resetlink,



                ];



                   $user= $UserModel->insert($data);

                    $to = $this->request->getvar('email');



                            $subject = 'Verify Email Address';

                            

                            $message = '

                                <html>

                                <head>

                                  <title>Verify Email Address</title>

                                </head>

                                <body>

                                  <p>Dear User</p>

                                  <table>

                                  <tr>

                                      <td><p>You have requested to register with My Tutor Pod. Please click on below link to verify your Email Address</p></td>

                                    </tr>

                                    <tr>

                                      <td><p>

                                      '.base_url().'/reset-password/'.$resetlink.'

                                      </p></td>

                                    </tr>

                                    <tr>

                                      <td><p><br>Thanks</p></td>

                                    </tr>

                                    <tr>

                                      <td><p>My Tutor Pod Team</p></td>

                                    </tr>

                                  </table>

                                </body>

                                </html>

                            ';



                            $email = \Config\Services::email();

                            $email->setTo($to);

                            $email->setFrom('noreply@congreg8.org', 'W$L$iQ4h?qbs');

                            $email->setSubject($subject);

                            $email->setMessage($message);



                                 

                            if ($email->send()) 

                            {

                                echo 'resetlink';

                            } 

                            else

                            {

                                $data = $email->printDebugger(['headers']);

                                print_r($data);

                            }

                session()->setFlashdata("success", "User created successfully. Please Login");                    

                return redirect()->to(base_url()."/login");



            

            }

            return view('dashboard/recover_password');	

        }
        
        
        
        
        function forgot_pass()
        {

            $UserModel= new UserModel();
           $email=$this->request->getvar('email');
           $user = $UserModel->where('email =',$email)->first();
           $status='verify';
            $resetlink = md5(rand(111111,999999));

            if($user)

            {         
                $id=$user['id'];
                $data=

                [
                    //'email' =>$this->request->getvar('email'),
                   // 'role' => 'churchadmin',
                    'status'=>$status,
                    'reset_link'=> $resetlink,

                ];
                 $UserModel->update($id,$data);
                 
                //  echo $UserModel->getLastQuery();
                //  exit();
                    
                    $r_link = base_url().'/reset-password/'.$resetlink;

                    $to = $this->request->getvar('email');



                            $subject = 'Password Reset';

                            

                            $message = '

                            <!DOCTYPE html>

                            <html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
                            <head>
                            <title></title>
                            <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
                            <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
                            <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
                            <style>
                                    * {
                                        box-sizing: border-box;
                                    }
                            
                                    body {
                                        margin: 0;
                                        padding: 0;
                                    }
                            
                                    a[x-apple-data-detectors] {
                                        color: inherit !important;
                                        text-decoration: inherit !important;
                                    }
                            
                                    #MessageViewBody a {
                                        color: inherit;
                                        text-decoration: none;
                                    }
                            
                                    p {
                                        line-height: inherit
                                    }
                            
                                    .desktop_hide,
                                    .desktop_hide table {
                                        mso-hide: all;
                                        display: none;
                                        max-height: 0px;
                                        overflow: hidden;
                                    }
                            
                                    .menu_block.desktop_hide .menu-links span {
                                        mso-hide: all;
                                    }
                            
                                    @media (max-width:700px) {
                            
                                        .desktop_hide table.icons-inner,
                                        .social_block.desktop_hide .social-table {
                                            display: inline-block !important;
                                        }
                            
                                        .icons-inner {
                                            text-align: center;
                                        }
                            
                                        .icons-inner td {
                                            margin: 0 auto;
                                        }
                            
                                        .fullMobileWidth,
                                        .image_block img.big,
                                        .row-content {
                                            width: 100% !important;
                                        }
                            
                                        .menu-checkbox[type=checkbox]~.menu-links {
                                            display: none !important;
                                            padding: 5px 0;
                                        }
                            
                                        .menu-checkbox[type=checkbox]:checked~.menu-trigger .menu-open {
                                            display: none !important;
                                        }
                            
                                        .menu-checkbox[type=checkbox]:checked~.menu-links,
                                        .menu-checkbox[type=checkbox]~.menu-trigger {
                                            display: block !important;
                                            max-width: none !important;
                                            max-height: none !important;
                                            font-size: inherit !important;
                                        }
                            
                                        .menu-checkbox[type=checkbox]~.menu-links>a,
                                        .menu-checkbox[type=checkbox]~.menu-links>span.label {
                                            display: block !important;
                                            text-align: center;
                                        }
                            
                                        .menu-checkbox[type=checkbox]:checked~.menu-trigger .menu-close {
                                            display: block !important;
                                        }
                            
                                        .mobile_hide {
                                            display: none;
                                        }
                            
                                        .stack .column {
                                            width: 100%;
                                            display: block;
                                        }
                            
                                        .mobile_hide {
                                            min-height: 0;
                                            max-height: 0;
                                            max-width: 0;
                                            overflow: hidden;
                                            font-size: 0px;
                                        }
                            
                                        .desktop_hide,
                                        .desktop_hide table {
                                            display: table !important;
                                            max-height: none !important;
                                        }
                                    }
                            
                                    #memu-r7c0m2:checked~.menu-links {
                                        background-color: #000000 !important;
                                    }
                            
                                    #memu-r7c0m2:checked~.menu-links a,
                                    #memu-r7c0m2:checked~.menu-links span {
                                        color: #ffffff !important;
                                    }
                                </style>
                            </head>
                            <body style="background-color: #fff0e3; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
                            <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff0e3;" width="100%">
                            <tbody>
                            <tr>
                            <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tbody>
                            <tr>
                            <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
                            <tbody>
                            <tr>
                            <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                            <div class="spacer_block" style="height:30px;line-height:30px;font-size:1px;"> </div>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tbody>
                            <tr>
                            <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
                            <tbody>
                            <tr>
                            <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
                            <div class="spacer_block" style="height:10px;line-height:5px;font-size:1px;"> </div>
                            </td>
                            <td class="column column-2" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
                            <table border="0" cellpadding="0" cellspacing="0" class="image_block block-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tr>
                            <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;padding-top:5px;padding-bottom:5px;">
                            <div align="center" class="alignment" style="line-height:10px"><img alt="Company Logo" src="https://congreg8.org/dev/app-assets/images/logo/Branding/Congre8_logos-05.png" style="display: block; height: auto; border: 0; width: 147px; max-width: 100%;" title="Company Logo" width="147"/></div>
                            </td>
                            </tr>
                            </table>
                            </td>
                            <td class="column column-3" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
                            <div class="spacer_block" style="height:10px;line-height:5px;font-size:1px;"> </div>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tbody>
                            <tr>
                            <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
                            <tbody>
                            <tr>
                            <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                            <div class="spacer_block" style="height:10px;line-height:10px;font-size:1px;"> </div>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tbody>
                            <tr>
                            <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
                            <tbody>
                            <tr>
                            <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                            <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tr>
                            <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                            <div align="center" class="alignment" style="line-height:10px"><img alt="Top round corners" class="big" src="'.base_url().'/null/images/round_corner_top.png" style="display: block; height: auto; border: 0; width: 680px; max-width: 100%;" title="Top round corners" width="680"/></div>
                            </td>
                            </tr>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tbody>
                            <tr>
                            <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;" width="680">
                            <tbody>
                            <tr>
                            <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                            <table border="0" cellpadding="15" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tr>
                            <td class="pad">
                            <div align="center" class="alignment" style="line-height:10px"><img alt="Resetting Password" class="fullMobileWidth" src="'.base_url().'/null/images/password_reset.png" style="display: block; height: auto; border: 0; width: 374px; max-width: 100%;" title="Resetting Password" width="374"/></div>
                            </td>
                            </tr>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" class="heading_block block-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tr>
                            <td class="pad" style="text-align:center;width:100%;padding-top:35px;">
                            <h1 style="margin: 0; color: #101010; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 27px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Forgot Your Password?</strong></h1>
                            </td>
                            </tr>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tbody>
                            <tr>
                            <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;" width="680">
                            <tbody>
                            <tr>
                            <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="16.666666666666668%">
                            <div class="spacer_block" style="height:10px;line-height:5px;font-size:1px;"> </div>
                            </td>
                            <td class="column column-2" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="66.66666666666667%">
                            <table border="0" cellpadding="0" cellspacing="0" class="text_block block-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                            <tr>
                            <td class="pad" style="padding-bottom:10px;padding-left:20px;padding-right:10px;padding-top:15px;">
                            <div style="font-family: sans-serif">
                            <div class="" style="font-size: 12px; mso-line-height-alt: 21.6px; color: #848484; line-height: 1.8; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
                            <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 25.2px;"><span style="font-size:14px;">


                            Use below  link to reset your password


                            </span></p>
                            </div>
                            </div>
                            </td>
                            </tr>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" class="button_block block-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tr>
                            <td class="pad" style="padding-bottom:35px;padding-left:10px;padding-right:10px;padding-top:20px;text-align:center;">
                            <div align="center" class="alignment">
                            <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="www.example.com" style="height:44px;width:160px;v-text-anchor:middle;" arcsize="10%" strokeweight="0.75pt" strokecolor="#101" fillcolor="#101"><w:anchorlock/><v:textbox inset="0px,0px,0px,0px"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->

                            <a href="'.$r_link.'" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#101;border-radius:4px;width:auto;border-top:1px solid #101;font-weight:undefined;border-right:1px solid #101;border-bottom:1px solid #101;border-left:1px solid #101;padding-top:5px;padding-bottom:5px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;" target="_blank"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;letter-spacing:normal;"><span style="word-break: break-word; line-height: 32px;">Reset Password</span></span></a>
                            <!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
                            </div>
                            </td>
                            </tr>
                            </table>
                            </td>
                            <td class="column column-3" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="16.666666666666668%">
                            <div class="spacer_block" style="height:10px;line-height:5px;font-size:1px;"> </div>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-7" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tbody>
                            <tr>
                            <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
                            <tbody>
                            <tr>
                            <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                            <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tr>
                            <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                            <div align="center" class="alignment" style="line-height:10px"><img alt="Bottom round corners" class="big" src="'.base_url().'/null/images/round_corner_bottom.png" style="display: block; height: auto; border: 0; width: 680px; max-width: 100%;" title="Bottom round corners" width="680"/></div>
                            </td>
                            </tr>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-8" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tbody>
                            <tr>
                            <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
                            <tbody>
                            <tr>
                            <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                            <table border="0" cellpadding="0" cellspacing="0" class="social_block block-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tr>
                            <td class="pad" style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:30px;text-align:center;">
                            <div align="center" class="alignment">
                            <table border="0" cellpadding="0" cellspacing="0" class="social-table" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block;" width="144px">
                            <tr>
                            <td style="padding:0 2px 0 2px;"><a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" height="32" src="'.base_url().'/null/images/facebook2x.png" style="display: block; height: auto; border: 0;" title="facebook" width="32"/></a></td>
                            <td style="padding:0 2px 0 2px;"><a href="https://www.twitter.com/" target="_blank"><img alt="Twitter" height="32" src="'.base_url().'/null/images/twitter2x.png" style="display: block; height: auto; border: 0;" title="twitter" width="32"/></a></td>
                            <td style="padding:0 2px 0 2px;"><a href="https://www.linkedin.com/" target="_blank"><img alt="Linkedin" height="32" src="'.base_url().'/null/images/linkedin2x.png" style="display: block; height: auto; border: 0;" title="linkedin" width="32"/></a></td>
                            <td style="padding:0 2px 0 2px;"><a href="https://www.instagram.com/" target="_blank"><img alt="Instagram" height="32" src="'.base_url().'/null/images/instagram2x.png" style="display: block; height: auto; border: 0;" title="instagram" width="32"/></a></td>
                            </tr>
                            </table>
                            </div>
                            </td>
                            </tr>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" class="menu_block block-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tr>
                            <td class="pad" style="color:#101010;font-family:inherit;font-size:14px;text-align:center;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tr>
                            <td class="alignment" style="text-align:center;font-size:0px;">
                            <!--[if !mso]><!--><input class="menu-checkbox" id="memu-r7c0m2" style="display:none !important;max-height:0;visibility:hidden;" type="checkbox"/>
                            <!--<![endif]-->
                            <div class="menu-trigger" style="display:none;max-height:0px;max-width:0px;font-size:0px;overflow:hidden;"><label class="menu-label" for="memu-r7c0m2" style="height: 36px; width: 36px; display: inline-block; cursor: pointer; mso-hide: all; user-select: none; align: center; text-align: center; color: #ffffff; text-decoration: none; background-color: #000000; border-radius: 0;"><span class="menu-open" style="mso-hide:all;font-size:26px;line-height:36px;">☰</span><span class="menu-close" style="display:none;mso-hide:all;font-size:26px;line-height:36px;">✕</span></label></div>
                            
                            </td>
                            </tr>
                            </table>
                            </td>
                            </tr>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-9" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tbody>
                            <tr>
                            <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
                            <tbody>
                            <tr>
                            <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="16.666666666666668%">
                            <div class="spacer_block" style="height:10px;line-height:5px;font-size:1px;"> </div>
                            </td>
                            <td class="column column-2" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="66.66666666666667%">
                            <div class="spacer_block" style="height:45px;line-height:5px;font-size:1px;"> </div>
                            </td>
                            <td class="column column-3" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="16.666666666666668%">
                            <div class="spacer_block" style="height:10px;line-height:5px;font-size:1px;"> </div>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-10" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tbody>
                            <tr>
                            <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
                            <tbody>
                            <tr>
                            <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                            <table border="0" cellpadding="0" cellspacing="0" class="icons_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tr>
                            <td class="pad" style="vertical-align: middle; color: #9d9d9d; font-family: inherit; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;">
                            <table cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tr>
                            <td class="alignment" style="vertical-align: middle; text-align: center;">
                            <!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
                            <!--[if !vml]><!-->
                            <table cellpadding="0" cellspacing="0" class="icons-inner" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; margin-right: -4px; padding-left: 0px; padding-right: 0px;">
                            <!--<![endif]-->
                            <tr>
                            <td style="vertical-align: middle; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 6px;"><a href="https://www.designedwithbee.com/" style="text-decoration: none;" target="_blank"><img align="center" alt="Designed with BEE" class="icon" height="32" src="'.base_url().'/null/images/bee.png" style="display: block; height: auto; margin: 0 auto; border: 0;" width="34"/></a></td>
                            <td style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 15px; color: #9d9d9d; vertical-align: middle; letter-spacing: undefined; text-align: center;"><a href="" style="color: #9d9d9d; text-decoration: none;" target="_blank">Congreg8</a></td>
                            </tr>
                            </table>
                            </td>
                            </tr>
                            </table>
                            </td>
                            </tr>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table><!-- End -->
                            </body>
                            </html>

                            ';



                            $email = \Config\Services::email();

                            $email->setTo($to);

                            $email->setFrom('noreply@congreg8.org', 'congreg8');

                            $email->setSubject($subject);

                            $email->setMessage($message);



                                 

                            if ($email->send()) 

                            {

                                //echo 'resetlink';

                            } 

                            else

                            {

                                $data = $email->printDebugger(['headers']);

                                //print_r($data);

                            }



                            $data1['extra'] = "Password reset link sent successfully";
                            return view('login/reset_password',$data1);
                           // return view('dashboard/recover_password',$data1);


                // session()->setFlashdata("success", "User created successfully. Please Login");                    

                // return redirect()->to(base_url()."/login");



            

            }else{

                $data1['extra'] = "User with email not found";

                return view('login/reset_password',$data1);

            }

            

        }

        /////////////////////////////////Reset Password//////////////////

    

        function ResetPassword_10jan2023($verify_link)

        {       

            $UserModel= new UserModel();

            $user = $UserModel->where('verify_link',$verify_link)->first();

            $data=[

                'user'=>$user,

            ];



            return view('dashboard/reset_password'.$data);



        }

        function  Reset_10jan2023()

        {       

        

                $UserModel= new UserModel();

                $data=[

                   

                    'password' =>$this->request->getvar('password'),

                    'verify_link'=>$verify_link,

                    'status'=>'active',

                ];

            

                $UserModel->update($verify_link,$data);           



            

            

        }
        
        
        function ResetPassword($resetlink)

        {       

            $UserModel= new UserModel();

            $user = $UserModel->where('reset_link = ',$resetlink)->first();
            if(!empty($user))
            {
                  
             $data=[

                'user'=>$user,

                ];



                return view('dashboard/reset_password',$data);
            }
        else{
           
           $data1['extra'] = 'Varification Link Expired or Invalid';

           return view('dashboard/recover_password',$data1);
        }


        }

        function  Reset()

        { 
        
                   $id= $this->request->getvar('user_id');

                   echo $id;

                   //exit();
                $UserModel= new UserModel();
                //  $user = $UserModel->where('reset_link = ',$resetlink)->first();
                   //$id=$user['id'];


                    $data=[

                    

                        'password' =>$this->request->getvar('password'),

                        'reset_link'=>'OK',

                        'status'=>'active',

                    ];

                

                    $UserModel->update($id,$data);   
                    
                    // echo $UserModel->getLastQuery();
                    // exit();

                    $data1['extra'] = "Password changed successfully";
                    
                    echo view('dashboard/login',$data1);  

                 
                     
        }





   //////////////////Chat/////////////////



    function Chat()

    {



        return view('dashboard/chat-application');



    }



    function SubModule()



    {



        return view('dashboard/page-pricing');



    }



    function InviceSum()



    {



        return view('dashboard/invoice-summary');



    }



    function InviceTemp()



    {



        return view('dashboard/invoice-template');



    }



    function InviceList()



    {



        return view('dashboard/invoice-list');



    }



    function Leads()



    {



        return view('dashboard/project-tasks');



    }

    /////////////////////////////////User/////////////////////////////



    function UserData()
    {
       $UserModel = new UserModel();

       $urole = get_user_role(session()->user_id);


        if($urole=='superadmin')

        {

            $user = $UserModel->where('rstatus','Y')->findAll();

            $data = [
                'users'=>$user,
                'title'=>"Dashboard||Admin panel" 
            ];  

        }

      else

        {

            $user = $UserModel->where('parent =',session()->user_id)->where('rstatus','Y')->findAll();

            $data = [
                'users'=>$user,
                'title'=>"Dashboard||Admin panel"
            ];        

        }


        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('dashboard/users');

        echo view('/include/footer');

		//return view('dashboard/users', $data);   



    }
 
     public function removeuser()
    {
       $userid = $this->request->getPost('id');
       
       $model = new UserModel();
       $plan=$model->where('id', session()->user_id)->first();
       
       if($plan['user_plan']==2)
       {
           //upgrade plan subscription 
           $church_id = session()->user_church_id;
           $subcription_detail = new subscription_detail();
           $sub_detail = $subcription_detail->where('status','active')->where('sd_isdeleted','Y')->where('sd_church_id',$church_id)->first();
           $PlanModel = new PlanModel();
           $plan = $PlanModel->where("pm_id", $sub_detail['sd_palnid'])->first();
    
           if($sub_detail['sd_intervaltype'] == 'year')
           {
               $amount=$sub_detail['sd_amount']-(12*$plan['pm_yearly']);
           }
           else
           {
                $amount = $sub_detail['sd_amount']-$plan['pm_price'];
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
        }
          
          //delete user 
          $model = new UserModel();
          $model->where('id', $userid)->delete();
        
          //delete billing 
          $billing = new Billing;
          $billing->where('bl_user', $userid)->delete();
          return json_encode("User remove Successfully");

    }
 
    public function getuserdata()
    {
        $config         = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);
        $db = db_connect();
    
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows displayed per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue = $_POST['search']['value']; // Search value
        $searchByChurch = $_POST['searchByChurch'];
        $searchByType = $_POST['searchByType'];
    
        $urole = get_user_role(session()->user_id);
    
        if ($urole == 'superadmin') {
            $sql = "SELECT * FROM users WHERE rstatus = 'Y'";
        } else {
            $sql = "SELECT * FROM users WHERE parent = " . session()->user_id . " AND rstatus = 'Y'";
        }

        $sql .=" AND church_id = ".session()->user_church_id." ";
    
        // Apply search filter
        if (!empty($searchValue)) {
            $sql .= " AND (name LIKE '%" . $searchValue . "%' OR email LIKE '%" . $searchValue . "%' OR phone LIKE '%" . $searchValue . "%' OR role LIKE '%" . $searchValue . "%')";
        }
    
        // Apply church and type filters if present
        if (!empty($searchByChurch)) {
            $sql .= " AND church = '" . $searchByChurch . "'";
        }
        if (!empty($searchByType)) {
            $sql .= " AND type = '" . $searchByType . "'";
        }
    
        $sql .= " ORDER BY `" . $columnName . "` " . $columnSortOrder . " LIMIT " . $row . "," . $rowperpage;
    
        $query = $db->query($sql);

        //var_dump($query);exit;
        $attendance = $query->getResultArray();
        $totalRecords = count($attendance);
    
        // Get total count with filter
        $query1 = $db->query($sql);
        $attendance1 = $query1->getResultArray();
        $totalRecordwithFilter = count($attendance1);
    
        $data = array();
    
        foreach ($attendance as $row) {
            $d_pwd1 = $encrypter->decrypt(base64_decode($row['phone']));

            $data[] = array(
                "Name" => $row['name'],
                "Email" => $row['email'],
                "Phone" => $d_pwd1,
                "Role" => $row['role'],
                "Actions" => '
                <div class="dropdown">
                    <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dropdown-toggle">
                        <i class="ft-settings"></i>
                    </button>
                    <div aria-labelledby="btnSearchDrop2" class="dropdown-menu dropdown-menu-right mt-1">
                        <a href="' . base_url('/adduser/' . $row['id']) . '" class="dropdown-item">
                            <i class="ft-edit-2"></i> Edit
                        </a>
                        <a style="display:none" href="#" class="dropdown-item " id="' . $row['id'] . '">
                            <i class="ft-trash-2"></i> Delete
                        </a>
                    </div>
                </div>
                <a  href="#"  class="btn btn-danger mt-1 user_remove" id="'. $row['id'] . '">
                           <i class="fas fa-user-minus"></i>
                        </a>
            ',
            

            );

        }
    
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );
    
        echo json_encode($response);
    }
    




     function Add_users($id = null)



    {



        $data = array();



        if($id != null){



            $UserModel= new UserModel();



            $user = $UserModel->where('id',$id)->first();

            $data = [       



                'user'=>$user,     



            ];  



        }

              



        echo view('dashboard/add-user',$data);        



    }



     function form_add_Data()



    {





        if (strtolower($this->request->getMethod()) !== 'post') 

        {

            return view('dashboard/add-user', [

                'validation' => Services::validation(),

            ]);

        }    



        

        $rules = [

            'name' => 'required',

            'email' => 'required|valid_email',

            'password' => 'required',

            // 'role' => 'required',



        ];





        if (! $this->validate($rules)) 

        {

            return view('dashboard/add-user', [

                'validation' => $this->validator,

            ]);

        }



        $session = session();  

        $UserModel= new UserModel();       

        $userData = $session->get(); 

        $userid= $userData['user_id'];   

        $user_data=$UserModel->where('id=', $userid)->first();

        $user_att=$user_data['att_link'];         

        $ChurchModel=new ChurchModel();

        $church=  $ChurchModel->where('parentid =',$userid)->first();

                



        if((empty($this->request->getvar('id'))))

        {



            $UserModel= new UserModel();

            $data = array(

                'phone'=>$this->request->getVar('phone'),

                'email'=>$this->request->getVar('email')

            );



            $user =  $UserModel->where($data)->first();



            if($user)

            {

                

                $data = [

                    'check'=>"yes",        

                ];

                session()->setFlashdata("success", "Record Already Exists");                    



                return view('dashboard/add-user',$data);



                //echo view('dashboard/signup',$data);          



            }



                     



             $data=

            [

                'name' =>$this->request->getvar('name'),

                'email' =>$this->request->getvar('email'),

                'password' =>$this->request->getvar('password'),

                'role' =>'user',

                'phone' =>$this->request->getvar('phone'),

                'parent'=>$userData['user_id'],

                'church_id'=>session()->user_church_id,

                'att_link'=>$user_att,

            ];      

            // var_dump($data);

            // exit;

            $id = $userData['user_id'];

            $UserModel->insert($data);

        }

        else

        {

           

            $id=$this->request->getPost('id');

            $data = [

                        'name' =>$this->request->getPost('name'),

                        'email' =>$this->request->getPost('email'),

                        'password' =>$this->request->getPost('password'),

                        'phone' =>$this->request->getPost('phone'),

                    ];



            $UserModel->update($id,$data);

        }





        return redirect()->to(base_url()."/users");



    }    



    // function updateData()



    // {

	// 	$UserModel= new UserModel();



    //     $data = array();



	// 	$id=$this->request->getPost('id');



    //     $data = [



	// 		'name' =>$this->request->getPost('name'),



    //         'email' =>$this->request->getPost('email'),



    //         'password' =>$this->request->getPost('password'),



    //     ];



    //     $UserModel->update($id,$data);



    //     return redirect()->to(base_url()."/users");



	// }	



    function UserConversation($id)

    {

        $UserModel= new UserModel();



        $user = $UserModel->where('id',$id)->first();



		$data = [       



			'user'=>$user,

            'id'=>$id,			



		];        



        echo view('dashboard/conversation',$data);



    }

 

  //  function UserEdit($id)

  //   {



        



  //       $UserModel= new UserModel();



  //       $user = $UserModel->where('id',$id)->first();



		// $data = [       



		// 	'user'=>$user,		



		// ];        



		// return view('dashboard/adduser', $data);      



  //   }



    function UserDelete($id)

    {       



        $UserModel= new UserModel();

        //$user = $UserModel->where('id',$id)->first();

        $data=[

            'rstatus'=> 'N'

        ];

        // // var_dump($user);

        // // exit;



		// $UserModel->Update($data);

        //$UserModel->delete($user);



        $UserModel->update($id,$data);



        return redirect()->to(base_url()."/users");

       



    }

    ////////////////////////////Contacts///////////////



    function Contacts()

    {       



        $ContactModel= new ContactModel();

        $userData = session()->get();       

        if($userData['user_role']=='superadmin')

        {

            $user = $ContactModel->where('r_status','Y')->findAll();  

            $data = [



                'users'=>$user

            ];     

        }

        else

        {

            $user = $ContactModel->where('parent =',$userData['user_id'])->where('r_status','Y')->findAll();

            $data = [

                'users'=>$user

            ];  

         }

		return view('dashboard/contacts', $data);

    }



     function Profile($id)

    {
        $config         = new \Config\Encryption();
		$encrypter = \Config\Services::encrypter($config);

        $ContactModel= new ContactModel();

        $user = $ContactModel->where('id',$id)->first();  
        $phone=$user['phone'];
        $email=$user['email'];
        $address=$user['address'];
        $d_phone = $encrypter->decrypt(base64_decode($phone));
        $d_email = $encrypter->decrypt(base64_decode($email));
        //$d_address = $encrypter->decrypt(base64_decode($address));


        // echo $ContactModel->getLastQuery();

        // $session = session();             

        // $session->set('contact_name', $user['name'] );

        // $session->set('contact_id',$user['id']);

        // $contactData = session()->get();

        $data = [  
			'user'=>$user,
            'id'=>$id,
            'phone'=>$d_phone,
            'email'=>$d_email,
            'address'=> $user['address'],//$encrypter->decrypt(base64_decode($user['address'])),
            'title'=>"Dashboard||Admin panel",
            'foractive' => 'contacts-profile'
		];  


        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('profile/users-profile');

        echo view('/include/footer');     


		//return view('dashboard/users-profile', $data);      

    } 



    function Add_Contacts()

    {

        

        echo view('dashboard/add-contacts');

    }  



    function form_add_Contacts()

    {

        $userData = session()->get();        

       $userid= $userData['user_id'];

       $user_church_id=$userData['user_church_id'];


       //echo $church_id;




       $UserModel=new UserModel();

        $data = array('id'=>$userid);  

        

        $user =  $UserModel->where($data)->first();       

      

        $ContactModel= new ContactModel();

        

        if (strtolower($this->request->getMethod()) !== 'post')

        {

            return view('dashboard/add-contacts', [

                'validation' => Services::validation(),

            ]);

        }



        

        $rules = [

            'name' => 'required',

            'phone' => 'required|numeric',

        ];





        if (! $this->validate($rules))

        {

            return view('dashboard/add-contacts', [

                'validation' => $this->validator,

            ]);

        }

        if((empty($this->request->getvar('id'))))

        {



                $data=[

                    'parent' =>$userid,

                    'name' =>$this->request->getvar('name'),

                    'email' =>$this->request->getvar('email'),

                    'phone' =>$this->request->getvar('phone'),

                    'address' =>$this->request->getvar('address'),

                    'gender' =>$this->request->getvar('gender'),

                    'address' =>$this->request->getvar('address'),                 

                    'birthday' =>$this->request->getvar('birthday'),

                    'created_by' =>$this->request->getvar('created_by'), 

                    'form_type' =>$this->request->getvar('membertype'), 

                    'picture' =>$this->request->getvar('picture'),

                    'church_id'=> $user_church_id,







                ];              

                // var_dump($data);

                // exit;

                $ContactModel->insert($data);



        

        } 

        else

        {            

            $data = array();

            $id=$this->request->getPost('id');

            $data = [

                    'name' =>$this->request->getPost('name'),                

                    'email' =>$this->request->getPost('email'),

                    'phone' =>$this->request->getPost('phone'),

                    'address' =>$this->request->getPost('address'),

                    'gender' =>$this->request->getPost('gender'),

                    'birthday' =>$this->request->getPost('birthday'),

                    'form_type' =>$this->request->getPost('membertype'),                    



            ];       

            $ContactModel->update($id,$data);



        }

            return redirect()->to(base_url()."/contacts");

             exit();

    }



    function UpdateContact()

    {
        $config         = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);
		$ContactModel= new ContactModel();

        $data = array();

		$id=$this->request->getPost('id');
        $phone = preg_replace('/[^0-9]/', '', $this->request->getPost('phone'));

        // Trim the leading '1' if it exists
        if (substr($phone, 0, 1) == '1') {
            $phone = substr($phone, 1);
        }
        
        $email=$this->request->getvar('email');
        $birthday=$this->request->getvar('birthday');
        $d_phone = base64_encode($encrypter->encrypt($phone));
        $d_email = base64_encode($encrypter->encrypt($email));
        $d_birthday = base64_encode($encrypter->encrypt($birthday));

          $data = [

                'name' =>$this->request->getPost('name'),                

                'email' => $d_email,

                'phone' =>$d_phone,

                'address' =>$this->request->getPost('address'),

                'gender' =>$this->request->getPost('gender'),

                'birthday' =>$d_birthday,

                'form_type' =>$this->request->getPost('membertype'),    
                
                



        ];       

        $ContactModel->update($id,$data);

        return redirect()->to(base_url()."/contacts-profile/".$id);



	}   

    ///////////////////

     function edit_contact($id)

    {

       



        $ContactModel= new ContactModel();

        $user = $ContactModel->where('id',$id)->first();





        $data = array();

		$id=$this->request->getPost('id');



          $data = [

            'user'=>$user,

              

        ];   

        



        echo view('dashboard/add-contacts',$data);



        // $ContactModel->update($id,$data);

        // return redirect()->to(base_url()."/contacts");

		// return view('dashboard/users-profile', $data);      



    }

    function contactDelete($id)

    {       



        $ContactModel= new ContactModel();

        $data=[

            'r_status'=> 'N'

        ];

        $ContactModel->update($id,$data);

        return redirect()->to(base_url()."/contacts");

       



    }



        ///////////////////////////Notes///////////////////////



    function UserNotes($id)

    {        

        $NotesModel= new NotesModel();

		$user = $NotesModel->where('type =','notes')->where('userid =',$id)->where('r_status =','y')->orderBy('id', 'DESC')->findAll();    



		$data = [



			'users'=>$user,

            'id'=>$id,

		];



        return view('dashboard/notes', $data);

    }



    function SaveNotes()

    {

        $NotesModel= new NotesModel();

        $notesid=$this->request->getPost('notes_id');

        $get_time_zone = get_time_zone($this->request->getvar('userid'));

        date_default_timezone_set($get_time_zone);

        $date = date('Y-m-d H:i:s');

        if($notesid==0)

        {

            $data=

            [



                'type' =>'Notes',

                'title' =>'A',

                'text' =>$this->request->getvar('text'),

                'userid' => $this->request->getvar('userid'),

                'created_at' => $date,

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

           

        return redirect()->to(base_url()."/notes/".$this->request->getvar('userid'));



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



                ////////////////////////////task/////////////////



    function Usertask($id)

    {

       

        $NotesModel= new NotesModel();

		$user = $NotesModel->where('type =','task')->where('userid =',$id)->where('r_status =','y')->orderBy('id', 'DESC')->findAll();   

         

		$data = [

			'users'=>$user,

            'id'=>$id,

		];



        return view('dashboard/task', $data);

    }



    function Savetask()



    {



        $NotesModel= new NotesModel();

        $taskid=$this->request->getPost('task_id');

       

      if($taskid == 0)

        {

                $data=

                [

                    'type' =>'Task',

                    'text' =>$this->request->getvar('text'),

                    'title' =>$this->request->getvar('title'),

                    'userid' => $this->request->getvar('userid'),

                    'assign_to' => $this->request->getvar('assign_to'),

                    'due_date' => $this->request->getvar('due_date')



                ];

                $NotesModel->insert($data); 

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



        return redirect()->to(base_url()."/task/".$this->request->getvar('userid'));

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

        $id=$this->request->getPost('delid');

		$task= $NotesModel->where('id =',$id)->first();  

        echo json_encode($task);     



    }



        ////////////////////////////////////login//////////////////////



    function login()

    {



        echo view('dashboard/login');  

       

    }





    function Userlogout()

    {



        session()->destroy();

        return redirect()->to(base_url());



    }

    



    function Userlogin()

    {



        $session = session();

        $UserModel=new UserModel();

        $data = array('email'=>$this->request->getVar('email'),'password'=>$this->request->getVar('password')); 

        // ,'status'=>'active'      

        

        // $inputs = $this->validate([

        //     'email' => 'required|valid_email',

        //     'password' => 'required|min_length[5]|alpha_numeric',

        // ]); 

        

        $user =  $UserModel->where($data)->first();



        //echo $UserModel->getLastQuery();





       

    

        // if($inputs)

        // {

            

         

            if($user)

            

            {

              

                $session->set('user_name', $user['name'] );

                $session->set('user_id',$user['id']);

                $session->set('user_role',$user['role']);

                $session->set('user_table',$user['user_table']);

                $session->set('user_church_id',$user['church_id']);



        

                $userData = $session->get(); 

                $uid=$userData['user_id'];   

                $utable=$userData['user_table'];

                $urole=$userData['user_role'];   



                

                // $session->remove('user_name');

                if($utable==1)

                {     

                    if($urole=='churchadmin')

                    {

                       

                        return redirect()->to(base_url()."/churchadmin");                

                    }  

                    if($urole=='user')

                    {

                       

                        return redirect()->to(base_url()."/churchadmin");                

                    }  

                    if($urole=='superadmin'){

                       

                        return redirect()->to(base_url()."/");                

                    }       

                }

                    

                else if($utable == 0 && ($urole=='churchadmin' || $urole=='superadmin'))

                {

                   

                    $data=

                    [

    

                        'user_table'=>'1',

    

                    ];

                    $UserModel->update($uid,$data);

    

                    return redirect()->to(base_url()."/add-church");

                }

                else if($utable == 0 && $urole=='user')

                {

                    $data=

                    [

    

                        'user_table'=>'1',

    

                    ];

                    $UserModel->update($uid,$data);

    

                    return redirect()->to(base_url()."/subusers");                



                }

            

                }



            else if(!$user)

                {

                    $data = [

                        'check'=>"yes",        

                    ];

                    

                    return view('dashboard/login', $data);



                }

          

            

        //}

   

        // $validation = ['validation' => $this->validator,];

        // if(!$inputs)

        // {

                          

        //     // return redirect()->to(base_url()."/login");

        //         return view('dashboard/login', $validation);



        // } 





    }



    ///////////////////////////Attendance////////////





    function Attendance($id)



    {

        $AttendanceModel=new AttendanceModel();

        $user = $AttendanceModel->where('contact_id =',$id)->findAll();

        $today = date('Y-m-d');



        $check_attendance = $AttendanceModel->where('contact_id =',$id)->where('DATE(check_in) =',$today)->find();



        if($check_attendance){

            $check = "yes";

        }else{

            $check = "no";

        }       



		$data = [



			'users'=>$user,

            'id'=>$id,

            'check'=>$check,



		];

        return view('dashboard/attendance', $data);

    }



    function SaveAttendance()

    {

        // $session = session();

        // $userData = session()->get();        

        // $userid= $userData['user_id'];

       

        // $ChurchModel= new ChurchModel();

        // $church=$ChurchModel->where('parentid =',$userid)->first();   

        // var_dump($church);

        // exit;   

        // $session->set('church_id', $church['id']);       

        // $churchData = session()->get();         

        // $cid=$churchData['church_id'];    



        $UserModel=new UserModel();

        $data = array('id'=>session()->user_id);  

        

        $user =  $UserModel->where($data)->first();    



        $get_time_zone = get_time_zone($this->request->getvar('userid'));



        date_default_timezone_set($get_time_zone);



        $AttendanceModel= new AttendanceModel();

        $date = date('Y-m-d H:i:s');

            $data=

            [

                'church_id' =>$user['church_id'],

                'contact_id' => $this->request->getvar('userid'),

                'check_in' => $date,

                'datetime' => $date,

            ];  

            // var_dump($data);

            // exit;         



            $AttendanceModel->insert($data);           



        return redirect()->to(base_url()."/attendance/".$this->request->getvar('userid'));



    }



    function Signup()

    {



        echo view('dashboard/signup');

    }



    // function Insert_Signup_OLD()

    // {

    //     $UserModel= new UserModel();

    //     // $phone=$this->request->getvar('phone');

    //     // $user = $UserModel->where('phone !=',$phone)->find();

    //     $data = array('phone'=>$this->request->getVar('phone'));

    //      $user =  $UserModel->where($data)->first();       

                 

    //     if($user)

    //     {

    //         echo view('dashboard/signup');          



    //     }

    //     else

    //     {           

    //         $data=

    //         [



    //             'name' =>$this->request->getvar('name'),

    //             'email' =>$this->request->getvar('email'),

    //             'password' =>$this->request->getvar('password'),

    //             'phone' =>$this->request->getvar('phone'), 

                        



    //         ];

            

    //         $UserModel->insert($data);

            

    //         return redirect()->to(base_url()."/login");



          

    //      }





    // }





    function Insert_Signup_10jan2023()

    {

        $UserModel= new UserModel();

       

        // $phone=$this->request->getvar('phone');

        // $user = $UserModel->where('phone !=',$phone)->find();

        $data = array(

            'phone'=>$this->request->getVar('phone'),

            'email'=>$this->request->getVar('email')

        );





        $inputs = $this->validate([

            'name' => 'required',

            'phone' => 'required',

            'email' => 'required|valid_email',

            'password' => 'required',

            'cpassword' => 'required|matches[password]', 

                     

        ]); 



        $status='verify';

        $date = date('Y-m-d H:i:s');



        $att_link = md5($date);

        $resetlink = md5(rand(111111,999999));





         $user =  $UserModel->where($data)->first();    

        if($inputs)

        {   

            

            $data = array('phone'=>$this->request->getVar('phone'));



            $user =  $UserModel->where($data)->first();

            if($user)

                {

                    $data = [

                        'check'=>"yes",        

                    ];                  



                    echo view('dashboard/signup',$data);          



                }

            else 

                {           

                    $data=

                    [

                        'name' =>$this->request->getvar('name'),

                        'phone' =>$this->request->getvar('phone'),              

                        'email' =>$this->request->getvar('email'),

                        'role' => 'churchadmin',

                        'status'=>$status,

                        'password' =>$this->request->getvar('password'),

                        'att_link' => $att_link,

                        'verify_link'=> $resetlink,

                        'user_table'=> 0,  



                    ];

                        $uid= $UserModel->insert($data);                        

                        $session = session();

                        $session->set('user_name', $this->request->getvar('name'));

                        $session->set('user_id',$uid);

                        $session->set('user_role',"churchadmin");

                        // $session->set('user_att',$att_link); 







                        $userData = session()->get();        

                        $userid= $userData['user_id'];

                 

                        $ChurchModel = new ChurchModel();                 

                                 $data=[

                                     'parentid' =>$userid,           

                                 ];              

                                //  var_dump($data);

                                //  exit;

                                 $ChurchModel->insert($data);



                        



                       

                        $to = $this->request->getvar('email');



                                $subject = 'Verify Email Address';

                                

                                $message = '

                                    <html>

                                    <head>

                                      <title>Verify Email Address</title>

                                    </head>

                                    <body>

                                      <p>Dear User</p>

                                      <table>

                                      <tr>

                                          <td><p>You have requested to register with My Tutor Pod. Please click on below link to verify your Email Address</p></td>

                                        </tr>

                                        <tr>

                                          <td><p>

                                          '.base_url().'/verify/'.$resetlink.'

                                          </p></td>

                                        </tr>

                                        <tr>

                                          <td><p><br>Thanks</p></td>

                                        </tr>

                                        <tr>

                                          <td><p>My Tutor Pod Team</p></td>

                                        </tr>

                                      </table>

                                    </body>

                                    </html>

                                ';



                                $email = \Config\Services::email();

                                $email->setTo($to);

                                $email->setFrom('noreply@congreg8.org', 'congreg8');

                                $email->setSubject($subject);

                                $email->setMessage($message);

                                if ($email->send()) 

                                {

                                    echo 'resetlink';

                                } 

                                else

                                {

                                    $data = $email->printDebugger(['headers']);

                                    print_r($data);

                                }



                                session()->setFlashdata("success", "User created successfully. Please Login");

                                    return redirect()->to(base_url()."/login");

                }  

        }

        

        $validation = ['validation' => $this->validator,];

        if(!$inputs)

        {

                          

            // return redirect()->to(base_url()."/login");

                return view('dashboard/signup', $validation);



        } 





    } 


    function Insert_Signup()

    {

        $UserModel= new UserModel();

       

        // $phone=$this->request->getvar('phone');

        // $user = $UserModel->where('phone !=',$phone)->find();

        $data = array(

            'phone'=>$this->request->getVar('phone'),

            'email'=>$this->request->getVar('email')

        );





        $inputs = $this->validate([

            'name' => 'required',

            'phone' => 'required',

            'email' => 'required|valid_email',

            'password' => 'required',

            'cpassword' => 'required|matches[password]', 

                     

        ]); 



        $status='verify';

        $date = date('Y-m-d H:i:s');



        $att_link = md5($date);

        $resetlink = md5(rand(111111,999999));





         $user =  $UserModel->where($data)->first();    

        if($inputs)

        {   

            

            $data = array('phone'=>$this->request->getVar('phone'));



            $user =  $UserModel->where($data)->first();

            if($user)

                {

                    $data = [

                        'check'=>"yes",        

                    ];                  



                    echo view('dashboard/signup',$data);          



                }

            else 

                {           

                    $data=

                    [

                        'name' =>$this->request->getvar('name'),

                        'phone' =>$this->request->getvar('phone'),              

                        'email' =>$this->request->getvar('email'),

                        'role' => 'churchadmin',

                        'status'=>$status,

                        'password' =>$this->request->getvar('password'),

                        'att_link' => $att_link,

                        'verify_link'=> $resetlink,

                        'user_table'=> 0,  



                    ];

                        $uid= $UserModel->insert($data);                        

                        $session = session();

                        $session->set('user_name', $this->request->getvar('name'));

                        $session->set('user_id',$uid);

                        $session->set('user_role',"churchadmin");

                        // $session->set('user_att',$att_link); 







                        $userData = session()->get();        

                        $userid= $userData['user_id'];

                 

                        $ChurchModel = new ChurchModel();                 

                                 $data=[

                                     'parentid' =>$userid,           

                                 ];              

                                //  var_dump($data);

                                //  exit;

                                 $ChurchModel->insert($data);



                        



                       

                        $to = $this->request->getvar('email');



                                $subject = 'Verify Email Address';
                                $re_link = base_url().'/verify/'.$resetlink;

                                

                                $message = '<!DOCTYPE html>

                                <html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
                                <head>
                                <title></title>
                                <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
                                <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
                                <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
                                <style>
                                        * {
                                            box-sizing: border-box;
                                        }
                                
                                        body {
                                            margin: 0;
                                            padding: 0;
                                        }
                                
                                        a[x-apple-data-detectors] {
                                            color: inherit !important;
                                            text-decoration: inherit !important;
                                        }
                                
                                        #MessageViewBody a {
                                            color: inherit;
                                            text-decoration: none;
                                        }
                                
                                        p {
                                            line-height: inherit
                                        }
                                
                                        .desktop_hide,
                                        .desktop_hide table {
                                            mso-hide: all;
                                            display: none;
                                            max-height: 0px;
                                            overflow: hidden;
                                        }
                                
                                        @media (max-width:660px) {
                                
                                            .desktop_hide table.icons-inner,
                                            .social_block.desktop_hide .social-table {
                                                display: inline-block !important;
                                            }
                                
                                            .icons-inner {
                                                text-align: center;
                                            }
                                
                                            .icons-inner td {
                                                margin: 0 auto;
                                            }
                                
                                            .image_block img.big,
                                            .row-content {
                                                width: 100% !important;
                                            }
                                
                                            .mobile_hide {
                                                display: none;
                                            }
                                
                                            .stack .column {
                                                width: 100%;
                                                display: block;
                                            }
                                
                                            .mobile_hide {
                                                min-height: 0;
                                                max-height: 0;
                                                max-width: 0;
                                                overflow: hidden;
                                                font-size: 0px;
                                            }
                                
                                            .desktop_hide,
                                            .desktop_hide table {
                                                display: table !important;
                                                max-height: none !important;
                                            }
                                        }
                                    </style>
                                </head>
                                <body style="background-color: #f8f8f9; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
                                <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f8f8f9;" width="100%">
                                <tbody>
                                <tr>
                                <td>
                                
                                
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tbody>
                                <tr>
                                <td>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f8f8f9; color: #000000; width: 640px;" width="640">
                                <tbody>
                                <tr>
                                <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                <table border="0" cellpadding="20" cellspacing="0" class="divider_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="pad">
                                <div align="center" class="alignment">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;"><span> </span></td>
                                </tr>
                                </table>
                                </div>
                                </td>
                                </tr>
                                </table>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tbody>
                                <tr>
                                <td>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; color: #000000; width: 640px;" width="640">
                                <tbody>
                                <tr>
                                <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                <table border="0" cellpadding="0" cellspacing="0" class="divider_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="pad" style="padding-bottom:12px;padding-top:60px;">
                                <div align="center" class="alignment">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;"><span> </span></td>
                                </tr>
                                </table>
                                </div>
                                </td>
                                </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" class="image_block block-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="pad" style="padding-left:40px;padding-right:40px;width:100%;">
                                <div align="center" class="alignment" style="line-height:10px"><img alt="Im an image" class="big"  src="https://congreg8.org/dev/app-assets/images/logo/Branding/Congre8_logos-05.png" style="display: block; height: auto; border: 0; width: 352px; max-width: 100%;" title="Im an image" width="352"/></div>
                                </td>
                                </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" class="divider_block block-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="pad" style="padding-top:50px;">
                                <div align="center" class="alignment">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;"><span> </span></td>
                                </tr>
                                </table>
                                </div>
                                </td>
                                </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" class="text_block block-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                <tr>
                                <td class="pad" style="padding-bottom:10px;padding-left:40px;padding-right:40px;padding-top:10px;">
                                <div style="font-family: sans-serif">
                                <div class="" style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
                                <p style="margin: 0; font-size: 16px; text-align: center; mso-line-height-alt: 19.2px;"><span style="font-size:30px;color:#2b303a;"><strong>Verify Your Email Address</strong></span></p>
                                </div>
                                </div>
                                </td>
                                </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" class="text_block block-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                <tr>
                                <td class="pad" style="padding-bottom:10px;padding-left:40px;padding-right:40px;padding-top:10px;">
                                <div style="font-family: sans-serif">
                                <div class="" style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px; color: #555555; line-height: 1.5;">
                                <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 22.5px;"><span style="color:#808389;font-size:15px;"></span></p>
                                </div>
                                </div>
                                </td>
                                </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" class="button_block block-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="pad" style="padding-left:10px;padding-right:10px;padding-top:15px;text-align:center;">
                                <div align="center" class="alignment">
                                <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" style="height:62px;width:203px;v-text-anchor:middle;" arcsize="97%" stroke="false" fillcolor="#1aa19c"><w:anchorlock/><v:textbox inset="0px,0px,0px,0px"><center style="color:#ffffff; font-family:Tahoma, sans-serif; font-size:16px"><![endif]-->
                                <div style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#1aa19c;border-radius:60px;width:auto;border-top:0px solid transparent;font-weight:undefined;border-right:0px solid transparent;border-bottom:0px solid transparent;border-left:0px solid transparent;padding-top:15px;padding-bottom:15px;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:30px;padding-right:30px;font-size:16px;display:inline-block;letter-spacing:normal;"><span style="margin: 0; word-break: break-word; line-height: 32px;"><strong><a style="text-decoration: none;color: white;" href="'.$re_link.'">Confirm Your Email</a></strong></span></span></div>
                                <!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
                                </div>
                                </td>
                                </tr>
                                </table>
                                
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tbody>
                                <tr>
                                <td>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f8f8f9; color: #000000; width: 640px;" width="640">
                                <tbody>
                                <tr>
                                <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                <table border="0" cellpadding="20" cellspacing="0" class="divider_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="pad">
                                <div align="center" class="alignment">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;"><span> </span></td>
                                </tr>
                                </table>
                                </div>
                                </td>
                                </tr>
                                </table>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tbody>
                                <tr>
                                <td>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #2b303a; color: #000000; width: 640px;" width="640">
                                <tbody>
                                <tr>
                                <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                <table border="0" cellpadding="0" cellspacing="0" class="divider_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="pad">
                                <div align="center" class="alignment">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 4px solid #1AA19C;"><span> </span></td>
                                </tr>
                                </table>
                                </div>
                                </td>
                                </tr>
                                </table>
                                
                                
                                <table border="0" cellpadding="0" cellspacing="0" class="social_block block-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="pad" style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:28px;text-align:center;">
                                <div align="center" class="alignment">
                                <table border="0" cellpadding="0" cellspacing="0" class="social-table" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block;" width="208px">
                                <tr>
                                <td style="padding:0 10px 0 10px;"><a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" height="32" src="'.base_url().'/beefree/images/facebook2x.png" style="display: block; height: auto; border: 0;" title="Facebook" width="32"/></a></td>
                                <td style="padding:0 10px 0 10px;"><a href="https://twitter.com/" target="_blank"><img alt="Twitter" height="32" src="'.base_url().'/beefree/images/twitter2x.png" style="display: block; height: auto; border: 0;" title="Twitter" width="32"/></a></td>
                                <td style="padding:0 10px 0 10px;"><a href="https://instagram.com/" target="_blank"><img alt="Instagram" height="32" src="'.base_url().'/beefree/images/instagram2x.png" style="display: block; height: auto; border: 0;" title="Instagram" width="32"/></a></td>
                                <td style="padding:0 10px 0 10px;"><a href="https://www.linkedin.com/" target="_blank"><img alt="LinkedIn" height="32" src="'.base_url().'/beefree/images/linkedin2x.png" style="display: block; height: auto; border: 0;" title="LinkedIn" width="32"/></a></td>
                                </tr>
                                </table>
                                </div>
                                </td>
                                </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" class="text_block block-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                <tr>
                                <td class="pad" style="padding-bottom:10px;padding-left:40px;padding-right:40px;padding-top:15px;">
                                <div style="font-family: sans-serif">
                                <div class="" style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px; color: #555555; line-height: 1.5;">
                                <p style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 18px;"><span style="color:#95979c;font-size:12px;"></span></p>
                                </div>
                                </div>
                                </td>
                                </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" class="divider_block block-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="pad" style="padding-bottom:10px;padding-left:40px;padding-right:40px;padding-top:25px;">
                                <div align="center" class="alignment">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #555961;"><span> </span></td>
                                </tr>
                                </table>
                                </div>
                                </td>
                                </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" class="text_block block-7" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                <tr>
                                <td class="pad" style="padding-bottom:30px;padding-left:40px;padding-right:40px;padding-top:20px;">
                                <div style="font-family: sans-serif">
                                <div class="" style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2;">
                                <p style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 16.8px;"><span style="color:#95979c;font-size:12px;">Companify Copyright © 2020</span></p>
                                </div>
                                </div>
                                </td>
                                </tr>
                                </table>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-7" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tbody>
                                <tr>
                                <td>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;" width="640">
                                <tbody>
                                <tr>
                                <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                <table border="0" cellpadding="0" cellspacing="0" class="icons_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="pad" style="vertical-align: middle; color: #9d9d9d; font-family: inherit; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;">
                                <table cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                <tr>
                                <td class="alignment" style="vertical-align: middle; text-align: center;">
                                <!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
                                <!--[if !vml]><!-->
                                
                                </td>
                                </tr>
                                </table>
                                </td>
                                </tr>
                                </table>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                </td>
                                </tr>
                                </tbody>
                                </table><!-- End -->
                                </body>
                                </html>';



                                $email = \Config\Services::email();

                                $email->setTo($to);

                                $email->setFrom('noreply@congreg8.org', 'congreg8');

                                $email->setSubject($subject);

                                $email->setMessage($message);

                                if ($email->send()) 

                                {

                                    echo 'resetlink';

                                } 

                                else

                                {

                                    $data = $email->printDebugger(['headers']);

                                    print_r($data);

                                }



                                session()->setFlashdata("success", "Verificaiton link sent successfully. Please verify your email to continue.");

                                    return redirect()->to(base_url()."/login");

                }  

        }

        

        $validation = ['validation' => $this->validator,];

        if(!$inputs)

        {

                          

            // return redirect()->to(base_url()."/login");

                return view('dashboard/signup', $validation);



        } 





    }
    

    ////////////////////////////////Church//////////////////

    

    function Add_Church()

    {

       $ChurchModel = new ChurchModel();

       $userData = session()->get();        

       $userid= $userData['user_id'];

       //$user = $ChurchModel->where('parentid =',$userData['user_id'])->first();        

       $user = $ChurchModel->find($userData['user_church_id']); 

		$data = [

			'user'=>$user

		];  

       

       

        echo view('dashboard/add-church', $data);  

       

    }

    function Form_Add_Church()

    {



       $userData = session()->get();        

       $userid= $userData['user_id'];

        $verifylink = md5(rand(111111,999999));



       $ChurchModel = new ChurchModel();



        if((empty($this->request->getvar('id'))))

        {



                $data=[

                    'parentid' =>$userid,

                    // 'id', 'parentid', 'church_name', 'church_email', 'website', 'address', 'pastor_name'

                    'church_name' =>$this->request->getvar('church_name'),

                    'church_email' =>$this->request->getvar('church_email'),

                    'phone' =>$this->request->getvar('phone'), 

                    'website' =>$this->request->getvar('website'),

                    'address' =>$this->request->getvar('address'),

                    'pastor_name' =>$this->request->getvar('pastor_name'),

                    'time_zone' =>$this->request->getvar('time_zone'),                 



                ];              

               

               $ChurchModel->insert($data);







               $cher = $ChurchModel->insertID();

                // var_dump($cher);

                // exit;

                $UserModel= new UserModel();

                $data=[

                'church_id'=>$cher,                    

                ];

                $UserModel->update($userid,$data);



        

        } 

        else

        {

            

            $data = array();

            $id=$this->request->getPost('id');



            $data = [

                    'church_name' =>$this->request->getPost('church_name'),                

                    'church_email' =>$this->request->getPost('church_email'),

                    'website' =>$this->request->getPost('website'),

                    'phone' =>$this->request->getPost('phone'),

                    'address' =>$this->request->getPost('address'),

                    'pastor_name' =>$this->request->getPost('pastor_name'),

                    'time_zone' =>$this->request->getPost('time_zone'),  

                    'verify_link'=>$verifylink,

                                   

                ];   

                // var_dump($this->request->getPost('phone'));

                // exit;    

            $ChurchModel->update($id,$data);

            



            

             $UserModel= new UserModel();

             

                $data=[

                'church_id'=>$id,                    

                ];

                $UserModel->update($userid,$data);





        }

        return redirect()->to(base_url()."/add-church");

        

             exit();



    }

    function   Verify_signup_10jan2023($verify_link)

    {



        $UserModel= new UserModel();

        $user = $UserModel->where('verify_link',$verify_link)->first();

        $data=[

            'verify_link'=>$verify_link,

            'status'=>'active',

        ];

        $UserModel->update($verify_link,$data);



    }
    
    function   Verify_signup($verify_link)

    {

        $UserModel= new UserModel();
        $user = $UserModel->where('verify_link',$verify_link)->first();
        if(!empty($user))
        {
            $id=$user['id'];
            $data=[
                'verify_link'=>'OK',
                // 'status'=>'active',

            ];
        
            $data1['extra'] = "Email verified successfully. Please Login";

            $UserModel->update($id,$data);

        }
        else
        {
            $data1['extra'] = 'Varification Code Expired or Invalid';
        }
                

        return view('dashboard/login',$data1);


    }

     function  Attendance_Table()

   

    {

        $session = session();

        $db = db_connect();

        $AttendanceModel = new AttendanceModel();

        $UserModel= new UserModel();

        $userData = $session->get(); 

        $uid=$userData['user_id'];    

     



       $sql = "SELECT c.name,ta.check_in,mc.church_name

       FROM tab_attandance ta

       LEFT JOIN users u on u.id = ta.church_id

       LEFT JOIN contacts c on c.parent = ta.church_id

       LEFT JOIN manage_church mc on mc.parentid = u.id

       where u.name IS NOT NULL

       ";



       

       $urole = get_user_role(session()->user_id);

        if($urole !='superadmin')

        {

           

            $sql .= " and u.id = ".$uid." ";

          

        }

        

    //   else

    //     {

           

    //     $query =$db->query( "SELECT users.id,users.name,users.parent ,tab_attandance.church_id,tab_attandance.check_in,tab_attandance.datetime, tab_attandance.id,manage_church.parentid,manage_church.church_name FROM tab_attandance LEFT JOIN users ON tab_attandance.church_id = users.parent LEFT JOIN manage_church ON manage_church.parentid = users.id where tab_attandance.church_id = ".$uid);  

    //     //  var_dump($query);

    //     // exit;  

    //     $user =$query->getResult();

       

    //    $data = [

    //        'users'=>$user,

    //      ];      

    //     }




        //echo $sql;


        $query =$db->query($sql);    

        $user =$query->getResult();    

      

        $c_sql = "SELECT * from manage_church where rstatus = 'Y'";

        $c_query =$db->query($c_sql);    

        $church_data =$c_query->getResultArray();  



        $data = [

            'users'=>$user,

            'churches'=>$church_data,

            ]; 

        $data['title']="Dashboard||Admin panel "; 

        $data['page']="Admin/dashboard"; 

        echo view('/include/head',$data);

        echo view('/include/topheader',$data); 

        echo view('/include/sidenavbar',$data); 

        echo view('attendance/index',$data);

        echo view('/include/footer');             


    }



    function New_Attandance()

    {

        return view('dashboard/new_attendence_table');



    }

    function Fatch()

    {

       $UserModel=new UserModel();

       $request=$this->request->getvar('request');



            $user = $UserModel->where('role =', $request)->findAll();

            



       

    }

    /////////////////////////church Dashboard///////////////////

    function Churchdashboard()

      {

      



          return view('dashboard/church-dashboard');



      }

      function SubUsersdashboard()

      {



          return view('dashboard/subuser-dashboard');



      }

      //////////////////////////////Church Managment table/////////////////////////



    function Churchmanagment()

    {

        $ChurchModel=new ChurchModel(); 

        $user = $ChurchModel->findAll();

         

		$data = [

			'users'=>$user,

		];

        // var_dump($data);

        // exit;

        return view('dashboard/tbl_churchmanagment', $data);        

    }

    function edit_Church($id)

    {

       $ChurchModel = new ChurchModel();

       $userData = session()->get();        

       $userid= $userData['user_id'];

       $user = $ChurchModel->where('id =',$id)->first();        

      

		$data = [

			'user'=>$user

		];

        echo view('dashboard/edit-church', $data);         

    }

    function Form_edit_Church()

    {



       $userData = session()->get();        

       $userid= $userData['user_id'];

        $verifylink = md5(rand(111111,999999));



       $ChurchModel = new ChurchModel();



       

            

            $data = array();

            $id=$this->request->getPost('id');



            $data = [

                    'church_name' =>$this->request->getPost('church_name'),                

                    'church_email' =>$this->request->getPost('church_email'),

                    'website' =>$this->request->getPost('website'),

                    'phone' =>$this->request->getPost('phone'), 

                    'address' =>$this->request->getPost('address'),

                    'pastor_name' =>$this->request->getPost('pastor_name'),

                    'time_zone' =>$this->request->getPost('time_zone'),  

                    'verify_link'=>$verifylink,

                                   

                ];   

                // var_dump($data);

                // exit;    

            $ChurchModel->update($id,$data);

        return redirect()->to(base_url()."/churches");

        

             exit();



    }
    
    
    
    

   

   

}

       



      

       





    







    







