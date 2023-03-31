<?php

use Carbon\Carbon;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class BookingAPIController extends ApiController
{
    private $booking;
    public function __construct()
    {
        session_start();
        $booking = new Booking();
        $this->booking = $booking;
    }

    public function getIndex()
    {
        $date = Carbon::now()->format('Y-m-d');
        // $sql = "select * from `bookings` where id = '2022-12-11-adi-20:00'";
        $listData = $this->booking->rawQuery("SELECT bookings.id,bookings.name AS costumer_name,is_valid,is_done,no_hp,plate_number,merk_model,wash_types.name,time,total,date FROM `bookings` JOIN wash_types on wash_type_id = wash_types.id where date = '$date'")->get();
        // $listData = $this->booking->rawQuery($sql)->get();
        $data = [];
        if ($listData->num_rows > 0) {
            while ($row = $listData->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            $data = [];
        }
        // $data = $this->get('id');
        // $data = $_GET['id'];
        // echo json_encode(array('data' => $data));
        return $this->succesResponse($data);
    }

    public function getDetail()
    {
        $id = $this->get('id');
        $dataDetail = $this->booking->where(array('id' => $id))->get();
        if ($dataDetail->num_rows > 0) {
            while ($row = $dataDetail->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            $data = "0 results";
        }
        $id = $data[0]['id'];
        $sqlInsert = "INSERT INTO 
        `transactions`(`id`, `name`, `plate_number`, `no_hp`, `merk_model`, `wash_type_id`, `time`, `total`, `date`, `note`, `created_at`, `updated_at`) 
        VALUES ('$id','$data[0]['name']','$data[0]['id']','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]')";
        $trans = new Transaksi();
        // $trans->rawQuery();
        echo json_encode(array('data' => $data[0]['id']));
    }

    public function getValidasi()
    {
        header('Content-Type: application/json');
        $headers = getallheaders();
        if (!isset($headers['Authorization'])) {
            $this->errorResponse("Oopss.. Anda harus login terlebih dahulu", 401);
            exit();
        }
        list(, $token) = explode(' ', $headers['Authorization']);
        try {
            JWT::decode($token,  new Key($_ENV['ACCESS_TOKEN_SECRET'], 'HS256'));
            $id = $this->get('id');
            try {
                $this->booking->rawQuery("UPDATE `bookings` SET is_valid = 'true' where id = '$id'");
                $this->succesResponse('', 'Data berhasil divalidasi');
                new Exception("Ooppss...ada kesalahan");
            } catch (Exception $ex) {
                $this->errorResponse($ex->getMessage(), 500);
            }
            new Exception("Token Error");
        } catch (Exception $e) {
            http_response_code(401);
            $this->errorResponse($e->getMessage(), 401);
        }
    }

    public function getSelesai()
    {
        header('Content-Type: application/json');
        $headers = getallheaders();
        if (!isset($headers['Authorization'])) {
            $this->errorResponse("Oopss.. Anda harus login terlebih dahulu", 401);
            exit();
        }
        list(, $token) = explode(' ', $headers['Authorization']);
        try {
            JWT::decode($token,  new Key($_ENV['ACCESS_TOKEN_SECRET'], 'HS256'));
            $id = $this->get('id');
            try {
                $trans = new Transaksi();
                $this->booking->rawQuery("UPDATE `bookings` SET is_done = 'true' where id = '$id'");
                $booking = $this->booking->rawQuery("select * from `bookings` where id = '$id'")->get();
                $data = mysqli_fetch_array($booking);
                // $id = $data[0];
                try {
                    $trans->rawQuery("INSERT INTO `transactions`(`id`, `name`, `is_done`, `plate_number`, `no_hp`, `merk_model`, `wash_type_id`, `time`, `total`, `date`) VALUES ('$data[0]','$data[1]','$data[3]','$data[5]','$data[2]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]')");
                    $this->booking->rawQuery("delete from bookings where id = '$id'")->get();
                    new Exception("oopss.. ada yang salah");
                } catch (Exception $e) {
                    $this->errorResponse($e->getMessage(), 500);
                }
                $this->succesResponse('', 'Pencucian selesai');
                new Exception("Ooppss...ada kesalahan");
            } catch (Exception $ex) {
                $this->errorResponse($ex->getMessage(), 500);
            }
            new Exception("Token Error");
        } catch (Exception $e) {
            http_response_code(401);
            $this->errorResponse($e->getMessage(), 401);
        }
    }
}
