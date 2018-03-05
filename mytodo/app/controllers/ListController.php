<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListController extends CI_Controller {

	public $table = 'lists';
	public $primary_key = 'id';

	function __construct()
	{
		parent::__construct();
		$this->load->model('list_model');

		if (!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('no-access','You need to login to access this page');
			redirect(base_url().'Welcome');
		}

		$config = array(
			"lists" =>  array(
				'field' => 'title',
				'label' => '',
				'rules' => 'required|trim',
				'errors' => array('required' =>'Please give a title to your list'  )), 
		
			 array(
			 	'field' => 'body',
				'label' => '',
				'rules' => 'required|trim',
				'errors' => array('required' =>'Please tell something about list' )),
				
				 );
			$this->form_validation->set_rules($config);
	}

	public function index()
	{
		
		$user_id = $this->session->userdata('user_id');
        //Get all lists from the model

        $list_obj = new list_model;
        $list_obj->table = $this->table;
        $list_obj->primary_key = $this->primary_key;

        $lists = $list_obj->get_all_lists($user_id);

		$this->load->view('lists\index',compact('lists'));
	}


	public function create()
	{
		if ($this->form_validation->run("lists") == FALSE) 
		{

			$this->load->view('lists/create');
			
		}else{

				$list_obj = new list_model;
				$list_obj->table = $this->table;
				$list_obj->primary_key = $this->primary_key;

				$data = array(
					'title' => $this->input->post('title'),
					'body' => $this->input->post('body'),
					'user_id'=> $this->session->userdata('user_id'),
					'created_at' => date("Y-m-d H:i:s")
					 );

				$list_obj->create($data);

				$this->session->set_flashdata('list-created','New list created succesfully');

				redirect(base_url().'ListController');
				

		}
		
	}


	public function show($id)
	{
		
		$list_obj = new list_model;
		$list_obj->table = $this->table;
		$list_obj->primary_key = $this->primary_key;

		$list = $list_obj->show_list_data($id);

		$completed_tasks = $list_obj->list_with_tasks($id,TRUE);
		$uncompleted_tasks = $list_obj->list_with_tasks($id,FALSE);

		$this->load->view('lists\show', compact('list','completed_tasks','uncompleted_tasks'));

	}

	public function edit($id)
	{
		
		$edit_obj = new list_model;
		$edit_obj->table = $this->table;
		$edit_obj->primary_key = $this->primary_key;

		$list = $edit_obj->edit($id);

		// print_r($list);

		$this->load->view('lists\edit', compact('list'));
	}


	public function update($list_id='')
	{
		if ($this->form_validation->run("lists") == FALSE) 
		{

			$this->load->view('lists/edit');
			
		}else{

				$list_obj = new list_model;
				$list_obj->table = $this->table;
				$list_obj->primary_key = $this->primary_key;

				$data = array(
					'title' => $this->input->post('title'),
					'body' => $this->input->post('body'),
					'created_at' => date("Y-m-d H:i:s")
					 );
$id = $list_id;
				$list_obj->update($id,$data);

				$this->session->set_flashdata('list-update','list Updated succesfully');

				redirect(base_url().'ListController');
				

		}
	}


	public function delete($list_id)
	{
				$list_obj = new list_model;
				$list_obj->table = $this->table;
				$list_obj->primary_key = $this->primary_key;

$list_obj->delete_list($list_id);
redirect(base_url().'ListController');
	}



}

