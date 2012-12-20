<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class boiteController extends CI_Controller {

	public function __construct()
   {
		parent::__construct();
		if($this->uri->segment(2, 0) != "displayBoite"){
			if(!isLogged()){
				redirect("userController/signIn");
			}
		}
		includeLang();
   }

	public function index()
	{
		
		$user = $this->session->userdata('user_data');

		if($user['isBrand']==0){
			$this->load->model("boiteModel");
			$param = array(
				'userType' => 'back',
				'mainContent' => 'mesBoites',
				'title' => 'Mesboites',
				'boites' => $this->boiteModel->getBoiteByUser($user['idUser']),
				'boitesContributor' => $this->boiteModel->getMyBoiteContributor($user['idUser']),
				'boitesReceiver' => $this->boiteModel->getMyReceiverBoite($user['idUser'])
			);
		}else{
			$this->load->model("boiteBrandModel");
			$param = array(
				'userType' => 'back',
				'mainContent' => 'mesBoitesBrand',
				'title' => 'Mesboites',
				'boites' => $this->boiteBrandModel->getBoiteBrandByUser($user['idUser']),
			);
		}
		$this->load->view('template', $param);
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
				$idNewUser = $getUser->idUser;
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
			$user = $this->session->userdata('user_data');
			$this->load->library('email');
			$this->email->from('no-reply@backwards.fr', $user['prenom'].' '.$user['nom']);
			$this->email->to($this->input->post('emailRecever')); 
			$this->email->subject($user['prenom'].' '.$user['nom'].' vous offre une capsule temporelle...');
			$this->email->message($user['prenom'].' '.$user['nom'].' vous offre une capsule temporaire avec ce message : blablabla, venez la decouvrir ici');	
			$this->email->send();

			// On cree la boite avec toutes les informations necessaires...
			$this->load->model("boiteModel");
			// on crée les datas qu'on envvera au model dans un tableau
			if(isset($user['idFb'])){
				$data['idOwnerFB'] = $user['idFb'];
			}
			$data = array(
				'nomBoite' => $this->input->post('nomBoite'),
				'coordX' => $this->input->post('coordX'),
				'coordY' => $this->input->post('coordY'),
				'description' => $this->input->post('description'),
				'targetDate' => date("Y-m-d", strtotime($this->input->post('targetDate'))),
				'idOwner' => $user['idUser'],
				'idReceiver' => $idNewUser,
				'adresse' => $this->input->post('receverAddress'),
				'codePostal' => $this->input->post('receverZipCode'),
				'ville' => $this->input->post('receverCity'),
			);
			$this->boiteModel->addBoite($data);

			redirect("boiteController");
		}
	} //end create

	//modifier la boite
	function update($id)
	{
		$this->load->model("boiteModel");
		$this->load->model("userModel");
		$boite = $this->boiteModel->getBoite($id);
		$user = $this->session->userdata('user_data');
		$contributors = $this->boiteModel->getAllContributors($id);

		if($boite->idOwner == $user['idUser']){
			// L'utilisateur est le propriétaire de la boite

			
			$this->load->library('form_validation');

			$this->form_validation->set_rules('nomBoite', 'Nom de la boite', 'trim|required|xss_clean|max_length[50]');
			$this->form_validation->set_rules('coordX', 'Coordonées X', 'trim|required|xss_clean');
			$this->form_validation->set_rules('coordY', 'Coordonées Y', 'trim|required|xss_clean');
			$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('targetDate', 'Date d\'ouverture potentielle', 'trim|required|xss_clean');
			$this->form_validation->set_rules('receverAddress', 'Adresse postale du destinataire', 'trim|required|xss_clean');
			$this->form_validation->set_rules('receverCity', 'Ville du destinataire', 'trim|required|xss_clean');
			$this->form_validation->set_rules('receverZipCode', 'Code Postal du destinataire', 'trim|required|xss_clean');
			$this->form_validation->set_rules('emailContributor', 'Adresse mail du contributeur', 'trim|xss_clean|valid_email');

			if ($this->form_validation->run() == FALSE){
				
				$param = array(
					'userType' => 'back',
					'mainContent' => 'editBoite',
					'title' => 'Modifier la boite',
					'boite' => $boite,
					'contributors' => $contributors,
					'user' => $this->userModel->getUserById($boite->idReceiver)
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
				'targetDate' => date("Y-m-d", strtotime($this->input->post('targetDate'))),
				'adresse' => $this->input->post('receverAddress'),
				'codePostal' => $this->input->post('receverZipCode'),
				'ville' => $this->input->post('receverCity'),
			);
			$this->boiteModel->updateBoite($id, $data);


			// Si contributeur
			$emailContributor = $this->input->post('emailContributor');
			if($emailContributor != ''){
				// Ajout des relations dans la bdd
				$this->addContributor($emailContributor, $id);
			}

				redirect("boiteController");
			}

		}else{
			// L'utilisateur est un contributeur


			$param = array(
					'userType' => 'back',
					'mainContent' => 'editBoite',
					'title' => 'Modifier la boite',
					'boite' => $boite,
					'contributors' => $contributors,
					'user' => $this->userModel->getUserById($boite->idReceiver)
				);
			$this->load->view('template', $param);

		}
	}

	// Supprime une boite en fonction de son id
	function delete($idBoite){
		$this->load->model("boiteModel");
		$this->boiteModel->deleteBoite($idBoite);
		redirect(base_url().'boiteController');
	}

	function openBoite($idBoite){
		$this->load->model("boiteModel");
		$boite = $this->boiteModel->getBoite($idBoite);
		
		$param = array(
			'userType' => 'back',
			'mainContent' => 'radar',
			'title' => 'Chercher la boite',
			'boite' => $boite
		);
		$this->load->view('template', $param);
	}

	function updateStatus($id){
		$this->load->model("boiteModel");
		$data = array('statut' => 2);
		$this->boiteModel->updateBoite($id, $data);
	}

	function addContributor(){

		$email = $this->input->post("email");
      	$idBoite = $this->input->post("idBoite");


		$this->load->model('userModel');
		$this->load->model('boiteModel');
		$contributeur = $this->userModel->getUser($email);
		$user = $this->session->userdata('user_data');
		if(!empty($contributeur)){
			$data = array(
				'idBoite' => $idBoite,
				'idUser' => $contributeur->idUser
			);
			$this->boiteModel->addContributor($data);
			// Envoi d'un mail au contributeur
			$this->load->library('email');
			$this->email->from('no-reply@backwards.fr', $contributeur->prenom.' '.$contributeur->nom);
			$this->email->to($contributeur->email); 
			$this->email->subject($user['prenom'].' '.$user['nom'].' vous invite à créer une capsule temporelle...');
			$this->email->message($contributeur->prenom.' '.$contributeur->nom." vous invite à vréer une capsule temporaire connectez vous à Backwards pour l'aider à remplir sa boite");
			$this->email->send();

			$status = "success";
			$msg = "Le contributeur à bien été ajouté";
		}else{
			// le contributeur n'existe pas dans la bdd pb a resoudre
			$status = "error";
			$msg = "Cet utilisateur n'est pas inscrit";
		}
		echo json_encode(array('status' => $status, 'msg' => $msg));
	}

	function getContributorsByIdBoite($idBoite){
		$this->load->model('boiteModel');
		$contributors = $this->boiteModel->getAllContributors($idBoite);
		$this->load->view('back/contributors', array('contributors' => $contributors));
	}

	function displayBoite($idBoite){
		$this->load->model('boiteModel');
		$boite = $this->boiteModel->getBoite($idBoite);
		$contributeurs = $this->boiteModel->getAllContributors($idBoite);

		$param = array(
			'userType' => 'back',
			'mainContent' => 'display',
			'title' => $boite->nomBoite,
			'boite' => $boite,
			'contributeurs' => $contributeurs
		);
		$this->load->view('template', $param);
	}


	function createBoiteBrand(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nomBoite', 'Nom de la boite', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('coordX', 'Coordonées X', 'trim|required|xss_clean');
		$this->form_validation->set_rules('coordY', 'Coordonées Y', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('targetDate', 'Date d\'ouverture potentielle', 'trim|required|xss_clean');
		$this->form_validation->set_rules('emailRecever', 'Adresse mail du destinataire', 'trim|required|xss_clean|valid_email');
		
		if ($this->form_validation->run() == FALSE)
		{
			$param = array(
				'userType' => 'back',
				'mainContent' => 'create_boite_brand',
				'title' => 'Créer une boite',
			);
			$this->load->view('template', $param);
		}
		else  //si 	le formulaire à correctement été rempli
		{
			$user = $this->session->userdata('user_data');
			$this->load->model("userBrandModel");
			$userBrand = $this->userBrandModel->getUserBrand($this->input->post('emailRecever'));

			// On envoi le mail au destinataire
			$this->load->library('email');
			$this->email->from('no-reply@backwards.fr', $user['prenom']);
			$this->email->to($this->input->post('emailRecever')); 
			$this->email->subject($user['prenom'].' vous offre une capsule temporelle...');
			$this->email->message($user['prenom'].' vous offre une capsule temporaire avec ce message : blablabla, venez la decouvrir ici');	
			$this->email->send();

			// On cree la boite avec toutes les informations necessaires...
			$this->load->model("boiteBrandModel");
			// on crée les datas qu'on envvera au model dans un tableau
			$data = array(
				'nomBoite' => $this->input->post('nomBoite'),
				'coordX' => $this->input->post('coordX'),
				'coordY' => $this->input->post('coordY'),
				'description' => $this->input->post('description'),
				'targetDate' => date("Y-m-d", strtotime($this->input->post('targetDate'))),
				'idOwner' => $user['idUser']
			);
			$idBoiteBrand = $this->boiteBrandModel->addBoiteBrand($data);
			
			// on crée les datas qu'on envvera au model dans un tableau
			$data = array(
				'idBoiteBrand' => $idBoiteBrand,
				'idUserBrand' => $userBrand->idUser,
				'code' => $this->input->post('code')
			);
			$this->boiteBrandModel->addPool($data);

			redirect("boiteController");
		}
	}

	function updateBoiteBrand($idBoiteBrand){
		$this->load->model("boiteBrandModel");
		$this->load->model("userBrandModel");
		$boite = $this->boiteBrandModel->getBoiteBrand($idBoiteBrand);
		$user = $this->session->userdata('user_data');

		if($boite->idOwner == $user['idUser']){
			// L'utilisateur est le propriétaire de la boite

			
			$this->load->library('form_validation');

			$this->form_validation->set_rules('nomBoite', 'Nom de la boite', 'trim|required|xss_clean|max_length[50]');
			$this->form_validation->set_rules('coordX', 'Coordonées X', 'trim|required|xss_clean');
			$this->form_validation->set_rules('coordY', 'Coordonées Y', 'trim|required|xss_clean');
			$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('targetDate', 'Date d\'ouverture potentielle', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE || $_FILES['mailing']['error'] == 4){
				
				$param = array(
					'userType' => 'back',
					'mainContent' => 'editBoiteBrand',
					'title' => 'Modifier la boite',
					'boite' => $boite
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
					'targetDate' => date("Y-m-d", strtotime($this->input->post('targetDate'))),
					'idOwner' => $user['idUser'],
				);
				$this->boiteBrandModel->updateBoiteBrand($idBoiteBrand, $data);
				$file_element_name = 'mailing';
				$config['upload_path'] = './files/temp';
		        $config['allowed_types'] = 'csv';
		        $config['max_size']  = 1024 * 20;
		        $config['encrypt_name'] = FALSE;
		        $this->load->library('upload', $config);
		        if (!$this->upload->do_upload($file_element_name)) {
		            $status = 'error';
		            $msg = $this->upload->display_errors('', '');
		        }
         		else
         		{
         			$data = $this->upload->data();
         			var_dump($data);
         			$brandTab = $this->parserCsv($data['full_path']);
         			$this->linkPool($brandTab, $idBoiteBrand);
         			unlink($data['full_path']);
         		}
				redirect("boiteController");
			}
		}
	}

	function deleteBoiteBrand($idBoiteBrand){
		$this->load->model("boiteBrandModel");
		$this->boiteBrandModel->deleteBoiteBrand($idBoiteBrand);
		redirect(base_url().'boiteController');
	}		

	function parserCsv($pathCsv){
		$this->load->library('getcsv');
		$this->load->library('email');
		$this->load->model("userBrandModel");

	 	$user = $this->session->userdata('user_data');
		$data = $this->getcsv->set_file_path(base_url()."files/test_email.csv")->get_array();
		return $data;
	}

	function linkPool($brandTab, $idBoiteBrand){
		$this->load->model('boiteBrandModel');
		$data = array(
			'idBoiteBrand' => $idBoiteBrand,
			'code' => '',
			'idUserBrand' => ''
		);
		foreach ($brandTab as $row) {
			$userBrand = $this->userBrandModel->getUserBrand($row['email']);
			$data['idUserBrand'] = $userBrand->idUser;
			$data['code'] = substr($userBrand->prenom, 0, 2).$userBrand->idUser;
			$this->boiteBrandModel->addPool($data);


			/*
			$this->email->from('no-reply@backwards.fr', $user['prenom']);
			$this->email->to($row['email']); 
			$this->email->subject($user['prenom'].' vous offre une capsule temporelle...');
			$this->email->message($user['prenom'].' vous offre une capsule temporaire avec ce message : blablabla, venez la decouvrir ici');	
			$this->email->send();
			*/
		}
	}


	function unlockBrand($code){
		$this->load->model('boiteBrandModel');
		$this->load->model('userBrandModel');
		$pool = $this->boiteBrandModel->getPool($code);
		$userBrand = $this->userBrandModel->getUserBrand($pool->idUserBrand);
		$boiteBrand = $this->boiteBrandModel->getBoiteBrand($pool->idBoiteBrand);
		$user = $this->session->userdata('user_data');
		var_dump($pool);
		if(sizeof($pool) > 0){
			$param = array(
				'userType' => 'back',
				'mainContent' => 'radar',
				'title' => 'Ouvrir la boite '.$user['prenom'],
				'userBrand' => $userBrand,
				'boiteBrand' => $boiteBrand
			);
		}
		$this->load->view('template', $param);

	}
}