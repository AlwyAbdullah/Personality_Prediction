<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CsvModel extends CI_Model {

    public function readCsvFile()
    {
        $csv_file = FCPATH . 'assets/csv_file/jobdesc.csv'; // Update the path accordingly
        $csv_data = array();

        if (($handle = fopen($csv_file, "r")) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                $csv_data[] = $row;
            }
            fclose($handle);
        }
        
        return $csv_data;
    }
}
