<?php
session_start();
error_reporting(0);
require_once 'phpqrcode/qrlib.php';
include('includes/config.php');
if(isset($_POST['submit2']))
{
    $pid = intval($_GET['pkgid']);
    $useremail = $_SESSION['login'];
    $num = $_POST['num'];
    $name = $_SESSION['name'];
    $go = $_SESSION['go'];
    $come = $_SESSION['come'];
    $price = $_SESSION['price'];
    $status = 0;
    $sum1 = 0;
    $hool = 0;
    $buudal = 0;
    $vzwer = 0;
        $sum1 = $_POST["hool"] +   $_POST["buudal"] +   $_POST["vzwer"] ;    
        if(isset($_POST['hool'])){
            $hool = 1;
        }
        if(isset($_POST['buudal'])){
            $buudal = 1;
        }
        if(isset($_POST['vzwer'])){
            $vzwer = 1;
        }
        $sum = ($num * $price)+ $sum1;
    
    $sql = "INSERT INTO tblbooking(PackageId, UserName, UserEmail, Comment, price,hool,buudal,vzwer, go, come, status) 
            VALUES(:pid, :name, :useremail, :num, :price,:hool,:buudal,:vzwer, :go, :come, :status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pid', $pid, PDO::PARAM_STR);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':num', $num, PDO::PARAM_STR);
    $query->bindParam(':price', $sum, PDO::PARAM_INT);
    $query->bindParam(':hool', $hool, PDO::PARAM_INT);
    $query->bindParam(':buudal', $buudal, PDO::PARAM_INT);
    $query->bindParam(':vzwer', $vzwer, PDO::PARAM_INT);
    $query->bindParam(':go', $go, PDO::PARAM_STR);
    $query->bindParam(':come', $come, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

    if($lastInsertId)
    {
        $msg = "Бүртгэл амжилттай. Төлбөрөө төлнө үү.";
    }
    else 
    {
        $error = "Алдаа";
    }

    
    $sql2 = "UPDATE tbltourpackages SET num = num + :num WHERE PackageId = :pid";
    $query2 = $dbh->prepare($sql2);
    $query2->bindParam(':pid', $pid, PDO::PARAM_STR);
    $query2->bindParam(':num', $num, PDO::PARAM_INT);
    $query2->execute();
}

if(isset($_POST['submit3'])){
    $cname = $_POST['cname'];
    $comment = $_POST['comment'];
    $pkid = intval($_GET['pkgid']);
    $stats = 0;
    $sql3 = "INSERT INTO comments(name,comment,pkid,stats) 
    VALUES(:cname,:comment,:pkid,:stats)";
    $query3 = $dbh->prepare($sql3);
    $query3->bindParam(':cname', $cname, PDO::PARAM_STR);
    $query3->bindParam(':comment', $comment, PDO::PARAM_STR);
    $query3->bindParam(':pkid', $pkid, PDO::PARAM_INT);
    $query3->bindParam(':stats', $stats, PDO::PARAM_INT);
    $query3->execute();
    $lastInsertId1 = $dbh->lastInsertId();
    
    if($lastInsertId1)
    {
        $msgc = "Сэтгэгдэл амжилттай нийтлэгдлээ.";
        header("location: thankyou.php");
     
    }
    else 
    {
        $errorc = "Алдаа";
    }
 
   
 }
 if (isset($_POST['like'])) {
    $pkid = intval($_GET['pkgid']);
    
    // Assuming $dbh is your PDO database connection

    $sql = "UPDATE comments SET likec = likec + 1 WHERE pkid = :pkid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pkid', $pkid, PDO::PARAM_INT);

    try {
        $query->execute();
        $rowCount = $query->rowCount();

        if ($rowCount > 0) {
            $msgc = "Like амжилттай тоологдлоо.";
            header("location: thankyou.php");
            exit; // Important to stop script execution after a header redirect
        } else {
            $errorc = "Алдаа";
        }
    } catch (PDOException $e) {
        $errorc = "Database error: " . $e->getMessage();
    }
}if (isset($_POST['dislike'])) {
    $pkid = intval($_GET['pkgid']);


    $sql = "UPDATE comments SET dislikec = dislikec + 1 WHERE pkid = :pkid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pkid', $pkid, PDO::PARAM_INT);

    try {
        $query->execute();
        $rowCount = $query->rowCount();

        if ($rowCount > 0) {
            $msgc = "Like амжилттай тоологдлоо.";
            header("location: thankyou.php");
            exit; // Important to stop script execution after a header redirect
        } else {
            $errorc = "Алдаа";
        }
    } catch (PDOException $e) {
        $errorc = "Database error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css" />
	<script>
		 new WOW().init();
	</script>
<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
						$( "#datepicker,#datepicker1" ).datepicker();
						});
					</script>
				<style>
                    @media print {
                        body * {
                           visibility: hidden
                        }
                        .alert1{
                          visibility: visible;
                        }
                    }
                </style>
</head>
<body>
<!-- top-header -->
<?php include('includes/header.php');?>
<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"></h1>
	</div>
</div>
<!--- /banner ---->
<!--- selectroom ---->
<div class="selectroom">
	<div class="container">	
		  <?php if($error){?><div class="alert alert-danger">
            <strong>АЛДАА</strong>:<?php echo htmlentities($error); ?> </div><?php } 
		  else if($msg){?><div class="alert alert1 alert-success">
            <strong>Амжилтай</strong>:<?php  echo htmlentities($msg). '<br>Данс : 5249304679 <br> Гүйлгээний утга:'.$useremail.'-'.$pid.'-'.$num.'-'.$hool.$buudal.$vzwer.'<br> Төлбөр:'.$sum.'<br>';
            $qr = $useremail.'-'.$pid.'-'. $num .'-'.$hool.'-'. $buudal .'-'.$vzwer .'-'.$sum;
            $path = 'images/qr/';
            $qrcode = $path.time().".png";
            QRcode :: png($qr , $qrcode, 'W',4,4);
            echo "<img src='".$qrcode."'>"; ?></div>
            <button class="btn btn-primary" onclick="window.print();">Хэвлэх</button>
            <?php }?>
  <?php if($errorc){?><div class="alert alert-danger"><strong>АЛДАА</strong>:<?php echo htmlentities($errorc); ?> </div><?php } 
		  else if($msgc){?><div class="alert alert-success"><strong>Амжилтай</strong>:<?php echo htmlentities($msgc)?> </div><?php }?>
<?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT * from tbltourpackages where PackageId=:pid";
$query = $dbh->prepare($sql);
$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form name="book" method="post" action="">
    <div class="selectroom_top">
        <div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
        <span><i class="fa fa-book"> </i><?php  echo htmlentities($result->num); ?></span>   
        <span><i class="fa fa-eye"> </i><?php  echo htmlentities($result->PackageId); ?></span>           
            <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="">
        </div>
        <div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
            <h2><?php echo $_SESSION['name'] = htmlentities($result->PackageName);?></h2>
            <p class="dow">Дугаар-<?php echo htmlentities($result->PackageId);?></p>
            <p><b>Төрөл :</b> <?php echo htmlentities($result->PackageType);?></p>
            <p><b>Байршил :</b> <?php echo htmlentities($result->PackageLocation);?></p>
            <p><b>Тайлбар :</b> <?php echo htmlentities($result->PackageFetures);?></p>
            <p><b>Явах :</b> <?php echo $_SESSION['go'] = htmlentities($result->go);?></p>
            <p><b>ирэх :</b> <?php echo $_SESSION['come'] = htmlentities($result->come);?></p>
            <div class="clearfix"></div>
            <div class="grand">
          
                <h3 class="text-primary">Үнэ :<?php echo $_SESSION['price']=htmlentities($result->PackagePrice);?>.төг</h3>
                <h5 class="text-primary">Үнэ Буудал: 250000.төг</h5>
                <h5 class="text-primary">Үнэ Хоол хүнс: 120000.төг</h5>
                <h5 class="text-primary">Үнэ Үзвэр :100000.төг</h5>
                <p class="jumbotron"><?php echo htmlentities($result->PackageDetails);?></p>
            </div>
        </div>
    </div>

    <div class="container-fluid selectroom_top">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="selectroom-info animated wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="500ms">
                    <ul>
                        <label class="form-label h2">Аялалд бүртгүүлэх</label>
                        <p class="font-italic">Явах хүний тоо</p>
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <input class="form-control special" type="number" name="num" min="1">
                        <span>Хоол &nbsp;</span><input type="checkbox"  name="hool" value="120000" id="hool">
                        <span>Зочид буудал &nbsp;</span><input type="checkbox" value="250000" name="buudal" id="buudal">
                        <span>Үзвэр &nbsp;</span><input type="checkbox" name="vzwer" value="100000" id="uzwer">
                        <br>
                        <?php if($_SESSION['login']): ?>
                            <button type="submit" name="submit2" class="btn btn-primary">Явах</button>
                        <?php else: ?>
                            <a href="#" data-toggle="modal" data-target="#myModal4" class="btn btn-primary">Явах</a>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>
<?php }} ?>
<div class="container mt-5">
  <h2>Сэтгэгдэл харах</h2>
  <?php 
$piid=intval($_GET['pkgid']);
$sql = "SELECT * from comments where pkid=:pid and stats=1 order by created_at LIMIT 5";
$query = $dbh->prepare($sql);
$query -> bindParam(':pid', $piid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{	?>

<!-- Cooler Bootstrap Comment -->
<div class="media mb-4 bg-light p-3 rounded shadow-sm">

    <div class="media-body">
        <h4 class="mt-0 text-primary"><i class="fa fa-user"></i>&nbsp;<?php echo htmlentities($result->name);?></h4>
        <p class="mb-2">Сэтгэгдэл: <br><?php echo htmlentities($result->comment);?></p>
        <small class="text-muted"><i class="fa fa-time"></i><?php echo htmlentities($result->created_at);?></small>
        <div class="mt-3">
        <form action="" method="post">
    <button value="1" type="submit" name="like" class="btn btn-sm btn-outline-info mr-2">Like(<span><?php echo htmlentities($result->likec); ?></span>)</button>
    <button value="1" type="submit" name="dislike" class="btn btn-sm btn-outline-danger">Dislike(<span><?php echo htmlentities($result->dislikec); ?></span>)</button>
</form>
        </div>
    </div>
</div>


  <?php } ?>

</div>
<div class="container mt-5">
  <h2>Cэтгэгдэл бичих</h2>
  <form name="comment" method="post" action="">
    <div class="form-group">
      <label for="name">Нэр:</label>
      <input type="text" name="cname" class="form-control" id="cname" placeholder="Enter your name">
    </div>
    <div class="form-group">
      <label for="comment">Сэтгэгдэл:</label>
      <textarea class="form-control" name="comment" id="comment" rows="4" placeholder="Enter your comment"></textarea>
    </div>
    <button type="submit" name="submit3" class="btn btn-primary">Нийтлэх</button>
  </form>
</div>
	</div>
</div>
<br>
<!--- /selectroom ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
<?php include('includes/profile.php');?>
</body>
</html>