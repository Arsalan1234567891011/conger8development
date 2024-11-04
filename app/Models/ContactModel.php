<?php namespace App\Models;

use CodeIgniter\Model;


class ContactModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'manychat_id', 'parent', 'name', 'email', 'phone','phone_old', 'address', 'gender', 'birthday', 'status', 'language', 'timezone', 'live_chat_url', 'subscribed', 'source', 'created_by', 'created_at', 'update_at', 'r_status', 'form_type', 'picture', 'church_id'];
    
}