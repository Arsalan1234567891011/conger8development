<?php 

namespace App\Models;

use CodeIgniter\Model;

class subscription_detail extends Model

{
   
    protected $table = 'Subscription_detail';

    protected $primaryKey = 'sd_id';

    protected $allowedFields = ['sd_id','sd_txrid','status','sd_church_id', 'sd_palnid', 'sd_subscriptionid', 'custmer_id','sd_amount', 'sd_intervaltype', 'sd_interval','trial_period','subscription_end','created_at', 'updated_at'];

}


