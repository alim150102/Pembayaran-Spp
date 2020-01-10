<html>
<head>
  <link rel="stylesheet" href="assets/css/login.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Sign in</title>
</head>
<body>
  <div class="main">
    <p class="sign" align="center">Sign in</p>
    <form class="form" method="post">
      <input class="user " type="text" align="center" placeholder="Username" name="user">
      <input class="pass" type="password" align="center" placeholder="Password" name="pass">
      <button class="submit" align="center" type="submit" name="sign-in">Sign in</button> 
      <p class="label" align="center">SMK Muhammadiah Pekalongan</p>   
  </div>
</body>
</html>
<?php  
  if (isset($_POST['sign-in'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if ($user == '' || $pass == '') {
      echo "<script>alert('Your form is not complete!');</script>";
    }else{
      include 'koneksi.php';
      $login = mysqli_query($konek,"SELECT * FROM admin WHERE username = '$user' and password = '$pass' ");
      $cek = mysqli_num_rows($login);
      $data = mysqli_fetch_array($login);
      if ($cek > 0) {
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['id'] = $data['idadmin'];
        $_SESSION['username'] = $data['username'];
        header('location:dashboard.php');
      }else {
        echo "<script>alert('Username or Password isn't exist!!!);</script>";
      }
    }
  }
?>
