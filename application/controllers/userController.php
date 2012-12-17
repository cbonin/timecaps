<?php 

class userController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		echo 'Zboub userController';
	}

	function signUp()
	{

		// chargement de la librairie de gestion de formulaire
		$this->load->library('form_validation');

		// Application des regles de securite pour eviter les injections
		$this->form_validation->set_rules('prenom', 'Prénom', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('email', 'Adresse mail', 'trim|required|xss_clean|max_length[100]|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|xss_clean|matches[passwordConf]|md5');
		$this->form_validation->set_rules('passwordConf', 'confirmation mot de passe', 'trim|required|xss_clean|md5');

		// Tant que les regles ne sont pas respectees
		if ($this->form_validation->run() == FALSE)
		{
			$param = array(
				'userType' => 'front',
				'mainContent' => 'form_inscription',
				'title' => 'Inscription'
			);
			$this->load->view('template', $param);
		}
		else  // Si le formulaire à correctement ete rempli
		{

			// Donnees qui vont etre envoyees a la base de donnees
			$data = array(
				'nom' => $this->input->post('nom'),
				'email' => $this->input->post('email'),
				'prenom' => $this->input->post('prenom'),
				'password' => $this->input->post('password')
			);

			// Insertion du nouvel utilisateur
			$this->load->model("userModel");
			$this->userModel->addUser($data);

			$this->load->library('email');
			$this->email->from('no-reply@backwards.fr', 'Backwards');
			$this->email->to($emailContributor); 
			$this->email->subject('Bienvenue sur Backwards '.$user['prenom'].' !');
			$this->email->message("Vous vous êtes inscrit");
			$this->email->send();

			redirect(base_url());
		}

	}

	function signIn()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Adresse mail', 'trim|required|xss_clean|max_length[100]|valid_email');
		$this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE)
		{
			$param = array(
				'userType' => 'front',
				'mainContent' => 'loginView',
				'title' => 'Connexion'
			);
			$this->load->view('template', $param);
		}
		else  //Si le formulaire à correctement été rempli
		{
			$this->load->model('userModel');

			// Initialisation des variables	
			$email =  $this->input->post('email');
			$password =  md5($this->input->post('password'));
			$user = $this->userModel->getUser($email);

			// Si l'email est correct et si le mot de passe correspond
			if(!empty($user) && $password === $user[0]['password']){
				
				// Initialisations du tableau de donnees de session
				$data = array(
					'idUser' => $user[0]['idUser'],
					'prenom' => $user[0]['prenom'],
					'nom' => $user[0]['nom']
				);
				// Creation de la session
				$this->session->set_userdata('user_data', $data);
				redirect(base_url().'/boiteController');

			}else{ // Retente ta chance
				echo 'Mauvais login ou mauvais mot de passe';
				$param = array(
					'userType' => 'front',
					'mainContent' => 'loginView',
					'title' => 'Connexion'
				);
				$this->load->view('template', $param);
			}
		}
	}

	function signInFB(){ // connexion facebook
		$idFB = $this->input->post('id');
		$prenom = $this->input->post('prenom');
		$nom = $this->input->post('nom');
		$email = $this->input->post('email');
		if(!isset($idFB) && !isset($prenom) && !isset($nom) && !isset($email))
		{
			$data = array(
				'status' => 'error',
				'message' => 'La connexion Facebook à échoué'
			); 
			echo(json_encode($data));
		}
		else  //Si le formulaire à correctement été rempli
		{
			$this->load->model('userModel');

			// Initialisation des variables	
			$email =  $this->input->post('email');
			$user = $this->userModel->getUser($email);
			$connected = $this->session->userdata('user_data');
			// Si l'user possède déjà un compte
			if(!empty($user)){ 
				if($connected == ''){
					$data = array(
						'idUser' => $user[0]['idUser'],
						'prenom' => $user[0]['prenom'],
						'nom' => $user[0]['nom'],
						'idFb' => $idFB,
					);

					// Creation de la session
					$this->session->set_userdata('user_data', $data);
					$reponse = array('status' => 'connected', 'message', 'Vous êtes bien connecté');
					$this->output
					    ->set_content_type('application/json')
					    ->set_output(json_encode($reponse));
				}else{
					$reponse = array('status' => 'already connected', 'message', 'Vous êtes bien connecté');
					$this->output
					    ->set_content_type('application/json')
					    ->set_output(json_encode($reponse));
				}

			}else{ // on crée l'user à la volée si c'est sa premiere connexion

				$this->load->model("userModel");
				$password = md5($this->input->post('nom').time());
				$data = array(
					'nom' => $this->input->post('nom'),
					'email' => $this->input->post('email'),
					'prenom' => $this->input->post('prenom'),
					'password' => $password
				);
				$idUser = $this->userModel->addUser($data);

				$this->load->library('email');
				$this->email->from('no-reply-invite@backwards.fr', 'Backwards');
				$this->email->to($this->input->post('email')); 
				$this->email->subject('Votre compte Backwards à bien été créé');
				$this->email->message($this->input->post('prenom').' '.$this->input->post('nom')." votre compte à bien été créé. Vous pouvez dès à présent vous connecter en utiloisant Facebook ou en utilisant votre login/mot de passe : Login:".$this->input->post('email')." et mot de passe : ".$this->input->post('nom').time().". Nous vous conseilons vivement de changer votre mot de passe dès à présent. L'équipe Backwards :)");
				$this->email->send();

				$param = array(
					'idUser' => $idUser,
					'prenom' => $this->input->post('prenom'),
					'nom' => $this->input->post('nom'),
					'idFb' => $idFB,
				);

				// Creation de la session
				$this->session->set_userdata('user_data', $param);


			}
		}

	}

	function logout(){
		// Destruction de la session
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect(base_url());
	}

	function editAccount(){

		// chargement de la librairie de gestion de formulaire
		$this->load->library('form_validation');
		$this->load->model("userModel");
		$user = $this->session->userdata('user_data');

		// Application des regles de securite pour eviter les injections
		$this->form_validation->set_rules('prenom', 'Prénom', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('email', 'Adresse mail', 'trim|required|xss_clean|max_length[100]|valid_email');
		$this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|xss_clean|matches[passwordConf]|md5');
		$this->form_validation->set_rules('passwordConf', 'confirmation mot de passe', 'trim|required|xss_clean|md5');

		// Tant que les regles ne sont pas respectees
		if ($this->form_validation->run() == FALSE)
		{
			$user = $this->userModel->getUserById($user['idUser']);
			$param = array(
				'userType' => 'back',
				'mainContent' => 'editUser',
				'title' => 'Modification du compte',
				'user' => $user
			);
			$this->load->view('template', $param);
		}
		else  // Si le formulaire à correctement ete rempli
		{
			
			$data = array(
					'idUser' => $user['idUser'],
					'nom' => $this->input->post('nom'),
					'email' => $this->input->post('email'),
					'prenom' => $this->input->post('prenom'),
					'password' => $this->input->post('password')
				);
			$this->userModel->updateUser($data);

			$this->load->library('email');
			$this->email->from('no-reply@backwards.fr', 'Backwards');
			$this->email->to($emailContributor); 
			$this->email->subject('Modification de votre compte');
			$this->email->message("Compte modifié");
			$this->email->send();

			redirect(base_url().'/boiteController');
		}

	}
}
?>
