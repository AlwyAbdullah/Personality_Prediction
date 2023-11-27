<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Home_model');
        $this->load->model('CsvModel');
    }

    public function index()
    {
        $input_data = $this->input->post('text');
        // $input_data = $this->request->getVar('text');
        if (empty($input_data)) {
            // $remoteServerUrl = 'https://alwiabdullah.pythonanywhere.com/run-python-script';
            // $response = file_get_contents($remoteServerUrl, false, stream_context_create([
            //     'http' => ['method' => 'POST']
            // ]));

            // echo $response;

            $remoteServerUrl = 'https://alwiabdullah.pythonanywhere.com/run-python-script';
            $parameter = 'example_parameter';

            $data = ['parameter' => $parameter];

            $options = [
                'http' => [
                    'method' => 'POST',
                    'header' => 'Content-Type: application/json',
                    'content' => json_encode($data)
                ]
            ];

            $context = stream_context_create($options);
            $response = file_get_contents($remoteServerUrl, false, $context);

            $responseData = json_decode($response, true);

            // echo "Response from remote server:\n";
            // echo $responseData['result'];

            $this->load->view('home/dummy');
        } else {
            // $remoteServerUrl = 'https://alwiabdullah.pythonanywhere.com/';
            // $response = file_get_contents($remoteServerUrl, false, stream_context_create([
            //     'http' => ['method' => 'POST']
            // ]));

            // echo $response;

            // $remoteServerUrl = 'https://alwiabdullah.pythonanywhere.com/run-python-script';
            // $parameter = 'example_parameter';

            // $data = ['parameter' => $input_data];

            // $options = [
            //     'http' => [
            //         'method' => 'POST',
            //         'header' => 'Content-Type: application/json',
            //         'content' => json_encode($data)
            //     ]
            // ];

            // $context = stream_context_create($options);
            // $response = file_get_contents($remoteServerUrl, false, $context);

            // $responseData = json_decode($response, true);

            // echo "Response from remote server:\n";
            // echo $responseData['result'];

            // $data['predictions'] = $responseData['result'];


            $remoteServerUrl = 'https://alwiabdullah.pythonanywhere.com/run-python-script';
            $parameter = 'example_parameter';

            $data = ['parameter' => $input_data];

            $ch = curl_init($remoteServerUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            $response = curl_exec($ch);

            if ($response === false) {
                echo "cURL Error: " . curl_error($ch);
            } else {
                // echo "Response from remote server:\n";
                // echo $response;
            }
            
            curl_close($ch);

            // FILE ASLI
            // Execute the Python script and capture the output
            // $command = 'python C:/xampp/htdocs/Personality_Prediction/application/views/home/python_app.py "' . $input_data . '"';
            // $output = shell_exec($command);

            // // Pass the output to the view
            $data['predictions'] = $response;


            // Load the view to display the predictions
            $this->load->view('home/dummy', $data);
        }
    }

    public function jobdesc()
    {
        $input_data = $this->input->post('jobdesc');
        // $input_data = $this->request->getVar('text');
        if (empty($input_data)) {
            // echo "GO";
            $this->load->view('home/dummy');
        } else {
            // Execute the Python script and capture the output
            $command = 'python C:/xampp/htdocs/Personality_Prediction/application/views/home/python_app_jobdesc.py "' . $input_data . '"';
            $output = shell_exec($command);

            // Pass the output to the view
            $data['job'] = $output;

            // Load the view to display the predictions
            // echo "GO";
            $this->load->view('home/dummy', $data);
        }
    }

    public function pdf_save()
    {
        $config['upload_path'] = './application/views/home/static/pdf/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 10485; // 10mb
        $config['remove_spaces'] = FALSE; // Preserve spaces in file names

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = $this->upload->display_errors();
            echo $error;
        } else {
            require('class.pdf2text.php');
            extract($_POST);
            $file = $_FILES['file'];

            // Get the file name
            $fileName = $file['name'];

            $a = new PDF2Text();
            $a->setFilename($_FILES['file']['tmp_name']);
            $a->decodePDF();
            // echo $a->output();

            $remoteServerUrl = 'https://alwiabdullah.pythonanywhere.com/run-python-script';

            $data = ['parameter' => $a->output()];

            $ch = curl_init($remoteServerUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            $response = curl_exec($ch);

            if ($response === false) {
                echo "cURL Error: " . curl_error($ch);
            } else {
                // echo "Response from remote server:\n";
                // echo $response;
            }
            
            curl_close($ch);

            $data['predictions_pdf'] = $response;

            // die();

            // $command = 'python C:/xampp/htdocs/Personality_Prediction/application/views/home/python_app_pdf.py "' . $fileName . '"';
            // $output2 = shell_exec($command);

            // $data['predictions_pdf'] = $output2;
            // Delete the file
            $filePath = './application/views/home/static/pdf/' . $fileName;
            if (file_exists($filePath)) {
                unlink($filePath);
            } else {
                echo 'File does not exist.';
            }
            $this->load->view('home/dummy', $data);
        }
    }

    // public function process_data()
    // {
    //     $input_data = $this->input->post('text');

    //     // Execute the Python script and capture the output
    //     $command = 'python C:/xampp/htdocs/Penelitian_2021/application/views/home/python_app.py "' . $input_data . '"';
    //     $output = shell_exec($command);

    //     // Pass the output to the view
    //     $data['predictions'] = $output;

    //     // Load the view to display the predictions
    //     $this->load->view('home/predictions_view', $data);
    // }

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
