<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function index()
    {
        echo view('Auth/sign_in');
     
    }
    public function register()
    {

        echo view('Auth/register');
    
    }
    public function Forgetpassword()
    {
        echo view('Auth/forgetpassword');
    
    
    }
}