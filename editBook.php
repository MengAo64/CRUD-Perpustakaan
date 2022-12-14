<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buku</title>
    <link rel="stylesheet" type="text/css" href="hasil.css">
</head>
<body>
    <div class="kotak">
    <?php
    $book_idErr = $titleErr = $authorErr = $published_dateErr = "";
    $book_id = $title = $author = $published_date = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["book_id"])) {
        $book_idErr = "ID buku gagal diterima!";
    } else {
        $book_id = test_input($_POST["book_id"]);
    }

    if (empty($_POST["title"])) {
        $titleErr = "Judul buku harus diisi!";
    } else {
        $title = test_input($_POST["title"]);
    }

    if (empty($_POST["author"])) {
        $authorErr = "Nama penulis harus diisi!";
    } else {
        $author = test_input($_POST["author"]);
        // check if author only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$author)) {
        $authorErr = "Nama penulis tidak boleh mengandung angka dan simbol!";
        }
    }
    
    if (empty($_POST["published_date"])) {
        $published_dateErr = "Tanggal terbit harus diisi!";
    } else {
        $published_date = test_input($_POST["published_date"]);
        $parsed_date = date_parse($published_date);
        // check if e-mail address is well-formed
        if (!checkdate($parsed_date['month'], $parsed_date['day'], $parsed_date['year'])) {
        $published_dateErr = "Format tanggal terbit tidak valid!";
        }
    }


        if ($book_idErr || $titleErr || $authorErr || $published_dateErr) {
            echo "<h2>Submisi buku gagal:</h2>";
            echo $book_idErr;
            echo "<br>";
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
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE book SET 
        title = '".$title."'
        ,author = '".$author."'
        ,published_date = '".$published_date."'
        WHERE book_id=".$book_id;

        if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        } else {
        echo "Error updating record: " . $conn->error;
        }

        $conn->close();

        echo "<h2>Data Buku berhasil diubah:</h2>";
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