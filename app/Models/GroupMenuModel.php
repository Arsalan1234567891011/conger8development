<?php namespace App\Models;



use CodeIgniter\Model;





class GroupMenuModel extends Model

{

    protected $table = 'group_menu';

    protected $primaryKey = 'group_menu_id';

    protected $allowedFields = ['group_menu_id', 'group_id', 'sidebarmenu_id', 'isactive', 'created_at'];

    

}



