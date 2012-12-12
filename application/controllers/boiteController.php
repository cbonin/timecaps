<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class boiteController extends CI_Controller {

	public function index()
	{
		echo "boite controller biatch";
	}

	function create()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nomBoite', 'Nom de la boite', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('coordX', 'Coordonées X', 'trim|required|xss_clean');
		$this->form_validation->set_rules('coordY', 'Coordonées Y', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('targetDate', 'Date d\'ouverture potentielle', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('create_boite');
		}
		else  //si le formulaire à correctement été rempli
		{
			$data = array( // on crée les datas qu'on envvera au model dans un tableau
				'nomBoite' => $this->input->post('nomBoite'),
				'coordX' => $this->input->post('coordX'),
				'coordY' => $this->input->post('coordY'),
				'description' => $this->input->post('description'),
				'targetDate' => $this->input->post('targetDate'),
				'idOwner' => 2
			);
			$this->load->model("userModel");
			$dataUser = array(
				'prenom' => $this->input->post('receverFirstName'),
				'nom' => $this->input->post('receverName'),
				'email' => $this->input->post('emailRecever'),
			);
			$this->load->model("boiteModel");
			$this->boiteModel->addBoite($data);
			redirect(base_url());
		}



	}
}