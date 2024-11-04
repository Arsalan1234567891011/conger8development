<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\ChurchModel;
use App\Models\UserModel;

class IntegrationFilter implements FilterInterface
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

            $sql = "SELECT *
            FROM plan_detail 
            WHERE pd_pm_ref = ".$user_plan." AND pd_po_ref = 29 AND pd_isdeleted = 'Y'";   
            //return $sql;
            $query = $db->query($sql);        
            $row = $query->getRow(); 
           
             if(empty($row))
             {
                 return redirect()->to(base_url() . 'upgradeplan');
                 exit;
             }
            
          
           


       
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}

