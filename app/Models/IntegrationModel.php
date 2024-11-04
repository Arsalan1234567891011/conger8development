<?php namespace App\Models;

use CodeIgniter\Model;


class IntegrationModel extends Model
{
    protected $table = 'integration';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'church_id', 'many_chat', 'key_value', 'user_id', 'entry_date', 'rstatus'];
    
}