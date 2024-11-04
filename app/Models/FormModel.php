<?php namespace App\Models;

use CodeIgniter\Model;


class FormModel extends Model
{
    protected $table = 'form';
    protected $primaryKey = 'form_id';
    protected $allowedFields = ['form_id','ID', 'Title', 'code', 'Slug', 'Status', 'user_id','church_id','ConfirmationMessage', 'Theme', 'f_status', 'DateAdded', 'NotificationEmail', 'ExtendedProperties'];
    
}