<?php
/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 4:34 PM
 */
require_once 'Model.php';

class Product extends Model
{
    function get()
    {
        $json = [];
        $sql = "SELECT * FROM products;";
        $result = $this->conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $json[] = $row;
        }

        return $json;
    }

    function insert($data)
    {
        $sql = "INSERT INTO products (`name`) VALUES ('" . $data['name'] . "')";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function show($id)
    {
        $sql = "SELECT * FROM products WHERE id='$id';";
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

    function update($data)
    {
        $sql = "UPDATE products SET name='" . $data['name'] . "' WHERE id=" . $data["id"];

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function delete($id)
    {
        $sql = "DELETE FROM products WHERE id='$id'";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }
}
