<html>
    <head>
        <title> Добавление новых счет-фактур </title>
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

$sql_add = "INSERT INTO receipt_invoice SET receipt_invoice_number='" . $_GET['id1'] ."', product_code_ID='".$_GET['product_code_ID']. "', number_of_delivered_units='".$_GET['number_of_delivered_units']."', purchase_price='" .$_GET['purchase_price']."', delivery_date='".$_GET['delivery_date']."'";

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

            <p>Счет-фактура зарегистрирован</p>
        ";
    }
    print "<a href=\"index.php\" style> Вернуться к списку счетов-фактур </a>";
    print "<a href=\"..\\index.php\"> Вернуться на главную страницу </a>";
}

print "</main></div>";
?>




</body>
</html>
