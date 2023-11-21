<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class calon_presiden extends CI_Controller 
 {
    public function __construct(){
        parent::__construct();
        $this->load->model('calon_presiden_model');
    }
    function index() {
        $data['judul'] = "Halaman Calon Presiden";  
        $data['calon_presiden'] =$this->calon_presiden_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("calon_presiden/vw_calon_presiden", $data);
        $this->load->view("layout/footer", $data);
    }

    public function tambah(){
        $data['judul'] = "Halaman Tambah Calon Presiden";
        $this->load->view("layout/header", $data);
        $this->load->view("calon_presiden/vw_tambah_calon_presiden", $data);
        $this->load->view("layout/footer", $data);
    }
    public function detail($id){
        $data['judul'] = 'Halaman detail Calon Presiden'; 
        $data['calon_presiden'] = $this->calon_presiden_model->getbyid($id); 
        $this->load->view("layout/header");
        $this->load->view("calon_presiden/vw_detail_calon_presiden", $data); 
        $this->load->view("layout/footer");
        
    }
    public function hapus($id)
    {
        $this->calon_presiden_model->delete($id);
        redirect('calon_presiden');
    }

    function upload()
    {
     $data = [
         'nik' => $this->input->post('nik'), 
         'nama_lengkap' => $this->input->post('nama_lengkap'), 
         'asal' => $this->input->post('asal'),
         'partai_pendukung' => $this->input->post('partai_pendukung'), 
         'riwayat_pekerjaan' => $this->input->post('riwayat_pekerjaan'),
         'umur' => $this->input->post("umur"),
     ];
      $this->calon_presiden_model->insert($data);
       redirect("calon_presiden", "refresh");
    }

    public function edit($id) {
        $data['judul'] = "Halaman Edit calon_presiden";
        $data['calon_presiden'] = $this->calon_presiden_model->get(); 
        $data['calon_presiden'] = $this->calon_presiden_model->getbyid($id);
        $this->load->view("layout/header");
        $this->load->view("calon_presiden/vw_ubah_calon_presiden", $data); 
        $this->load->view("layout/footer");
     }
    
        public function update() 
        {     
        $data = [
         'id' => $this->input->post('id'), 
         'nik' => $this->input->post('nik'), 
         'nama_lengkap' => $this->input->post('nama_lengkap'), 
         'asal' => $this->input->post('asal'),
         'partai_pendukung' => $this->input->post('partai_pendukung'), 
         'riwayat_pekerjaan' => $this->input->post('riwayat_pekerjaan'),
         'umur' => $this->input->post("umur"),
            ]; 
             $id = $this->input->post('id'); 
             $this->calon_presiden_model->update(['id' => $id], $data);
            redirect('calon_presiden');
    }
     }
 
 