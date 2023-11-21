<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Prodi extends CI_Controller 
 {
    public function __construct(){
        parent::__construct();
        $this->load->model('prodi_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    function index() {
        $data['judul'] = "Halaman Prodi";  
        $data['user'] = $this->db->get_where("user", ['email' => $this->session->userdata('email')])->row_array();
        $data['prodi'] =$this->prodi_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("prodi/vw_prodi", $data);
        $this->load->view("layout/footer", $data);
        
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Prodi";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['prodi'] = $this->prodi_model->get();

        $this->form_validation->set_rules('nama', 'Nama Prodi', 'required', ['required' => 'Nama Prodi Wajib di isi']);
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required|integer', ['integer' => 'Ruangan Prodi Wajib di isi']);
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required', ['required' => 'Jurusan Wajib di isi']);
        $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required', ['required' => 'Akreditasi Wajib di isi']);
        $this->form_validation->set_rules('nama_kaprodi', 'Nama Kaprodi', 'required', ['required' => 'Nama Kaprodi Wajib di isi']);
        $this->form_validation->set_rules('tahun_berdiri', 'Tahun Berdiri', 'required', ['required' => 'Tahun Berdiri Wajib di isi Angka']);
        $this->form_validation->set_rules('output_lulusan', 'Output Lulusan', 'required', ['required' => 'Output Lulusan Wajib Di Isi']);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("prodi/vw_tambah_prodi", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'ruangan' => $this->input->post('ruangan'),
                'jurusan' => $this->input->post('jurusan'),
                'akreditasi' => $this->input->post('akreditasi'),
                'nama_kaprodi' => $this->input->post('nama_kaprodi'),
                'tahun_berdiri' => $this->input->post('tahun_berdiri'),
                'output_lulusan' => $this->input->post('output_lulusan')
            ];
            $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/images/prodi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $data['gambar'] = $new_image;
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->prodi_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert al...">');
            redirect('Prodi');
        }
    }
    public function detail($id){
        $data['judul'] = 'Halaman detail Mahasiswa'; 
        $data['Prodi'] = $this->prodi_model->getbyid($id); 
        $this->load->view("layout/header");
        $this->load->view("prodi/vw_detail_prodi", $data); 
        $this->load->view("layout/footer");
        
    }
    public function hapus($id)
    {
        $error = $this->prodi_model->delete($id);

        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i> Data Prodi tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i> Data Prodi Berhasil Dihapus!</div>');
        }

        redirect('prodi');
    }

    function upload()
    {
     $data = [
         'nama' => $this->input->post('nama'), 
         'ruangan' => $this->input->post('ruangan'), 
         'jurusan' => $this->input->post('jurusan'),
         'akreditasi' => $this->input->post('akreditasi'), 
         'nama_kaprodi' => $this->input->post('nama_kaprodi'),
         'tahun_berdiri' => $this->input->post("tahun_berdiri"),
         'output_lulusan' => $this->input->post("output_lulusan"),
     ];
      $this->prodi_model->insert($data);
       redirect("prodi", "refresh");
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Prodi";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['prodi'] = $this->prodi_model->getbyid($id);

        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required', ['required' => 'Nama Prodi Wajib di isi']);
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required', ['required' => 'Ruangan Prodi Wajib di isi']);
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required', ['required' => 'Jurusan Wajib di isi']);
        $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required', ['required' => 'Akreditasi Prodi Wajib di isi']);
        $this->form_validation->set_rules('nama_kaprodi', 'Nama Kaprodi', 'required', ['required' => 'Nama Kaprodi Wajib di isi']);
        $this->form_validation->set_rules('tahun_berdiri', 'Tahun Berdiri', 'required|numeric', ['required' => 'Tahun Berdiri Prodi Wajib di isi', 'numeric' => 'Tahun harus Angka']);
        $this->form_validation->set_rules('output_lulusan', 'Output Lulusan', 'required', ['required' => 'Output Lulusan Prodi Wajib di isi']);


        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("prodi/vw_ubah_prodi", $data);
            $this->load->view("layout/footer");
        } else {
            $update_data = [
                'nama' => $this->input->post('nama'),
                'ruangan' => $this->input->post('ruangan'),
                'jurusan' => $this->input->post('jurusan'),
                'akreditasi' => $this->input->post('akreditasi'),
                'nama_kaprodi' => $this->input->post('nama_kaprodi'),
                'tahun_berdiri' => $this->input->post('tahun_berdiri'),
                'output_lulusan' => $this->input->post('output_lulusan')
            ];
            $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = "2048";
                $config['upload_path'] = './assets/images/prodi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['prodi']['gambar'];

                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/prodi/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $id = $this->input->post('Id');
            $this->prodi_model->update(['Id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dosen Berhasil Di Ubah</div>');
            redirect('prodi');

        }
    }
    public function kritik()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Halaman Pengumuman';
        $this->load->view("layout/header", $data);
        $this->load->view("mahasiswa/vw_kritik", $data);
        $this->load->view("layout/footer", $data);

    }
    public function sentkritik()
    {
        $this->form_validation->set_rules('isi', 'Isi Kritik', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('pengumuman/index');
        } else {

            $data = array(
                'isi' => $this->input->post('isi')
            );
            $this->session->set_flashdata('message', 'Kritik berhasil disampaikan');

            // Redirect ke halaman form pengumuman
            redirect('mahasiswa');
        }
    }
     }
 
 