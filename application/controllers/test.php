<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {
    	$this->load->model('users_model','usersManager');
    	$data['users'] = $this->usersManager->getUsers();
    	$data['content'] = 'Tachyon_template/contact';
    	$this->load->view('Tachyon_template/template',$data);
    }
    public function data()
    {
    	print_r($this->usersManager->getUsers());
    	echo "hello";
    }
    

}

/* End of file Controllername.php */
/* Location: ./application/controllers/Controllername.php */