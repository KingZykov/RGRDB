<html>
<head>
    <title> Главная страница </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600&family=Poppins:wght@100;200;400;600;800&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="style.css">

</head>
<body>


<?php

// Ищем возможные ошибки
$link = mysqli_connect("localhost", "root", "root", "users");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$mysqli = new mysqli("localhost", "root", "root", "users"); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку

?>
    <div class="wrapper" >
        <main class="main-f">
            <h2>Выберите Таблицу</h2>
            <a href="admin/index.php" class='btn-f'> Админ </a>
            <a href="user/index.php" class='btn-f'> Пользолватель </a>
        </main>
    </div>
</body>
</html>
