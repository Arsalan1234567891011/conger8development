<?php namespace App\Models;



use CodeIgniter\Model;





class UserGroupModel extends Model

{

    protected $table = 'user_group';

    protected $primaryKey = 'user_group_id';

    protected $allowedFields = ['user_group_id', 'user_id', 'group_id', 'isactive','updated_at','created_at'];

    

}



