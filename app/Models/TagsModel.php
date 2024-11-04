<?php namespace App\Models;

use CodeIgniter\Model;


class TagsModel extends Model
{
    protected $table = 'tbl_tags';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'contact_id', 'tags', 'r_status'];
    
}