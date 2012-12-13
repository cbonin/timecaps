<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class boiteController extends CI_Controller {

	public function index()
	{
		echo "boite controller biatch";
	}

	function listBoite(){
			
	}

	function create()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nomBoite', 'Nom de la boite', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('coordX', 'Coordonées X', 'trim|required|xss_clean');
		$this->form_validation->set_rules('coordY', 'Coordonées Y', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('targetDate', 'Date d\'ouverture potentielle', 'trim|required|xss_clean');
		$this->form_validation->set_rules('emailRecever', 'Adresse mail du destinataire', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('receverName', 'Nom du destinataire', 'trim|required|xss_clean');
		$this->form_validation->set_rules('receverLastName', 'Prénom du destinataire', 'trim|required|xss_clean');
		$this->form_validation->set_rules('receverAddress', 'Adresse postale du destinataire', 'trim|required|xss_clean');
		$this->form_validation->set_rules('receverCity', 'Ville du destinataire', 'trim|required|xss_clean');
		$this->form_validation->set_rules('receverZipCode', 'Code Postal du destinataire', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$param = array(
				'userType' => 'back',
				'mainContent' => 'create_boite',
				'title' => 'Créer une boite',
			);
			$this->load->view('template', $param);
		}
		else  //si 	le formulaire à correctement été rempli
		{
			$this->load->model("userModel");
			$getUser = $this->userModel->getUser($this->input->post('emailRecever')); // on verifie si email existe dans notre base user

			if(!empty($getUser)){ // si elle existe, on attribut la boite a id iser correspondant a email sinon on cree user fantome
				$idNewUser = $getUser[0]["idUser"];
			}else{
				// On cree user fantome qui recevra la boite avec un mot de passe temporaire qu'il recevra par mail
				$password = md5($this->input->post('receverFirstName').time());
				$dataUser = array(
					'prenom' => $this->input->post('receverLastName'),
					'nom' => $this->input->post('receverName'),
					'email' => $this->input->post('emailRecever'),
					'password' => $password,
				);
				$idNewUser = $this->userModel->addUser($dataUser); //la metohde nous renvoie du nouvel user
			}

			// On envoi le mail au destinataire

			$this->load->library('email');
			$this->email->from('no-reply@backwards.fr', 'Backwards');
			$this->email->to($this->input->post('emailRecever')); 
			$this->email->subject('Nom Prenom vous offre une capsule temporelle...');
			$this->email->message('Nom prénom vous offre une capsule temporaire avec ce message : blablabla, venez la decouvrir ici');	
			$this->email->send();

			// On cree la boite avec toutes les informations necessaires...
			$this->load->model("boiteModel");
			$data = array( // on crée les datas qu'on envvera au model dans un tableau
				'nomBoite' => $this->input->post('nomBoite'),
				'coordX' => $this->input->post('coordX'),
				'coordY' => $this->input->post('coordY'),
				'description' => $this->input->post('description'),
				'targetDate' => $this->input->post('targetDate'),
				'idOwner' => 3,
				'idReceiver' => $idNewUser,
				'adresse' => $this->input->post('receverAddress'),
				'codePostal' => $this->input->post('receverZipCode'),
				'ville' => $this->input->post('receverCity'),
			);
			$this->boiteModel->addBoite($data);
			redirect(base_url());
		}
	}

	//modifier la boite
	function update($id)
	{
		$this->load->model("boiteModel");
		$this->load->model("userModel");
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nomBoite', 'Nom de la boite', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('coordX', 'Coordonées X', 'trim|required|xss_clean');
		$this->form_validation->set_rules('coordY', 'Coordonées Y', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('targetDate', 'Date d\'ouverture potentielle', 'trim|required|xss_clean');
		$this->form_validation->set_rules('receverAddress', 'Adresse postale du destinataire', 'trim|required|xss_clean');
		$this->form_validation->set_rules('receverCity', 'Ville du destinataire', 'trim|required|xss_clean');
		$this->form_validation->set_rules('receverZipCode', 'Code Postal du destinataire', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$boite = $this->boiteModel->getBoite($id);
			$param = array(
				'userType' => 'back',
				'mainContent' => 'editBoite',
				'title' => 'Modifier la boite',
				'boite' => $boite,
				'user' => $this->userModel->getUserById($boite[0]['idReceiver']),
			);
			$this->load->view('template', $param);
		}
		else  //si 	le formulaire à correctement été rempli
		{
			$data = array(
				'nomBoite' => $this->input->post('nomBoite'),
				'coordX' => $this->input->post('coordX'),
				'coordY' => $this->input->post('coordY'),
				'description' => $this->input->post('description'),
				'targetDate' => $this->input->post('targetDate'),
				'adresse' => $this->input->post('receverAddress'),
				'codePostal' => $this->input->post('receverZipCode'),
				'ville' => $this->input->post('receverCity'),
			);
			$this->boiteModel->updateBoite($id, $data);
			redirect(base_url());
		}
	}

	// Supprime une boite en fonction de son id
	function delete($idBoite){
		$this->load->model("boiteModel");
		$this->boiteModel->delete($idBoite);
	}

	function openBoite($idBoite){
		$this->load->model("boiteModel");
		
		$param = array(
			'userType' => 'back',
			'mainContent' => 'radar',
			'title' => 'Chercher la boite',
			'boite' => $this->boiteModel->getBoite($idBoite)
		);
		$this->load->view('template', $param);
	}

	function updateStatus($id){
		$this->load->model("boiteModel");
		$data = array('statut' => 2);
		$this->boiteModel->updateBoite($id, $data);
	}

}