<?php
/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 2:32 AM
 */
require_once 'Controller.php';
require_once __DIR__ . '/../model/Employee.php';
require_once __DIR__ . '/../helpers/ValidateParams.php';

class EmployeeController extends Controller
{
    public static function index(){
        $page = 'table';
        self::view('layouts/app.php', $page);
    }

    public static function get(){
        $employee = new Employee();
        $employees = $employee->get();
        $data['data'] = $employees;
        echo json_encode($data);
    }

    public static function show($id)
    {
        $employee = new Employee();
        $employee = $employee->show($id);
        if($employee == false){
            $d = ['employee' => ['No employee found with this id.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }else{
            $data['data'] = ['name' => $employee['name'], 'phone' => $employee['phone'], 'address' => $employee['address'], 'gender' => $employee['gender'], 'doj' => $employee['doj']];
            header('Content-type: application/json');
            echo json_encode($data);
        }
    }

    public static function insert($data){
        $employee = new Employee();
        $result = true;
        $d = [];
        if (!ValidateParams::name($data['name'])) {
            $result = false;
            $d['name'] = ['The name must be a valid string and it\'s length must not be greater than 70 chars.'];
        }
        if (!ValidateParams::address($data['address'])) {
            $result = false;
            $d['address'] = ['The address must be a valid string and it\'s length must not be greater than 95 chars.'];
        }
        if (!ValidateParams::date($data['doj'])) {
            $result = false;
            $d['doj'] = ['The date must be in valid format(YYYY-MM-DD).'];
        }
        if (!ValidateParams::phone($data['phone'])) {
            $result = false;
            $d['phone'] = ['The phone must not be greater than 15 digits.'];
        }
        if (!ValidateParams::gender($data['gender'])) {
            $result = false;
            $d['gender'] = ['The gender must be either Male or Female.'];
        }
        if($result == true){
            $employee = $employee->insert($data);
            if ($employee == false) {
                $d = ['employee' => ['There was an error inserting employee.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['employee' => ['Employee has been successfully added.']];
                header('Content-type: application/json');
                echo json_encode($d);
            }
        }else{
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }

    public static function update($data){
        $employee = new Employee();
        $result = true;
        $d = [];
        if (!ValidateParams::name($data['name'])) {
            $result = false;
            $d['name'] = ['The name must be a valid string and it\'s length must not be greater than 70 chars.'];
        }
        if (!ValidateParams::address($data['address'])) {
            $result = false;
            $d['address'] = ['The address must be a valid string and it\'s length must not be greater than 95 chars.'];
        }
        if (!ValidateParams::date($data['doj'])) {
            $result = false;
            $d['doj'] = ['The date must be in valid format(YYYY-MM-DD).'];
        }
        if (!ValidateParams::phone($data['phone'])) {
            $result = false;
            $d['phone'] = ['The phone must not be greater than 15 digits.'];
        }
        if (!ValidateParams::gender($data['gender'])) {
            $result = false;
            $d['gender'] = ['The gender must be either Male or Female.'];
        }
        if($result == true){
            $employee = $employee->update($data);
            if ($employee == false) {
                $d = ['employee' => ['There was an error updating content.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['employee' => ['Information has been successfully updated.']];
                header('Content-type: application/json');
                echo json_encode($d);
            }
        }else{
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }

    public static function delete($id){
        $employee = new Employee();
        if($employee->delete($id)){
            $d = ['employee' => ['Employee has been successfully deleted.']];
            header('Content-type: application/json');
            echo json_encode($d);
        }else{
            $d = ['employee' => ['There was an error deleting employee.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }
}