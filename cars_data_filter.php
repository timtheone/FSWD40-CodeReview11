<?php
include('config.php');
$option = $_POST['option'];

$sql = "SELECT * FROM car 
        JOIN car_model on car_model.car_model_id = car.FK_car_model_id
        JOIN car_manufacturer on car_manufacturer.car_manufacturer_id = car_model.FK_manufacturer_id 
        JOIN office on office.office_id = car.FK_office_id
        WHERE office.name = '$option'";
$sql2 = "SELECT COUNT(licence_plate_number) FROM car";
$result2 = mysqli_query($conn, $sql2);
$array = mysqli_fetch_assoc($result2);
foreach ($array as $key) {
    $countCar = ((int)$key);
}

$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="custom-card card car-img-div shadow p-3 mb-5 bg-white rounded col-lg-3 col-8 col-sm-8 col-md-5 offset-2 offset-lg-1 offset-md-1 offset-sm-2">
                <img src="img/cars/<?php echo $row['img']?>" alt="Card image cap">
                <div class="car-text shadow p-3 mb-5 bg-white rounded">
                    <div class="row">
                        <p class="col-lg-6"><?php echo  $row['make']." ".$row['FK_car_model_id'] ?></p>
                        <p class="offset-lg-1 col-lg-5"><?php echo $row['rental_price'] ?> <i class="fas fa-euro-sign"></i>/day</p>
                    </div>
                    <div class="row">
                        <p class="col-lg-6"><?php echo  $row['name'] ?></p>
                    </div>
                    <div class="row">
                        <a href="car.php?id=<?php echo $row["licence_plate_number"]?>" class="purple-btn offset-lg-1 col-lg-10 offset-md-1 col-md-10 offset-sm-1 col-sm-10 offset-1 col-10 text-center">Choose this car</a>
                    </div>
                </div>
            </div>
<?php }
} else {
    echo "There are no cars";
}
?>
<script>
    $(function($) {
        $(".purple-btn").hover(function(){
            $(this).toggleClass("is-active");
        });       
  });
</script>