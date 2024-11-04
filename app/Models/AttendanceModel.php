<?php namespace App\Models;



use CodeIgniter\Model;





class AttendanceModel extends Model

{

    protected $table = 'tab_attandance';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'church_id', 'contact_id', 'check_in','entered_by', 'rstatus', 'datetime'];

    

}



