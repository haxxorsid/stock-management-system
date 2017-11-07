<?php

/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 29-Sep-17
 * Time: 11:03 PM
 */

class ValidateParams
{
    private static function security($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    static function email($email){
        $email = self::security($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 120) {
            return false;
        }
        return true;
    }

    static function name($name){
        $name = self::security($name);
        if (!preg_match("/^[a-zA-Z ]*$/",$name) || strlen($name) >70) {
            return false;
        }
        return true;
    }

    static function productName($name){
        $name = self::security($name);
        if (strlen($name) >35) {
            return false;
        }
        return true;
    }

    static function address($address){
        $address = self::security($address);
        if (strlen($address) >95) {
            return false;
        }
        return true;
    }

    static function gender($gender){
        $gender = self::security($gender);
        if ($gender == 'M' || $gender =='F') {
            return true;
        }
        return false;
    }

    static function phone($phone){
        $phone = self::security($phone);
        if (!preg_match("/^[1-9][0-9]{2,14}$/",$phone)  || strlen($phone) >15  || strlen($phone) <3 ) {
            return false;
        }
        return true;
    }

    static function rate($rate){
        $rate = self::security($rate);
        if (!preg_match('/^\s*[+\-]?(?:\d+(?:\.\d*)?|\.\d+)\s*$/',$rate)  || strlen($rate) >13 ) {
            return false;
        }
        return true;
    }

    static function validateInteger($weight){
        $weight = self::security($weight);
        if (!filter_var($weight, FILTER_VALIDATE_INT) ) {
            return false;
        }
        return true;
    }


    static function date($date) {
        $date = self::security($date);
        if(preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $date, $matches))
        {
            if(checkdate($matches[2], $matches[3], $matches[1]))
            {
                return true;
            }
            return false;
        }
        return false;
    }

    static function dateTime($dateTime) {
        $dateTime = self::security($dateTime);
        if(DateTime::createFromFormat('Y-m-d H:i:s', $dateTime))
        {
            return true;
        }
        return false;
    }

    static function password($pass){
        $pass = self::security($pass);
        if (strlen($pass) >128  || strlen($pass) <6 ) {
            return false;
        }
        return true;
    }
}