<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class UserAPIController extends ApiController
{

    /**
     * method yang akan di panggil ketika aplikasi dijalankan
     * tolong sesuaikan dengan syntax dibawah
     * public function [Request_method(get,post,put,delete)]Nama(){
     * }
     */

    public function getIndex()
    {
        // $user = new User();
        // while ($row = mysqli_fetch_assoc($user->get())) {
        //     $count = count($row);
        //     $data[] = $row;
        //     if (count($row) == $count) {
        //         break;
        //     }
        // }
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $data = $_GET['id'];
        $this->succesResponse($uri);
    }

    public function postInsert()
    {
        $data = array(
            'input1' => $this->post('input1'),
        );
        $this->succesResponse($data);
    }

    public function getCheck()
    {
        header('Content-Type: application/json');
        $headers = getallheaders();
        if (!isset($headers['Authorization'])) {
            http_response_code(401);
            exit();
        }
        list(, $token) = explode(' ', $headers['Authorization']);
        try {
            JWT::decode($token,  new Key($_ENV['ACCESS_TOKEN_SECRET'], 'HS256'));
            $this->succesResponse(array('data' => 'test1'));
            new Exception("Token Error");
        } catch (Exception $e) {
            http_response_code(401);
            $this->errorResponse($e->getMessage(), 401);
        }
    }
}
