<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('home/profil-pasar');
        $this->load->view('layout/footer');
    }

    public function rekomendasi()
    {
        $this->load->view('layout/header');
        $this->load->view('home/rekomendasi');
        $this->load->view('layout/footer');
    }
}
?>
