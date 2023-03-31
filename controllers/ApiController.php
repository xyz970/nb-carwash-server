<?php
require_once(APP_PATH . 'traits/Request.php');
class ApiController
{
    use Request;
    public function succesResponse($data = '', $message = "Success")
    {
        header('Content-Type: application/json');
        if ($data == ' ') {
            $response = array(
                'status' => 'true',
                'message' => $message,
            );
        } else {
            $response = array(
                'status' => 'true',
                'message' => $message,
                'data' => $data,
            );
        }
        echo json_encode($response);
    }

    public function errorResponse($message = 'Not Found', $code = 404)
    {
        http_response_code($code);
        $data = array(
            'message' => $message,
            'status' => $code,
        );
        echo json_encode($data);
    }
}
