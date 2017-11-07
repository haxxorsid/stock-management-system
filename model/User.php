<?php
/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 12:12 AM
 */

require_once 'Model.php';

class User extends Model{
    function valid($email, $pass){
        $sql = "SELECT * FROM users WHERE email='$email'  AND password='$pass';";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION['id'] = $row['employee_id'];
            $_SESSION['admin'] = $row['admin'];
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
        }

    }

    function get(){
        $json = [];
        $sql = "SELECT * FROM users;";
        $result = $this->conn->query($sql);
        while($row = mysqli_fetch_assoc($result)){
            $json[] = $row;
        }

        return $json;
    }

    function insert($data){
        $sql = "INSERT INTO users (`employee_id`, `email`, `password`, `admin`) VALUES ('".$data['emp_id']."', '".$data['email']."', 'secret', '".$data['admin']."')";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function show($id){
        $sql = "SELECT * FROM users WHERE id='$id';";
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

    function showByEmployee($emp_id){
        $sql = "SELECT * FROM users WHERE employee_id='$emp_id';";
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
        $sql = "UPDATE users SET email='".$data['email']."', admin='".$data['admin']."' WHERE id=".$data["id"];

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function updateByEmployee($data){
        $sql = "UPDATE users SET email='".$data['email']."', password='".$data['password']."' WHERE employee_id=".$data["employee_id"];

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function delete($id){
        $sql = "DELETE FROM users WHERE id='$id'";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }
}
