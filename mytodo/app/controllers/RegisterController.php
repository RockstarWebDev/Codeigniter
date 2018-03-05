<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {

	public $table = 'users';
	public $primary_key = 'id';

function __construct()
{
	parent::__construct();


	$config = array(
		"register" =>  array(
			'field' => 'name',
			'label' => '',
			'rules' => 'required|trim',
			'errors' => array('required' =>'Please enter the first name'  )), 
	

		 array(
		 	'field' => 'email',
			'label' => '',
			'rules' => 'required|valid_email',
			'errors' => array('required' =>'Please enter the email' )),

		array(
		 	'field' => 'password',
			'label' => '',
			'rules' => 'required',
			'errors' => array('required' =>'Password is required' )),

		array(
		 	'field' => 'password2',
			'label' => '',
			'rules' => 'required|matches[password]',
			'errors' => array('required' =>'Password does not match' )
			),


			 );
		$this->form_validation->set_rules($config);
}

	 



	public function index()
	{


	 $this->load->model('user');

	 $user = new user;
	 $user->table = $this->table;
	 $user->primary_key = $this->primary_key;

		$this->load->view('register');
	}


	function reg_validate()
	{
		if($this->form_validation->run("register") == FALSE)
        {
            //Load view and layout
            $this->load->view('register');
            
        //Validation has ran and passed    
        } else {

        	$data = array(
        		'name' =>$this->input->post('name'),
        		'email' =>$this->input->post('email'),
        		'password' => md5($this->input->post('password')) 
        		 );
     $this->load->model('user');   	
     $user = new user;
	 $user->table = $this->table;
	 $user->primary_key = $this->primary_key;

	 $user->create($data);

	 return redirect(base_url().'Welcome');

           }
    }
}
