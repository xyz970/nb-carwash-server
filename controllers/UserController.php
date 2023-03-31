<?php

class UserController extends BaseController
{
    private $user;
    function __construct()
    {
        $this->user = new User;
        session_start();
    }

    public function getData_list()
    {
        header('Content-Type: application/json');
        $user = $this->user->where(array('role'=>'admin'),'!=')->get();
        $data = [];
        if ($user->num_rows > 0) {
            while ($row = $user->fetch_assoc()) {
                $data[] = $row;
            }
        }
        echo json_encode($data);
    }
}
