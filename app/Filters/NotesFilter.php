<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\ChurchModel;
use App\Models\UserModel;

class NotesFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

            if (session()->user_id == '') {
                return redirect()->to(base_url().'login');
                exit();
            }

            $db      = \Config\Database::connect();

            $sql = "SELECT user_plan from users where id = ".session()->user_id." ";        
            //return $sql;
            $query = $db->query($sql);        
            $row = $query->getRow(); 
            if($row){
                $user_plan = $row->user_plan;
            }else{
                $user_plan = 0;
            }

           $sql = "SELECT pd_po_quantity 
            FROM plan_detail 
            WHERE pd_pm_ref = ".$user_plan." AND pd_po_ref = 4 AND pd_isdeleted = 'Y'";   
            //return $sql;
            $query = $db->query($sql);        
            $row = $query->getRow(); 
            $pd_po_quantity = $row->pd_po_quantity;
            
            $query = $db->table('notes')
            ->select('COUNT(*) as contact_count')
            ->where('created_by', session()->user_id)
            ->where('type', 'Notes')
            ->get();

            $result = $query->getRow();
            $contact_count = $result->contact_count;
            // var_dump($pd_po_quantity);
            // exit;
            if ($contact_count >= $pd_po_quantity) {
                return redirect()->to(base_url() . 'upgradeplan');
                exit;
            }

            
          
           


       
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}

