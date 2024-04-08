<?php
error_reporting(0);
if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $mnumber=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql="INSERT INTO  tblusers(FullName,MobileNumber,EmailId,Password) VALUES(:fname,:mnumber,:email,:password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
    $query->bindParam(':mnumber',$mnumber,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        $_SESSION['msg']="orson";
        header('location:thankyou.php');
    }
    else 
    {
        $_SESSION['msg']="aldaa.";
        header('location:thankyou.php');
    }
}
?>
<!-- Javascript for checking email availability -->
<script>
function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_availability.php",
        data:'emailid='+$("#email").val(),
        type: "POST",
        success:function(data){
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error:function (){}
    });
}
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
            </div>
            <section>
                <div class="modal-body modal-spa">
                    <div class="login-grids">
                        <div class="login row">
                            <div class="col-md-6 login-left">
                              <img src="images/1.jpg" alt="" height="135">
                            </div>
                            <div class="col-md-6 login-right">
                                <form name="signup" method="post">
                                    <h3 class="mb-3">Бүртгэл үүсгэх</h3>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="" placeholder="Full Name" name="fname" autocomplete="off" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="" placeholder="Mobile number" maxlength="10" name="mobilenumber" autocomplete="off" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="" placeholder="Email id" name="email" id="email" onBlur="checkAvailability()" autocomplete="off" required="">
                                        <span id="user-availability-status" style="font-size:12px;"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" value="" placeholder="Password" name="password" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Бүртгүүлэх">
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix"></div>                                
                        </div>
                        <p><a href="page.php?type=geree">Гэрээ</a> болон <a href="page.php?type=geree"> үйлчилгээний нөхцөл</a></p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
