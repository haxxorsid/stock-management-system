<?php
/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 2:23 PM
 */
require_once 'Controller.php';
require_once __DIR__ . '/../model/Transaction.php';
require_once __DIR__ . '/../model/Rate.php';
require_once __DIR__ . '/../helpers/ValidateParams.php';

class TransactionController extends Controller
{
    public static function index(){
        $page = 'table';
        self::view('layouts/app.php', $page);
    }

    public static function get($latest=false){
        $transaction = new Transaction();
        $transactions = $transaction->get($latest);
        foreach($transactions as $transaction){
            $rate = new Rate();
            $rate = $rate->show($transaction['rate_id']);
            $transaction['rate'] =  $rate;
            array_shift($transactions);
            array_push($transactions, $transaction);
        }

        $data['data'] = $transactions;
        echo json_encode($data);
    }

    public static function show($id)
    {
        $transaction = new Transaction();
        $transaction = $transaction->show($id);
        if($transaction == false){
            $d = ['transaction' => ['No transaction found with this id.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }else{
            $data['data'] = ['weight' => $transaction['weight'], 'purity' => $transaction['purity'], 'rate_id' => $transaction['rate_id']];

            header('Content-type: application/json');
            echo json_encode($data);
        }
    }

    public static function insert($data){
        $transaction = new Transaction();
        $result = true;
        $d = [];
        if (!ValidateParams::validateInteger($data['weight'])) {
            $result = false;
            $d['weight'] = ['The weight must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['purity'])) {
            $result = false;
            $d['purity'] = ['The purity must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['rate_id'])) {
            $result = false;
            $d['rate id'] = ['The rate id must be a integer value'];
        }
        if($result == true){
            $transaction = $transaction->insert($data);
            if ($transaction == false) {
                $d = ['transaction' => ['There was an error inserting transaction.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                ActivitySummary::transactions($data);
                $d = ['transaction' => ['Transaction has been successfully added.']];
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
        $transaction = new Transaction();
        $result = true;
        $d = [];
        if (!ValidateParams::validateInteger($data['weight'])) {
            $result = false;
            $d['weight'] = ['The weight must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['purity'])) {
            $result = false;
            $d['purity'] = ['The purity must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['rate_id'])) {
            $result = false;
            $d['rate_id'] = ['The rate id must be a integer value'];
        }
        if($result == true){
            $transaction = $transaction->update($data);
            if ($transaction == false) {
                $d = ['transaction' => ['There was an error updating content.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['transaction' => ['Transaction has been successfully updated.']];
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
        $transaction = new Transaction();
        if($transaction->delete($id)){
            $d = ['transaction' => ['Transaction has been successfully deleted.']];
            header('Content-type: application/json');
            echo json_encode($d);
        }else{
            $d = ['transaction' => ['There was an error deleting transaction.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }
}