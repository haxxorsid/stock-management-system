<?php
/**
 * Jewellery Financial Accounting
 *
 * Author: Siddhesh Patil
 * Date: 29-Sep-17
 * Time: 6:52 PM
 */

require_once __DIR__ . '/../routes/ApiRoutes.php';
require_once __DIR__ . '/../routes/WebRoutes.php';

class Decision
{
    private static $section, $uri, $method, $data;
    public function __construct()
    {
        $requestURI = explode('/', $_SERVER['REQUEST_URI']);
        self::$method = $_SERVER['REQUEST_METHOD'];
        self::$data = $_REQUEST;
        self::$uri = array_values($requestURI);
        self::$section =self::$uri[1];
    }


    public function start(){
        if(self::$section == 'api'){
            ApiRoutes::invoke(self::$uri, self::$data, self::$method);
        }else if(self::$method == 'GET'){
            WebRoutes::invoke(self::$uri);
        }

    }
}

return new Decision();