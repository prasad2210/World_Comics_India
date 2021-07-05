<?php

  if(isset($_GET['id']) && $_GET['id'] !=''){
    include_once './_connect_dbs.php';

      $id = $_GET['id'];
      $query = 'SELECT * FROM `mobile_story` WHERE `id` = :id';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute(['id'=>$id]);

      if($query_stmt->rowCount() == 1){
        $result = $query_stmt->fetchAll();
        
        $path = '../drag_drop/'.$result[0]['path'];
        $html = '

        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="card" style="border:none !important;">
            <img class="card-img-top" src="'.$path.'" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">'.$result[0]['name'].'</h5>
              <p class="card-text">'.$result[0]['description'].'</p>
            </div>
          </div>
        </div>
        ';
      }
      $mores = '
      <div class="text-center mores">
        <h3>MORE READS</h3>
      </div>
    ';

      $query = 'SELECT * FROM  `mobile_story` ORDER BY RAND() LIMIT 9';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $extra = '';
      if($query_stmt->rowCount() > 0){
        $result = $query_stmt->fetchAll();

        foreach($result as $story){
          
          $path = '../drag_drop/'.$story['path'];
          $id = $story['id'];

          $cnt = 1;

          if($cnt <= 3){
            $extra .= '
            <div class="col-md-4 d-flex">
              <div class="card" style="border:none !important;">
                <img class="card-img-top" style="width:80%; margin:0 auto;" src="'.$path.'" alt="Card image cap">
                <div class="card-body">
                  <a href="./myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%">READ MORE</a>
                </div>
              </div>
            </div>
            ';
            $cnt++;
          }
          else{
            $extra .= '
              </div>
              <div class="row  text-center py-4">
            ';

            $extra .= '
            <div class="col-md-4 ">
              <div class="card" style="border:none !important; ">
                <img class="card-img-top" style="width:80%; margin:0 auto;" src="'.$path.'" alt="Card image cap">
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

  }
  else{
      include_once './_connect_dbs.php';

      $query = 'SELECT * FROM `mobile_story` ORDER BY RAND() LIMIT 9';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if($query_stmt->rowCount() > 0){
        $result = $query_stmt->fetchAll();
        
        $mores = '';
        $extra = '';
        $html = '';
        $cnt = 1;
        foreach($result as $story){

          $path = '../drag_drop/'.$story['path'];
          $id = $story['id'];

          if($cnt <= 3){
            $html .= '
            <div class="col-md-4 d-flex">
              <div class="card" style="border:none !important;">
                <img class="card-img-top" style="width:80%; margin:0 auto;" src="'.$path.'" alt="Card image cap">
                <div class="card-body">
                  <a href="./myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%">READ MORE</a>
                </div>
              </div>
            </div>
            ';
            $cnt++;
          }
          else{
            $html .= '
              </div>
              <div class="row  text-center py-4">
            ';

            $html .= '
            <div class="col-md-4 ">
              <div class="card" style="border:none !important; ">
                <img class="card-img-top" style="width:80%; margin:0 auto;" src="'.$path.'" alt="Card image cap">
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
              <div class="hr-black">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row text-center py-4">

      <?php echo $html; ?>

      </div>
    </div>

    <?php echo $mores; ?>

    
    <div class="container">
      <div class="row text-center py-4">

      <?php echo $extra; ?>

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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="./js/myMobileStory.js" type="text/javascript"></script>
</body>

</html>