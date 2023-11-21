<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswa_model');
        $this->load->model('prodi_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Halaman Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mahasiswa'] = $this->mahasiswa_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("mahasiswa/vw_mahasiswa", $data);
        $this->load->view("layout/footer", $data);
    }
    // 
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Mahasiswa";
        $data['user'] = $this->db->get_where("user", ['email' => $this->session->userdata('email')])->row_array();
        $data["prodi"] = $this->prodi_model->get();

        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required', ['required' => 'Nama Mahasiswa Wajib di isi']);
        $this->form_validation->set_rules('nim', 'NIM', 'required', ['required' => 'NIM Mahasiswa Wajib di isi']);
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email Mahasiswa Wajib di isi']);
        $this->form_validation->set_rules('prodi', 'Prodi', 'required', ['required' => 'Prodi Mahasiswa Wajib di isi']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat Mahasiswa Wajib di isi']);
        $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required', ['required' => 'Asal Sekolah Mahasiswa Wajib di isi']);
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|integer', ['integer' => 'NO HP harus Angka']);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', ['required' => 'Jenis Kelamin Mahasiswa Wajib di isi']);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("mahasiswa/vw_tambah_mahasiswa", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'email' => $this->input->post('email'),
                'prodi' => $this->input->post('prodi'),
                'alamat' => $this->input->post('alamat'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'no_hp' => $this->input->post('no_hp'),
                'asal_sekolah' => $this->input->post('asal_sekolah')
            ];

            $this->mahasiswa_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa Berhasil Ditambah!</div>');
            redirect("Mahasiswa");
        }
    }

    public function detail($id)
    {
        $data['judul'] = 'Halaman detail Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mahasiswa'] = $this->mahasiswa_model->getbyid($id);
        $this->load->view("layout/header", $data);
        $this->load->view("mahasiswa/vw_detail_mahasiswa", $data);
        $this->load->view("layout/footer", $data);

    }

    public function hapus($id)
    {
        $this->mahasiswa_model->delete($id);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Mahasiswa Berhasil Di Hapus!</div>');
        redirect('mahasiswa');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Mahasiswa";
        $data['mahasiswa'] = $this->mahasiswa_model->getbyid($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['prodi'] = $this->prodi_model->get();

        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required', ['required' => 'Nama Mahasiswa Wajib di isi']);
        $this->form_validation->set_rules('nim', 'NIM', 'required', ['required' => 'NIM Mahasiswa Wajib di isi']);
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email Mahasiswa Wajib di isi']);
        $this->form_validation->set_rules('prodi', 'Prodi', 'required', ['required' => 'Prodi Mahasiswa Wajib di isi']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat Mahasiswa Wajib di isi']);
        $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required', ['required' => 'Asal Sekolah Mahasiswa Wajib di isi']);
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|numeric', ['required' => 'NO HP Mahasiswa Wajib di isi', 'numeric' => 'NO HP harus Angka']);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("mahasiswa/vw_ubah_mahasiswa", $data);
            $this->load->view("layout/footer");
        } else {
            $update_data = [
                "nama" => $this->input->post('nama'),
                "nim" => $this->input->post('nim'),
                "email" => $this->input->post('email'),
                "prodi" => $this->input->post('prodi'),
                "alamat" => $this->input->post('alamat'),
                "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                "no_hp" => $this->input->post('no_hp'),
                "asal_sekolah" => $this->input->post('asal_sekolah')
            ];

            $this->mahasiswa_model->update(['id' => $id], $update_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa Berhasil Diubah!</div>');
            redirect("Mahasiswa");
        }
    }

    public function pengumuman()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Halaman Pengumuman';
        $this->load->view("layout/header", $data);
        $this->load->view("mahasiswa/vw_pengumuman", $data);
        $this->load->view("layout/footer", $data);

    }
    public function kirimpengumuman()
    {
        // Validasi form
        $this->form_validation->set_rules('judul', 'Judul Pengumuman', 'required');
        $this->form_validation->set_rules('isi', 'Isi Pengumuman', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('pengumuman/index');
        } else {
            // Proses pengiriman pengumuman ke database atau ke tempat penyimpanan lainnya
            $data = array(
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi')
            );
            // Set flashdata untuk memberi pesan sukses ke pengguna
            $this->session->set_flashdata('message', 'Pengumuman berhasil dikirimkan!');

            // Redirect ke halaman form pengumuman
            redirect('mahasiswa');
        }
    }

}