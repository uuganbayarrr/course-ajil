<?php
		error_reporting(0);
		if(isset($_POST['submit']))
		{
		$issue=$_POST['issue'];
		$description=$_POST['description'];
		$email=$_SESSION['login'];
		$sql="INSERT INTO  tblissues(UserEmail,Issue,Description) VALUES(:email,:issue,:description)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':issue',$issue,PDO::PARAM_STR);
		$query->bindParam(':description',$description,PDO::PARAM_STR);
		$query->bindParam(':email',$email,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId)
		{
		$_SESSION['msg']="goy bollo";
		echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
		}
		else 
		{
		$_SESSION['msg']="aldaa.";
		echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
		}
		}
?>	
	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
							<section>
							<form name="help" method="post">
								<div class="modal-body modal-spa">
									<div class="writ">
										<h4>Яаж туслах уу?</h4> <br>
											<ul>
												<p class="na-me"><select id="country" name="issue" class="frm-field required sect" required="">
														<option value="">Tуслах</option> 		
														<option value="Booking Issues"> АЯЛАЛ</option>
														<option value="Cancellation">Цуцлах </option>
														<option value="Refund">Буцаалт</option>
														<option value="Other">Бусад</option>														
													</select></p><br>
												<p class="descrip">
									       <textarea class="special" type="text" placeholder="Тайлбар"  name="Тайлбар" required="" rows="6" cols="45" size="50"></textarea></p>
													<div class="clearfix"></div>
											</ul>
											<div class="sub-bn">
												<form>
													<button type="submit" name="submit" class="subbtn">илгээх</button>
												</form>
											</div>
									</div>
								</div>
								</form>
							</section>
					</div>
				</div>
			</div>