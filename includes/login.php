<?php
  session_start();

  require_once 'mb_config.php';

  $user_login = trim($_POST['login']);
  $user_password = trim($_POST['password']);

  try {  
    $stmt = $mb_db->prepare("SELECT * FROM usuarios WHERE login = :login");
    $stmt->execute(array(":login"=>$user_login));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();

    if ($count == 1) {
      //Insertamos un registro de intento de login
      $stmt = $mb_db->prepare("INSERT INTO login_intentos (id_user) VALUES (:id_user)");
      $stmt->bindParam(':id_user', $row['id']);
      $stmt->execute();

      //Comprobamos si el password es correcto
      if ($row['password']==md5($user_password)) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_login'] = $row['login'];
        $_SESSION['user_name'] = $row['username'];

        echo 'true';
      } else {
        echo 'false';
      }
    }
    
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
?>