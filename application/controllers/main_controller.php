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
		$nbBoites = $nbBoites[0]->idBoite;
		$openBoites = $this->boiteModel->getAmountOfOpenBoite($nbBoites);
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
		/*
		$this->load->helper('cookie');
		if ($lang == 'fr') {           // si la langue est 'fr' (français) on inclut le fichier fr-lang.php
			include('lang/fr-lang.php');
		} elseif ($lang == 'en') {      // si la langue est 'en' (anglais) on inclut le fichier en-lang.php
			include('lang/en-lang.php');
		}

		$cookie = array(
			'name'   => 'lang',
			'value'  => $lang,
			'expire' => '86500',
		);

		set_cookie($cookie);
		redirect(base_url());
		*/
		setLanguage($lang);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */