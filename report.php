<?php include('config.php'); 
    session_start();
?>
<?php include_once('partials/head.php'); ?>
<?php include_once('partials/navbar.php'); ?>
<?php 
    ob_start();
    if( !isset($_SESSION['user']) ) {
     header("Location: index.php");
     exit;
    }

    //  Parse current user
    $res=mysqli_query($conn, "SELECT * FROM client WHERE `client_id`=".$_SESSION['user']);
    $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

    $sql = "SELECT * FROM office";

    // Next 4 queries selecting number of cars for a particular Office
    $sql1= "SELECT COUNT(*) FROM car
    JOIN office on car.FK_office_id = office.office_id
    WHERE office.name = 'New York Office 1'";

    $sql2= "SELECT COUNT(*) FROM car
    JOIN office on car.FK_office_id = office.office_id
    WHERE office.name = 'New York Office 2'";

    $sql3= "SELECT COUNT(*) FROM car
    JOIN office on car.FK_office_id = office.office_id
    WHERE office.name = 'Los Angeles Office 1'";

    $sql4= "SELECT COUNT(*) FROM car
    JOIN office on car.FK_office_id = office.office_id
    WHERE office.name = 'Los Angeles Office 2'";
    //  End of queries

    //  Next 4 blocks fetch the number of cars to an array from parsed sql queries, as well as storing this number in a new variables
    $res1 = mysqli_query($conn, $sql1);
    $count1 = mysqli_fetch_assoc($res1);
    foreach ($count1 as $key) {
        $count1 = ((int)$key);
    }
    
    $res2 = mysqli_query($conn, $sql2);
    $count2 = mysqli_fetch_assoc($res2);
    foreach ($count2 as $key) {
        $count2 = ((int)$key);
    }

    $res3 = mysqli_query($conn, $sql3);
    $count3 = mysqli_fetch_assoc($res3);
    foreach ($count3 as $key) {
        $count3 = ((int)$key);
    }

    $res4 = mysqli_query($conn, $sql4);
    $count4 = mysqli_fetch_assoc($res4);
    foreach ($count4 as $key) {
        $count4 = ((int)$key);
    }
    // end of blocks

    
    $countArray = [];
    array_push($countArray,$count1,$count2,$count3,$count4);

    $result = mysqli_query($conn, $sql);
    $offices = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
    ob_end_flush();
?>

<div class="container-fluid banner-office">
    <img src="img/report_test.png" alt="">
    <h1 class="blend-text">Report</h1>
</div>
<div class="container-fluid">
    <div class="row">
    <?php if ($userRow['admin_status']) { ?>
    <table class="table col-lg-4 offset-lg-7">
        <tr>
            <th>Name</th>
            <th class="text-right">Number of cars</th>
        </tr>
        <?php foreach ($offices as $key => $value) { 
            $item = $countArray[$key];
            ?>
        <tr>
            <td><?php echo $value['name']; ?></td>
            <td class="text-right"><?php echo $item ?></td>
        </tr>
        <?php } ?>
    </table>
    <? } else { ?>
    <p class="col-lg-4 offset-lg-7">You dont have the rights to see this.</p>
<?php } ?>
</div>
</div>

<?php include('partials/footer.php'); ?>