<html>
<head>
    <title> Редактирование данных счета-фактуры </title>
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

$rows=$mysqli->query("SELECT * FROM receipt_invoice WHERE receipt_invoice_number=".$id1);
while ($st = mysqli_fetch_array($rows)) {
    $receipt_invoice_number = $_GET['receipt_invoice_number'];
    $product_code_ID = $st['product_code_ID'];
    $number_of_delivered_units = $st['number_of_delivered_units'];
    $purchase_price = $st['purchase_price'];
    $delivery_date = $st['delivery_date'];
}

print "<h2>Редактирование данных счета-фактуры:</h2>";

print "<form action='save_edit.php' metod='get'><div class='inputs'>";
print '<div class="inpt__cont"><label>OLD receipt_invoice_number:</label> <input name="receipt_invoice_number" readonly size="50" type="text" value="'.$id7[1].'"></div>';
print '<div class="inpt__cont"><label>NEW receipt_invoice_number:</label> <input name="id4" size="50" type="text" value="'.$id7[1].'"></div>';
print "<div class='inpt__cont'><label>product_code_ID:</label> <input name='product_code_ID' size='50' type='text' value='".$product_code_ID."'></div>";
print "<div class='inpt__cont'><label>number_of_delivered_units:</label> <input name='number_of_delivered_units' size='20' type='text' value='".$number_of_delivered_units."'></div>";
print "<div class='inpt__cont'><label>purchase_price:</label> <input name='purchase_price' size='20' type='text' value='".$purchase_price."'></div>";
print "<div class='inpt__cont'><label>delivery_date:</label> <input name='delivery_date' size='30' type='date' value='".$delivery_date."'></div>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</div></form>";
print "<a href=\"index.php\"> Вернутьсяк списку счет-фактур </a>";
print "<a href=\"..\\index.php\"> Вернуться на главную страницу </a>";

print"</main></div>";



?>

</body>
</html>
