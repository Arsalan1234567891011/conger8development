<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\ChurchModel;
use App\Models\UserModel;

class ChurchFilter implements FilterInterface
{



public function before(RequestInterface $request, $arguments = null)
{
	
    if (session()->user_id == '') {
        return redirect()->to(base_url() . 'login');
        exit();
    }

    // Get the user's role
    $db = \Config\Database::connect();
    $sql = "SELECT church_id, role FROM users WHERE id = " . session()->user_id;
    $query = $db->query($sql);
    $row = $query->getRow();

    if ($row) {
        $role = $row->role;
        $church_id = $row->church_id;
    } else {
        $role = ''; // Set the role to an empty string if the user is not found
        $church_id = 0;
    }

    if ($role === 'churchadmin') {
        // User has the role 'churchadmin'
        $ChurchModel = new ChurchModel;
            $count = $ChurchModel
                ->where('id', $church_id)
                ->where('is_filled', 0)
                ->countAllResults();

            if ($count > 0) {
                return redirect()->to(base_url() . 'viewchurch');
                exit;
            }

            $UserModel = new UserModel();

            $count = $UserModel
            ->where('id', session()->user_id)
            ->where('user_plan =', 0)
            ->where('parent =', 0)

            ->countAllResults();

            if ($count > 0) {
                return redirect()->to(base_url() . 'signupsubscription');
                exit;
            }
    } 
}










    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}

