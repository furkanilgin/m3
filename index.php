
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="ico/favicon.ico">

    <title>Template</title>
    <link href="fonts/font.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  
  <?php
	
	require_once("./admin/libs/Database.php");
	
	$db = Database::connect();
	$stmt = $db->query("SELECT text FROM anasayfa");
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$slogan = $row["text"];
  ?>

    <!-- Fixed navbar -->
    <div class="navbar" role="navigation">
      <div class="container">

        <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
            <li class="active"><a href="./index.php">ANASAYFA</a></li>
            <li><a class="separator">|</a></li>
            <li><a href="./about.php">HAKKIMIZDA</a></li>
            <li><a class="separator">|</a></li>
            <li><a href="./who.php">BİZ KİMİZ</a></li>
            <li><a class="separator">|</a></li>
            <li><a href="./project.php">PROJELER</a></li>
            <li><a class="separator">|</a></li>
            <li><a href="./contact.php">İLETİŞİM</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <!-- Begin page content -->
    <div class="container">
<div class="row" style="margin-left: 10%;">

        <div class="col-sm-3">
          <div class="sidebar-module sidebar-module-inset">
            <img src="logo.png" style="width: 70%;">
          </div>
        </div>
        <div class="col-sm-8 slogan" style="padding-top: 3%;">
			<?php echo $slogan; ?>
        </div>

       

      </div>
    </div>

    <div id="footer">
      <div class="container">
      <p><span class="ftitle"> Metreküp Tasarım Atölyesi İnş. San. Tic. Ltd. Şti.</span></br>
 Kozyatağı Bayar Cd. Yeniyol Sk. No :7/3 Kadıköy / İstanbul </br>
 T: +90 216 706 10 80 - 658 74 00 F: +90 216 658 77 06</br>
   E: info@metrekup.net</p>
      </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
