<?php 
namespace App\Controllers;
use App\Models\UserModel;
/**
 * 
 */
class User extends BaseController
{
 public function __construct(){
 	//
 }
 public function index(){
 	echo "Index";
 }
 public function new(){
 	echo "new";
 }
 public function create()
	{
		$userModel = new UserModel();
		$profileModel = new ProfileModel();
		$userModel->beiginTrans();
		if($userModel->insert($this->request->getPost())){
			$this-.session()->setFlashData('erorrs',$userModel->erorrs());
			return redirect()->to('register');
		}
		if($userFrofile->insert(['user_id'=>$userModel->insertID()])){
			$userModel->tranRollback();
			$this->session->setFlashData('erorrs',$profileModel->erorrs());
			return redirect()->to('register');
		}
		$userModel->tranCommit();
		$this->session->setFlashData('massege',"User Register Succssfully!");
		return redirect()->to('login');
	}
  public function edit($id){
  	echo "Edit $id";
  }
  public function show($id){
  	echo "show $id";
  }
}

 ?>