<?php 

class list_model extends CI_Model{
 
	 public $table = '';
	 public $primary_key = '';


	public function get_all_lists($user_id)
	 {
	 	$this->db->where('user_id',$user_id);
	 	$this->db->order_by('created_at', 'DESC'); 
	 	$query = $this->db->get($this->table);
	 	return $query->result();
	 }

	 public function create($data)
	 {
		$insert = $this->db->insert($this->table, $data);
		return $insert;
     }

     public function show_list_data($list_id){
     	$this->db->where($this->primary_key, $list_id);
     	$query = $this->db->get($this->table);
     	return $query->row();
     }

     public function edit($list_id){
        $this->db->where($this->primary_key, $list_id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

     public function update($list_id,$data){
	      $this->db->where($this->primary_key, $list_id);
	      $this->db->update($this->table, $data);
	      return TRUE;
    }

    public function delete($id)
    {
    	$this->db->where($this->primary_key, $id);
		$this->db->delete($this->table);
		return;
    }

    public function delete_list($list_id){
        $this->db->where($this->primary_key,$list_id);
        $this->db->delete($this->table);
        $this->delete_tasks_of_list($list_id);
        return;
    }
    
    private function delete_tasks_of_list($list_id){
        $this->db->where('list_id',$list_id);
        $this->db->delete('tasks');
        return;
    }
//task specific related function
    public function list_id_for_task($task_id)
    {
    	$this->db->where($this->primary_key, $task_id);
     	$query = $this->db->get($this->table);
     	return $query->row()->list_id;
    }

     public function mark_complete($task_id){
        $this->db->set('is_complete', 1);
        $this->db->where($this->primary_key, $task_id);
        $this->db->update($this->table);
        return TRUE;
    }
    
     public function mark_new($task_id){
        $this->db->set('is_complete', 0);
        $this->db->where($this->primary_key, $task_id);
        $this->db->update($this->table);
        return TRUE;
    }

    public function check_if_complete($task_id){
        $this->db->where($this->primary_key, $task_id);
        $query = $this->db->get($this->table);
        return $query->row()->is_complete;
    }

     public function list_with_tasks($list_id,$active = true)
     {
        $this->db->select('
            tasks.task_name,
            tasks.task_body,
            tasks.id as task_id,
            lists.title,
            lists.body
            ');
        $this->db->from('tasks');
        $this->db->join('lists', 'lists.id = tasks.list_id');
        $this->db->where('tasks.list_id',$list_id);
        if($active == true){
            $this->db->where('tasks.is_complete',0);
        } else {
            $this->db->where('tasks.is_complete',1);
        }
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return FALSE;
        }
        return $query->result();
    }
     
}
?>