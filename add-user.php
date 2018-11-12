<?php

	
	require_once('functions/function.php');
	needLogged();
	if($_SESSION['role']<=3){
	get_header();
	get_sidebar();
	get_breadcum();
	
	if(!empty($_POST)){
		$name=htmlentities($_POST['Name'],ENT_QUOTES);
		$phone=htmlentities($_POST['phone'],ENT_QUOTES);
		$user=$_POST['user'];
		$Email=$_POST['Email'];
		$pass=md5($_POST['pass']);
		$repass=md5($_POST['repass']);
		$role=$_POST['role'];
		$image=$_FILES['pic'];
		$imageName="user-".time().rand(100000,1000000)."-".rand(10000,99999).".".pathinfo($image['name'],PATHINFO_EXTENSION);
		$insert="INSERT INTO final_users(user_name,user_phone,user_username,user_email,user_password,role_id,user_photo)
		VALUES('$name','$phone','$user','$Email','$pass','$role','$imageName')";
		if(mysqli_query($con,$insert)){
			move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
			echo "registration successful!";
		}else{
			echo "registration faild please try again!";
		}
	}
	
	
	

?>



		<div class="col-md-12">
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="col-md-9 heading_title">
						all user information
					 </div>
					 <div class="col-md-3 text-right">
						<a href="all-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All user</a>
					</div>
					<div class="clearfix"></div>
				</div>
			  <div class="panel-body">
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">Name</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" name="Name">
					</div>
				  </div> 
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">phone</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" name="phone">
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">user name</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" name="user">
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-8">
					  <input type="email" class="form-control" name="Email">
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-8">
					  <input type="password" class="form-control" name="pass">
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">Re-password</label>
					<div class="col-sm-8">
					  <input type="password" class="form-control" name="repass">
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">user-role</label>
					<div class="col-sm-4">
					  <select class="form-control select_cus" name="role">
						  <option value="">Select-Role</option>
						  <?php
							$sel="SELECT * FROM final_roles";
							$sqr=mysqli_query($con,$sel);
							while($rd=mysqli_fetch_assoc($sqr)){
						  ?>
							 <option value="<?=$rd['role_id'];?>"><?=$rd['role_name'];?></option>
							<?php } ?>
					  </select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">Upload</label>
					<div class="col-sm-8">
					  <input type="file" name="pic">
					</div>
				  </div>
			  </div>
			  <div class="panel-footer text-center">
				<button class="btn btn-sm btn-primary">REGISTRATION</button>
			  </div>
			</div>
			</form>
		</div><!--col-md-12 end-->
<?php
	
	get_footer();
	}else{
		echo"you have no permission!";
	}
?>  
       