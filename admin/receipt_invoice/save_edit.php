<html>
<head>
    <title> Редактирование счета-фактур </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600&family=Poppins:wght@100;200;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style12.css">
</head>
<body>
<?php

print '

    <div class="wrapper">
        <main class="main">
';

mysqli_connect("localhost", "root", "root", "users") or die ("Impossible to link the server");
$zapros="UPDATE receipt_invoice SET receipt_invoice_number='" . $_GET['id4'] ."', product_code_ID='".$_GET['product_code_ID']. "', number_of_delivered_units='".$_GET['number_of_delivered_units']."', purchase_price='" .$_GET['purchase_price']."', delivery_date='".$_GET['delivery_date']."' WHERE receipt_invoice_number='".$_GET['receipt_invoice_number']."'";

$link = mysqli_connect("localhost", "root", "root", "users");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$mysqli = new mysqli("localhost", "root", "root", "users"); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку
$result = $mysqli->query($zapros);

$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


if ($link == false) {
    echo("Ошибка соединения");
}
else {
    print("<br>" . $zapros);
    $result = mysqli_query($link, $zapros, MYSQLI_USE_RESULT);
    if ($result == false) {
        print "<p>Ошибка сохранения </p>";
    } else {
        print "<p>Информация о счете-фактуре обновлена</p>";
    }
    print "<p><a href=\"index.php\"> Вернуться к списку счет-фактур </a>";
    print "<a href=\"..\\index.php\"> Вернуться на главную страницу </a>";
}

print "</main></div>";
?>
</body>
</html>
