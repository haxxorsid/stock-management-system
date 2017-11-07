<?php
/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 29-Sep-17
 * Time: 7:28 PM
 */

class Route
{
    public function view($path){
        include_once __DIR__ . '/../views/' . $path;
    }

    public static function response($code, $d){
        $data =  $d;
        header('Content-type: application/json');
        http_response_code($code);
        echo json_encode( $data );
    }
}