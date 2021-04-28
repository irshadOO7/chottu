<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class Welcome extends Controller {
	public function index()
	{
		echo "hi i am using codeinginter4";
	}
	// public function test($name){
	// 	echo "welcom to".$name;
	// }
	// public function address($city,$country){
	// 	echo "i am from".$city."and".$country;
	// }
	public function _remap($method){
		echo $method;
	}

}

?>