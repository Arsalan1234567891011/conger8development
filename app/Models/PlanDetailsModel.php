<?php 

namespace App\Models;

use CodeIgniter\Model;

class PlanDetailsModel extends Model

{
    
   
    protected $table = 'plan_detail';

    protected $primaryKey = 'pd_id';

    protected $allowedFields = ['pd_id', 'pd_pm_ref', 'pd_po_ref', 'pd_isactive', 'pd_user_ref', 'pd_isdeleted', 'pd_sysdata','pd_po_quantity'];

}


