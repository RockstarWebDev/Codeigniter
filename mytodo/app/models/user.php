<?php 

class user extends CI_Model{
 
	 public $table = '';
	 public $primary_key = '';


	 public function create($data=array())
	 {
	  		$result = $this->db->insert($this->table, $data);
	  		return $result;
	 }


	 public function login_verfication($email,$password)
	 {
	 	//Secure password
        //$enc_password = md5($passowrd);
        
        //Validate
        $this->db->where(array('email' => $email, 'password' => $password ));
       

        $result = $this->db->get($this->table);
        if($result->num_rows() == 1){
            return $result->row(0)->id;

        } else {
            return false;
        }
	 }
 
}

 ?>