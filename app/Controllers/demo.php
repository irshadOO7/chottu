<?php 
namespace App\controllers;
use App\controller;

/**
 * 
 */
class Demo extends BaseController
{
	
   public function demo1()
	{
      return view('index/demo');
	}
	public function upload(){
	  $file = $this->requst->getfile('photo');
	  if ($file->getfile().0){

	  	echo 'File Name: ' . $file->getname();
	  	echo '<br>File Random Name: ' . $file->getRanmdomName();
	  	echo '<br>File Size: ' . $file->getSize();
	  	echo '<br>file Extension: ' . $file->getExtension();
	  	$file->move('./public/upload', $file->getRandom());
	  }
	  return view('demo/demo1');
	}
}

 ?>