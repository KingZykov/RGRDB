<html>
<head>
    <title> Главная страница </title>
<style>
	a.register_a {
		text-align: left;
	}
	</style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600&family=Poppins:wght@100;200;400;600;800&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="style.css">

</head>
<body>





</form>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<?php

// Ищем возможные ошибки

?>
	<title>Вход в систему</title>
	<meta charset="UTF-8">
</head>
<?php
// Подключение к базе данных
$link = mysqli_connect("localhost", "root", "root", "users");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$mysqli = new mysqli("localhost", "root", "root", "users"); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку


// Получение данных из формы
$login = $_POST['user_login'];
$password = $_POST['user_password'];
$role = $_POST['select_option'];

// AND role = '$role'
// Проверка наличия пользователя в базе данных
$query = "SELECT * FROM user WHERE user_login='$login' AND user_password='$password' AND role = '$role'";
$result = mysqli_query($mysqli, $query);
$count = mysqli_num_rows($result);

// Если пользователь найден, перенаправляем на другую страницу
if($count == 1){
    if($role == admin) {
        header("Location: admin/index.php");
        exit();
    }
	else  {
        header("Location: user/index.php");
        exit();
    }

}
// Если пользователь не найден, выводим сообщение об ошибке
else{
	echo "Неверный логин или пароль";
}
?>
<body>
  <h1>Вход в систему</h1>
  <br><br>
  <form method="post" action="index.php">
    <p><label>Логин:</label> <input type="text" name="user_login"></p>
    <p><label>Пароль:</label> <input type="password" name="user_password"></p>
    <select name= "select_option" class=btn-f>
        <option >admin </option>
        <option >user</option>
    </select>
    <p><input type="submit" value="Войти" class=btn-f></p>
  </form>
  <br><br><br>
  <a class ='register_a' >Нет аккаунта? - Регистрация</a>
  <br>

  <form method="post" action="register.html">
  <p><input type="submit" value="Зарегистрироваться" class=btn-f></p>
  </form>
	</form>
</body>
</html>
