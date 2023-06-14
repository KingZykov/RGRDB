<html>
<head>
    <title> Список продуктов </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600&family=Poppins:wght@100;200;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style12.css">

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
<h2>Список продуктов:</h2>
<table border="1">
    <!--  // вывод «шапки» таблицы -->
    <thead>
        <tr class='sticky'>
            <th> product_code_ID </th>
            <th> product_name </th>
            <th> product_trademark </th>
            <th> product_manufacturer </th>
            <th> product_retail_price </th>
        </tr>
    </thead>
    <?php
        $result = $mysqli->query('SELECT * FROM product'); // запрос на выборку сведений о пользователях
        while ($row = mysqli_fetch_array($result)) {// для каждой строки из запроса
            echo "<tr>";
            echo "<td>";
            print($row['product_code_ID']);
            echo "</td>";
            echo "<td>";
            print($row['product_name']);
            echo "</td>";
            echo "<td>";
            print($row['product_trademark']);
            echo "</td>";
            echo "<td>";
            print($row['product_manufacturer']);
            echo "</td>";
            echo "<td>";
            print($row['product_retail_price']);
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        $num_rows = mysqli_num_rows($result); // число записей в таблице БД
        print("<P>Число продуктов: $num_rows </p>");
    ?>
        <a href="new.html" class='btn'> Добавить продукт </a>
        <a href="../index.php"> Вернутся на главную </a>
        </main>
    </div>
</body>
</html>
