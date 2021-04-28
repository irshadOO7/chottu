<!DOCTYPE html>
<html>
<head>
	<title>Add Detail</title>
	
</head>
<body>
	<div>
		<form method="post" enctype="multipart/form-data" enctype="multipart/form-data" action="<?php echo base_url('readcrud/save') ?>">
		  <div class="form-row">
		    <div class="col">
		      <input type="text" name="name" class="form-control" placeholder="Name">
		    </div>
		    <div class="col">
		      <input type="text" name="email" class="form-control" placeholder="Email">
		    </div> <div class="col">
		      <input type="password" name="password" class="form-control" placeholder="password">
		    </div>
		     <div class="col">
	      <input type="file" class="form-control" name="photo">
	    </div>
		    <div>
		    	<input type="submit" value="save">
		    </div>
		  </div>
		</form>
	</div>
	
</body>
</html>