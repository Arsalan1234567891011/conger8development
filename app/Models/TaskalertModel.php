<?php 

namespace App\Models;

use CodeIgniter\Model;

class TaskalertModel extends Model

{
   
    protected $table = 'tbl_task_alert';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'user', 'is_read', 'message', 'taskid', 'sysdate', 'isdeleted'];

}


