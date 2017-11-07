<?php
/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 29-Sep-17
 * Time: 7:03 PM
 */

require_once 'Route.php';
require_once __DIR__ . '/../routes/ValidateRoutes.php';
require_once __DIR__ . '/../helpers/Auth.php';
require_once __DIR__ . '/../controllers/HomeController.php';
require_once __DIR__ . '/../controllers/LoginController.php';
require_once __DIR__ . '/../controllers/ProfileController.php';
require_once __DIR__ . '/../controllers/CustomerController.php';
require_once __DIR__ . '/../controllers/StockController.php';
require_once __DIR__ . '/../controllers/ProductController.php';
require_once __DIR__ . '/../controllers/RateController.php';
require_once __DIR__ . '/../controllers/TableController.php';
require_once __DIR__ . '/../controllers/MerchantController.php';
require_once __DIR__ . '/../controllers/ItemsSoldController.php';

class WebRoutes extends Route
{

    public static function invoke($uri)
    {
        $loggedIn = Auth::userLogged();
        if (!ValidateRoutes::webValidate($uri))
            self::view("layouts/error.php");
        else {
            if (!$loggedIn && $uri[1] == 'login')
                LoginController::index();
            else {
                if (!$loggedIn)
                    header('Location: /login');
                else
                    self::findController($uri[1]);
            }
        }
    }

    static function findController($section)
    {
        switch ($section) {
            case 'customers':
                CustomerController::index();
                break;
            case 'employees':
                if(Auth::isAdmin()){
                    EmployeeController::index();
                    break;
                }else{
                    self::view("layouts/error.php");
                    break;
                }
            case 'users':
                if(Auth::isAdmin()){
                    UserController::index();
                    break;
                }else{
                    self::view("layouts/error.php");
                    break;
                }
            case 'rates':
                RateController::index();
                break;
            case 'transactions':
                TransactionController::index();
                break;
            case 'stocks':
                StockController::index();
                break;
            case 'products':
                ProductController::index();
                break;
            case 'merchants':
                MerchantController::index();
                break;
            case 'items_sold':
                ItemsSoldController::index();
                break;
            case 'login':
                header('Location: /');
                break;
            case '':
                HomeController::index();
                break;
            case 'profile':
                ProfileController::index();
                break;
            case 'logout':
                LoginController::logout();
                break;
        }
    }


}