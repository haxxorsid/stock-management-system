<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/dist/favicon-32x32.png">
    <title><?php echo $page; ?></title>
    <link type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link type="text/css" href="/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <link type="text/css" href="/dist/css/work.css" rel="stylesheet">

    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <?php
    if ($page == 'table')

        echo "<link href='/vendor/datatables-plugins/dataTables.bootstrap.css'>
    <link href='/vendor/datatables-responsive/dataTables.responsive.css'>
    <link href='/vendor/datatables-plugins/select.bootstrap.min.css'>
    <link href='/vendor/datatables-editor/css/editor.bootstrap.min.css'>";

    ?>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div id="wrapper">

    <?php
    if ($page != 'login') {
        echo "<nav class='navbar navbar-default navbar-static-top' role='navigation' style='margin-bottom: 0'>";
        include __DIR__ . '/../components/header.php';

        include __DIR__ . '/../components/top-links.php';

        include __DIR__ . '/../components/menu.php';

        echo "</nav>";
        if($page == 'home')
            include __DIR__ . '/../home.php';
        elseif ($page == 'profile')
            include __DIR__ . '/../profile.php';
        elseif ($page == 'table')
            include __DIR__ . '/../table.php';
    }else{
        include __DIR__ . '/../auth/login.php';
    }


    ?>
</div>

<script src="/vendor/jquery/jquery.min.js"></script>

<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="/vendor/metisMenu/metisMenu.min.js"></script>

<?php
if ($page == 'table'){
    ?>
    <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="/vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="/vendor/datatables-plugins/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables-plugins/dataTables.select.min.js"></script>

    <script type="text/javascript" language="javascript" src="/vendor/datatables-editor/js/dataTables.editor.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="/vendor/datatables-editor/js/editor.bootstrap.min.js"></script>
<?php
}
?>

<script src="/dist/js/work.js"></script>

<script src="/dist/js/page.js"></script>

<script src="/vendor/notify/notify.min.js"></script>

</body>

</html>
