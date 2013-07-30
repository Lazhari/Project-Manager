<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Classe Projet
 *Date: 28/06/2012
 *@author Lazhari Mohammed <lazharimohammed@gmail.com>
 *@ copyright ENI 2012
 *@licence GNU GPL 3.0
 *@version 0.1
 *@package Projet
 */
class Projet extends CI_Controller {
	/**
	 * Constructeur 
	 *@param none
	 *@access public
	 */
	public function __construct()
	{
		//chargement du constructeur mére 
		parent::__construct();
		//chargement des modules 
		$this->load->model('connexion_model','connexionManager');
		$this->load->model('projet_model','projetManager');
		$this->load->model('profil_model','profilManager');
		//Vérification d'existance des variable session 
		if( !$this->session->userdata('email') || !$this->session->userdata('logged'))
			//redirection vers la page de connexion 
			redirect('connexion/index');
		//chargement de cache 
		$this->output->cache(10);
	}

	/**
	 * Page d'index du Bureau 
	 *@param none
	 *@return none
	 *@access public 
	 */
	function index()
	{
		//$this->output->enable_profiler(true);//profiling de l'application

		//Vérification si il existe des projets pour le membre connecté à l'aide de la fonction check Projet du module Projet_model
		if($this->projetManager->checkProjet($this->projetManager->get_userID($this->session->userdata('email')))>0)
		{
			//Récupération de nom du membre 
			$data['username'] = $this->profilManager->userName($this->session->userdata('email'));
			//chargement de contenu de template 
			$data['content'] = 'Tachyon_template/page_wrapper';
			//Récupérer les informations des projets à partir de la base de données 
			$data['projet_info'] = $this->projetManager->getProjetByUserID($this->projetManager->get_userID($this->session->userdata('email')));
			//Titre de la page 
			$data['title'] = 'Bureau ';
			//chargement de la tempalte 
			$this->load->view('Tachyon_template/template',$data);

		}
		//Si non redirection vers la methode add 
		else
		{
			redirect('projet/add');
		}

	}
	/**
	 * Permet à un utilisateur d'ajouter un projet 
	 *@param none
	 *@return none
	 *@access public 
	 */
    public function add()
    {

    	$data['username'] = $this->profilManager->userName($this->session->userdata('email'));
		$data['content'] = 'Tachyon_template/page_wrapper';
		$data['title'] = 'Ajouter un projet';
		//$data['rows'] = $this->projetManager->get_role();
		//Vérification des champs de formulaire "ajouter un projet " à l'aide de la bébliothéque Form_validation 
		$this->form_validation->set_rules('nom_projet', 'Nom de projet', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('start', 'date de début', 'trim|required|xss_clean');
		$this->form_validation->set_rules('end', 'date de fin', 'trim|required|xss_clean');
		$this->form_validation->set_rules('budget', 'Budget', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('role', 'Role', 'trim|required|xss_clean');
		//Si les champs sont valides
		if($this->form_validation->run())
		{
			//Récupération des données à partir de la formulaire en POST 
			$data['projet'] = array('nom' =>$this->input->post('nom_projet') ,
						  'description'=>$this->input->post('description'),
						  'start'=>$this->input->post('start'),
						  'end'=>$this->input->post('end'),
						  'status'=>false,
						  'budget'=>$this->input->post('budget'));
			//Insertion des données dans la table projets à l'aide de la méthode insert_projet du module Projet_model 
			$this->projetManager->insert_projet($data['projet']);
			//définition de role de l'utilisateur par defaut sera chef de projet 
			$data['role'] = array('Roles_ID'=>$this->projetManager->get_roleID($this->input->post('role')),
				                  'Users_ID'=>$this->projetManager->get_userID($this->session->userdata('email')),
				                  'Projets_ID'=>$this->projetManager->get_projetID($this->input->post('nom_projet'))
				                  );
			//Insertion les description et le role dans la table Role_associes
			$this->projetManager->insert_role($data['role']);
			//message de réussite
			$data['success'] = 'Le projet est ajouté avec succés';
			//Récupération des information sur le projet 
			$data['projet_info'] = $this->projetManager->getProjetByUserID($this->projetManager->get_userID($this->session->userdata('email')));
			//chargement de la view 
			$this->load->view('Tachyon_template/template',$data);
		}
		//Si non 
		else
		{
			//message de notification 
			$data['info'] = "vous n'anez aucun projet";
			//chargement de template 
			$this->load->view('Tachyon_template/template',$data);
		}	
    }

    /**
     * Permet d'ajouter un nouveau utilisateur 
     *@param none
     *@return none 
     *@access public
     */

    public function addUser()
    {
    	//Récupération des information utilisateur 
    	$data['username'] = $this->profilManager->userName($this->session->userdata('email'));
		$data['content'] = 'Tachyon_template/page_wrapper';
		$data['title'] = 'Ajouter un utilisateur ';
		$data['projet_info'] = $this->projetManager->getProjetByUserID($this->projetManager->get_userID($this->session->userdata('email')));
		//Vérification des champs de la formulaire "Ajouter un utilisateur"
    	$this->form_validation->set_rules('user_email', 'Email', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('projet', 'Projet', 'trim|required|xss_clean');
		$this->form_validation->set_rules('role', 'Role', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description_role','description du role','trim|required|xss_clean');
		//Si les champs sont valides
		if($this->form_validation->run())
		{
			//récupération d'ID de l'utilisateur ajouté
			$user_id = $this->projetManager->get_userID($this->input->post('user_email'));
			//vérification d'existance de l'utilisateur 
			if (isset($user_id)) 
			{
				//définition d'un role
				$data['role'] = array( 'nom_Role'=>$this->input->post('role'),
									   'description_Role'=>$this->input->post('description'));
				//ajouter le nouvel role avec sa description à la table roles
				$this->projetManager->insert_roleDescription($data['role']);
				//définition l'association entre l'utilisateur ,le role et le projet
				$data['assocRole'] = array('Roles_ID'=>$this->projetManager->get_roleID($this->input->post('role')),
				                           'Users_ID'=>$user_id,
				                           'Projets_ID'=>$this->projetManager->get_projetID($this->input->post('projet'))
				                  );
				//insertion des données dans la tables Role_assoccies
				$this->projetManager->insert_role($data['assocRole']);
				//message de réussite 
				$data['success_addUser'] = "l'utilisateur ".$this->profilManager->userName($this->input->post('user_email'))." est ajouté avec succés";
				//chargement de template 
				$this->load->view('Tachyon_template/template',$data);
			}
			//si l'utilisateur n'est pas inscrit sur la plate-forme
			else
			{
				//message d'erreur 
				$data['error_addUser'] = "cet utilisateur n'est pas inscrit :";
				$this->load->view('Tachyon_template/template',$data);
			}
		}
		//si les champs de la formulaire "ajouter un utilisateur " sont invalides
		else
		{
			//message d'erreur 
			$data['error_addUser'] = "les données sont incorects";
			$this->load->view('Tachyon_template/template',$data);
		}
    }
    /**
     * Envoyer un message d'invitation à une personne non inscrit 
     *@param none
     *@return none
     *@access public
     */
    public function mailInvitation()
    {
    	//Information concerant l'utilisateur connecté 
    	$data['username'] = $this->profilManager->userName($this->session->userdata('email'));
		$data['content'] = 'Tachyon_template/page_wrapper';
		$data['projet_info'] = $this->projetManager->getProjetByUserID($this->projetManager->get_userID($this->session->userdata('email')));
		//chargement de helper mail_notification 
    	$this->load->helper('mail_notification');
    	//Validation de formulaire 
    	$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
    	$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
    	//si les champs sont valides
    	if ($this->form_validation->run()) 
    	{
    		//Envoyer un email d'invitation à l'aide de la fonction mailInvitation de la helper mail_notification
    		mailInvitation($this->input->post('email'),$this->input->post('message'),$this->profilManager->userName($this->session->userdata('email')));
    		//message de succées
    		$data['success_invitationMail'] = "L'invitation est envoyée avec succées";
    		//rechargement de template 
    		$this->load->view('Tachyon_template/template',$data);
    		
    	}
    	//si les champs sont invalides 
    	else
    	{
    		//message d'erreur 
    		$data['error_invitationMail'] = "une erreur a été produite lors d'envoi de l'invitation";
    		$this->load->view('Tachyon_template/template',$data);

    	}

    }

    /**
     * Fonction des test 
     *@param none
     *@return none
     *@access public
     */
    public function test()
    {
    	print_r($this->projetManager->getUsersByIdProject(12));
    }


}

/* End of file Controllername.php */
/* Location: ./application/controllers/Controllername.php */
 ?>