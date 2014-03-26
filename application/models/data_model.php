<?php
class Data_model extends CI_Model {
    function Data_model() {
       parent::__construct();
    }
  
	function  get_detail_kualifkasi($nip_lama,$nip_baru,$type)
       {
           
           
           $this->db->select('*')
            ->join('tmst_kualifikasi_dosen','tmst_kualifikasi_dosen.kode_kualifikasi=tran_kualifikasi_dosen.kode_kualifikasi','left');
           $this->db->where('LTRIM(RTRIM(tran_kualifikasi_dosen.nip_lama)) ="'.$nip_baru.'" OR tran_kualifikasi_dosen.nip_lama ="'.$nip_lama.'" AND tmst_kualifikasi_dosen.jenis_kualifikasi ="'.$type.'"');
           $query = $this->db->get('tran_kualifikasi_dosen');
		   
		    $sql="SELECT *
				FROM tran_kualifikasi_dosen
				LEFT JOIN tmst_kualifikasi_dosen
				ON tmst_kualifikasi_dosen.kode_kualifikasi=tran_kualifikasi_dosen.kode_kualifikasi
				WHERE 
				LTRIM(RTRIM(tran_kualifikasi_dosen.nip_lama)) ='".$nip_baru."' OR tran_kualifikasi_dosen.nip_lama ='".$nip_lama."' AND tmst_kualifikasi_dosen.jenis_kualifikasi ='".$type."'
				
				";
            $query = $this->db->query($sql);
			
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
            else {
               return null;
            }
       }
	   
   function get_top_experts($lim) 
        { 
			$sql="SELECT TOP ".$lim."tmst_dosen.Nip_lama, tmst_dosen.Gelar_akademik_depan,tmst_dosen.Gelar_akademik_belakang,tmst_dosen.Nama_dosen,tmst_jurusan.Nama_jurusan
				FROM tmst_dosen
				LEFT JOIN tmst_jurusan
				ON tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan";
            $query = $this->db->query($sql);
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
	   function  get_total_act($nip,$type)
       {
           
           $sql = "select media_publikasi as pub,count(*) as count  from tran_publikasi_dosen_tetap 
               where Nip_lama='".$nip."' group by(media_publikasi)";
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
	   function  get_top_publikasi($lim)
       {
           
		   $sql="SELECT TOP ".$lim." tmst_dosen.Gelar_akademik_depan,tmst_dosen.Nama_dosen,tmst_dosen.Nip_lama,tmst_dosen.Nip_baru,tmst_dosen.Gelar_akademik_belakang,tmst_jurusan.Nama_jurusan,CAST(media_publikasi AS TEXT) AS media_publikasi, Periode_penelitian, CAST(Judul_penelitian AS TEXT) AS Judul_penelitian, Kode_publikasi_dosen_tetap
				FROM tran_publikasi_dosen_tetap
				LEFT JOIN tmst_dosen
				ON tmst_dosen.Nip_lama=tran_publikasi_dosen_tetap.Nip_lama
				LEFT JOIN tmst_jurusan
				ON tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan
				ORDER BY tran_publikasi_dosen_tetap.Periode_penelitian DESC
				
				";
            $query = $this->db->query($sql);
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
            else {
               return null;
            }
       }
	   function  get_nip_baru($nip)
       {
         
		   $sql = "SELECT Nip_baru
		  FROM tmst_dosen WHERE Nip_lama = '".$nip."'";
           $query = $this->db->query($sql);
		   
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
		   $sql = "SELECT tmst_dosen.*,tmst_jurusan.Nama_jurusan,tmst_jurusan.Nama_jurusan_en,tmst_fakultas.Nama_fakultas,tref_status_aktivitas_dosen.Nama_status
				FROM tmst_dosen
				LEFT JOIN tmst_jurusan
				ON tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan
				LEFT JOIN tmst_fakultas
				ON tmst_fakultas.Kode_fakultas=tmst_jurusan.Kode_fakultas
				LEFT JOIN tref_status_aktivitas_dosen
				ON tmst_dosen.Status_aktif=tref_status_aktivitas_dosen.Kode_status_aktivitas_dosen
				";
           $query = $this->db->query($sql);
		   
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
           
           $sql = "SELECT *
		  FROM penghargaan_dosen WHERE nipn = '".$nip."'
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
           
           $sql = "SELECT *
		  FROM tran_kegiatan_dosen_tetap WHERE nip = '".$nip."'";
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
		   $sql = "SELECT *
		  FROM tran_materi_dosen 
		  WHERE 
		  LTRIM(RTRIM(tran_materi_dosen.Nip)) ='".$nip_baru."' OR tran_materi_dosen.Nip ='".$nip_lama."'
		  ";
           $query = $this->db->query($sql);
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
		   $sql = "SELECT *
		  FROM tran_pengabdian_masyarakat 
		  WHERE 
		  LTRIM(RTRIM(tran_pengabdian_masyarakat.nipn)) ='".$nip_baru."' OR tran_pengabdian_masyarakat.nipn='".$nip_lama."'
		  ORDER BY tahun DESC
		  ";
           $query = $this->db->query($sql);
		   
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
           
           $sql = "SELECT Periode_penelitian, CAST(Judul_penelitian AS TEXT) AS Judul_penelitian, Kode_publikasi_dosen_tetap
		  FROM tran_publikasi_dosen_tetap WHERE Nip_lama = '".$nip."' AND Jenis_penelitian='B'
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
           
           $sql = "SELECT nidn_promotor, judul_skripsi_id_penuh as judul_skripsi FROM tmst_mahasiswa_rifi
                   WHERE nidn_promotor = '$nip_baru'";
           $query = $this->db->query($sql);
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
           
           $sql = "SELECT Periode_penelitian, CAST(Judul_penelitian AS TEXT) AS Judul_penelitian, Kode_publikasi_dosen_tetap
		  FROM tran_publikasi_dosen_tetap WHERE Nip_lama = '".$nip."' AND Jenis_penelitian='A'
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
	   
       function get_publications_with_code($kode) 
       { 
			$sql="SELECT tmst_kualifikasi_dosen.nama_kualifikasi,tref_detail_publikasi.Nama_jenis_publikasi,tmst_dosen.Gelar_akademik_depan,tmst_dosen.Nama_dosen,tmst_dosen.Nip_lama,tmst_dosen.Gelar_akademik_belakang,tmst_fakultas.Nama_fakultas,tmst_jurusan.Nama_jurusan,tmst_jurusan.Nama_jurusan_en,CAST(media_publikasi AS TEXT) AS media_publikasi,  Periode_penelitian, CAST(Judul_penelitian AS TEXT) AS Judul_penelitian, Kode_publikasi_dosen_tetap, Link_url,Link_file ,CAST(Abstrak AS TEXT) AS Abstrak,CAST(Pengarang AS TEXT) AS Pengarang,CAST(Keterangan AS TEXT) AS Keterangan
				FROM tran_publikasi_dosen_tetap
				LEFT JOIN tmst_dosen
				ON tmst_dosen.Nip_lama=tran_publikasi_dosen_tetap.Nip_lama
				LEFT JOIN tmst_jurusan
				ON tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan
				LEFT JOIN tmst_fakultas
				ON tmst_jurusan.Kode_fakultas=tmst_fakultas.Kode_fakultas
				LEFT JOIN tmst_kualifikasi_dosen
				ON tmst_kualifikasi_dosen.kode_kualifikasi=tran_publikasi_dosen_tetap.Kategori_riset
				LEFT JOIN tref_detail_publikasi
				ON tref_detail_publikasi.Kode_media_publikasi=tran_publikasi_dosen_tetap.Media_publikasi
				
				";
            $query = $this->db->query($sql);
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
    
		function  get_nama_jurusan_en($nama)
       {

           
		   $sql = "SELECT *
		   FROM tmst_jurusan WHERE Nama_jurusan = '".$nama."' ";
           $query = $this->db->query($sql);
		   
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
	   function get_all_fakultas() 
        { //to get all data in tb_book
            
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

	    function get_count($index)
	    {
			$sql = "select count, date from tref_user_lucene 
               where index_name='$index' ORDER BY id DESC";
           $query = $this->db->query($sql);
		   if($query->num_rows() > 0)
           {
               foreach ($query->result() as $row)
                {
				   return $row;
				}
			}
			else return null;
	   }
	   function  get_histories($kode)
       {
           $sql = "select count, date from tref_user_lucene 
               where index_name='$kode' ORDER BY id DESC";
           $query = $this->db->query($sql);
		   if($query->num_rows() > 0)
           {
				   return $query->result();
				
			}
			else return null;
           
       }

	    

}
?>