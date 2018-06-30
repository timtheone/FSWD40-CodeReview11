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
    ob_end_flush();

    if ($userRow['admin_status']) {

    }

    $sql = "SELECT * FROM office";
    $result = mysqli_query($conn,$sql);
    $offices = mysqli_fetch_all($result, MYSQLI_ASSOC);
    

?>
<div class="container-fluid main-home">
    <div class="container-fluid banner-home">
        <img src="img/bus.png" alt="">
        <h1 class="blend-text">Rent your Car now</h1>
    </div>
    <div class="row" style="margin-top: 100px;">
        <div class="col-lg-2 offset-lg-8 col-md-3 offset-md-8 col-sm-3 offset-sm-8 col-6 offset-3">
            <select class="form-control" style="padding-bottom: 150px;" id="exampleFormControlSelect1">
                <option>All offices</option>
                <?php foreach ($offices as $key => $value) { ?>
                    <option><?php echo $value['name']?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="custom-wrapper" style="padding-bottom: 150px;">
        <div class="row" id="test">
            <div class="lds-dual-ring offset-lg-5 col-lg-2 offset-5 col-1"></div>
        </div>
        <div class="row">
            <button class="btn-warning offset-lg-5 col-lg-2" id="loadcarsbtn">Load more cars</button>
        </div>
    </div>
    <?php include('partials/footer.php'); ?>
</div>
<script>
    $(function($){
        let carsCount = 6;
        $('#test').fadeOut('slow', ()=>{
            $('#test').load('cars_data.php', {
                newCarsCount: carsCount
            }, ()=>{
                $('#test').fadeIn('slow');
            })
        })
        $('#loadcarsbtn').click(()=>{
            carsCount = carsCount + 6;
            $('#test').fadeOut('slow', ()=>{
                $('#test').load('cars_data.php', {
                    newCarsCount: carsCount
                }, ()=>{
                    $('#test').fadeIn('slow');
                })
            })
        })

        $('select').on('change', ()=>{
            let option = $('select').val()
            if (option == "All offices") {
                $('#test').fadeOut('slow', ()=>{
                    $('#test').load('cars_data.php', {
                        newCarsCount: carsCount
                    }, ()=>{
                        $('#test').fadeIn('slow');
                    })
                })
            } else {
                $('#test').fadeOut('slow', ()=>{
                    $('#test').load('cars_data_filter.php', {
                    option: option
                    }, ()=> {
                        $('#test').fadeIn('slow');
                    })
                })
            }
        })
    })
</script>
