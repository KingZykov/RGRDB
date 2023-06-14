<html>
<head>
    <title> Редактирование данных счета </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600&family=Poppins:wght@100;200;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style12.css">
</head>
<body>

<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$mysqli = new mysqli("localhost", "root", "root", "users"); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку

// .$_GET['id_user']
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$id0 = explode("=", $url);
$id1 = $id0[1];
// $id2 = $_GET['id2'];

// print $url;
$id7 = explode("=", $url);
print"

<div class='wrapper'><main class='main'>";

$rows=$mysqli->query("SELECT * FROM invoice WHERE invoice_number=".$id1);
while ($st = mysqli_fetch_array($rows)) {
    $invoice_number = $_GET['invoice_number'];
    $product_code_ID = $st['product_code_ID'];
    $product_retail_price = $st['product_retail_price'];
    $number_of_sold_units = $st['number_of_sold_units'];
    $sell_date = $st['sell_date'];
    $cash = $st['cash'];
    $bank_card = $st['bank_card'];
    $invoice_summ = $st['invoice_summ'];
}


print "<h2>Редактирование счета:</h2>";

print "<form action='save_edit.php' metod='get'><div class='inputs'>";
print '<div class="inpt__cont"><label>OLD invoice_number:</label> <input name="invoice_number" readonly size="50" type="text" value="'.$id7[1].'"></div>';
print '<div class="inpt__cont"><label>NEW invoice_number:</label> <input name="id4" size="50" type="text" value="'.$id7[1].'"></div>';
print "<div class='inpt__cont'><label>product_code_ID:</label> <input name='product_code_ID' size='50' type='text' value='".$product_code_ID."'></div>";
print "<div class='inpt__cont'><label>product_retail_price:</label> <input name='product_retail_price' size='20' type='text' value='".$product_retail_price."'></div>";
print "<div class='inpt__cont'><label>number_of_sold_units:</label> <input name='number_of_sold_units' size='20' type='text' value='".$number_of_sold_units."'></div>";
print "<div class='inpt__cont'><label>sell_date:</label> <input name='sell_date' size='30' type='date' value='".$sell_date."'></div>";
print "<div class='inpt__cont'><label>cash:</label><input name='cash' size='30' type='text' value='".$cash."'></div>";
print "<div class='inpt__cont'><label>bank_card:</label> <input name='bank_card' size='20' type='text' value='".$bank_card."'></div>";
// print "<div class='inpt__cont'><label>invoice_summ:</label> <input name='invoice_summ' readonly size='30' type='text' value='".$invoice_summ."'></div>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</div></form>";
print "<a href=\"index.php\"> Вернуться к списку счетов </a>";
print "<a href=\"..\\index.php\"> Вернуться на главную страницу </a>";
print"</main></div>";










?>

</body>
</html>
