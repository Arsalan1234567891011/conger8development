<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\subscription;

class Plan implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->user_id == "") {
            return redirect()->to(base_url() . "login");
            exit();
        }
        if (session()->user_id != "1") {
            $subscription = new subscription();
            $subscriptionCount = $subscription
                ->where("church_id", session()->get("user_church_id"))
                ->where("plan_rstatus", "Y")
                ->where("plan_status", "Y")
                ->countAllResults();

            if ($subscriptionCount == "0") {
                return redirect()->to(base_url() . "signupsubscription");
                exit();
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        // Do something here
    }
}
