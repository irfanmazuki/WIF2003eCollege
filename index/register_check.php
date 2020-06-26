<?php

  if (isset($_POST['register-check'])) {

    require 'config.php';

    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $matric = $_POST['matric'];
    $ic = $_POST['ic'];
    $phone = $_POST['phone'];
    $nationality = $_POST['nationality'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $poscode = $_POST['poscode'];
    $r_college = $_POST['r_college'];
    $room = $_POST['room'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $re_pass = $_POST['re-pass'];

    if (empty($fullname)||empty($gender)||empty($matric)||empty($ic)||empty($phone)||empty($nationality)||empty($country)||
    empty($address)||empty($city)||empty($state)||empty($poscode)||empty($r_college)||empty($room)||empty($email)||empty($pass)||empty($re_pass)) {
      header("Location: register.php?err=null&fullname=".$fullname."&gender=".$gender."&matric=".$matric."&ic=".$ic."&phone=".$phone
    ."&nationality=".$nationality."&country=".$country."&address=".$address."&city=".$city."&state=".$state."&poscode=".$poscode.'&r_college='.$r_college
  ."&room=".$room);
      exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: register.php?err=invemail&fullname=".$fullname."&gender=".$gender."&matric=".$matric."&ic=".$ic."&phone=".$phone."&nationality=".$nationality."&country=".$country."&address=".$address."&city=".$city."&state=".$state."&poscode=".$poscode.'&r_college='.$r_college
  ."&room=".$room);
      exit();
    }
    elseif ($pass !== $re_pass) {
      header("Location: register.php?err=pass&fullname=".$fullname."&gender=".$gender."&matric=".$matric."&ic=".$ic."&phone=".$phone
    ."&nationality=".$nationality."&country=".$country."&address=".$address."&city=".$city."&state=".$state."&poscode=".$poscode.'&r_college='.$r_college
  ."&room=".$room);
      exit();
    }
    else {
      $sql = "select email from user_info where email=?";
      $stmt = mysqli_stmt_init($con);
      if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: register.php?sql_error");
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $row = mysqli_stmt_num_rows($stmt);
        if ($row > 0) {
          header("Location: register.php?err=taken&fullname=".$fullname."&gender=".$gender."&matric=".$matric."&ic=".$ic."&phone=".$phone."&nationality=".$nationality."&country=".$country."&address=".$address."&city=".$city."&state=".$state."&poscode=".$poscode.'&r_college='.$r_college
      ."&room=".$room);
          exit();
        }
        else{
          $sql = "insert into user_info (fullname,gender,matric,ic,phone,nationality,country,address,city,state,poscode,r_college,room,email,password)
          values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
          $stmt = mysqli_stmt_init($con);
          if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: register.php?sql_error");
            exit();
          }
          else{
            $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sssssssssssssss",$fullname, $gender, $matric, $ic, $phone, $nationality, $country, $address, $city, $state, $poscode, $r_college, $room, $email, $hash_pass);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: login.php?register_success");
            exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($con);
}
else {
  header("Location: register.php");
  exit();
}
 ?>
