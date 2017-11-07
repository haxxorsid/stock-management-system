<?php

/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 29-Sep-17
 * Time: 10:25 PM
 */
require_once 'Controller.php';
require_once __DIR__ . '/../helpers/ValidateParams.php';
require_once __DIR__ . '/../model/User.php';

class LoginController extends Controller
{
    public static function index()
    {
        $page = 'login';
        self::view('layouts/app.php', $page);
    }

    public static function login($data)
    {
        $user = new User();
        $result = true;
        if (!ValidateParams::email($data['email'])) {
            $result = false;
            $d['email'] = ['The email must be a valid email address and length must be less than 121 chars.'];
        }
        if (!ValidateParams::password($data['password'])) {
            $result = false;
            $d['password'] = ['The password\'s length must be greater than 6 chars and less than 129 chars.'];
        }
        if ($result == true) {
            if (!$user->valid($data['email'], $data['password'])) {
                $result = false;
                $d['email'] = ['These credentials do not match our record.'];
            }
        }
        if($result==false) {
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }else{
            if(session_id() == '' || !isset($_SESSION)) {
                session_start();
            }
            new ActivitySummary();
            $_SESSION['username'] = $data['email'];
        }
    }

    public static function logout(){
        session_destroy();
        if(isset($_SESSION['username']))
            unset($_SESSION['username']);
        header('Location: /login');
    }
}