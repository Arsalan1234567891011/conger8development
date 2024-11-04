<?php namespace App\Models;



use CodeIgniter\Model;


class FeedbackModel extends Model

{

    protected $table = 'feedback';

    protected $primaryKey = '	f_id';

   protected $allowedFields = ['f_id', 'feedback', 'uid`, `f_status', 'created_at', 'updated_at'];

    

}



