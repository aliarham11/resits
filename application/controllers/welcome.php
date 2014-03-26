<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
        public function Welcome()
        {
            parent::__construct();
            $this->load->model('barang_model');
            $this->load->model('pns_model');
            $this->load->model('experts_model');
            $this->load->model('pendapatan');
            
            $this->load->library('pagination'); //call pagination library
            
            $this->load->helper('url');
            $this->load->library('breadcrumb');
            
            $this->load->library('zend');
            $this->zend->load('Zend/Search/Lucene');
			
			$this->load->library('encrypt');
		//	$this->encrypt->set_cipher('MCRYPT_RIJNDAEL_256');
        //  $this->encrypt->set_mode('MCRYPT_MODE_CBC');
			
		}
        
        
        public function exp_detail($nip)
	{
			
			//Dekripsi nip
			$nip = $this->encrypt->decode($nip, 'MY_KEY');
			//
			//$encrypted = $this->encrypt->encode($nip, 'MY_KEY');
			
            if($nip=='')
            {
				header( 'Location: '.  base_url().'' ) ;
            }
            else {
                
                
                $nip_baru=$this->experts_model->get_nip_baru($nip);
                $data['detail']=$this->experts_model->get_detail($nip);
                $data['kegiatan']=$this->experts_model->get_detail_kegiatan($nip);
                //$data['pendidikan']=$this->experts_model->get_detail_riwayat_pend($nip);
				$data['pendidikan']=null;
               // $data['jabatan']=$this->experts_model->get_detail_riwayat_jab($nip);
                $data['penghargaan']=$this->experts_model->get_detail_penghargaan($nip);
                $data['publikasi']=$this->experts_model->get_detail_publikasi($nip);
				$data['penelitian']=$this->experts_model->get_detail_penelitian($nip);
                $data['kualifikasi']=$this->experts_model->get_detail_kualifkasi($nip,$nip_baru,'2');
                $data['pengajaran']=$this->experts_model->get_detail_kualifkasi($nip,$nip_baru,'1');
                $data['materi']=$this->experts_model->get_detail_materi($nip,$nip_baru);
                $data['pengabdian']=$this->experts_model->get_detail_pengabdian($nip,$nip_baru);
				
				$data['sidebar_fakultas']=$this->experts_model->get_all_fakultas();
				$data['sidebar_jurusan']=$this->experts_model->get_all_jurusan();
				$data['skripsi'] = $this->experts_model->get_student_thesis($nip_baru);
                //print_r ($data['sidebar_jurusan']);  exit();
               
			    $resarea= trim($data['detail']->Nama_fakultas);
                //print_r ($resarea); $bresarea="FMIPA"; exit();
                if($resarea=="MATEMATIKA DAN ILMU PENGETAHUAN ALAM") $bresarea="FMIPA"; else
                if($resarea=="TEKNOLOGI INDUSTRI") $bresarea="FTI"; else
                if($resarea=="TEKNIK SIPIL DAN PERENCANAAN") $bresarea="FTSP"; else
                if($resarea=="TEKNOLOGI KELAUTAN") $bresarea="FTK"; else
                if($resarea=="TEKNOLOGI INFORMASI") $bresarea="FTIF"; else
                if($resarea=="PASCASARJANA") $bresarea="PASCA";
                
				if($resarea){
                $this->breadcrumb->add('EXPERTS','index.php/welcome/search/?type=exp')
                                    ->add($bresarea,'index.php/welcome/search/?type=exp&resarea='.$data['detail']->Nama_fakultas)
                                    ->add(strtoupper($data['detail']->Nama_jurusan_en),'index.php/welcome/search/?type=exp&major='.trim($data['detail']->Nama_jurusan).'&resarea='.trim($data['detail']->Nama_fakultas))
                                    ->add($data['detail']->Nama_dosen,'index.php/welcome/exp_detail/'.$data['detail']->Nip_lama);
				}
				else
				{
				$this->breadcrumb->add('EXPERTS','index.php/welcome/search/?type=exp')
                                    ->add($data['detail']->Nama_dosen,'index.php/welcome/exp_detail/'.$data['detail']->Nip_lama);
				}
				
				$this->load->view('header');
				
				//untuk tipe sidebar
				$data['type']='exp';
				
				//untuk generate tahun secara otomatis---
                $taun = date("Y");
                $range2 = $taun - $taun[3];
                $range1 = $range2 - 9;
                $min = $range1 - 1;
                $max = $range2 + 1;
                $data["minTahun"] = $min;
                $data["rangeTahun1"] = $range1;
                $data["rangeTahun2"] = $range2;
                $data["maxTahun"] = $max;
				//------//
				
				//Enkripsi kode publikasi...
                if($data['publikasi'])
                {
                 foreach ($data['publikasi'] as $row)
                 {
                    $row->Kode_publikasi_dosen_tetap = $this->encryption($row->Kode_publikasi_dosen_tetap);
                }
               }
                //----//
               
               
               //Enkripsi kode publikasi pada penelitian
               if($data['penelitian'])
                {
                 foreach ($data['penelitian'] as $row)
                 {
                    $row->Kode_publikasi_dosen_tetap = $this->encryption($row->Kode_publikasi_dosen_tetap);
                }
               }
			   
                //----//
               
               
               
				$data['sidebar_fakultas']=$this->experts_model->get_all_fakultas();
				$data['sidebar_jurusan']=$this->experts_model->get_all_jurusan();
				
				//print_r($data['sidebar_jurusan']); exit();
                $this->load->view('sidebar_menu',$data);
                $this->load->view('experts_detail',$data);
                $this->load->view('footer');
                }
		}
		public function encryption($string)
        {
            $encrypted = $string;
            $string = $this->encrypt->encode($encrypted);
            while(strpos($string,'+') || strpos($string,'-') || strpos($string,'/') || strpos($string,'.')) 
            {
                $string = $encrypted;
                $string = $this->encrypt->encode($encrypted);
            }
            $bug = strlen($string);
                    
            if(substr($string, $bug-1) == '=');
            $string = trim($string,'=');
            return $string;
        }
		
		public function coba_muncul_author($kode)
		{
			$kode = $this->encrypt->decode($kode, 'MY_KEY');
			$data['author'] = $this->experts_model->get_author($kode);
			foreach ($data['author'] as $rows)
			{
				echo $rows->Nama_dosen." ";
			}
		}
		
		public function pub_detail($kode)
	{
			//Dekripsi Kode
			$kode = $this->encrypt->decode($kode, 'MY_KEY');
			//
			if($kode=='')
            {
                header( 'Location: '.  base_url()."" ) ;
            }
            else {
				
               $data['sidebar_fakultas']=$this->experts_model->get_all_fakultas();
				$data['sidebar_jurusan']=$this->experts_model->get_all_jurusan();
                $data['publikasi']=$this->experts_model->get_publications_with_code($kode);
				$data['publikasi']->Nip_lama_encrypt = $this->encryption($data['publikasi']->Nip_lama);
				//$data['author'] = $this->experts_model->get_author($kode);
				$fak= trim($data['publikasi']->Nama_fakultas);
				 if($fak=="MATEMATIKA DAN ILMU PENGETAHUAN ALAM") $fak="FMIPA"; else
                if($fak=="TEKNOLOGI INDUSTRI") $fak="FTI"; else
                if($fak=="TEKNIK SIPIL DAN PERENCANAAN") $fak="FTSP"; else
                if($fak=="TEKNOLOGI KELAUTAN") $fak="FTK"; else
                if($fak=="TEKNOLOGI INFORMASI") $fak="FTIF"; else
                if($fak=="PASCASARJANA") $fak="PASCA";
				
				if($fak!="")
				{
                $this->breadcrumb->add('PUBLICATIONS','index.php/welcome/search/?type=pub')
                                    ->add($fak,'index.php/welcome/search/?type=pub&resarea='.$data['publikasi']->Nama_fakultas)
                                    ->add(strtoupper($data['publikasi']->Nama_jurusan_en),'index.php/welcome/search/?type=pub&resarea='.trim($data['publikasi']->Nama_fakultas).'&major='.$data['publikasi']->Nama_jurusan)
									->add($data['publikasi']->Nama_dosen,'index.php/welcome/search/?type=exp&name='.$data['publikasi']->Nama_dosen.'')->add('','');
                  }                 // ->add($data['publikasi']->Judul_penelitian,'index.php/welcome/pub_detail/'.$data['publikasi']->Kode_publikasi_dosen_tetap);
                //echo '<pre>'; print_r($data['publikasi']->Kode_publikasi_dosen_tetap);exit;
				else
				{
				$this->breadcrumb->add('PUBLICATIONS','index.php/welcome/search/?type=pub');
				}
				
				//untuk tipe sidebar
				$data['type']='pub';
				
				$this->load->view('header');
                $this->load->view('sidebar_menu',$data);
                $this->load->view('publications_detail',$data);
                $this->load->view('footer');
                }
	}
        
        function exp_list(){
                $index = Zend_Search_Lucene::open(APPPATH . 'search/experts');
                $query_result = $index->find('all:"yes"');
               // echo '<pre>'; print_r($query_result);exit;
                $a=count($query_result);
                $offset = $this->uri->segment(3,0);
                $limit = 6;

            // this is the cool part, which you don't know
                $set= array();                                      
                for($i=$offset; $i< $limit + $offset; $i++)
                {
                    if(array_key_exists($i, $query_result)){
                        $set[]= $query_result[$i];
                    }else{
                        break;  
                    }
                }
                
//                $segments = array('welcome','exp_list');
//                $config['base_url'] = site_url($segments);
                $this->breadcrumb->add('EXPERTS','index.php/welcome/search/?type=exp');
                $data['detail']=$set;
//                echo '<pre>'; print_r($query_result);exit;
                $config['base_url'] = base_url().'index.php/welcome/exp_list/'; //set the base url for pagination
                $config['total_rows'] = $a; //total rows
                $config['per_page'] = $limit; //the number of per page for pagination
                $config['uri_segment'] = 3; //see from base_url. 3 for this case
                $config['full_tag_open'] = '<div class="pagination "> <ul>';
                $config['full_tag_close'] = '</ul></div>';
                $config['first_link'] = '';
                $config['first_tag_open'] = '<li class="first">';
                $config['first_tag_close'] = '</li>';
                
                $config['last_link'] = '';
                $config['last_tag_open'] = '<li class="last">';
                $config['last_tag_close'] = '</li>';
                
                $config['prev_link'] = '';
                $config['prev_tag_open'] = '<li class="prev">';
                $config['prev_tag_close'] = '</li>';
                
                $config['next_link'] = '';
                $config['next_tag_open'] = '<li class="next">';
                $config['next_tag_close'] = '</li>';
                
                $config['cur_tag_open'] = '<li class="active"><a>';
                $config['cur_tag_close'] = '</a></li>';
                
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                
                $data['sidebar_fakultas']=$this->experts_model->get_all_fakultas();
				$data['sidebar_jurusan']=$this->experts_model->get_all_jurusan();
                $this->pagination->initialize($config); 
				//untuk tipe sidebar
				$data['type']='exp';
                $this->load->view('header');
                $this->load->view('sidebar_menu', $data);
                $this->load->view('experts_list', $data);
                $this->load->view('footer');
                    
        }
        
        
        function search()
	{
            $type = $this->input->get('type');     
            $name = $this->input->get('name');
            $major = $this->input->get('major');
            $exparea = $this->input->get('exparea');
            $pubdes = $this->input->get('pubdes');
            $resarea = $this->input->get('resarea');
            $year = $this->input->get('year');
            $status = $this->input->get('status');
            $pubtype = $this->input->get('pub_type');
			$medpub = $this->input->get('medpub');
			$search = $this->input->get('search');
            //print_r($search); exit();
            $journals = $this->input->get('journals');
            $proceedings = $this->input->get('proceedings');
            
        
            $data['search']=$search;
			if($search) $ssearch='&search=1'; else $ssearch='&search=0';
            if($status&&$status!='all') {
                $qstatus = ' AND Nama_status:"'.$status.'"'; 
                $sstatus='&status='.$status.'';
                $data['status']=$status;
            }
            else 
            {
                $qstatus='';
                $sstatus='';
                $data['status']='all';
            }
			
			if($medpub&&$medpub!='all') {
                $qmedpub = ' AND media_publikasi:"'.$medpub.'"'; 
                $smedpub='&medpub='.$medpub.'';
                $data['medpub']=$medpub;
            }
            else 
            {
                $qmedpub='';
                $smedpub='';
                $data['medpub']='all';
            }
            
            if($journals=='on'&&$proceedings!='on')
            {
                $qpubtype=' AND Jenis_pub:"jurnal"';
                $spubtype='&journals=on';
                $data['journals']='on';
            }
			else
            if($journals!='on'&&$proceedings=='on')
            {
                $qpubtype=' AND Jenis_pub:"proceeding"';
                $spubtype='&proceedings=on';
                $data['proceedings']='on';
            }
			else
			if($journals=='on'&&$proceedings=='on')
			{
				$qpubtype=' AND (Jenis_pub:"jurnal" OR Jenis_pub:"proceeding")';
                $spubtype='&proceedings=on&journals=on';
                $data['proceedings']='on';
				$data['journals']='on';
			}
			else
			{
				$qpubtype=' AND Jenis_pub:"notdefined"';
                $spubtype='&proceedings=off&journals=off';
                $data['proceedings']='off';
				$data['journals']='off';
			}
			
            
            if($year=='custom')
            {
                $thawal = $this->input->get('thawal');
                $thakhir = $this->input->get('thakhir');
                $qyear=' AND Periode_penelitian : [ '.$thawal.' TO '.$thakhir.' ]';
                $syear='&year=custom&thawal='.$thawal.'&thakhir='.$thakhir.'';
                $data['year']='custom';
                $data['thawal']=$thawal;
                $data['thakhir']=$thakhir;
                
            }
            else
            {
                $qyear='';
                $syear='&year=all';
                $data['year']='all';
                $data['thawal']='';
                $data['thakhir']='';
            }
            
            
			
            if($exparea) {
                $qexparea = ' AND Expert_area:"'.$exparea.'"'; 
                $sexparea='&exparea='.$exparea.'';
                $data['exparea']=$exparea;
            }
            else 
                {
                $qexparea='';
                $sexparea='';
                $data['exparea']='';
                }
            if($pubdes) {
                $qpubdes = ' AND Judul_penelitian:*'.$pubdes.'*'; 
                $spubdes='&pubdes='.$pubdes.'';
                $data['pubdes']=$pubdes;
            }
            else 
                {
                $qpubdes='';
                $spubdes='';
                $data['pubdes']='';
                }
            
            if($name) {
                $qname = ' AND Nama_dosen_lengkap:*'.$name.'*'; 
                $sname='&name='.$name.'';
                $data['name']=$name;
            }
            else 
                {
                $qname='';
                $sname='';
                $data['name']='';
                }
            
            if($resarea&&$resarea!='all') {
                $qresarea = ' AND Nama_fakultas:"'.$resarea.'"'; 
                $sresarea='&resarea='.$resarea.'';
                $data['resarea']=$resarea;
                if($resarea=="MATEMATIKA DAN ILMU PENGETAHUAN ALAM") $bresarea="FMIPA"; else
                if($resarea=="TEKNOLOGI INDUSTRI") $bresarea="FTI"; else
                if($resarea=="TEKNIK SIPIL DAN PERENCANAAN") $bresarea="FTSP"; else
                if($resarea=="TEKNOLOGI KELAUTAN") $bresarea="FTK"; else
                if($resarea=="TEKNOLOGI INFORMASI") $bresarea="FTIF"; else
                if($resarea=="PASCASARJANA") $bresarea="PASCA";
                
            }
            else 
            {
                $qresarea='';
                $sresarea='';
                $data['resarea']='all';
                $bresarea='';
            }
			
            if($major&&$major!='all') {
                $qmajor = ' AND Nama_jurusan:"'.$major.'"'; 
                $smajor='&major='.$major.'';
                $data['major']=$major;
                $bmajor=$major;
                $bmajor=$this->experts_model->get_nama_jurusan_en($major);
                
            }
            else 
            {
                $qmajor='';
                $smajor='';
                $data['major']='all';
                $bmajor='';
                
            }
			
                if($type=='exp') 
                {
                    if($search)
					$index = Zend_Search_Lucene::open(APPPATH . 'search/publications');
					else
					$index = Zend_Search_Lucene::open(APPPATH . 'search/experts');
					
                    $this->breadcrumb->add('EXPERTS','index.php/welcome/search/?type=exp');
                    $sort='Nama_dosen';
                    $limit = 10;
                    $data['type']='exp';
                }
                if($type=='pub') 
                {
                  
                    Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_TextNum_CaseInsensitive());
                    $index = Zend_Search_Lucene::open(APPPATH . 'search/publications');
                    $this->breadcrumb->add('PUBLICATIONS','index.php/welcome/search/?type=pub');
                    $sort='Periode_penelitian';
                    $limit = 6;
                    $data['type']='pub';
                }
                if($bresarea&&$bmajor){
                 $this->breadcrumb->add($bresarea,'index.php/welcome/search/?type='.$type.'&resarea='.$resarea)
                                   ->add(strtoupper($bmajor),'index.php/welcome/search/?type='.$type.'&resarea='.$resarea.'&major='.$major);
//            
                } else
                 if($bresarea){
                 $this->breadcrumb->add($bresarea,'index.php/welcome/search/?type='.$type.'&resarea='.$resarea);
//                                    ->add($major,'index.php/welcome/search/?type=pub&resarea='.$resarea.'&major='.$major);         
                }  
                Zend_Search_Lucene_Search_Query_Wildcard::setMinPrefixLength(0);
//                echo '<pre>'; print_r($minPrefixLength);
//  exit();
                //echo '<pre>'; print_r('all:yes'.$qname.$qyear.$qpubtype.$qpubdes.$qresarea.$qmajor.$qmedpub.'');exit;
               if($type == 'exp')
			   {
				   if($search)
					$query_result = $index->find('all:yes '.$qname.$qyear.$qpubtype.$qpubdes.$qresarea.$qmajor.$qmedpub.$qexparea.$qstatus.'');
				   else
				   $query_result = $index->find('all:yes '.$qname.$qresarea.$qmajor.$qexparea.$qstatus.'');
				   //print_r("masuk");exit();
			   }
               if($type == 'pub')
               {
                   $query_result = $index->find('all:yes'.$qname.$qyear.$qpubtype.$qpubdes.$qresarea.$qmajor.$qmedpub.$qexparea.$qstatus.'');
               }
			   
			   
			  
			   if($type == 'exp')
			   {
					$i=0;
					$query_result_temp=$query_result;
					$query_result=null;
					foreach($query_result_temp as $row)
					{
						$statuss[$row->Nip_lama]=false;
					}
					foreach($query_result_temp as $row)
					{
						if(!$statuss[$row->Nip_lama])
						{
							$query_result[$i]=$row;
							$i++;
							$statuss[$row->Nip_lama]=true;
						}
					}
					$a=count($query_result);
					$index = Zend_Search_Lucene::open(APPPATH . 'search/experts');
					$query_temp= $index->find('all:yes ');
					$data['countall']=count($query_temp);
			   }
			   else
			   {
					$query_temp= $index->find('all:yes ');
				    $data['countall']=count($query_temp);
					$a=count($query_result);
			   }
			   
                
                $data['countresult']=$a;
				
                $offset = $this->uri->segment(3,0);
                $set= array();                                      
                for($i=$offset; $i< $limit + $offset; $i++)
                {
                    if(is_array($query_result)&&array_key_exists($i, $query_result)){
                        $set[]= $query_result[$i];
                    }else{
                        break;  
                    }
                }
                 
                $data['detail']=$set;
				//print_r($data['detail']);exit();
                //echo '<pre>'; print_r($set);exit;
                $config['base_url'] = base_url().'index.php/welcome/search/'; //set the base url for pagination
                $config['suffix']='?type='.$type.$ssearch.$sname.$sresarea.$smajor.$spubdes.$syear.$sstatus.$spubtype.$smedpub.$sexparea.'';
                $config['first_url'] = $config['base_url'].$config['suffix'];
                $config['total_rows'] = $a; //total rows
                $config['per_page'] = $limit; //the number of per page for pagination
                $config['uri_segment'] = 3; //see from base_url. 3 for this case
                $config['full_tag_open'] = '<div class="pagination "> <ul>';
                $config['full_tag_close'] = '</ul></div>';
                $config['first_link'] = '';
                $config['first_tag_open'] = '<li class="first">';
                $config['first_tag_close'] = '</li>';

                $config['last_link'] = '';
                $config['last_tag_open'] = '<li class="last">';
                $config['last_tag_close'] = '</li>';

                $config['prev_link'] = '';
                $config['prev_tag_open'] = '<li class="prev">';
                $config['prev_tag_close'] = '</li>';

                $config['next_link'] = '';
                $config['next_tag_open'] = '<li class="next">';
                $config['next_tag_close'] = '</li>';

                $config['cur_tag_open'] = '<li class="active"><a>';
                $config['cur_tag_close'] = '</a></li>';

                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                
                $data['resarea'] = $resarea;
					
				//Enkripsi kode & nip_lama   
                foreach ($data['detail'] as $row)
                {
                  $row->Nip_lama_encrypt = $this->encryption($row->Nip_lama);
                  
                  if($type == 'pub')
                  {
                      $row->Kode_publikasi_dosen_tetap = $this->encryption($row->Kode_publikasi_dosen_tetap);
                  }
                   
                }
            
            //----//
				$data['sidebar_fakultas']=$this->experts_model->get_all_fakultas();
				$data['sidebar_jurusan']=$this->experts_model->get_all_jurusan();
				
                $this->pagination->initialize($config); 
                $this->load->view('header');
                $this->load->view('sidebar_menu',$data);
                if($type=='exp') $this->load->view('experts_list', $data);
                if($type=='pub') $this->load->view('publications_list', $data);
                $this->load->view('footer');
                   
	}
        
        function pub_list() {
                $index = Zend_Search_Lucene::open(APPPATH . 'search/publications');
                //$query_result = $index->find('all:"yes"','Judul_penelitian', SORT_STRING, SORT_ASC);
                $query_result = $index->find('all:"yes"');
               // echo '<pre>'; print_r($query_result);exit;
                $a=count($query_result);
                $offset = $this->uri->segment(3,0);
                $limit = 6;

            // this is the cool part, which you don't know
                $set= array();                                      
                for($i=$offset; $i< $limit + $offset; $i++)
                {
                    if(array_key_exists($i, $query_result)){
                        $set[]= $query_result[$i];
                    }else{
                        break;  
                    }
                }
                
//                $segments = array('welcome','exp_list');
//                $config['base_url'] = site_url($segments);
                $this->breadcrumb->add('Publications','index.php/welcome/search/?type=pub');
                $data['detail']=$set;
//                echo '<pre>'; print_r($query_result);exit;
                $config['base_url'] = base_url().'index.php/welcome/pub_list/'; //set the base url for pagination
                $config['total_rows'] = $a; //total rows
                $config['per_page'] = $limit; //the number of per page for pagination
                $config['uri_segment'] = 3; //see from base_url. 3 for this case
                $config['full_tag_open'] = '<div class="pagination "> <ul>';
                $config['full_tag_close'] = '</ul></div>';
                $config['first_link'] = '';
                $config['first_tag_open'] = '<li class="first">';
                $config['first_tag_close'] = '</li>';
                
                $config['last_link'] = '';
                $config['last_tag_open'] = '<li class="last">';
                $config['last_tag_close'] = '</li>';
                
                $config['prev_link'] = '';
                $config['prev_tag_open'] = '<li class="prev">';
                $config['prev_tag_close'] = '</li>';
                
                $config['next_link'] = '';
                $config['next_tag_open'] = '<li class="next">';
                $config['next_tag_close'] = '</li>';
                
                $config['cur_tag_open'] = '<li class="active"><a>';
                $config['cur_tag_close'] = '</a></li>';
                
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                
                $this->pagination->initialize($config); 
              
				$data['sidebar_fakultas']=$this->experts_model->get_all_fakultas();
				$data['sidebar_jurusan']=$this->experts_model->get_all_jurusan();
				//untuk tipe sidebar
				$data['type']='pub';
                $this->load->view('header');
                $this->load->view('sidebar_menu', $data);
                $this->load->view('publications_list', $data);
                $this->load->view('footer');
                
                
        }
        
        function update_nip_kegiatan()
        {
            $rows=  $this->pns_model->get_nip_user();
            foreach ($rows as $row)
            {
                $this->pns_model->update_nip_keg($row->nip,$row->userid);
            }
            echo 'SUKSES';
        }

        function charts(){
            $data=array();
		foreach($this->pendapatan->get()->result_array() as $row)
			$data[] = (int) $row['hasil'];
                $this->load->view('header',array('data'=>$data));
		$this->load->view('main_1',array('data'=>$data));
                $this->load->view('footer');
        }
        function charts_ex(){
            $data=array();
		foreach($this->pendapatan->get()->result_array() as $row)
                {$data[] = (int) $row['hasil'];
                 echo '<pre>'; print_r((int) $row->hasil.'');exit;
                }exit();
		$this->load->view('welcome_message',array('data'=>$data));
        }
        function exp_list_db() {
                //count the total rows of tb_book
                $per_page=6;
                $datax = $this->experts_model->get_experts_with_limit($per_page,$this->uri->segment(3));
                $data['detail']=$datax['details'];
                $data['count'] = $datax['counts'];
                $a = $datax['counts'];
                $config['base_url'] = base_url().'index.php/welcome/exp_list/'; //set the base url for pagination
                $config['total_rows'] = $a; //total rows
                $config['per_page'] = $per_page; //the number of per page for pagination
                $config['uri_segment'] = 3; //see from base_url. 3 for this case
                $config['full_tag_open'] = '<div class="pagination "> <ul>';
                $config['full_tag_close'] = '</ul></div>';
                $config['first_link'] = '';
                $config['first_tag_open'] = '<li class="first">';
                $config['first_tag_close'] = '</li>';
                
                $config['last_link'] = '';
                $config['last_tag_open'] = '<li class="last">';
                $config['last_tag_close'] = '</li>';
                
                $config['prev_link'] = '';
                $config['prev_tag_open'] = '<li class="prev">';
                $config['prev_tag_close'] = '</li>';
                
                $config['next_link'] = '';
                $config['next_tag_open'] = '<li class="next">';
                $config['next_tag_close'] = '</li>';
                
                $config['cur_tag_open'] = '<li class="active"><a>';
                $config['cur_tag_close'] = '</a></li>';
                
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                
                $this->pagination->initialize($config); 
                
                $this->load->view('header');
                $this->load->view('sidebar_menu');
                $this->load->view('experts_list', $data);
                $this->load->view('footer');
                
                
        }
        
        function move_material_personal()
        {
            $rows=  $this->pns_model->get_materi_personal();
            foreach ($rows as $row)
            {
                $this->pns_model->update_nip_keg($row->nip,$row->userid);
            }
            echo 'SUKSES';
        }


        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
         public function image($nip)
	{
            $data['foto']=$this->experts_model->get_image($nip);
            $this->load->view('image',$data);
	}
        
        function prof_list() {
                //count the total rows of tb_book
                $this->db->select('*');
                $this->db->from('tbarang');
                $getData = $this->db->get('');
                $a = $getData->num_rows();
                $config['base_url'] = base_url().'index.php/welcome/lec_list/'; //set the base url for pagination
                $config['total_rows'] = $a; //total rows
                $config['per_page'] = '6'; //the number of per page for pagination
                $config['uri_segment'] = 3; //see from base_url. 3 for this case
                $config['full_tag_open'] = '<div class="pagination "> <ul>';
                $config['full_tag_close'] = '</ul></div>';
                $config['first_link'] = '';
                $config['first_tag_open'] = '<li class="first">';
                $config['first_tag_close'] = '</li>';
                
                $config['last_link'] = '';
                $config['last_tag_open'] = '<li class="last">';
                $config['last_tag_close'] = '</li>';
                
                $config['prev_link'] = '';
                $config['prev_tag_open'] = '<li class="prev">';
                $config['prev_tag_close'] = '</li>';
                
                $config['next_link'] = '';
                $config['next_tag_open'] = '<li class="next">';
                $config['next_tag_close'] = '</li>';
                
                $config['cur_tag_open'] = '<li class="active"><a>';
                $config['cur_tag_close'] = '</a></li>';
                
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                
                $this->pagination->initialize($config); 
                $data['detail'] = $this->barang_model->getBuku($config['per_page'],$this->uri->segment(3));
                $data['count'] = $this->barang_model->getCount();
                $this->load->view('header');
                $this->load->view('sidebar_menu');
                $this->load->view('professor_list', $data);
                $this->load->view('footer');
        }
        public function suggestions()
        {
                $bahasa = $this->input->post('name',TRUE);
                $rows = $this->barang_model->getData($bahasa);
                $json_array = array();
                foreach ($rows as $row)
                    $json_array[]=$row->kode_brg;
                echo json_encode($json_array);
        }
		
		public function qualifications()
		{
			$data['kualifikasi'] = $this->experts_model->get_top_qualification();
			foreach($data['kualifikasi'] as $rows)
			{
				echo " ".$rows->total." ".$rows->nama_kualifikasi." ".$rows->kode_kualifikasi."<br />";
			}
		}
		
	public function index()
	{
                $datax = $this->experts_model->get_top_experts(10);
               
			    $data['experts']=$datax['details'];
				$data['kualifikasi']=$this->experts_model->get_top_qualification();
				
                $data['publications']=$this->experts_model->get_top_publikasi(10);
				
				
               // print_r($data['kualifikasi']);exit();
				$data['search']=true;
				$this->load->view('header');
			
                $this->load->view('main',$data);
               // $this->load->view('main',$data);
                $this->load->view('footer');
	}
        public function lec_main()
	{
	//untuk tipe sidebar
				$data['type']='exp';
		$this->load->view('header');
                $this->load->view('sidebar_menu',$data);
                $this->load->view('lecturer_main');
                $this->load->view('footer');
	}
        
        public function prof_main()
	{
		$this->load->view('header');
                $this->load->view('sidebar_menu',$data);
                $this->load->view('professor_main');
                $this->load->view('footer');
	}
        
        
         public function update_data(){
            $datas=$this->pns_model->get_data();
            foreach ($datas as $row)
            {
                $nip=$row->nip;
                $email=$row->userid;
                
               // $this->pns_model->update_email($nip,$email);
                $this->pns_model->insert_email($nip,$email);
              /*  
               $nipb=$this->pns_model->get_data_baru($nip_lama);
               foreach ($nipb as $ni)
                {
                   $this->pns_model->add_data($ni->ALAMAT_RUMAH,$nip_lama);
                }*/
             }
                   echo 'SUKSES!'; 
            }
         public function add_data_to(){
            $datas=$this->pns_model->get_data();
            $no=1000;
            foreach ($datas as $row)
            {
                $no++;
                $this->pns_model->add_data_to($no,$row->nama,2);
             }
                   echo 'SUKSES!'; 
            }
            
        public function check_data(){
            $datas=$this->pns_model->get_data();
            foreach ($datas as $row)
            {
                $tests=$this->pns_model->check_data_to($row->nama_kualifikasi);
                foreach ($tests as $test)
                {
                    $samadengan1=$this->pns_model->get_namasama($row->kode_kualifikasi);
                    $samadengan=$samadengan1."(".$test->kode_kualifikasi.") ";
                    $this->pns_model->update_data($samadengan,$row->kode_kualifikasi);
                }
             }
                   echo 'SUKSES!'; 
            }
        
        public function add_data(){
           $mahasiswa  = $this->pns_model->getDataTest1(); /*untuk mengambil data dari database "mahasiswa"*/
        echo "DATA SATU : ";
        print_r ($mahasiswa);
        echo "<br />";
        $mahasiswa2  = $this->pns_model->getDataTest2(); /*untuk mengambil data dari database "mahasiswa"*/
        echo "DATA DUA : ";
        print_r ($mahasiswa2);
        echo "<br />";
        }
        
       public function update_foto()
       {
            $datas=$this->pns_model->get_nip();
            foreach ($datas as $row)
            {
                $foto=$this->pns_model->get_foto($row->Nip_lama);
                $this->pns_model->update_foto($foto,$row->Nip_lama);
             }
                   echo 'SUKSES!'; 
       }
       
       public function insert_materi_lagi()
       {
           $datas=$this->pns_model->get_materi_personal();
            foreach ($datas as $row)
            {
               // print_r($row); exit;        
                $data = array(
                    'Nip' => $row->nip
                 );
                
                $status=$this->pns_model->insert_materi($data,$row->userid);
                
                if($status)echo 'SUKSES!'; 
            }
                   
       }
       
       public function insert_nip_lama()
       {
           $datas=$this->pns_model->get_publikasi();
            foreach ($datas as $row)
            {
                $nip=$this->pns_model->get_nip_personal($row->userid);
                $this->pns_model->update_nip($nip,$row->userid);
            }
           
       }
       
       public function update_data_foto(){
            $datas=$this->pns_model->get_foto();
            foreach ($datas as $row)
            {
                $nip=$row->nip;
                $foto=$row->userid;
                
                $this->pns_model->update_foto($nip,$foto);
              /*  
               $nipb=$this->pns_model->get_data_baru($nip_lama);
               foreach ($nipb as $ni)
                {
                   $this->pns_model->add_data($ni->ALAMAT_RUMAH,$nip_lama);
                }*/
             }
                   echo 'SUKSES!'; 
            }
        public function convert_data(){
            $datas=$this->pns_model->get_foto();
            foreach ($datas as $row)
            {
                $nip=$row->nip;
                $foto=$row->userid;
                
                $this->pns_model->update_foto($nip,$foto);
              /*  
               $nipb=$this->pns_model->get_data_baru($nip_lama);
               foreach ($nipb as $ni)
                {
                   $this->pns_model->add_data($ni->ALAMAT_RUMAH,$nip_lama);
                }*/
             }
                   echo 'SUKSES!'; 
            }
            
               
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */