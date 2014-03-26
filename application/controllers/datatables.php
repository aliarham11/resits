<?php
class Datatables extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
	}
        
        public function index()
        {
                $this->datatables->from('obat');
                $this->datatables->select('kode_obat,nama_obat,kode_satuan,kode_supplier');
                echo $this->datatables->generate();
        }

	
	
}
	