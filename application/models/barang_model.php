<?php
class Barang_model extends CI_Model {
    function Barang_model() {
       parent::__construct();
    }
    
    function getBuku($perPage,$uri) { //to get all data in tb_book
       $this->load->database('personal', TRUE);
       $getData = $this->db->get('biodata');
       $datax['counts']=$getData->num_rows();
        $this->db->limit($perPage, $uri);
        $getData = $this->db->get('biodata'); 
       if($getData->num_rows() > 0)
       {
           $datax['details']=$getData->result_array();
            return $datax;
       }
       else
       return null;
       }
    function getCount() { //to get all data in tb_book
        $this->load->database('personal', TRUE);
       $this->db->select('*');
       $this->db->from('biodata');
       $getData = $this->db->get();
       if($getData->num_rows() > 0)
       return $getData->num_rows();
       else
       return null;
       }
    public function getData($nama)
    {
        $this->load->database('personal', TRUE);
        $this->db->select('*');
        $this->db->like('kode_brg', $nama);
           $query = $this->db->get('tbarang');
        return $query->result();
    }
    
}
?>