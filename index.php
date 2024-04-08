<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Аялал</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>

</head>
<body>
<?php include('includes/header.php');?>
<div class="banner">
	<div>
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"></h1>
	</div>
</div>
<div class="container" style="border: 2px solid #ccc; padding: 20px;">
    <div class="row">
        <div class="col-md-4 rupes-left wow fadeInDown animated" data-wow-delay=".5s">
            <div class="rup-left text-center">
                <a href="o" class="text-decoration-none">
                    <i class="fa fa-usd h fa-3x text-primary"></i><br>
                </a>
            </div>
            <div class="rup-rgt">
                <h3 class="mt-3 mb-2">Хамгийн хямд</h3>
                <h4 class="mb-4"><a href="offers.html" class="text-decoration-none text-dark">Бусадаас хямд</a></h4>
            </div>
        </div>

        <div class="col-md-4 rupes-left wow fadeInDown animated" data-wow-delay=".5s">
            <div class="rup-left text-center">
                <a href="" class="text-decoration-none">
                    <i class="fa fa-heart h fa-3x text-primary"></i>
                </a>
            </div>
            <div class="rup-rgt">
                <h3 class="mt-3 mb-2">Хамгийн аюулгүй</h3>
                <h4 class="mb-4"><a href="" class="text-decoration-none text-dark">Таны аюулгүй аялах боломжийг бид олгоно</a></h4>
            </div>
        </div>

        <div class="col-md-4 rupes-left wow fadeInDown animated" data-wow-delay=".5s">
            <div class="rup-left text-center">
                <a href="offers.html" class="text-decoration-none">
                    <i class="fa fa-refresh h fa-3x text-primary"></i>
                </a>
            </div>
            <div class="rup-rgt">
                <h3 class="mt-3 mb-2">Хамгийн олон аялалтай</h3>
                <h4 class="mb-4"><a href="offers.html" class="text-decoration-none text-dark">Хүссэн аялалдаа яв</a></h4>
            </div>
        </div>
    </div>
</div>

<div class="container">
<h3> Аялалууд</h3>		<br>			
<?php $sql = "SELECT * from tbltourpackages order by rand() limit 3";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?><br>
			<div class="rom-btm">
    <div class="row">
        <div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
            <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="">
        </div>
        <div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
            <h4>Аялал: <?php echo htmlentities($result->PackageName);?></h4>
            <h6>Аялалын төрөл : <?php echo htmlentities($result->PackageType);?></h6>
            <p><b>Хаашаа явах :</b> <?php echo htmlentities($result->PackageLocation);?></p>
            <p><b>Тайлбар:</b> <?php echo htmlentities($result->PackageFetures);?></p>
        </div>
        <div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
            <h5><?php echo htmlentities($result->PackagePrice);?>төгрөг</h5>
            <a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="btn btn-primary">Дэлгэрэнгүй</a>
        </div>
    </div>
</div>
<?php }} ?>		
<div><a href="package-list.php" class="btn">Бүх аялал харах</a></div>
</div>

  <div class="container mt-5 hover-zoom">
    <div class="row">
      <div class="col-md-6">
        <h2>Аялал санал болгох</h2>
        <p>Таны санал болгосон аялал хэрэв манай төлөвлөгөөнд орвол та хямдралтай явна.</p>
        <a href="enquiry.php" class="btn btn-primary">Санал болгох</a> <br><br>
        <div class="card-body">
            <h4 class="card-title">Таны санал болгосон аялал хэрэгжүүлэх</h4>
            <p class="card-text">Манай холбоо барих хаяг: uuganbayar@gmail.com</p>
            <a href="https://google.com" class="btn btn-success"><i class="fa fa-envelope"></i> Имэйл илгээх</a>
          </div>
      </div>
      <div class="col-md-6">
        
        <img src="images/3.jpeg" height="240" alt="Ayalal Image" class="card-img-top img-fluid hover-zoom">
      </div>
    </div>
<br>
</div>
<div class="container">
<h3> Эрэлттэй</h3> <small>Хамгийн эрэлттэй 3 аялал жагсаалтаар таньд харуулав</small><br> <br>				
<?php $sql = "SELECT *
FROM tbltourpackages
ORDER BY num desc limit 3 ";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
<div class="col-md-4">
              <div class="card mb-4 box-shadow wow fadeInLeft animated hover-zoom">
              <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive card-img-top hover-zoom bg-image " style="width:300px; height:200px;" alt="">
                <div class="card-body">
                    <h4>Аялал: <?php echo htmlentities($result->PackageName);?></h4>
                    <p>Аялалын төрөл : <?php echo htmlentities($result->PackageType);?></p>
                    <p><b>Хаашаа явах :</b> <?php echo htmlentities($result->PackageLocation);?></p>
                    <p><b>Тайлбар:</b> <?php echo htmlentities($result->PackageFetures);?></p>
                    <h4 class="text-success">Үнэ:<?php echo htmlentities($result->PackagePrice);?>төгрөг</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                     <a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="btn btn-primary">Дэлгэрэнгүй</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php }} ?>
</div>
<br>
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
<!-- //write us -->
</body>
</html>