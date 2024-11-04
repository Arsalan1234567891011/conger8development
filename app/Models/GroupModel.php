<?php namespace App\Models;



use CodeIgniter\Model;





class GroupModel extends Model

{

    protected $table = 'group';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'group_name', 'isactive', 'isdeleted', 'created_at'];

    

}



