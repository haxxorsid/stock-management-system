<?php

/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 2:13 AM
 */

require_once 'Model.php';
class Customer extends Model
{
    function count(){
        $sql = "SELECT * FROM customers;";
        $result = $this->conn->query($sql);

        return $result->num_rows;
    }

    function get(){
        $json = [];
        $sql = "SELECT * FROM customers;";
        $result = $this->conn->query($sql);
        while($row = mysqli_fetch_assoc($result)){
            $json[] = $row;
        }

        return $json;
    }

    function show($id){
        $sql = "SELECT * FROM customers WHERE id='$id';";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->conn->close();
            return $row;
        } else {
            $this->conn->close();
            return false;
        }
    }


    function insert($data){
        $sql = "INSERT INTO customers (name, address, phone, email) VALUES ('".$data['name']."', '".$data['address']."', '".$data['phone']."', '".$data['email']."')";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function update($data){
        $sql = "UPDATE customers SET name='".$data['name']."', address='".$data['address']."', email='".$data['email']."', phone='".$data['phone']."' WHERE id=".$data["id"];

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function delete($id){
        $sql = "DELETE FROM customers WHERE id='$id'";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }
}