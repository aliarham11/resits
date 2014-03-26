<?php
class Coba extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('index_model');
		$this->load->model('experts_model');
		$this->load->library('zend');
		$this->zend->load('Zend/Search/Lucene');

		// Location of search index.  Used by all Search controller methods.
		$this->search_index = APPPATH . 'search/experts';
		Zend_Search_Lucene::setDefaultSearchField('all');
		set_time_limit(3600);
		
                
	}
	
	function create_index()
	{
		$index = Zend_Search_Lucene::create($this->search_index);
	}
	function reindex_pub()
	{
		// Create index.  Will delete any existing index.
		//$index = Zend_Search_Lucene::create(APPPATH . 'search/publications');
                
                $count=0;
                // Batasi query agar tidak boros memory
                $limit = 500;
                $start = 0;
               
                $length=$this->index_model->get_num_rows("tran_publikasi_dosen_tetap");
                
                Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_TextNum_CaseInsensitive());
                /*
                Zend_Search_Lucene_Analysis_Analyzer::setDefault(
                new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8Num()
                ); 
                */
                $index = Zend_Search_Lucene::open(APPPATH . 'search/publications');
                $no=0;
                for ($seq = $start; $seq < $length; $seq += $limit)
                {
                        $datax = $this->index_model->get_publications_with_limit($limit,$seq);
                        
                        $rows=$datax['details'];
                       // echo '<pre>'; print_r($rows);exit;
                        if($rows == FALSE)
                        {
                                break;
                        }
                         
                        foreach ($rows as $row)
                        {						
                                // Create Lucene document for this article.
                                $doc = new Zend_Search_Lucene_Document();

                                // Add required fields.
                                $doc->addField(Zend_Search_Lucene_Field::Text('Nip_lama', $row['Nip_lama']));
                                $doc->addField(Zend_Search_Lucene_Field::Text('Nip_baru', $row['Nip_baru']));
                                $doc->addField(Zend_Search_Lucene_Field::Text('Gelar_akademik_depan', $row['Gelar_akademik_depan']));
                                $doc->addField(Zend_Search_Lucene_Field::Text('Nama_dosen', $row['Nama_dosen']));
                                $doc->addField(Zend_Search_Lucene_Field::Text('Gelar_akademik_belakang', $row['Gelar_akademik_belakang']));
                                $doc->addField(Zend_Search_Lucene_Field::Text('Periode_penelitian',$row['Periode_penelitian']));
                                $doc->addField(Zend_Search_Lucene_Field::Text('Judul_penelitian',  $this->CP1251toUTF8($row['Judul_penelitian']) ));
                                $doc->addField(Zend_Search_Lucene_Field::Text('Nama_jurusan', $row['Nama_jurusan']));
                                if($row['media_publikasi'] == 'A' || $row['media_publikasi'] == 'B' || $row['media_publikasi'] == 'C')
                                    $doc->addField(Zend_Search_Lucene_Field::Text('Jenis_pub','proceeding'));
									else
                                if($row['media_publikasi'] == 'E' || $row['media_publikasi'] == 'F' || $row['media_publikasi'] == 'G')
                                    $doc->addField(Zend_Search_Lucene_Field::Text('Jenis_pub','jurnal'));
									else
                                    $doc->addField(Zend_Search_Lucene_Field::Text('Jenis_pub','notdefined'));
                             
                               // $doc->addField(Zend_Search_Lucene_Field::Text('media_publikasi', $row['media_publikasi']));
                                $doc->addField(Zend_Search_Lucene_Field::Text('media_publikasi', $row['media_publikasi']));
                                $doc->addField(Zend_Search_Lucene_Field::Text('Nama_fakultas', $row['Nama_fakultas']));
                                $doc->addField(Zend_Search_Lucene_Field::Text('Kode_publikasi_dosen_tetap', $row['Kode_publikasi_dosen_tetap']));
                                $doc->addField(Zend_Search_Lucene_Field::Text('all', 'yes'));
								$doc->addField(Zend_Search_Lucene_Field::Text('Nama_dosen_lengkap', $row['Gelar_akademik_depan'].$row['Nama_dosen'].$row['Gelar_akademik_belakang']));
								$doc->addField(Zend_Search_Lucene_Field::Text('journals',$row['journals']));
                                $doc->addField(Zend_Search_Lucene_Field::Text('conferences', $row['conferences']));
								$doc->addField(Zend_Search_Lucene_Field::Text('Nama_status', $row['Nama_status']));
								
								$exparea=$this->get_exp_area($row['Nip_lama'],$row['Nip_baru']);
								$doc->addField(Zend_Search_Lucene_Field::Text('Expert_area', $exparea));
								
                                //echo '<pre>'; print_r($no.' '.$row['Kode_publikasi_dosen_tetap']);echo '</pre>';
                                // Add docuument to index.
                                $no++;
                                $index->addDocument($doc);
								$this->index_model->update_index_lucene($row['Kode_publikasi_dosen_tetap']);
								$count++;
                        }
                }

                $index->commit();
                $this->optimize(APPPATH . 'search/publications');
                setlocale (LC_TIME, 'INDONESIA');
				$today = date("F j, Y, g:i a"); 
				$count=$this->index_model->get_num_rows_indexed();
				$query=$this->index_model->insert_lucene($count,$today,"publications");
				if($query) {
				$this->session->set_userdata('publications', true);
				} else $this->session->set_userdata('publications', false); 
				
				redirect('index.php/home', 'refresh');
	}
	
	
	
        function reindex_exp()
	{
				
		// Create index.  Will delete any existing index.
				$index = Zend_Search_Lucene::create(APPPATH . 'search/experts');
		
				$count=0;
                // Batasi query agar tidak boros memory
               
                $start = 0;
				
                $length=$this->index_model->get_num_rows("tmst_dosen");
				//print_r($length);
				//print_r($length); exit();
                $index = Zend_Search_Lucene::open(APPPATH . 'search/experts');

				$datax = $this->index_model->get_experts_with_limit($length,$start);
				$rows=$datax['details'];
			   // print_r($rows); exit();
				if($rows == FALSE)
				{
						break;
				}

				foreach ($rows as $row)
				{	
						
						$doc = new Zend_Search_Lucene_Document();

						// Add required fields.
						$doc->addField(Zend_Search_Lucene_Field::Text('Nip_lama', $row['Nip_lama']));
						$doc->addField(Zend_Search_Lucene_Field::Text('Gelar_akademik_depan', $row['Gelar_akademik_depan']));
						$doc->addField(Zend_Search_Lucene_Field::Text('Nama_dosen', $row['Nama_dosen']));
						$doc->addField(Zend_Search_Lucene_Field::Text('Gelar_akademik_belakang', $row['Gelar_akademik_belakang']));
						$doc->addField(Zend_Search_Lucene_Field::Text('journals',$row['journals']));
						$doc->addField(Zend_Search_Lucene_Field::Text('conferences', $row['conferences']));
						$doc->addField(Zend_Search_Lucene_Field::Text('Nama_jurusan', $row['Nama_jurusan']));
						$doc->addField(Zend_Search_Lucene_Field::Text('Nama_fakultas', $row['Nama_fakultas']));
						$doc->addField(Zend_Search_Lucene_Field::Text('Nama_status', $row['Nama_status']));
						
						$exparea=$this->get_exp_area($row['Nip_lama'],$row['Nip_baru']);
						$doc->addField(Zend_Search_Lucene_Field::Text('Expert_area', $exparea));
						
						$doc->addField(Zend_Search_Lucene_Field::Text('Nama_dosen_lengkap', $row['Gelar_akademik_depan'].$row['Nama_dosen'].$row['Gelar_akademik_belakang']));
						$doc->addField(Zend_Search_Lucene_Field::Text('all', 'yes'));

						// Add docuument to index.
						$index->addDocument($doc);
						$count++;
				}
						
                
				
				
                $index->commit();
                $this->optimize(APPPATH . 'search/experts');
				
				setlocale (LC_TIME, 'INDONESIA');
				$today = date("F j, Y, g:i a"); 
				$query=$this->index_model->insert_lucene($count,$today,"experts");
				if($query) {
				$this->session->set_userdata('experts', true);
				} else $this->session->set_userdata('experts', false); 
				
				redirect('index.php/home', 'refresh');
				
				
				
				//$date = strftime( "%A, %d %B %Y %H%M", time());
				//echo "Saat ini ".$date;
				//echo "Saat ini ".$today;
				
				//exit();
				
                //echo 'SUSKES'; exit();
	}
        function get_exp_area($nip,$nip_baru)
		{
			$result='';
			 $kualifikasis=$this->index_model->get_detail_kualifkasi($nip,$nip_baru,'2');
			 if($kualifikasis == FALSE)
			{
				return $result;
			}
			
			foreach ($kualifikasis as $row)
			{	
				$result=$result.' '.$row->nama_kualifikasi;
			}
			//print_r($result);exit();
			return $result;
		}
		
		
		
       
        
        
        function CP1251toUTF8($string){
            $out = '';
            for ($i = 0; $i<strlen($string); ++$i){
              $ch = ord($string{$i});
              if ($ch < 0x80) $out .= chr($ch);
              else
                if ($ch >= 0xC0)
                  if ($ch < 0xF0)
                       $out .= "\xD0".chr(0x90 + $ch - 0xC0); // &#1040;-&#1071;, &#1072;-&#1087; (A-YA, a-p)
                  else $out .= "\xD1".chr(0x80 + $ch - 0xF0); // &#1088;-&#1103; (r-ya)
                else
                  switch($ch){
                    case 0xA8: $out .= "\xD0\x81"; break; // YO
                    case 0xB8: $out .= "\xD1\x91"; break; // yo
                    // ukrainian
                    case 0xA1: $out .= "\xD0\x8E"; break; // &#1038; (U)
                    case 0xA2: $out .= "\xD1\x9E"; break; // &#1118; (u)
                    case 0xAA: $out .= "\xD0\x84"; break; // &#1028; (e)
                    case 0xAF: $out .= "\xD0\x87"; break; // &#1031; (I..)
                    case 0xB2: $out .= "\xD0\x86"; break; // I (I)
                    case 0xB3: $out .= "\xD1\x96"; break; // i (i)
                    case 0xBA: $out .= "\xD1\x94"; break; // &#1108; (e)
                    case 0xBF: $out .= "\xD1\x97"; break; // &#1111; (i..)
                    // chuvashian
                    case 0x8C: $out .= "\xD3\x90"; break; // &#1232; (A)
                    case 0x8D: $out .= "\xD3\x96"; break; // &#1238; (E)
                    case 0x8E: $out .= "\xD2\xAA"; break; // &#1194; (SCH)
                    case 0x8F: $out .= "\xD3\xB2"; break; // &#1266; (U)
                    case 0x9C: $out .= "\xD3\x91"; break; // &#1233; (a)
                    case 0x9D: $out .= "\xD3\x97"; break; // &#1239; (e)
                    case 0x9E: $out .= "\xD2\xAB"; break; // &#1195; (sch)
                    case 0x9F: $out .= "\xD3\xB3"; break; // &#1267; (u)
                  }
            }
            return $out;
          } 
	
	
	function optimize($ind)
	{
		$index = Zend_Search_Lucene::open($ind);
		$index->optimize();
		$index->commit();
	}
	
	
}
	