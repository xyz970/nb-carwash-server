<?php

trait Auth{

    public function __construct() {
        session_start();
    }

    public function login($data)
    {
        // if () {
        //     # code...
        // }
    }

}

trait LoginCheck{
    public function __construct() {
        session_start();
        if (!$_SESSION['user']) {
            header("Location: " . BASE_URL . "?error=true&message=Anda harus login terlebih dahulu");
        }
    }
}