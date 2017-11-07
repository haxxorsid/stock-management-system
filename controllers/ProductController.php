<?php
/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 2:23 PM
 */
require_once 'Controller.php';
require_once __DIR__ . '/../model/Product.php';
require_once __DIR__ . '/../helpers/ValidateParams.php';

class ProductController extends Controller
{
    public static function index(){
        $page = 'table';
        self::view('layouts/app.php', $page);
    }

    public static function get(){
        $product = new Product();
        $products = $product->get();
        $data['data'] = $products;
        echo json_encode($data);
    }

    public static function show($id)
    {
        $product = new Product();
        $product = $product->show($id);
        if($product == false){
            $d = ['product' => ['No product found with this id.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }else{
            $data['data'] = ['name' => $product['name']];
            header('Content-type: application/json');
            echo json_encode($data);
        }
    }

    public static function insert($data){
        $product = new Product();
        $result = true;
        $d = [];
        if (!ValidateParams::productName($data['name'])) {
            $result = false;
            $d['name'] = ['The name must be a valid string and it\'s length must not be greater than 70 chars.'];
        }
        if($result == true){
            $product = $product->insert($data);
            if ($product == false) {
                $d = ['product' => ['There was an error inserting product.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['product' => ['Product has been successfully added.']];
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
        $product = new Product();
        $result = true;
        $d = [];
        if (!ValidateParams::name($data['name'])) {
            $result = false;
            $d['name'] = ['The name must be a valid string and it\'s length must not be greater than 70 chars.'];
        }
        if($result == true){
            $product = $product->update($data);
            if ($product == false) {
                $d = ['product' => ['There was an error inserting product.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['product' => ['Product has been successfully updated.']];
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
        $product = new Product();
        if($product->delete($id)){
            $d = ['product' => ['Product has been successfully deleted.']];
            header('Content-type: application/json');
            echo json_encode($d);
        }else{
            $d = ['product' => ['There was an error deleting product.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }
}