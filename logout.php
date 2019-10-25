<?php 
session_start();
session_destroy(); // уничтожаем текущую сессию

header('Location: login.php');




 ?>