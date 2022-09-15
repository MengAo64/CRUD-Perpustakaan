<?php
if (isset($_GET['book_id'])) {

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

    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="hasil.css">
    
    
        <link href="form-validation.css" rel="stylesheet">
    </head>
    <body   >
        
    <div class="kotak">
      <?php
      $sql = "DELETE FROM book WHERE book_id = ".$_GET['book_id'];
      $result = $conn->query($sql);
  
      if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
      } else {
      echo "Error deleting record: " . $conn->error;
      }
      $conn->close();
      ?>
    <main>
        <div class="py-5 text-center">
        <h2>Menghapus Buku</h2>
        <p class="lead">Buku berhasil dihapus</p>
        </div>

    </main>

    
    </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>

        <script src="form-validation.js"></script>
    </body>
        <?php
        } else {
            echo "Invalid book_id!";
        }
        ?>
        <div class="kotak-tombol">
          <a href="readBooks.php">Lihat Data Buku</a>
        </div>
</html>