<?php 

namespace App\Models;

use CodeIgniter\Model;

class Billing extends Model

{
   
    protected $table = 'billing';

    protected $primaryKey = 'bl_id';

    protected $allowedFields = ['bl_id', 'bl_user', 'updated_at', 'created_at', 'bl_church', 'bl_parent'];

}


