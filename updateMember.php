<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $first_name = $first_name = $register_date = "";

    $servername = "localhost";
    $username = "samuel";
    $password = "12345678";
    $dbname = "library_db";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM member WHERE member_id = ".$_GET['member_id'];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $register_date = $row['register_date'];
            
        }
    } else {
        echo "0 results";
    }

    $conn->close();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      body {
        height: 800px;
        background-color: #553939;
      }
      h2{
        font-family : archivo narrow;
        font-size : 40px;
        color: white;
      }
      p{
        font-family : archivo narrow;
        font-size : 28px;
        color: white;
      }
      .form-label, .mb-3{
        color: #BF9742;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body>
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Menyunting Akun</h2>
      <p class="lead">Silakan isi data Akun yang akan diperbaharui di database.</p>
    </div>

    <div class="row g-5">
      <div class="col-md-12 col-lg-12">
        <h4 class="mb-3">Data Akun</h4>
        <form class="needs-validation" novalidate method="post" action="editmember.php">
          <div class="row g-3">
            <div class="col-12">
              <input type="text" name="member_id" value="<?php echo $_GET['member_id']; ?>" hidden>
              <label for="first_name" class="form-label">Nama Depan</label>
              <input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo $first_name ?>" required>
              <div class="invalid-feedback">
                Masukkan nama Depan Akun 
              </div>
            </div>

            <div class="col-12">
              <label for="last_name" class="form-label">Nama Belakang</label>
              <div class="input-group has-validation">
                <input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo $last_name ?>" required>
              <div class="invalid-feedback">
                Masukkan nama Belakang Akun
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <div class="input-group has-validation">
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $email ?>" required>
              <div class="invalid-feedback">
                Masukkan Email Akun
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="register_date" class="form-label">Tanggal Akun </label>
              <input type="date" name="register_date" value="<?php echo $register_date ?>" class="form-control" id="register_date" required>
              <div class="invalid-feedback">
                Masukkan tanggal akun di buat
              </div>
            </div>

          <button class="w-100 btn btn-primary btn-lg" type="submit">Update Akun</button>
        </form>
      </div>
    </div>
  </main>


</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
