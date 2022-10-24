<?php
session_start();
include './models/productsModel.php';
$pdo = pdo_connect_mysql();
/*basic page routing*/
//if uri (url) comes back with "page name" and a file exists it sets associative array value to the correct page which then displays in the index body.
if (strpos($_SERVER['REQUEST_URI'], "product") !== false) {
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'product';
} else {
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet" type="text/css">
    <title>Costumes!</title>
</head>

<body>
    <?php
    include "../Halloween_Cart/views/" . $page . '.php';
    ?>
</body>

</html>