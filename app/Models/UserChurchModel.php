<?php namespace App\Models;

use CodeIgniter\Model;


class UserChurchModel extends Model
{
    protected $table = 'user_churches';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'user_ref', 'church_ref', 'createdat', 'createdby', 'rstatus'];
    
}
