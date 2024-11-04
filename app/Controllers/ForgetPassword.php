<?php

namespace App\Controllers;

class ForgetPassword extends BaseController
{
    public function index()
    {
        echo view('Auth/forgetpassword');
    
    
    }
}