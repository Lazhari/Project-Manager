<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Classe Profil
 *Date: 28/06/2012
 *@author Lazhari Mohammed <lazharimohammed@gmail.com>
 *@ copyright ENI 2012
 *@licence GNU GPL 3.0
 *@version 0.1
 *@package Profil
 */
class Profil extends CI_Controller {

	/**
   *Constructeur 
   *@param none
   *@access public 
   */
	public function __construct()
	{
    //appel du constructeur de la class mère CI_Controller
		parent::__construct();
    //chargement des modules
		$this->load->model('profil_model','profilManager');
    $this->load->model('projet_model','projetManager');
    $this->load->model('connexion_model','connexionManager');
    //vérification de session
		if( !$this->session->userdata('email') || !$this->session->userdata('logged'))
			redirect('connexion/index');
	}
    /**
     * Page d'index 
     *@param none
     *@return none
     *@access public
     */
    public function index()
    {
      //chargement de contenu de view
    	$data['content'] = 'Tachyon_template/profil';
      //titre de la page 
      $data['title'] = 'Mon Profil';
      //Chargement des données de  l'utilisateur connecté
    	$data['profil'] = $this->profilManager->userProfil($this->session->userdata('email'));
    	$data['username'] = $this->profilManager->userName($this->session->userdata('email'));
      $data['projet_info'] = $this->projetManager->getProjetByUserID($this->projetManager->get_userID($this->session->userdata('email')));
      //chargement de template
    	$this->load->view('Tachyon_template/template',$data);
    }
    /**
     * Permet à membres de modifier si coordonnées personnel 
     *@param none
     *@return none
     *@access public
     */
    public function updateCoord()
    {
        //Vérification des données via la libririe Form_validation 
        $this->form_validation->set_rules('name','Nom','trim|required|xss_clean');
        $this->form_validation->set_rules('prenom','Prenom','trim|required|xss_clean');
        $this->form_validation->set_rules('phon','Téléphone','trim|required|xss_clean|exact_length[10]');
        $this->form_validation->set_rules('societe','societé','trim|xss_clean');
        $this->form_validation->set_rules('adress','Adresse','trim|required|xss_clean|min_length[5]');
        $this->form_validation->set_rules('ville','Ville','trim|required|xss_clean');
        //Si les champs sont valides
        if($this->form_validation->run())
        {
          //Récupération des données 
           $data = array(
                          'nom'=>$this->input->post('name'),
                          'prenom' =>$this->input->post('prenom'),
                          'tel'  =>$this->input->post('phon'),
                          'societe'  =>$this->input->post('societe'),
                          'adress'  =>$this->input->post('adress'),
                          'ville'  =>$this->input->post('ville')
                          );
           //Modification des données dans la tables Users via la méthode updateProfilCoord
           $this->profilManager->updateProfilCoord($data,$this->projetManager->get_userID($this->session->userdata('email')));
           //Redirection vers la classe profil
            redirect('profil');
        }
        //en cas d'erreur 
        else
        {
           $data['content'] = 'Tachyon_template/profil';
           $data['title'] = 'Modification de Profil ';
           $data['profil'] = $this->profilManager->userProfil($this->session->userdata('email'));
           $data['username'] = $this->profilManager->userName($this->session->userdata('email'));
           $data['projet_info'] = $this->projetManager->getProjetByUserID($this->projetManager->get_userID($this->session->userdata('email')));
           //Message d'erreur 
           $data['error_updateCoord'] = "une erruer a été produite lors de modification des données personnel";
           $this->load->view('Tachyon_template/template',$data);
        }

    }
    /**
     * Permet à un membres de changée son mot de passe 
     *@param none
     *@return none
     *@access public
     */
    public function changePassword()
    {
      //chargement de contenu de la vue
      $data['content'] = 'Tachyon_template/profil';
      //titre de la page 
      $data['title'] = 'Changer mot de passe';
      //Récupération des données personnel
      $data['profil'] = $this->profilManager->userProfil($this->session->userdata('email'));
      $data['username'] = $this->profilManager->userName($this->session->userdata('email'));
      //les information sur les projets dans lequel le membres se participe
      $data['projet_info'] = $this->projetManager->getProjetByUserID($this->projetManager->get_userID($this->session->userdata('email')));
      //vérification de la validation des champs de la formulaire "changer mot de passe"
      $this->form_validation->set_rules('passactuel', 'Password', 'trim|required|min_length[5]|xss_clean|callback_check_passChange');
      $this->form_validation->set_rules('pass','Password','trim|required|matches[passconf]|xss_clean|min_length[5]');
      $this->form_validation->set_rules('passconf','Password Confirm','trim|required|xss_clean|min_length[5]');
      //si les champs sont valides
      if($this->form_validation->run())
      {
        //Récupération des données 
        $data['password'] = array('motPass'=>$this->input->post('pass'));
        //modification du champs motPass dans la table Users via la méthode updateProfilPassword
        $this->profilManager->updataProfilPassword($data['password'],$this->projetManager->get_userID($this->session->userdata('email')));
        //message de succée
        $data['success_changepass'] = "Mot de passe est changé aves succées";
        //chargement de la template
        $this->load->view('Tachyon_template/template',$data); 
      }
      //Si les champs sont invalide
      else
      {
        //message d'erreur 
        $data['error_changepass'] = "une erreure été produite lors de changement de mot de passe";
        //chargement de template 
        $this->load->view('Tachyon_template/template',$data); 
      }
    }
    /**
     * Permet à un utilisateur d'ajouter un photo de profil
     *@param none
     *@return none
     *@access public
     */
    function addAvatar()
    {
      //chargement de contenue de template
      $data['content'] = 'Tachyon_template/profil';
      //titre de la page 
      $data['title'] = 'Ajouter un avatar';
      //les information d'utilisateur 
      $data['profil'] = $this->profilManager->userProfil($this->session->userdata('email'));
      $data['username'] = $this->profilManager->userName($this->session->userdata('email'));
      $data['projet_info'] = $this->projetManager->getProjetByUserID($this->projetManager->get_userID($this->session->userdata('email')));
      /**
       *variable de configuration de la libririe upload
       * @var array config
       */
      //le dossier de téléchargement 
      $config['upload_path'] =  './assets/Avatars/';
      //les extensions valide de l'image postée 
      $config['allowed_types'] = 'gig|jpg|jpeg|png';
      // la taille maximum en octet
      $config['max_size'] = '100000';
      //le nom de l'image uploader
      $config['file_name'] = $data['username'];
      //Taille 450X450
      $config['max_width'] = '450';
      $config['max_height'] = '450';
      //$config['encrypt_name'] = true;
      //chargement de la libririe upload avec les nouvel paramétre de configuration
      $this->load->library('upload',$config);
      //Si le téléchargment est échoué
      if(!$this->upload->do_upload())
      {
        //message d'erreur
        $data['error_upload'] = $this->upload->display_errors();
        //chargement de template 
        $this->load->view('Tachyon_template/template',$data);
      }
      else
      {
        //récupération des information d'image téléchargée 
        $image_data = $this->upload->data();
        /**
         * variable de configuration de la bébliothéque image_lib
         *@var array config
         */
        $config = array(
          'image_library' =>'GD2' ,
          'source_image'  =>$image_data['full_path'],
          'new_image'     =>'./assets/Avatars/thumbs/',
          'create_thimb'  =>true,
          'thumb_marker'  =>'',
          'maintain_ratio'=>false,
          'width'         =>76,
          'height'        =>76
         );
        //chargement de la lib image_lib avec les nouveaux paramétres de configuration
        $this->load->library('image_lib',$config);
        //demensionner l'image
        $this->image_lib->resize();
        //nom de l'image 
        $image_name = $image_data['file_name'];

        $data = array('avatar' => $image_name);
        //ajouter l'image à la table Users dans la base de données
        $this->profilManager->addAvatar($data,$this->projetManager->get_userID($this->session->userdata('email')));
        //redirection vers controlleur profil
        redirect('profil');
      }
    }

    /**
     * Fonction permet de verfier si le mot de passe données par l'utilisateur est valide
     *@param none
     *@return bool
     *@access public
     */

    function check_passChange()
    {
      //récupération du champs passactuel
      if($this->input->post('passactuel'))
      {
        //si le mot de passe est diffirente 
        if (!$this->connexionManager->check_id($this->session->userdata('email'),$this->input->post('passactuel'))) 
        {
          //message d'erreur 
          $this->form_validation->set_message('check_passChange','Le mot de passe est invalide');
          return false;
        }
        //si non 
        else
        {
          return true;
        }
      }
    }

    /**
     * méthode de test
     *@param none
     *@access public 
     */
    public function test()
    {
    	$data = $this->profilManager->userProfil($this->session->userdata('email'));
        print_r($this->projetManager->getProjetByUserID($this->projetManager->get_userID($this->session->userdata('email'))));
    }

}

/* End of file Controllername.php */
/* Location: ./application/controllers/Controllername.php */