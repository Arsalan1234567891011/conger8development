<?php 

namespace App\Models;

use CodeIgniter\Model;

class TaskcommentModel extends Model

{
   
    protected $table = 'task_comments';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'task_id', 'user_id', 'comments', 'is_deleted'];

}


