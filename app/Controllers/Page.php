<?php
namespace App\Controllers;


class Page extends BaseController
{


	public function comingsoon(){


		$data['title']="Dashboard||Admin panel"; 

		echo view('/include/head',$data); 
		echo view('/include/topheader',$data); 
		echo view('/include/sidenavbar',$data); 
		echo view('page/comingsoon'); 
		echo view('/include/footer');

	}

}