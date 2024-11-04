<?php 

namespace App\Models;

use CodeIgniter\Model;

class PlanModel extends Model

{
   
    protected $table = 'plan_master';

    protected $primaryKey = 'pm_id';

    protected $allowedFields = ['pm_id', 'pm_title', 'pm_price','pm_yearly','pm_lifetime', 'pm_currency', 'pm_color', 'pm_isactive', 'pm_user_ref', 'pm_isdelete', 'pm_sysdate'];

}


