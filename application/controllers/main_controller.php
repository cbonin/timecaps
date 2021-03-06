<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main_controller extends CI_Controller {

	public function __construct()
   {
      parent::__construct();
      includeLang();
   }
	
	public function index()
	{

		$this->load->model('boiteModel');
		$nbBoites = $this->boiteModel->getAmountOfBoite();
		if(isset($nbBoites->idBoite)){
			$nbBoites = $nbBoites->idBoite;
			$openBoites = $this->boiteModel->getAmountOfOpenBoite($nbBoites);
		}else{
			$nbBoites = 0;
			$openBoites = 0;
		}
		
		$param = array(
			'userType' => 'front',
			'mainContent' => 'home',
			'title' => 'Backwards ',
			'nbBoites' => $nbBoites,
			'openBoites' => $openBoites
		);
		$this->load->view('template', $param);
	}

	function setLanguage($lang){
		setLanguage($lang);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */