<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit1']))
{
$fname=$_POST['fname'];
$email=$_POST['email'];	
$mobile=$_POST['mobileno'];
$subject=$_POST['subject'];	
$description=$_POST['description'];
$sql="INSERT INTO  tblenquiry(FullName,EmailId,MobileNumber,Subject,Description) VALUES(:fname,:email,:mobile,:subject,:description)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Enquiry  Successfully submited";
}
else 
{
$error="Something went wrong. Please try again";
}

}

?>
<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
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
	<script>
		 new WOW().init();
	</script>
  <style>
    .card {
      display: inline;
      position: relative;
      float: left;
      margin-left: 20px;
      width: 250px;
    }

    .card:hover .card-inner {
      transform: rotateY(180deg);
    }

    .card-inner {
      transition: transform 0.6s;
      transform-style: preserve-3d;
    }

    .card-front,
    .card-back {
      backface-visibility: hidden;
      position: static;
   
    }
    .card-back{
      position: absolute;
    }

    .card-back {
      transform: rotateY(-180deg);
    }
    .card img{
      height: 250px;
      width: 250px;
    }
    .card-title{
      color: gold;
    }
    h5{
      font-size: 20px;
    }
    .ab img{
      height: 500px;
      width: 500px;
    }
  </style>
</head>
<body>
<!-- top-header -->
<div class="top-header">
<?php include('includes/header.php');?>
	</div>

  <!-- About 1 - Bootstrap Brain Component -->
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
      <div class="col-12 col-lg-6 col-xl-5 ab">
        <img class="img-fluid rounded" loading="lazy" src="images/2.jpg" alt="About 1">
      </div>
      <div class="col-12 col-lg-6 col-xl-7">
        <div class="row justify-content-xl-center">
          <div class="col-12 col-xl-11">
            <h2 class="mb-3">Who Are We?</h2>
            <p class="lead fs-4 text-secondary mb-3">We help people to build incredible brands and superior products. Our perspective is to furnish outstanding captivating services.</p>
            <p class="mb-5">We are a fast-growing company, but we have never lost sight of our core values. We believe in collaboration, innovation, and customer satisfaction. We are always looking for new ways to improve our products and services.</p>
            <div class="row gy-4 gy-md-0 gx-xxl-5X">
              <div class="col-12 col-md-6">
                <div class="d-flex">
                  <div class="me-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                      <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                    </svg>
                  </div>
                  <div>
                    <h2 class="h4 mb-3">Versatile Brand</h2>
                    <p class="text-secondary mb-0">We are crafting a digital method that subsists life across all mediums.</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="d-flex">
                  <div class="me-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                      <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
                    </svg>
                  </div>
                  <div>
                    <h2 class="h4 mb-3">Digital Agency</h2>
                    <p class="text-secondary mb-0">We believe in innovation by merging primary with elaborate ideas.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<br><br>
  <div class="container mt-5 wow fadeInLeft animated ">
  <div class=" row">
    <!-- First Card -->
    <div class="card">
      <div class="card-inner">
        <!-- Front side of the card -->
        <div class="card-front">
          <div class="card">
          <img src="images/hool.jpg" class="card-img-top" alt="Front Image 1" >
            <h5 class="card-title">Хоол</h5>
            <p class="c">Манайх маш сайн хоолтой жишээ нь</p>
          </div>
        </div>   
        <!-- Back side of the card -->
        <div class="card-back">
          <div class="card-body">
            <h5 class="card-title">Хоол</h5>
            <p class="card-text">Нэгэнтээ хүний тахиаг барьж идчихээд тахианы эзнийг асуухад тахиа идээгүй ээ галуу идсэн гэж худлаа
хэлчихээд галууны сарьсан хөл үзүүлсэн явдал байсан гэдэг. Нөгөө утгаараа бол алдаа хийчихээд түүнийгээ
аргалах, бултах гэсэн утгатай. Үүнийг товчлоод “ури паль нэминьда” (галууны хөл үзүүлэх) гэж хэлдэг. </p>
          </div>
        </div>
      </div>
    </div>   
    <div class="card">
      <div class="card-inner">
        <!-- Front side of the card -->
        <div class="card-front">
          <div class="card">
          <img src="images/buudal.jpg" class="card-img-top" alt="Front Image 1" >
            <h5 class="card-title">Зочид буудал</h5>
            <p class="c">Өндөр зэрэглэлийн тав тухтай буудлууд таныг хүлээж байна</p>
          </div>
        </div>   
        <!-- Back side of the card -->
        <div class="card-back">
          <div class="card-body">
            <h5 class="card-title">Зочид буудал</h5>
            <p class="card-text">Улаанбаатар хот дахь хамгийн олон зочид буудлыг
               нэгтгэсэн зочид буудлын онлайн захиалгын систем нь таныг хүссэн зочид 
               буудлаа өөр хаана ч байхгүй хямд үнээр захиалах боломжийг олгож байна.
               15-45 хүртэл хувийн хямдралтай өрөөг захиалж болно.</p>
          </div>
        </div>
      </div>
    </div>  
    <div class="card">
      <div class="card-inner">
        <!-- Front side of the card -->
        <div class="card-front">
          <div class="card">
          <img src="images/biz.jpg" class="card-img-top" alt="Front Image 1" >
            <h5 class="card-title">Виз гаралт</h5>
            <p class="c">Виз гарахад бүх талаараа туслана</p>
          </div>
        </div>   
        <!-- Back side of the card -->
        <div class="card-back">
          <div class="card-body">
            <h5 class="card-title">Виз гаралт</h5>
            <p class="card-text">- Виз мэдүүлэгч нь Шенгений зөвхөн нэг улс руу зорчих тохиолдолд тухайн улсын Элчин сайдын яам эсвэл Консулын газарт хандана.
- Виз мэдүүлэгч нь улс руу зорчих, аялах тохиолдолд аль улсад нь хамгийн олон хоног байх буюу аяллын үндсэн зорилго болох улсын Элчин сайдын яам эсвэл Консулын газарт виз мэдүүлэх шаардлагатай.</p>
          </div>
        </div>
      </div>
    </div> 
    <div class="card">
      <div class="card-inner">
        <!-- Front side of the card -->
        <div class="card-front">
          <div class="card">
          <img src="images/vzwer.jpg" class="card-img-top" alt="Front Image 1" >
            <h5 class="card-title">Нэмэлт үйлчилгээ</h5>
            <p class="c">Манайх олон төрлийн нэмэлт үйлчилгээтэй</p>
          </div>
        </div>   
        <!-- Back side of the card -->
        <div class="card-back">
          <div class="card-body">
            <h5 class="card-title">Нэмэлт үйлчилгээ</h5>
            <p class="card-text">Тарагт сумын нутагт нэн эрний үеэс хүн амьдарч байсан ул мөр болох чулуун ба хүрэл, төмөр зэвсгийн үеийн дурсгалууд, чулуу, хүрэл, зэвсгүүд, хутаг, хадны сүг зураг олон бий. Хүрэмтийн халуун рашаан, Хунтын гарамны чулуун хөшөө, Бажийн дөрвөлжин бичээст чулуу</p>
          </div>
        </div>
      </div>
    </div> 
  </div>
  
  </div>
  
<br><br><br><br><br>
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