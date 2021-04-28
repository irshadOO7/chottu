<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User1Model;

class ReadCrud extends BaseController
{
	
 public	function index()
	{
		$user1Model = new User1Model();
		$data['User1'] = $user1Model->findAll();
		
		return view('readcrud/index',$data);
	}
	public function add(){

		return view('readcrud/add');
	}
	public function save(){
		$user1Model = new User1Model();
		$_POST['status'] = isset($_POST['status']);
		$user1Model->insert($_POST);
		return $this->response->redirect(site_url('readcrud/index'));
	}
	public function delete($id){
		$user1Model = new User1Model();
		$user1Model -> delete($id);
		return $this->response->redirect(site_url('readcrud/index'));
	}
	public function edit($id){
		$user1Model = new User1Model();
		$data['user2'] = $user1Model->find($id);
		
		return view('readcrud/edit',$data);
	}
	public function update(){
		$user1Model = new User1Model();
		$user1Model->update($_POST['id'], $_POST);
		return $this->response->redirect(site_url('readcrud/index'));
	}
	public function upload(){
		return view('readcrud/upload');
	}
}

 ?>