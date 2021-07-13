<?php

// if(isset($_POST['submit']) && $_POST['submit'] !=''){
  include_once '../_connect_dbs.php';

    $query = 'SELECT * FROM `map`';
    $query_stmt = $db_app->prepare($query);
    $query_stmt->execute();
    if($query_stmt->rowCount() > 0){
        $result = $query_stmt->fetchALl();

        foreach($result as $cities){
            $city = $cities['city'];
            $lat = $cities['lat'];
            $lng = $cities['lng'];
            $city_id = $cities['id'];


            $query = 'SELECT * FROM `map_story` WHERE `city_id` = :city_id ORDER BY `id` DESC';
            $query_stmt = $db_app->prepare($query);
            $query_stmt->execute(['city_id' => $city_id]);

            if($query_stmt->rowCount() > 0){
                $result = $query_stmt->fetchAll();

                $html = '
                        
                <div class="mapDiv text-center border" style="width: 50%; margin: 0 auto;">
                <h3 class="card-title p-2">'.$city.'</h3>

                <div id="city" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                ';

                $cnt = 1;
                foreach($result as $img){
                    $name = $img['name'];
                    $path = './'.$img['path'];

                    // echo $name;

                    if($cnt == 1){
                        $html .= '
                            <div class="carousel-item active">
                                <div class="card" style="padding: 0 12%;">
                                    <img class="card-img-top" src="'.$path.'" alt="Card image cap">
                                    <div class="card-body">
                                    <h5 class="card-title">By '.$name.'</h5>
                                    </div>
                                </div>
                            </div>
                        ';
                        $cnt++;
                    }
                    else{
                        $html .= '
                            <div class="carousel-item ">
                                <div class="card" style="padding: 0 12%;">
                                    <img class="card-img-top" src="'.$path.'" alt="Card image cap">
                                    <div class="card-body">
                                    <h5 class="card-title">By '.$name.'</h5>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                }

                $html .= '
                    </div>
                    <a class="carousel-control-prev" href="#city" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#city" role="button" data-slide="next">
                        <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                ';
                $object[] = [
                    "city" => $city,
                    "lat" => $lat,
                    "lng" =>$lng,
                    "html" => $html
                ];
                
        // echo '<pre>';
        // print_r($object);
                // array_push($obj, array($object));
            }
            
        }
        echo json_encode($object);
    }
// }


    // $html = '
        
    //     <div class="mapDiv text-center border" style="width: 50%; margin: 0 auto;">
    //     <h3 class="card-title p-2">Sangli</h3>

    //     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    //         <div class="carousel-inner">

    //             <div class="carousel-item active">
    //                 <div class="card" style="padding: 0 12%;">
    //                     <img class="card-img-top" src="./images/comic1.jpg" alt="Card image cap">
    //                     <div class="card-body">
    //                     <h5 class="card-title">By prasad Mandave</h5>
    //                     </div>
    //                 </div>
    //             </div>

    //             <div class="carousel-item">
    //                 <div class="card " style="padding: 0 12%;">
    //                     <img class="card-img-top" src="./images/comic2.jpg" alt="Card image cap">
    //                     <div class="card-body">
    //                     <h5 class="card-title">By prasad Mandave</h5>
    //                     </div>
    //                 </div>
    //             </div>

    //             <div class="carousel-item">
    //                 <div class="card " style="padding: 0 12%;">
    //                     <img class="card-img-top" src="./images/comic3.jpg" alt="Card image cap">
    //                     <div class="card-body">
    //                     <h5 class="card-title">By prasad Mandave</h5>
    //                     </div>
    //                 </div>
    //             </div>

    //         </div>
    //         <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    //             <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
    //             <span class="sr-only">Previous</span>
    //         </a>
    //         <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    //             <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
    //             <span class="sr-only">Next</span>
    //         </a>
    //     </div>
    // ';

    // echo $html;
?>
