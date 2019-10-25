<?php 
	session_start();
	//ini_set('error_reporting', E_ALL);

if (empty($_SESSION['user'])) {
		header('Location: login.php');
	}
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Страница пользователя</title>
</head>
<body>
<?php 

	$user_lang = [
		'ru' => 'Добро пожаловать',
		'en' => 'Welcome',
		'ua' => 'Ласкаво просимо',
		'it' => 'Benvenuto a',
	];

	if(isset($_POST['lang'])){
		$_SESSION['lang'] = $_POST['lang'];
	}

?>
	
<ul>
	<li><?php echo $user_lang[$_SESSION['lang']] .' '. $_SESSION['user']['login']; ?></li>
	<li><a href="logout.php">Выход</a></li>
</ul>

<?php if (empty($_SESSION['lang']) == $user_lang) {
	echo '<form action="" method="POST">
			<ul>
				<li>Выберите нужный перевод</li>
				<input type="checkbox" name="lang" value="ru">Русский<br />
				<input type="checkbox" name="lang" value="en">Английский<br />
				<input type="checkbox" name="lang" value="ua">Український<br />
				<input type="checkbox" name="lang" value="it">Итальянский<br />
				<button type="submit">Добавить приветствие</button>
			</ul>
		</form>'; 
		}
		
		//если поле 'lang' не имеет значения выводим форму с языками для пользователя (в данном массиве он один 'sasha' и даем выбрать один из существующих !!!!)
		// форма после выбора языка прерывается !!! 
?>  




</body>
</html>