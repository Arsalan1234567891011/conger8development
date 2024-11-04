<?php 

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model

{

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $allowedFields = ['parent','name','email','password','role','phone','status','createdat','rstatus','att_link','verify_link','reset_link','user_table','image','church_id','dpassword','dphone'];

}


