<?php

use Carbon\Carbon;

class AkunController extends BaseController
{
    public function __construct()
    {
        session_start();
        if (!$_SESSION['user']) {
            return header("location: " . BASE_URL);
        }
    }
    public function getIndex()
    {
        return $this->view('admin.pengaturan-akun');
    }
    public function postUpdate()
    {
        $user = new User;
        $timestamp = Carbon::now()->toDateTimeString();
        $email = $this->post('email');
        $pass = password_hash($this->post('password'),PASSWORD_BCRYPT);
        $id = $this->post('id');
        if ($this->post('password') == '' || empty($this->post('password'))) {
            // echo  'true';
            $result = $user->rawQuery("UPDATE `users` SET `email`='$email',`updated_at`='$timestamp' WHERE id = '$id'")->get();
        } else {
            // echo 'false';
            $result = $user->rawQuery("UPDATE `users` SET `email`='$email', `password`='$pass',`updated_at`='$timestamp' WHERE id = '$id'")->get();
        }
        return header("location: " . BASE_URL);
        
    }
}
