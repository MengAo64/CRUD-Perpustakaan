<?php
if (isset($_GET['borrow_id'])) {

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
    <title>Hapus Pinjaman</title>
    <link rel="stylesheet" type="text/css" href="hasil.css">

    
        <link href="form-validation.css" rel="stylesheet">
    </head>
    <body>
      
        
    <div class="kotak">
    <?php 
       $sql = "DELETE FROM borrow WHERE borrow_id = ".$_GET['borrow_id'];
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
        <h2>Menghapus Pinjaman</h2>
        <p class="lead">Pinjaman berhasil dihapus</p>
        </div>

    </main>

    
    </div>




        <script src="form-validation.js"></script>
    </body>
        <?php
        } else {
            echo "Invalid borrow_id!";
        }
        ?>
        <div class="kotak-tombol">
          <a href="readBorrow.php">Lihat Data Pinjaman</a>
        </div>
</html>