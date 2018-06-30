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
    $res=mysqli_query($conn, "SELECT * FROM client WHERE `client_id`=".$_SESSION['user']);
    $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

    $sql = "SELECT * FROM office";
    $result = mysqli_query($conn, $sql);
    $offices = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
    ob_end_flush();
?>

<div class="container-fluid banner-office">
    <img src="img/office1.png" alt="">
    <h1 class="blend-text">Our offices</h1>
</div>
<div class="container-fluid">
<div class="row">
    <table class="table col-lg-4 offset-lg-7">
        <tr>
            <th>Name</th>
            <th class="text-right">Location</th>
        </tr>
        <?php foreach ($offices as $key => $value) { ?>
        <tr>
            <td><?php echo $value['name']; ?></td>
            <td class="text-right"><?php echo $value['location']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>
</div>
<?php include('partials/footer.php'); ?>