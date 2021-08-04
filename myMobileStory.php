<?php

  if (isset($_GET['id']) && $_GET['id'] !='') {
      include_once './_connect_dbs.php';

      $id = $_GET['id'];

      // echo $id;
      $query = 'SELECT * FROM `mobile_story` WHERE `id` = :id';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute(['id'=>$id]);

      if ($query_stmt->rowCount() == 1) {
          $result = $query_stmt->fetchAll();

          // echo $result;
        
          $query = 'SELECT * FROM `mobile_story` ORDER BY RAND() LIMIT 2';
          $query_stmt = $db_app->prepare($query);
          $query_stmt->execute();
          
          if ($query_stmt->rowCount() == 2) {
              $result1 = $query_stmt->fetchAll();
          
              $heading = '';
              $htmlH = '';
              $pagination = '';
              $paginationH = '';
            
              $path = 'https://admin.cybersalamat.com/'.$result[0]['path'];
              $path1 = '';
              if(trim($result[0]['path_profile']) != ''){
                $path1 = '<img class="card-img-top" style="width:40%; margin:0 auto;" src="https://admin.cybersalamat.com/'.$result[0]['path_profile'].'" alt="Card image cap">
                ';    
              }
              
              $html .= '
              
                  
                <div class="col-md-2 py-2 align-self-center">
                    <a href="./myMobileStory.php?id='.$result1[0]['id'].'"><button type="button"
                            class="btn btn-primary">Previous</button></a>
                </div>
                <div class="col-md-4 align-self-center">
                    <div class="card text-center"
                        style="border:none !important;">

                        '.$path1.'

                        <div class="card-body">
                            <h3 class="card-title">'.$result[0]['name'].'</h3>
                            <p class="card-text">'.$result[0]['description'].'</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="border:none !important;">
                        <img class="card-img-top" src="'.$path.'"
                            alt="Card image cap">
                    </div>
                </div>
                <div class="col-md-2 py-2 align-self-center">

                    <a href="./myMobileStory.php?id='.$result1[1]['id'].'"><button type="button"
                        class="btn btn-primary">Next</button></a>
                </div>
                ';
          }
      }
      
      $mores = '
      <div class="text-center mores">
        <h3>MORE READS</h3>
      </div>
    ';

      $query = 'SELECT * FROM  `mobile_story` ORDER BY RAND() LIMIT 20';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $extra = '<div class="col-md-1"></div>';
      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();
          $cnt = 1;
        
          foreach ($result as $story) {
              $path = 'https://admin.cybersalamat.com/'.$story['path'];
              $id = $story['id'];

          

              if ($cnt <= 5) {
                  $extra .= '
            <div class="col-md-2 d-flex">
              <div class="card" style="border:none !important; width:90%; margin:0 auto;">
                <img class="card-img-top" style="height:80%; " src="'.$path.'" alt="Card image cap">
                <div class="card-body">
                  <a href="./myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%; font-size:80%">READ</a>
                </div>
              </div>
            </div>
            ';
                  $cnt++;
              } else {
                  $extra .= '
                <div class="col-md-1"></div>
              </div>
              <div class="row  text-center py-4">
                <div class="col-md-1"></div>
            ';

                  $extra .= '
            <div class="col-md-2 ">
              <div class="card" style="border:none !important; width:90%; margin:0 auto;">
                <img class="card-img-top" style="height:80%; " src="'.$path.'" alt="Card image cap">
                <div class="card-body">
                  <a href="https://cybersalamat.com/myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%; font-size:80%">READ</a>
                </div>
              </div>
            </div>
            ';
                  $cnt = 2;
              }
          }
      }
  } 
  
  // starting page 
  else {


    $mores = '';
          $heading = '
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
            <div class="container-fluid">
              <div class="row">
                <div class="hr-black" style="width: 90%; margin: 0 auto;"></div>
              </div>
            </div>

        ';
          $extra = '';

    // if edu set and video set
  //========================================================================================================================================================


  if(isset($_GET['page']) && $_GET['page'] != '' && isset($_GET['pageH']) && $_GET['pageH'] != ''){ 

    $page = $_GET['page'];
    $pageH = $_GET['pageH'];
      $start1 = ($page - 1)*10;

      include_once './_connect_dbs.php';
      $query = 'SELECT * FROM `mobile_story` ORDER BY `id` DESC';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $html = '<div class="col-md-1"></div>';
          $cnt = 1;
          // foreach ($result as $know) {
            for($i = $start1; $i<= min(($start1 + 9), count($result) - 1); $i++){

              $path = 'https://admin.cybersalamat.com/'.$result[$i]['path'];
              $id = $result[$i]['id'];

              if ($cnt <= 5) {
                  $html .= '
                  <div class="col-md-2 d-flex">
                    <div class="card" style="border:none !important; width:90%; margin:0 auto;">
                      <img class="card-img-top" style="height:80%; " src="'.$path.'" alt="Card image cap">
                      <div class="card-body">
                        <a href="https://cybersalamat.com/myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%; font-size:80%">READ</a>
                      </div>
                    </div>
                  </div>
                  ';
                  $cnt++;
              } else {
                  $html .= '
                      <div class="col-md-1"></div>
                    </div>
                    <div class="row  text-center py-4">
                      <div class="col-md-1"></div>

                  ';

                  $html .= '
                    <div class="col-md-2 ">
                      <div class="card" style="border:none !important; width:90%; margin:0 auto;">
                        <img class="card-img-top" style="height:80%;" src="'.$path.'" alt="Card image cap">
                        <div class="card-body">
                          <a href="https://cybersalamat.com/myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%; font-size:80%">READ</a>
                        </div>
                      </div>
                    </div>
                  ';
                  $cnt = 2;
              }
          }
      }

      $query = 'SELECT count(*) as total FROM `mobile_story`';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();
      $count = $result[0]['total'];
      $count = ceil($count/10);

      if ($count <= 3) {
          if ($count == 2) {
              if ($page == 1) {
                  $pagination = '
          <li class="page-item disabled">
              <a class="page-link" href="./myMobileStory.php?page=1&pageH='.$pageH.'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          ';
                  $pagination .= '
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page=1&pageH='.$pageH.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=2&pageH='.$pageH.'">2</a></li>
          ';

                  $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?page=2&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $pagination = '
            <li class="page-item ">
                <a class="page-link" href="./myMobileStory.php?page=1&pageH='.$pageH.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=1&pageH='.$pageH.'">1</a></li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page=2&pageH='.$pageH.'">2</a></li>
          ';

                  $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?page=2&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              }
          } else {
              if ($page == 1) {
                  $pagination = '
            <li class="page-item disabled">
                <a class="page-link" href="./myMobileStory.php?page=1&pageH='.$pageH.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page=1&pageH='.$pageH.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=2&pageH='.$pageH.'">2</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=3&pageH='.$pageH.'">3</a></li>
          ';

                  $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?page=2&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } elseif ($page == 3) {
                  $pagination = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?page=2&pageH='.$pageH.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=1&pageH='.$pageH.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=2&pageH='.$pageH.'">2</a></li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page=3&pageH='.$pageH.'">3</a></li>
          ';

                  $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?page=3&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $pagination = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?page=1&pageH='.$pageH.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=1&pageH='.$pageH.'">1</a></li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page=2&pageH='.$pageH.'">2</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=3&pageH='.$pageH.'">3</a></li>
          ';

                  $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?page=3&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
            }
          }
      }
      else{
        if($page == 1){
          $pagination = '
            <li class="page-item disabled">
                <a class="page-link" href="./myMobileStory.php?page=1&pageH='.$pageH.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $pagination .= '
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page=1&pageH='.$pageH.'">1</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=2&pageH='.$pageH.'">2</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=3&pageH='.$pageH.'">3</a></li>
          ';

          $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?page=2&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else if($page == $count){
          $pagination = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?page='.($page-1).'&pageH='.$pageH.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $pagination .= '
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?page='.($page-2).'&pageH='.$pageH.'">'.($page-2).'</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?page='.($page-1).'&pageH='.$pageH.'">'.($page-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page='.($page).'&pageH='.$pageH.'">'.($page).'</a></li>
          ';

          $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?page='.($page).'&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else{
          $pagination = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?page='.($page-1).'&pageH='.$pageH.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $pagination .= '
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?page='.($page-1).'&pageH='.$pageH.'">'.($page-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page='.($page).'&pageH='.$pageH.'">'.($page).'</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?page='.($page+1).'&pageH='.$pageH.'">'.($page+1).'</a></li>
          ';

          $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?page='.($page+1).'&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
      }

      // youtube set section 

      $startH1 = ($pageH - 1)*6;

      // include_once './_connect_dbs.php';
      $query = 'SELECT * FROM `youtube_video` ORDER BY `id` DESC';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $htmlH = '';
          $cnt = 1;
          // foreach ($result as $know) {
            for($i = $startH1; $i<= min(($startH1 + 5), count($result) - 1); $i++){
              if ($cnt <= 3) {
                $htmlH .= '
                
                  <div class="col-md-4 text-center ">
                    <h4>
                        '.$result[$i]['name'].'
                    </h4>
                    <br>
                      <p class = "youtube">
                      '.$result[$i]['link'].'
                      </p>
                  </div>
                ';
                $cnt++;
            // echo $cnt;
            } else {
                $htmlH .='
                    </div>
                  <div class="row comicRow text-center">
                ';
                $htmlH .= '
                
                  <div class="col-md-4 text-center ">
                    <h4>
                        '.$result[$i]['name'].'
                    </h4>
                    <br>
                      <p class = "youtube">
                      '.$result[$i]['link'].'
                      </p>
                  </div>
                ';
                $cnt = 2;
                //   echo $cnt;
              }          }
      }

      $query = 'SELECT count(*) as total FROM `youtube_video`';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();
      $countH = $result[0]['total'];
      $countH = ceil($countH/6);

      if ($countH <= 3) {
          if ($countH == 2) {
              if ($pageH == 1) {
                  $paginationH = '
          <li class="page-item disabled">
              <a class="page-link" href="./myMobileStory.php?pageH=1&page='.$page.'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          ';
                  $paginationH .= '
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH=1&page='.$page.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=2&page='.$page.'">2</a></li>
          ';

                  $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?pageH=2&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $paginationH = '
            <li class="page-item ">
                <a class="page-link" href="./myMobileStory.php?pageH=1&page='.$page.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=1&page='.$page.'">1</a></li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH=2&page='.$page.'">2</a></li>
          ';

                  $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?pageH=2&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              }
          } else {
              if ($pageH == 1) {
                  $paginationH = '
            <li class="page-item disabled">
                <a class="page-link" href="./myMobileStory.php?pageH=1&page='.$page.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH=1&page='.$page.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=2&page='.$page.'">2</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=3&page='.$page.'">3</a></li>
          ';

                  $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?pageH=2&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } elseif ($pageH == 3) {
                  $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?pageH=2&page='.$page.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=1&page='.$page.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=2&page='.$page.'">2</a></li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH=3&page='.$page.'">3</a></li>
          ';

                  $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?pageH=3&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?pageH=1&page='.$page.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=1&page='.$page.'">1</a></li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH=2&page='.$page.'">2</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=3&page='.$page.'">3</a></li>
          ';

                  $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?pageH=3&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
            }
          }
      }
      else{
        if($pageH == 1){
          $paginationH = '
            <li class="page-item disabled">
                <a class="page-link" href="./myMobileStory.php?pageH=1&page='.$page.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $paginationH .= '
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH=1&page='.$page.'">1</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=2&page='.$page.'">2</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=3&page='.$page.'">3</a></li>
          ';

          $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?pageH=2&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else if($pageH == $countH){
          $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?pageH='.($pageH-1).'&page='.$page.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $paginationH .= '
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH='.($pageH-2).'&page='.$page.'">'.($pageH-2).'</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH='.($pageH-1).'&page='.$page.'">'.($pageH-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH='.($pageH).'&page='.$page.'">'.($pageH).'</a></li>
          ';

          $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?pageH='.($pageH).'&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else{
          $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?pageH='.($pageH-1).'&page='.$page.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $paginationH .= '
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH='.($pageH-1).'&page='.$page.'">'.($pageH-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH='.($pageH).'&page='.$page.'">'.($pageH).'</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH='.($pageH+1).'&page='.$page.'">'.($pageH+1).'</a></li>
          ';

          $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?pageH='.($pageH+1).'&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
      }
  }


  
  //===========================================================================================================================
  // mms is set
  else if (isset($_GET['page']) && $_GET['page'] != '') {

      $page = $_GET['page'];
      $start1 = ($page - 1)*10;

      include_once './_connect_dbs.php';
      $query = 'SELECT * FROM `mobile_story` ORDER BY `id` DESC';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $html = '<div class="col-md-1"></div>';
          $cnt = 1;
          // foreach ($result as $know) {
            for($i = $start1; $i<= min(($start1 + 9), count($result) - 1); $i++){
              $path = 'https://admin.cybersalamat.com/'.$result[$i]['path'];
              $id = $result[$i]['id'];

              if ($cnt <= 5) {
                  $html .= '
                  <div class="col-md-2 d-flex">
                    <div class="card" style="border:none !important; width:90%; margin:0 auto;">
                      <img class="card-img-top" style="height:80%; " src="'.$path.'" alt="Card image cap">
                      <div class="card-body">
                        <a href="https://cybersalamat.com/myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%; font-size:80%">READ</a>
                      </div>
                    </div>
                  </div>
                  ';
                  $cnt++;
              } else {
                  $html .= '
                      <div class="col-md-1"></div>
                    </div>
                    <div class="row  text-center py-4">
                      <div class="col-md-1"></div>

                  ';

                  $html .= '
                    <div class="col-md-2 ">
                      <div class="card" style="border:none !important; width:90%; margin:0 auto;">
                        <img class="card-img-top" style="height:80%;" src="'.$path.'" alt="Card image cap">
                        <div class="card-body">
                          <a href="https://cybersalamat.com/myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%; font-size:80%">READ</a>
                        </div>
                      </div>
                    </div>
                  ';
                  $cnt = 2;
              }
          }
      }

      $query = 'SELECT count(*) as total FROM `mobile_story`';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();
      $count = $result[0]['total'];
      $count = ceil($count/10);

      if ($count <= 3) {
          if ($count == 2) {
              if ($page == 1) {
                  $pagination = '
          <li class="page-item disabled">
              <a class="page-link" href="./myMobileStory.php?page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          ';
                  $pagination .= '
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=2">2</a></li>
          ';

                  $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?page=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $pagination = '
            <li class="page-item ">
                <a class="page-link" href="./myMobileStory.php?page=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=1">1</a></li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page=2">2</a></li>
          ';

                  $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?page=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              }
          } else {
              if ($page == 1) {
                  $pagination = '
            <li class="page-item disabled">
                <a class="page-link" href="./myMobileStory.php?page=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=2">2</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=3">3</a></li>
          ';

                  $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?page=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } elseif ($page == 3) {
                  $pagination = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?page=2" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=2">2</a></li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page=3">3</a></li>
          ';

                  $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?page=3" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $pagination = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?page=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=1">1</a></li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page=2">2</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=3">3</a></li>
          ';

                  $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?page=3" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
            }
          }
      }
      else{
        if($page == 1){
          $pagination = '
            <li class="page-item disabled">
                <a class="page-link" href="./myMobileStory.php?page=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $pagination .= '
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page=1">1</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=2">2</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=3">3</a></li>
          ';

          $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?page=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else if($page == $count){
          $pagination = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?page='.($page-1).'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $pagination .= '
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?page='.($page-2).'">'.($page-2).'</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?page='.($page-1).'">'.($page-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page='.($page).'">'.($page).'</a></li>
          ';

          $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?page='.($page).'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else{
          $pagination = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?page='.($page-1).'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $pagination .= '
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?page='.($page-1).'">'.($page-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page='.($page).'">'.($page).'</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?page='.($page+1).'">'.($page+1).'</a></li>
          ';

          $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?page='.($page+1).'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
      }

      // youtube section

      
      $query = 'SELECT * FROM `youtube_video` ORDER BY `id` DESC LIMIT 6';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $htmlH = '';
          $cnt = 1;
          foreach ($result as $know) {
              if ($cnt <= 3) {
                  $htmlH .= '
                  
                    <div class="col-md-4 text-center ">
                      <h4>
                          '.$know['name'].'
                      </h4>
                      <br>
                        <p class = "youtube">
                        '.$know['link'].'
                        </p>
                    </div>
                  ';
                  $cnt++;
              // echo $cnt;
              } else {
                  $htmlH .='
                      </div>
                    <div class="row text-center" style="padding-top:4%;">
                  ';
                  $htmlH .= '
                  
                    <div class="col-md-4 text-center ">
                      <h4>
                          '.$know['name'].'
                      </h4>
                      <br>
                        <p class = "youtube">
                        '.$know['link'].'
                        </p>
                    </div>
                  ';
                  $cnt = 2;
                  //   echo $cnt;
              }
          }
      }

      $query = 'SELECT count(*) as total FROM `youtube_video`';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();

      $countH = $result[0]['total'];

      // echo $countH;

      $countH = ceil($countH/6);

      // echo $countH;

      if ($countH <=3) {
          if ($countH == 1) {
              $paginationH = '';
          } else {
              $paginationH = '
                <li class="page-item disabled">
                  <a class="page-link" href="./myMobileStory.php?pageH=1&page='.$page.'" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
              ';
              for ($i = 1; $i<=$countH; $i++) {
                  if ($i == 1) {
                    $paginationH .= '
                      <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH='.$i.'&page='.$page.'">'.$i.'</a></li>
                    ';
                  } else {
                      $paginationH .= '
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH='.$i.'&page='.$page.'">'.$i.'</a></li>
            ';
                  }
              }
              $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?pageH=2&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
        ';
          }
      } else {
          $paginationH = '
          <li class="page-item disabled">
              <a class="page-link" href="./myMobileStory.php?pageH=1&page='.$page.'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH=1&page='.$page.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=2&page='.$page.'">2</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=3&page='.$page.'">3</a></li>
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?pageH=2&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
      ';
      }

  }
  // hindi page is set english is not
  
  //===========================================================================================================================

  else if (isset($_GET['pageH']) && $_GET['pageH'] != '') {
    include_once './_connect_dbs.php';
    $pageH = $_GET['pageH'];


    // english is not set
    $query = 'SELECT * FROM `mobile_story` ORDER BY `id` DESC LIMIT 10';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $html = '<div class="col-md-1"></div>';
          $cnt = 1;
          foreach ($result as $know) {
            $path = 'https://admin.cybersalamat.com/'.$know['path'];
            $id = $know['id'];

            if ($cnt <= 5) {
                $html .= '
                <div class="col-md-2 d-flex">
                  <div class="card" style="border:none !important; width:90%; margin:0 auto;">
                    <img class="card-img-top" style="height:80%; " src="'.$path.'" alt="Card image cap">
                    <div class="card-body">
                      <a href="https://cybersalamat.com/myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%; font-size:80%">READ</a>
                    </div>
                  </div>
                </div>
                ';
                $cnt++;
            } else {
                $html .= '
                    <div class="col-md-1"></div>
                  </div>
                  <div class="row  text-center py-4">
                    <div class="col-md-1"></div>

                ';

                $html .= '
                  <div class="col-md-2 ">
                    <div class="card" style="border:none !important; width:90%; margin:0 auto;">
                      <img class="card-img-top" style="height:80%;" src="'.$path.'" alt="Card image cap">
                      <div class="card-body">
                        <a href="https://cybersalamat.com/myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%; font-size:80%">READ</a>
                      </div>
                    </div>
                  </div>
                ';
                $cnt = 2;
            }
          }
      }

      $query = 'SELECT count(*) as total FROM `mobile_story`';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();

      $count = $result[0]['total'];

      $count = ceil($count/10);

      // echo $count;

      if ($count <=3) {
          if ($count == 1) {
              $pagination = '';
          } else {
              $pagination = '
            <li class="page-item disabled">
              <a class="page-link" href="./myMobileStory.php?page=1&pageH='.$pageH.'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
        ';
              for ($i = 1; $i<=$count; $i++) {
                  if ($i == 1) {
                      $pagination .= '
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page='.$i.'&pageH='.$pageH.'">'.$i.'</a></li>
            ';
                  } else {
                      $pagination .= '
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?page='.$i.'&pageH='.$pageH.'">'.$i.'</a></li>
            ';
                  }
              }
              $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?page=2&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
        ';
          }
      } else {
          $pagination = '
          <li class="page-item disabled">
              <a class="page-link" href="./myMobileStory.php?page=1&pageH='.$pageH.'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page=1&pageH='.$pageH.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=2&pageH='.$pageH.'">2</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=3&pageH='.$pageH.'">3</a></li>
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?page=2&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
      ';
      }

      // hindi section

      $startH1 = ($pageH - 1)*6;

      include_once './_connect_dbs.php';
      $query = 'SELECT * FROM `youtube_video` ORDER BY `id` DESC';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $htmlH = '';
          $cnt = 1;
          // foreach ($result as $know) {
            for($i = $startH1; $i<= min(($startH1 + 5), count($result) - 1); $i++){
              if ($cnt <= 3) {
                $htmlH .= '
                
                  <div class="col-md-4 text-center ">
                    <h4>
                        '.$result[$i]['name'].'
                    </h4>
                    <br>
                      <p class = "youtube">
                      '.$result[$i]['link'].'
                      </p>
                  </div>
                ';
                $cnt++;
            // echo $cnt;
            } else {
                $htmlH .='
                    </div>
                  <div class="row text-center" style="padding-top:4%;">
                ';
                $htmlH .= '
                
                  <div class="col-md-4 text-center ">
                    <h4>
                        '.$result[$i]['name'].'
                    </h4>
                    <br>
                      <p class = "youtube">
                      '.$result[$i]['link'].'
                      </p>
                  </div>
                ';
                $cnt = 2;
                //   echo $cnt;
              }
            }
      }

      $query = 'SELECT count(*) as total FROM `youtube_video`';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();
      $countH = $result[0]['total'];
      $countH = ceil($countH/6);

      if ($countH <= 3) {
          if ($countH == 2) {
              if ($pageH == 1) {
                  $paginationH = '
          <li class="page-item disabled">
              <a class="page-link" href="./myMobileStory.php?pageH=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          ';
                  $paginationH .= '
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=2">2</a></li>
          ';

                  $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?pageH=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $paginationH = '
            <li class="page-item ">
                <a class="page-link" href="./myMobileStory.php?pageH=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=1">1</a></li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH=2">2</a></li>
          ';

                  $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?pageH=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              }
          } else {
              if ($pageH == 1) {
                  $paginationH = '
            <li class="page-item disabled">
                <a class="page-link" href="./myMobileStory.php?pageH=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=2">2</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=3">3</a></li>
          ';

                  $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?pageH=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } elseif ($pageH == 3) {
                  $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?pageH=2" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=2">2</a></li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH=3">3</a></li>
          ';

                  $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?pageH=3" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?pageH=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=1">1</a></li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH=2">2</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=3">3</a></li>
          ';

                  $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?pageH=3" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
            }
          }
      }
      else{
        if($pageH == 1){
          $paginationH = '
            <li class="page-item disabled">
                <a class="page-link" href="./myMobileStory.php?pageH=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $paginationH .= '
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH=1">1</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=2">2</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=3">3</a></li>
          ';

          $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?pageH=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else if($pageH == $countH){
          $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?pageH='.($pageH-1).'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $paginationH .= '
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH='.($pageH-2).'">'.($pageH-2).'</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH='.($pageH-1).'">'.($pageH-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH='.($pageH).'">'.($pageH).'</a></li>
          ';

          $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?pageH='.($pageH).'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else{
          $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./myMobileStory.php?pageH='.($pageH-1).'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $paginationH .= '
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH='.($pageH-1).'">'.($pageH-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH='.($pageH).'">'.($pageH).'</a></li>
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH='.($pageH+1).'">'.($pageH+1).'</a></li>
          ';

          $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./myMobileStory.php?pageH='.($pageH+1).'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
      }
  }
  
  // not anything is set

  //===========================================================================================================================
  
  else {
      include_once './_connect_dbs.php';
      $query = 'SELECT * FROM `mobile_story` ORDER BY `id` DESC LIMIT 10';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();
          $html = '<div class="col-md-1"></div>';

          $cnt = 1;
          foreach ($result as $know) {
            $path = 'https://admin.cybersalamat.com/'.$know['path'];
            $id = $know['id'];

            if ($cnt <= 5) {
                $html .= '
                <div class="col-md-2 d-flex">
                  <div class="card" style="border:none !important; width:90%; margin:0 auto;">
                    <img class="card-img-top" style="height:80%; " src="'.$path.'" alt="Card image cap">
                    <div class="card-body">
                      <a href="https://cybersalamat.com/myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%; font-size:80%">READ</a>
                    </div>
                  </div>
                </div>
                ';
                $cnt++;
            } else {
                $html .= '
                    <div class="col-md-1"></div>
                  </div>
                  <div class="row  text-center py-4">
                    <div class="col-md-1"></div>

                ';

                $html .= '
                  <div class="col-md-2 ">
                    <div class="card" style="border:none !important; width:90%; margin:0 auto;">
                      <img class="card-img-top" style="height:80%;" src="'.$path.'" alt="Card image cap">
                      <div class="card-body">
                        <a href="https://cybersalamat.com/myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%; font-size:80%">READ</a>
                      </div>
                    </div>
                  </div>
                ';
                $cnt = 2;
            }
          }
      }

      $query = 'SELECT count(*) as total FROM `mobile_story`';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();

      $count = $result[0]['total'];

      $count = ceil($count/10);

      // echo $count;

      if ($count <=3) {
          if ($count == 1) {
              $pagination = '';
          } else {
              $pagination = '
            <li class="page-item disabled">
              <a class="page-link" href="./myMobileStory.php?page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
        ';
              for ($i = 1; $i<=$count; $i++) {
                  if ($i == 1) {
                      $pagination .= '
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page='.$i.'">'.$i.'</a></li>
            ';
                  } else {
                      $pagination .= '
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?page='.$i.'">'.$i.'</a></li>
            ';
                  }
              }
              $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?page=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
        ';
          }
      } else {
          $pagination = '
          <li class="page-item disabled">
              <a class="page-link" href="./myMobileStory.php?page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?page=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=2">2</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?page=3">3</a></li>
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?page=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
      ';
      }

      //Youtube Section 

      $query = 'SELECT * FROM `youtube_video` ORDER BY `id` DESC LIMIT 6';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $htmlH = '';
          $cnt = 1;
          foreach ($result as $know) {
              if ($cnt <= 3) {
                  $htmlH .= '
                  
                    <div class="col-md-4 text-center ">
                      <h4>
                          '.$know['name'].'
                      </h4>
                      <br>
                        <p class = "youtube">
                        '.$know['link'].'
                        </p>
                    </div>
                  ';
                  $cnt++;
              // echo $cnt;
              } else {
                  $htmlH .='
                      </div>
                    <div class="row text-center" style="padding-top:4%;">
                  ';
                  $htmlH .= '
                  
                    <div class="col-md-4 text-center ">
                      <h4>
                          '.$know['name'].'
                      </h4>
                      <br>
                        <p class = "youtube">
                        '.$know['link'].'
                        </p>
                    </div>
                  ';
                  $cnt = 2;
                  //   echo $cnt;
              }
          }
      }

      $query = 'SELECT count(*) as total FROM `youtube_video`';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();

      $countH = $result[0]['total'];

      // echo $countH;

      $countH = ceil($countH/6);

      // echo $countH;

      if ($countH <=3) {
          if ($countH == 1) {
              $paginationH = '';
          } else {
              $paginationH = '
            <li class="page-item disabled">
              <a class="page-link" href="./myMobileStory.php?pageH=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
        ';
              for ($i = 1; $i<=$countH; $i++) {
                  if ($i == 1) {
                      $paginationH .= '
            <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH='.$i.'">'.$i.'</a></li>
            ';
                  } else {
                      $paginationH .= '
            <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH='.$i.'">'.$i.'</a></li>
            ';
                  }
              }
              $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?pageH=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
        ';
          }
      } else {
          $paginationH = '
          <li class="page-item disabled">
              <a class="page-link" href="./myMobileStory.php?pageH=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          <li class="page-item active"><a class="page-link" href="./myMobileStory.php?pageH=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=2">2</a></li>
          <li class="page-item"><a class="page-link" href="./myMobileStory.php?pageH=3">3</a></li>
          <li class="page-item">
            <a class="page-link" href="./myMobileStory.php?pageH=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
      ';
      }
  }
  
      // include_once './_connect_dbs.php';
      

      // $query = 'SELECT * FROM `mobile_story` ORDER BY RAND() LIMIT 20';
      // $query_stmt = $db_app->prepare($query);
      // $query_stmt->execute();

      // if ($query_stmt->rowCount() > 0) {
      //     $result = $query_stmt->fetchAll();
        
          
      //     $html = '<div class="col-md-1"></div>';
      //     $cnt = 1;
      //     foreach ($result as $story) {
      //         $path = 'https://admin.cybersalamat.com/'.$story['path'];
      //         $id = $story['id'];

      //         if ($cnt <= 5) {
      //             $html .= '
      //       <div class="col-md-2 d-flex">
      //         <div class="card" style="border:none !important; width:90%; margin:0 auto;">
      //           <img class="card-img-top" style="height:80%; " src="'.$path.'" alt="Card image cap">
      //           <div class="card-body">
      //             <a href="https://cybersalamat.com/myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%; font-size:80%">READ</a>
      //           </div>
      //         </div>
      //       </div>
      //       ';
      //             $cnt++;
      //         } else {
      //             $html .= '
      //           <div class="col-md-1"></div>
      //         </div>
      //         <div class="row  text-center py-4">
      //           <div class="col-md-1"></div>

      //       ';

      //             $html .= '
      //       <div class="col-md-2 ">
      //         <div class="card" style="border:none !important; width:90%; margin:0 auto;">
      //           <img class="card-img-top" style="height:80%;" src="'.$path.'" alt="Card image cap">
      //           <div class="card-body">
      //             <a href="https://cybersalamat.com/myMobileStory.php?id='.$id.'" class="btn btn-primary" style="margin-top:-20%; font-size:80%">READ</a>
      //           </div>
      //         </div>
      //       </div>
      //       ';
      //             $cnt = 2;
      //         }
      //     }
      // }


  }
?>


<!DOCTYPE html>
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

  <link rel="stylesheet" href="./css/myMobileStory.css" />

  <title>My Mobile Story</title>
  <link rel="shortcut icon" href="./images/favicon.ico" />
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
            <li class="nav-item active">
              <a class="nav-link section-name" href="./myMobileStory.php">My Mobile Story</a>
            </li>
            <!--<li class="nav-item">-->
            <!--  <a class="nav-link section-name" href="./comics.php">Comics</a>-->
            <!--</li>-->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle navbar-dark" href="./comics.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Comics
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
        </div>
      </nav>
    </div>
  </header>
  <!-- header -->

  <!-- main content -->
  <main>

    <?php echo $heading;?>



    <div class="container-fluid">
      <div class="row text-center d-flex py-4">

        <?php echo $html; ?>

      </div>
    </div>

    
    <div class="container-fluid">
      <div class="contianer">
        <div class="row text-center">
          <div class="col-md-12 ">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <?php echo $pagination; ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>

  <div class="container-fluid m-0 audio">
    <div class="container ">
      <div class="row audio-heading">
        <h2>
          Video Stories
        </h2>
      </div>
      <div class="row text-center" style="padding-top:4%;">

        <?php echo $htmlH; ?>
      </div>
    </div>
  </div>


    <div class="container-fluid">
      <div class="contianer">
        <div class="row text-center">
          <div class="col-md-12 ">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <?php echo $paginationH; ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>


    <?php echo $mores; ?>
    

    <div class="container-fluid">
      <div class="row text-center py-4">

        <?php echo $extra; ?>

      </div>
    </div>


    <div class="container">
        <div class="row">
            <img src="./images/coverMyMobileStory.gif" width="100%" class="img-fluid" alt="">
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
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
    
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <script src="./js/myMobileStory.js" type="text/javascript"></script>

</body>

</html>