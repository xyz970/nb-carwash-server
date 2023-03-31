<?php

class SesiController extends BaseController
{
    private $sesi;
    public function __construct()
    {
        session_start();
        $this->sesi = new Sesi();
        if (!$_SESSION['user']) {
            return header("location: ".BASE_URL);
        }
    }

    public function getIndex()
    { 
        return $this->view('admin.sesi');
    }

    public function getSesi_data()
    {
        header('Content-Type: application/json');
        $sesi = $this->sesi->all();
        $data = [];
        // if ($sesi->num_rows > 0) {
            while ($row = $sesi->fetch_assoc()) {
                $data[] = $row;
            }
        // }
        // print_r($data);
        echo json_encode(array('data' => $data));
    }
    
    public function postInsert()
    {
        $ket = $this->post('keterangan');
        $jamAwal = $this->post('jamAwal');
        $jamAkhir = $this->post('jamAkhir');
        $ket = $ket.'('. $jamAwal .'-' . $jamAkhir . ')';
        $process = $this->sesi->rawQuery("INSERT INTO `sesi`(`keterangan`, `jam_awal`, `jam_akhir`) VALUES ('$ket','$jamAwal','$jamAkhir')")->get();
        if ($process) {
            echo json_encode(array('message' => 'success'));
        }
    }

    public function getEdit()
    {
        # code...
    }
}
