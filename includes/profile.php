
<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
                    <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
<?php if ($_SESSION['login']) { ?>
    <div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group wow fadeInRight animated" data-wow-delay=".5s">
                <li class="list-group-item"><a href="profile.php">Профайл</a></li>
                <li class="list-group-item"><a href="change-password.php">Нууц үг солих</a></li>
                <li class="list-group-item"><a href="tour-history.php">Аялалын түүх</a></li>
                <li class="list-group-item"><a href="issuetickets.php">Тусламжууд</a></li>
                <li class="list-group-item"><a href="logout.php">Гарах</a></li>
            </ul>
            </ul>
        </div>
        <div class="col-md-3">
            <img class="list-group wow fadeInRight animated" data-wow-delay=".5s" src="./images/2.jpg" width="250px" height="250px">    
        </div>
    </div>
</div>
<?php } ?>