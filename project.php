
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
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />

    <link href="css/custom.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>
  

    <!-- Fixed navbar -->
    <div class="navbar" role="navigation">
      <div class="container">

        <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav">
            <li><a href="./index.php">ANASAYFA</a></li>
            <li><a>|</a></li>
            <li><a href="./about.php">HAKKIMIZDA</a></li>
            <li><a>|</a></li>
            <li><a href="./who.php">BİZ KİMİZ</a></li>
            <li><a>|</a></li>
            <li class="active"><a href="./project.php">PROJELER</a></li>
            <li><a>|</a></li>
            <li><a href="./contact.htm">İLETİŞİM</a></li>

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
        <div class="col-sm-9" >
	<h2>PROJELER</h2>
<div id="content">
<?php

	require_once("./admin/libs/Database.php");
	
	$db = Database::connect();
	$stmt = $db->query("SELECT * FROM proje");
	$projeler = $stmt->fetchAll(PDO::FETCH_ASSOC);

	for($i=0;$i<count($projeler);$i++){
		if($i%4 == 0){
			echo "<p>";
		}
		echo '<a class="fancybox" href="admin/'.$projeler[$i]["fotograf"].'" data-fancybox-group="gallery'.$i.'"><img src="admin/'.$projeler[$i]["fotograf"].'" height="150" width="150" /></a>';
		$stmt = $db->query("SELECT * FROM proje_fotograflari WHERE proje_id='".$projeler[$i]["id"]."'");
		$proje_fotograflari = $stmt->fetchAll(PDO::FETCH_ASSOC);
		for($j=0;$j<count($proje_fotograflari);$j++){
			echo '<a class="fancybox" style="display:none;" href="admin/'.$proje_fotograflari[$j]["fotograf"].'" data-fancybox-group="gallery'.$i.'"><img src="admin/'.$proje_fotograflari[$j]["fotograf"].'" alt="" /></a>';
		}
		if($i%4 == 4){
			echo "</p>";
		}
	}
	
?>

<p>
 	<a class="fancybox" href="gallery/1_b.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="gallery/1_s.jpg" alt="" style="display:none;"/></a>

		<a class="fancybox" href="gallery/2_b.jpg" data-fancybox-group="gallery" title="Etiam quis mi eu elit temp"><img src="gallery/2_s.jpg" alt="" style="display:none;" /></a>

		<a class="fancybox" href="gallery/3_b.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="gallery/3_s.jpg" alt="" style="display:none;" /></a>

		<a class="fancybox" href="gallery/4_b.jpg" data-fancybox-group="gallery" title="Sed vel sapien vel sem uno"><img src="gallery/4_s.jpg" alt="" style="display:none;" /></a>
</p>
</div>
        </div>

       

      </div>
    </div>

    <div id="footer">
      <div class="container">
      <p><strong>Metreküp Tasarım Atölyesi İnş. San. Tic. Ltd. Şti.</strong></br>
 Kozyatağı Bayar Cd. Yeniyol Sk. No :7/3 Kadıköy / İstanbul </br>
 T: +90 216 706 10 80 - 658 74 00 F: +90 216 658 77 06</br>
   E: info@metrekup.net</p>
      </div>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/jquery.fancybox.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

	



		});
	</script>
  </body>
</html>
