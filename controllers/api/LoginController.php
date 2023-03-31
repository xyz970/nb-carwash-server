<?php

use Firebase\JWT\JWT;

class LoginAPIController extends ApiController
{

    private $user;
    public function __construct() {
        $this->user = new User;
    }
    use Request;
    public function postIndex()
    {
        header('Content-Type: application/json');
        $json = file_get_contents('php://input');
        $input = json_decode($json);
        $user = $this->user->where(['email' => $input->email])->get();
        // echo $password;
        if ($user) {
            $user = mysqli_fetch_assoc($user);
            if (password_verify($input->password, $user['password'])) {
                $payload = [
                    'email' => $input->email,
                ];
                $access_token = JWT::encode($payload, $_ENV['ACCESS_TOKEN_SECRET'],'HS256');
                $data = array(
                    'email'=> $input->email,
                    'nama' => $user['name'],
                    'token' => $access_token
                );
                return $this->succesResponse($data);
            } else {
                return $this->errorResponse('Oopss ada kesalahan, mohon cek kembali email dan password anda',401);
            }
        }
        // return $this->succesResponse('Hello World');
    }
}
