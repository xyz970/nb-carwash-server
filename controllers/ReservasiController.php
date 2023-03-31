<?php

class ReservasiController extends BaseController{

    public function __construct() {
        session_start();
        if (!$_SESSION['user']) {
            return header("location: ".BASE_URL);
        }
    }

    public function getIndex()
    {
        return $this->view('admin.reservasi');
    }
}