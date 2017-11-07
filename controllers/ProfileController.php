<?php

/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 29-Sep-17
 * Time: 10:26 PM
 */
require_once 'Controller.php';

class ProfileController extends Controller
{
    public static function index()
    {
        $page = 'profile';
        $id = $_SESSION['id'];

        self::view('layouts/app.php', $page, $id);
    }
}