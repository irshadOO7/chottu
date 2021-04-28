<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1><?php echo $page_heading; ?> </h1>
   <?php
  if (count($subject)>0) {
  	foreach ($subject as $sub){
  		echo
  		 "<li>".$sub."</li>";
  	}
  }else {
  	echo "sorry no record found!";
  }
    ?>
</body>
</html>