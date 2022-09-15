<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      body {
        background-image: url(./img/bgpp.jpg) ;
        height : 800px ;
      

      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: nonib
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

      .h1-judul {
        color: #D36B00;
        font-family: cursive ;
        margin-top : -60px;
        font-size: 80px; 
      }

      .p-desk {
        margin-top: 20px;
        font-size: 50px;
        color: #704F4F;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="readBooks.php">Data Buku</a></li>
          <li><a href="readMembers.php">Data Member</a></li>
          <li><a href="readBorrow.php">Data Pinjaman</a></li>
        </ul>
      </nav>  

<div class="container">
  <main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light h1-judul" >Portal Perpustakaan</h1>
                <p class=" p-desk">Website ini bisa mempermudah proses audit pinjam meminjam buku</p>
            </div>
        </div>
    </section>
  </main>


</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
