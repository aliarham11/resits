<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pendapatan extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database('personal');
	}
	
	public function get()
	{
		$this->db->select('*');
		$this->db->like('tanggal','2013-');
		$this->db->order_by('tanggal','asc');
		return $this->db->get('tbl_pendapatan');
	}
}

/* End of file pendapatan.php */
/* Location: ./application/models/pendapatan.php */