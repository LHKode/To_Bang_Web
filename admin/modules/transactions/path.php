<?php 
    require_once __DIR__ .'/../../autoload.php';
    $id = $_GET['id'];

    $id = intval($id);

    $sql = "SELECT * FROM tbl_donhang  
        INNER JOIN tbl_khachhang ON tbl_khachhang.id_khachhang = tbl_donhang.khachhang_id
    WHERE   id_donhang =  ".$id;
    $address = DB::fetchsql($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Simple Map</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="/public/admin/css/bootstrap.min.css">
        <style>
            /* Always set the map height explicitly to define the size of the div
            * element that contains the map. */
            #map {
            height: 600px;
            width: 100%;
            margin:auto;
            }
            /* Optional: Makes the sample page fill the window. */
            html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <h1>CHI TIẾT TUYẾN ĐƯỜNG </h1>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="map"></div>
            </div>
        </div>
        

        <script src="/public/admin/js/jquery.min.js"></script>
        <script src="/public/admin/js/bootstrap.min.js"></script>


        <script>
            var map;
            var start = '76 man thiện , tăng nhơn phú quận 9 thành phố hồ chí minh';
            var end = "<?php echo $address[0]['diachi']; ?>";
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 10.762622, lng: 106.660172},
                    zoom: 8,
                });

                  // Instantiate a directions service.
                var directionsService = new google.maps.DirectionsService;

                directionsService.route({
                    origin : start,
                    destination: end,
                    travelMode: 'DRIVING',
                }, function(result, status) {

                    if(status == 'OK') {
                         var directionsDisplay = new google.maps.DirectionsRenderer({
                            directions:result,
                            map:map
                         });
                    } else {
                        console.log(status);
                    }

                });
            }
        </script>
    
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCn0vYakbILmk8eTK9YKoBOhXtXv8SIKts&callback=initMap"
  type="text/javascript"></script>
  
  <!-- AIzaSyD_fpCVLvQEjlbpTlV7itt0S1fYIOjNEGI -->
    </body>
</html>