<?php

use Carbon\Carbon;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TransaksiAPIController extends ApiController
{

    private $trans;
    public function __construct()
    {
        $this->trans = new Transaksi();
    }
    public function postInsert()
    {
        header('Content-Type: application/json');
        $headers = getallheaders();
        if (!isset($headers['Authorization'])) {
            $this->errorResponse("Oopss.. Anda harus login terlebih dahulu ", 401);
            exit();
        }
        list(, $token) = explode(' ', $headers['Authorization']);
        try {
            JWT::decode($token,  new Key($_ENV['ACCESS_TOKEN_SECRET'], 'HS256'));
            $json = file_get_contents('php://input');
            $input = json_decode($json, true);
            try {
                $date = Carbon::now()->format('Y-m-d');
                $time = Carbon::now()->format('H:i');
                $fileName  =  $_FILES['image']['name'];
                $tempPath  =  $_FILES['image']['tmp_name'];
                $fileSize  =  $_FILES['image']['size'];
                $name = $input['name'];
                $no_hp = $input['no_hp'];
                $wash_type_id = $input['wash_type_id'];
                $merk_model = $input['merk_model'];
                $plate_number = $input['plate_number'];
                $total = $input['total'];
                $id = $date . '-' . str_replace('_', ' ', strtolower($name)) . '-' . $time;
                
                if (isset($fileName)) {
                    $upload_path = "./assets/img/bukti/"; // set upload folder path 

                    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // get image extension

                    // valid image extensions
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

                    // allow valid image file formats
                    if (in_array($fileExt, $valid_extensions)) {
                        //check file not exist our upload folder path
                        if (!file_exists($upload_path . $fileName)) {
                            // check file size '5MB'
                            if ($fileSize < 5000000) {
                                move_uploaded_file($tempPath, $upload_path . $fileName); // move file from system temporary path to our upload folder path 
                            } else {
                                $errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));
                                echo $errorMSG;
                            }
                        } else {
                            $errorMSG = json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));
                            echo $errorMSG;
                        }
                    } else {
                        $errorMSG = json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));
                        echo $errorMSG;
                    }
                    $name = $this->post('name');
                    $total = $this->post('total');
                    $no_hp = $this->post('no_hp');
                    $this->trans->rawQuery("INSERT INTO `transactions`(`id`, `name`, `no_hp`,`wash_type_id`,`bukti`, `time`, `total`, `date`) VALUES ('$id','$name','$no_hp',6,'$fileName','$time','$total','$date')")->get();
                    $this->succesResponse('', "Transaksi berhasil di data");
                } else {
                    
                    $this->trans->rawQuery("INSERT INTO `transactions`(`id`, `name`, `plate_number`, `no_hp`, `merk_model`, `wash_type_id`, `time`, `total`, `date`) VALUES ('$id','$name','$plate_number','$no_hp','$merk_model','$wash_type_id','$time','$total','$date')")->get();
                    $this->succesResponse('', "Transaksi berhasil di data");
                }

                new Exception("Oppsss.. ada error");
            } catch (Exception $e) {
                $this->errorResponse($e->getMessage(), 500);
            }
            new Exception("Token Error");
        } catch (Exception $e) {
            $this->errorResponse($e->getMessage(), 401);
        }
    }
    public function postKarpet()
    {
        # code...
    }
}
