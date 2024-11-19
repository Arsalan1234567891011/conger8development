<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
		'planfilter' => \App\Filters\Plan::class,
        'auth' => \App\Filters\Auth::class,
		'subscription' => \App\Filters\PlanFilter::class,
        'churchfilter' => \App\Filters\ChurchFilter::class,
        'contactprofilefilter' => \App\Filters\ContactprofileFilter::class,
        'interestsfilter' => \App\Filters\InterestsFilter::class,
        'managecheckinsfilter' => \App\Filters\ManageCheckinsFilter::class,
        'attendancelogfilter' => \App\Filters\AttendanceLogFilter::class,
        'decisioncardfilter' => \App\Filters\decisioncardfilter::class,
        'integrationfilter' => \App\Filters\IntegrationFilter::class,
        'adduserfilter' => \App\Filters\adduserfilter::class,
        'taskfilter' => \App\Filters\TaskFilter::class,
        'notesfilter' => \App\Filters\NotesFilter::class,
        'savemanagefilter' => \App\Filters\SaveManageFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
		
		'planfilter' => [
		  'except' => ['/signup/resendemail','/Churches/seessionSave','stripe/bill','plandetail','signup/verifyotp','login','getpackagesbytime','logout','/signup/verificationEmail','Signup/verifyemail/*','payment/*','stripe/create-charge','viewchurch','signupsubscription','save_view_church','church_detail','signup','signup/save','reset/verify/*','/reset','recover-password','public-contact','signup/verify/*','reset/verify/*','reset','savenewpassword','addexternalcontact','adddecisioncard','contactcurlapi','api/survey','api/request_api','api/check_in','api/baptism_request'],
            ],
			
			
		   'auth' => [
                'except' => ['stripe/bill','login','Signup/verifyemail/*','signup','signup/save','/reset','reset/verify/*','recover-password','public-contact','signup/verify/*','reset/verify/*','reset','savenewpassword','addexternalcontact','adddecisioncard','contactcurlapi','api/survey','api/request_api','api/check_in','api/baptism_request'],
            ],
		 
	

            'churchfilter' => [
                'except' => ['/signup/resendemail','/Churches/seessionSave','stripe/bill','plandetail','signup/verifyotp','login','savenewpassword','church_detail','Signup/verifyemail/*','signup','signup/save','/reset','reset/verify/*','recover-password','payment/*','stripe/create-charge','viewchurch','save_view_church','getpackagesbytime','getplanid','logout','api/survey_final','signup/verify/*','addexternalcontact','adddecisioncard','contactcurlapi','api/survey','api/request_api','api/check_in','api/baptism_request'],
            ],
			
			 'subscription' => [
                'except' => [],
            ],
			
			
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}
