<?php

	
	require_once('functions/function.php');
	needLogged();
	get_header();
	get_sidebar();
	get_breadcum();
	
	$id=$_GET['e'];
	$sel="SELECT * FROM final_users WHERE user_id='$id'";
	$sqr=mysqli_query($con,$sel);
	$data=mysqli_fetch_assoc($sqr);
	
	//for update//
	if(!empty($_POST)){
			$namename = $_POST['name'];
			$phonephone = $_POST['phone'];
			$usernameuser = $_POST['username'];
			$emailemail = $_POST['Email'];
			$role=$_POST['role'];
			$updsql = "UPDATE final_users NATURAL JOIN final_roles SET user_name='$namename',user_phone='$phonephone',user_username='$usernameuser',user_email='$emailemail',role_id='$role' WHERE user_id='$id'";
			
			mysqli_query($con,$updsql);
			
			header('Location: all-user.php');
	}
	//for update//
?>



	<div class="col-md-12">
		<form class="form-horizontal" action="" method="post">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="col-md-9 heading_title">
					Update Information
				 </div>
				 <div class="col-md-3 text-right">
					<a href="all-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> add user</a>
				</div>
				<div class="clearfix"></div>
			</div>
		  <div class="panel-body">
			  <div class="form-group">
				<label for="" class="col-sm-3 control-label">Name</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" name="name" value="<?= $data['user_name'];?>">
				</div>
			  </div>
			  <div class="form-group">
				<label for="" class="col-sm-3 control-label">phone</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" name="phone" value="<?=$data['user_phone'];?>">
				</div>
			  </div>
			  <div class="form-group">
				<label for="" class="col-sm-3 control-label">username</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" name="username" value="<?= $data['user_username'];?>">
				</div>
			  </div>
			  <div class="form-group">
				<label for="" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
				  <input type="email" class="form-control" name="Email" value="<?= $data['user_email'];?>">
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
						 <option value="<?= $rd['role_id'];?>"<?php if($data['role_id']==$rd['role_id']){echo 'selected="selected"';}?>><?= $rd['role_name'];?></option>
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
			<button class="btn btn-sm btn-primary">UPDATE</button>
		  </div>
		</div>
		</form>
	</div><!--col-md-12 end-->
	
<?php
	
	get_footer();
?>