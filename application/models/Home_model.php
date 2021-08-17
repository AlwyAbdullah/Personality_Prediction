<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function getHariIni()
    {
        $query = $this->db->query("SELECT * FROM hari_ini");
        return $query->result_array();
    }

    public function updateHariIni($no_old, $no_new, $tanggal)
    {
        $data = [
            "no" => $no_new,
            "tanggal" => $tanggal
        ];
        $this->db->where('no', $no_old);
        $this->db->update('hari_ini', $data);
    }

    public function getNearestLocation($lat, $lon)
    {
        $query = $this->db->query("SELECT * , (3956 * 2 * ASIN(SQRT( POWER(SIN(( $lat - lat) *  pi()/180 / 2), 2) +COS( $lat * pi()/180) * COS(lat * pi()/180) * POWER(SIN(( $lon - lon) * pi()/180 / 2), 2) ))) as distance  
        from koordinat_pasar  
        order by distance");
        return $query->result_array();
    }
}
