<?php 
class Pns_model extends CI_Model
{
     function Pns_model() {
       parent::__construct();
    }
    
     function getDataTest1(){
       $this->mahasiswa = $this->load->database('default', TRUE);  /*membuka koneksi database untuk mahasiswa*/
       $mahasiswa1 = $this->mahasiswa->get('detail_jurnal')->result();
       return $mahasiswa1;
    }
    function getDataTest2(){
       $this->mahasiswa = $this->load->database('stats', TRUE);  /*membuka koneksi database untuk mahasiswa*/
       $mahasiswa1 = $this->mahasiswa->get('tabel_dos_F1_upd')->result();
       return $mahasiswa1;
    }
    
    function getCount() { //to get all data in tb_book
       $this->load->database('default', TRUE);
       $this->db->select('*');
       $this->db->from('tmst_dosen');
       $getData = $this->db->get();
       if($getData->num_rows() > 0)
       return $getData->num_rows();
       else
       return null;
       }
    public function get_data(){
            $this->load->database('personal', TRUE);
            $this->db->select('userid,nip');
            $this->db->from('biodata');
            $query = $this->db->get();
            return $query->result();
    }
     public function get_data_baru($nip_lama){
            $this->load->database('pemutakhiran', TRUE);
            $this->db->select('ALAMAT_RUMAH');
            $this->db->from('tabel_dos_F1_upd');
            $this->db->where('NIP_LAMA', $nip_lama);
            $query = $this->db->get();
            return $query->result();
    }
        public function add_data($nip_baru,$nip_lama){
            $this->load->database('default', TRUE);
		$data = array(
                    'alamat' => $nip_baru
                 );
                $this->db->where('Nip_lama', $nip_lama);
                $this->db->update('tmst_dosen', $data); 
	}
        
         public function add_data_to($kode,$nama,$jenis){
            $this->load->database('default', TRUE);
		$data = array(
                    'kode_kualifikasi'=>$kode,
                    'nama_kualifikasi' => $nama,
                    'jenis_kualifikasi'=>$jenis
                 );
                $this->db->insert('tmst_kualifikasi_dosen', $data); 
	}
        
        public function check_data_to($nama){
            $this->load->database('default', TRUE);
            $this->db->select('nama_kualifikasi, kode_kualifikasi');
            $this->db->from('tmst_kualifikasi_dosen');
            $this->db->like('nama_kualifikasi', $nama); 
            $query = $this->db->get();
            return $query->result();
	}
        
        public function update_data($sama,$kode){
            $this->load->database('default', TRUE);
		$data = array(
                    'samadengan' => $sama
                 );
                $this->db->where('kode_kualifikasi', $kode);
                $this->db->update('tmst_kualifikasi_dosen', $data); 
	}
        
        public function update_email($nip,$email){
            $this->load->database('default', TRUE);
		$data = array(
                    'email' => $email
                 );
                $this->db->or_where('Nip_lama', $nip);
                $this->db->or_where('Nip_baru', $nip);
                $this->db->update('tmst_dosen', $data); 
	}
        
        public function insert_email($nip,$email){
            $this->load->database('default', TRUE);
		$data = array(
                    'nip' => $nip,
                    'userid' => $email
                 );
                $this->db->insert('tran_kualifikasi_dosen', $data); 
	}
        
        public function get_namasama($kode){
            $this->load->database('default', TRUE);
            $this->db->select('samadengan');
            $this->db->from('tmst_kualifikasi_dosen');
            $this->db->where('kode_kualifikasi', $kode);
            $query = $this->db->get();
            foreach ($query->result() as $row)
            {
                $sama=$row->samadengan;
            }
            return $sama;
    }
    
     public function get_nip_user(){
        $this->load->database('default', TRUE);
        $this->db->select('nip, userid');
        $this->db->from('biodata');
        $query = $this->db->get();
       
        return $query->result();
     }
     public function update_nip_keg($nip, $userid){
            $this->load->database('default', TRUE);
		$data = array(
                    'nip' => $nip
                 );
                $this->db->where('userid', $userid);
                $this->db->update('tran_kegiatan_dosen_tetap', $data); 
	}
     
     public function get_foto(){
            $this->load->database('default', TRUE);
            $this->db->select('userid , nip');
            $this->db->from('biodata');
            $query = $this->db->get();
            return $query->result();
    }
    
    public function update_foto($nip, $userid){
            $this->load->database('default', TRUE);
		$data = array(
                    'nip' => $nip
                 );
                $this->db->or_where('userid', $userid);
                $this->db->update('riwayat', $data); 
	}
         
      public function get_materi_personal(){
        $this->load->database('personal', TRUE);
        $this->db->select('biodata.nip, biodata.userid');
        $this->db->from('biodata');
        $query = $this->db->get();
        return $query->result();
     }
     public function get_data_userid($userid)
     {
        $this->load->database('personal', TRUE);
        $this->db->select('*');
        $this->db->from('material');
        $query = $this->db->get();
        foreach ($query->result() as $row)
            {
                $data = array(
                    'nama' => $row->nama,
                    'url' => $row->url,
                    'kategori' => $row->kat,
                    'tgl_upload' => $row->material_upload ,
                    'keterangan' => $row->keterangan
                 );
            }
        return $data;
     }
     
     public function insert_materi($data,$nama)
     {
       $this->load->database('default', TRUE);
       $this->db->where('Userid', $nama);
        
       $status = $this->db->update('tmst_materi_dosen', $data);
       return $status;
     }
     
     public function get_materi_pdpt(){
        $this->load->database('default', TRUE);
        $this->db->select('nip_lama');
        $this->db->from('tmst_materi_dosen');
        $query = $this->db->get();
        return $query->result();
     }
     public function get_publikasi(){
        $this->load->database('personal', TRUE);
        $this->db->select('userid');
        $this->db->from('publikasi');
        $query = $this->db->get();
        return $query->result();
     }
     
     public function get_nip_personal($userid){
        $this->load->database('personal', TRUE);
        $this->db->select('nip');
        $this->db->from('biodata');
        $this->db->where('userid', $userid);
        $query = $this->db->get();
         foreach ($query->result() as $row)
            {
                return $row->nip;
                break;
            }
     }
     public function update_nip($nip,$userid)
     {
         $this->load->database('personal', TRUE);
       $data = array(
               'nip' => $nip
            );

        $this->db->where('userid', $userid);
        $this->db->update('publikasi', $data); 
     }
}