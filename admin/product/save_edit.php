<html>
<head>
    <title> Editing product data </title>
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

mysqli_connect("localhost", "root", "root", "users") or die ("Невозможно пожключится к серверу");
$zapros="UPDATE product SET product_code_ID='" . $_GET['id4'] ."', product_name='".$_GET['product_name']. "', product_trademark='".$_GET['product_trademark']."', product_manufacturer='" .$_GET['product_manufacturer']."', product_retail_price='".$_GET['product_retail_price']."' WHERE product_code_ID='".$_GET['product_code_ID']."'";

$link = mysqli_connect("localhost", "root", "root", "users");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$mysqli = new mysqli("localhost", "root", "root", "users"); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку
$result = $mysqli->query($zapros);

$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


if ($link == false) {
    echo("Ошибка подключения");
}
else {
    print("<br>" . $zapros);
    $result = mysqli_query($link, $zapros, MYSQLI_USE_RESULT);
    if ($result == false) {
        print "<p>Ошибка сохранения </p>";
    } else {
        print "<p>Информация о продукте обновлена</p>";
    }
    print "<p><a href=\"index.php\"> Вернутся на страницу продуктов </a>";
    print "<a href=\"..\\index.php\"> Вернутся на главную страницу </a>";
}

print "</main></div>";
?>
</body>
</html>
