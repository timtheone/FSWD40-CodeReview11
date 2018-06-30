<?php include('config.php'); ?>
<?php include('auth/sign_up.php'); ?>
<?php include('auth/sign_in.php'); ?>
<?php include_once('partials/head.php'); ?>
<?php include_once('partials/navbar.php'); ?>


<div class="jumbotron jumbotron-fluid banner">
    <div class="container">
        <div class="row show-text">
            <div class="header-text">
                <h1 class="display-4">CAR RENTAL</h1>
                <p class="lead">Not your average rental.</p>
                <h5><strong>Discover the best Car rental service in country</strong></h5> 
            </div>
        </div>
        <!-- If user not logged in, show sign-in and sign-up forms  @start_of_logic1-->
        <?php if(isset($_SESSION['user'])=="") { ?>
        <div id="flipping" class="col-lg-12">
            <div class="login col-lg-4 col-md-5 col-sm-6 col-9 offset-1 offset-lg-0 offset-md-0 offset-sm-0 front">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <h4 class="text-center">Sign in</h4>
                    <?php if ( isset($errMSGG) ) { ?>
                        <div class="alert alert-<?php echo $errTyp ?>"><?php echo $errMSGG; ?></div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="email_sign_in">email</label>
                        <input type="email" class="form-control" name="email_sign_in" placeholder="john@doe.com">            
                    </div>
                    <div class="form-group">
                        <label for="pass_sign_in">password</label>
                        <input type="password" class="form-control" name="pass_sign_in" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-light" name="signin-submit">Sign in</button>
                    <p id="sign-up">Dont have an account yet? click <strong><span id="sign-up-button">here</span></strong> to join us!</p>
                </form>
            </div>

            <!-- Register form -->
            <div class="login col-lg-4 col-md-5 col-sm-6 col-9 offset-2 offset-lg-0 offset-md-0 offset-sm-0 back">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <h4 class="text-center" style="padding-bottom: 25px;">Sign up</h4>

                    <?php if ( isset($errMSG) ) { ?>
                        <div class="alert alert-<?php echo $errTyp ?>"><?php echo $errMSG; ?></div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="first_name_sign_up">first name</label>
                        <input type="text" class="form-control" name="first_name_sign_up" placeholder="John">
                        <span class="text-danger"><?php echo $first_name_sign_upError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="last_name_sign_up">last name</label>
                        <input type="text" class="form-control" name="last_name_sign_up" placeholder="Doe">
                        <span class="text-danger"><?php echo $last_name_sign_upError; ?></span>            
                    </div>
                    <div class="form-group">
                        <label for="telephone_sign_up">Telephone number </label>
                        <input type="text" class="form-control" name="telephone_sign_up" placeholder="312312412">
                        <span class="text-danger"><?php echo $telephoneError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="address_sign_up">Address</label>
                        <input type="text" class="form-control" name="address_sign_up" placeholder="Avenue 1, NYC">
                        <span class="text-danger"><?php echo $adressError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email_sign_up">email</label>
                        <input type="email" class="form-control" name="email_sign_up" placeholder="john@doe.com">
                        <span class="text-danger"><?php echo $email_sign_upError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="pass_sign_up">password</label>
                        <input type="password" class="form-control" name="pass_sign_up" placeholder="Password">
                        <span class="text-danger"><?php echo $pass_sign_upError; ?></span>
                    </div>
                    <button type="submit" class="btn btn-light" name="signup-submit">Sign up</button>
                    <p id="sign-up">Already have an account? click <strong><span id="sign-in-button">here</span></strong> to Sign in!</p>
                </form>
            </div>
        </div>
        <!-- If user not logged in, show sign-in and sign-up forms  @end_of_logic1-->
        <?php } ?>
        <!-- If user logged in, show button that redirects to home page/-->
        <?php if(isset($_SESSION['user'])!="") { ?>
            <div style="margin-left: 15px;" class="buttonDepth"><a id="explore" href="<?php echo "home.php" ; ?>">Rent a car</a></div>
        <?php } ?>
    </div>
    <?php include('partials/footer.php'); ?>
</div>




<script>
    $(function($) {
    $("#flipping").flip({
        trigger: 'manual'
    });
  
    $("#sign-up-button").click(function(){
      $("#flipping").flip(true);
    })
  
    $("#sign-in-button").click(function(){
      $("#flipping").flip(false);
    })

    $(".buttonDepth").hover(function(){
        $(this).toggleClass("is-active");
    });          
  });
</script>