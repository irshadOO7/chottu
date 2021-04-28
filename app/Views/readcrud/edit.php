<!DOCTYPE html>
<html>
<head>
	<title>edit details</title>
	
</head>
<body>
	<div>
		<form method="post" enctype="multipart/form-data" action="<?php echo site_url('readcrud/update') ?>">
		  <div class="form-row">
		    <div class="col">
		      <input type="text" name="name" class="form-control"  value="<?php echo  $user2['name'] ?>">
		    </div>
		    <div class="col">
		      <input type="text" name="email" class="form-control"  value="<?php echo  $user2['email'] ?>">
		    </div> <div class="col">
		      <input type="password" name="password" class="form-control"  value="<?php echo  $user2['password'] ?>">
		    </div>
		     <div class="col">
	      <input type="file" class="form-control" name="photo">
	    </div>
		    <div>
		    	<input type="submit" value="save">
		    </div>
		  </div>
		  <input type="hidden" name="id" value="<?php echo $user2['id']?>">
		</form>
	</div>
	
</body>
</html>