<html>
    <head>
        <title> Добавление нового счета </title>
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

$new_invoice_summ = $_GET['product_retail_price']*$_GET['number_of_sold_units'];
$sql_add = "INSERT INTO invoice SET invoice_number='" . $_GET['id1'] ."', product_code_ID='".$_GET['product_code_ID']. "', product_retail_price='".$_GET['product_retail_price']."', number_of_sold_units='" .$_GET['number_of_sold_units']."', sell_date='".$_GET['sell_date']. "', cash='".$_GET['cash']."', bank_card='".$_GET['bank_card']."', invoice_summ='".$new_invoice_summ."'";


if ($link == false) {
    echo("Сбой подключения");
}
else {
    print($sql_add);
    $result = mysqli_query($link, $sql_add, MYSQLI_USE_RESULT);
    if ($result == false) {
        print "

        ";

    } else {
        print "

            <p>Счет зарегестрированна</p>
        ";
    }
    print "<a href=\"index.php\" style> Вернуться к списку счетов </a>";
    print "<a href=\"..\\index.php\"> Вернуться на главную страницу </a>";
}

print "</main></div>";
?>




</body>
</html>
