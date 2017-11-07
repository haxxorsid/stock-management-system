<?php
/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 2:15 AM
 */
require_once __DIR__ . '/../model/Employee.php';
require_once __DIR__ . '/../model/Transaction.php';
require_once __DIR__ . '/../model/Customer.php';

class TableController extends Controller{

    public static function count(){

        $customers = new Customer();
        $customers = $customers->count();
        $transactions = new Transaction();
        $transactions = $transactions->count();
        $employees = new Employee();
        $employees = $employees->count();
        $sold_items = new ItemsSold();
        $sold_items = $sold_items->count();
        $data['data'] = ['employees' => $employees, 'customers' => $customers, 'transactions' => $transactions, 'items_sold' => $sold_items];
        header('Content-type: application/json');
        echo json_encode($data);

    }
}