<html>
    <head>
        <title> Добавление нового пользователя </title>
    </head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600&family=Poppins:wght@100;200;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <body>

<?php
print '

    <div class="wrapper">
        <main class="main">
';

$link = mysqli_connect("localhost", "root", "root", "users");

// Строк ниже не было
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$mysqli = new mysqli("localhost", "root", "root", "users"); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку

// Строка запроса на добавление записи в таблицу:
$sql_add = "INSERT INTO user SET id_user='" . $_GET['id1'] ."', user_name='" . $_GET['name'] ."', user_login='".$_GET['login']."', user_password='" .$_GET['password']."', user_e_mail='".$_GET['e_mail']. "', user_info='".$_GET['info']. "'";
if ($link == false) {
    echo("Connection failed");
}
else {
    print($sql_add);
    $result = mysqli_query($link, $sql_add, MYSQLI_USE_RESULT);
    if ($result == false) {
        print "

        ";

    } else {
        print "
            <p>Пользователь зарегистрирован!</p>
        ";
    }
    print "<a href=\"index.php\" style> Вернуться к списку пользователей </a>";
    print "<a href=\"..\\index.php\"> Вернуться на главную страницу </a>";
}

print "</main></div>";
?>




</body>
</html>
