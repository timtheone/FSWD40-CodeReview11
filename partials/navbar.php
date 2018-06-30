

<nav class="navbar navbar-expand-lg navbar-light navbar-beige">
  <a class="navbar-brand left-navbar-items landing" href="<?php echo "index.php" ; ?>">CAR RENTAL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <?php if(isset($_SESSION['user'])!="") { ?>
      <?php 
        $res=mysqli_query($conn, "SELECT * FROM client WHERE `client_id`=".$_SESSION['user']);
        $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
      ?>
      <a class="nav-item nav-link" href="<?php echo "home.php" ; ?>">Cars</a>
      <a class="nav-item nav-link" href="<?php echo "office_list.php" ; ?>">Offices</a>
      <a class="nav-item nav-link" href="auth/logout.php?logout">Sign out</a>
      <?php if ($userRow['admin_status']) { ?>
      <a class="nav-item nav-link" href="<?php echo "report.php" ?>">Reports</a> 
      <?php } ?>
    <?php } ?>
    </div>
  </div>
</nav>