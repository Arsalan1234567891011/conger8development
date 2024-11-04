<?php namespace App\Models;

use CodeIgniter\Model;


class FormMainModel extends Model
{
    protected $table = 'form_main';
    protected $primaryKey = 'fm_id';
    protected $allowedFields = ['fm_id','form_id', 'session_id', 'fm_status', 'fm_created_at'];
    
}