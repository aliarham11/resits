<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
	$this->load->model('data_model');
	$this->load->model('index_model');
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
   
	 if($this->session->userdata('experts'))
	 {
		$stexp=$this->session->userdata('experts');
		if($stexp==true) $data['stexp'] = "Index updated";
		else
		$data['stexp'] = "Failed to update index";
	 }
	 else
	 $data['stexp']="-";
	 
	 if($this->session->userdata('publications'))
	 {
		$stpub=$this->session->userdata('publications');
		if($stpub==true) $data['stpub'] = "Index updated";
		else
		$data['stpub'] = "Failed to update index";
	 }
	 else
	 $data['stpub']="-";
	 
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
	 
	 $expert=$this->data_model->get_count("experts");
	 $data['exphistories']=$this->data_model->get_histories("experts");
	 $data['countexpertsdb']=$this->index_model->get_num_rows("tmst_dosen");
	 $data['countexperts']=$expert->count;
	 $data['lastexperts']=$expert->date;
	 
	 $expert=$this->data_model->get_count("publications");
	 $data['pubshistories']=$this->data_model->get_histories("publications");
	 $data['countpubsdb']=$this->index_model->get_num_rows("tran_publikasi_dosen_tetap");
	 $data['countpubs']=$expert->count;
	 $data['lastpubs']=$expert->date;
	 
     $this->load->view('home_view', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('index.php/login', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   $this->session->unset_userdata('experts');
   $this->session->unset_userdata('publications');
   session_destroy();
   redirect('index.php/home', 'refresh');
 }

}

?>

