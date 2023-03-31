<?php

use Carbon\Carbon;
use Laravolt\Avatar\Avatar;

require_once 'vendor/autoload.php';
date_default_timezone_set('Asia/Jakarta');
setlocale(LC_ALL, 'id_ID');
Carbon::setLocale('id');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
define('APP_PATH', './');
define('BASE_URL', $_ENV['URL_PATH']);
define('CONTROLLER_PATH', APP_PATH . 'controllers/');
define('VIEW_PATH', APP_PATH . 'views/');
define('API_CONTROLLER_PATH', APP_PATH . 'controllers/api/');
define('MODELS_PATH', APP_PATH . 'models/');
define('TRAIT_PATH', APP_PATH . 'traits/');
define('ASSET_PATH', APP_PATH . 'assets/');
define('URL_PATH', $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

error_reporting(E_ERROR);
ini_set('display_errors', 'On');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: *");



/**
 * @Author: Muhammad Adi Saputro
 * github.com/xyz970
 * 
 * Note:
 * URI adalah karakter umum yang mengidentifikasi sebuah resource web menggunakan nama, lokasi, atau nama dan lokasi resource tersebut. 
 *  Baik resource pada internet, maupun tidak.
 *  ex. localhost/test/index.php/
 * 
 * URL merupakan kepanjangan dari Uniform Resource Locator hal ini berkaitan dengan karakter tertentu.
 *  biasanya terdiri dari angka, huruf dan simbol yang menuju ke alamat www (World Wide Web)
 * ex. http://localhost/test/index.php/
 * URL == URI Tapi URI != URL
 *  
 */

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);
// print_r($uri[2]);
if ($_ENV['ENV'] == 'development') {

    if (strtolower($uri[2]) == "api") {
        $class = ucfirst($uri[3]);
        $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
        $targetClass = $class . 'APIController';
        $controller = new $targetClass();
        if (empty($uri[4])) {
            $strMethodName = $requestMethod . 'Index';
        } else {
            $strMethodName = $requestMethod . ucfirst($uri[4]);
        }
        $controller->$strMethodName();
    } else {
        if ($uri[2] == "") {
            $indx = new IndexController();
            $indx->getIndex();
        } else {
            $class = ucfirst($uri[2]);
            $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
            $targetClass = $class . 'Controller';
            $controller = new $targetClass();
            if (empty($uri[3]) || $uri[3] == ' ') {
                $strMethodName = $requestMethod . 'Index';
            } else {
                $strMethodName = $requestMethod . ucfirst($uri[3]);
                // echo $strMethodName;
            }
            $controller->$strMethodName();
        }
    }
} elseif ($_ENV['ENV'] == 'prod') {
    if (strtolower($uri[1]) == "api") {
        $class = ucfirst($uri[2]);
        $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
        $targetClass = $class . 'APIController';
        $controller = new $targetClass();
        if (empty($uri[3])) {
            $strMethodName = $requestMethod . 'Index';
        } else {
            $strMethodName = $requestMethod . ucfirst($uri[3]);
        }
        $controller->$strMethodName();
    } else {
        if ($uri[1] == " " || empty($uri[1]))  {
            $indx = new IndexController();
            $indx->getIndex();
        } else {
            $class = ucfirst($uri[1]);
            $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
            $targetClass = $class . 'Controller';
            $controller = new $targetClass();
            if (empty($uri[2]) || $uri[2] == ' ') {
                $strMethodName = $requestMethod . 'Index';
            } else {
                $strMethodName = $requestMethod . ucfirst($uri[2]);
                // echo $strMethodName;
            }
            $controller->$strMethodName();
        }
    }
}



function avatar($nama)
{
    $avatar = new Avatar();
    return $avatar->create($nama)->setBackground('#696CFF');
}

function getActivePage($nama_page)
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode('/', $uri);
    if ($_ENV['ENV'] == 'prod') {
        if ($uri[1] == $nama_page) {
            return "active";
        }
        return "";
    } else if($_ENV['ENV'] == 'development') {
        if ($uri[2] == $nama_page) {
            return "active";
        }
        return "";
    }
    
    
}
