<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" type="text/css" href="hasil.css">

</head>
<body>
<div class="kotak">

        <?php

        $titleErr = $authorErr = $published_dateErr = "";
        $title = $author = $published_date = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["title"])) {
            $titleErr = "Judul buku harus diisi!";
        } else {
            $title = test_input($_POST["title"]);
        }

        if (empty($_POST["author"])) {
            $authorErr = "Nama penulis harus diisi!";
        } else {
            $author = test_input($_POST["author"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$author)) {
            $authorErr = "Nama penulis tidak boleh mengandung angka dan simbol!";
            }
        }
        
        if (empty($_POST["published_date"])) {
            $published_dateErr = "Tanggal terbit harus diisi!";
        } else {
            $published_date = test_input($_POST["published_date"]);
            $parsed_date = date_parse($published_date);

            if (!checkdate($parsed_date['month'], $parsed_date['day'], $parsed_date['year'])) {
            $published_dateErr = "Format tanggal terbit tidak valid!";
            }
        }


            if ($titleErr || $authorErr || $published_dateErr) {
                echo "<h2>Submisi buku gagal:</h2>";
                echo $titleErr;
                echo "<br>";
                echo $authorErr;
                echo "<br>";
                echo $published_dateErr;
                echo "<br>";
            } else {
            $servername = "localhost";
            $username = "samuel";
            $password = "12345678";
            $dbname = "library_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO book (title, author, published_date)
            VALUES ('".$title."', '".$author."', '".$published_date."')";

                if ($conn->query($sql) === TRUE) {
                    
                echo "<font color='lime'> New record created successfully   </font>";
                } else {
                echo "<font color='red'>Error: </font>" . $sql . "<br>" . $conn->error;
                }
            $conn->close();

            echo "<h2>Data Buku berhasil diinput</h2>";
            echo "<p> Judul Buku : $title  </p>";
            echo "<p> Nama Penulis : $author </p>";
            echo "<p>Tanggal Terbit : $published_date </p>";
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
  <a href="readBooks.php">Lihat Data Buku</a>
</div>


</body>
</html>