<?php



namespace App\Controllers;

use App\Helpers\custom_helper;



class Dashboard extends BaseController

{
    public function index()
    {     
        $data['title']="Dashboard||Admin panel "; 
        $data['page']="Admin/dashboard"; 
        $data['link'] = [
            '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />',
            '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>',
            '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>',
            '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">',
            '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>',
            '<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">',
            '<link rel="stylesheet" href="' . base_url('public/Dashboard/style.css') . '">'
        ];   
        $data['footerlinks'] = [
            '<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>',
            '<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>',
            '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>',
            '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>',
            '<script src="' . base_url() . '/public/Dashboard/index.js"></script>',
        ];        
        echo view('/include/new/header',$data); 
        echo view('/include/new/sidenavbar',$data); 
        echo view('dashboard/index');
        echo view('/include/new/footer',$data); 

    }

    public function getvalues()
{
    $chr_id = $this->request->getPost('chr_id');
    $formatted_start_date= $this->request->getPost('start_date');
    $formatted_end_date= $this->request->getPost('end_date');
    if($formatted_start_date != "" && $formatted_end_date != ""){
        $start_date = date('Y-m-d', strtotime($formatted_start_date));
        $end_date= date('Y-m-d', strtotime($formatted_end_date));
    }else{
        $start_date = "";
        $end_date= "";
    }
    
    

    helper('custom_helper'); // Load the helper

    // Call the helper functions and store the results in variables
    $get_All_visitors = get_All_visitors($chr_id,$start_date,$end_date);
    $first_time_visitors = first_time_visitors($chr_id,$start_date,$end_date);
    $get_returning_visitors = get_returning_visitors($chr_id,$start_date,$end_date);
    $member_in_att = member_in_att($chr_id,$start_date,$end_date);

    // Calculate the sum of member_in_att and get_All_visitors
    $memberinattendance = $member_in_att +  $get_All_visitors;

    // Calculate the sum of member_in_att and get_All_visitors
    $memberinattendance = $member_in_att + $get_All_visitors;

    // Prepare the data array
    $data = [
        'get_All_visitors' => $get_All_visitors,
        'first_time_visitors' => $first_time_visitors,
        'get_returning_visitors' => $get_returning_visitors,
        'member_in_att' => $member_in_att,
        'memberinattendance' => $memberinattendance
    ];

    // Set the response content type to JSON
    header('Content-Type: application/json');

    // Return the data as a JSON-encoded response
    echo json_encode($data);
}

    
    

}