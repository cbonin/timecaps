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
		$this->load->model('boiteModel');
		$nbBoites = $this->boiteModel->getAmountOfBoite()[0]->idBoite;
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */