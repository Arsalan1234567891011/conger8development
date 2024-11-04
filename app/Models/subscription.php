<?php 

namespace App\Models;

use CodeIgniter\Model;

class subscription extends Model

{
   
    protected $table = 'Plan_Subscription';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'user_id', 'plan_id','church_id','plan_start','plan_end', 'plan_type','plan_amount', 'plan_status', 'plan_rstatus'];

}


