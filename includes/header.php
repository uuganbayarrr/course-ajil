<div class=" wow fadeInLeft animated" data-wow-delay=".5s">
    <div class="">
        <div class="">
            <nav class="navbar navbar-default">
    
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Цэс</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> 
                    <p class="navbar-brand" style="font-size: 38px; font-family:fantasy;">&nbsp; &nbsp; EasyTrip</p>
                </div>
            
                <div class="navbar-collapse collapse " id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li ><a href="index.php">Нүүр</a></li>
                        <li><a href="about.php">Бидний тухай</a></li>
                        <li><a href="package-list.php">Аялалууд</a></li>
                        <li><a href="blog-list.php">Блог</a></li>
                        <?php if ($_SESSION['login']) { ?>
                            <li><a href="#" data-toggle="modal" data-target="#myModal3">Тусламж</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#myModal6">Эрхэм : <?php echo $_SESSION['login']; ?></a></li>
                        <?php } else { ?>
                            <li><a href="enquiry.php">Санал өгөх</a></li>
                            <li><a data-toggle="modal" data-target="#myModal4">Нэвтрэх</a></li>
                            <li><a data-toggle="modal" data-target="#myModal">Бүртгүүлэх</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
