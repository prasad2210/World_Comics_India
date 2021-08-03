<?php

  if(isset($_GET['page']) && $_GET['page'] != '' && isset($_GET['pageH']) && $_GET['pageH'] != ''){ 

    $page = $_GET['page'];
    $pageH = $_GET['pageH'];
      $start1 = ($page - 1)*3;

      include_once './_connect_dbs.php';
      $query = 'SELECT * FROM `did_you_know` WHERE `lang` = 0 ORDER BY `id` DESC';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $html = '
      <div class="row comicRow text-center">';
          $cnt = 1;
          // foreach ($result as $know) {
            for($i = $start1; $i<= min(($start1 + 2), count($result) - 1); $i++){

              if ($cnt <= 3) {
                  $html .= '
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$result[$i]['path'].'" alt="Card image cap">
              </div>
            </div>
            ';
                  $cnt++;
              // echo $cnt;
              } else {
                  $html .='
              </div>
            <div class="row comicRow text-center">
          ';
                  $html .= '
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$result[$i]['path'].'" alt="Card image cap">
              </div>
            </div>
            ';
                  $cnt = 2;
                  //   echo $cnt;
              }
          }
      }

      $query = 'SELECT count(*) as total FROM `did_you_know` WHERE `lang` = 0';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();
      $count = $result[0]['total'];
      $count = ceil($count/3);

      if ($count <= 3) {
          if ($count == 2) {
              if ($page == 1) {
                  $pagination = '
          <li class="page-item disabled">
              <a class="page-link" href="./knowledgeHub.php?page=1&pageH='.$pageH.'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          ';
                  $pagination .= '
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page=1&pageH='.$pageH.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=2&pageH='.$pageH.'">2</a></li>
          ';

                  $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?page=2&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $pagination = '
            <li class="page-item ">
                <a class="page-link" href="./knowledgeHub.php?page=1&pageH='.$pageH.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=1&pageH='.$pageH.'">1</a></li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page=2&pageH='.$pageH.'">2</a></li>
          ';

                  $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?page=2&pageH='.$pageH.'" aria-label="Next">
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
                <a class="page-link" href="./knowledgeHub.php?page=1&pageH='.$pageH.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page=1&pageH='.$pageH.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=2&pageH='.$pageH.'">2</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=3&pageH='.$pageH.'">3</a></li>
          ';

                  $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?page=2&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } elseif ($page == 3) {
                  $pagination = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?page=2&pageH='.$pageH.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=1&pageH='.$pageH.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=2&pageH='.$pageH.'">2</a></li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page=3&pageH='.$pageH.'">3</a></li>
          ';

                  $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?page=3&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $pagination = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?page=1&pageH='.$pageH.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=1&pageH='.$pageH.'">1</a></li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page=2&pageH='.$pageH.'">2</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=3&pageH='.$pageH.'">3</a></li>
          ';

                  $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?page=3&pageH='.$pageH.'" aria-label="Next">
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
                <a class="page-link" href="./knowledgeHub.php?page=1&pageH='.$pageH.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $pagination .= '
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page=1&pageH='.$pageH.'">1</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=2&pageH='.$pageH.'">2</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=3&pageH='.$pageH.'">3</a></li>
          ';

          $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?page=2&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else if($page == $count){
          $pagination = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?page='.($page-1).'&pageH='.$pageH.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $pagination .= '
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page='.($page-2).'&pageH='.$pageH.'">'.($page-2).'</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page='.($page-1).'&pageH='.$pageH.'">'.($page-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page='.($page).'&pageH='.$pageH.'">'.($page).'</a></li>
          ';

          $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?page='.($page).'&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else{
          $pagination = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?page='.($page-1).'&pageH='.$pageH.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $pagination .= '
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page='.($page-1).'&pageH='.$pageH.'">'.($page-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page='.($page).'&pageH='.$pageH.'">'.($page).'</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page='.($page+1).'&pageH='.$pageH.'">'.($page+1).'</a></li>
          ';

          $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?page='.($page+1).'&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
      }

      // hindi set section 

      $startH1 = ($pageH - 1)*3;

      // include_once './_connect_dbs.php';
      $query = 'SELECT * FROM `did_you_know` WHERE `lang` = 1 ORDER BY `id` DESC';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $htmlH = '
      <div class="row comicRow text-center">';
          $cnt = 1;
          // foreach ($result as $know) {
            for($i = $startH1; $i<= min(($startH1 + 2), count($result) - 1); $i++){

              if ($cnt <= 3) {
                  $htmlH .= '
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$result[$i]['path'].'" alt="Card image cap">
              </div>
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
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$result[$i]['path'].'" alt="Card image cap">
              </div>
            </div>
            ';
                  $cnt = 2;
                  //   echo $cnt;
              }
          }
      }

      $query = 'SELECT count(*) as total FROM `did_you_know` WHERE `lang` = 1';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();
      $countH = $result[0]['total'];
      $countH = ceil($countH/3);

      if ($countH <= 3) {
          if ($countH == 2) {
              if ($pageH == 1) {
                  $paginationH = '
          <li class="page-item disabled">
              <a class="page-link" href="./knowledgeHub.php?pageH=1&page='.$page.'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          ';
                  $paginationH .= '
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH=1&page='.$page.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=2&page='.$page.'">2</a></li>
          ';

                  $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?pageH=2&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $paginationH = '
            <li class="page-item ">
                <a class="page-link" href="./knowledgeHub.php?pageH=1&page='.$page.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=1&page='.$page.'">1</a></li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH=2&page='.$page.'">2</a></li>
          ';

                  $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?pageH=2&page='.$page.'" aria-label="Next">
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
                <a class="page-link" href="./knowledgeHub.php?pageH=1&page='.$page.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH=1&page='.$page.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=2&page='.$page.'">2</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=3&page='.$page.'">3</a></li>
          ';

                  $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?pageH=2&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } elseif ($pageH == 3) {
                  $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?pageH=2&page='.$page.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=1&page='.$page.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=2&page='.$page.'">2</a></li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH=3&page='.$page.'">3</a></li>
          ';

                  $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?pageH=3&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?pageH=1&page='.$page.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=1&page='.$page.'">1</a></li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH=2&page='.$page.'">2</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=3&page='.$page.'">3</a></li>
          ';

                  $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?pageH=3&page='.$page.'" aria-label="Next">
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
                <a class="page-link" href="./knowledgeHub.php?pageH=1&page='.$page.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $paginationH .= '
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH=1&page='.$page.'">1</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=2&page='.$page.'">2</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=3&page='.$page.'">3</a></li>
          ';

          $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?pageH=2&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else if($pageH == $countH){
          $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?pageH='.($pageH-1).'&page='.$page.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $paginationH .= '
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH='.($pageH-2).'&page='.$page.'">'.($pageH-2).'</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH='.($pageH-1).'&page='.$page.'">'.($pageH-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH='.($pageH).'&page='.$page.'">'.($pageH).'</a></li>
          ';

          $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?pageH='.($pageH).'&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else{
          $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?pageH='.($pageH-1).'&page='.$page.'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $paginationH .= '
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH='.($pageH-1).'&page='.$page.'">'.($pageH-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH='.($pageH).'&page='.$page.'">'.($pageH).'</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH='.($pageH+1).'&page='.$page.'">'.($pageH+1).'</a></li>
          ';

          $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?pageH='.($pageH+1).'&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
      }
  }


  
  //===========================================================================================================================
  // english page is set
  else if (isset($_GET['page']) && $_GET['page'] != '') {

      $page = $_GET['page'];
      $start1 = ($page - 1)*3;

      include_once './_connect_dbs.php';
      $query = 'SELECT * FROM `did_you_know` WHERE `lang` = 0 ORDER BY `id` DESC';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $html = '
      <div class="row comicRow text-center">';
          $cnt = 1;
          // foreach ($result as $know) {
            for($i = $start1; $i<= min(($start1 + 2), count($result) - 1); $i++){

              if ($cnt <= 3) {
                  $html .= '
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$result[$i]['path'].'" alt="Card image cap">
              </div>
            </div>
            ';
                  $cnt++;
              // echo $cnt;
              } else {
                  $html .='
              </div>
            <div class="row comicRow text-center">
          ';
                  $html .= '
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$result[$i]['path'].'" alt="Card image cap">
              </div>
            </div>
            ';
                  $cnt = 2;
                  //   echo $cnt;
              }
          }
      }

      $query = 'SELECT count(*) as total FROM `did_you_know` WHERE `lang` = 0';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();
      $count = $result[0]['total'];
      $count = ceil($count/3);

      if ($count <= 3) {
          if ($count == 2) {
              if ($page == 1) {
                  $pagination = '
          <li class="page-item disabled">
              <a class="page-link" href="./knowledgeHub.php?page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          ';
                  $pagination .= '
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=2">2</a></li>
          ';

                  $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?page=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $pagination = '
            <li class="page-item ">
                <a class="page-link" href="./knowledgeHub.php?page=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=1">1</a></li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page=2">2</a></li>
          ';

                  $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?page=2" aria-label="Next">
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
                <a class="page-link" href="./knowledgeHub.php?page=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=2">2</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=3">3</a></li>
          ';

                  $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?page=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } elseif ($page == 3) {
                  $pagination = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?page=2" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=2">2</a></li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page=3">3</a></li>
          ';

                  $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?page=3" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $pagination = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?page=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $pagination .= '
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=1">1</a></li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page=2">2</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=3">3</a></li>
          ';

                  $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?page=3" aria-label="Next">
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
                <a class="page-link" href="./knowledgeHub.php?page=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $pagination .= '
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page=1">1</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=2">2</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=3">3</a></li>
          ';

          $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?page=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else if($page == $count){
          $pagination = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?page='.($page-1).'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $pagination .= '
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page='.($page-2).'">'.($page-2).'</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page='.($page-1).'">'.($page-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page='.($page).'">'.($page).'</a></li>
          ';

          $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?page='.($page).'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else{
          $pagination = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?page='.($page-1).'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $pagination .= '
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page='.($page-1).'">'.($page-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page='.($page).'">'.($page).'</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page='.($page+1).'">'.($page+1).'</a></li>
          ';

          $pagination .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?page='.($page+1).'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
      }

      // hindi section

      $query = 'SELECT * FROM `did_you_know` ORDER BY `id` AND `lang`= 1 DESC LIMIT 3';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $htmlH = '
      <div class="row comicRow text-center">';
          $cnt = 1;
          foreach ($result as $know) {
              if ($cnt <= 3) {
                  $htmlH .= '
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$know['path'].'" alt="Card image cap">
              </div>
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
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$know['path'].'" alt="Card image cap">
              </div>
            </div>
            ';
                  $cnt = 2;
                  //   echo $cnt;
              }
          }
      }

      $query = 'SELECT count(*) as total FROM `did_you_know` WHERE `lang` = 1';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();

      $countH = $result[0]['total'];

      // echo $countH;

      $countH = ceil($countH/3);

      echo $countH;

      if ($countH <=3) {
          if ($countH == 1) {
              $paginationH = '';
          } else {
              $paginationH = '
            <li class="page-item disabled">
              <a class="page-link" href="./knowledgeHub.php?pageH=1&page='.$page.'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
        ';
              for ($i = 1; $i<=$countH; $i++) {
                  if ($i == 1) {
                      $paginationH .= '
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH='.$i.'&page='.$page.'">'.$i.'</a></li>
            ';
                  } else {
                      $paginationH .= '
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH='.$i.'&page='.$page.'">'.$i.'</a></li>
            ';
                  }
              }
              $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?pageH=2&page='.$page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
        ';
          }
      } else {
          $paginationH = '
          <li class="page-item disabled">
              <a class="page-link" href="./knowledgeHub.php?pageH=1&page='.$page.'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH=1&page='.$page.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=2&page='.$page.'">2</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=3&page='.$page.'">3</a></li>
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?pageH=2&page='.$page.'" aria-label="Next">
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
    $query = 'SELECT * FROM `did_you_know` ORDER BY `id` AND `lang`= 0 DESC LIMIT 3';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $html = '
      <div class="row comicRow text-center">';
          $cnt = 1;
          foreach ($result as $know) {
              if ($cnt <= 3) {
                  $html .= '
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$know['path'].'" alt="Card image cap">
              </div>
            </div>
            ';
                  $cnt++;
              // echo $cnt;
              } else {
                  $html .='
              </div>
            <div class="row comicRow text-center">
          ';
                  $html .= '
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$know['path'].'" alt="Card image cap">
              </div>
            </div>
            ';
                  $cnt = 2;
                  //   echo $cnt;
              }
          }
      }

      $query = 'SELECT count(*) as total FROM `did_you_know` WHERE `lang`= 0';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();

      $count = $result[0]['total'];

      $count = ceil($count/3);

      // echo $count;

      if ($count <=3) {
          if ($count == 1) {
              $pagination = '';
          } else {
              $pagination = '
            <li class="page-item disabled">
              <a class="page-link" href="./knowledgeHub.php?page=1&pageH='.$pageH.'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
        ';
              for ($i = 1; $i<=$count; $i++) {
                  if ($i == 1) {
                      $pagination .= '
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page='.$i.'&pageH='.$pageH.'">'.$i.'</a></li>
            ';
                  } else {
                      $pagination .= '
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page='.$i.'&pageH='.$pageH.'">'.$i.'</a></li>
            ';
                  }
              }
              $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?page=2&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
        ';
          }
      } else {
          $pagination = '
          <li class="page-item disabled">
              <a class="page-link" href="./knowledgeHub.php?page=1&pageH='.$pageH.'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page=1&pageH='.$pageH.'">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=2&pageH='.$pageH.'">2</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=3&pageH='.$pageH.'">3</a></li>
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?page=2&pageH='.$pageH.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
      ';
      }

      // hindi section

      $startH1 = ($pageH - 1)*3;

      include_once './_connect_dbs.php';
      $query = 'SELECT * FROM `did_you_know` WHERE `lang` = 1 ORDER BY `id` DESC';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $htmlH = '
      <div class="row comicRow text-center">';
          $cnt = 1;
          // foreach ($result as $know) {
            for($i = $startH1; $i<= min(($startH1 + 2), count($result) - 1); $i++){

              if ($cnt <= 3) {
                  $htmlH .= '
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$result[$i]['path'].'" alt="Card image cap">
              </div>
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
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$result[$i]['path'].'" alt="Card image cap">
              </div>
            </div>
            ';
                  $cnt = 2;
                  //   echo $cnt;
              }
          }
      }

      $query = 'SELECT count(*) as total FROM `did_you_know` WHERE `lang` = 1';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();
      $countH = $result[0]['total'];
      $countH = ceil($countH/3);

      if ($countH <= 3) {
          if ($countH == 2) {
              if ($pageH == 1) {
                  $paginationH = '
          <li class="page-item disabled">
              <a class="page-link" href="./knowledgeHub.php?pageH=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          ';
                  $paginationH .= '
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=2">2</a></li>
          ';

                  $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?pageH=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $paginationH = '
            <li class="page-item ">
                <a class="page-link" href="./knowledgeHub.php?pageH=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=1">1</a></li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH=2">2</a></li>
          ';

                  $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?pageH=2" aria-label="Next">
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
                <a class="page-link" href="./knowledgeHub.php?pageH=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=2">2</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=3">3</a></li>
          ';

                  $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?pageH=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } elseif ($pageH == 3) {
                  $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?pageH=2" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=2">2</a></li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH=3">3</a></li>
          ';

                  $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?pageH=3" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
              } else {
                  $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?pageH=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
                  $paginationH .= '
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=1">1</a></li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH=2">2</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=3">3</a></li>
          ';

                  $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?pageH=3" aria-label="Next">
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
                <a class="page-link" href="./knowledgeHub.php?pageH=1" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $paginationH .= '
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH=1">1</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=2">2</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=3">3</a></li>
          ';

          $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?pageH=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else if($pageH == $countH){
          $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?pageH='.($pageH-1).'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $paginationH .= '
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH='.($pageH-2).'">'.($pageH-2).'</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH='.($pageH-1).'">'.($pageH-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH='.($pageH).'">'.($pageH).'</a></li>
          ';

          $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?pageH='.($pageH).'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          ';
        }
        else{
          $paginationH = '
            <li class="page-item">
                <a class="page-link" href="./knowledgeHub.php?pageH='.($pageH-1).'" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
          ';
          $paginationH .= '
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH='.($pageH-1).'">'.($pageH-1).'</a></li>
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH='.($pageH).'">'.($pageH).'</a></li>
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH='.($pageH+1).'">'.($pageH+1).'</a></li>
          ';

          $paginationH .= '
          <li class="page-item disabled">
            <a class="page-link" href="./knowledgeHub.php?pageH='.($pageH+1).'" aria-label="Next">
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
      $query = 'SELECT * FROM `did_you_know` ORDER BY `id` AND `lang`= 0 DESC LIMIT 3';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $html = '
      <div class="row comicRow text-center">';
          $cnt = 1;
          foreach ($result as $know) {
              if ($cnt <= 3) {
                  $html .= '
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$know['path'].'" alt="Card image cap">
              </div>
            </div>
            ';
                  $cnt++;
              // echo $cnt;
              } else {
                  $html .='
              </div>
            <div class="row comicRow text-center">
          ';
                  $html .= '
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$know['path'].'" alt="Card image cap">
              </div>
            </div>
            ';
                  $cnt = 2;
                  //   echo $cnt;
              }
          }
      }

      $query = 'SELECT count(*) as total FROM `did_you_know` WHERE `lang`= 0';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();

      $count = $result[0]['total'];

      $count = ceil($count/3);

      // echo $count;

      if ($count <=3) {
          if ($count == 1) {
              $pagination = '';
          } else {
              $pagination = '
            <li class="page-item disabled">
              <a class="page-link" href="./knowledgeHub.php?page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
        ';
              for ($i = 1; $i<=$count; $i++) {
                  if ($i == 1) {
                      $pagination .= '
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page='.$i.'">'.$i.'</a></li>
            ';
                  } else {
                      $pagination .= '
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page='.$i.'">'.$i.'</a></li>
            ';
                  }
              }
              $pagination .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?page=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
        ';
          }
      } else {
          $pagination = '
          <li class="page-item disabled">
              <a class="page-link" href="./knowledgeHub.php?page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?page=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=2">2</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?page=3">3</a></li>
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?page=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
      ';
      }

      //hindi section 

      $query = 'SELECT * FROM `did_you_know` ORDER BY `id` AND `lang`= 1 DESC LIMIT 3';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      if ($query_stmt->rowCount() > 0) {
          $result = $query_stmt->fetchAll();

          $htmlH = '
      <div class="row comicRow text-center">';
          $cnt = 1;
          foreach ($result as $know) {
              if ($cnt <= 3) {
                  $htmlH .= '
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$know['path'].'" alt="Card image cap">
              </div>
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
            <div class="col-md-4">
              <div class="card" style="border:none !important;width:80%; margin:0 auto;">
                <img class="card-img-top img-fluid" src="../drag_drop/'.$know['path'].'" alt="Card image cap">
              </div>
            </div>
            ';
                  $cnt = 2;
                  //   echo $cnt;
              }
          }
      }

      $query = 'SELECT count(*) as total FROM `did_you_know` WHERE `lang` = 1';
      $query_stmt = $db_app->prepare($query);
      $query_stmt->execute();

      $result = $query_stmt->fetchAll();

      $countH = $result[0]['total'];

      // echo $countH;

      $countH = ceil($countH/3);

      // echo $countH;

      if ($countH <=3) {
          if ($countH == 1) {
              $paginationH = '';
          } else {
              $paginationH = '
            <li class="page-item disabled">
              <a class="page-link" href="./knowledgeHub.php?pageH=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
        ';
              for ($i = 1; $i<=$countH; $i++) {
                  if ($i == 1) {
                      $paginationH .= '
            <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH='.$i.'">'.$i.'</a></li>
            ';
                  } else {
                      $paginationH .= '
            <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH='.$i.'">'.$i.'</a></li>
            ';
                  }
              }
              $paginationH .= '
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?pageH=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
        ';
          }
      } else {
          $paginationH = '
          <li class="page-item disabled">
              <a class="page-link" href="./knowledgeHub.php?pageH=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
          </li>
          <li class="page-item active"><a class="page-link" href="./knowledgeHub.php?pageH=1">1</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=2">2</a></li>
          <li class="page-item"><a class="page-link" href="./knowledgeHub.php?pageH=3">3</a></li>
          <li class="page-item">
            <a class="page-link" href="./knowledgeHub.php?pageH=2" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>   
      ';
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

  <!-- animate wow -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

  <link rel="stylesheet" href="./css/knowledgeHub.css" />

  <title>Knowledge Hub</title>
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
            <li class="nav-item">
              <a class="nav-link section-name" href="./myMobileStory.html">My Mobile Story</a>
            </li>
            <li class="nav-item">
              <a class="nav-link section-name" href="./comics.php">Comics</a>
            </li>
            <li class="nav-item active">
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
      <div class="hr-black" style="width:90%; margin:0 auto;"></div>
    </div>


    <div class="container-fluid">
      <div class="container">
        <?php echo $html; ?>
      </div>
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

    
    <div class="container-fluid">
      <div class="container">
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

    <div class="container-fluid p-0 m-0 navVertical">
      <div class="row">
      <div class="custom-nav text-white">
          <ul>
            <span class="line"></span>
            <li>
              <a class="dot" onclick="gotoDiv(event, 0);">1</a>
              <span> <a onclick="gotoDiv(event, 0);"> Data Essentials </a></span>
            </li>
            <li>
              <a  class="dot" onclick="gotoDiv(event, 1);">2</a>
              <span><a onclick="gotoDiv(event, 1);">Data Opportunities </a></span>
            </li>
            <li>
              <a  class="dot" onclick="gotoDiv(event, 2);">3</a>
              <span><a onclick="gotoDiv(event, 2);">Data Risks </a></span>
            </li>
            <li>
              <a class="dot" onclick="gotoDiv(event, 3);" class="dot" >4</a>
              <span><a onclick="gotoDiv(event, 3);">Data Safety </a></span>
            </li>
            <li>
              <a class="dot" onclick="gotoDiv(event, 4);">5</a>
              <span><a onclick="gotoDiv(event, 4);">Misinformation</a></span>
            </li>
            <li>
              <a onclick="gotoDiv(event, 5);" class="dot" >6</a>
              <span><a onclick="gotoDiv(event, 5);">Cyber Laws and Rights</a></span>
            </li>
          </ul>
        </div>
      </div>
    </div>
        
    
    <div class="sticky edu1" id="edu1">

      <div class="container-fluid edu  wow slideInLeft">
        <div class="container">
          <div class="row text-white">
          <div class="col-md-2"></div>
            <div class="col-md-5 edu-text">
              <h1>
                Digital Essentials
              </h1>
              <br>
              <p>
                A beginners’ guide around the world of internet, this section covers the basics one must know, when they
                enter cyberspace. This includes internet etiquette, safety tips, internet banking and, primary tools and
                applications such as email, social media, passwords, accounts
              </p>
              <ul>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
              </ul>
            </div>
            <div class="col-md-5 edu-img text-center">
              <img src="./images/edu1.png" alt="edu2" width="80%">
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>


    <div class="sticky edu2" id="edu2">



      <div class="container-fluid edu">
        <div class="container">
          <div class="row text-white">
          <div class="col-md-2"></div>
            <div class="col-md-5 edu-img">
              <img src="./images/edu1.png" alt="edu1" width="80%">
            </div>
            <div class="col-md-5 edu-text">
              <h1>
                Digital Opportunities
              </h1>
              <br>
              <p>
                The internet has a lot to offer, and its offering is only increasing by the day. Here, in this section,
                we talk about all the benefits that the internet allows us, ranging from connectivity and easy banking;
                to self learning, welfare schemes and gainful employment.
              </p>
              <ul>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="sticky edu3" id="edu3">


      <div class="container-fluid edu">
        <div class="container">
          <div class="row text-white">
          <div class="col-md-2"></div>
            <div class="col-md-5 edu-text">
              <h1>
                Digital Risks
              </h1>
              <br>
              <p>
                Along with a host of benefits, the internet also has its cons, which is why it’s vital to monitor your
                activity and function with care while operating on the internet. Some of the risks discussed in the
                section include, hacking, trolling, bullying, doxxing, phishing, hate crimes, revenge porn and child
                pornography. The section also covers prevention & mitigation methods for each of these risks.
              </p>
              <ul>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
              </ul>
            </div>
            <div class="col-md-5 edu-img text-center">
              <img src="./images/edu1.png" alt="edu1" width="80%">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="sticky edu4" id="edu4">

      <div class="container-fluid edu">
        <div class="container">
          <div class="row text-white">
          <div class="col-md-2"></div>
            <div class="col-md-5 edu-img">
              <img src="./images/edu1.png" alt="edu1" width="80%">
            </div>
            <div class="col-md-5 edu-text">
              <h1>
                Digital Safety
              </h1>
              <br>
              <p>
                Since cyberspace is a public platform that allows some level of anonymity, it is always subject to
                information and identity concerns. Therefore, here we have a closer look at the privacy and safety
                issues linked with the internet, and how one can successfuly tackle them.
              </p>
              <ul>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="sticky edu5" id="edu5">

      <div class="container-fluid edu ">
        <div class="container">
          <div class="row text-white">
          <div class="col-md-2"></div>
            <div class="col-md-5 edu-text">
              <h1>
                Misinformation
              </h1>
              <br>
              <p>
                There is a flood of information on the internet, and while it has fast become the source of most news
                and facts, the information received need not always be accurate. This has been witnessed especially
                during the COVID pandemic. It’s essential to be aware of unreliable sources and educate yourself to not
                fall for fake forwards, misleading news, disinformation and misinformation. Here, we attempt to inform
                people about the same.
              </p>
              <ul>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
              </ul>
            </div>
            <div class="col-md-5 edu-img text-center">
              <img src="./images/edu1.png" alt="edu1" width="80%">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="sticky edu6" id="edu6">


      <div class="container-fluid edu ">
        <div class="container">
          <div class="row text-white">
            <div class="col-md-2"></div>
            <div class="col-md-5 edu-img ">
              <img src="./images/edu1.png" alt="edu1" width="80%">
            </div>
            <div class="col-md-5 edu-text">
              <h1>
                Cyber Laws and Rights
              </h1>
              <br>
              <p>
                Besides preventive and curative measures you can take on your own, to stay safe on the internet, there
                is also a long list of cyber laws that can help protect you. We discuss the practical use of these laws,
                to simplify understanding and build awareness around them.
              </p>
              <ul>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
                <li>
                  <a href="">External links</a>
                </li>
              </ul>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" type="text/javascript"></script>
  <script src="./js/knowledgeHub.js" type="text/javascript"></script>
</body>

</html>