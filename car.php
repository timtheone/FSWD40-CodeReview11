<?php include('config.php'); 
    session_start();
?>
<?php include_once('partials/head.php'); ?>
<?php include_once('partials/navbar.php'); ?>
<?php 
    if( !isset($_SESSION['user']) ) {
        header("Location: index.php");
        exit;
       }
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM car 
        JOIN car_model on car_model.car_model_id = car.FK_car_model_id
        JOIN car_manufacturer on car_manufacturer.car_manufacturer_id = car_model.FK_manufacturer_id 
        JOIN office on office.office_id = car.FK_office_id
        WHERE licence_plate_number='$id'";
    
    $result = mysqli_query($conn, $sql);
    
    $car = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<style>
    html,body,.container-fluid  {
        height: 100%;
        margin: 0;
        padding: 0;
        background: linear-gradient(#fffbf4, #cc9941);   
    }
    .main-home {
        min-height:100%;
        position:relative;
        padding: 0px;
    }
    #map {
        height: 65%;
        top: -12.7%;
        padding-bottom: 60px;
    }
</style>
<div class="container-fluid main-home">
    <div class="container" style="padding: 30px 0 255px 0;">
        <div class="row">
            <div class="image col-lg-4">
                <img src="img/cars/<?php echo $car['img']?>" alt="Card image cap">
            </div>
            <div class="description col-lg-8">
                <p><strong>Make: </strong><?php echo $car["make"] ?></p>
                <p><strong>Model: </strong><?php echo $car["car_model_id"] ?></p>
                <p><strong>Location: </strong><?php echo $car["location"] ?></p>
                <p><strong>Horse Power: </strong><?php echo $car["horse_power"] ?>HP</p>
            </div>
        </div>
        
    </div>

    <div id="map"></div>
    <?php include('partials/footer.php'); ?>
</div>
    <script>
        var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
        let iconCar = "img/car_marker_small.png"
      var map;
      function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -34.397, lng: 150.644},
              zoom: 8
            });
        var geocoder = new google.maps.Geocoder();

        var address = "<?php echo $car['location'] ?>"
            geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                icon: iconCar,
                map: map,
                position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
            });
      }
      
            
        
      
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABAU7pAPLFEOzfisFVXXoxqqmQi20xppY&callback=initMap"
    async defer></script>

