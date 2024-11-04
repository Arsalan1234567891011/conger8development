<?php namespace App\Models;



use CodeIgniter\Model;





class ChurchModel extends Model

{

    protected $table = 'manage_church';

    protected $primaryKey = 'id';

   protected $allowedFields = ['id', 'parentid', 'church_name', 'church_email','phone', 'website', 'address', 'pastor_name','time_zone','verify_link','default_church','rstatus','att_link','is_filled','plan_id'];

    

}



