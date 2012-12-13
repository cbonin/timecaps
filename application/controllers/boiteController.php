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
			$param = array(
				'userType' => 'back',
				'mainContent' => 'create_boite',
				'title' => 'Création'
			);
			$this->load->view('template', $param);
		}
		else  //si 	le formulaire à correctement été rempli
		{
			
			$this->load->model("userModel");

			// On cree user fantome qui recevra la boite avec un mot de passe temporaire qu'il recevra par mail
			$password = md5($this->input->post('receverFirstName').time());
			$dataUser = array(
				'prenom' => $this->input->post('receverFirstName'),
				'nom' => $this->input->post('receverName'),
				'email' => $this->input->post('emailRecever'),
				'password' => $password,
				'adresse' => $this->input->post('receverAddress'),
				'codePostal' => $this->input->post('receverZipCode'),
				'ville' => $this->input->post('receverCity'),
			);
			$idNewUser = $this->userModel->addUser($dataUser); //la metohde nous renvoie du nouvel user

			// TODO: ENVOYER MAIL USER FANTOME

			// On cree la boite avec toutes les informations necessaires...
			$this->load->model("boiteModel");
			$data = array( // on crée les datas qu'on envvera au model dans un tableau
				'nomBoite' => $this->input->post('nomBoite'),
				'coordX' => $this->input->post('coordX'),
				'coordY' => $this->input->post('coordY'),
				'description' => $this->input->post('description'),
				'targetDate' => $this->input->post('targetDate'),
				'idOwner' => 2,
				'idReceiver' => $idNewUser,
			);
			$this->boiteModel->addBoite($data);
			redirect(base_url());
		}
	}

	// Supprime une boite en fonction de son id
	function delete($idBoite){
		$this->load->model("boiteModel");
		$this->boiteModel->delete($idBoite);
	}
/*
	function unlockBoite($idBoite, $geoloc){
		$currentTime = time();
		$geoX = $geoloc['coordX'];
		$geoY = $geoloc['coordY'];
	}
*/
}