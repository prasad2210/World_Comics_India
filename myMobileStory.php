<?php

  if (isset($_GET['id']) && $_GET['id'] !='') {
      include_once './_connect_dbs.php';

      $id = $_GET['id'];
      $query = 'SELECT * FROM `mobile_story` WHERE `id` = :id';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute(['id'=>$id]);

      if ($query_stmt->rowCount() == 1) {
          $result = $query_stmt->fetchAll();
        
          $path = '../drag_drop/'.$result[0]['path'];
          $html = '
          <div class="container">
            <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4" >
                <div class="card" style="border:none !important; position:absolute; top:50%; transform:translate(0, -50%);">
                  <div class="card-body">
                    <h3 class="card-title" >'.$result[0]['name'].'</h3>
                    <p class="card-text">'.$result[0]['description'].'</p>
                  </div>
              </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
              <div class="card" style="border:none !important;">
                <img class="card-img-top" src="'.$path.'" alt="Card image cap">
                <div class="card-body">
                </div>
              </div>
            </div>
            <div class="col-md-1"></div>
          </div>
        </div>

        ';
      }
      $mores = '
      <div class="text-center mores">
        <h3>MORE READS</h3>
      </div>
    ';

      $query = 'SELECT * FROM  `mobile_story` ORDER BY RAND() LIMIT 10';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $extra = '<div class="col-md-1"></div>';
      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $cnt = 1;

          foreach ($result as $story) {
              $path = '../drag_drop/'.$story['path'];
              $id = $story['id'];


              if ($cnt <= 5) {
                  $extra .= '
            <div class="col-md-2 d-flex">
              <div class="card" style="border:none !important; width:90%; margin:0 auto;">
                <img class="card-img-top" style="height:80%; " src="'.$path.'" alt="Card image cap">
                <div class="card-body">
                  <a href="./myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%">READ MORE</a>
                </div>
              </div>
            </div>
            ';
                  $cnt++;
              } else {
                echo 'prasad';
                  $extra .= '
              <div class="col-md-1"></div>
              </div>
              <div class="row d-flex text-center py-4">
              <div class="col-md-1"></div>
            ';

                  $extra .= '
            <div class="col-md-2 ">
              <div class="card" style="border:none !important; width:90%; margin:0 auto;">
                <img class="card-img-top" style="height:80%;  margin:0 -5%;" src="'.$path.'" alt="Card image cap">
                <div class="card-body">
                  <a href="https://cybersalamat.com/myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%">READ MORE</a>
                </div>
              </div>
            </div>
            ';
                  $cnt = 2;
              }
          }
      }
  } else {
      include_once './_connect_dbs.php';

      $query = 'SELECT * FROM `mobile_story` ORDER BY RAND() LIMIT 10';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();
        
          $mores = '';
          $extra = '';
          $html = '<div class="col-md-1"></div>';
          $cnt = 1;
        
          foreach ($result as $story) {
              $path = '../drag_drop/'.$story['path'];
              $id = $story['id'];

              if ($cnt <= 5) {
                  $html .= '
            <div class="col-md-2 d-flex">
              <div class="card" style="border:none !important; width:90%; margin:0 auto;">
                <img class="card-img-top" style="height:80%;  margin:0 -5%;" src="'.$path.'" alt="Card image cap">
                <div class="card-body">
                  <a href="./myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%">READ MORE</a>
                </div>
              </div>
            </div>
            ';
                  $cnt++;
              } else {
                  $html .= '
              <div class="col-md-1"></div>
              </div>
              <div class="row d-flex text-center py-4">
                <div class="col-md-1"></div>
            ';

                  $html .= '
            <div class="col-md-2 ">
              <div class="card" style="border:none !important; width:90%; margin:0 auto;">
                <img class="card-img-top" style="height:80%;  " src="'.$path.'" alt="Card image cap">
                <div class="card-body">
                  <a href="https://cybersalamat.com/myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%">READ MORE</a>
                </div>
              </div>
            </div>
            ';
                  $cnt = 2;
              }
          }
      }
      

      $htmlMap = '
      
        <div class="mapDiv text-center border" style="width: 30%; margin: 0 auto;">
        <h3 class="card-title p-2">Sangli</h3>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card" style="padding: 0 12%;">
                <img class="card-img-top" src="./images/comic1.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">By prasad Mandave</h5>
                </div>
              </div>
            </div>
            <div class="carousel-item">
            <div class="card " style="padding: 0 12%;">
                <img class="card-img-top" src="./images/comic2.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">By prasad Mandave</h5>
                </div>
              </div>
            </div>
            <div class="carousel-item">
            <div class="card " style="padding: 0 12%;">
                <img class="card-img-top" src="./images/comic3.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">By prasad Mandave</h5>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev "  href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next " href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        </div> 
      ';
  }
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

  <link rel="stylesheet" href="./css/myMobileStory.css" />

  <title>My Mobile Story</title>
  <link rel="shortcut icon" href="./images/logo.ico" />
</head>

<body onresize="">
  <!-- header -->
  <header>

    <div class="loader">
      <img src="./images/logo.png" alt="loading...">
    </div>
    <div class="container-fluid p-0 m-0">

      <nav class="
          navbar navbar-expand-lg navbar-dark 
          scrolling-navbar
        ">
        <!-- <div class="container"> -->


        <a class="navbar-brand nav-title-div" href="./index.html">
          <img src="./images/logo.png" class="nav-img" width="80" height="80" alt="">
          Cyber Salamat
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item">
              <a class="nav-link section-name" href="./index.html">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link section-name" href="./aboutUs.html">About us</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link section-name" href="./myMobileStory.html">My Mobile Story</a>
            </li>
            <li class="nav-item">
              <a class="nav-link section-name" href="./comics.php">Comics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link section-name" href="./knowledgeHub.html">Knowledge hub</a>
            </li>
          </ul>
        </div>
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
                My Mobile Story
              </h2>
              <p>
                Everyone has a first time internet experience to share. My mobile story is a collection of grassroots
                comics and audio visual stories that tell the personal experiences of people in cyberspace, in their own
                voice.
                The stories displayed here are a result of workshops held across the country with anganwadi and asha
                workers, NGOs activists, marginalised sections, adolescents, women groups and other community members.
                Bringing out first hand digital experiences of people, these stories are a true representation of the
                voices of the masses.

              </p>
              <div class="hr-black" style="width: 90%; margin: 0 auto;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row text-center d-flex py-4">

        <?php echo $html; ?>

      </div>
    </div>

    <?php echo $mores; ?>


    <div class="container-fluid">
      <div class="row text-center py-4">

        <?php echo $extra; ?>

      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="hr-black" style="width: 80%; margin: 0 auto;"></div>  
      </div>
    </div>
<!-- 
<div class="mapDiv text-center border" style="width: 30%; margin: 0 auto;">
    <h3 class="card-title p-2">Sangli</h3>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="card" style="padding: 0 12%;">
            <img class="card-img-top" src="./images/comic1.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">By prasad Mandave</h5>
            </div>
          </div>
        </div>
        <div class="carousel-item">
        <div class="card " style="padding: 0 12%;">
            <img class="card-img-top" src="./images/comic2.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">By prasad Mandave</h5>
            </div>
          </div>
        </div>
        <div class="carousel-item">
        <div class="card " style="padding: 0 12%;">
            <img class="card-img-top" src="./images/comic3.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">By prasad Mandave</h5>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev "  href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next " href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</div> -->



<div id="try">

</div>


    <div class="container">
      <div id="map"></div>
    </div>


  </main>
  <!-- main content -->

  <!-- footer bar -->
  <footer class="text-white pb-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 text-center footer-div">
          <div class="footer-logo">
            <img src="./images/logo_footer.png" alt="footer1" width="45%">
            <img src="./images/logo1_footer.jpg" alt="footer2" width="39%">

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
              <a href="./index.html">Home</a>
            </li>
            <li>
              <a href="./aboutUs.html">About us</a>

            </li>
            <li>
              <a href="./myMobileStory.html">My Mobile Story</a>

            </li>
            <li>
              <a href="./comics.php">Comics</a>

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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
   integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
   </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <script src="./js/myMobileStory.js" type="text/javascript"></script>
  
  <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap">
  </script>
</body>

</html>