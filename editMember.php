<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Akun</title>
    <link rel="stylesheet" type="text/css" href="hasil.css">
</head>
<body>
    <div class="kotak">
    <?php
    $member_idErr = $first_nameErr = $last_nameErr = $register_dateErr = "";
    $member_id = $first_name = $last_name = $email = $register_date = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["member_id"])) {
        $member_idErr = "ID Akun gagal diterima!";
    } else {
        $member_id = test_input($_POST["member_id"]);
    }

    if (empty($_POST["first_name"])) {
        $first_nameErr = "Nama depan Akun harus diisi!";
    } else {
        $first_name = test_input($_POST["first_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
            $last_nameErr = "Nama Depan akun tidak boleh mengandung angka dan simbol!";
            }
    }
   

    if (empty($_POST["last_name"])) {
        $last_nameErr = "Nama Belakang Akun harus diisi!";
    } else {
        $last_name = test_input($_POST["last_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
        $last_nameErr = "Nama Belakang akun tidak boleh mengandung angka dan simbol!";
        }
    }
    
    if (empty($_POST["email"])) {
            $emailErr = "email harus diisi!";
        } else {
            $email = test_input($_POST["email"]);
        }

    if (empty($_POST["register_date"])) {
        $register_dateErr = "Tanggal terbit harus diisi!";
    } else {
        $register_date = test_input($_POST["register_date"]);
        $parsed_date = date_parse($register_date);
        // check if e-mail address is well-formed
        if (!checkdate($parsed_date['month'], $parsed_date['day'], $parsed_date['year'])) {
        $register_dateErr = "Format tanggal terbit tidak valid!";
        }
    }


        if ($member_idErr || $first_nameErr || $last_nameErr || $register_dateErr) {
            echo "<h2>Submisi Akun gagal:</h2>";
            echo $member_idErr;
            echo "<br>";
            echo $first_nameErr;
            echo "<br>";
            echo $last_nameErr;
            echo "<br>";
            echo $register_dateErr;
            echo "<br>";
        } else {
        $servername = "localhost";
        $username = "samuel";
        $password = "12345678";
        $dbname = "library_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE member SET 
        first_name = '".$first_name."'
        ,last_name = '".$last_name."'
        ,register_date = '".$register_date."'
        WHERE member_id=".$member_id;

        if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        } else {
        echo "Error updating record: " . $conn->error;
        }

        $conn->close();

        echo "<h2>Data Akun berhasil diubah:</h2>";
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