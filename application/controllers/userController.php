<?php 

class User_controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		
	}

	function signUp()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('prenom', 'Prénom', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('email', 'Adresse mail', 'trim|required|xss_clean|max_length[100]|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|xss_clean|valid_email|md5|matches[passwordConf]');
		$this->form_validation->set_rules('passwordConf', 'confirmation mot de passe', 'trim|required|xss_clean|valid_email|md5');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('myform');
		}
		else
		{
			$this->load->view('formsuccess');
		}

	}

	function signIn()
	{
		
	}
}