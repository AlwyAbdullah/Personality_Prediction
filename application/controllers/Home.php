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

    public function riwayatHarga()
    {
        if (empty($_POST["filter_tanggal"]) && empty($_POST["nama_pasar"])) {
            $this->load->view('layout/header');
            $this->load->view('home/riwayat-harga');
            $this->load->view('layout/footer');
        } else {
            $date = $_POST["filter_tanggal"];
            $pasar = $_POST["nama_pasar"];
            $row = 0;
            if ($pasar == "Pasar Dinoyo") {
                $csv_file = fopen(base_url('assets/data/history/') . "DataPasarDinoyo2015-2018.csv", "r");
                while (($data = fgetcsv($csv_file, 1461, ",")) !== FALSE) {
                    list($col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10, $col11, $col12) = $data;
                    if ($col1 == $date) {
                        $arr['data_harga'] = [$col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10, $col11, $col12];
                        $this->load->view('layout/header');
                        $this->load->view('home/riwayat-harga', $arr);
                        $this->load->view('layout/footer');
                        break;
                    }
                }
            }
        }
    }
}
?>
