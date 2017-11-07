<?php
/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 30-Sep-17
 * Time: 4:41 PM
 */
require_once 'Model.php';

class Rate extends Model
{
    function count()
    {
        $sql = "SELECT * FROM rates;";
        $result = $this->conn->query($sql);

        return $result->num_rows;
    }

    function get()
    {
        $json = [];
        $sql = "SELECT * FROM rates;";
        $result = $this->conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $row['id'] = (int) $row['id'];
            $row['rate'] = (float) $row['rate'];
            $json[] = $row;
        }

        return $json;
    }

    function insert($data)
    {
        $sql = "INSERT INTO rates (`rate`, `date`) VALUES ('" . $data['rate'] . "', '" . $data['date'] . "')";

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
        $sql = "SELECT * FROM rates WHERE id='$id';";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $row['id'] = (int) $row['id'];
            $row['rate'] = (float) $row['rate'];
            $this->conn->close();
            return $row;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function update($data)
    {
        $sql = "UPDATE rates SET rate='" . $data['rate'] . "', date='" . $data['date'] . "' WHERE id=" . $data["id"];

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
        $sql = "DELETE FROM rates WHERE id='$id'";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }
}