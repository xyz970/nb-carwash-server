<?php
class KaryawanController extends BaseController
{
    private $user;
    public function __construct()
    {
        session_start();
        $this->user = new User;
        if (!$_SESSION['user']) {
            return header("location: " . BASE_URL);
        }
    }

    public function getIndex()
    {
        return $this->view('admin.employee');
    }

    public function getShow_data()
    {
        $user = $this->user->where(array('role' => 'admin'),'!=')->get();
        header('Content-Type: application/json');
        $data = [];
        if ($user->num_rows > 0) {
            while ($row = $user->fetch_assoc()) {
                $data[] = $row;
            }
        }
        // print_r($data);
        echo json_encode(array('data' => $data));   
    }
    public function deleteDelete()
    {
        $id = $this->get('id');
        $this->user->rawQuery("delete from users where id = $id");
        echo json_encode(array('message' => "Data berhasil dihapus"));  
    }
    public function postInsert()
    {
        $email = $this->post('email');
        $name = $this->post('nama');
        $pass = password_hash('12345678',PASSWORD_BCRYPT);
        $this->user->rawQuery("INSERT INTO `users`(`name`, `email`,`password`) VALUES ('$name','$email','$pass')");
    }
}
