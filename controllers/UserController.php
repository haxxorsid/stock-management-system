<?php

/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 2:32 AM
 */
require_once 'Controller.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/Employee.php';
require_once __DIR__ . '/../helpers/ValidateParams.php';

class UserController extends Controller
{

    public static function index(){
        $page = 'table';
        self::view('layouts/app.php', $page);
    }

    public static function get(){
        $user = new User();
        $users = $user->get();
        foreach($users as $user){
            $employee = new Employee();
            $employee = $employee->show($user['employee_id']);
            $user['employee'] =  $employee;
            array_shift($users);
            array_push($users, $user);
        }
        $data['data'] = $users;
        echo json_encode($data);
    }

    public static function show($id)
    {
        $user = new User();
        $user = $user->show($id);
        if($user == false){
            $d = ['user' => ['No user found with this id.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }else{
            $data['data'] = ['id' => $user['id'], 'email' => $user['email'], 'admin' => $user['admin']];
            header('Content-type: application/json');
            echo json_encode($data);
        }
    }

    public static function showByEmployee($emp_id)
    {

        $user = new User();
        $user = $user->showByEmployee($emp_id);
        if($user == false){
            $d = ['user' => ['No user found with this id.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }else{
            $data['data'] = ['email' => $user['email']];
            header('Content-type: application/json');
            echo json_encode($data);
        }
    }

    public static function insert($data){
        $user = new User();
        $result = true;
        $d = [];
        if (!ValidateParams::email($data['email'])) {
            $result = false;
            $d['email'] = ['The email must be a valid email address and length must be less than 121 chars.'];
        }
        if (!ValidateParams::validateInteger($data['emp_id'])) {
            $result = false;
            $d['weight'] = ['The employee_id must be a integer value'];
        }
        if($result == true){
            $user = $user->insert($data);
            if ($user == false) {
                $d = ['user' => ['There was an error inserting user.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['user' => ['User has been successfully added.']];
                header('Content-type: application/json');
                echo json_encode($d);
            }
        }else{
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }

    public static function update($data, $profile=false){
        $user = new User();
        $result = true;
        $d = [];
        if (!ValidateParams::email($data['email'])) {
            $result = false;
            $d['email'] = ['The email must be a valid email address and length must be less than 121 chars.'];
        }
        if($profile){
            if (!ValidateParams::password($data['password'])) {
                $result = false;
                $d['password'] = ['The password\'s length must be greater than 6 chars and less than 129 chars.'];
            }
            if ($result == true) {
                if ($data['password'] != $data['password_confirmation']) {
                    $result = false;
                    $d['password'] = ['Both passwords must match to save changes.'];
                }
            }
        }
        if($result == false){
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
        else {
            if($profile)
                $user = $user->updateByEmployee($data);
            else
                $user = $user->update($data);
            if ($user == false) {
                $d = ['user' => ['There was an error updating content.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {

                $d = ['user' => ['Information has been successfully updated.']];
                header('Content-type: application/json');
                echo json_encode($d);
            }
        }
    }

    public static function delete($id){
        $user = new User();
        if($user->delete($id)){
            $d = ['user' => ['User has been successfully deleted.']];
            header('Content-type: application/json');
            echo json_encode($d);
        }else{
            $d = ['user' => ['There was an error deleting user.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }
}