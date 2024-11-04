<?php namespace App\Models;

use CodeIgniter\Model;


class SurveySubmissionModel extends Model
{
    protected $table = 'survey_submission';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'manychat_id', 'church_id', 'contact_id', 'title', 'createdate', 'type', 'status', 'rstatus'];
    
}