<?php namespace App\Models;

use CodeIgniter\Model;


class DecisioncardModel extends Model
{
    protected $table = 'decision_card';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','pastoral_visit','prayer', 'first_name', 'last_name', 'address', 'phone', 'email', 'prayer_request', 'bible_study', 'baptism', 'churchid', 'createdat', 'isdeleted'];
    
}