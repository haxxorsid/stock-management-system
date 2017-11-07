<?php

/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 29-Sep-17
 * Time: 9:53 PM
 */
class ValidateRoutes
{

    public static function webValidate($uri)
    {
        $items1 = array('login',
            'profile',
            'customers',
            'employees',
            'merchants',
            'products',
            'rates',
            'stocks',
            'items_sold',
            'transactions',
            'users',
            'logout'
        );

        if($uri[1] == ''){
            return true;
        }
        if (in_array($uri[1], $items1)) {
                return true;
        }
        return false;
    }

    public static function apiValidate($section)
    {
        $items1 =
            array(
                'login',
                'tables',
                'customers',
                'employees',
                'merchants',
                'products',
                'rates',
                'stocks',
                'stockInfo',
                'items_sold',
                'items_sold_info',
                'transactions',
                'users'
            );
        if (in_array($section, $items1)) {
            return true;
        }
        return false;
    }
}