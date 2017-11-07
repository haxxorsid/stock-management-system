<?php
/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 3:54 AM
 */

require_once 'Controller.php';
require_once __DIR__ . '/../model/Customer.php';

class CustomerController extends Controller{

    public static function index(){
        $page = 'table';
        self::view('layouts/app.php', $page);
    }

    public static function get(){
        $customer = new Customer();
        $customers = $customer->get();
        $data['data'] = $customers;
        echo json_encode($data);
    }

    public static function show($id)
    {
        $customer = new Customer();
        $customer = $customer->show($id);
        if($customer == false){
            $d = ['customer' => ['No customer found with this id.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }else{
            $data['data'] = ['name' => $customer['name'], 'address' => $customer['address'], 'email' => $customer['email'], 'phone' => $customer['phone']];
            header('Content-type: application/json');
            echo json_encode($data);
        }
    }

    public static function insert($data){
        $customer = new Customer();
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
        if (!ValidateParams::email($data['email'])) {
            $result = false;
            $d['email'] = ['The email must be a valid email address and length must be less than 121 chars.'];
        }
        if (!ValidateParams::phone($data['phone'])) {
            $result = false;
            $d['phone'] = ['The phone must not be greater than 15 digits.'];
        }
        if($result == true){
            $customer = $customer->insert($data);
            if ($customer == false) {
                $d = ['customer' => ['There was an error inserting customer.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['customer' => ['Customer has been successfully added.']];
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
        $customer = new Customer();
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
        if (!ValidateParams::email($data['email'])) {
            $result = false;
            $d['email'] = ['The email must be a valid email address and length must be less than 121 chars.'];
        }
        if (!ValidateParams::phone($data['phone'])) {
            $result = false;
            $d['phone'] = ['The phone must not be greater than 15 digits.'];
        }
        if($result == true){
            $customer = $customer->update($data);
            if ($customer == false) {
                $d = ['customer' => ['There was an error updating content.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['customer' => ['Information has been successfully updated.']];
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
        $customer = new Customer();
        if($customer->delete($id)){
            $d = ['customer' => ['Customer has been successfully deleted.']];
            header('Content-type: application/json');
            echo json_encode($d);
        }else{
            $d = ['customer' => ['There was an error deleting customer.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }
}