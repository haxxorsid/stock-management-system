<?php

/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 12:15 AM
 */

class Model
{
    public $conn;
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project5.6";
        $this->conn = new mysqli($servername, $username, $password, $dbname);
    }

}