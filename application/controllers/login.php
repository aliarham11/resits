<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
        public function Login()
        {
            parent::__construct();
		}
        function index()
		 {
			if($this->session->userdata('logged_in'))
			   {
				 redirect('index.php/home', 'refresh');
			   }
			   else
			   {
			   $this->load->helper(array('form'));
			   $this->load->view('login_view');
			   }
		 }
               
}
