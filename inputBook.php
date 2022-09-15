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

      /* buatan sendiri */
      nav {
        background-color : #472D2D;
        height : 100px;
        padding-top : 35px;
        text-align : center;
        position: sticky ;
        top: 0;
      }
      nav li{
        display : inline-block;

      }

      nav  a{
        text-decoration: none;
        padding : 15px;
        margin-bottom : -15px;
        font-size :20px;
        color: #BF9742;
        border : 2px solid #472D2D;
        border-radius : 25px;
        transition: all 0.5s ease;
      }
      nav a:hover{
        background-color: white;
        color : #2C3639;
        border : 2px solid red;
        border-radius : 25px;
      }
      .h2-judul{
        font-family : archivo narrow;
        font-size : 40px;
        color: white;
      }
      .p-desk{
        font-family : archivo narrow;
        font-size : 28px;
        color: white;
      }
      table{
        border: 3px solid black;
      }
      .tombol{
        margin-right : 15px;
      }
      th ,td{
        text-align : center
      }
      .form-label, .mb-3{
        color: #BF9742;
      }
      .form-control{
        background-color: #704F4F;
      }
    </style>

    
    
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body >
    <div class="container">
      <main>
        <div class="py-5 text-center">
          <h1 class="h2-judul">Menambahkan Buku</h1>
          <p class="lead p-desk">Silahkan isi  buku yang akan dimasukan ke database</p>
        </div>
        <div class="row g-5">
          <div class="col-md-12 col-lg-12 form">
            <h3 class="mb-3">Data Buku</h3>
            <form action="addBook.php" class="needs-validation" novalidate method="post" action="addBook.php>
              <div class="row g-3>
                <div class="col-12 field">
                  <label for="title" class="form-label">Judul</label>
                  <input type="text" name="title" id="title" placeholder="Judul" value="" required class="form-control">
                  <div class="invalid-feedback">
                    Masukan Judul Yang Valid
                  </div>
                </div><br>

                <div class="col-12">
                  <label for="author" class="form-label">Penulis</label>
                  <input type="text" name="author" id="author" placeholder="Penulis" value="" required class="form-control">
                  <div class="invalid-feedback">
                    Masukan Nama Penulis
                  </div>
                </div><br>

                <div class="col-12">
                  <label for="published_date" class="form-label">Tanggal Terbit</label>
                  <input type="date" name="published_date" id="published_date"  value="" required class="form-control">
                  <div class="invalid-feedback">
                    Masukan Tanggal Buku Di Terbitkan
                  </div>
                </div>
              </div>
                          
              <button class="w-100 btn btn-dark btn-lg" type="submit">Tambahkan Buku</button>

            </form>
          </div>
        </div>
      </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
