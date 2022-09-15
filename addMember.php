add <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Member</title>
    <link rel="stylesheet" type="text/css" href="hasil.css">
</head>
<body>
    <div class="kotak">
<?php

$first_nameErr = $last_nameErr = $emailErr = "";
$first_name = $last_name = $emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["first_name"])) {
    $first_nameErr = "Nama depan harus diisi!";
  } else {
    $first_name = test_input($_POST["first_name"]);

    if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
      $first_nameErr = "Nama tidak boleh mengandung angka dan simbol!";
    }
  }


  if (empty($_POST["last_name"])) {
    $last_nameErr = "Nama belakang harus diisi!";
  } else {
    $last_name = test_input($_POST["last_name"]);

    if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
      $last_nameErr = "Nama belakang tidak boleh mengandung angka dan simbol!";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email harus diisi";
  } else {
    $email = test_input($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Format email tidak valid!";
    }
  }

    if ($first_nameErr || $last_nameErr || $emailErr ) {
        echo "<h2>Submisi member gagal:</h2>";
        echo "<br>";
        echo $first_nameErr;
        echo "<br>";
        echo $last_nameErr;
        echo "<br>";
        echo $emailErr;
        echo "<br>";
    } else {
    $servername = "localhost";
    $username = "samuel";
    $password = "12345678";
    $dbname = "library_db";


    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO member (first_name, last_name, email)
    VALUES ('".$first_name."', '".$last_name."', '".$email."')";

    if ($conn->query($sql) === TRUE) {
    echo "<font color='lime'> New record created successfully   </font>";
    } else {
    echo "<font color='red'>Error: </font>" . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    echo "<h2>Data member berhasil diinput</h2>";
    echo "<p> Nama Depan :$first_name</p>";
    echo "<p> Nama Belakang : $last_name </p>";
    echo "<p> Email : $email</p>";
    echo "<br>";
    }
} else {
    echo "Silakan masukan data melalui form";
}   

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
</div>

    <div class="kotak-tombol">
      <a href="readMembers.php">Lihat Data Akun</a>
    </div>
</body>
</html>