<?php
session_start();
// include("includes/checklogin.php");
// check_login();

	
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="dashboard.css">
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>&& $_SESSION["loggedin"] == true
        <![endif]-->
<?php if (isset($_SESSION["loggedin"])): ?>
        <main class="container-fluid">
        <header class="nav-header">
                <span><a href="#">Heracles</a></span>
                <div class="summary" >
                        <div class="networth"  >
                            <p>Your Net worth</p>
                            <span id="_networth">00.00</span>
                        </div>
                        <div class="assets">
                            <p>Your Assets</p>
                            <span id="assetSum">00.00</span>
                        </div>
                        <div class="liability">
                            <p>Your Liability</p>
                            <span id="liabilitySum">- 00.00</span>
                        </div>
                </div>
                <span><a href="#">Username</a></span>
        </header>

            <div class="dashboard-contain">
                <section class="nav-left">
                    <div class="nav-links">
                        <a href="<?php echo $_SERVER["PHP_SELF"]?>"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337224/home-icon-silhouette_vzxxtu.svg" alt="home" width="30" height="30"></span>Home</a>
                        <a href="settings.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/settings_ffgo0r.svg" alt="home" width="30" height="30"></span>Settings</a>
                        <a href="includes/logout.inc.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/logout_jimglg.svg" alt="home" width="30" height="30"></span>Log out</a>
                    </div>
                </section>
                <section class="dashboard-header">
                    <div class="header">
                    <?php
                 if (isset($_GET["error"])) {
                    if ($_GET['error']=='Logged_In_successfully') {
                         echo '<center><h1> Successfully LoggedIn</h1><center>';
                        }else{
                         echo '<center><h1> You are already LoggedIn</h1><center>';

                        }  
                     }
                    ?>
                        <span>
                            <p>
                            <img src="https://res.cloudinary.com/benjee/image/upload/v1569337224/home-icon-silhouette_vzxxtu.svg" alt="home" width="30" height="30">
                            Home
                            </p>
                        </span>
                        <span>Welcome,<?php echo $_SESSION['name']?></span>

                    </div>
                    <!-- <div class="summary">
                            <div class="networth">
                                <p>Your Net worth</p>
                                <span>00.00</span>
                            </div>
                            <div class="assets">
                                <p>Your Assets</p>
                                <span id="assetSum">00.00</span>
                            </div>
                            <div class="liability">
                                <p>Your Liability</p>
                                <span id="liabilitySum">- 00.00</span>
                            </div>
                        </div> -->
                        <div class="dashboard-content">
                                <div class="calculate">
                                    <div>
                                        <h5 class="assets-header">Assets</h5>
                                        <span class="currency_square">
                                        </span>
                                        <div class="wrapper">
                                            <div class="cash">
                                                <p>Cash</p>
                                                <label for="checking account">Checking Account</label>
                                                 <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="checking account" placeholder="N 0.00">
                                                <label for="savings account">Savings Account</label>
                                                 <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="savings account" placeholder="N 0.00">
                                                <label for="text">Savings Bonds</label>
                                                 <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="savings bonds" placeholder="N 0.00">
                                                <label for="cd's">CDs</label>
                                                 <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="cd's" placeholder="N 0.00">
                                                <label for="other">Other</label>
                                                 <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="other" placeholder="N 0.00">
                                            </div>
            
                                        <div class="cash">
                                            <p>Property</p>
                                            
                                            <label for="cars">Automobiles</label>
                                             <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="cars" placeholder="N 0.00">

                                            <label for="savings bonds">House Furnishing</label>
                                             <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="savings bonds" placeholder="N 0.00">
                                            <label for="jewellery">Jewellery</label>
                                             <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="cd's" placeholder="N 0.00">
                                            <label for="other">Other</label>
                                             <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="other" placeholder="N 0.00">
                                        </div>
                                        
                                        <div class="cash">
                                            <p>Insurance</p>
                                            <label for="insurance">Insurance Value</label>
                                             <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="checking account" placeholder="N 0.00">
                                            <p>Market value of Home(s)</p>
                                            <label for="primary residence">Primary Residence</label>
                                             <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="savings account" placeholder="N 0.00">
                                            <label for="rental">Rental/Vacation properties</label>
                                             <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="savings bonds" placeholder="N 0.00">
                                            <p>Retirement Savings</p>
                                            <label for="pensions">Pensions</label>
                                             <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="pensions" placeholder="N 0.00">
                                        </div>
        
                                        <div class="cash">
                                            <p>Other Investments</p>
                                            <label for="stocks">Stocks</label>
                                             <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="checking account" placeholder="N 0.00">
                                            <label for="mutual funds">Mutual Funds</label>
                                             <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="savings account" placeholder="N 0.00">
                                            <label for="others">Others</label>
                                             <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="savings bonds" placeholder="N 0.00">
                                            <label for="value of business" id="business-value">Value of Business you own</label>
                                             <input type = 'number' class = 'asset' onkeyup = 'inputValidate() ; displayNetworth()'() displayNetworth()   name="cd's" placeholder="N 0.00">
                                        </div>
                                    </div>
                            </div>
                </section>  
        </main>
        <section class="dashboard-header">
            <div>
                <h5 class="assets-header">Liability</h5>
            </div>
            <div class="row">
                <div class="col-lg-8 col-sm-12 sub-heading">
                    Balance due on debt
                </div>
                <div class="col-lg-4 col-sm-12 sub-heading">
                    Bills due
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <label for="student loan">Student loan</label><br>
                    <input type = 'number' class ='_liability' onkeyup = 'liabilityValidate() ; displayNetworth()' id="student loan" placeholder="N 0.00">
                </div>
                <div class="col-lg-4 col-sm-12">
                    <label for="home equity loan">Home equity loans</label><br>
                    <input type = 'number'class =' _liability' onkeyup = 'liabilityValidate() ; displayNetworth()'  id="home equity loan" placeholder="N 0.00">
                </div>
                <div class="col-lg-4 col-sm-12">
                    <label for="house hold utility">House hold utility</label><br>
                    <input type = 'number'class =' _liability' onkeyup = 'liabilityValidate() ; displayNetworth()' id="house hold utility" placeholder="N 0.00">
                </div>
                <div class="col-lg-4 col-sm-12">
                    <label for="mortage">Mortages</label><br>
                    <input type = 'number'class =' _liability' onkeyup = 'liabilityValidate() ; displayNetworth()' id="mortage" placeholder="N 0.00">
                </div>
                <div class="col-lg-4 col-sm-12">
                    <label for="auto loans">Auto loans</label><br>
                    <input type = 'number'class =' _liability' onkeyup = 'liabilityValidate() ; displayNetworth()' id="auto loans" placeholder="N 0.00">
                </div>
                <div class="col-lg-4 col-sm-12">
                    <label for="taxes due">Taxes due</label><br>
                    <input type = 'number'class =' _liability' onkeyup = 'liabilityValidate() ; displayNetworth()' id="taxes due" placeholder="N 0.00">
                </div>
                <div class="col-lg-4 col-sm-12">
                    <label for="other loans">Other loans</label><br>
                    <input type = 'number'class =' _liability' onkeyup = 'liabilityValidate() ; displayNetworth()' id="other loans" placeholder="N 0.00">
                </div>
            </div>
            </div>
            <div class="reset" onclick="_reset()"><button><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337224/turn-on_yb5bkw.svg" alt="home" width="30" height="30"></span>reset</button></div>
            </div>
        </section>
        </main>
<?php else:?>
<h1>You are not logged in, Please <a href="signin.php">signin</a> to Access this page</h1>
        
        <?php endif;?>
        <!-- <script src="" async defer></script> -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/networth.js"></script>

    </body>
</html>



