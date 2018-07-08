<?php
include('views/elements/header.php')

;?>
<div class="container">
	<div class="page-header">
   <h1>Login</h1>
	 <?php
	 if(isset($message)){
	 echo "<div class=\"alert alert-danger\">";
	 echo $message;
	 echo "</div>";
	 unset($message);
	 }

	 ?>
	 <?php include('views/elements/login_form.php');
	 echo '<p><a href="'.BASE_URL.'">Back to home page</a></p>';
	 ?>

  </div>
</div>
<?php include('views/elements/footer.php');?>
