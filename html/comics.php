<?php
  include_once '../_connect_dbs.php';

  $query = 'SELECT * FROM `comics` WHERE `id` < 99999999999 LIMIT 1';
  $query_stmt = $db_app->prepare($query);
  $query_stmt->execute();

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

  <!-- google - fonts -->
  <link href='https://fonts.googleapis.com/css?family=Pangolin' rel='stylesheet'>

  <link rel="stylesheet" href="../css/comics.css" />

  <title>Comics</title>
  <link rel="shortcut icon" href="../images/logo.ico" />
</head>

<body onresize="calcHeight()">
  <!-- header -->
  <header>

    <div class="loader">
      <img src="../images/logo.png" alt="loading...">
    </div>
    <div class="container-fluid p-0 m-0">

      <nav class="
          navbar navbar-expand-lg navbar-dark 
          scrolling-navbar
        ">
        <!-- <div class="container"> -->


        <a class="navbar-brand nav-title-div" href="../index.html">
          <img src="../images/logo.png" class="nav-img" width="80" height="80" alt="">
          Cyber Salamat
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item">
              <a class="nav-link section-name" href="../index.html">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link section-name" href="./aboutUs.html">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link section-name" href="./myMobileStory.html">My Mobile Story</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link section-name" href="./comics.html">Comics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link section-name" href="./knowledgeHub.html">Knowledge hub</a>
            </li>
          </ul>
          <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form> -->
          <!-- <form class="form-inline">
            <div class="md-form my-0 ml-2">
              <input class="form-control" width="120%" type="text" placeholder="Search" aria-label="Search" />
            </div>
          </form> -->
        </div>
        <!-- </div> -->
      </nav>
    </div>
  </header>
  <!-- header -->

  <!-- main content -->
  <main>
    
  <div class="container-fluid">
      <div class="row p-4 text-center">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2>
                Knowledge Hub
              </h2>
              <p>
                The internet is vast and it is easy to get lost while trying to learn about the digital
                space. Therefore we have curated links that you could use to further your knowledge and stay Cyber
                Salamat.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>


  </main>
  <!-- main content -->

  <!-- footer bar -->
  <footer class="text-white pb-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 text-center footer-div">
          <div class="footer-logo">
            <img src="../images/logo_footer.png" alt="footer1" width="45%">
            <img src="../images/logo1_footer.jpg" alt="footer2" width="39%">

          </div>
        </div>
        <div class="col-sm-3 ">
          <div class="subscribe">
            <div class=" link-heading">

              <div class="row">
                <div class="col-12">
                  <h2>
                    Join the campaign!
                  </h2>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <p>
                    Subscribe to Cyber Salamat Comics
                  </p>
                </div>
              </div>              
              <div class="row">
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Subscribe</button>
                </div>
              </div>
            </div>

            <!-- <div class="row link-lists justify-content-center">
              <ul>
                <li>
                  About Us
                </li>
                <li>
                  Comics
                </li>
                <li>
                  Campaigns
                </li>
                <li>
                  Blogs
                </li>
              </ul>
            </div> -->
          </div>
        </div>
        <div class="col-sm-3 links">
          <ul>
            <li>
              <a href="../index.html">Home</a>
            </li>
            <li>
              <a href="./aboutUs.html">About us</a>
              
            </li>
            <li>
              <a href="./myMobileStory.html">My Mobile Story</a>
      
            </li>
            <li>
              <a href="./comics.html">Comics</a>
              
            </li>
            <li>
              <a href="./knowledgeHub.html">Knowledge Hub</a>
              
            </li>
          </ul>
        </div>
        <div class="col-sm-3 social-media ">
          <h3>
            Connect Us
          </h3>
          <p><i class="fa fa-twitter"></i> <span style="margin-left: 6%;">Follow us</span></p>
          <p><i class="fa fa-facebook"></i> <span style="margin-left: 11%;">Like us</span></p>
          <p><i class="fa fa-instagram"></i> <span style="margin-left: 8%;">Follow us</span></p>

          <!-- <div class="row">
            <div class="col-sm-2">
              <i class="fa fa-twitter"></i>
            </div>
            <div class="col-sm-10">
              <p>Follow us </p>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-2">
              <i class="fa fa-facebook"></i>
            </div>
            <div class="col-sm-10">
              <p>Like us</p>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-2">
              <i class="fa fa-instagram"></i>
            </div>
            <div class="col-sm-10">
              <p>Follow us </p>
            </div>
          </div> -->
<!--           
          <div class="row">
            <div class="col-md-2">
              <i class="fa fa-twitter"></i>
            </div>
            <div class="col-md-10">
              <p>Visit us </p>
            </div>
          </div> -->

        </div>
      </div>
    </div>

  </footer>
  <!-- footer bar -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="../js/comics.js" type="text/javascript"></script>
</body>

</html>