<?php
defined('BASEPATH') or exit('No direct script access allowed');
class karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('karyawan_model');
        $this->load->model('departemen_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Halaman karyawan';
        $data['karyawan'] = $this->karyawan_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("karyawan/vw_karyawan", $data);
        $this->load->view("layout/footer", $data);
    }
    // 
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah karyawan";
        $data["departemen"] = $this->departemen_model->get();

        $this->form_validation->set_rules('nama_karyawan', 'Nama karyawan', 'required', ['required' => 'Nama karyawan Wajib di isi']);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', ['required' => 'Jenis Kelamin karyawan Wajib di isi']);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'required', ['required' => 'Email karyawan Wajib di isi']);
        $this->form_validation->set_rules('departemen', 'departemen', 'required', ['required' => 'departemen karyawan Wajib di isi']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat karyawan Wajib di isi']);
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required', ['required' => 'Asal Sekolah karyawan Wajib di isi']);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("karyawan/vw_tambah_karyawan", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama_karyawan' => $this->input->post('nama_karyawan'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'alamat_karyawan' => $this->input->post('alamat_karyawan'),
                'departemen' => $this->input->post('departemen'),
                'jabatan' => $this->input->post('jabatan'),
                
            ];

            $this->karyawan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data karyawan Berhasil Ditambah!</div>');
            redirect("karyawan");
        }
    }

    public function detail($id)
    {
        $data['judul'] = 'Halaman detail karyawan';
        $data['karyawan'] = $this->karyawan_model->getbyid($id);
        $this->load->view("layout/header", $data);
        $this->load->view("karyawan/vw_detail_karyawan", $data);
        $this->load->view("layout/footer", $data);

    }

    public function hapus($id)
    {
        $this->karyawan_model->delete($id);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data karyawan Berhasil Di Hapus!</div>');
        redirect('karyawan');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit karyawan";
        $data['karyawan'] = $this->karyawan_model->getbyid($id);
        $data['departemen'] = $this->departemen_model->get();

        $this->form_validation->set_rules('nama_karyawan', 'Nama karyawan', 'required', ['required' => 'Nama karyawan Wajib di isi']);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', ['required' => 'Jenis Kelamin karyawan Wajib di isi']);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'required', ['required' => 'Email karyawan Wajib di isi']);
        $this->form_validation->set_rules('departemen', 'departemen', 'required', ['required' => 'departemen karyawan Wajib di isi']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat karyawan Wajib di isi']);
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required', ['required' => 'Asal Sekolah karyawan Wajib di isi']);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("karyawan/vw_ubah_karyawan", $data);
            $this->load->view("layout/footer");
        } else {
            $update_data = [
                'nama_karyawan' => $this->input->post('nama_karyawan'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'alamat_karyawan' => $this->input->post('alamat_karyawan'),
                'departemen' => $this->input->post('departemen'),
                'jabatan' => $this->input->post('jabatan'),
            ];

            $this->karyawan_model->update(['id' => $id], $update_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data karyawan Berhasil Diubah!</div>');
            redirect("karyawan");
        }
    }

}