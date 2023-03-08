<?php 
require 'koneksi.php';
if(isset($_POST['submit'])){
    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);
    $md5 = md5($password);
    $cek_user = mysqli_query($koneksi, "SELECT * FROM tuser WHERE username='$username' AND password='$password'");
    $data_user = mysqli_fetch_array($cek_user);
    $role =$data_user['role'];
    if ($role=="admin") {
        $_SESSION["fullname"] =$data_user ['fullname'];
        $_SESSION["id"] =$data_user ['id'];
        $_SESSION["username"] =$data_user ['username'];
        echo "<script type='text/javascript'>alert('Selamat Anda Berhasil Login');
             document.location='../home.php'</script>";
    } else if ($role=="User") {
         echo "<script type='text/javascript'>alert('Selamat Anda Berhasil Login');
      document.location='../user/home.php'</script>";
    }
    else{
               echo "<script type='text/javascript'>alert('Gagal Login !!!');
               document.location='../index.php'</script>";
        }
}


if(isset($_POST['cpass'])){
  $id = $_POST['id'];
  $pass = $_POST['password'];
  $rpass = $_POST['rpassword'];
  // $md5 = md5($pass);
  if($pass==$rpass){
    $insert = mysqli_query($koneksi, "UPDATE tuser SET password='$pass' WHERE id='$id'");
        if($insert){
          echo "<script type='text/javascript'>alert('Your password successfully changed, please relogin');
             document.location='../index.php'</script>";  
        }
  }else{
    echo "<script type='text/javascript'>alert('Gagal! mohon ulang kembali');
             document.location='../gantipassword.php'</script>";
  }
}
?>