<?php 
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ChottuModel;
/**
  * 
  */
 class Api extends ResourceController
 {
 	
 	// function __construct()
 	// {
 	// 	header('Access-Control-Allow-Origin: *');
		// header("Access-Control-Allow-Methods: GET, OPTIONS");
		// parent::__construct();
 	// }
 	public function index()
 	{
 		if($this->request->getPost())
 		{
 			$data = $this->request->getpost();
 			extract($data);
 			switch($action)
 			{
 				case 'login':
 				$this->login_action();
 				break;
 				case 'auto_login':
 				$this->auto_login();
 				break;
 			// 	case 'load_table':
				// $this->load_table();
				// break;
				case 'generate_row':
				$this->new_row();
				break;
				// case 'save_center':
				// $this->save_center();
				// break;
				case 'user_update':
				$this->user_update();
				break;
				// case 'save_me':
				// $this->save_me();
				// break;
				// case 'update_me':
				// $this->update_me();
				// break;
				case 'upload_images':
				$this->upload_img();
				break;
				case 'delete_data':
				$this->delete_now();
				break;
				// case 'close_admission':
				// $this->close_admission();
				// break;
				// case'accept_admission':
				// $this->accept_admission();
				// break;
				// case 'get_roll':
				// $this->get_roll();
				// break;
				case 'get_data':
				$this->get_data();
				break;
				// case 'check_duplicate':
				// $this->check_duplicate();
				// break;
				case 'session_gen':
				$this->session_gen();
				break;
				// case 'set_id':
				// $this->set_id();
				// break;
				case 'drop_down':
				$this->drop_down();
				break;
				case 'update_now':
				$this->update_now();
				break;
				// case 'student_payment':
				// $this->student_payment();
				// break;
				// case'count_sms':
				// $this->count_sms();
				// break;
				// case'auto_sms':
				// $this->auto_sms();
				// break;
				// case 'send_sms':
				// $this->send_sms();
				// break;
				case 'change_password':
				$this->confirm_pass();
				break;
				case 'reset_password':
				$this->reset();
				break;
				case 'logout':
				$this->logout();
				break;
				default:
				echo json_encode(array('status'=>'error','message'=>'Sorry! Action Not Found'));
				
 			}
 		}else
 		{
 			echo "Access Denied";
 		}
 	}
	private function login_action() {
		$data = $this->request->getPost();
		extract($data);
		$model = new chottuModel();
		$arr = array('user_email'=>$email,'user_pass'=>md5($password));
		$result = $model->login_now($arr);
		$session = session();

		if($result['message']==1)
		{
			echo json_encode(array('status'=>'success','message'=>'Login Successfully'));
		}
		else if($result['message']==2)
		{
			echo json_encode(array('status'=>'error','message'=>'Your Id Is Blocked By Admin.'));
			
		}
		else 
		{
			echo json_encode(array('status'=>'error','message'=>$result['error']));
			
		}
	}
	private function new_row(){
		$model = new chottuModel();
		    if($model->check_token()){
			$data = $this->request->getPost();
			extract($data);
			$data = array('status'=>'success','dataId'=>1);
			$model = new ChottuModel();
			$res = $model->get_empty($table);
			echo json_encode(array('status'=>'success','dataId'=>$res));
		}
	}
	private function update_now(){
		$model = new chottuModel();
	    $data = $this->request->getPost();
			extract($data);
			unset($data['action']);
			unset($data['table']);
	      	unset($data['dataId']);
			$model = new chottuModel();

			//$clean_data = $model->filter_data($data);
			//print_r($data);
			$res = $model->update_data($table,$data,$dataId);
			if($res==1){
				echo json_encode(array('status'=>'success','message'=>'Save Successfully.'));
			}
			else {
				
				echo json_encode(array('status'=>'error','message'=>$res['message']));	
	}
}
	private function delete_now() {
		$data = $this->request->getpost();
		extract($data);
		$model = new chottuModel();
		$res = $model->delete_data($table,$del_id);	
		if($res==1){
				echo json_encode(array('status'=>'success','message'=>'Data Deleted Successfully.'));
			}else {
				echo json_encode(array('status'=>'error','message'=>'Sorry! Something Went Wrong.'));
			}
	}
	private function logout(){
			$data = $this->request->getPost();
			extract($data);
			$dt = date('Y=m-d H:i:s');
			$arr = array('status'=>'LOGOUT','last_login'=>$dt);
			$model = new chottuModel();
			$res = $model->update_data('user',$arr,$dataId);
			if($res==1)
			{
			$session = session();
			$session->destroy();
			$response = array('status'=>'success','message'=>'Logged Out Successfully.');
			}else {
				$response = array('status'=>'error','message'=>$res['message']);
			}
			echo json_encode($response);
	}
	private function upload_img(){
			$data = $this->request->getPost();
			extract($data);
			  $model = new chottuModel();
			  $file_data = explode(",",$fileData);
	          $real_data = base64_decode($file_data[1]);
	          $ext = $model->get_ext($file_data[0]);
	          $folder_path = './uploads/';
	          $file_name = $dataId.$fileName.$ext;
	          //echo $fileName;
	          $arr = array($fileName=>$file_name);
	           //print_r($arr);
	          $arr2 = array($fileName=>'null');
	           $resp = $model->upload_blob($folder_path,$file_name,$real_data);
	          // print_r($resp);
	           if ($resp ==1){
	          	$mm = $model->update_data($table,$arr2,$dataId);
	        	$res = $model->update_data($table,$arr,$dataId);

	       	//print_r($this->db->getLastQuery());
	        	//print_r($res);
	        	 if($res==1){

	        		 echo json_encode(array('status'=>'success','message'=>'Photo Uploaded Successfully'));
	        	  }else {
	        		echo json_encode(array('status'=>'error','message'=>$res['message']));
	         	 }
	        	
	       }
	 }
    private function confirm_pass(){
    	$model = new chottuModel();
    	$data = $this->request->getPost();
    	extract($data);
    	if($model->check_token()){
    		$model = new chottuModel();
    		$login_user  = $session->login_user;
    		extract($login_user);
    		$arr = array('id'=>$user_id);
    		$res = $model->get_object('user',$arr);
    		$dataId = $res->id;
    		if(($res->user_pass)==md5($current_pass))
				{
		          $update_res = $model->update_data('user',array('user_pass'=>md5($confirm_pass)),$dataId);
		          if($update_res==1)
		          {
		            echo json_encode(array('status'=>'success','message'=>'Wow! Password Changed Successfully','location'=>'NA'));
		          }
		          else 
		          {
		            echo json_encode(array('status'=>'error','message'=>$update_res['message'],'location'=>'NA'));
		          }
		      }
		      else 
		      {
		        echo json_encode(array('status'=>'error','message'=>'Sorry! Current Password is incorrect'));
		      }
		    }
    	}
	private function user_update(){
		$model = new chottuModel();
	    $data = $this->request->getPost();
		extract($data);
		unset($data['table']);
	  	unset($data['dataId']);
	  	unset($data['user_pass']);
		$model = new chottuModel();
		$arr1 = array('user_pass'=>md5($user_pass));
		$newData = array_merge($data,$arr1);
		$res = $model->update_data($table,$newData,$dataId);
		if($res==1){
			echo json_encode(array('status'=>'success','message'=>'Data Updated Successfully.'));
		}else {
			echo json_encode(array('status'=>'error','message'=>$res['message']));
		}
	}
	private function reset(){
     	$data = $this->request->getPost();
	    extract($data);
	    $model = new chottuModel();
	    $arr = array('user_email'=>$user_email);
	    $res = $model->get_object('user',$arr);
	    if($res){
	    if($user_email==($res->user_email)){
	    	 $user_new_password= rand(100000,1000000);
          $pass_arr = array('user_pass'=>md5($user_new_password));
          $pass_res = $model->update_data('user',$pass_arr,$res->id);
          if($pass_res==1){
	    	echo json_encode(array('pass'=>$user_new_password,'status'=>'success','message'=>'Password Send To your Email.'));
		}else {
			echo json_encode(array('status'=>'error','message'=>$pass_res['message']));
		}
	    }
	}else{
		echo json_encode(array('status'=>'error','message'=>'No records found. Check your email.'));
	    
    }
	}
	private function get_data()
	{
		// extract(post_clean($this->input->post()));
		$data = $this->request->getPost();
		extract($data);
		// $res = $this->Offer_model->check_api();
		// if($res)
		// {
			// $dt= date('Y-m-d');
		    $model = new chottuModel();
		    $arr  = array('status' => 'ACTIVE');
			$data = $model->select_all($table,$arr);
			if($data)
			{
				$row = $data;
				$db = db_connect();
				if($row > 0)
				{
					echo json_encode(array('status'=>'success','data'=>$row));
				}
			}
			else 
			{
				echo json_encode(array('status'=>'error','message'=>'No Record Not Available'));
			}
		// }
		// else 
		// {
		// 	echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
		// }
	}	
 }
?>