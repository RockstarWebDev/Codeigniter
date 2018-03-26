<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {


	public $table = 'users';
	public $primary_key = 'id';

	function __construct()
{
	parent::__construct();


	$config = array(
		"login" =>  array(
			'field' => 'password',
			'label' => '',
			'rules' => 'required|trim',
			'errors' => array('required' =>'Invalid Password'  )), 
	

		 array(
		 	'field' => 'email',
			'label' => '',
			'rules' => 'required|valid_email',
			'errors' => array('required' =>'Invalid Email' )),
			
			 );
		$this->form_validation->set_rules($config);
}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
		  redirect(current_url());
		}
		$this->load->view('login');
	}

function login_validate()
	{
		if($this->form_validation->run("login") == FALSE)
        {
            //Load view and layout
            $this->load->view('login');
            
        //Validation has ran and passed    
        } else {

        		$email = $this->input->post('email');
        		$password = md5($this->input->post('password'));
        		
        	$this->load->model('user');

        	$user = new user;
        	$user->table = $this->table;
	        $user->primary_key = $this->primary_key;
        	$user_id = $user->login_verfication($email, $password);


               if ($user_id) {
               		$user_data = array(
               			'user_id' => $user_id,
               			'email' => $email,
               			'logged_in'=> true );


               		$this->session->set_userdata($user_data);
               		$this->session->set_flashdata('login','welcome your are logged in');
               		redirect(base_url().'ListController');
               }else{

               	
               	$this->session->set_flashdata('login_failed', 'Sorry, the login info that you entered is invalid');
                redirect(base_url('LoginController'));
               }
         }
    
	
	
}

 public function logout()
 {
 	$this->session->unset_userdata('user_id');
 	$this->session->unset_userdata('email');
 	$this->session->unset_userdata('logged_in');
 	$this->session->sess_destroy();

 	redirect(base_url('LoginController'));
 }

}
