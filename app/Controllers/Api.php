<?php
   namespace App\Controllers;
   
   
   
   use App\Models\ContactModel;
   
   use App\Models\UserModel;
   
   use App\Models\IntegrationModel;
   
   use App\Models\SurveyModel;
   
   use App\Models\SurveySubmissionModel;
   use CodeIgniter\Encryption\Encryption;

   
   
   
   
   
   
   
   
   
   class Api extends BaseController
   {


    public function phone_d(){

        $db = db_connect(); 

        $config         = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);

        $ContactModel= new ContactModel();

        $result = $ContactModel->findAll();

        foreach ($result as $r) {

            $phone_old = $r['phone_old'];

            $phone_d = base64_encode($encrypter->encrypt($phone_old));
            
            $sql="UPDATE `contacts` SET `phone_d` = '".$phone_d."' where id = ".$r['id']." ";
            echo $sql;
            $query =$db->query($sql); 
            //exit();
        }

    }

    public function contactcurlapi()
    {
        
        $config         = new \Config\Encryption();
		$encrypter = \Config\Services::encrypter($config);

        $ContactModel= new ContactModel();
        
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];
        $address = $_REQUEST['address'];
        $gender = $_REQUEST['gender'];
        $type = $_REQUEST['type'];
        $parent = 0;
        $birthday = null;
        $status = 'active';
        $source = 1;
        $created_by = null;
        $created_at = $_REQUEST['created_at'];
        $update_at = null;
        $r_status = 'Y';
        $formType = $_REQUEST['form_type'];
        $church_id = $_REQUEST['church_id'];

        if(isset($_REQUEST['mc_id'])){

            $mc_id = $_REQUEST['mc_id'];

        }else{

            $mc_id = 0;
        }
        
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Trim the leading '1' if it exists
        if (substr($phone, 0, 1) == '1') {
            $phone = substr($phone, 1);
        }
            
          $d_phone = base64_encode($encrypter->encrypt($phone));
          $d_email = base64_encode($encrypter->encrypt($email));
          
         $data = [
            'parent' => $parent,
            'name' => $name,
            'email' => $d_email,
            'phone' => $d_phone,
            'phone_old' => $phone,
            'address' => $address,
            'gender' => $gender,
            'birthday' => $birthday,
            'status' => $status,
            'source' => $source,
            'created_by' => $created_by,
            'created_at' => $created_at,
            'update_at' => $update_at,
            'r_status' => $r_status,
            'form_type' => $formType,
            'church_id' => $church_id
        ];
        $ContactModel->insert($data);
        $insertedId = $ContactModel->insertID();
        //echo $insertedId;
        $db = db_connect();

        $insert_att = "INSERT INTO tab_attandance(att_type,church_id,contact_id, check_in, entered_by, rstatus) 
                VALUES('".$mc_id."',$church_id,'$insertedId','$created_at',0,'Y')";

        $db->query($insert_att);

        echo $insertedId;
    }
   
   public function manychat(){

//     $request = '{
//     "id": "5542384912523854",
//     "page_id": "108194845474271",
//     "first_name": "Imran",
//     "last_name": "Qurban",
//     "name": "Imran Qurban",
//     "gender": "male",
//     "locale": "en_US",
//     "language": "English",
//     "timezone": "UTC+05",
//     "phone": "",
//     "email": "",
//     "custom_fields": {
//         "BOT: Bot Budget": null,
//         "BOT: Bot Knowledge": null,
//         "BOT: Email List Size": null,
//         "BOT: Number of Employees": null,
//         "BOT: Requested Meeting Date and Time ": null,
//         "BOT:  Thoughts about bots": null,
//         "BOT: Website URL": null,
//         "BOT: Why want bot": null,
//         "Email": null,
//         "Email Address": null,
//         "English": null,
//         "Espanol": null,
//         "French": null,
//         "In-Person": null,
//         "Multifield": null,
//         "Phone Number": null,
//         "Phone Number as Text": null,
//         "Response": null,
//         "Status": null,
//         "Virtual": null,
//         "Type": null,
//         "How Did You Hear About Us?": null,
//         "BOT: Prayer Request": null,
//         "BOT: Baptism Request": null,
//         "BOT: ACS1": null,
//         "BOT: ACS2": null,
//         "BOT: ACS3": null,
//         "BOT: Bible Study": null,
//         "BOT: ACS4": null,
//         "BOT: ACS5": null,
//         "BOT:ACS6": null,
//         "BOT: ACS7": null,
//         "BOT: ACS8": null,
//         "BOT: ACS9": null,
//         "BOT: ACS10": null,
//         "ACSQ1":"What did you like most about our church service?  A. The message B. The music C. If Other, please type it in one sentence",
//         "ACSQ2":"How would you rate your church experience today?  1. Poor 2. Fair 3. Good 4. Very Good 5. Excellent",
//         "ACSQ3":"Would you join us again another time? Click on the best response.  If the answer is C (oh no!) please let us know by typing in one message below 👇 if there is a specific reason. (This will help us improve. We appreciate all constructive criticism.)   A. Definitely B. Ill think about it C. I dont think so...",
//         "ACSQ4":"Would you be interested in Bible Studies? 📖 A. Yes, but only correspondence (dropped off or mailed studies)  B. I would like in-person studies at home C. I would like online Bible studies. D. No, I do not need Bible studies.",
//         "ACSQ5":"Do you have any prayer requests? Type them in below👇 in one message",
//         "ACSQ6":"Have you accepted Christ fully, as your personal Savior? If not, would you like to do so?  A. Yes, I have, but I want to recommit my life to Him B. No, however, I want to accept Christ fully by being baptized C. Skip",
//         "ACSQ7":"Do you need help with health concerns?",
//         "ACSQ8":"Do you need help with food, clothing, etc?",
//         "ACSQ9":"Do you need assistance with addiction aid?",
//         "ACSQ10":"Are you interested in vegetarian cooking classes?"
//     }
// }';
        $headers = apache_request_headers();

        //echo $headers['Authorization'];



        //exit();



        $token = explode(" ",$headers['Authorization']);

        

        $manychat_api_key = $token[1];


        $db = db_connect(); 
        
        $sqli="select * from integration WHERE key_value ='".$manychat_api_key."'";

        $query =$db->query( $sqli);  

        $sql_integration =$query->getRow();



        if(!isset($sql_integration)){

            echo "api key not matched";

            exit();

        }

        $church_int_id=$sql_integration->church_id;


        $request = file_get_contents("php://input");

        $input = (Array)json_decode($request);


        //echo $input['custom_fields']->ACSQ1;


        $chat_id=$input['id'];

        $name=$input['name'];

        $gender=$input['gender'];

        $language=$input['language'];

        $timezone=$input['timezone'];

        $live_chat_url=$input['live_chat_url'];

        $subscribed=$input['subscribed'];

        $email=$input['email'];

        $phone=$input['phone'];

        $Type=$input['custom_fields']->Type;



        // $sqlc="SELECT manychat_id FROM `contacts` where manychat_id=".$chat_id;

        // $db = db_connect();  

        // $query_chat =$db->query($sqlc);   

        $db = db_connect(); 



        $ContactModel= new ContactModel();

        $user = $ContactModel->where('r_status','Y')->where('manychat_id=',$chat_id)->first();

        if(isset($user["manychat_id"]))

        {

            if($user["manychat_id"]==$chat_id)

            {

                $update_at =  date('Y-m-d H:i:s');



                $sql="UPDATE `contacts`

                        SET `name` = '".$name."', 

                            `email` = '".$email."',

                            `phone` = '".$phone."',

                            `gender` = '".$gender."', 

                            `update_at` = '".$update_at."',

                            `form_type` = '".$Type."'

                            where manychat_id = $chat_id

                            ";



                            //echo $sql;



                $query =$db->query($sql); 

                // start att

                
                $contact_id="select id from contacts where r_status = 'Y' and manychat_id =".$chat_id;
                   $query =$db->query($contact_id);  
                   $row =$query->getRow();
   

                $church_sql = "SELECT * from manage_church where id = '".$church_int_id."' ";
                $church_query = $db->query($church_sql);
                $church_row = $church_query->getRow();  


                // echo $church_row['time_zone'];

                // exit();
                date_default_timezone_set($church_row->time_zone);
                $currDate = date("Y-m-d H:i:s");
                   

   
                   $sql_at="INSERT INTO `tab_attandance`(`church_id`, `contact_id`,check_in,`rstatus`) VALUES ('$church_int_id',$row->id,'".$currDate."','Y')";

                   //echo $sql_at;
                   $query =$db->query($sql_at);

                // end att




                // $s = "INSERT INTO qry SET val = '".$sql."' ";

                // $db->query($s);

            }

            

        }

        else

            {

                $sql="INSERT INTO `contacts`( `manychat_id`, `parent`, `name`, `email`, `phone`, `address`, `gender`, `birthday`, `status`, `language`, `timezone`, `live_chat_url`, `subscribed`, `source`, `created_by`, `created_at`, `update_at`, `r_status`, `form_type`, `picture`, `church_id`) VALUES ('$chat_id',null,'$name','".$email."','".$phone."','','$gender',null,'active','$language','$timezone','$live_chat_url','$subscribed','manychat',null,null,null,'Y','".$Type."','','".$church_int_id."')";

                //echo $sql;                 

                $query =$db->query($sql);     


                $contact_id="select id from contacts where r_status = 'Y' and manychat_id =".$chat_id;
                   $query =$db->query($contact_id);  
                   $row =$query->getRow();
   

                $church_sql = "SELECT * from manage_church where id = '".$church_int_id."' ";
                $church_query = $db->query($church_sql);
                $church_row = $church_query->getRow();  


                // echo $church_row['time_zone'];

                // exit();
                date_default_timezone_set($church_row->time_zone);
                $currDate = date("Y-m-d H:i:s");
                   

   
                   $sql_at="INSERT INTO `tab_attandance`(`church_id`, `contact_id`,check_in,`rstatus`) VALUES ('$church_int_id',$row->id,'".$currDate."','Y')";

                   //echo $sql_at;
                   $query =$db->query($sql_at);                               

            }





        

        

        // insert id,name,gender,language,timezone,live_chat_url,subscribed into contacts.

        

        

        // I had created on column in contats manychat_id = id

        

        // if this manychat id exists, update the date, else insert the new row



        

        

    }


    public function request_api(){


        $headers = apache_request_headers();

        $token = explode(" ",$headers['Authorization']);
        
        $manychat_api_key = $token[1];

        $db = db_connect(); 

        $sqli="select * from integration WHERE key_value ='".$manychat_api_key."'";

        $query =$db->query( $sqli);  

        $sql_integration =$query->getRow();

        if(!isset($sql_integration)){

            echo "api key not matched";

            exit();

        }

        $church_id=$sql_integration->church_id;

        //echo $church_id;

        $request = file_get_contents("php://input");

        $input = (Array)json_decode($request);


        $PrayerRequest = $input['custom_fields']->PrayerRequest;
        $BaptismRequest = $input['custom_fields']->BaptismRequest;
        $BibleStudy = $input['custom_fields']->BibleStudy;


        $manychat_id = $input['id'];

        $sql = "SELECT * FROM contacts where manychat_id  = '".$manychat_id."' and r_status = 'Y' ";
                $query =$db->query($sql);
                $row =$query->getRowArray();


        if(isset($row)){
            //echo "found";
        }else{
            
            // start inserting
            $sql="INSERT INTO `contacts`( `manychat_id`, `parent`, `name`, `email`, `phone`, `address`, `gender`, `birthday`, `status`, `language`, `timezone`, `live_chat_url`, `subscribed`, `source`, `created_by`, `created_at`, `update_at`, `r_status`, `form_type`, `picture`, `church_id`) VALUES ('".$manychat_id."',null,'".$input['name']."','".$input['email']."','".$input['phone']."','','".$input['gender']."',null,'','".$input['language']."','','','','manychat',null,null,null,'Y','Member','', $church_id)";

                    //echo $sql;
         
                     $query =$db->query($sql);    

            // end inserting
        }

        
        
        $match = "cuf_";

        if(!strpos($PrayerRequest, $match)){
            $this->request_master($manychat_id,$PrayerRequest,"prayer_request",$church_id);
        }


        if(!strpos($BaptismRequest, $match)){
            $this->request_master($manychat_id,$BaptismRequest,"baptism_request",$church_id);
        }


        if(!strpos($BibleStudy, $match)){
            $this->request_master($manychat_id,$BibleStudy,"bible_study",$church_id);
        }

    }



    public function baptism_request(){


        $headers = apache_request_headers();

        $token = explode(" ",$headers['Authorization']);
        
        $manychat_api_key = $token[1];

        $db = db_connect(); 

        $sqli="select * from integration WHERE key_value ='".$manychat_api_key."'";

        $query =$db->query( $sqli);  

        $sql_integration =$query->getRow();

        if(!isset($sql_integration)){

            echo "api key not matched";

            exit();

        }

        $church_id=$sql_integration->church_id;

        //echo $church_id;

        $request = file_get_contents("php://input");

        $input = (Array)json_decode($request);


        $BaptismRequest = $input['custom_fields']->BaptismRequest;
    
        $manychat_id = $input['id'];

        $sql = "SELECT * FROM contacts where manychat_id  = '".$manychat_id."' and r_status = 'Y' ";
                $query =$db->query($sql);
                $row =$query->getRowArray();


        if(isset($row)){
            //echo "found";
        }else{
            
            // start inserting
            $sql="INSERT INTO `contacts`( `manychat_id`, `parent`, `name`, `email`, `phone`, `address`, `gender`, `birthday`, `status`, `language`, `timezone`, `live_chat_url`, `subscribed`, `source`, `created_by`, `created_at`, `update_at`, `r_status`, `form_type`, `picture`, `church_id`) VALUES ('".$manychat_id."',null,'".$input['name']."','".$input['email']."','".$input['phone']."','','".$input['gender']."',null,'','".$input['language']."','','','','manychat',null,null,null,'Y','Member','', $church_id)";

                    //echo $sql;
         
                     $query =$db->query($sql);    

            // end inserting
        }

        
        
        $match = "cuf_";

        if(!strpos($BaptismRequest, $match)){
            $this->request_master($manychat_id,$BaptismRequest,"baptism_request",$church_id);
        }

    }


    public function save_phone_only(){


        $headers = apache_request_headers();

        $token = explode(" ",$headers['Authorization']);
        
        $manychat_api_key = $token[1];

        $db = db_connect(); 

        $sqli="select * from integration WHERE key_value ='".$manychat_api_key."'";

        $query =$db->query( $sqli);  

        $sql_integration =$query->getRow();

        if(!isset($sql_integration)){

            echo "api key not matched";

            exit();

        }

        $church_id=$sql_integration->church_id;

        //echo $church_id;

        $request = file_get_contents("php://input");

        $input = (Array)json_decode($request);


        $manychat_id = $input['id'];


        $sql = "SELECT * FROM contacts where manychat_id  = '".$manychat_id."' and r_status = 'Y' ";
                $query =$db->query($sql);
                $row =$query->getRowArray();


        if(isset($row)){

            $upd_sql = "UPDATE contacts SET phone = '".$input['phone']."' WHERE manychat_id = $manychat_id ";

            $db->query($upd_sql);

            //echo "found";

        }else{
            
            // start inserting
            $sql="INSERT INTO `contacts`( `manychat_id`, `parent`, `name`, `email`, `phone`, `address`, `gender`, `birthday`, `status`, `language`, `timezone`, `live_chat_url`, `subscribed`, `source`, `created_by`, `created_at`, `update_at`, `r_status`, `form_type`, `picture`, `church_id`) VALUES ('".$manychat_id."',null,'".$input['name']."','".$input['email']."','".$input['phone']."','','".$input['gender']."',null,'','".$input['language']."','','','','manychat',null,null,null,'Y','Member','', $church_id)";

                    //echo $sql;
         
            $query =$db->query($sql);    

            // end inserting
        }

    }



    public function check_in(){


        $headers = apache_request_headers();

        $token = explode(" ",$headers['Authorization']);
        
        $manychat_api_key = $token[1];

        $db = db_connect(); 

        $sqli="select * from integration WHERE key_value ='".$manychat_api_key."'";

        $query =$db->query( $sqli);  

        $sql_integration =$query->getRow();

        if(!isset($sql_integration)){

            echo "api key not matched";

            exit();

        }

        $church_id=$sql_integration->church_id;

        //echo $church_id;

        $request = file_get_contents("php://input");

        $input = (Array)json_decode($request);


        $manychat_id = $input['id'];


        $sql = "SELECT * FROM contacts where manychat_id  = '".$manychat_id."' and r_status = 'Y' ";
        $query =$db->query($sql);
        $row =$query->getRowArray();


        if(isset($row)){

            $contact_id = $row['id'];
            
        }else{
            
            // start inserting
            $sql="INSERT INTO `contacts`( `manychat_id`, `parent`, `name`, `email`, `phone`, `address`, `gender`, `birthday`, `status`, `language`, `timezone`, `live_chat_url`, `subscribed`, `source`, `created_by`, `created_at`, `update_at`, `r_status`, `form_type`, `picture`, `church_id`) VALUES ('".$manychat_id."',null,'".$input['name']."','".$input['email']."','".$input['phone']."','','".$input['gender']."',null,'','".$input['language']."','','','','manychat',null,null,null,'Y','Member','', $church_id)";

                    //echo $sql;
         
            $query =$db->query($sql);

            $contact_id = $db->insertID();

            // end inserting
        }


        $check_in = date('Y-m-d H:i:s');


        $sql="INSERT INTO `tab_attandance`( `att_type`, `church_id`, `contact_id`, `check_in`, `entered_by`, `rstatus`, `datetime`) VALUES (0,'".$church_id."','".$contact_id."','".$check_in."',0,'Y','".$check_in."')";

                    //echo $sql;
         
        $query =$db->query($sql);

    }


    public function survey(){

        $headers = apache_request_headers();

        $token = explode(" ",$headers['Authorization']);
        
        $manychat_api_key = $token[1];

        $db = db_connect(); 

        $sqli="select * from integration WHERE key_value ='".$manychat_api_key."'";

        $query =$db->query( $sqli);  

        $sql_integration =$query->getRow();

        if(!isset($sql_integration)){

            echo "api key not matched";

            exit();

        }

        $church_id=$sql_integration->church_id;

        //echo $church_id;

        $request = file_get_contents("php://input");

        $input = (Array)json_decode($request);


        $ACSQ1 = $input['custom_fields']->ACSQ1;
        $ACSQ2 = $input['custom_fields']->ACSQ2;
        $ACSQ3 = $input['custom_fields']->ACSQ3;
        $ACSQ4 = $input['custom_fields']->ACSQ4;
        $ACSQ5 = $input['custom_fields']->ACSQ5;
        $ACSQ6 = $input['custom_fields']->ACSQ6;
        $ACSQ7 = $input['custom_fields']->ACSQ7;
        $ACSQ8 = $input['custom_fields']->ACSQ8;
        $ACSQ9 = $input['custom_fields']->ACSQ9;
        $ACSQ10 = $input['custom_fields']->ACSQ10;


        $ACS1 = $input['custom_fields']->ACS1;
        $ACS2 = $input['custom_fields']->ACS2;
        $ACS3 = $input['custom_fields']->ACS3;
        $ACS4 = $input['custom_fields']->ACS4;
        $ACS5 = $input['custom_fields']->ACS5;
        $ACS6 = $input['custom_fields']->ACS6;
        $ACS7 = $input['custom_fields']->ACS7;
        $ACS8 = $input['custom_fields']->ACS8;
        $ACS9 = $input['custom_fields']->ACS9;
        $ACS10 = $input['custom_fields']->ACS10;

        $PrayerRequest = $input['custom_fields']->PrayerRequest;
        $BaptismRequest = $input['custom_fields']->BaptismRequest;
        $BibleStudy = $input['custom_fields']->BibleStudy;


        $manychat_id = $input['id'];
        
        $match = "cuf_";

        if($ACS1 != "" && strpos($ACS2, $match)){
            $new_id = $this->new_submission($manychat_id,$church_id);
            $this->question_answer($new_id,$ACSQ1,$ACS1);
        }

        if($ACS2 != ""){

            $active_submission_id = $this->get_active_submission($manychat_id,$church_id);

            //echo "active_submission_id".$active_submission_id;

            $del_sql = "DELETE FROM survey WHERE submission_id = '".$active_submission_id."' ";
            $db->query($del_sql);

            //echo $sub_sql;

            //exit();

            if($ACS1 != ""){
                $this->question_answer($active_submission_id,$ACSQ1,$ACS1);
            }

            if(!strpos($ACS2, $match)){
                $this->question_answer($active_submission_id,$ACSQ2,$ACS2);
            }

            if(!strpos($ACS3, $match)){
                $this->question_answer($active_submission_id,$ACSQ3,$ACS3);
            }

            if(!strpos($ACS4, $match)){
                $this->question_answer($active_submission_id,$ACSQ4,$ACS4);
            }

            if(!strpos($ACS5, $match)){
                $this->question_answer($active_submission_id,$ACSQ5,$ACS5);
            }

            if(!strpos($ACS6, $match)){
                $this->question_answer($active_submission_id,$ACSQ6,$ACS6);
            }

            if(!strpos($ACS7, $match)){
                $this->question_answer($active_submission_id,$ACSQ7,$ACS7);
            }

            if(!strpos($ACS8, $match)){
                $this->question_answer($active_submission_id,$ACSQ8,$ACS8);
            }

            if(!strpos($ACS9, $match)){
                $this->question_answer($active_submission_id,$ACSQ9,$ACS9);
            }


            if(!strpos($ACS10, $match)){
                $this->question_answer($active_submission_id,$ACSQ10,$ACS10);
                $update_sql = "UPDATE survey_submission SET status = 'completed' WHERE manychat_id = '".$manychat_id."' ";
                $db->query($update_sql);
            }


            if(!strpos($PrayerRequest, $match) && !strpos($PrayerRequest, "Skip")){
                $this->question_answer($active_submission_id,"Prayer Request",$PrayerRequest,"prayer_request");
            }


            if(!strpos($BaptismRequest, $match) && !strpos($BaptismRequest, "Skip")){
                $this->question_answer($active_submission_id,"Baptism Request",$BaptismRequest,"baptism_request");
            }


            if(!strpos($BibleStudy, $match) && !strpos($BibleStudy, "No")){
                $this->question_answer($active_submission_id,"Bible Study",$BibleStudy,"bible_study");
            }

        }


        



        //echo "result".$input['custom_fields']->ACS1;

    }


    public function new_submission($manychat_id,$church_id){

        $db = db_connect(); 

        $created_at = date('Y-m-d H:i:s');

        $update_sql = "UPDATE survey_submission SET status = 'inactive' WHERE manychat_id = '".$manychat_id."' ";
        $db->query($update_sql);

        $sub_sql = "INSERT INTO survey_submission SET
        manychat_id = '".$manychat_id."', church_id = '".$church_id."',
        contact_id = 0, title = 'Submission', createdate = '".$created_at."',
        type='afterchurch',status = 'active', rstatus = 'Y' ";

        //echo $sub_sql;

        //exit();

        $db->query($sub_sql);

        return $db->insertID();
    }


    public function get_active_submission($manychat_id,$church_id){

        $db = db_connect(); 

        $created_at = date('Y-m-d H:i:s');

        $sub_sql = "SELECT id FROM survey_submission WHERE
        manychat_id = '".$manychat_id."' AND church_id = '".$church_id."' AND status = 'active' AND rstatus = 'Y' ";

        $query = $db->query($sub_sql);

        $result =$query->getRow();

        if(isset($result)){
            return $result->id;
        }else{
            return 0;
        }
    }


    public function question_answer($new_id,$question,$answer){

        $db = db_connect(); 

        $created_at = date('Y-m-d H:i:s');

        $sqls = "INSERT INTO survey SET
        submission_id = '".$new_id."', question = '".$question."',
        answer = '".$answer."', sysdate = '".$created_at."', rstatus = 'Y' ";

        // echo $sqls;

        $db->query($sqls);

    }


    public function request_master($manychatid,$answer,$type,$church_id){

        $db = db_connect(); 

        $created_at = date('Y-m-d H:i:s');

        $sqls = "INSERT INTO requests_master SET
        church_id = '".$church_id."',manychatid = '".$manychatid."',answer = '".$answer."',sysdate = '".$created_at."', 
        type = '".$type."', rstatus = 'Y' ";

        //echo $sqls;

        $db->query($sqls);

    }


    public function add_requests($new_id,$question,$answer,$type){

        $db = db_connect(); 

        $created_at = date('Y-m-d H:i:s');

        $sqls = "INSERT INTO survey SET
        submission_id = '".$new_id."', question = '".$question."',
        answer = '".$answer."', sysdate = '".$created_at."', rstatus = 'Y',type = '".$type."' ";

        // echo $sqls;

        $db->query($sqls);

    }

       public function survey_OLD(){
   
        
        //     $request = '{
        
        //     "id": "2242384912523854",
        
        //     "page_id": "108194845474271",
        
        //     "first_name": "Imran",
        
        //     "last_name": "Qurban",
        
        //     "name": "Awais Tariq",
        
        //     "gender": "male",
        
        //     "locale": "en_US",
        
        //     "language": "English",
        
        //     "timezone": "UTC+05",
        
        //     "phone": "",
        
        //     "email": "",
        
        //     "live_chat_url": "https://manychat.com/fb108194845474271/chat/5542384912523854",
        
        //     "subscribed": "2022-12-13T14:14:41-05:00",
        
        //     "custom_fields": {
        
        //         "BOT: Bot Budget": null,
        
        //         "BOT: Bot Knowledge": null,
        
        //         "BOT: Email List Size": null,
        
        //         "BOT: Number of Employees": null,
        
        //         "BOT: Requested Meeting Date and Time ": null,
        
        //         "BOT:  Thoughts about bots": null,
        
        //         "BOT: Website URL": null,
        
        //         "BOT: Why want bot": null,
        
        //         "Email": null,
        
        //         "Email Address": null,
        
        //         "English": null,
        
        //         "Espanol": null,
        
        //         "French": null,
        
        //         "In-Person": null,
        
        //         "Multifield": null,
        
        //         "Phone Number": null,
        
        //         "Phone Number as Text": null,
        
        //         "Response": null,
        
        //         "Status": null,
        
        //         "Virtual": null,
        
        //         "Type": null,
        
        //         "How Did You Hear About Us?": null,
        
        //         "PrayerRequest": "abc",
        
        //         "BaptismRequest": "abc",
        
        //         "ACS1": "ansert to question 1",
        
        //         "ACS2": "ansert to question 2",
        
        //         "ACS3": null,
        
        //         "BibleStudy": "abc",
        
        //         "ACS4": null,
        
        //         "ACS5": null,
        
        //         "ACS6": null,
        
        //         "ACS7": null,
        
        //         "ACS8": null,
        
        //         "ACS9": null,
        
        //         "ACS10": null,
        
        //         "ACSQ1":"What did you like most about our church service?  A. The message B. The music C. If Other, please type it in one sentence",
        
        //         "ACSQ2":"How would you rate your church experience today?  1. Poor 2. Fair 3. Good 4. Very Good 5. Excellent",
        
        //         "ACSQ3":"Would you join us again another time? Click on the best response.  If the answer is C (oh no!) please let us know by typing in one message below ðŸ‘‡ if there is a specific reason. (This will help us improve. We appreciate all constructive criticism.)   A. Definitely B. Ill think about it C. I dont think so...",
        
        //         "ACSQ4":"Would you be interested in Bible Studies? ðŸ“– A. Yes, but only correspondence (dropped off or mailed studies)  B. I would like in-person studies at home C. I would like online Bible studies. D. No, I do not need Bible studies.",
        
        //         "ACSQ5":"Do you have any prayer requests? Type them in belowðŸ‘‡ in one message",
        
        //         "ACSQ6":"Have you accepted Christ fully, as your personal Savior? If not, would you like to do so?  A. Yes, I have, but I want to recommit my life to Him B. No, however, I want to accept Christ fully by being baptized C. Skip",
        
        //         "ACSQ7":"Do you need help with health concerns?",
        
        //         "ACSQ8":"Do you need help with food, clothing, etc?",
        
        //         "ACSQ9":"Do you need assistance with addiction aid?",
        
        //         "ACSQ10":"Are you interested in vegetarian cooking classes?"
        
        //     }
        
        // }';
        
        
        
        
                $headers = apache_request_headers();
        
                //echo $headers['Authorization'];
        
        
        
                //exit();
        
        
        
                $token = explode(" ",$headers['Authorization']);
        
                
        
                $manychat_api_key = $token[1];
        
        
        
                //exit();
        
                //$manychat_api_key = "value345";
        
        
        
                $db = db_connect(); 
        
                $sqli="select * from integration WHERE key_value ='".$manychat_api_key."'";
        
                $query =$db->query( $sqli);  
        
                $sql_integration =$query->getRow();
        
        
        
                if(!isset($sql_integration)){
        
                    echo "api key not matched";
        
                    exit();
        
                }
        
                $church_int_id=$sql_integration->church_id;
        
                
        
                $request = file_get_contents("php://input");
        
                // var_dump($request);
        
                // exit();
        
        
                $input = (Array)json_decode($request);
        
        
        
                $db = db_connect();
        
        
        
        
        
        
                //echo $input['custom_fields']->ACSQ1;
        
        
        
                $chat_id = $input['id'];
        
        
        
        
        
                //exit();
        
        
        
                
        
        
        
                $createdate = date('Y-m-d H:i:s');
        
        
                // $sub_sql = "INSERT INTO survey_submission SET
        
                //              manychat_id = '".$chat_id."', church_id = '".$church_int_id."',
        
                //              contact_id = 0, title = 'Submission', createdate = '".$createdate."',
        
                //              status = 'active', rstatus = 'Y' ";
        
        
        
                //  //echo $sub_sql;
        
        
        
                //  $db->query($sub_sql);
        
            //       exit();
        
        
                // echo $input['custom_fields']->ACS1;
        
                // echo "sdfsd".$input['custom_fields']->ACS2;
        
                // exit();
        
        
        
        
        
                if(substr($input['custom_fields']->ACS1, 0, 1) != "{" && substr($input['custom_fields']->ACS2, 0, 1) == "{"){
        
        
        
                    // inacie all records of survey submission against manychat id
        
                    $update_surveysubmission="UPDATE survey_submission SET status = 'inactive' WHERE manychat_id=".$chat_id; 
        
                    $query =$db->query($update_surveysubmission); 
        
        
        
                    $sub_sql = "INSERT INTO survey_submission SET
        
                                manychat_id = '".$chat_id."', church_id = '".$church_int_id."',
        
                                contact_id = 0, title = 'Submission', createdate = '".$createdate."',
        
                                type='afterchurch',status = 'active', rstatus = 'Y' ";
        
        
        
                    //echo $sub_sql;
        
        
        
                    $db->query($sub_sql);
        
                    $new_id = $db->insertID();
        
                    
        
                    // insert first question
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$new_id."', question = '".$input['custom_fields']->ACSQ1."',
        
                    answer = '".$input['custom_fields']->ACS1."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    // echo $sqls;
        
                    $db->query($sqls);
        
        
        
                    
        
        
        
                }
        
                else
        
                {
        
                    $sub_id="select id from survey_submission where manychat_id = '".$chat_id."' AND status='active'";           
        
                    $query =$db->query($sub_id);  
        
                    $submission =$query->getRow();
        
                    $submi_id=$submission->id;
        
                    $rtatus_update="UPDATE survey SET rstatus = 'N' WHERE type IS NULL and submission_id=".$submi_id; 
        
                    $query =$db->query($rtatus_update); 
        
        
        
                    if(substr($input['custom_fields']->ACS1, 0, 1) != "{"){
        
                        // insert answer 1
        
                        $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->ACSQ1."',
        
                    answer = '".$input['custom_fields']->ACS1."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    ///echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->ACS2, 0, 1) != "{"){
        
                        // insert answer 2
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->ACSQ2."',
        
                    answer = '".$input['custom_fields']->ACS2."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->ACS3, 0, 1) != "{"){
        
                        // insert answer 3
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->ACSQ3."',
        
                    answer = '".$input['custom_fields']->ACS3."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->ACS4, 0, 1) != "{"){
        
                        // insert answer 4
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->ACSQ4."',
        
                    answer = '".$input['custom_fields']->ACS4."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->ACS5, 0, 1) != "{"){
        
                        // insert answer 5
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->ACSQ5."',
        
                    answer = '".$input['custom_fields']->ACS5."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->ACS6, 0, 1) != "{"){
        
                        // insert answer 6
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->ACSQ6."',
        
                    answer = '".$input['custom_fields']->ACS6."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->ACS7, 0, 1) != "{"){
        
                        // insert answer 7
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->ACSQ7."',
        
                    answer = '".$input['custom_fields']->ACS7."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->ACS8, 0, 1) != "{"){
        
                        // insert answer 8
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->ACSQ8."',
        
                    answer = '".$input['custom_fields']->ACS8."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->ACS9, 0, 1) != "{"){
        
                        // insert answer 9
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->ACSQ9."',
        
                    answer = '".$input['custom_fields']->ACS9."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
        
                    if(substr($input['custom_fields']->ACS10, 0, 1) != "{"){
        
                        // insert answer 10
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->ACSQ10."',
        
                    answer = '".$input['custom_fields']->ACS10."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    
        
                    if(substr($input['custom_fields']->PrayerRequest, 0, 1) != "{"){
                    //if($input['custom_fields']->PrayerRequest != ""){
        
        
                    $rtatus_update="UPDATE survey SET rstatus = 'N' WHERE type ='prayer_request' and submission_id=".$submi_id; 
        
                    $query =$db->query($rtatus_update); 
        
                        // insert answer 1
        
                        $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = 'Prayer Request',
        
                    answer = '".$input['custom_fields']->PrayerRequest."', sysdate = '".$createdate."', rstatus = 'Y',type = 'prayer_request'";
        
                    // echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
        
                    if(substr($input['custom_fields']->BaptismRequest, 0, 1) != "{"){
        
                        $rtatus_update="UPDATE survey SET rstatus = 'N' WHERE type ='baptism_request' and submission_id=".$submi_id; 
        
                    $query =$db->query($rtatus_update); 
        
                    //if($input['custom_fields']->BaptismRequest != ""){
        
                        // insert answer 1
        
                        $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = 'Baptism Request',
        
                    answer = '".$input['custom_fields']->BaptismRequest."', sysdate = '".$createdate."', rstatus = 'Y',type = 'baptism_request'";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
        
                    if(substr($input['custom_fields']->BibleStudy, 0, 1) != "{"){
        
        
                        $rtatus_update="UPDATE survey SET rstatus = 'N' WHERE type ='bible_study' and submission_id=".$submi_id; 
        
                    $query =$db->query($rtatus_update); 
        
                    //if($input['custom_fields']->BibleStudy != ""){
        
                        // insert answer 1
        
                        $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = 'Bible Study',
        
                    answer = '".$input['custom_fields']->BibleStudy."', sysdate = '".$createdate."', rstatus = 'Y',type = 'bible_study'";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                }         
        
                $chat_id=$input['id'];
        
                $name=$input['name'];
        
                $gender=$input['gender'];
        
                $language=$input['language'];
        
                $timezone=$input['timezone'];
        
                $live_chat_url="";
        
                $subscribed="";
        
                $email=$input['email'];
        
                $phone=$input['phone'];
        
                $Type=$input['custom_fields']->Type;
        
        
        
                    $db = db_connect(); 
        
        
        
                $ContactModel= new ContactModel();
        
                $user = $ContactModel->where('manychat_id =', $chat_id)->first();
        
                if(isset($user["manychat_id"]))
        
                {
        
        
        
                    if($user["manychat_id"]==$chat_id)
        
                    {
        
                        
        
                        $update_at =  date('Y-m-d H:i:s');
        
                        $sql="UPDATE `contacts`
        
                                SET `name` = '".$name."', 
        
        
        
                                    `email` = '".$email."',
        
        
        
                                    `phone` = '".$phone."',
        
        
        
                                    `gender` = '".$gender."', 
        
        
        
                                    `update_at` = '".$update_at."',
        
        
        
                                    `form_type` = '".$Type."'
        
        
        
                                    where manychat_id = $chat_id
        
        
        
                                    ";
        
        
        
                                    //echo $sql;
        
        
        
        
        
        
        
                        $query =$db->query($sql); 
        
        
        
        
        
        
        
        
        
        
        
                        // $s = "INSERT INTO qry SET val = '".$sql."' ";
        
        
        
                        // $db->query($s);
        
        
        
                    }
        
                    
        
        
        
                    
        
        
        
                }
        
                else
        
                {
        
                    // $session = session();
        
                    // $userData = session()->get();
        
                    // $church_id=$userData['user_church_id'];
        
                    $sql="INSERT INTO `contacts`( `manychat_id`, `parent`, `name`, `email`, `phone`, `address`, `gender`, `birthday`, `status`, `language`, `timezone`, `live_chat_url`, `subscribed`, `source`, `created_by`, `created_at`, `update_at`, `r_status`, `form_type`, `picture`, `church_id`) VALUES ('$chat_id',null,'$name','".$email."','".$phone."','','$gender',null,'','$language','$timezone','$live_chat_url','$subscribed','manychat',null,null,null,'Y','".$Type."','', $church_int_id)";
        
                    $query =$db->query($sql);                                   
        
        
        
                }
        
        
        
                
        
        
        
                    
        
        
        
        
        
        
        
        
        
        
        
                
        
        
        
                
        
        
        
                // insert id,name,gender,language,timezone,live_chat_url,subscribed into contacts.
        
        
        
                
        
        
        
                
        
        
        
                // I had created on column in contats manychat_id = id
        
        
        
                
        
        
        
                // if this manychat id exists, update the date, else insert the new row
        
        
        
        
        
        
        
                
        
        
        
                
        
   
   
       }



       public function tmibot(){
   
        
            $request = '{
        
            "id": "2242384912523854",
        
            "page_id": "108194845474271",
        
            "first_name": "Imran",
        
            "last_name": "Qurban",
        
            "name": "Awais Tariq",
        
            "gender": "male",
        
            "locale": "en_US",
        
            "language": "English",
        
            "timezone": "UTC+05",
        
            "phone": "",
        
            "email": "me@yes.com",
        
            "live_chat_url": "https://manychat.com/fb108194845474271/chat/5542384912523854",
        
            "subscribed": "2022-12-13T14:14:41-05:00",
        
            "custom_fields": {
        
                "BOT: Bot Budget": null,
        
                "BOT: Bot Knowledge": null,
        
                "BOT: Email List Size": null,
        
                "BOT: Number of Employees": null,
        
                "BOT: Requested Meeting Date and Time ": null,
        
                "BOT:  Thoughts about bots": null,
        
                "BOT: Website URL": null,
        
                "BOT: Why want bot": null,
        
                "Email": null,
        
                "Email Address": null,
        
                "English": null,
        
                "Espanol": null,
        
                "French": null,
        
                "In-Person": null,
        
                "Multifield": null,
        
                "Phone Number": null,
        
                "Phone Number as Text": null,
        
                "Response": null,
        
                "Status": null,
        
                "Virtual": null,
        
                "Type": null,
        
                "How Did You Hear About Us?": null,
        
                "PrayerRequest": "abc",
        
                "BaptismRequest": "abc",
        
                "ACS1": "ansert to question 1",
        
                "ACS2": "ansert to question 2",
        
                "ACS3": null,
        
                "BibleStudy": "abc",
        
                "ACS4": null,
        
                "ACS5": null,
        
                "ACS6": null,
        
                "ACS7": null,
        
                "ACS8": null,
        
                "ACS9": null,
        
                "ACS10": null,
        
                "ACSQ1":"What did you like most about our church service?  A. The message B. The music C. If Other, please type it in one sentence",
        
                "ACSQ2":"How would you rate your church experience today?  1. Poor 2. Fair 3. Good 4. Very Good 5. Excellent",
        
                "ACSQ3":"Would you join us again another time? Click on the best response.  If the answer is C (oh no!) please let us know by typing in one message below ðŸ‘‡ if there is a specific reason. (This will help us improve. We appreciate all constructive criticism.)   A. Definitely B. Ill think about it C. I dont think so...",
        
                "ACSQ4":"Would you be interested in Bible Studies? ðŸ“– A. Yes, but only correspondence (dropped off or mailed studies)  B. I would like in-person studies at home C. I would like online Bible studies. D. No, I do not need Bible studies.",
        
                "ACSQ5":"Do you have any prayer requests? Type them in belowðŸ‘‡ in one message",
        
                "ACSQ6":"Have you accepted Christ fully, as your personal Savior? If not, would you like to do so?  A. Yes, I have, but I want to recommit my life to Him B. No, however, I want to accept Christ fully by being baptized C. Skip",
        
                "ACSQ7":"Do you need help with health concerns?",
        
                "ACSQ8":"Do you need help with food, clothing, etc?",
        
                "ACSQ9":"Do you need assistance with addiction aid?",
        
                "ACSQ10":"Are you interested in vegetarian cooking classes?"
        
            }
        
        }';
        
        
        
        
                $headers = apache_request_headers();
        
                //echo $headers['Authorization'];
        
        
        
                //exit();
        
        
        
                $token = explode(" ",$headers['Authorization']);
        
                
        
                $manychat_api_key = $token[1];
        
        
        
                //exit();
        
                $manychat_api_key = "110105711153689:37bed716abe77477b69318cbe8f75fca";
        
        
        
                $db = db_connect(); 
        
                $sqli="select * from integration WHERE key_value ='".$manychat_api_key."'";
        
                $query =$db->query( $sqli);  
        
                $sql_integration =$query->getRow();
        
        
        
                // if(!isset($sql_integration)){
        
                //     echo "api key not matched";
        
                //     exit();
        
                // }
        
                $church_int_id=$sql_integration->church_id;
        
                
        
                //$request = file_get_contents("php://input");
        
                // var_dump($request);
        
                // exit();
        
        
                $input = (Array)json_decode($request);
        
        
        
                $db = db_connect();
        
        
        
        
        
        
                //echo $input['custom_fields']->ACSQ1;
        
        
        
                $chat_id = $input['id'];
        
        
        
        
        
                //exit();
        
        
        
                
        
        
        
                $createdate = date('Y-m-d H:i:s');
        
        
                // $sub_sql = "INSERT INTO survey_submission SET
        
                //              manychat_id = '".$chat_id."', church_id = '".$church_int_id."',
        
                //              contact_id = 0, title = 'Submission', createdate = '".$createdate."',
        
                //              status = 'active', rstatus = 'Y' ";
        
        
        
                //  //echo $sub_sql;
        
        
        
                //  $db->query($sub_sql);
        
            //       exit();
        
        
                // echo $input['custom_fields']->ACS1;
        
                // echo "sdfsd".$input['custom_fields']->ACS2;
        
                // exit();
        
                $email = $input['email'];

                $sql = "SELECT * FROM contacts where email  = '".$email."' and r_status = 'Y' ";
                $query =$db->query($sql);
                $row =$query->getRowArray();


                if(isset($row)){
                    //echo "found";
                }else{
                    
                    // start inserting
                    $sql="INSERT INTO `contacts`( `manychat_id`, `parent`, `name`, `email`, `phone`, `address`, `gender`, `birthday`, `status`, `language`, `timezone`, `live_chat_url`, `subscribed`, `source`, `created_by`, `created_at`, `update_at`, `r_status`, `form_type`, `picture`, `church_id`) VALUES ('$chat_id',null,'$name','".$email."','".$phone."','','$gender',null,'','$language','$timezone','$live_chat_url','$subscribed','manychat',null,null,null,'Y','".$Type."','', $church_int_id)";

                            echo $sql;
                 
                             $query =$db->query($sql);    

                    // end inserting
                }

                //exit();



        
        
        
                if(substr($input['custom_fields']->TMI1, 0, 1) != "{" && substr($input['custom_fields']->TMI2, 0, 1) == "{"){
        
        
        
                    // inacie all records of survey submission against manychat id
        
                    $update_surveysubmission="UPDATE survey_submission SET status = 'inactive' WHERE manychat_id=".$chat_id; 
        
                    $query =$db->query($update_surveysubmission); 
        
        
        
                    $sub_sql = "INSERT INTO survey_submission SET
        
                                manychat_id = '".$chat_id."', church_id = '".$church_int_id."',
        
                                contact_id = 0, title = 'Submission', createdate = '".$createdate."',
        
                                type='tmibot',status = 'active', rstatus = 'Y' ";
        
        
        
                    //echo $sub_sql;
        
        
        
                    $db->query($sub_sql);
        
                    $new_id = $db->insertID();
        
                    
        
                    // insert first question
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$new_id."', question = '".$input['custom_fields']->TMIQ1."',
        
                    answer = '".$input['custom_fields']->TMI1."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    // echo $sqls;
        
                    $db->query($sqls);
        
        
        
                    
        
        
        
                }
        
                else
        
                {
        
                    $sub_id="select id from survey_submission where manychat_id = '".$chat_id."' AND status='active'";           
        
                    $query =$db->query($sub_id);  
        
                    $submission =$query->getRow();
        
                    $submi_id=$submission->id;
        
                    $rtatus_update="UPDATE survey SET rstatus = 'N' WHERE type IS NULL and submission_id=".$submi_id; 
        
                    $query =$db->query($rtatus_update); 
        
        
        
                    if(substr($input['custom_fields']->TMI1, 0, 1) != "{"){
        
                        // insert answer 1
        
                        $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->TMIQ1."',
        
                    answer = '".$input['custom_fields']->TMI1."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    ///echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->TMI2, 0, 1) != "{"){
        
                        // insert answer 2
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->TMIQ2."',
        
                    answer = '".$input['custom_fields']->TMI2."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->TMI3, 0, 1) != "{"){
        
                        // insert answer 3
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->TMIQ3."',
        
                    answer = '".$input['custom_fields']->TMI3."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->TMI4, 0, 1) != "{"){
        
                        // insert answer 4
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->TMIQ4."',
        
                    answer = '".$input['custom_fields']->TMI4."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->TMI5, 0, 1) != "{"){
        
                        // insert answer 5
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->TMIQ5."',
        
                    answer = '".$input['custom_fields']->TMI5."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->TMI6, 0, 1) != "{"){
        
                        // insert answer 6
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->TMIQ6."',
        
                    answer = '".$input['custom_fields']->TMI6."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->TMI7, 0, 1) != "{"){
        
                        // insert answer 7
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->TMIQ7."',
        
                    answer = '".$input['custom_fields']->TMI7."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->TMI8, 0, 1) != "{"){
        
                        // insert answer 8
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->TMIQ8."',
        
                    answer = '".$input['custom_fields']->TMI8."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    if(substr($input['custom_fields']->TMI9, 0, 1) != "{"){
        
                        // insert answer 9
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->TMIQ9."',
        
                    answer = '".$input['custom_fields']->TMI9."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
        
                    if(substr($input['custom_fields']->TMI10, 0, 1) != "{"){
        
                        // insert answer 10
        
                    $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->TMIQ10."',
        
                    answer = '".$input['custom_fields']->TMI10."', sysdate = '".$createdate."', rstatus = 'Y' ";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                    
        
                    if(substr($input['custom_fields']->PrayerRequest, 0, 1) != "{"){
                    //if($input['custom_fields']->PrayerRequest != ""){
        
        
                    $rtatus_update="UPDATE survey SET rstatus = 'N' WHERE type ='prayer_request' and submission_id=".$submi_id; 
        
                    $query =$db->query($rtatus_update); 
        
                        // insert answer 1
        
                        $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = 'Prayer Request',
        
                    answer = '".$input['custom_fields']->PrayerRequest."', sysdate = '".$createdate."', rstatus = 'Y',type = 'prayer_request'";
        
                    // echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
        
                    if(substr($input['custom_fields']->BaptismRequest, 0, 1) != "{"){
        
                        $rtatus_update="UPDATE survey SET rstatus = 'N' WHERE type ='baptism_request' and submission_id=".$submi_id; 
        
                    $query =$db->query($rtatus_update); 
        
                    //if($input['custom_fields']->BaptismRequest != ""){
        
                        // insert answer 1
        
                        $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = 'Baptism Request',
        
                    answer = '".$input['custom_fields']->BaptismRequest."', sysdate = '".$createdate."', rstatus = 'Y',type = 'baptism_request'";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
        
                    if(substr($input['custom_fields']->BibleStudy, 0, 1) != "{"){
        
        
                        $rtatus_update="UPDATE survey SET rstatus = 'N' WHERE type ='bible_study' and submission_id=".$submi_id; 
        
                    $query =$db->query($rtatus_update); 
        
                    //if($input['custom_fields']->BibleStudy != ""){
        
                        // insert answer 1
        
                        $sqls = "INSERT INTO survey SET
        
                    submission_id = '".$submi_id."', question = 'Bible Study',
        
                    answer = '".$input['custom_fields']->BibleStudy."', sysdate = '".$createdate."', rstatus = 'Y',type = 'bible_study'";
        
                    //echo $sqls;
        
                    $db->query($sqls);
        
                    }
        
                }         
        
                $chat_id=$input['id'];
        
                $name=$input['name'];
        
                $gender=$input['gender'];
        
                $language=$input['language'];
        
                $timezone=$input['timezone'];
        
                $live_chat_url="";
        
                $subscribed="";
        
                $email=$input['email'];
        
                $phone=$input['phone'];
        
                $Type=$input['custom_fields']->Type;
        
        
        
                    $db = db_connect(); 
        
        
        
                $ContactModel= new ContactModel();
        
                $user = $ContactModel->where('manychat_id =', $chat_id)->first();
        
                if(isset($user["manychat_id"]))
        
                {
        
        
        
                    if($user["manychat_id"]==$chat_id)
        
                    {
        
                        
        
                        $update_at =  date('Y-m-d H:i:s');
        
                        $sql="UPDATE `contacts`
        
                                SET `name` = '".$name."', 
        
        
        
                                    `email` = '".$email."',
        
        
        
                                    `phone` = '".$phone."',
        
        
        
                                    `gender` = '".$gender."', 
        
        
        
                                    `update_at` = '".$update_at."',
        
        
        
                                    `form_type` = '".$Type."'
        
        
        
                                    where manychat_id = $chat_id
        
        
        
                                    ";
        
        
        
                                    //echo $sql;
        
        
        
        
        
        
        
                        $query =$db->query($sql); 
        
        
        
        
        
        
        
        
        
        
        
                        // $s = "INSERT INTO qry SET val = '".$sql."' ";
        
        
        
                        // $db->query($s);
        
        
        
                    }
        
                    
        
        
        
                    
        
        
        
                }
        
                else
        
                {
        
                    // $session = session();
        
                    // $userData = session()->get();
        
                    // $church_id=$userData['user_church_id'];
        
                    $sql="INSERT INTO `contacts`( `manychat_id`, `parent`, `name`, `email`, `phone`, `address`, `gender`, `birthday`, `status`, `language`, `timezone`, `live_chat_url`, `subscribed`, `source`, `created_by`, `created_at`, `update_at`, `r_status`, `form_type`, `picture`, `church_id`) VALUES ('$chat_id',null,'$name','".$email."','".$phone."','','$gender',null,'','$language','$timezone','$live_chat_url','$subscribed','manychat',null,null,null,'Y','".$Type."','', $church_int_id)";
        
                    $query =$db->query($sql);                                   
        
        
        
                }
        
        
        
                
        
        
        
                    
        
        
        
        
        
        
        
        
        
        
        
                
        
        
        
                
        
        
        
                // insert id,name,gender,language,timezone,live_chat_url,subscribed into contacts.
        
        
        
                
        
        
        
                
        
        
        
                // I had created on column in contats manychat_id = id
        
        
        
                
        
        
        
                // if this manychat id exists, update the date, else insert the new row
        
        
        
        
        
        
        
                
        
        
        
                
        
   
   
       }

   
   
   
   
   
   
   
       public function manychat_survey(){
   
   
   
   
   
           // $request = '{"key": "user:5542384912523854","id": "5542384912523854","page_id": "108194845474271", "user_refs": [], "status": "active", "first_name": "Imran","last_name": "Qurban","name": "Imran Qurban","gender": "male","profile_pic": "https://manybot-thumbnails.s3.eu-central-1.amazonaws.com/108194845474271/subscribers/big_d882b9accea21cf73cdb4ac129076581.jpg","locale": "en_US","language":"English",
   
   
   
        //        "timezone": "UTC+05","live_chat_url": "https://manychat.com/fb108194845474271/chat/5542384912523854","last_input_text": null,    "optin_phone": false,"phone": null,"optin_email": false,"email": null,"subscribed": "2022-12-13T14:14:41-05:00","last_interaction": "2022-12-13T14:14:41-05:00","ig_last_interaction": null,"last_seen": "2022-12-13T14:14:41-05:00","ig_last_seen": null,
   
   
   
        //        "is_followup_enabled": true, "ig_username": null,"ig_id": null,"whatsapp_phone": null,"optin_whatsapp": false,"phone_country_code": null,"last_growth_tool": null,"custom_fields": {"BOT: Bot Budget": null,"BOT: Bot Knowledge": null,"BOT: Email List Size": null,
   
   
   
        //         "BOT: Number of Employees": null,"BOT: Requested Meeting Date and Time ": null,"BOT:  Thoughts about bots": null,"BOT: Website URL": null,"BOT: Why want bot": null,"Email": null,"Email Address": null,"English": null,"Espanol": null,"French": null,        "In-Person": null,"Multifield": null,"Phone Number": null,"Phone Number as Text": null,"Response": null,"Status": "zero","Type": "vviissii",         "Virtual": null } }';
   
   
   
   
   
   
   
           $request = file_get_contents("php://input");
   
   
   
   
   
   
   
           $input = (Array)json_decode($request);
   
   
   
   
   
   
   
           //echo $input['custom_fields']->Type;
   
   
   
   
   
   
   
           //exit();
   
   
   
   
   
   
   
           $chat_id=$input['id'];
   
   
   
           $name=$input['name'];
   
   
   
           $gender=$input['gender'];
   
   
   
           $language=$input['language'];
   
   
   
           $timezone=$input['timezone'];
   
   
   
           $live_chat_url=$input['live_chat_url'];
   
   
   
           $subscribed=$input['subscribed'];
   
   
   
           $email=$input['email'];
   
   
   
           $phone=$input['phone'];
   
   
   
           $Type=$input['custom_fields']->Type;
   
   
   
   
   
   
   
           // $sqlc="SELECT manychat_id FROM `contacts` where manychat_id=".$chat_id;
   
   
   
           // $db = db_connect();  
   
   
   
           // $query_chat =$db->query($sqlc);   
   
   
   
           $db = db_connect(); 
   
   
   
   
   
   
   
           $ContactModel= new ContactModel();
   
   
   
           $user = $ContactModel->where('manychat_id=',$chat_id)->first();
   
   
   
           if(isset($user["manychat_id"]))
   
   
   
           {
   
   
   
               if($user["manychat_id"]==$chat_id)
   
   
   
               {
   
   
   
                   $update_at =  date('Y-m-d H:i:s');
   
   
   
   
   
   
   
                   $sql="UPDATE `contacts`
   
   
   
                           SET `name` = '".$name."', 
   
   
   
                               `email` = '".$email."',
   
   
   
                               `phone` = '".$phone."',
   
   
   
                               `gender` = '".$gender."', 
   
   
   
                               `update_at` = '".$update_at."',
   
   
   
                               `form_type` = '".$Type."'
   
   
   
                               where manychat_id = $chat_id
   
   
   
                               ";
   
   
   
   
   
   
   
                               //echo $sql;
   
   
   
   
   
   
   
                   $query =$db->query($sql); 
   
   
   
   
   
   
   
   
   
   
   
                   // $s = "INSERT INTO qry SET val = '".$sql."' ";
   
   
   
                   // $db->query($s);
   
   
   
               }
   
   
   
               
   
   
   
           }
   
   
   
           else
   
   
   
               {
   
                   $session = session();
   
                   $userData = session()->get();
   
                   $church_id=$userData['user_church_id'];
   
   
   
                   $sql="INSERT INTO `contacts`( `manychat_id`, `parent`, `name`, `email`, `phone`, `address`, `gender`, `birthday`, `status`, `language`, `timezone`, `live_chat_url`, `subscribed`, `source`, `created_by`, `created_at`, `update_at`, `r_status`, `form_type`, `picture`, `church_id`) VALUES ('$chat_id',null,'$name','".$email."','".$phone."','','$gender',null,'','$language','$timezone','$live_chat_url','$subscribed','manychat',null,null,null,'Y','".$Type."','',$church_id)";
   
   
   
                    
   
   
   
                   $query =$db->query($sql);                                   
   
   
   
               }
   
   
   
       }
   
       function integration_view()
   
       {
   
           
   
           return view('dashboard/integration');
   
   
   
       }
   
       function integration_save()
   
       {
   
           $session = session();
   
           $userData = session()->get();
   
           $userid= $userData['user_id'];       
   
           $church_id=$userData['user_church_id'];
   
          $IntegrationModel=new IntegrationModel();
   
   
   
           
   
           $data=[
   
               'many_chat' =>$this->request->getvar('type'),
   
               'church_id' => $church_id,
   
               'key_value' =>$this->request->getvar('key_value'),
   
               'user_id' => $userid,
   
               'rstatus' =>'Y',
   
           ];              
   
           $IntegrationModel->insert($data);
   
           return redirect()->to(base_url()."/integration");
   
   
   
         
   
       }
   
      

      public function communitysurvey()
                {
            
                 
                    //     $request = '{
                    
                    //     "id": "5542384912523854",
                    
                    //     "page_id": "108194845474271",
                    
                    //     "first_name": "Imran",
                    
                    //     "last_name": "Qurban",
                    
                    //     "name": "Awais Tariq",
                    
                    //     "gender": "male",
                    
                    //     "locale": "en_US",
                    
                    //     "language": "English",
                    
                    //     "timezone": "UTC+05",
                    
                    //     "phone": "",
                    
                    //     "email": "",
                    
                    //     "live_chat_url": "https://manychat.com/fb108194845474271/chat/5542384912523854",
                    
                    //     "subscribed": "2022-12-13T14:14:41-05:00",
                    
                    //     "custom_fields": {
                    
                    //         "BOT: Bot Budget": null,
                    
                    //         "BOT: Bot Knowledge": null,
                    
                    //         "BOT: Email List Size": null,
                    
                    //         "BOT: Number of Employees": null,
                    
                    //         "BOT: Requested Meeting Date and Time ": null,
                    
                    //         "BOT:  Thoughts about bots": null,
                    
                    //         "BOT: Website URL": null,
                    
                    //         "BOT: Why want bot": null,
                    
                    //         "Email": null,
                    
                    //         "Email Address": null,
                    
                    //         "English": null,
                    
                    //         "Espanol": null,
                    
                    //         "French": null,
                    
                    //         "In-Person": null,
                    
                    //         "Multifield": null,
                    
                    //         "Phone Number": null,
                    
                    //         "Phone Number as Text": null,
                    
                    //         "Response": null,
                    
                    //         "Status": null,
                    
                    //         "Virtual": null,
                    
                    //         "Type": null,
                    
                    //         "How Did You Hear About Us?": null,
                    
                    //         "PrayerRequest": "abc",
                    
                    //         "BaptismRequest": "abc",
                    
                    //         "CSS1": "ansert to question 1",
                    
                    //         "CSS2": "",
                    
                    //         "CSS3": null,
                    
                    //         "BibleStudy": "abc",
                    
                    //         "CSS4": null,
                    
                    //         "CSS5": null,
                    
                    //         "CSS6": null,
                    
                    //         "CSS7": null,
                    
                    //         "CSS8": null,
                    
                    //         "CSS9": null,
                    
                    //         "CSS10": null,

                    //         "CSS11": null,

                    //         "CSS12": null,

                    //         "CSS13": null,

                    //         "CSS14": null,

                    //         "CSS15": null,


                    
                    //         "CSSQ1":"What did you like most about our church service?  A. The message B. The music C. If Other, please type it in one sentence",
                    
                    //         "CSSQ2":"How would you rate your church experience today?  1. Poor 2. Fair 3. Good 4. Very Good 5. Excellent",
                    
                    //         "CSSQ3":"Would you join us again another time? Click on the best response.  If the answer is C (oh no!) please let us know by typing in one message below ðŸ‘‡ if there is a specific reason. (This will help us improve. We appreciate all constructive criticism.)   A. Definitely B. Ill think about it C. I dont think so...",
                    
                    //         "CSSQ4":"Would you be interested in Bible Studies? ðŸ“– A. Yes, but only correspondence (dropped off or mailed studies)  B. I would like in-person studies at home C. I would like online Bible studies. D. No, I do not need Bible studies.",
                    
                    //         "CSSQ5":"Do you have any prayer requests? Type them in belowðŸ‘‡ in one message",
                    
                    //         "CSSQ6":"Have you accepted Christ fully, as your personal Savior? If not, would you like to do so?  A. Yes, I have, but I want to recommit my life to Him B. No, however, I want to accept Christ fully by being baptized C. Skip",
                    
                    //         "CSSQ7":"Do you need help with health concerns?",
                    
                    //         "CSSQ8":"Do you need help with food, clothing, etc?",
                    
                    //         "CSSQ9":"Do you need assistance with addiction aid?",
                    
                    //         "CSSQ10":"Are you interested in vegetarian cooking classes?",

                    //         "CSSQ11":"Are you interested in vegetarian cooking classes?",

                    //         "CSSQ12":"Are you interested in vegetarian cooking classes?",

                    //         "CSSQ13":"Are you interested in vegetarian cooking classes?",

                    //         "CSSQ14":"Are you interested in vegetarian cooking classes?",

                    //         "CSSQ15":"Are you interested in vegetarian cooking classes?"


                    
                    //     }
                    
                    // }';
                 
                         $headers = apache_request_headers();
                 
                         //echo $headers['Authorization'];
                 
                 
                 
                         //exit();
                 
                 
                 
                         $token = explode(" ",$headers['Authorization']);
                 
                         
                 
                         $manychat_api_key = $token[1];
                 
                 
                 
                         //exit();
                 
                         //$manychat_api_key = "value345";
                 
                 
                 
                         $db = db_connect(); 
                 
                         $sqli="select * from integration WHERE key_value ='".$manychat_api_key."'";
                 
                         $query =$db->query( $sqli);  
                 
                         $sql_integration =$query->getRow();
                 
                 
                 
                         if(!isset($sql_integration)){
                 
                             echo "api key not matched";
                 
                             exit();
                 
                         }
                 
                         $church_int_id=$sql_integration->church_id;
                 
                         
                 
                         $request = file_get_contents("php://input");
                 
                        //  var_dump($request);
                 
                        //  exit();
                 
                 
                         $input = (Array)json_decode($request);
                 
                 
                 
                         $db = db_connect();
                 
                 
                 
                 
                 
                 
                            //          echo $input['custom_fields']->CSSQ1;
                            //  echo $input['id'];
                 
                
                         $chat_id = $input['id'];
                 
                 
                 
                 
                 
                         //exit();
                 
                 
                 
                         
                 
                 
                 
                         $createdate = date('Y-m-d H:i:s');
                 
                 
                         // $sub_sql = "INSERT INTO survey_submission SET
                 
                         //                 manychat_id = '".$chat_id."', church_id = '".$church_int_id."',
                 
                         //                 contact_id = 0, title = 'Submission', createdate = '".$createdate."',
                 
                         //                 status = 'active', rstatus = 'Y' ";
                 
                 
                 
                         //     //echo $sub_sql;
                 
                 
                 
                         //     $db->query($sub_sql);
                 
                     //       exit();
                 
                 
                         // echo $input['custom_fields']->ACS1;
                 
                         //echo "sdfsd".$input['custom_fields']->CSS1;
                 
                         //exit();


                 
                 
                 
                 
                 
                         if(substr($input['custom_fields']->CSS1, 0, 1) != "{" && substr($input['custom_fields']->CSS2, 0, 1) == "{"){
                 
                 
                 
                             // inacie all records of survey submission against manychat id
                 
                             $update_surveysubmission="UPDATE survey_submission SET status = 'inactive' WHERE manychat_id=".$chat_id; 
                 
                             $query =$db->query($update_surveysubmission); 
                 
             
                 
                             $sub_sql = "INSERT INTO survey_submission SET
                 
                                         manychat_id = '".$chat_id."', church_id = '".$church_int_id."',
                 
                                         contact_id = 0, title = 'Submission', createdate = '".$createdate."',
                 
                                         type='community',status = 'active', rstatus = 'Y' ";
                 
                 
                 
                            //echo $sub_sql;
                 
                 
                 
                             $db->query($sub_sql);
                 
                             $new_id = $db->insertID();
                 
                             
                 
                             // insert first question
                 
                             $sqls = "INSERT INTO survey SET
                 
                             submission_id = '".$new_id."', question = '".$input['custom_fields']->CSSQ1."',
                 
                             answer = '".$input['custom_fields']->CSS1."', sysdate = '".$createdate."', rstatus = 'Y' ";
                 
                             // echo $sqls;
                 
                             $db->query($sqls);
                 
                 
                 
                             
                 
                 
                 
                         }
                 
                         else
                 
                        {
                 
                                $sub_id="select id from survey_submission where manychat_id = '".$chat_id."' AND status='active' and type='community' ";           
                    
                                $query =$db->query($sub_id);  
                    
                                $submission =$query->getRow();
                               
                    
                                $submi_id=$submission->id;
                    
                                $rtatus_update="UPDATE survey SET rstatus = 'N' WHERE type IS NULL and submission_id=".$submi_id; 
                    
                                $query =$db->query($rtatus_update); 
                    
                    
                    
                                if(substr($input['custom_fields']->CSS1, 0, 1) != "{"){
                    
                                    // insert answer 1
                    
                                        $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ1."',
                        
                                    answer = '".$input['custom_fields']->CSS1."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    // echo $sqls;
                        
                                    $db->query($sqls);
                        
                                }
                    
                                if(substr($input['custom_fields']->CSS2, 0, 1) != "{"){
                    
                                    // insert answer 2
                        
                                    $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ2."',
                        
                                    answer = '".$input['custom_fields']->CSS2."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    //echo $sqls;
                        
                                    $db->query($sqls);
                    
                                }
                    
                                if(substr($input['custom_fields']->CSS3, 0, 1) != "{"){
                    
                                    // insert answer 3
                    
                                    $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ3."',
                        
                                    answer = '".$input['custom_fields']->CSS3."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    //echo $sqls;
                        
                                    $db->query($sqls);
                    
                                }
                    
                                if(substr($input['custom_fields']->CSS4, 0, 1) != "{"){
                    
                                    // insert answer 4
                    
                                    $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ4."',
                        
                                    answer = '".$input['custom_fields']->CSS4."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    //echo $sqls;
                        
                                    $db->query($sqls);
                    
                                }
                    
                                if(substr($input['custom_fields']->CSS5, 0, 1) != "{"){
                    
                                        // insert answer 5
                        
                                    $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ5."',
                        
                                    answer = '".$input['custom_fields']->CSS5."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    //echo $sqls;
                        
                                    $db->query($sqls);
                    
                                }
                    
                                if(substr($input['custom_fields']->CSS6, 0, 1) != "{"){
                        
                                        // insert answer 6
                        
                                    $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ6."',
                        
                                    answer = '".$input['custom_fields']->CSS6."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    //echo $sqls;
                        
                                    $db->query($sqls);
                    
                                }
                    
                                if(substr($input['custom_fields']->CSS7, 0, 1) != "{"){
                    
                                        // insert answer 7
                        
                                    $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ7."',
                        
                                    answer = '".$input['custom_fields']->CSS7."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    //echo $sqls;
                        
                                    $db->query($sqls);
                    
                                }
                    
                                if(substr($input['custom_fields']->CSS8, 0, 1) != "{"){
                    
                                        // insert answer 8
                        
                                    $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ8."',
                        
                                    answer = '".$input['custom_fields']->CSS8."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    //echo $sqls;
                        
                                    $db->query($sqls);
                    
                                }
                    
                                if(substr($input['custom_fields']->CSS9, 0, 1) != "{"){
                    
                                        // insert answer 9
                        
                                    $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ9."',
                        
                                    answer = '".$input['custom_fields']->CSS9."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    //echo $sqls;
                        
                                    $db->query($sqls);
                        
                                }
                    
                    
                                if(substr($input['custom_fields']->CSS10, 0, 1) != "{"){
                    
                                        // insert answer 10
                        
                                    $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ10."',
                        
                                    answer = '".$input['custom_fields']->CSS10."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    //echo $sqls;
                        
                                    $db->query($sqls);
                    
                                }
                                if(substr($input['custom_fields']->CSS11, 0, 1) != "{"){
                    
                                        // insert answer 11
                        
                                    $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ11."',
                        
                                    answer = '".$input['custom_fields']->CSS11."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    //echo $sqls;
                        
                                    $db->query($sqls);
                    
                                }
                                if(substr($input['custom_fields']->CSS12, 0, 1) != "{"){
                    
                                        // insert answer 12
                        
                                    $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ12."',
                        
                                    answer = '".$input['custom_fields']->CSS12."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    //echo $sqls;
                        
                                    $db->query($sqls);
                    
                                }   
                                if(substr($input['custom_fields']->CSS13, 0, 1) != "{"){
                    
                                        // insert answer 13
                        
                                    $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ13."',
                        
                                    answer = '".$input['custom_fields']->CSS13."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    //echo $sqls;
                        
                                    $db->query($sqls);
                    
                                }
                                if(substr($input['custom_fields']->CSS14, 0, 1) != "{"){
                    
                                        // insert answer 14
                        
                                    $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ14."',
                        
                                    answer = '".$input['custom_fields']->CSS14."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    //echo $sqls;
                        
                                    $db->query($sqls);
                    
                                }
                                if(substr($input['custom_fields']->CSS15, 0, 1) != "{"){
                    
                                        // insert answer 15
                        
                                    $sqls = "INSERT INTO survey SET
                        
                                    submission_id = '".$submi_id."', question = '".$input['custom_fields']->CSSQ15."',
                        
                                    answer = '".$input['custom_fields']->CSS15."', sysdate = '".$createdate."', rstatus = 'Y' ";
                        
                                    //echo $sqls;
                        
                                    $db->query($sqls);
                        
                                }
                            
                        }
                             
                           
                             if(substr($input['custom_fields']->PrayerRequest, 0, 1) != "{"){
                                //if($input['custom_fields']->PrayerRequest != ""){
                 
                 
                                $rtatus_update="UPDATE survey SET rstatus = 'N' WHERE type ='prayer_request' and submission_id=".$submi_id; 
                    
                                $query =$db->query($rtatus_update); 
                    
                                    // insert answer 1
                    
                                    $sqls = "INSERT INTO survey SET
                    
                                submission_id = '".$submi_id."', question = 'Prayer Request',
                    
                                answer = '".$input['custom_fields']->PrayerRequest."', sysdate = '".$createdate."', rstatus = 'Y',type = 'prayer_request'";
                    
                                echo $sqls;
                    
                                $db->query($sqls);
                 
                             }
                 
                 
                             if(substr($input['custom_fields']->BaptismRequest, 0, 1) != "{"){
                 
                                 $rtatus_update="UPDATE survey SET rstatus = 'N' WHERE type ='baptism_request' and submission_id=".$submi_id; 
                 
                                $query =$db->query($rtatus_update); 
                 
                                //if($input['custom_fields']->BaptismRequest != ""){
                 
                                 // insert answer 1
                 
                                 $sqls = "INSERT INTO survey SET
                 
                                submission_id = '".$submi_id."', question = 'Baptism Request',
                 
                                answer = '".$input['custom_fields']->BaptismRequest."', sysdate = '".$createdate."', rstatus = 'Y',type = 'baptism_request'";
                 
                                //echo $sqls;
                 
                                $db->query($sqls);
                 
                             }
                 
                 
                             if(substr($input['custom_fields']->BibleStudy, 0, 1) != "{"){
                 
                 
                                 $rtatus_update="UPDATE survey SET rstatus = 'N' WHERE type ='bible_study' and submission_id=".$submi_id; 
                 
                                $query =$db->query($rtatus_update); 
                 
                                //if($input['custom_fields']->BibleStudy != ""){
                 
                                 // insert answer 1
                 
                                 $sqls = "INSERT INTO survey SET
                 
                                submission_id = '".$submi_id."', question = 'Bible Study',
                 
                                answer = '".$input['custom_fields']->BibleStudy."', sysdate = '".$createdate."', rstatus = 'Y',type = 'bible_study'";
                 
                                //echo $sqls;
                 
                                $db->query($sqls);
                 
                             }
                 
                                  
                 
                         $chat_id=$input['id'];
                 
                         $name=$input['name'];
                 
                         $gender=$input['gender'];
                 
                         $language=$input['language'];
                 
                         $timezone=$input['timezone'];
                 
                         $live_chat_url="";
                 
                         $subscribed="";
                 
                         $email=$input['email'];
                 
                         $phone=$input['phone'];
                 
                         $Type=$input['custom_fields']->Type;
                 
                 
                 
                             $db = db_connect(); 
                 
                 
                 
                         $ContactModel= new ContactModel();
                 
                         $user = $ContactModel->where('r_status', 'Y')->where('manychat_id =', $chat_id)->first();
                 
                         if(isset($user["manychat_id"]))
                 
                         {
                 
                 
                 
                             if($user["manychat_id"]==$chat_id)
                 
                             {
                 
                                 
                 
                                 $update_at =  date('Y-m-d H:i:s');
                 
                                 $sql="UPDATE `contacts`
                 
                                         SET `name` = '".$name."', 
                 
                 
                 
                                             `email` = '".$email."',
                 
                 
                 
                                             `phone` = '".$phone."',
                 
                 
                 
                                             `gender` = '".$gender."', 
                 
                 
                 
                                             `update_at` = '".$update_at."',
                 
                 
                 
                                             `form_type` = '".$Type."'
                 
                 
                 
                                             where manychat_id = $chat_id
                 
                 
                 
                                             ";
                 
                 
                 
                                             //echo $sql;
                 
                 
                 
                 
                 
                 
                 
                                 $query =$db->query($sql); 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                                 // $s = "INSERT INTO qry SET val = '".$sql."' ";
                 
                 
                 
                                 // $db->query($s);
                 
                 
                 
                             }
                         }
                 
                         else
                 
                         {
                 
                             // $session = session();
                 
                             // $userData = session()->get();
                 
                             // $church_id=$userData['user_church_id'];
                 
                             $sql="INSERT INTO `contacts`( `manychat_id`, `parent`, `name`, `email`, `phone`, `address`, `gender`, `birthday`, `status`, `language`, `timezone`, `live_chat_url`, `subscribed`, `source`, `created_by`, `created_at`, `update_at`, `r_status`, `form_type`, `picture`, `church_id`) VALUES ('$chat_id',null,'$name','".$email."','".$phone."','','$gender',null,'','$language','$timezone','$live_chat_url','$subscribed','manychat',null,null,null,'Y','".$Type."','', $church_int_id)";

                             //echo $sql;
                 
                             $query =$db->query($sql);                                   
                 
                 
                 
                         }
                 
                 
                 
                         
                 
                 
                 
                             
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                         
                 
                 
                 
                         
                 
                 
                 
                         // insert id,name,gender,language,timezone,live_chat_url,subscribed into contacts.
                 
                 
                 
                         
                 
                 
                 
                         
                 
                 
                 
                         // I had created on column in contats manychat_id = id
                 
                 
                 
                         
                 
                 
                 
                         // if this manychat id exists, update the date, else insert the new row
                 
                 
                 
                 
                        
                 
                 
                         
                 
                 
                        
                         
                 
                }
            
}
        
     
       
   
   
   
   ?>