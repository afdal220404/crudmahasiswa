<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class departemen extends CI_Controller 
 {
    public function __construct(){
        parent::__construct();
        $this->load->model('departemen_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    function index() {
        $data['judul'] = "Halaman departemen";  
        $data['departemen'] =$this->departemen_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("departemen/vw_departemen", $data);
        $this->load->view("layout/footer", $data);
        
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Tambah departemen";
        $data['departemen'] = $this->departemen_model->get();

        $this->form_validation->set_rules('nama', 'Nama departemen', 'required', ['required' => 'Nama departemen Wajib di isi']);
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required|integer', ['integer' => 'Ruangan departemen Wajib di isi']);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("departemen/vw_tambah_departemen", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama_departemen' => $this->input->post('nama_departemen'),
                'lokasi_departemen' => $this->input->post('lokasi_departemen'),
               
            ];
            $this->departemen_model->insert($data, $this->input->post('data'));
            $this->session->set_flashdata('message', '<div class="alert al...">');
            redirect('departemen');
        }
    }
    public function detail($id){
        $data['judul'] = 'Halaman detail departemen'; 
        $data['departemen'] = $this->departemen_model->getbyid($id); 
        $this->load->view("layout/header");
        $this->load->view("departemen/vw_detail_departemen", $data); 
        $this->load->view("layout/footer");
        
    }
    public function hapus($id)
    {
        $error = $this->departemen_model->delete($id);

        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i> Data departemen tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i> Data departemen Berhasil Dihapus!</div>');
        }

        redirect('departemen');
    }

    function upload()
    {
     $data = [
         'nama_departemen' => $this->input->post('nama_departemen'), 
         'lokasi_departemen' => $this->input->post('lokasi_departemen'), 
     ];
      $this->departemen_model->insert($data);
       redirect("departemen", "refresh");
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit departemen";
        $data['departemen'] = $this->departemen_model->getbyid($id);

        $this->form_validation->set_rules('nama_departemen', 'Nama Departemen', 'required', ['required' => 'Nama departemen Wajib di isi']);
        $this->form_validation->set_rules('lokasi_departemenasi', 'Lokasi', 'required', ['required' => 'Lokasi departemen Wajib di isi']);


        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("departemen/vw_ubah_departemen", $data);
            $this->load->view("layout/footer");
        } else {
            $update_data = [
                'nama_departemen' => $this->input->post('nama'),
                'lokasi_departemen' => $this->input->post('ruangan'),
            ];
            }

            $id = $this->input->post('id');
            $this->departemen_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Departemen Berhasil Di Ubah</div>');
            redirect('departemen');

        }
    }
