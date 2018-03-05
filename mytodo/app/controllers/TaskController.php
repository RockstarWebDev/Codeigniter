<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskController extends CI_Controller {

	public $table = 'tasks';
	public $primary_key = 'id';

	function __construct(){
		parent::__construct();


		if (!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('no-access','You need to login to access this page');
			redirect(base_url().'Welcome');
		}

	$this->load->model('list_model');


		$config = array(
			"tasks" =>  array(
				'field' => 'task_name',
				'label' => 'Task Name',
				'rules' => 'required|trim',
				'errors' => array('required' =>'Please give a title to your task'  )), 
		
			 array(
			 	'field' => 'task_body',
				'label' => 'Task Body',
				'rules' => 'required|trim',
				'errors' => array('required' =>'Please tell something about task' )),
				
				 );
			$this->form_validation->set_rules($config);
	}

		public function index()
		{
			
			$user_id = $this->session->userdata('user_id');
	        //Get all task from the model

	        $task_obj = new list_model;
	        $task_obj->table = $this->table;
	        $task_obj->primary_key = $this->primary_key;

	        $task = $task_obj->get_all_task($list_id);

			$this->load->view('tasks\index',compact('tasks'));
		}


		public function create($list_id)
		{

					$task_create = new list_model;
					$task_create->table = $this->table;
					$task_create->primary_key = $this->primary_key;

			if ($this->form_validation->run("tasks") == FALSE) 
			{

				$list_name = $task_create->show_list_data($list_id);
				$list_title = $list_name['title'];

				$this->load->view('task/create',compact('list_title'));
				
			}else{


					$data = array(
				'task_name' => $this->input->post('task_name'),
				'task_body' => $this->input->post('task_body'),
				'list_id' => $list_id,
				'due_date' => $this->input->post('due_date'),
				'created_at' => date("Y-m-d H:i:s")
								 );

					$task_create->create($data);


					$this->session->set_flashdata('Task-created','New Task created succesfully');
					redirect('ListController/show/'.$list_id.'');
					

			}
			
		}


		public function show($task_id)
		{
			
			$task_obj = new list_model;
			$task_obj->table = $this->table;
			$task_obj->primary_key = $this->primary_key;

			$task = $task_obj->show_list_data($task_id);
			$list_id = $task_obj->list_id_for_task($task_id);
			$is_complete = $task_obj->check_if_complete($task_id);

		$this->load->view('task\show', compact('task','list_id','is_complete'));

		}

		public function edit($task_id)
		{
			
			$edit_obj = new list_model;
			$edit_obj->table = $this->table;
			$edit_obj->primary_key = $this->primary_key;

			$task = $edit_obj->edit($task_id);

			// print_r($list);

			$this->load->view('task\edit', compact('task'));
		}


		public function update($task_id='')
		{
			if ($this->form_validation->run("task") == FALSE) 
			{

				$this->load->view('task/update');
				
			}else{

					$task_obj = new list_model;
					$task_obj->table = $this->table;
					$task_obj->primary_key = $this->primary_key;

					$list_id = $task_obj->list_id_for_task($task_id);

			$data = array(
				'task_name' => $this->input->post('task_name'),
				'task_body' => $this->input->post('task_body'),
				'list_id' => $list_id,
				'due_date' => $this->input->post('due_date'),
				'created_at' => date("Y-m-d H:i:s")
						);


					$task_obj->update($task_id, $data);

					$this->session->set_flashdata('task-update','task Updated succesfully');

					redirect('ListController/show/'.$list_id.'');
					

			}
		}

		public function mark_complete($task_id)
		{
			$task_obj = new list_model;
			$task_obj->table = $this->table;
			$task_obj->primary_key = $this->primary_key;

		    if($task_obj->mark_complete($task_id)){
		        $list_id = $task_obj->list_id_for_task($task_id);
		        //Create Message
		        $this->session->set_flashdata('marked_complete', 'Task has been marked complete'); 
		        redirect('ListController/show/'.$list_id.'');
		    }
		}
		
		
		 public function mark_new($task_id)
		 {
		 	$task_obj = new list_model;
		 	$task_obj->table = $this->table;
		 	$task_obj->primary_key = $this->primary_key;

		    if($task_obj->mark_new($task_id)){
		        $list_id = $task_obj->list_id_for_task($task_id);
		        //Create Message
		        $this->session->set_flashdata('marked_new', 'Task has been marked new'); 
		        redirect('ListController/show/'.$list_id.'');
		    }
		}


		public function delete($list_id,$task_id)
		{
					$task_obj = new list_model;
					$task_obj->table = $this->table;
					$task_obj->primary_key = $this->primary_key;

	$task_obj->delete($task_id);
	redirect('ListController/show/'.$list_id.'');
		}

}