<?php 
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BrandModel;
use App\Models\chottuModel;
/**
 * 
 */
class Admin extends BaseController
{
	
    public function index()
	{

		return view('admin/login');
	} 
	// public function login()
	// {
	// 	return view('admin/login');
	// }
	public function login_action() {
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

    public function dashboard()

	{
		// $model = new chottuModel();
			if($model= $this->chottu->check_token())
			{
				echo view('admin/header');
				echo view('admin/sidebar');
				echo view('admin/index');
				echo view('admin/footer');
			}else{
				return redirect()->to('index');
			}
	}
	
	public function brand(){
		$model = new chottuModel();
			if($model->check_token())
			{
			echo view('admin/header');
			echo view('admin/sidebar');
			$model = new chottuModel();
			$arr  = "status in('ACTIVE','BLOCKED')";
		 	$data['brand'] = $model->select_all('brand',$arr);
			echo view('admin/brand',$data);
			echo view('admin/footer');
			}else{
				return redirect()->to('index');
			}
		
	}
	public function new_row(){
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
	// public function img_upload(){
	// 		$data = $this->request->getPost();
	// 		extract($data);
	// 		$model = new chottuModel();
	// 		$res = $model->update_img('brand','file');
	// 		if($res==1){
	// 			echo json_encode(array('status'=>'success','message'=>'Image Uploaded Successfully.'));
	// 		}else {
	// 			echo json_encode(array('status'=>'error','message'=>$res['message']));
	// 		}
	// }
	public function update_now(){
		$model = new chottuModel();
		if($model->check_token()){
			$data = $this->request->getPost();
			extract($data);
			unset($data['table']);
	      	unset($data['dataId']);
			$model = new chottuModel();

			//$clean_data = $model->filter_data($data);
			//print_r($data);
			$res = $model->update_data($table,$data,$dataId);
			if($res==1){
				echo json_encode(array('status'=>'success','message'=>'Save Successfully.'));
			}
			}else {
				
				echo json_encode(array('status'=>'error','message'=>$res['message']));
			}
		}
	public function delete_now() {
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
	         // category.....

	public function categories(){
			$model = new chottuModel();
			if ($model->check_token()){
			echo view('admin/header');
			echo view('admin/sidebar');
			$model = new chottuModel();
			$arr = array('status'=>'ACTIVE');
			$data['category'] = $model->select_all('category',$arr);
			echo view('admin/categories',$data);
			echo view('admin/footer');
				}
				else{
					return redirect()->to('index');
			}
		}
		      // offer....

	public function offer(){
			$model = new chottuModel();
			if ($model->check_token()){
				echo view('admin/header');
				echo view('admin/sidebar');
				$model = new chottuModel();
				$arr = array('status'=>'ACTIVE');
				$data['offer'] = $model->select_all('offer',$arr);
				echo view('admin/offer',$data);
				echo view('admin/footer');
			}else{
				return redirect()->to('index');
			}
		}
	public function logout(){
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
		// product

	public function product(){
			$model = new chottuModel();
			if ($model->check_token()){
				echo view('admin/header');
			    echo view('admin/sidebar');
			    $model = new chottuModel();
			    $arr = array('status'=>'ACTIVE');
			    $data['product'] = $model->select_all('product_details',$arr);
			    echo view('admin/product',$data);
			    echo view('admin/footer');
			}else{
				return redirect()->to('index');
			}
		}
		// OFFER 
	public function offers(){
			$model = new chottuModel();
			if($model->check_token()){
				echo view('admin/header');
			    echo view('admin/sidebar');
			    $model = new chottuModel();
			    $arr = array('status'=>'ACTIVE');
			    $data['offer'] = $model->select_all('offer',$arr);
			    echo view('admin/offer',$data);
			    echo view('admin/footer');
			}else{
				return redirect()->to('index');
			}
		}
	public function customers(){
		 	$model = new chottuModel();
		 	if($model->check_token()){
		 		echo view('admin/header');
		 		echo view('admin/sidebar');
		 		$model = new chottuModel();
		 		$arr = array('status'=>'ACTIVE');
		 		$data['customer'] = $model->select_all('customer_details',$arr);
		 		echo view('admin/customers',$data);
		 		echo view('admin/footer');
		 	}else{
		 		return redirect()->to('index');
		 	}
		}
	public function order(){
		$model = new chottuModel();
		if($model->check_token()){
			echo view('admin/header');
			echo view('admin/sidebar');
			$model = new chottuModel();
			$arr = array('status'=>'ACTIVE');
			$data['order'] = $model->select_all('order_details',$arr);
			echo view('admin/order',$data);
			echo view('admin/footer');
		}else{
			return redirect()->to('index');
		}

	}
	public function upload_img(){
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
	    public function change_pass(){
	    	$model = new chottuModel();
	    	if($model->check_token()){
	    	echo view('admin/header');
	    	echo view('admin/sidebar');
	    	$model = new chottuModel();
	    	echo view('admin/change_pass');
	    	echo view('admin/footer');
	    }else{
	    	return redirect()->to('index');
	    }
	   }
	    public function confirm_pass(){
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
	 public function check_this(){
			$model = new chottuModel();
            echo $model->check_token();
     	}
     public function user(){
     	$model = new chottuModel();
     	if ($model->check_token()) {
     		echo view('admin/header');
     		echo view('admin/sidebar');
     		$model = new chottuModel();
     		$arr = array('status_new'=>'ACTIVE');
     		$data['user'] = $model->select_all('user',$arr);
     		echo view('admin/user',$data);
     		echo view('admin/footer');
     	} else {
     		return redirect()->to('index');
     	}
     }
     public function user_update(){
     	$model = new chottuModel();
     	if($model->check_token()){
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
     }
     public function forgot(){
     	echo view('admin/forgot');
     }
     public function reset(){
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
	public function customer_order(){
		$model = new chottuModel();
		if($model->check_token()){
			echo view('admin/header');
			echo view('admin/sidebar');
			echo view('admin/customer_order');
			echo view('admin/footer');
			echo view('admin/customerfrm');

		}else{
			return redirect()->to('index');
		}
	}
	public function add_product(){
		$model = new chottuModel();
		if($model->check_token()){
		$data = $this->request->getPost();
		extract($data);
	    $invoice_id = $model->get_empty('invoice_details');
		$sale_id = $model->get_empty('tb_sale_item');
		$arr = array('status'=>'ACTIVE','product_id'=>$product_id,'sale_id'=>$invoice_id);
		$add_product = $model->select_all('tb_sale_item',$arr);
		print_r($add_product);
		 if(count($add_product)>0){
		if(($add_product[0]['product_id'])==$product_id && ($add_product[0]['sale_id'])==$invoice_id){
			$id = $add_product[0]['id'];
			$product_qty = $add_product[0]['product_qty']+1;
			$product_rate = $add_product[0]['product_rate'];
			$product_amount = ($product_qty)*$product_rate;
			$add = array('product_qty'=>$product_qty,'product_amount'=>$product_amount);
			$res1 = $model->update_data('tb_sale_item',$add,$id);
			print_r($res1);
			return redirect()->to('customer_order');
		}}else{

			$product = $model->get_object('product_details',"id='$product_id'");
			$sale_item = array_merge($data,array('sale_id'=>$invoice_id,'product_qty'=>1,'product_rate'=>$product->mrp,'sale_rate'=>$product->rate,'product_amount'=>$product->rate,'product_unit'=>$product->unit,'status'=>'ACTIVE'));
       	 	$res = $model->update_data('tb_sale_item',$sale_item,$sale_id);
       	 	print_r($res);
		        return redirect()->to('customer_order');
	}
	}else{
		return redirect()->to('index');
	}
	}
	public function addition(){
		$data = $this->request->getPost();
		extract($data);
		$discount_rate = $product_rate - ($product_rate * ($product_discount/100));
		$total_amount = $discount_rate * $new_qty;
	    $total = array('product_qty'=>$new_qty,'sale_rate'=>$product_rate,'product_discount'=>$product_discount,'product_id'=>$product_id,'product_amount'=>$total_amount);
		$model = new chottuModel();
		$res = $model->update_data('tb_sale_item',$total,$dataId);
		 if($res==1){
	    	echo json_encode(array('status'=>'success'));
		}else {
			echo json_encode(array('status'=>'error','message'=>$pass_res['message']));
		}
	}
	public function result()
	{
		$data = $this->request->getPost();
		extract($data);
		$model = new chottuModel();
		$obj = $model->get_object('customer_details',"mobile ='$number'");
	  	if($obj){
		if(($obj->mobile)==$number){
			echo json_encode($obj);
			$_SESSION['selected_customer'] = $obj->id;
		}}
		else
		{
		  $empty = $model->get_empty('customer_details');
		  $arr = array('dataId'=>$empty,'name'=>'','email'=>'','address'=>'','amount'=>'','city'=>'','pincode'=>'');
		  	 echo json_encode($arr);
		}
	}
	public function close_inv(){
		$data = $this->request->getPost();
		extract($data);
		$amount = array('status'=>'ACTIVE','customer_id'=>$customer_id,'inv_amt'=>$inv_amt,'inv_dis'=>$inv_dis,'pay_amt'=>$pay_amt,'paid_amt'=>$paid_amt,'dues_amt'=>$dues_amt,'invoice_date'=>$invoice_date);
		$model = new chottuModel();
		$invoice_id = $model->get_empty('invoice_details');
		$inv_save = $model->update_data('invoice_details',$amount,$invoice_id);
		if($inv_save==1){
			echo json_encode(array('status'=>'success'));
			$_SESSION['selected_customer'] = 0;
			// return redirect()->to('sales_report');
		}else{
			echo json_decode(array('status'=>'somthing error'));
			return redirect()->to('admin/sale_invoice');
		}
		
	}
	public function inv(){
		echo view('admin/sale_invoice');
		$model = new chottuModel();
		$arr = array('status'=>'ACTIVE');
		$inv_details['invoice'] = $model->select_all('invoice_details',$arr);
	}
	public function sales_report(){
		$model = new chottuModel();
		if($model->check_token()){
			echo view('admin/header');
			echo view('admin/sidebar');
			$arr = array('status'=>'ACTIVE');
			$data['inv_details'] = $model->select_all('invoice_details',$arr);
			echo view('admin/sales_report',$data);
			echo view('admin/footer');
		}
	}
	public function api(){
		echo view('admin/api_view');
	}
	public function new_api(){
		echo view('admin/new_api');
	}
}
?>