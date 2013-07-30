<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Classe Connexion
 *Date: 28/06/2012
 *@author Lazhari Mohammed <lazharimohammed@gmail.com>
 *@ copyright ENI 2012
 *@licence GNU GPL 3.0
 *@version 0.1
 *@package Connexion
 */
class Connexion extends CI_Controller {
/**
 * Constructeur 
 *@access public
 */
	public function __construct()
	{	
		// Chargement de constructeur de la classe mère CI_Controller
		parent::__construct();
		//Chargement de la module connexion_model
		$this->load->model('connexion_model','connexionManager');
	}
/**
 * permet un utilisateur de s'inscrire
 *@param none 
 *@return none
 *@access public 
 */
    public function signup()
    {
    	// chargement de la Helper mail_notification 
    	$this->load->helper('mail_notification');
    	//Récupération de la liste des villes 
    	$data['rows'] = $this->connexionManager->get_villes();
    	//vérification de session 
    	if($this->session->userdata('email') || $this->session->userdata('logged'))
		{
			//Redirection vers le controlleur "projet"
			redirect('projet');
		}

		//Form_validation : validation des champs de la formulaire d'inscription 
		$this->form_validation->set_rules('name','Nom','trim|required|xss_clean');
		$this->form_validation->set_rules('prenom','Prenom','trim|required|xss_clean');
		$this->form_validation->set_rules('phon','Téléphone','trim|required|xss_clean|exact_length[10]');
		$this->form_validation->set_rules('email','Email','trim|required|matches[emailconf]|xss_clean|valid_email|callback_check_email');
		$this->form_validation->set_rules('emailconf','Confirmation','trim|required|xss_clean');
		$this->form_validation->set_rules('pass','Password','trim|required|matches[passconf]|xss_clean|min_length[5]');
		$this->form_validation->set_rules('passconf','Password Confirm','trim|required|xss_clean|min_length[5]');
		$this->form_validation->set_rules('societe','societé','trim|xss_clean');
		$this->form_validation->set_rules('adress','Adresse','trim|required|xss_clean|min_length[5]');
		$this->form_validation->set_rules('ville','Ville','trim|required|xss_clean');

		// Si les champs de formulaire sont valides 
		if($this->form_validation->run())
		{
			//Récupération des données 
			$data = array(
				          'nom'=>$this->input->post('name'),
				          'prenom' =>$this->input->post('prenom'),
				          'tel'  =>$this->input->post('phon'),
				          'email'  =>$this->input->post('email'),
				          'motPass'  =>sha1($this->input->post('pass')),
				          'societe'  =>$this->input->post('societe'),
				          'adress'  =>$this->input->post('adress'),
				          'ville'  =>$this->input->post('ville'),
				          'avatar'=>'default_avatar.jpg'
				          );
			//Insertion des données dans la table Users à l'aide de la methode signup 
			//de la classe connexion_model 
			$this->connexionManager->signup($data);
			//Envoyer un email de notification au nouvel membres 
			mailSignUp($this->input->post('email'),$this->input->post('name'),$this->input->post('pass'));
			$data['success'] = 'Inscription réussie';
			//chargement de la view login 
			$this->load->view('Tachyon_template/login',$data);
			
		}
		else
		{	
			//message d'erreur à afficher pour l'utilisateur 
			$data['error_signup'] = "Donneés incorrectes";
			//chargement de la view Login 
			$this->load->view('Tachyon_template/login',$data);
		}

    }
/**
 * page d'index 
 *@param none
 *@return none
 *@access public 
 */
    function index()
    {
    	//vérification de la session 
    	if($this->session->userdata('email') || $this->session->userdata('logged'))
		{
			redirect('projet');
		}
		//Validation des champs de la fomulaire de connexion 
		$this->form_validation->set_rules('mail','Pseudo','trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		// les champs de la formulaire sont valid 
		if($this->form_validation->run())
		{
			//vérification d'email et mot de passe 
			if($this->connexionManager->check_id($this->input->post('mail'),$this->input->post('password')))
			{
				//chargement de la variable session 
				$data = array('email'=>$this->input->post('mail'),'logged'=>true);
				$this->session->set_userdata($data);
				//Redirection vers le controlleur "projet"
				redirect('projet');
			}
			else
			{
				//Message d'erreur
				$data['error'] = 'Identifiant incorrect';
				$this->load->view('Tachyon_template/login',$data);
			}

		}
		else
		{
			
			$this->load->view('Tachyon_template/login');
		}

    }
   
/**
 * permet à un utilisateur de se deconnecter 
 *@param none
 *@return none
 *@access public
 */
    function logout()
	{
		//Desctruction de la variable session
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('logged');
		$this->session->sess_destroy();
		//Redirection vers la page d'index de connexion 
		redirect('connexion/index');
	}

	function forgetpass()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|callback_forget_check_email');
		if($this->form_validation->run())
		{

			$data['success'] = 'Un email contient votre mot pass a été envoyer à votre boite : '.$this->input->post('email');
			$this->load->view('forgetpass',$data);
		}
		else
		{
			$data['error'] = 'Cette email n\'exite pas ';
			$this->load->view('forgetpass',$data);
		}
	}

    /**
     * verification de l'existance d'email donner par un nouvel membres
     *@param none
     *@return bool 
     *@access public
     */

	function check_email()
	{
		if($this->input->post('email'))
		{
			$this->db->select('id');
			$this->db->from('Users');
			$this->db->where('email',$this->input->post('email'));
			if($this->db->count_all_results()>0)
			{
				$this->form_validation->set_message('check_email','Cet email est déja existe');
				return false;
			}
			else
				return true;
		}
		
	}
	function forget_check_email()
	{
		if($this->input->post('mail'))
		{
			$this->db->select('id');
			$this->db->from('Users');
			$this->db->where('email',$this->input->post('email'));
			if($this->db->count_all_results() >0)
			{
				return true;
			}
			else
			{
				$this->form_validation->set_message('forget_check_email ','Cet email n\'est existe pas');
				return false;
			}
		}
	}
}