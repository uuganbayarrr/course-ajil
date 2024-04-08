<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["delete"])) {
            try {
                $id_to_delete = $_SESSION['cid'];
                $stmt = $dbh->prepare("DELETE FROM comments WHERE id = :id");
                $stmt->bindParam(':id', $id_to_delete, PDO::PARAM_INT);
                $stmt->execute();
                header("location: manage-comment.php");
            } catch (PDOException $e) {
               
            }
        } 
		if (isset($_POST["approve"])) {
			try {
				$id_to_approve = $_SESSION['cid'];
				$stats = 1;
   
				$stmt = $dbh->prepare("UPDATE comments SET stats = :stats WHERE id = :id");
				$stmt->bindParam(':stats', $stats, PDO::PARAM_INT); 
				$stmt->bindParam(':id', $id_to_approve, PDO::PARAM_INT);
		
			
				$stmt->execute();
        header("location: manage-comment.php");
			} catch (PDOException $e) {
				echo "Error approving record: " . $e->getMessage();
			}
		}
		
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
		<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head> 
<body>
    <div class="page-container">
       <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<?php include('includes/header.php');?>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Нүүр хуудас</a><i class="fa fa-angle-right"></i>Асуудлууд удирдах</li>
</ol>
<div class="agile-grids">    
    <!-- tables -->
    <?php if($error){?><div class="errorWrap"><strong>АЛДАА</strong>:<?php echo htmlentities($error); ?> </div><?php } 
    else if($msg){?><div class="succWrap"><strong>АМЖИЛТ</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <div class="agile-tables">
            <div class="w3l-table-info">
                <h2>Хэрэглэгч удирдах</h2>
                <form method="post" action="">
                    <table id="table">
					<thead>
                    <tr>
                        <th>#</th>
                        <th>Нэр</th>
                        <th>Гар утасны дугаар</th>
                        <th>Имэйл хаяг</th>
                        <th>Асуудлууд</th>
                        <th>Тайлбар</th>
                        <th>Илгээсэн огноо</th>
                        <th>Үйлдэл</th>
                    </tr>
                </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM comments";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                                    ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt);?></td>
                                        <td><?php echo $_SESSION['cid']=htmlentities($result->id);?></td>
                                        <td><?php echo htmlentities($result->name);?></td>
                                        <td><?php echo htmlentities($result->comment);?></td>
                                        <td><?php echo htmlentities($result->created_at);?></td>
                                        <td><?php echo htmlentities($result->pkid);?></td>
                                        <td><?php echo htmlentities($result->stats);?></td>
                                        <td>
                                            <button class="btn btn-primary" type="submit" name="delete">Устгах</button>
                                            <button class="btn btn-primary" type="submit" name="approve">Зөвшөөрөх</button>
                                        </td>
                                    </tr>
                                    <?php
                                    $cnt = $cnt + 1;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <button class="btn btn-primary" onclick="window.print();">Хэвлэх</button>
                </form>
            </div>
        </div>
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
						<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

    </div>
</body>
</html>

