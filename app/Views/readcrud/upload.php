<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>pic upload</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form method="post" enctype="multipart/form-data" action="<?php echo site_url('readcrud/picupload') ?>">
	  <div class="form-row">
	    <div class="col">
	      <input type="file" class="form-control" name="photo">
	    </div>
	    <div class="col">
	      <input type="submit" class="form-control" value="upload">
	    </div>
	  </div>
	</form>
</body>
</html>