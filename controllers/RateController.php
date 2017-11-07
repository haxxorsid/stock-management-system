<?php
/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 2:23 PM
 */
require_once 'Controller.php';
require_once __DIR__ . '/../model/Rate.php';
require_once __DIR__ . '/../helpers/ValidateParams.php';

class RateController extends Controller
{
    public static function index(){
        $page = 'table';
        self::view('layouts/app.php', $page);
    }

    public static function get(){
        $rate = new Rate();
        $rates = $rate->get();
        $data['data'] = $rates;
        echo json_encode($data);
    }

    public static function show($id)
    {
        $rate = new Rate();
        $rate = $rate->show($id);
        if($rate == false){
            $d = ['rate' => ['No rate found with this id.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }else{
            $data['data'] = ['rate' => $rate['rate'], 'date' => $rate['date']];
            header('Content-type: application/json');
            echo json_encode($data);
        }
    }

    public static function insert($data){
        $rate = new Rate();
        $result = true;
        $d = [];
        if (!ValidateParams::rate($data['rate'])) {
            $result = false;
            $d['name'] = ['The name must be a valid string and it\'s length must not be greater than 70 chars.'];
        }
        if (!ValidateParams::date($data['date'])) {
            $result = false;
            $d['address'] = ['The address must be a valid string and it\'s length must not be greater than 95 chars.'];
        }
        if($result == true){
            $rate = $rate->insert($data);
            if ($rate == false) {
                $d = ['rate' => ['There was an error inserting rate.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['rate' => ['Rate has been successfully added.']];
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
        $rate = new Rate();
        $result = true;
        $d = [];
        if (!ValidateParams::rate($data['rate'])) {
            $result = false;
            $d['name'] = ['The name must be a valid string and it\'s length must not be greater than 70 chars.'];
        }
        if (!ValidateParams::date($data['date'])) {
            $result = false;
            $d['address'] = ['The address must be a valid string and it\'s length must not be greater than 95 chars.'];
        }
        if($result == true){
            $rate = $rate->update($data);
            if ($rate == false) {
                $d = ['rate' => ['There was an error updating content.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['rate' => ['Information has been successfully updated.']];
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
        $rate = new Rate();
        if($rate->delete($id)){
            $d = ['rate' => ['Rate has been successfully deleted.']];
            header('Content-type: application/json');
            echo json_encode($d);
        }else{
            $d = ['rate' => ['There was an error deleting rate.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }
}