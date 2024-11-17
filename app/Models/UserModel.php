<?php 

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model

{

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $allowedFields = ['otp','parent','name','email','password','encrypt_pwd','role','phone','status','createdat','rstatus','att_link','verify_link','reset_link','user_table','user_plan','stripe_key_id','expiry_date','image','church_id','reset_datetime'];

}


