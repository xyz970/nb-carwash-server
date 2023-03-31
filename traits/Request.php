<?php
// namespace Traits;
// namespace traits\Request;
trait Request
{
    /**
     * @param mixed $formName 
     * Get param dari url
     * 
     * ex. localhost/test?id=20
     * 
     * akan memunculkan 20
     * @return string
     */
    public function get($formName)
    {

        return $_GET[$formName];
    }


    /**
     * @param mixed $formName
     * Get form value
     * 
     * Sama kaya $_POST['formName'];
     * @return string
     */
    public function post($formName)
    {
        return $_POST[$formName];
    }


    /**
     * @param mixed $formName
     * Get form value
     * 
     * Sama kaya $_FILES['formName'];
     * @return string
     */
    public function files($formName)
    {
        return $_FILES[$formName];
    }

    /**
     * @param mixed $formName
     * Get form value
     * 
     * Sama kaya $_COOKIE['formName'];
     * @return string
     */
    public function cookie($formName)
    {
        return $_COOKIE[$formName];
    }

    /**
     * Get form value
     * @return array
     */
    public function all()
    {
        return $_REQUEST;
    }

    /**
     * @param mixed $array
     * Get form value
     * @return array
     */
    public function only($array)
    {
        for ($i = 0; $i < count($array); $i++) {
            $input[] = $array[$i];
        }
        return $input;
    }
}
