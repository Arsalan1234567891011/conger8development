<?php namespace App\Models;

use CodeIgniter\Model;


class ManageCheckinModel extends Model
{
    protected $table = 'manage_checkins';
    protected $primaryKey = 'mc_id';
    protected $allowedFields = ['mc_id', 'mc_title', 'mc_church_id', 'mc_link', 'mc_rstatus', 'mc_sysdate', 'mc_u_ref'];
}