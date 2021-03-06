<?php
	
	require_once('functions/function.php');
	needLogged();
	if($_SESSION['role']==1){
	get_header();
	get_sidebar();
	get_breadcum();
	


?>



	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="col-md-9 heading_title">
					All user Information
				 </div>
				 <div class="col-md-3 text-right">
					<a href="add-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add user</a>
				</div>
				<div class="clearfix"></div>
			</div>
		  <div class="panel-body">
		  
			  <table class="table table-responsive table-striped table-hover table_cus">
					<thead class="table_head">
						<tr>
							<th>Name</th>
							<th>phone</th>
							<th>username</th>
							<th>email</th>
							<th>user-role</th>
							<th>photos</th>
							<th>Manage</th>
						</tr>
					</thead>
					<tbody>
						
						<?php 
							$search=$_POST['Search'];
							$sel="SELECT * FROM final_users NATURAL JOIN final_roles WHERE user_name LIKE '%$search%' OR user_phone LIKE '%$search%'";
							$sqey=mysqli_query($con,$sel);
							while($data=mysqli_fetch_assoc($sqey)){
						?>
						
						<tr>
							<td><?= $data['user_name'];?></td>
							<td><?= $data['user_phone'];?></td>
							<td><?= $data['user_username'];?></td>
							<td><?= $data['user_email'];?></td>
							<td><?= $data['role_name'];?></td>
							<td>
								<?php if($data['user_photo']==''){?>
								
								<img src="uploads/avatar.png" alt="" style="height:50px;"/>
								
								<?php } else{ ?>
									
									<img src="uploads/<?= $data['user_photo'];?>" alt="" style="height:50px;"/>
									
								<?php } ?>
							</td>
							<td>
								<a href="view-user.php?v=<?= $data['user_id'];?>"><i class="fa fa-plus-square fa-lg"></i></a>
								<a href="edit-user.php?e=<?= $data['user_id'];?>"><i class="fa fa-pencil-square fa-lg"></i></a>
								<a href="delate-user.php?id=<?= $data['user_id']?>"><i class="fa fa-trash fa-lg"></i></a>
							</td>
						</tr>
							<?php } ?>
					</tbody>
			  </table>
		  </div>
		  <div class="panel-footer">
			<div class="col-md-4">
				<a href="#" class="btn btn-sm btn-warning">EXCEL</a>
				<a href="#" class="btn btn-sm btn-primary">PDF</a>
				<a href="#" class="btn btn-sm btn-danger">SVG</a>
				<a href="#" class="btn btn-sm btn-success">PRINT</a>
			</div>
			<div class="col-md-4">
			</div>
			<div class="col-md-4 text-right">
				<nav aria-label="Page navigation">
				  <ul class="pagination pagina_cus">
					<li>
					  <a href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					  </a>
					</li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li>
					  <a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					  </a>
					</li>
				  </ul>
				</nav>
			</div>
			<div class="clearfix"></div>
		  </div>
		</div>
	</div><!--col-md-12 end-->
	
<?php
	
	get_footer();
	
	}else{
		echo "you have no permission!";
	}
?>             