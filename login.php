<?php

header('Content-Type: text/html; charset=UTF-8');


session_start();

if (!empty($_SESSION['login'])) {
  header('Location: ./');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
?>

<form action="" method="post">
<p><label>
 Введите логин: <br>
  <input name="login" />
  </label></p>
  <p> <label>
  Введите пароль: <br>
  <input name="pass" /></label>
  </p>
  <p> <label><input type="submit" value="Войти" /></label></p>
  
</form>

<?php
}
else {
    
    $servername = "localhost";
    $username = "u17446";
    $password = "9743779";
    $dbname = "u17446";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $tmp = $_POST['login'];
    $tmp1 = $_POST['pass']; 
    $sql = "SELECT * FROM task5 WHERE login ='" . $tmp . "'";
    $result1 = mysqli_query($conn, $sql);
    $sql = "SELECT * FROM task5 WHERE pass ='" . $tmp1 . "'";
    $result2 = mysqli_query($conn, $sql);
    if($result1){
    
    $_SESSION['login'] = $_POST['login'];
  header('Location: ./');
    }
else {
    echo "Неверный логин или пароль.";
}
}