<?php

/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 2:12 AM
 */
require_once 'Model.php';

class Employee extends Model
{
    function count(){
        $sql = "SELECT * FROM employees;";
        $result = $this->conn->query($sql);

        return $result->num_rows;
    }

    function get(){
        $json = [];
        $sql = "SELECT * FROM employees;";
        $result = $this->conn->query($sql);
        while($row = mysqli_fetch_assoc($result)){
            $json[] = $row;
        }

        return $json;
    }

    function insert($data){
        $sql = "INSERT INTO employees (`name`, `address`, `phone`, `gender`, `doj`) VALUES ('".$data['name']."', '".$data['address']."', '".$data['phone']."', '".$data['gender']."', '".$data['doj']."')";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function show($id){
        $sql = "SELECT * FROM employees WHERE id='$id';";
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

    function update($data){
        $sql = "UPDATE employees SET name='".$data['name']."', address='".$data['address']."', phone='".$data['phone']."', gender='".$data['gender']."', doj='".$data['doj']."' WHERE id=".$data["id"];

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function delete($id){
        $sql = "DELETE FROM employees WHERE id='$id'";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

}