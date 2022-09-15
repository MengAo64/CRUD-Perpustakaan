<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam buku</title>
    <link rel="stylesheet" type="text/css" href="hasil.css">
</head>
<body>
    <div class="kotak">
<?php
$book_idErr = $member_idErr = "";
$book_id = $member_id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["book_id"])) {
    $book_idErr = "Buku harus diisi!";
  } else {
    $book_id = test_input($_POST["book_id"]);
  }

  if (empty($_POST["member_id"])) {
    $member_idErr = "Member harus diisi!";
  } else {
    $member_id = test_input($_POST["member_id"]);
  }
  
    if ($book_idErr || $member_idErr ) {
        echo "<h2>Submisi buku gagal:</h2>";
        echo "<p>Judul Buku : $book_idErr</p>";
        echo "<br>";
        echo $member_idErr;
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

    $sql = "INSERT INTO borrow (book_id, member_id, status)
    VALUES ('".$book_id."', '".$member_id."', 'borrowed')";

    if ($conn->query($sql) === TRUE) {
      echo "<font color='lime'> New record created successfully   </font>";
    } else {
    echo "<font color='red'>Error: </font>" . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    echo "<h2>Data pinjaman berhasil Update</h2>";
    echo "<p> ID Buku : $book_id </p>";
    echo "<p> ID Akun : $member_id</p>";
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
      <a href="readBorrow.php">Lihat Data Pinjaman</a>
    </div>

</body>
</html>