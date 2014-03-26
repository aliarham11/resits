<?php
class Search extends CI_Controller 
{
 
	function __construct()
	{
		parent::__construct();
 
		// Load Zend Lucene library.  See previous article.
		$this->load->library('zend');
		$this->zend->load('Zend/Search/Lucene');

		// Location of search index.  Used by all Search controller methods.
		$this->search_index = APPPATH . 'search/index';
		Zend_Search_Lucene::setDefaultSearchField('nama');
	}

	function index()
	{
		//$this->load->view('template/header');
		//$this->load->view('template/navigation');
		//$this->load->view('template/main');
		//$this->load->view('template/footer');
		
		$this->load->view('search/index');
	}
	
	function reindex()
	{
		// Create index.  Will delete any existing index.
		$index = Zend_Search_Lucene::create($this->search_index);
		
		// Documents source
		$sources = $this->input->get('source');
		if(!is_array($sources))
		{
			$sources = array($sources);
		}
		
		foreach ($sources as $source)
		{
			// Batasi query agar tidak boros memory
			$limit = 30;
			$start = 0;
			
			if($source == 'itspeg') // digilib.userdigilibdosen
			{
				$this->load->model('itspeg_model');
				$table_name = 'userdigilibdosen';
				$field = 'nip_baru, nama';
				
				$length = $this->itspeg_model->get_num_rows($table_name);
				
				$index = Zend_Search_Lucene::open($this->search_index);
				
				for ($seq = $start; $seq < $length; $seq += $limit)
				{
					$rows = $this->itspeg_model->get($table_name, $field, -1, $seq, $limit);
					//echo '<pre>'; print_r($rows); exit;
					if($rows == FALSE)
					{
						break;
					}
					
					foreach ($rows as $row)
					{						
						// Create Lucene document for this article.
						$doc = new Zend_Search_Lucene_Document();
				
						// Add required fields.
						$doc->addField(Zend_Search_Lucene_Field::Text('nip', $row->nip_baru));
						$doc->addField(Zend_Search_Lucene_Field::Text('nama', $row->nama));
						$doc->addField(Zend_Search_Lucene_Field::UnStored('index', $row->nama));
				 
						// Add docuument to index.
						$index->addDocument($doc);
					}
				}
				
				$index->commit();
			}
			else if($source == 'pns') // pemutakhiran_pns.tabel_dos_f1_upd
			{
				$this->load->model('pns_model');
				$table_name = 'tabel_dos_f1_upd';
				$field = 'nip_baru, nama_pegawai as nama';
				
				$length = $this->pns_model->get_num_rows($table_name);
				
				$index = Zend_Search_Lucene::open($this->search_index);
				
				for ($seq = $start; $seq < $length; $seq += $limit)
				{
					$rows = $this->pns_model->get($table_name, $field, -1, $seq, $limit);
					//echo '<pre>'; print_r($rows); exit;
					if($rows == FALSE)
					{
						break;
					}
					
					foreach ($rows as $row)
					{						
						// Create Lucene document for this article.
						$doc = new Zend_Search_Lucene_Document();
				
						// Add required fields.
						$doc->addField(Zend_Search_Lucene_Field::Text('nip', $row->nip_baru));
						$doc->addField(Zend_Search_Lucene_Field::Text('nama', $row->nama));
						$doc->addField(Zend_Search_Lucene_Field::UnStored('index', $row->nama));
				 
						// Add docuument to index.
						$index->addDocument($doc);
					}
				}
				
				$index->commit();
			}
		}
		
		redirect(base_url() . "search");
	}
 
	function optimize()
	{
		$index = Zend_Search_Lucene::open($this->search_index);
		$index->optimize();
		$index->commit();
		
		redirect(base_url() . "search");
	}
	
	function add_item()
	{
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		
		$this->add_document($nip, $nama, TRUE);
		
		redirect(base_url() . "search");
	}
	
	function add_document($nip, $nama, $is_optimize)
	{
		$index = Zend_Search_Lucene::open($this->search_index);
		
		// Create Lucene document for this article.
		$doc = new Zend_Search_Lucene_Document();

		// Add required fields.
		$doc->addField(Zend_Search_Lucene_Field::Text('nip', $nip));
		$doc->addField(Zend_Search_Lucene_Field::Text('nama', $nama));
		$doc->addField(Zend_Search_Lucene_Field::UnStored('index', $nama));
 
		// Add docuument to index.
		$index->addDocument($doc);
		
		if($is_optimize)
		{
			$index->optimize();
		}
	}
	
	function result()
	{
		// Create empty array, in case there are no results.
		$data['results'] = array();
	
		// If a search_query parameter has been posted, search the index.
		if ($this->input->post('search_query'))
		{
			$index = Zend_Search_Lucene::open($this->search_index);
	
			// Get results.
			$data['results'] = $index->find($this->input->post('search_query'));
			
			$index->commit();
			unset($index);
			
			// Load view, and populate with results.
			$this->load->view('search/result', $data);
		}
		
		if ($this->input->get('search_query'))
		{
			$index = Zend_Search_Lucene::open($this->search_index);

			$query_string = $_SERVER['QUERY_STRING'];
			$parse_data = "";
			parse_str($query_string, $parse_data);
			
			$search_query = $parse_data['search_query'];
			$type = $parse_data['type'];
			
			$results = array();			
			if($type == 'nama'){
				$results = $index->find($search_query);
				
				$index->commit();
				unset($index);
				
				$json = array();
				foreach ($results as $result){
					$object = new stdClass();
					$object->nip = $result->nip;
					$object->nama = $result->nama;
					$object->score = round($result->score, 2) * 100;
					array_push($json, $object);
				}
	
				echo json_encode($json);
			}
			else if($type == 'nip'){
				$this->load->model('pns_model');
				$this->load->model('itspeg_model');
				
				$query_itspeg = $this->itspeg_model->db->query("
					SELECT nama FROM userdigilibdosen WHERE nip_baru = '$search_query'
				");
				$query_pns = $this->pns_model->db->query("
					SELECT nama_pegawai as nama FROM tabel_dos_f1_upd WHERE nip_baru = '$search_query'
				");
				
				if($query_itspeg->num_rows > 0){
					array_push($results, $query_itspeg->first_row());
				}
				
				if($query_pns->num_rows > 0){
					array_push($results, $query_pns->first_row());
				}
				
				$json = array();
				foreach ($results as $result){
					$object = new stdClass();
					$object->nip = $search_query;
					$object->nama = $result->nama;
					$object->score = 100;
					array_push($json, $object);
				}
	
				echo json_encode($json);
			}
		}
	}
}