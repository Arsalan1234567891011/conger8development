<?php 

namespace App\Models;

use CodeIgniter\Model;

class PlanOptionModel extends Model

{
   
    protected $table = 'plan_option';

    protected $primaryKey = 'po_id';

    protected $allowedFields = ['po_id', 'po_title', 'po_isactive', 'po_user_ref', 'po_delete', 'po_sysdate'];

}


