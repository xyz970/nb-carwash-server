<?php

trait Koneksi
{
    public function mysql()
    {
        // $server = "localhost";
        // $username = "root";
        // $password = "";
        // $db = "nb-carwash";
        $koneksi = mysqli_connect($_ENV['HOST'], $_ENV['MYSQL_USERNAME'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE']);

        if (mysqli_connect_error()) {
            echo "Koneksi gagal " . mysqli_connect_error();
        }
        return $koneksi;
    }
}
