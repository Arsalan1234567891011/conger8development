<?php namespace App\Models;

use CodeIgniter\Model;


class FormDetailModel extends Model
{
    protected $table = 'form_detail';
    protected $primaryKey = 'fd_id';
    protected $allowedFields = ['fd_id','fm_fd_ref', 'fd_title', 'fd_value', 'fd_status', 'fd_created_at'];
    
}