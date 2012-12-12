<?php 

class userController extends CI_Controller
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
			$this->load->view('form_inscription');
		}
		else  // Si le formulaire à correctement ete rempli
		{

			// Donnees qui vont etre envoyees a la base de donnees
			$data = array(
				'prenom' => $this->input->post('prenom'),
				'nom' => $this->input->post('nom'),
				'email' => $this->input->post('email'),
				'prenom' => $this->input->post('prenom'),
				'password' => $this->input->post('password')
			);

			// Insertion du nouvel utilisateur
			$this->load->model("userModel");
			$this->userModel->addUser($data);
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
			$this->load->view('loginView');
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
				var_dump($user);
				
				// Initialisations du tableau de donnees de session
				$data = array(
				'prenom' => $user[0]['prenom'],
				'nom' => $user[0]['nom']
				);

				// Creation de la session
				$this->load->library('session');
				$this->session->set_userdata($data);
				echo"Normalement t'as ta session gros malin";
				var_dump($this->session->all_userdata());

			}else{ // Retente ta chance
				echo 'Mauvais login ou mauvais mot de passe';
				$this->load->view('loginView');
			}
		}
	}

	function signOut(){
		// Destruction de la session
		$this->load->library('session');
		$this->session->sess_destroy();
		echo'Session détruite';
	}