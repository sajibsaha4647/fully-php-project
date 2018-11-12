<?php

	
	require_once('functions/function.php');
	
	get_header();
	get_sidebar();
	get_breadcum();
	

		if(isset($_POST['delete_btn'])){
			$id=$_GET['id'];
			$delsql="DELETE FROM final_users WHERE user_id='$id'";
			$q=mysqli_query($con,$delsql);
			header('location: all-user.php');
			exit;
		}
	

?>


	<div class="col-md-12">
		<form class="form-horizontal" action="" method="post">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="col-md-9 heading_title">
					delate Information
				 </div>
				 <div class="col-md-3 text-right">
					<a href="all-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> add user</a>
				</div>
				<div class="clearfix"></div>
			</div>
		  <div class="panel-body">
			  <h2>Are you sure?</h2>
		  </div>
		  <div class="panel-footer text-center">
			<button name="delete_btn" class="btn btn-sm btn-primary">DELATE </button>
		  </div>
		</div>
		</form>
	</div><!--col-md-12 end-->
	
<?php
	
	get_footer();
?>