
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
  <form method="post" action="">
  <?php
  
function mail_yolla($adsoyad, $kimden, $kime, $konu, $mesaj)
{
    $assa="\r\n";
    $salla=md5(time());
    $headers .= 'From: '.$adsoyad.'<'.$kime.'>'.$assa;
    $headers .= 'Reply-To: <'.$kimden.'>'.$assa;
    $headers .= 'Return-Path: <'.$kimden.'>'.$assa;
    $headers .= "Message-ID: <".$now." TheSystem@".$_SERVER['SERVER_NAME'].">".$assa;
    $headers .= "X-Mailer: PHP v".phpversion().$assa;
    $headers .= 'MIME-Version: 1.0'.$assa;
    $headers .= "Content-Type: multipart/related; boundary=\"".$salla."\"".$assa;
    $msg = "";      
    $msg .= strip_tags(str_replace("<br>", "\n", $mesaj)).$assa.$assa;
    $msg .= "--".$salla.$assa;
    $msg .= "Content-Type: text/html; charset=utf-8".$assa;
    $msg .= "Content-Transfer-Encoding: 8bit".$assa;
    $msg .= $mesaj.$assa.$assa;
    $msg .= "--".$salla."--".$assa.$assa;
    ini_set(sendmail_from,$kime);
    if(mail($kime, $konu, $msg, $headers)){
        $sonuc = true;
    }
    else $sonuc = false;
    ini_restore(sendmail_from);
    if($sonuc == true) return "ok";
}

if(isset($_POST["send"])){
	$isim = htmlspecialchars($_POST["isim"]);
	$email = htmlspecialchars($_POST["email"]);
	$mesaj = htmlspecialchars($_POST["mesaj"]);
	
	$mesaj = '

    <table cellspacing="0" cellpadding="0">
      <tr height="20">
        <td width="130"><b>İsim</b></td>
        <td width="20">:</td>
        <td width="200"> '.$isim.'</td>
      </tr>
      <tr height="20">
        <td><b>Email</b></td>
        <td width="20">:</td>
        <td>'.$email.'</td>
      </tr>
      <tr height="20">
        <td><b>Mesaj</b></td>
        <td width="20">:</td>
        <td>'.$mesaj.'</td>
      </tr>
    </table>

    ';

    if(mail_yolla("Metreküp", $email, "furkanilgin@gmail.com", "İletişim Formu", $mesaj)){ 
        echo "<script>alert('Mail Başarıyla Gönderildi');</script>";
    }
    else {
        echo "<script>alert('Mail Gönderimi Başarısız!');</script>";
    }
}

?>

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
            <li><a href="./project.php">PROJELER</a></li>
            <li><a>|</a></li>
            <li class="active"><a href="./contact.php">İLETİŞİM</a></li>

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
	<h2>İLETİŞİM</h2>
<div id="content">
Metreküp Tasarım Atölyesi İnş. San. Tic. Ltd. Şti.</br>
Kozyatağı Bayar Cd. Yeniyol Sk. No :7/3 Kadıköy / İstanbul</br> 
<strong>T:</strong> +90 216 706 10 80 - 658 74 00</br> 
<strong>F:</strong> +90 216 658 77 06</br> 
<strong>E:</strong> info@metrekup.net



<div class="row" style="margin-top:20px;">
 <div class="col-md-6 contact-form">
<form class="form-horizontal" role="form">
  <div class="form-group">
<div class="col-sm-12">
 <span class="label">İsim</span>
    
<input name="isim" type="text" class="form-control" >
    </div>
  </div>
  <div class="form-group">
    
    <div class="col-sm-12">
<span class="label">Email</span>
<input type="text" name="email" class="form-control">
    </div>
  </div>

  <div class="form-group">
   
    <div class="col-sm-12">
<span class="label">Mesaj</span>
    <textarea name="mesaj" class="form-control" rows="3"></textarea>
<input type="submit" id="send" name="send" class="btn btn-default cform" value="Gönder" />
    </div>
  </div>
</form>

</div>
  <div class="col-md-6"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3012.299143784266!2d29.095019999999998!3d40.97493!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDU4JzI5LjgiTiAyOcKwMDUnNDIuMSJF!5e0!3m2!1sen!2s!4v1393278810786" width="340px" height="245px" frameborder="0" style="border:0"></iframe></div>
</div>


</div>
        </div>

       

      </div>
    </div>

    <div id="footer">
      <div class="container">
       <p><strong> Metreküp Tasarım Atölyesi İnş. San. Tic. Ltd. Şti.</strong></br>
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
	</form>
  </body>
</html>
