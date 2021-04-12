<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        //
    }

    public function profilPasar()
    {
        $this->load->view('layout/header');
        $this->load->view('home/profil-pasar');
        $this->load->view('layout/footer');
    }
}
