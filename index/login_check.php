<?php
  if (isset($_POST['login-check'])) {
    require 'config.php';

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if (empty($email)||empty($pass)) {
      header("Location: login.php?null_error");
      exit();
    }
    else {
      $sql = "select * from user_info where email=?";
      $stmt = mysqli_stmt_init($con);
      if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: login.php?sql_error");
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
          $check = password_verify($pass, $row['password']);
          if ($check==false) {
            header("Location: login.php?invalid_password");
            exit();
          }
          elseif($check=true){
            session_start();
            $_SESSION['email'] = $row['email'];
            header("Location: homepage.php?success_login");
            exit();
          }
          else {
            header("Location: login.php?invalid_password");
            exit();
          }
        }
        else {
          header("Location: login.php?invalid");
          exit();
        }

    }




  }
}
else {
  header("Location: login.php");
  exit();
}
 ?>
