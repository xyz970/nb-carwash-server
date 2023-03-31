<?php

class AuthController extends BaseController
{

    private $user;
    public function __construct()
    {
        session_start();
        $this->user = new User();
    }
    public function postLogin()
    {
        $email = $this->post('email');
        $password = $this->post('password');
        $user = $this->user->where(['email' => $email])->get();
        // echo $password;
        if ($user) {
            $user = mysqli_fetch_assoc($user);
            if (password_verify($password, $user['password'])) {
                $_SESSION["user"] = $user;
                if ($user['role'] != 'admin') {
                    header("Location: " . BASE_URL . "?error=true&&message=Anda harus login sebagai admin");
                } else {

                    header("Location: " . BASE_URL . "admin");
                }
            } else {
                header("Location: " . BASE_URL . "?error=true&&message=Cek kembali email atau password anda");
            }
        }
    }

    public function getLogout()
    {
        session_destroy();
        header("Location: " . BASE_URL . "");
    }
}
