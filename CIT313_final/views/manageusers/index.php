<?php include('views/elements/header.php');?>
<div class="container">
	<div class="page-header">
<h1><?php echo $title;?></h1>
  </div>

	<?php foreach($users as $p){?>
		<div class="well">
	<h3><?php echo $p['first_name'] . ' '. $p['last_name'];?></h3>
	<?php if($p['user_type'] != 1){?>
	<a href=<?php echo BASE_URL . "manageusers/delete/". $p['uID']; ?> class="btn btn-primary">Delete User</a>
	<?php if($p['active'] == 0){?>
		<a href=<?php echo BASE_URL . "manageusers/approve/". $p['uID']; ?> class="btn btn-primary">Approve User</a>
	<?php }?>
	<?php }?>
</div>
<?php }?>
</div>


<?php include('views/elements/footer.php');?>
