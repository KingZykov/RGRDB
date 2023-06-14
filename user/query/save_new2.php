<html>
    <head> 
        <title> Query result </title> 
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


$sql_add = "SELECT * FROM `invoice` WHERE invoice_summ " . $_GET['table12'] . $_GET['id13']; 


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
        // $result = mysqli_query($link, $zapros, MYSQLI_USE_RESULT);  
        while ($row = mysqli_fetch_array($result)) {
            $posts[] = $row;
        }
        echo "<table border='1'>";
        echo "
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
        ";
        foreach ($posts as $row) 
        { 
            $i = 0;
            echo "<tr>";
            foreach ($row as $element)
            {
                
                $i++;
                if ($i % 2){
                    echo "<td>";
                    echo $element;
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    print "<a href=\"new.html\"  class='btn'> Сделать другой запрос </a>";
    print "<a href=\"..\\index.php\"> Вернуться к главной страницы</a>";
}

print "</main></div>";
?>




</body>
</html>



