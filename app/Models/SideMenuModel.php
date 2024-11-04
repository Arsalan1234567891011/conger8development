<?php namespace App\Models;



use CodeIgniter\Model;





class SideMenuModel extends Model

{

    protected $table = 'side_menu';

    protected $primaryKey = 'menu_id';

    protected $allowedFields = ['menu_id', 'parent', 'title', 'icon', 'url', 'isactive', 'sorting'];

    

}



