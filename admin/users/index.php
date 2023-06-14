<html>
<head>
    <title> Info about users </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600&family=Poppins:wght@100;200;400;600;800&display=swap" rel="stylesheet">
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
<main class="main">
<h2>Регистрация пользователей:</h2>
<table border="1">
    <!--  // вывод «шапки» таблицы -->
    <thead>
        <tr class='sticky'>
            <th> ID </th>
            <th> Имя </th>
            <th> Логин </th>
            <th> Пароль </th>
            <th> E-mail </th>
            <th> Инфо </th>
            <th> Роль</th>
            <th> Редактировать </th>
            <th> Удалить </th>
        </tr>
    </thead>
    <?php
        $result = $mysqli->query('SELECT * FROM user'); // запрос на выборку сведений о пользователях
        while ($row = mysqli_fetch_array($result)) {// для каждой строки из запроса
            echo "<tr>";
            echo "<td>";
            print($row['id_user']);
            echo "</td>";
            echo "<td>";
            print($row['user_name']);
            echo "</td>";
            echo "<td>";
            print($row['user_login']);
            echo "</td>";
            echo "<td>";
            print($row['user_password']);
            echo "</td>";
            echo "<td>";
            print($row['user_e_mail']);
            echo "</td>";
            echo "<td>";
            print($row['user_info']);
            echo "</td>";
            echo "<td>";
            print($row['role']);
            echo "</td>";
            echo "<td><a href='edit.php?id=" . $row['id_user'] . "' class='edit'>Edit</a></td>"; // запуск скрипта для редактирования
            echo "<td><a href='delete.php?id=" . $row['id_user'] . "' class='delete'>Delete</a></td>"; // запуск скрипта для удаления записи
            echo "</tr>";
        }
        echo "</table>";
        $num_rows = mysqli_num_rows($result); // число записей в таблице БД
        print("<P>Total number of users: $num_rows </p>");
    ?>
        <a href="new.html" class='btn'> Добавить </a>
        <a href="../index.php" class='btn'> Вернуться на главную </a>
        </main>
    </div>
</body>
</html>
