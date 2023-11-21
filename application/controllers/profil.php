<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'userrole');
    }

    public function index()
    {
        $data['judul'] = "Halaman Profil";
        $data['user'] = $this->userrole->getby();
        $this->load->view("layout/header", $data);
        $this->load->view("user/vw_profil", $data);
        $this->load->view("layout/footer",$data);
    }
}
