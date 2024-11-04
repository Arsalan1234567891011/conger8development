<?php namespace App\Models;

use CodeIgniter\Model;


class ContactModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name', 'email', 'phone', 'address', 'gender', 'birthday', 'status', 'source', 'created_by', 'created_at', 'update_at', 'r_status','dphone','daddress','dbirthday','demail'];
    
}