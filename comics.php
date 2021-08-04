<?php


if (isset($_GET['id']) && $_GET['id'] !='') {
    include_once './_connect_dbs.php';

    $comic = '';
    $heading = '';

    $last_id = $_GET['id'];
  

    $query = 'SELECT * FROM `image_path` WHERE `comic_id` = :last_id ORDER BY `position`';
    $query_stmt = $db_app->prepare($query);
    $query_stmt->execute(['last_id' => $last_id]);
    
    if ($query_stmt->rowCount() > 0) {
        $result = $query_stmt->fetchAll();

        foreach ($result as $images) {
            //   echo 1;
            $comic .= '
      <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center">
          <div class="card" style="border:none !important; width:80%; margin:0 auto;">
            <img class="card-img-top img-fluid" src="https://admin.cybersalamat.com/'.$images['path'].'" alt="Card image cap">
            <div class="card-body">
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
      ';
        }
        $query = 'SELECT * FROM `comics` WHERE `lang` = "0" ORDER BY RAND() LIMIT 2';
        $query_stmt = $db_app->prepare($query);
        $query_stmt->execute();
    
        if ($query_stmt->rowCount() == 2) {
            $result = $query_stmt->fetchAll();
        }
    
        $social_share = '
  
      <div class="container-fluid" style="padding-top:1%; padding-bottom:3%"> 
  
        <div class="row text-center ">
          <div class="col-md-4 pt-3">
            <a href="./comics.php?id='.$result[0]['id'].'"><button type="button" class="btn btn-primary">Previous</button></a>
          </div>
          <div class="col-md-4" >
            <div class="row border" style="padding: 4% 10%; margin:0 15%;">
              <div class="col-md-3 social_share">
                <a href="#" target="_blank" rel="noopener noreferrer" class="facebook-btn">
                  <i class="fa fa-facebook"></i>
                </a>
              </div>
  
              <div class="col-md-3 social_share">
                <a href="#" target="_blank" rel="noopener noreferrer" class="twitter-btn">
                  <i class="fa fa-twitter"></i>
                </a>
              </div>
  
              <div class="col-md-3 social_share">
                <a href="#" target="_blank" rel="noopener noreferrer" class="linkedin-btn">
                  <i class="fa fa-linkedin"></i>
                </a>
              </div>
  
              <div class="col-md-3 social_share">
                <a href="#" target="_blank" rel="noopener noreferrer" class="whatsapp-btn">
                  <i class="fa fa-whatsapp"></i>
                </a>
              </div>
            </div>
          </div>
  
          <div class="col-md-4 pt-3">
            <a href="./comics.php?id='.$result[1]['id'].'"><button type="button" class="btn btn-primary">Next</button></a>
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
    
    
    $query = 'SELECT * FROM `comics` WHERE `lang` = "0" ORDER BY RAND() LIMIT 15';
    $query_stmt = $db_app->prepare($query);
    $query_stmt->execute();
    // echo 2;
  
    $extra = '';

    if ($query_stmt->rowCount() > 0) {
        // echo 3;
        $result = $query_stmt->fetchAll();

        $extra = '   
          <div class="row comicRow text-center">
      ';

        $cnt = 1;
        $cnt1 = 1;
        // echo 4;
        foreach ($result as $comics) {
            $last_id = $comics['id'];
            //   echo $last_id;
            $query = 'SELECT * FROM `image_path` WHERE `comic_id` = :last_id ORDER BY `position` LIMIT  1';
            $query_stmt = $db_app->prepare($query);
            $query_stmt->execute(['last_id' => $last_id]);
            //   echo 77;
            if ($query_stmt->rowCount() == 1) {
                $result = $query_stmt->fetchAll();
                // echo $result[0]['path'];
                if ($cnt <= 3) {
                    $extra .= '
              <div class="col-md-4">
                <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                  <img class="card-img-top img-fluid" src="https://admin.cybersalamat.com/'.$result[0]['path'].'" alt="Card image cap">
                  <div class="card-body">
                    <a href="https://cybersalamat.com/comics.php?id='.$last_id.'" class="btn btn-primary" style="margin-top:-12%; font-size:80%;">READ</a>
                  </div>
                </div>
              </div>
              ';
                    $cnt1++;
                    $cnt++;
                // echo $cnt;
                } else {
                    $extra .='
                </div>
              <div class="row comicRow text-center">
            ';
                    $extra .= '
              <div class="col-md-4">
                <div class="card" style="border:none !important; width:80%; margin:0 auto;">
                  <img class="card-img-top img-fluid" src="https://admin.cybersalamat.com/'.$result[0]['path'].'" alt="Card image cap">
                  <div class="card-body">
                    <a href="https://cybersalamat.com/comics.php?id='.$last_id.'" class="btn btn-primary" style="margin-top:-12%;font-size:80%;">READ</a>
                  </div>
                </div>
              </div>
              ';
                    $cnt1++;
                    $cnt = 2;
                    //   echo $cnt;
                }
                if ($cnt1 == 10) {
                    break;
                }
            }
        }
    }
} else {
  
    include_once './_connect_dbs.php';
    $social_share= '';
    $mores = '';
    $extra = '';

    if (isset($_GET['t']) && $_GET['t']!= '') {
        $type = $_GET['t'];

        $arr = ["Digital Basics", "Digital Essentials", "Digital Opportunities", "Digital Risks", "Digital Safety", "Digital Content", "Cyber Laws and Rights"];

        $heading = '
       <div class="container-fluid">
        <div class="row p-4 text-center">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2>
                  Comics
                </h2>
                <p>
                Using comics as a visual learning aid, we deliver important information about the digital
                space, internet basics, cyber safety
                <br> 
                and more, in an easy to consume manner.
                Our comics are based on real life, relatable stories that introduce
                <br>
                and explain one concept
                at a time. So you can scroll, laugh and learn about the internet, one story at a time.
                </p>
                <div class="hr-black">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="dropdown float-right">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  '.$arr[$type].'
                </button>
                <div class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="./comics.php">All</a>
                  <a class="dropdown-item" href="./comics.php?t=0">Digital Basics</a>
                  <a class="dropdown-item" href="./comics.php?t=1">Digital Essentials</a>
                  <a class="dropdown-item" href="./comics.php?t=2">Digital Opportunities</a>
                  <a class="dropdown-item" href="./comics.php?t=3">Digital Risks</a>
                  <a class="dropdown-item" href="./comics.php?t=4">Digital Safety</a>
                  <a class="dropdown-item" href="./comics.php?t=5">Digital Content</a>
                  <a class="dropdown-item" href="./comics.php?t=6">Cyber Laws and Rights</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    ';
    
    $type = $type + 1;


        $query = 'SELECT * FROM `comics` WHERE `category` = :type1 AND `lang` = "0" ORDER BY RAND() LIMIT 15';
        $query_stmt = $db_app->prepare($query);
        $query_stmt->execute(['type1' => $type]);

        if ($query_stmt->rowCount() > 0) {
            $result = $query_stmt->fetchAll();

            $comic = '   
          <div class="row comicRow text-center">
      ';

            $cnt = 1;
            $cnt1 = 1;
            // echo 4;
            foreach ($result as $comics) {
                $last_id = $comics['id'];
                //   echo $last_id;
                $query = 'SELECT * FROM `image_path` WHERE `comic_id` = :last_id ORDER BY `position` LIMIT  1';
                $query_stmt = $db_app->prepare($query);
                $query_stmt->execute(['last_id' => $last_id]);
                //   echo 77;
                if ($query_stmt->rowCount() == 1) {
                    $result = $query_stmt->fetchAll();
                     echo $result[0]['path'];
                    if ($cnt <= 3) {
                        $comic .= '
                          <div class="col-md-4">
                            <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                              <img class="card-img-top img-fluid" src="https://admin.cybersalamat.com/'.$result[0]['path'].'" alt="Card image cap">
                              <div class="card-body">
                                <a href="https://cybersalamat.com/comics.php?id='.$last_id.'" class="btn btn-primary" style="margin-top:-12%; font-size:80%;">READ</a>
                              </div>
                            </div>
                          </div>
                          ';
                    $cnt1++;
                        $cnt++;
                    // echo $cnt;
                    } else {
                        $comic .='
                          </div>
                        <div class="row comicRow text-center">
                          ';
                        $comic .= '
                          <div class="col-md-4">
                            <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                              <img class="card-img-top img-fluid" src="https://admin.cybersalamat.com/'.$result[0]['path'].'" alt="Card image cap">
                              <div class="card-body">
                                <a href="https://cybersalamat.com/comics.php?id='.$last_id.'" class="btn btn-primary" style="margin-top:-12%; font-size:80%;">READ</a>
                              </div>
                            </div>
                          </div>
                        ';
                    $cnt1++;
                        $cnt = 2;
                        //   echo $cnt;
                    }
                    if ($cnt1 == 10) {
                        break;
                    }
                }
            }
        }
    } 
    
    else {
        $heading = '
       <div class="container-fluid">
        <div class="row p-4 text-center">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2>
                  Comics
                </h2>
                <p>
                Using comics as a visual learning aid, we deliver important information about the digital
                space, internet basics, cyber safety and more, in an easy to consume manner.
                Our comics are relatable stories based on real life that introduce and explain one concept at a time. So you can scroll, laugh and learn about the internet, one story at a time.
                </p>
                <div class="hr-black">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="dropdown float-right">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Select Category
                </button>
                <div class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="./comics.php">All</a>
                  <a class="dropdown-item" href="./comics.php?t=0">Digital Basics</a>
                  <a class="dropdown-item" href="./comics.php?t=1">Digital Essentials</a>
                  <a class="dropdown-item" href="./comics.php?t=2">Digital Opportunities</a>
                  <a class="dropdown-item" href="./comics.php?t=3">Digital Risks</a>
                  <a class="dropdown-item" href="./comics.php?t=4">Digital Safety</a>
                  <a class="dropdown-item" href="./comics.php?t=5">Digital Content</a>
                  <a class="dropdown-item" href="./comics.php?t=6">Cyber Laws and Rights</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
    ';
        $social_share= '';
        $mores = '';
        $extra = '';
  
        // echo 1;

        $query = 'SELECT * FROM `comics` WHERE `lang` = "0" ORDER BY RAND() LIMIT 15';
        $query_stmt = $db_app->prepare($query);
        $query_stmt->execute();
        // echo 2;

        if ($query_stmt->rowCount() > 0) {
            // echo 3;
            $result = $query_stmt->fetchAll();

            $comic = '   
          <div class="row comicRow text-center">
            ';

            $cnt = 1;
            $cnt1 = 1;
            // echo 4;
            foreach ($result as $comics) {
                $last_id = $comics['id'];
                //   echo $last_id;
                $query = 'SELECT * FROM `image_path` WHERE `comic_id` = :last_id ORDER BY `position` LIMIT  1';
                $query_stmt = $db_app->prepare($query);
                $query_stmt->execute(['last_id' => $last_id]);
                //   echo 77;
                if ($query_stmt->rowCount() == 1) {
                    $result = $query_stmt->fetchAll();
                    // echo $result[0]['path'];
                    if ($cnt <= 3) {
                        $comic .= '
                        <div class="col-md-4">
                          <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                            <img class="card-img-top img-fluid" src="https://admin.cybersalamat.com/'.$result[0]['path'].'" alt="Card image cap">
                            <div class="card-body">
                              <a href="https://cybersalamat.com/comics.php?id='.$last_id.'" class="btn btn-primary" style="margin-top:-12%; font-size:80%;">READ</a>
                            </div>
                          </div>
                        </div>
              ';
              $cnt1++;
                        $cnt++;
                    // echo $cnt;
                    } else {
                        $comic .='
                </div>
              <div class="row comicRow text-center">
            ';
                        $comic .= '
              <div class="col-md-4">
                <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                  <img class="card-img-top img-fluid" src="https://admin.cybersalamat.com/'.$result[0]['path'].'" alt="Card image cap">
                  <div class="card-body">
                    <a href="https://cybersalamat.com/comics.php?id='.$last_id.'" class="btn btn-primary" style="margin-top:-12%; font-size:80%;">READ</a>
                  </div>
                </div>
              </div>
              ';
              $cnt1++;
                        $cnt = 2;
                        //   echo $cnt;
                    }
                     
                    if ($cnt1 == 10) {
                        break;
                    }
                }
            }
        }
    }
}
 


?>


<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-NJ0XDZMY01"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-NJ0XDZMY01');
  </script>


  <!--google analytics-->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

  <!-- google - fonts -->
  <link href='https://fonts.googleapis.com/css?family=Pangolin' rel='stylesheet'>

  <link rel="stylesheet" href="./css/comics.css" />

  <title>Comics</title>
  <link rel="shortcut icon" href="https://cybersalamat.com/favicon.ico" />
</head>

<body onresize="">
  <!-- header -->
  <header>

    <div class="loader">
      <img src="./images/loader.GIF" alt="loading...">
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
              <a class="nav-link section-name" href="./aboutUs.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link section-name" href="./myMobileStory.php">My Mobile Story</a>
            </li>
            <!--<li class="nav-item active">-->
            <!--  <a class="nav-link section-name" href="./comics.php">Comics</a>-->
            <!--</li>-->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle navbar-dark" href="./comics.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                English Comics
              </a>
              <div class="dropdown-menu navbar-dark" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-white navbar-dark" href="./comics.php">English Comics</a>
                <a class="dropdown-item text-white navbar-dark" href="./comicsHindi.php">Hindi Comics</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link section-name" href="./knowledgeHub.php">Knowledge Hub</a>
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

    <?php echo $heading; ?>



    <div class="container-fluid">
      <div class="container">

        <?php echo $comic?>

      </div>
    </div>

    <?php echo $social_share; ?>


    <?php echo $mores; ?>


    <div class="container-fluid">
      <div class="container">
        <?php  echo $extra; ?>

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
              <p>A join initiative of</p>
            <a href="https://www.worldcomicsindia.com/" target="_blank" rel="noopener noreferrer"><img src="./images/logo_footer.png" alt="footer1" width="45%"></a>
            <a href="https://www.omidyarnetwork.in/blog/can-grassroots-comics-make-tech-more-inclusive" target="_blank" rel="noopener noreferrer"><img src="./images/logo1_footer.jpg" alt="footer2" width="39%"></a>

          </div>
        </div>
        <div class="col-sm-3 ">
          <div class="subscribe">
            <div class=" link-heading">

              <div class="row p-0 m-0">
                <div class="col-12 p-0 m-0">
                  <h2>
                    Join the campaign!
                  </h2>
                </div>
              </div>
              <div class="row p-0 m-0">
                <div class="col-12 p-0 m-0">
                  <p>
                      Follow us on Instagram 
                  </p>
                </div>
              </div>
              <div class="row p-0 m-0">
                <div class="col-12 p-0 m-0">
                    <p style ="font-size:100%;">
                      <i class="fa fa-instagram"></i> <span style="margin-left: 2%; font-size:100%;"><a href="https://www.instagram.com/cybersalamat/" target="_blank" rel="noopener noreferrer" style="color:white;">cybersalamat</a></span>
                    </p>
                    <p style ="font-size:100%;">
                      <i class="fa fa-instagram"></i> <span style="margin-left: 2%; font-size:100%;"><a href="https://www.instagram.com/cybersalamat_hindi/" target="_blank" rel="noopener noreferrer" style="color:white;">cybersalamat_hindi</a></span>
                    </p>
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
              <a href="./aboutUs.html">About Us</a>
              
            </li>
            <li>
              <a href="./myMobileStory.php">My Mobile Story</a>
      
            </li>
            <li>
              <a href="./comics.php">Comics</a>
              
            </li>
            <li>
              <a href="./knowledgeHub.php">Knowledge Hub</a>
              
            </li>
          </ul>
        </div>
        <div class="col-sm-3 social-media ">
          <h3>
            Contact Us
          </h3>
          <p>
              <i class="fa fa-envelope-o"></i> <span style="margin-left: 2%;"><a href="mailto: wci.digitalsociety@gmail.com" target="_blank" rel="noopener noreferrer" style="color:white;">wci.digitalsociety@gmail.com</a></span>
          </p>
          
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
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <script src="./js/comics.js" type="text/javascript"></script>
</body>

</html>