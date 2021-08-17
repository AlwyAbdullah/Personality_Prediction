<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Home_model');
    }

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

    public function profilPasar()
    {
        $this->load->view('layout/header');
        $this->load->view('home/profil-pasar');
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

    public function prediksi()
    {
        $bahan = $this->input->post('bahan');
        $lat = $this->input->post('lat');
        $long = $this->input->post('long');
        $tanggal_hari_ini = date('d-m-Y');
        if (empty($bahan)) {
            $this->session->set_flashdata('empty', "<div class='alert alert-danger'>Anda harus memilih setidaknya 1 bahan pokok yang ingin dicek peramalan harganya!</div>");
            redirect('home/rekomendasi');
        } else {
            // Get data 
            $getHariIni = $this->Home_model->getHariIni();
            foreach ($getHariIni as $gh) {
                $no = $gh['no'];
                $tanggal = $gh['tanggal'];
            }

            // Ubah data jika tidak sesuai tanggalnya dan update index nomornya
            if ($tanggal != $tanggal_hari_ini) {
                $no_old = $no;
                $no_new = $no + 1;
                $this->Home_model->updateHariIni($no_old, $no_new, $tanggal_hari_ini);
                $no = $no_new;
            }

            $path_prediksi = base_url('assets/csv/prediksi/');
            for ($i = 0; $i < count($bahan); $i++) {
                if ($bahan[$i] == "Beras Bengawan") {
                    $csv_file = fopen($path_prediksi . "prediksi_beras_SVR.csv", "r");
                    while (($data = fgetcsv($csv_file, 146, ",")) !== FALSE) {
                        list($col1, $col2, $col3, $col4, $col5, $col6) = $data;
                        if ($col1 == $no) {
                            $prediksi_harga[$i] = [
                                'pasar_dinoyo' => 'Rp. ' . number_format($col2, 0, ',', '.')  . ' - Pasar Dinoyo',
                                'pasar_klojen' => 'Rp. ' . number_format($col3, 0, ',', '.')  . ' - Pasar Klojen',
                                'pasar_blimbing' => 'Rp. ' . number_format($col4, 0, ',', '.')  . ' - Pasar Blimbing',
                                'pasar_oro' => 'Rp. ' . number_format($col5, 0, ',', '.')  . ' - Pasar Oro-Oro Dowo',
                                'pasar_tawangwangu' => 'Rp. ' . number_format($col6, 0, ',', '.')  . ' - Pasar Tawangwangu',
                            ];
                        }
                    }
                    fclose($csv_file);
                } else if ($bahan[$i] == "Gula") {
                    $csv_file = fopen($path_prediksi . "prediksi_gula_SVR.csv", "r");
                    while (($data = fgetcsv($csv_file, 146, ",")) !== FALSE) {
                        list($col1, $col2, $col3, $col4, $col5, $col6) = $data;
                        if ($col1 == $no) {
                            $prediksi_harga[$i] = [
                                'pasar_dinoyo' => 'Rp. ' . number_format($col2, 0, ',', '.')  . ' - Pasar Dinoyo',
                                'pasar_klojen' => 'Rp. ' . number_format($col3, 0, ',', '.')  . ' - Pasar Klojen',
                                'pasar_blimbing' => 'Rp. ' . number_format($col4, 0, ',', '.')  . ' - Pasar Blimbing',
                                'pasar_oro' => 'Rp. ' . number_format($col5, 0, ',', '.')  . ' - Pasar Oro-Oro Dowo',
                                'pasar_tawangwangu' => 'Rp. ' . number_format($col6, 0, ',', '.')  . ' - Pasar Tawangwangu',
                            ];
                        }
                    }
                    fclose($csv_file);
                } else if ($bahan[$i] == "Minyak Bimoli") {
                    $csv_file = fopen($path_prediksi . "prediksi_minyak_SVR.csv", "r");
                    while (($data = fgetcsv($csv_file, 146, ",")) !== FALSE) {
                        list($col1, $col2, $col3, $col4, $col5, $col6) = $data;
                        if ($col1 == $no) {
                            $prediksi_harga[$i] = [
                                'pasar_dinoyo' => 'Rp. ' . number_format($col2, 0, ',', '.')  . ' - Pasar Dinoyo',
                                'pasar_klojen' => 'Rp. ' . number_format($col3, 0, ',', '.')  . ' - Pasar Klojen',
                                'pasar_blimbing' => 'Rp. ' . number_format($col4, 0, ',', '.')  . ' - Pasar Blimbing',
                                'pasar_oro' => 'Rp. ' . number_format($col5, 0, ',', '.')  . ' - Pasar Oro-Oro Dowo',
                                'pasar_tawangwangu' => 'Rp. ' . number_format($col6, 0, ',', '.')  . ' - Pasar Tawangwangu',
                            ];
                        }
                    }
                    fclose($csv_file);
                } else if ($bahan[$i] == "Daging Sapi") {
                    $csv_file = fopen($path_prediksi . "prediksi_dagingsapi_SVR.csv", "r");
                    while (($data = fgetcsv($csv_file, 146, ",")) !== FALSE) {
                        list($col1, $col2, $col3, $col4, $col5, $col6) = $data;
                        if ($col1 == $no) {
                            $prediksi_harga[$i] = [
                                'pasar_dinoyo' => 'Rp. ' . number_format($col2, 0, ',', '.')  . ' - Pasar Dinoyo',
                                'pasar_klojen' => 'Rp. ' . number_format($col3, 0, ',', '.')  . ' - Pasar Klojen',
                                'pasar_blimbing' => 'Rp. ' . number_format($col4, 0, ',', '.')  . ' - Pasar Blimbing',
                                'pasar_oro' => 'Rp. ' . number_format($col5, 0, ',', '.')  . ' - Pasar Oro-Oro Dowo',
                                'pasar_tawangwangu' => 'Rp. ' . number_format($col6, 0, ',', '.')  . ' - Pasar Tawangwangu',
                            ];
                        }
                    }
                    fclose($csv_file);
                } else if ($bahan[$i] == "Daging Ayam") {
                    $csv_file = fopen($path_prediksi . "prediksi_dagingayam_SVR.csv", "r");
                    while (($data = fgetcsv($csv_file, 146, ",")) !== FALSE) {
                        list($col1, $col2, $col3, $col4, $col5, $col6) = $data;
                        if ($col1 == $no) {
                            $prediksi_harga[$i] = [
                                'pasar_dinoyo' => 'Rp. ' . number_format($col2, 0, ',', '.')  . ' - Pasar Dinoyo',
                                'pasar_klojen' => 'Rp. ' . number_format($col3, 0, ',', '.')  . ' - Pasar Klojen',
                                'pasar_blimbing' => 'Rp. ' . number_format($col4, 0, ',', '.')  . ' - Pasar Blimbing',
                                'pasar_oro' => 'Rp. ' . number_format($col5, 0, ',', '.')  . ' - Pasar Oro-Oro Dowo',
                                'pasar_tawangwangu' => 'Rp. ' . number_format($col6, 0, ',', '.')  . ' - Pasar Tawangwangu',
                            ];
                        }
                    }
                    fclose($csv_file);
                } else if ($bahan[$i] == "Telur") {
                    $csv_file = fopen($path_prediksi . "prediksi_telur_SVR.csv", "r");
                    while (($data = fgetcsv($csv_file, 146, ",")) !== FALSE) {
                        list($col1, $col2, $col3, $col4, $col5, $col6) = $data;
                        if ($col1 == $no) {
                            $prediksi_harga[$i] = [
                                'pasar_dinoyo' => 'Rp. ' . number_format($col2, 0, ',', '.')  . ' - Pasar Dinoyo',
                                'pasar_klojen' => 'Rp. ' . number_format($col3, 0, ',', '.')  . ' - Pasar Klojen',
                                'pasar_blimbing' => 'Rp. ' . number_format($col4, 0, ',', '.')  . ' - Pasar Blimbing',
                                'pasar_oro' => 'Rp. ' . number_format($col5, 0, ',', '.')  . ' - Pasar Oro-Oro Dowo',
                                'pasar_tawangwangu' => 'Rp. ' . number_format($col6, 0, ',', '.')  . ' - Pasar Tawangwangu',
                            ];
                        }
                    }
                    fclose($csv_file);
                } else if ($bahan[$i] == "Garam") {
                    $csv_file = fopen($path_prediksi . "prediksi_garam_SVR.csv", "r");
                    while (($data = fgetcsv($csv_file, 146, ",")) !== FALSE) {
                        list($col1, $col2, $col3, $col4, $col5, $col6) = $data;
                        if ($col1 == $no) {
                            $prediksi_harga[$i] = [
                                'pasar_dinoyo' => 'Rp. ' . number_format($col2, 0, ',', '.')  . ' - Pasar Dinoyo',
                                'pasar_klojen' => 'Rp. ' . number_format($col3, 0, ',', '.')  . ' - Pasar Klojen',
                                'pasar_blimbing' => 'Rp. ' . number_format($col4, 0, ',', '.')  . ' - Pasar Blimbing',
                                'pasar_oro' => 'Rp. ' . number_format($col5, 0, ',', '.')  . ' - Pasar Oro-Oro Dowo',
                                'pasar_tawangwangu' => 'Rp. ' . number_format($col6, 0, ',', '.')  . ' - Pasar Tawangwangu',
                            ];
                        }
                    }
                    fclose($csv_file);
                } else if ($bahan[$i] == "Susu Bubuk") {
                    $csv_file = fopen($path_prediksi . "prediksi_susu_SVR.csv", "r");
                    while (($data = fgetcsv($csv_file, 146, ",")) !== FALSE) {
                        list($col1, $col2, $col3, $col4, $col5, $col6) = $data;
                        if ($col1 == $no) {
                            $prediksi_harga[$i] = [
                                'pasar_dinoyo' => 'Rp. ' . number_format($col2, 0, ',', '.')  . ' - Pasar Dinoyo',
                                'pasar_klojen' => 'Rp. ' . number_format($col3, 0, ',', '.')  . ' - Pasar Klojen',
                                'pasar_blimbing' => 'Rp. ' . number_format($col4, 0, ',', '.')  . ' - Pasar Blimbing',
                                'pasar_oro' => 'Rp. ' . number_format($col5, 0, ',', '.')  . ' - Pasar Oro-Oro Dowo',
                                'pasar_tawangwangu' => 'Rp. ' . number_format($col6, 0, ',', '.')  . ' - Pasar Tawangwangu',
                            ];
                        }
                    }
                    fclose($csv_file);
                } else if ($bahan[$i] == "Cabai") {
                    $csv_file = fopen($path_prediksi . "prediksi_cabe_SVR.csv", "r");
                    while (($data = fgetcsv($csv_file, 146, ",")) !== FALSE) {
                        list($col1, $col2, $col3, $col4, $col5, $col6) = $data;
                        if ($col1 == $no) {
                            $prediksi_harga[$i] = [
                                'pasar_dinoyo' => 'Rp. ' . number_format($col2, 0, ',', '.')  . ' - Pasar Dinoyo',
                                'pasar_klojen' => 'Rp. ' . number_format($col3, 0, ',', '.')  . ' - Pasar Klojen',
                                'pasar_blimbing' => 'Rp. ' . number_format($col4, 0, ',', '.')  . ' - Pasar Blimbing',
                                'pasar_oro' => 'Rp. ' . number_format($col5, 0, ',', '.')  . ' - Pasar Oro-Oro Dowo',
                                'pasar_tawangwangu' => 'Rp. ' . number_format($col6, 0, ',', '.')  . ' - Pasar Tawangwangu',
                            ];
                        }
                    }
                    fclose($csv_file);
                } else if ($bahan[$i] == "Bawang Merah") {
                    $csv_file = fopen($path_prediksi . "prediksi_bawangmerah_SVR.csv", "r");
                    while (($data = fgetcsv($csv_file, 146, ",")) !== FALSE) {
                        list($col1, $col2, $col3, $col4, $col5, $col6) = $data;
                        if ($col1 == $no) {
                            $prediksi_harga[$i] = [
                                'pasar_dinoyo' => 'Rp. ' . number_format($col2, 0, ',', '.')  . ' - Pasar Dinoyo',
                                'pasar_klojen' => 'Rp. ' . number_format($col3, 0, ',', '.')  . ' - Pasar Klojen',
                                'pasar_blimbing' => 'Rp. ' . number_format($col4, 0, ',', '.')  . ' - Pasar Blimbing',
                                'pasar_oro' => 'Rp. ' . number_format($col5, 0, ',', '.')  . ' - Pasar Oro-Oro Dowo',
                                'pasar_tawangwangu' => 'Rp. ' . number_format($col6, 0, ',', '.')  . ' - Pasar Tawangwangu',
                            ];
                        }
                    }
                    fclose($csv_file);
                } else if ($bahan[$i] == "Bawang Putih") {
                    $csv_file = fopen($path_prediksi . "prediksi_bawangputih_SVR.csv", "r");
                    while (($data = fgetcsv($csv_file, 146, ",")) !== FALSE) {
                        list($col1, $col2, $col3, $col4, $col5, $col6) = $data;
                        if ($col1 == $no) {
                            $prediksi_harga[$i] = [
                                'pasar_dinoyo' => 'Rp. ' . number_format($col2, 0, ',', '.')  . ' - Pasar Dinoyo',
                                'pasar_klojen' => 'Rp. ' . number_format($col3, 0, ',', '.')  . ' - Pasar Klojen',
                                'pasar_blimbing' => 'Rp. ' . number_format($col4, 0, ',', '.')  . ' - Pasar Blimbing',
                                'pasar_oro' => 'Rp. ' . number_format($col5, 0, ',', '.')  . ' - Pasar Oro-Oro Dowo',
                                'pasar_tawangwangu' => 'Rp. ' . number_format($col6, 0, ',', '.')  . ' - Pasar Tawangwangu',
                            ];
                        }
                    }
                    fclose($csv_file);
                }
            }

            $nearest = $this->Home_model->getNearestLocation($lat, $long);
            $data["bahan"] = $bahan;
            $data["prediksi"] = $prediksi_harga;
            $data["nearest"] = $nearest;
            // echo json_encode($data["prediksi"]);
            $this->load->view('layout/header');
            $this->load->view('home/hasil_rekomendasi', $data);
            $this->load->view('layout/footer');
        }
    }
}
