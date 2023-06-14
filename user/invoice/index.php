<html>
<head>
    <title> Список счетов </title>

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
<div class="wrapper">
<main class="main">
<h2>List of invoices:</h2>
<table border="1">
    <!--  // вывод «шапки» таблицы -->
    <thead>
        <tr class='sticky'>
            <th> invoice_number </th>
            <th> product_code_ID </th>
            <th> product_retail_price </th>
            <th> number_of_sold_units </th>
            <th> sell_date </th>
            <th> cash </th>
            <th> bank_card </th>
            <th> invoice_summ </th>

        </tr>
    </thead>
    <?php
        $result = $mysqli->query('SELECT * FROM invoice'); // запрос на выборку сведений о пользователях
        while ($row = mysqli_fetch_array($result)) {// для каждой строки из запроса
            echo "<tr>";
            echo "<td>";
            print($row['invoice_number']);
            echo "</td>";
            echo "<td>";
            print($row['product_code_ID']);
            echo "</td>";
            echo "<td>";
            print($row['product_retail_price']);
            echo "</td>";
            echo "<td>";
            print($row['number_of_sold_units']);
            echo "</td>";
            echo "<td>";
            print($row['sell_date']);
            echo "</td>";
            echo "<td>";
            print($row['cash']);
            echo "</td>";
            echo "<td>";
            print($row['bank_card']);
            echo "</td>";
            echo "<td>";
            print($row['invoice_summ']);
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        $num_rows = mysqli_num_rows($result); // число записей в таблице БД
        print("<P>Общее количество счетов: $num_rows </p>");
    ?>
        <a href="new.html" class='btn'> Добавление счета </a>
        <a href="../vhod.php"> Вернуться на главную страницу </a>
        </main>
    </div>
</body>
</html>
