<?php
class Index_model extends CI_Model {
    function Index_model() {
       parent::__construct();
    }
   
	   function get_num_rows($tabel)
		{
			$sql = "SELECT SUM (row_count) as count
			FROM sys.dm_db_partition_stats
			WHERE object_id=OBJECT_ID('".$tabel."')
			AND (index_id=0 or index_id=1)";
           $query = $this->db->query($sql);
		   if($query->num_rows() > 0)
           {
               foreach ($query->result() as $row)
                {
				  return $row->count;
				}
			}
			else return null;
		}
		public function get_num_rows_indexed() 
    { 
            $this->db->select("Kode_publikasi_dosen_tetap");
			$this->db->from("tran_publikasi_dosen_tetap");
			$this->db->where("Index_lucene", 1);
            $getData = $this->db->get();
            if($getData->num_rows() > 0) 
            { return $getData->num_rows(); } 
            else 
            { return FALSE; } 
    }
	
		function get_experts_with_limit($perPage,$uri) 
        { 
			$sql = "select * FROM( SELECT *, ROW_NUMBER() over (ORDER BY Nip_lama ) as ct 
			from  tmst_dosen ) sub where ct > ".$uri."  and ct <= ".$perPage."";
           $query = $this->db->query($sql);
		   
            if($query->num_rows() > 0)
            {
                $datax['details']=$query->result_array();
                $no=0;
                foreach ($datax['details'] as $row)
                {
                     if($row['Nip_lama']) $datax['details'][$no]['journals']=$this->get_total_act($row['Nip_lama'],'journals');
					 else $datax['details'][$no]['journals']=0;
                     if($row['Nip_lama']) $datax['details'][$no]['conferences']=$this->get_total_act($row['Nip_lama'],'conferences');
					 else $datax['details'][$no]['conferences']=0;
					 if($row['Kode_jurusan']) $datax['details'][$no]['Nama_jurusan']=$this->get_jurusan($row['Kode_jurusan']);
					 if($row['Kode_jurusan']) $datax['details'][$no]['Nama_fakultas']=$this->get_fakultas($datax['details'][$no]['Nama_jurusan']);
					 if($row['Status_aktif']) $datax['details'][$no]['Nama_status']=$this->get_status($row['Status_aktif']);
                     $no++;
					
                }
                return $datax;
            }
            else
            return null;
       }  
        function get_publications_with_limit($perPage,$uri) 
        { 
            $this->db->limit($perPage, $uri);
            $this->db->select('tmst_dosen.Gelar_akademik_depan,tmst_dosen.Nama_dosen,tmst_dosen.Nip_lama,tmst_dosen.Nip_baru,tmst_dosen.Gelar_akademik_belakang,tmst_fakultas.Nama_fakultas,tmst_jurusan.Nama_jurusan,CAST(media_publikasi AS TEXT) AS media_publikasi, Periode_penelitian, CAST(Judul_penelitian AS TEXT) AS Judul_penelitian, Kode_publikasi_dosen_tetap, tref_status_aktivitas_dosen.Nama_status');
            $this->db->from('tran_publikasi_dosen_tetap');
			$this->db->join('tmst_dosen', 'tmst_dosen.Nip_lama=tran_publikasi_dosen_tetap.Nip_lama', 'left')
                     ->join('tmst_jurusan','tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan','left')
                     ->join('tmst_fakultas','tmst_jurusan.Kode_fakultas=tmst_fakultas.Kode_fakultas','left')
					 ->join('tref_status_aktivitas_dosen','tmst_dosen.Status_aktif=tref_status_aktivitas_dosen.Kode_status_aktivitas_dosen','left');
			$this->db->where('tran_publikasi_dosen_tetap.Index_lucene',NULL);
            $query = $this->db->get();
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
	   function get_jurusan($kode)
	    {
			$sql = "select Nama_jurusan from tmst_jurusan 
               where Kode_jurusan='$kode'";
           $query = $this->db->query($sql);
		   if($query->num_rows() > 0)
           {
               foreach ($query->result() as $row)
                {
				   return $row->Nama_jurusan;
				}
			}
			else return null;
	   }
	   function get_dosen($kode)
	    {
			$sql = "select * from tmst_dosen 
               where Nip_lama='$kode'";
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
	   function get_fakultas($kode)
	    {
			$sql = "select Nama_fakultas from tmst_fakultas 
               where Kode_fakultas='$kode'";
           $query = $this->db->query($sql);
		   if($query->num_rows() > 0)
           {
               foreach ($query->result() as $row)
                {
				   return $row->Nama_fakultas;
				}
			}
			else return null;
	   }
	   function get_status($kode)
	    {
			$sql = "select Nama_status from tref_status_aktivitas_dosen 
               where Kode_status_aktivitas_dosen='$kode'";
           $query = $this->db->query($sql);
		   if($query->num_rows() > 0)
           {
               foreach ($query->result() as $row)
                {
				   return $row->Nama_status;
				}
			}
			else return null;
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
		 function  get_detail_kualifkasi($nip_lama,$nip_baru,$type)
       {
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
	   
	   function  insert_lucene($count,$date,$index)
       {
			$sql="insert into tref_user_lucene (count,date,index_name) values('".$count."','".$date."','".$index."')";
			$status=$this->db->query($sql);
			if($status)
			{
				return true;
			}
			else
			return false;
       }
	   function  update_index_lucene($kode)
       {
			$data = array(
               'Index_lucene' => 1
            );

			$this->db->where('Kode_publikasi_dosen_tetap', $kode);
			$this->db->update('tran_publikasi_dosen_tetap', $data); 
       }
	   
		
       
    
    
}
?>