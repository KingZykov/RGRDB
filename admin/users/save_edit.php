<html>
<head>
    <title> Редактирование данных пользователей </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600&family=Poppins:wght@100;200;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

print '

    <div class="wrapper">
        <main class="main">
';


mysqli_connect("localhost", "root", "root", "users") or die ("Невозможно подключить сервер");
$zapros="UPDATE user SET id_user='" . $_GET['id4'] ."', user_name='".$_GET['name']. "', user_login='".$_GET['login']."', user_password='" .$_GET['password']."', user_e_mail='".$_GET['e_mail']. "', user_info='".$_GET['info']."' WHERE id_user='".$_GET['id3']."'";

$link = mysqli_connect("localhost", "root", "root", "users");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$mysqli = new mysqli("localhost", "root", "root", "users"); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку
$result = $mysqli->query($zapros);

$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


if ($link == false) {
    echo("Соединение не удалось");
}
else {
    print("<br>" . $zapros);
    $result = mysqli_query($link, $zapros, MYSQLI_USE_RESULT);
    if ($result == false) {
        print "<p>Ошибка сохранения </p>";
    } else {
        print "<p>Информация о пользователе обновлена</p>";
    }
    print "<p><a href=\"index.php\"> Вернуться к списку пользователей </a>";
    print "<a href=\"..\\index.php\"> вернуться на главную </a>";
}

print "</main></div>";
?>
</body>
</html>
