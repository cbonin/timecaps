<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		// gestion du multilangage
		$this->load->helper('cookie');
		$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
		$cookie = get_cookie('lang');
		if($cookie){
			$lang = $cookie;
		}

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
		var_dump($cookie);
		echo $lang;

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
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */