<html>
<head>
    <title> Редактировать данные </title>
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

$rows=$mysqli->query("SELECT * FROM product WHERE product_code_ID=".$id1);
while ($st = mysqli_fetch_array($rows)) {
    $product_code_ID = $_GET['product_code_ID'];
    $product_name = $st['product_name'];
    $product_trademark = $st['product_trademark'];
    $product_manufacturer = $st['product_manufacturer'];
    $product_retail_price = $st['product_retail_price'];
}

print "<h2>Редактировать продукты:</h2>";

print "<form action='save_edit.php' metod='get'><div class='inputs'>";
print '<div class="inpt__cont"><label>OLD product_code_ID:</label> <input name="product_code_ID" readonly size="50" type="text" value="'.$id7[1].'"></div>';
print '<div class="inpt__cont"><label>NEW product_code_ID:</label> <input name="id4" size="50" type="text" value="'.$id7[1].'"></div>';
print "<div class='inpt__cont'><label>product_name:</label> <input name='product_name' size='50' type='text' value='".$product_name."'></div>";
print "<div class='inpt__cont'><label>product_trademark:</label> <input name='product_trademark' size='20' type='text' value='".$product_trademark."'></div>";
print "<div class='inpt__cont'><label>product_manufacturer:</label> <input name='product_manufacturer' size='20' type='text' value='".$product_manufacturer."'></div>";
print "<div class='inpt__cont'><label>product_retail_price:</label> <input name='product_retail_price' size='30' type='text' value='".$product_retail_price."'></div>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Save'>";
print "</div></form>";
print "<a href=\"index.php\"> Вернуться к списку продуктов </a>";
print "<a href=\"..\\index.php\"> Вернуться на главную страницу </a>";

print"</main></div>";



?>

</body>
</html>
