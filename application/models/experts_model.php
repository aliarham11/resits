<?php
class Experts_model extends CI_Model {
    function Experts_model() {
       parent::__construct();
    }
    
    public function get($table_name, $field, $order = -1, $seq = -1, $limit = -1) 
    { 
            
            $sql = "SELECT " . $field . " FROM " . $table_name ; 
            if($order != -1) 
            { $sql = $sql . ' ORDER BY ' . $order; } 
            
            if($seq != -1 || $limit != -1) 
            { $sql = $sql . " LIMIT " . $seq . " , " . $limit . ""; } 
            
            $query = $this->db->query($sql); 
            if($query->num_rows() > 0) 
            { return $query->result(); } 
            else 
            { return FALSE; } 
    }
    public function get_num_rows($table_name,$field) 
    { 
            $this->db->select($field);
            $getData = $this->db->get($table_name);
            if($getData->num_rows() > 0) 
            { return $getData->num_rows(); } 
            else 
            { return FALSE; } 
    }
    function get_experts_with_limit($perPage,$uri) 
        { //to get all data in tb_book
            $this->load->database('default', TRUE);
            $this->db->select('tmst_dosen.Gelar_akademik_depan,tmst_dosen.Nama_dosen,tmst_dosen.Nip_lama,tmst_dosen.Gelar_akademik_belakang,tmst_jurusan.Nama_jurusan,tmst_dosen.Nip_baru')
            ->join('tmst_jurusan','tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan','left')
            ->join('tref_status_aktivitas_dosen','tmst_dosen.Status_aktif=tref_status_aktivitas_dosen.Kode_status_aktivitas_dosen','left');
            $getData = $this->db->get('tmst_dosen');
            
            $datax['counts']=$getData->num_rows();
             $this->db->limit($perPage, $uri);
            $this->db->select('tmst_dosen.Gelar_akademik_depan,tmst_dosen.Nama_dosen,tmst_dosen.Nip_lama,tmst_dosen.Gelar_akademik_belakang,tmst_fakultas.Nama_fakultas,tmst_jurusan.Nama_jurusan,tref_status_aktivitas_dosen.Nama_status,tmst_dosen.Nip_baru')
            ->join('tmst_jurusan','tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan','left')
            ->join('tmst_fakultas','tmst_jurusan.Kode_fakultas=tmst_fakultas.Kode_fakultas','left')
            ->join('tref_status_aktivitas_dosen','tmst_dosen.Status_aktif=tref_status_aktivitas_dosen.Kode_status_aktivitas_dosen','left');
            $query = $this->db->get('tmst_dosen');
            if($query->num_rows() > 0)
            {
                $datax['details']=$query->result_array();
                $no=0;
                foreach ($query->result() as $row)
                {
                     $datax['details'][$no]['journals']=$this->get_total_act($row->Nip_lama,'journals');
                     $datax['details'][$no]['conferences']=$this->get_total_act($row->Nip_lama,'conferences');
                     $no++;
                }
                return $datax;
            }
            else
            return null;
       }
       
       
       function get_publications_with_limit($perPage,$uri) 
        { //to get all data in tb_book
            $this->load->database('default', TRUE);
            $this->db->select('tmst_dosen.Gelar_akademik_depan,tmst_dosen.Nama_dosen,tmst_dosen.Nip_lama,tmst_dosen.Nip_baru,tmst_dosen.Gelar_akademik_belakang,tmst_jurusan.Nama_jurusan,CAST(media_publikasi AS TEXT) AS media_publikasi, Periode_penelitian, CAST(Judul_penelitian AS TEXT) AS Judul_penelitian');
            $this->db->join('tmst_dosen', 'tmst_dosen.Nip_lama=tran_publikasi_dosen_tetap.Nip_lama', 'left')
                     ->join('tmst_jurusan','tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan','left')
					 ->join('tref_status_aktivitas_dosen','tmst_dosen.Status_aktif=tref_status_aktivitas_dosen.Kode_status_aktivitas_dosen','left');
            $query = $this->db->get('tran_publikasi_dosen_tetap');
            
            $datax['counts']=$query->num_rows();
            $this->db->limit($perPage, $uri);
            $this->db->select('tmst_dosen.Gelar_akademik_depan,tmst_dosen.Nama_dosen,tmst_dosen.Nip_lama,tmst_dosen.Nip_baru,tmst_dosen.Gelar_akademik_belakang,tmst_fakultas.Nama_fakultas,tmst_jurusan.Nama_jurusan,CAST(media_publikasi AS TEXT) AS media_publikasi, Periode_penelitian, CAST(Judul_penelitian AS TEXT) AS Judul_penelitian, Kode_publikasi_dosen_tetap, tref_status_aktivitas_dosen.Nama_status');
            $this->db->join('tmst_dosen', 'tmst_dosen.Nip_lama=tran_publikasi_dosen_tetap.Nip_lama', 'left')
                     ->join('tmst_jurusan','tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan','left')
                     ->join('tmst_fakultas','tmst_jurusan.Kode_fakultas=tmst_fakultas.Kode_fakultas','left')
					 ->join('tref_status_aktivitas_dosen','tmst_dosen.Status_aktif=tref_status_aktivitas_dosen.Kode_status_aktivitas_dosen','left');
            $query = $this->db->get('tran_publikasi_dosen_tetap');
            if($query->num_rows() > 0)
            {
                $datax['details']=$query->result_array();
				$no=0;
                foreach ($query->result() as $row)
                {
                     $datax['details'][$no]['journals']=$this->get_total_act($row->Nip_lama,'journals');
                     $datax['details'][$no]['conferences']=$this->get_total_act($row->Nip_lama,'conferences');
                     $no++;
                }
                return $datax;
            }
            else
            return null;
       }
       
       function get_publications_with_code($kode) 
       { //to get all data in tb_book
           $this->load->database('default', TRUE);
            $this->db->select('tmst_kualifikasi_dosen.nama_kualifikasi,tref_detail_publikasi.Nama_jenis_publikasi,tmst_dosen.Gelar_akademik_depan,tmst_dosen.Nama_dosen,tmst_dosen.Nip_lama,tmst_dosen.Gelar_akademik_belakang,tmst_fakultas.Nama_fakultas,tmst_jurusan.Nama_jurusan,tmst_jurusan.Nama_jurusan_en,CAST(media_publikasi AS TEXT) AS media_publikasi,  Periode_penelitian, CAST(Judul_penelitian AS TEXT) AS Judul_penelitian, Kode_publikasi_dosen_tetap, Link_url,Link_file ,CAST(Abstrak AS TEXT) AS Abstrak,CAST(Pengarang AS TEXT) AS Pengarang,CAST(Keterangan AS TEXT) AS Keterangan');
            $this->db->join('tmst_dosen', 'tmst_dosen.Nip_lama=tran_publikasi_dosen_tetap.Nip_lama', 'left')
                     ->join('tmst_jurusan','tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan','left')
                     ->join('tmst_fakultas','tmst_jurusan.Kode_fakultas=tmst_fakultas.Kode_fakultas','left')
                    ->join('tmst_kualifikasi_dosen','tmst_kualifikasi_dosen.kode_kualifikasi=tran_publikasi_dosen_tetap.Kategori_riset','left')
                    ->join('tref_detail_publikasi','tref_detail_publikasi.Kode_media_publikasi=tran_publikasi_dosen_tetap.Media_publikasi','left');
            $this->db->where('Kode_publikasi_dosen_tetap',$kode);
            $query = $this->db->get('tran_publikasi_dosen_tetap');
            if($query->num_rows() > 0)
            {
                foreach ($query->result() as $row)
                {
                   return $row;
                }
            }
            else
            return null;
       }
       
       
       function get_all_experts() 
        { //to get all data in tb_book
            $this->load->database('default', TRUE);
            $this->db->select('tmst_dosen.*,tmst_jurusan.Nama_jurusan as Nama_jurusan,tref_status_aktivitas_dosen.Nama_status as Nama_status')
            ->join('tmst_jurusan','tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan','left')
            ->join('tref_status_aktivitas_dosen','tmst_dosen.Status_aktif=tref_status_aktivitas_dosen.Kode_status_aktivitas_dosen','left');
            $query = $this->db->get('tmst_dosen');
            if($query->num_rows() > 0)
            {
                $no=0;
                foreach ($query->result() as $row)
                {
                     $datax['details'][$no]['journals']=$this->get_total_act($row->Nip_lama,'journals');
                     $datax['details'][$no]['conferences']=$this->get_total_act($row->Nip_lama,'conferences');
                     $no++;
                }
                return $datax;
            }
            else
            return null;
       }
	   
	   function get_all_fakultas() 
        { //to get all data in tb_book
            $this->load->database('default', TRUE);
            $sql = "SELECT Nama_fakultas_en,Nama_fakultas, Kode_fakultas from tmst_fakultas
		  ORDER BY Kode_fakultas ASC";
           $query = $this->db->query($sql);
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
            else {
               return null;
            }
       }
	   function get_all_jurusan() 
        { //to get all data in tb_book
            $this->load->database('default', TRUE);
            $sql = "SELECT Nama_jurusan_en,Nama_jurusan, Kode_fakultas from tmst_jurusan
		  ORDER BY Kode_fakultas ASC";
           $query = $this->db->query($sql);
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
            else {
               return null;
            }
       }
	   function  get_nama_jurusan_en($nama)
       {
           $this->load->database('default', TRUE);
           $this->db->select('*');
           $query = $this->db->get_where('tmst_jurusan',array('Nama_jurusan' => $nama));
           if($query->num_rows() > 0)
           {
               foreach ($query->result() as $row)
                {
                   return $row->Nama_jurusan_en;
                }
           }
            else {
               return null;
            }
           
       }
      
       function get_top_experts($lim) 
        { //to get all data in tb_book
            $this->load->database('default', TRUE);
            $this->db->select('tmst_dosen.*,tmst_jurusan.Nama_jurusan')
            ->join('tmst_jurusan','tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan','left');
            $this->db->where('tmst_dosen.Jabatan_fungsional','1');
			$this->db->order_by("Pangkat", "desc"); 
            $this->db->limit($lim);
            $query = $this->db->get('tmst_dosen');
            if($query->num_rows() > 0)
            {
                $datax['details']=$query->result_array();
                $no=0;
                foreach ($query->result() as $row)
                {
                     $datax['details'][$no]['journals']=$this->get_total_act($row->Nip_lama,'journals');
                     $datax['details'][$no]['conferences']=$this->get_total_act($row->Nip_lama,'conferences');
                     $no++;
                }
                return $datax;
            }
            else
            return null;
       }
       
       
       function  get_jurusan($kode)
       {
           $query = $this->db->get_where('tmst_jurusan',array('Kode_jurusan' => $kode));
           if($query->num_rows() > 0)
           {
             return   $query->result_array();
           }
            else {
               return null;
            }
           
       }
       function  get_image($nip)
       {
           $this->db->select('*');
           $query = $this->db->get_where('biodata',array('nip' => $nip));
           if($query->num_rows() > 0)
           {
               foreach ($query->result() as $row)
                {
                   return $row->foto;
                }
           }
            else {
               return null;
            }
           
       }
        function  get_nip_baru($nip)
       {
           $this->load->database('default', TRUE);
           $this->db->select('Nip_baru');
           $query = $this->db->get_where('tmst_dosen',array('Nip_lama' => $nip));
           if($query->num_rows() > 0)
           {
               foreach ($query->result() as $row)
                {
                   return $row->Nip_baru;
                }
           }
            else {
               return null;
            }
           
       }
       function  get_detail($nip)
       {
           $this->load->database('default', TRUE);
          
           $this->db->select('tmst_dosen.*,tmst_jurusan.Nama_jurusan,tmst_jurusan.Nama_jurusan_en,tmst_fakultas.Nama_fakultas,tref_status_aktivitas_dosen.Nama_status')
            ->join('tmst_jurusan','tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan','left')
            ->join('tmst_fakultas','tmst_fakultas.Kode_fakultas=tmst_jurusan.Kode_fakultas','left')
            ->join('tref_status_aktivitas_dosen','tmst_dosen.Status_aktif=tref_status_aktivitas_dosen.Kode_status_aktivitas_dosen','left');
           $this->db->where('tmst_dosen.Nip_lama ="'.$nip.'"'); 
           $query = $this->db->get('tmst_dosen');
           if($query->num_rows() > 0)
           {
               foreach ($query->result() as $row)
                {
                    $row->journals=$this->get_total_act($row->Nip_lama,'journals');
                    $row->conferences=$this->get_total_act($row->Nip_lama,'conferences');
                   return $row;
                }
           }
            else {
               return null;
            }
           
       }
       function  get_detail_riwayat_pend($nip)
       {
           $this->load->database('default', TRUE);
           $sql = "SELECT waktumulai, waktuakhir, keterangan
		  FROM riwayat WHERE koderiwayat = '1' AND nip = '$nip'
		  ORDER BY waktumulai DESC";
           $query = $this->db->query($sql);
           if($query->num_rows() > 0)
           {
                return $query->result();
           }
            else {
               return null;
            }
           
       }
        function  get_detail_riwayat_jab($nip)
       {
           $this->load->database('default', TRUE);
           $sql = "SELECT waktumulai, waktuakhir, keterangan
		  FROM riwayat WHERE koderiwayat = '2' AND nip = '$nip'
		  ORDER BY waktumulai DESC";
           $query = $this->db->query($sql);
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
            else {
               return null;
            }
       }
       function  get_detail_penghargaan($nip)
       {
           $this->load->database('default', TRUE);
           $sql = "SELECT *
		  FROM penghargaan_dosen WHERE nipn = '$nip'
		  ORDER BY tahun DESC";
           $query = $this->db->query($sql);
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
            else {
               return null;
            }
       }
       function  get_detail_kegiatan($nip)
       {
           $this->load->database('default', TRUE);
           $sql = "SELECT *
		  FROM tran_kegiatan_dosen_tetap WHERE nip = '$nip'";
           $query = $this->db->query($sql);
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
            else {
               return null;
            }
       }
      
       function  get_detail_materi($nip_lama,$nip_baru)
       {
           $this->load->database('default', TRUE);
           
           $this->db->select('*');
           $this->db->where('LTRIM(RTRIM(tran_materi_dosen.Nip)) ="'.$nip_baru.'" OR tran_materi_dosen.Nip ="'.$nip_lama.'" ');
           $query = $this->db->get('tran_materi_dosen');
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
            else {
               return null;
            }
       }
       function  get_detail_pengabdian($nip_lama,$nip_baru)
       {
           $this->load->database('default', TRUE);
           
           $this->db->select('*');
           $this->db->where('LTRIM(RTRIM(tran_pengabdian_masyarakat.nipn)) ="'.$nip_baru.'" OR tran_pengabdian_masyarakat.nipn="'.$nip_lama.'"');
           $this->db->order_by('tahun','DESC');
           $query = $this->db->get('tran_pengabdian_masyarakat');
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
            else {
               return null;
            }
       }
       function  get_detail_kualifkasi($nip_lama,$nip_baru,$type)
       {
           $this->load->database('default', TRUE);
           
           $this->db->select('*')
            ->join('tmst_kualifikasi_dosen','tmst_kualifikasi_dosen.kode_kualifikasi=tran_kualifikasi_dosen.kode_kualifikasi','left');
           $this->db->where('LTRIM(RTRIM(tran_kualifikasi_dosen.nip_lama)) ="'.$nip_baru.'" OR tran_kualifikasi_dosen.nip_lama ="'.$nip_lama.'" AND tmst_kualifikasi_dosen.jenis_kualifikasi ="'.$type.'"');
           $query = $this->db->get('tran_kualifikasi_dosen');
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
            else {
               return null;
            }
       }

	   
		function  get_top_qualification()
		{
				$this->load->database('default', TRUE);
				/*
				$sql = "SELECT * FROM
						(
							SELECT kode_kualifikasi, count(kode_kualifikasi) as total
							FROM tran_kualifikasi_dosen
							GROUP BY kode_kualifikasi
							ORDER BY total DESC
						)
						";
				*/
				
				//$this->db->select('COUNT(tran_kualifikasi_dosen.kode_kualifikasi) as total');
				$this->db->select('tmst_kualifikasi_dosen.nama_kualifikasi, tran_kualifikasi_dosen.kode_kualifikasi,count(tran_kualifikasi_dosen.kode_kualifikasi) as total');
				$this->db->join('tmst_kualifikasi_dosen','tmst_kualifikasi_dosen.kode_kualifikasi=tran_kualifikasi_dosen.kode_kualifikasi','left');
				$this->db->where('tmst_kualifikasi_dosen.jenis_kualifikasi','2');
				$this->db->group_by('tran_kualifikasi_dosen.kode_kualifikasi, tmst_kualifikasi_dosen.nama_kualifikasi');
				$this->db->order_by("total","desc");
				$this->db->limit(10);
				
				$query = $this->db->get('tran_kualifikasi_dosen');
				if($query->num_rows() > 0)
				{
					return $query->result();
				}
				else
				{
					return null;
				}
		}
		
	   function  get_top_kualifikasi()
       {
           $this->load->database('default', TRUE);
           
           $this->db->select('nama_kualifikasi')
            ->join('tmst_kualifikasi_dosen','tmst_kualifikasi_dosen.kode_kualifikasi=tran_kualifikasi_dosen.kode_kualifikasi','left');
           $this->db->where('tmst_kualifikasi_dosen.jenis_kualifikasi ="2"');
		   $this->db->order_by("nama_kualifikasi", "asc"); 
		   $this->db->distinct();
		   $this->db->limit(14);
           $query = $this->db->get('tran_kualifikasi_dosen');
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
            else {
               return null;
            }
       }
	   
	   	function get_author($kode_pub)
	    {
			echo $kode_pub;
			$this->load->database('default', TRUE);
			$this->db->select('*')
            ->join('tran_anggota_penelitian_dosen','tran_anggota_penelitian_dosen.nip_lama = tmst_dosen.nip_lama','left');
			$this->db->where('tran_anggota_penelitian_dosen.kode_publikasi_dosen_tetap = '.$kode_pub.'');
			$query = $this->db->get('tmst_dosen');
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
            else {
               return null;
            }
					
		}
		
		
	   
		function  get_detail_publikasi($nip)
		{	
           $this->load->database('default', TRUE);
           $sql = "SELECT Periode_penelitian, CAST(Judul_penelitian AS TEXT) AS Judul_penelitian, Kode_publikasi_dosen_tetap, Media_publikasi, Pengarang
		  FROM tran_publikasi_dosen_tetap WHERE Nip_lama = '$nip'
		  ORDER BY Periode_penelitian DESC";
           $query = $this->db->query($sql);
           if($query->num_rows() > 0)
           {
				
               return $query->result();
           }
            else {
               return null;
            }
       }
	   function get_student_thesis($nip_baru)
       {
           $this->load->database('default', TRUE);
           /*$sql = "SELECT nim, nidn_promotor, judul_skripsi_id_penuh as judul_skripsi 
					FROM tmst_mahasiswa_rifi 
                   WHERE nidn_promotor = '$nip_baru'";
				   
           $query = $this->db->query($sql);*/
		   $this->db->select('*')
            ->join('tmst_mahasiswa_rifi','tmst_mahasiswa_rifi.nim = tmst_mahasiswa.nim','left');
           $this->db->where('tmst_mahasiswa_rifi.nidn_promotor = "'.$nip_baru.'"');
           $query = $this->db->get('tmst_mahasiswa');
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
            else {
               return null;
            }
           
       }
	   
	   function  get_detail_penelitian($nip)
       {
           $this->load->database('default', TRUE);
           $sql = "SELECT Periode_penelitian, CAST(Judul_penelitian AS TEXT) AS Judul_penelitian, Kode_publikasi_dosen_tetap
		  FROM tran_publikasi_dosen_tetap WHERE Nip_lama = '$nip' AND Jenis_penelitian='A'
		  ORDER BY Periode_penelitian DESC";
           $query = $this->db->query($sql);
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
            else {
               return null;
            }
       }
       function  get_top_publikasi($lim)
       {
           
           $this->load->database('default', TRUE);
           $this->db->select('tmst_dosen.Gelar_akademik_depan,tmst_dosen.Nama_dosen,tmst_dosen.Nip_lama,tmst_dosen.Nip_baru,tmst_dosen.Gelar_akademik_belakang,tmst_jurusan.Nama_jurusan,CAST(media_publikasi AS TEXT) AS media_publikasi, Periode_penelitian, Pengarang, CAST(Judul_penelitian AS TEXT) AS Judul_penelitian, Kode_publikasi_dosen_tetap');
           $this->db->join('tmst_dosen', 'tmst_dosen.Nip_lama=tran_publikasi_dosen_tetap.Nip_lama', 'left')
                    ->join('tmst_jurusan','tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan','left');
           $this->db->limit($lim);
           $this->db->order_by('Periode_penelitian','DESC');
           $query = $this->db->get('tran_publikasi_dosen_tetap');
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
            else {
               return null;
            }
       }
       function  get_total_act($nip,$type)
       {
           $this->load->database('default', TRUE);
           $sql = "select media_publikasi as pub,count(*) as count  from tran_publikasi_dosen_tetap 
               where Nip_lama='$nip' group by(media_publikasi)";
           $query = $this->db->query($sql);
           $count=0;
           if($query->num_rows() > 0)
           {
               foreach ($query->result() as $row)
                {
                   if(($row->pub=='E'||$row->pub=='F'||$row->pub=='G')&&($type=='journals'))
                   {
                       $count+=$row->count;
                   }
                   
                   if(($row->pub=='B'||$row->pub=='C'||$row->pub=='D')&&($type=='conferences'))
                   {
                       $count+=$row->count;
                   }
                }
           }
           return $count; 
       }
    
    
}
?>