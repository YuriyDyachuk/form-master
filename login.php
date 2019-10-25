<?php
session_start();
$slug = require_once 'users.php';

if (!empty($_SESSION['user'])) {
	header('Location: index.php'); // отображаем авторизованому поль-лю только админку...
}

$errors = []; // обьявляем переменную
if (!empty($_POST['login']) && !empty($_POST['password'])) {
	foreach ($users as $user) {
		if ($user['login'] == $_POST['login'] && $_POST['password'] == $user['password']) {
			$_SESSION['user'] = $user; // сохраняем элемент массива $user
			$_SESSION['lang'] = $user['lang'];
			header('Location: index.php');
			die;
		}
	}
	$errors[] = '<b>Неверный логин или пароль!</b>';
};

 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Вход</title>
</head>
<body>
<?php 
	foreach ($errors as $error) {
		echo $error; 
	};
?>

	<div>
		<form action="" method="POST">
			<input type="text" name="login" placeholder="Login" required><br />
			<input type="password" name="password" placeholder="Password" required><br />
			<button type="submit">Вход</button>
		</form>
	</div>
</body>
</html>