<?php
/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 3:40 PM
 */
require_once 'Controller.php';
require_once __DIR__ . '/../model/Merchant.php';
require_once __DIR__ . '/../helpers/ValidateParams.php';

class MerchantController extends Controller
{
    public static function index(){
        $page = 'table';
        self::view('layouts/app.php', $page);
    }

    public static function get(){
        $merchant = new Merchant;
        $merchants = $merchant->get();
        $data['data'] = $merchants;
        echo json_encode($data);
    }

    public static function show($id)
    {
        $merchant = new Merchant();
        $merchant = $merchant->show($id);
        if($merchant == false){
            $d = ['merchant' => ['No merchant found with this id.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }else{
            $data['data'] = ['name' => $merchant['name'], 'phone' => $merchant['phone'], 'address' => $merchant['address'], 'email' => $merchant['email']];
            header('Content-type: application/json');
            echo json_encode($data);
        }
    }

    public static function insert($data){
        $merchant = new Merchant();
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
            $merchant = $merchant->insert($data);
            if ($merchant == false) {
                $d = ['merchant' => ['There was an error inserting merchant.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['merchant' => ['Merchant has been successfully added.']];
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
        $merchant = new Merchant();
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
            $merchant = $merchant->update($data);
            if ($merchant == false) {
                $d = ['merchant' => ['There was an error updating content.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['merchant' => ['Information has been successfully updated.']];
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
        $merchant = new Merchant();
        if($merchant->delete($id)){
            $d = ['merchant' => ['Merchant has been successfully deleted.']];
            header('Content-type: application/json');
            echo json_encode($d);
        }else{
            $d = ['merchant' => ['There was an error deleting merchant.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }
}