<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Index | imen</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg bg-dark nvbar-dark shadow">

        <div class ="container">

          <a href="http://imen.blog" class="bavbar-brand"> Bienvenu </a>
          <form action="" class="form-inline" method="GET">
            <input class="form-control mr-sm-2 bg-dark" type="search" placeholder="Recherche">
          </form>


          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="http://imen.blog">Index<span class="sr-only"></span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="http://imen.blog/contact"/>Contact</a>
              </li>

            </ul>
          </div>

        </div>
      </nav>
    </header>

    <div class="container">
      <a href="images/cv-Imen Mlika.pdf" download="CV_Imen_Mlika.pdf">Télécharger CV</a>

    </div>

   


    <hr class="my-5">
      <footer class="container mt-5">
        <div class="row">
          </div class="col">
            <h4> Blog Personnel</h4>
            <p> Je m'appelle Imen, je suis Apprentie administratrice Systèmes chez Nexylan</p>
          </div>

          <div class="col">
            <h4>Insights</h4>
            <a href="#">à venir</a>
            <a href="#"></a>
            <a href="#">[..]</a>
          </div>

          <div class="col">
            <h4>Resssources</h4>
            <a class="nav-link" href="<?= $router->generate('categories'); ?>">categories</a>>
          </div>

          <div class="col">
            <h4>Links</h4>
            <a class="nav-link" href="<?= $router->generate('contact'); ?>">contact</a>
          </div>
          
        </div>

        <div class="row">
          <div class="col">
              <p>©<?php echo date('Y') ?> imen.blog, All rights reserved</p>
          </div>



        </div>









      </footer>



    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>