<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subscriber extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Datatables');
        $this->load->model('experts_model');
        $this->load->database('default');
        $this->load->helper('url');
        $this->load->library('breadcrumb');
    }
    function index()
    {

        $this->breadcrumb->add('Publications','index.php/welcome/search/?type=pub')
                                    ->add('Haha','')
                                    ->add('Kata','');
                                   
        //set table id in table open tag
        $this->load->view('header');
        $this->load->view('sidebar_menu');
        $this->load->view('experts_list_custom');
        $this->load->view('footer');
    }
    //function to handle callbacks
    function datatable()
    {
        
        $this->datatables->select('Nip_lama,Nama_dosen,Gelar_akademik_depan,Gelar_akademik_belakang,Nama_jurusan,Nama_fakultas,Nama_status')
        ->add_column('Expand', '<img src="'.base_url().'assets/images/details_open.png"/>')
        ->join('tmst_jurusan','tmst_dosen.Kode_jurusan=tmst_jurusan.Kode_jurusan','left')
        ->join('tmst_fakultas','tmst_jurusan.Kode_fakultas=tmst_fakultas.Kode_fakultas','left')
        ->join('tref_status_aktivitas_dosen','tmst_dosen.Status_aktif=tref_status_aktivitas_dosen.Kode_status_aktivitas_dosen','left')
        ->from('tmst_dosen');
       
        echo $this->datatables->generate();
    }
    function edit($id)
    {
        //load some edit form
        redirect('subscriber');
    }
    function delete($id)
    {
        //add some delete code
        redirect('subscriber');
    }
    function get_photo($id)
    {
        $ci= & get_instance();
        
        $url=base_url().'assets/images/foto/'.$id.'.jpg';
        $url=str_replace(' ', '', $url);
        $html='<span>';
        $html.='<img src="'.$url.'"/>';
        $html.='</span>';

        return $html;
    }
    function get_buttons($id)
    {
        $ci= & get_instance();
        $html='<span class="actions">';
        $html.='<a href="'.  base_url().'index.php/welcome/exp_detail/'.$id.'">Detail</a>';
        $html.='</span>';

        return $html;
    }
}