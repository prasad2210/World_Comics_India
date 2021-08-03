window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
    // this.setTimeout(function () {
      const navbar = this.document.querySelector(".navbar");
      navbar.className += " fixed-top";
      if (window.innerWidth < 991) {
        $(".nav-img").attr("width", "40");
        $(".nav-img").attr("height", "40");
      }
    //   calcHeight();
    // }, 500);
  });
  
  
let nav = document.querySelector("nav");

window.addEventListener("scroll", function () {
  if (window.innerWidth < 991) {
    $(".nav-img").attr("width", "40");
    $(".nav-img").attr("height", "40");
  } else {
    if (window.pageYOffset > 130) {
      // nav.classList.remove("navbar-dark");
      nav.classList.add("bg-dark");
      $(".nav-title-div").css("font-size", "150%");
      $(".nav-img").attr("width", "40");
      $(".nav-img").attr("height", "40");
    } else {
      nav.classList.remove("bg-dark");
      // nav.classList.add("navbar-dark");
      $(".nav-title-div").css("font-size", "200%");
      $(".nav-img").attr("width", "80");
      $(".nav-img").attr("height", "80");
      // $(".nav-title-div").css("visibility", "hidden");
    }
  }
});



let map;
let data;
// {
    
//     // {city: "", lat: '', lng: ''}
//     0: {city: "sangli", lat:'16.854115042550866', lng: '74.58032294402464', info: {name: "prasad", img: "./post2.jpg"}},
//     1: {city: "mumbai", lat:'19.076357503864585', lng: '72.87842835389687', info: {name: "ketan", img: "./post3.jpg"}},
//     2: {city: "Delhi", lat: '28.692272512705106', lng: '77.21841866598564', info: {name: "prachi", img: "./post2.jpg"}},
//     3: {city: "chennai", lat: '13.10027857289766', lng: '80.25940359357647', info: {name: "sakshi", img: "./post3.jpg"}},
//     4: {city: "Kolkata", lat: '22.405538324883643', lng: '88.2697260516048', info: {name: "dhruv", img: "./post2.jpg"}}

// };

let form_data = {
  'submit': 1
}
let dataMap = '';



function initMap() {

  
    $.ajax({
      url: "./js/mapData.php",
      method: "POST",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      success: function (dataMap) {
        // console.log(dataMap);
        // console.log(typeof(dataMap));
        data = JSON.parse(dataMap);
        
        myLatLng = { lat: 16.854115042550866, lng: 74.58032294402464 };
        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 5,
          gestureHandling: "cooperative",
          center: { lat: 23.215810381187584, lng: 77.39062126196221 },
        });
    
        for(key in data){
            let myLatLng = {};
            myLatLng.lat = parseFloat(data[key].lat);
            myLatLng.lng = parseFloat(data[key].lng);
    
            let city = data[key].city;
            addMarker(myLatLng, city, data[key].html);
    
        }

      }
    });


    
    

  }

  function addMarker(myLatLng, city, info){

    // const contentString = '<div style="width:50px; height:50px"> name = '+ info.name+' </div> <img src = '+ info.img+' width = "50%" height="50%" alt = "img1" ></div>';
    let contentString = '"'+info+'"';

    // $('#try').html(dataMap);
    console.log(dataMap);

    const infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 450,
      });
    const marker = new google.maps.Marker({
        position: myLatLng,
        map,
        title: city,
    });

    marker.addListener("click", () => {
        infowindow.open(map, marker);
    });

    infowindow.addListener('closeclick', ()=>{
      map.setCenter( {lat: 23.215810381187584, lng: 77.39062126196221 });
    });

  }
