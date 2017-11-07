<?php

/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 29-Sep-17
 * Time: 10:25 PM
 */
require_once 'Controller.php';

class HomeController extends Controller
{
    public static function index()
    {
        $page = 'home';
        self::view('layouts/app.php', $page);
    }
}