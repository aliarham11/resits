<?php
class Login_user extends CI_Model {
    function Login_user() {
       parent::__construct();
    }
   function  login($username, $password)
   {
	   $this -> db -> select('id, username, password');
	   $this -> db -> from('tref_user_admin');
	   $this -> db -> where('username', $username);
	   $this -> db -> where('password', MD5($password));
	   $this -> db -> limit(1);

	   $query = $this -> db -> get();

	   if($query -> num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
   }
   
       
    
    
}
?>