<?php namespace App\Models;

use CodeIgniter\Model;


class NotesModel extends Model
{
    protected $table = 'notes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'type', 'userid', 'text','title', 'created_by', 'created_at', 'r_status', 'edit_by', 'assign_to','due_date'];
    
}