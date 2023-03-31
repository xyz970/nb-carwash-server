<?php

use Carbon\Carbon;

class TarifController extends BaseController{

    private $tarif;
    public function __construct() {
        session_start();
        $this->tarif = new Tarif;
        if (!$_SESSION['user']) {
            return header("location: ".BASE_URL);
        }
    }

    public function getIndex()
    {
        return $this->view('admin.tarif');
    }

    public function getShow_data()
    {
        header('Content-Type: application/json');
        $tarif = $this->tarif->where(array('type'=>'Karpet'),'!=')->get();
        $data = [];
        if ($tarif->num_rows > 0) {
            while ($row = $tarif->fetch_assoc()) {
                $data[] = $row;
            }
        }
        // print_r($data);
        echo json_encode(array('data' => $data));
    }

    public function getEdit()
    {
        $id = $this->get('id');
        $tarif = $this->tarif->where(array('id'=>$id))->get();
        // $data = [];
        if ($tarif->num_rows > 0) {
            while ($row = $tarif->fetch_assoc()) {
                $data = $row;
            }
        }
        echo json_encode($data);
    }

    public function postUpdate()
    {
        $id = $this->get('id');
        $timestamp = Carbon::now()->toDateTimeString();
        $harga = $this->post('price');
        $this->tarif->rawQuery("UPDATE `wash_types` SET `price`='$harga',`updated_at`='$timestamp' WHERE id = '$id'")->get();
    }
}