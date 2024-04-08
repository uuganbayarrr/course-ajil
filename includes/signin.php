<?php
session_start();
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT EmailId,Password FROM tblusers WHERE EmailId=:email and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['login'] = $_POST['email'];
        echo "<script type='text/javascript'> document.location = 'package-list.php'; </script>";
    } else {
        echo "<script>alert('Нууц үг буруу');</script>";
    }
}
?>

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <h4 class="modal-title">Нэвтрэх</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-spa">
                <div class="login-grids">
                    <div class="login">
                        <div class="login-left">
                        </div>
                        <div class="login-right">
                            <form method="post">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter your Email" required="">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
                                </div>
                                <div class="form-group">
                                    <h4><a href="forgot-password.php" class="close">&nbsp;Нууц үг сэргээх?</a></h4>
									<h4><a data-toggle="modal" class="close" data-target="#myModal" aria-hidden="true"  class="close" data-dismiss="modal" aria-label="Close">Бүртгүүлэх</a></h4>
                                </div>
                                <button type="submit" name="signin" class="btn btn-primary">Нэвтрэх</button>
                                <a class="btn btn-primary" href="admin/index.php">Админ</a>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
