<html>
    <head>
        <title> Добавление новых продуктов </title>
    </head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600&family=Poppins:wght@100;200;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style12.css">
    <body>

<?php
print '

    <div class="wrapper">
        <main class="main">
';

$link = mysqli_connect("localhost", "root", "root", "users");

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$mysqli = new mysqli("localhost", "root", "root", "users"); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку

$sql_add = "INSERT INTO product SET product_code_ID='" . $_GET['product_code_ID'] ."', product_name='".$_GET['product_name']. "', product_trademark='".$_GET['product_trademark']."', product_manufacturer='" .$_GET['product_manufacturer']."', product_retail_price='".$_GET['product_retail_price']."'";


if ($link == false) {
    echo("Ошибка подключения");
}
else {
    print($sql_add);
    $result = mysqli_query($link, $sql_add, MYSQLI_USE_RESULT);
    if ($result == false) {
        print "

        ";

    } else {
        print "

            <p>Продукт зарегистрирован</p>
        ";
    }
    print "<a href=\"index.php\" style> Вернутся на страницу с продуктами </a>";
    print "<a href=\"..\\index.php\"> Вернутся на главную страницу </a>";
}

print "</main></div>";
?>




</body>
</html>
