<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Classe Users
 *Date: 28/06/2012
 *@author Lazhari Mohammed <lazharimohammed@gmail.com>
 *@ copyright ENI 2012
 *@licence GNU GPL 3.0
 *@version 0.1
 *@package Users
 */
class Users extends CI_Controller {
	/**
	 * Constructeur
	 *@param none
	 *@return none
	 *@access public 
	 */
    public function __construct()
	{
		//Appel du contstructeur de la classe mére CI_Controller 
		parent::__construct();
		//Chargement du module users_model
		$this->load->model('users_model','usersManager');
		//Vérification de la session 
		if( !$this->session->userdata('email') || !$this->session->userdata('logged'))
			redirect('connexion/index');
	}
	/**
	 * Page d'index 
	 *@param none
	 *@return none
	 *@access public 
	 */
	function index()
	{
		//Récupération des informations membres
		$data['username'] = $this->usersManager->userName($this->session->userdata('email'));
    	$data['users'] = $this->usersManager->getUsers($this->usersManager->get_userID($this->session->userdata('email')));
    	//Titre de la page
    	$data['title'] = 'Users |contacts';
    	//Liste des contacts
    	$data['myContacts'] = $this->usersManager->getMyContacts($this->usersManager->get_userID($this->session->userdata('email')));
    	//les IDs des contacts
    	$data['myContactsId'] = $this->usersManager->getIdContacts($this->usersManager->get_userID($this->session->userdata('email')));
    	//contenue de la template
    	$data['content'] = 'Tachyon_template/contact';
    	//chargement de la vue 
    	$this->load->view('Tachyon_template/template',$data);
	}
	/**
	 * Ajouter un contact à la liste 
	 *@param int id ID du contact à ajouter 
	 *@return none
	 *@access public
	 */
	function addContact($id)
	{
		//chargement de la helper date
		$this->load->helper('date');
		//chargement de données 
		$data['contact'] = array('Users_ID'=>$this->usersManager->get_userID($this->session->userdata('email')),
								 'Users_ID1'=>(int)$id,
								 'date'=>now()
								);
		//insertion des information contact dans la table contacts dans la bases de données
		$this->usersManager->addContact($data['contact']);
		//Rediréction vers le controlleur users
		redirect('users');
	}
	/**
	 * méthode test : sert à faire des test 
	 *@param none
	 *@return none
	 *@access public
	 */
	function test()
	{
		print_r($this->usersManager->getIdContacts(11));
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */