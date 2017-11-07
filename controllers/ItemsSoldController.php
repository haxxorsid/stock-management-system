<?php
/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 6:39 PM
 */
require_once 'Controller.php';
require_once __DIR__ . '/../model/ItemsSold.php';
require_once __DIR__ . '/../model/Stock.php';
require_once __DIR__ . '/../model/Employee.php';
require_once __DIR__ . '/../model/Customer.php';
require_once __DIR__ . '/../model/Transaction.php';
require_once __DIR__ . '/../helpers/ValidateParams.php';


class ItemsSoldController extends Controller
{
    public static function index(){
        $page = 'table';
        self::view('layouts/app.php', $page);
    }

    public static function get(){
        $sold_item = new ItemsSold();
        $sold_items = $sold_item->get();
        foreach($sold_items as $sold_item){
            $stock = new Stock();
            $stock = $stock->show($sold_item['stock_id']);
            $sold_item['stock'] =  $stock;
            $customer = new Customer();
            $customer = $customer->show($sold_item['customer_id']);
            $sold_item['customer'] =  $customer;
            $employee = new Employee();
            $employee = $employee->show($sold_item['employee_id']);
            $sold_item['employee'] =  $employee;
            $transaction = new Transaction();
            $transaction = $transaction->show($sold_item['transaction_id']);
            $sold_item['transaction'] =  $transaction;
            array_shift($sold_items);
            array_push($sold_items, $sold_item);
        }

        $data['data'] = $sold_items;
        echo json_encode($data);
    }

    public static function show($id)
    {
        $sold_item = new ItemsSold();
        $sold_item = $sold_item->show($id);
        if($sold_item == false){
            $d = ['items_sold' => ['No stock found with this id.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }else{
            $data['data'] = ['stock_id' => $sold_item['stock_id'], 'customer_id' => $sold_item['customer_id'], 'employee_id' => $sold_item['employee_id'], 'transaction_id' => $sold_item['transaction_id'], 'price' => $sold_item['price'], 'dos' => $sold_item['dos']];
            header('Content-type: application/json');
            echo json_encode($data);
        }
    }

    public static function insert($data){
        $sold_item = new ItemsSold();
        $result = true;
        $d = [];
        if (!ValidateParams::validateInteger($data['stock_id'])) {
            $result = false;
            $d['stock_id'] = ['The stock id must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['employee_id'])) {
            $result = false;
            $d['employee_id'] = ['The employee id must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['customer_id'])) {
            $result = false;
            $d['customer_id'] = ['The customer id must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['transaction_id'])) {
            $result = false;
            $d['transaction_id'] = ['The transaction id must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['price'])) {
            $result = false;
            $d['price'] = ['The price must be a integer value'];
        }
        if (!ValidateParams::dateTime($data['dos'])) {
            $result = false;
            $d['dos'] = ['The date must be in valid format(Y-m-d H:i:s).'];
        }
        if($result == true){
            $sold_item = $sold_item->insert($data);
            if ($sold_item == false) {
                $d = ['items_sold' => ['There was an error inserting sold item.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['items_sold' => ['New sold item has been added.']];
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
        $sold_item = new ItemsSold();
        $result = true;
        $d = [];
        if (!ValidateParams::validateInteger($data['stock_id'])) {
            $result = false;
            $d['stock_id'] = ['The stock id must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['employee_id'])) {
            $result = false;
            $d['employee_id'] = ['The employee id must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['customer_id'])) {
            $result = false;
            $d['customer_id'] = ['The customer id must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['transaction_id'])) {
            $result = false;
            $d['transaction_id'] = ['The transaction id must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['price'])) {
            $result = false;
            $d['price'] = ['The price must be a integer value'];
        }
        if (!ValidateParams::dateTime($data['dos'])) {
            $result = false;
            $d['dos'] = ['The date must be in valid format(Y-m-d H:i:s).'];
        }
        if($result == true){
            $sold_item = $sold_item->update($data);
            if ($sold_item == false) {
                $d = ['items_sold' => ['There was an error updating content.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['items_sold' => ['Sold item has been successfully updated.']];
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
        $sold_item = new ItemsSold();
        if($sold_item->delete($id)){
            $d = ['items_sold' => ['Item sold has been deleted.']];
            header('Content-type: application/json');
            echo json_encode($d);
        }else{
            $d = ['items_sold' => ['There was an error deleting the item.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }

    public static function info(){
        $stock = new Stock();
        $stocks = $stock->get();
        $customer = new Customer();
        $customers = $customer->get();
        $employee = new Employee();
        $employees = $employee->get();
        $transaction = new Transaction();
        $transactions = $transaction->get(false);
        $data['data']['stocks'] = $stocks;
        $data['data']['customers'] = $customers;
        $data['data']['employees'] = $employees;
        $data['data']['transactions'] = $transactions;
        echo json_encode($data);
    }
}