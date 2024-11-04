<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\UserModel;
use App\Models\subscription_detail;

class PlanFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {echo  "sadsadasd";exit();
        if (session()->user_id == '') {
            return redirect()->to(base_url().'login');
            exit();
        }

       /* $UserModel = new UserModel();

        $count = $UserModel
        ->where('id', session()->user_id)
        ->where('user_plan =', 0)
        ->countAllResults();

        if ($count > 0) {
            return redirect()->to(base_url() . 'signupsubscription');
            exit;
        }
		*/
		$subcription_detail = new subscription_detail();
		$existing_plan = $subcription_detail
            ->where("subscription_end >", date("Y-m-d H:i:s"))
            ->where("status", "active")
            ->where("sd_church_id", session()->user_church_id)
            ->countAllResults();
		  if ($existing_plan == 0) {
            return redirect()->to(base_url() . 'signupsubscription');
            exit;
        }
		
		
       
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here

    }
}

