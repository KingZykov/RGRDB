<html>
<head>
    <title> Editing user data </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600&family=Poppins:wght@100;200;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
$rows=$mysqli->query("SELECT * FROM user WHERE id_user=".$id1);
while ($st = mysqli_fetch_array($rows)) {
    $id3 = $_GET['id_user'];
    $name = $st['user_name'];
    $login = $st['user_login'];
    $password = $st['user_password'];
    $e_mail = $st['user_e_mail'];
    $info = $st['user_info'];
}


// print $url;
$id7 = explode("=", $url);
print"

<div class='wrapper'><main class='main'>";

print "<h2>Редактирование информации о пользователе:</h2>";

print "<form action='save_edit.php' metod='get'><div class='inputs'>";
print '<div class="inpt__cont"><label>ID old:</label> <input name="id3" readonly size="50" type="number" value="'.$id7[1].'"></div>';
print '<div class="inpt__cont"><label>ID new:</label> <input name="id4" size="50" type="number" value="'.$id7[1].'" pattern="^[ 0-9]+$"></div>';
print "<div class='inpt__cont'><label>Name:</label> <input name='name' size='50' type='text' value='".$name."' class='name'></div>";
print "<div class='inpt__cont'><label>Login:</label> <input name='login' size='20' type='text' value='".$login."' class='name'></div>";
    print "<div class='inpt__cont'><label>Password:</label> <input name='password' size='20' type='text' value='".$password."' pattern='[A-Za-z]{3,}' title='Min 3 letters'></div>";
print "<div class='inpt__cont'><label>Е-mail:</label> <input name='e_mail' size='30' type='text' value='".$e_mail."'></div>";
print "<div class='inpt__cont'><label>Info:</label><textarea name='info' rows='4' cols='40'>".$info."</textarea></div>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Save'>";
print "</div></form>";
print "<a href=\"index.php\"> Back to list of users </a>";
print "<a href=\"..\\index.php\"> Back to main page </a>";
print"</main></div>
<script>
        const names = document.querySelectorAll('.name');
        for(let i = 0; i < names.length; i++){
            names[i].addEventListener('input', function(){
                if(names[i].value[names[i].value.length-1].charCodeAt(0) < 65 || names[i].value[names[i].value.length-1].charCodeAt(0) > 133 ){
                    let temp = names[i].value.split('');
                    temp.pop();
                    names[i].value = temp.join('');
                }
            })
        }
</script>


";
?>

</body>
</html>
