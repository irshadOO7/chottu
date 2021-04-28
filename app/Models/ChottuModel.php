<?php 
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
				
/**
 * 
 */
class ChottuModel extends Model
{
 // protected $db;
 // protected $DBGroup = "default";

 // public function __construct(){
 //     $db = $this->db_connect();

 // }
 //  //   public function abc(){
 //  //   	   $db = db_connect();
      
 //  //   	$builder = $db->table('brand');
	// 	// $query   = $builder->get();
	// 	// $res = $query->getResult();
	// 	// print_r($res);
    public function select_all($table,$arr){
		 $db = db_connect();
    	$builder = $db->table($table);
    	$builder->where($arr);
		$query   = $builder->get();
		$order = $builder->orderBy('','DESC');
		$error   = $db->error();
		if ($error['code']==0) {
		return $res = $query->getResultArray();
		}else {
			return $error;
		}
		
    }
    public function insert_data($table,$array){
    	$db = db_connect();
    	$builder = $db->table($table);
    	$res = $builder->insert($array);
    	$error   = $db->error();
		if ($error['code']==0) {
		return true;
		}else {
			return $error['message'];
		}
    }
    public function update_data($table,$data,$dataId){
    	$db = db_connect();
    	$builder = $db->table($table);
    	$builder->set($data);
		$builder->where('id', $dataId);
		$res = $builder->update();
		$error = $db->error();
		if($error['code']==0){
			$rows = $db->affectedRows();
			if($rows>0)
			{
				return true;
			 }
			 else {
		
					return "sorry no update found";
				}
			}
			else 
			{
			return $error;
		}
    }
    public function update_img($table,$file){
    	$db = db_connect();
    	$builder = $db->table($table);
    	$error = $db->error();
    	if ($error['code']==0){
    	$validated = $this->validate([
    		'file_Name' => [
    			'uploaded[file]',
    			'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
    			'max_size[file,4096]',
    		],
    	]);

    	$response = [
    		'success' => false,
    		'data' => '',
    		'msg' => "image has not been uploaded successfully"
    	];
    	if ($validated) {
    		$imgfile = $this->request->getFile('file_Name');
    		$imgfile->move(WRITEPATH . 'upload');

    		$data = [
    			'name' => $imgfile->getClientName(),
    			'type' => $imgfile->getClientMimeType()
    		];
    		$save = $builder->insert($data);
    		$response = [
    			'success' => true,
    			'data' =>$save,
    			'img' => " image has been uploaded successfully"
    		];
    	}
    	//return $this->response->setJSON($response);
    } else{
    	return $error;
    }
    }

    public function filter_data(){
    	//$db = db_connect();
	$data =  $this->request->getPost();
	$res=1;
	$res['id']=1;
    if($res)
    {  
    $dataId = $data['dataId'];
      unset($data['table']);
      unset($data['action']);
      unset($data['token']);
      if(isset($data['dataId']))
      {
        unset($data['dataId']);
      }
      if(isset($data['event']))
      {
        unset($data['event']);
      }
      $dt=date('Y-m-d h:i:s');
      $array1 = array('created_by'=>$res['id'],'updated_by'=>$res['id'],'updated_at'=>$dt);
      $new_data = array_merge($array1,$data);
   	  return $new_data;
    }
}
        public function get_empty($table){
    	$db = db_connect();
    	$builder = $db->table($table);
    	$builder->where(array('status'=>'EMPTY'));
    	$builder->orderBy('id','DESC');
    	$builder->limit(1); 
		$query   = $builder->get();
    	$error   = $db->error();
		// if ($error['code']==0) {
		$row = $query->getResultArray();
		if(count($row)==1){
		return $id =  $row[0]['id'];
		}
		else {
			$builder = $db->table($table);
			$res = $builder->insert(array('status'=>'EMPTY'));
		return $id = $db->insertID();
		}
		// }else {
		// 	return $erro['message'];
		// }
    }
    public function delete_data($table,$id){
    	$db = db_connect();
    	$builder = $db->table($table);
    	$builder->where('id', $id);
		$query   = $builder->delete();
    	$error   = $db->error();
    	if($error['code']==0){
    		return true;
    	}else {
    		return $error;
    	}
    }
    public function dropdown($table,$array,$field){
    	$db = db_connect();
    	$model = new chottuModel();
    	$records = $model->select_all($table,$array);
    	foreach ($records as $row) {
    		$id = $row['id'];
    		$name = $row[$field];
    		echo "<option value='$id'>$name</option>";
    	}
    }
    public function get_object($table,$arr){
    	$db = db_connect();
    	$builder = $db->table($table);
    	$builder->where($arr);
		$query   = $builder->get();
		$error   = $db->error();
		$model = new ChottuModel();
		if ($error['code']==0) {
		$res = $query->getResult();
		 if(count($res)>0){
		 	return $res[0];
		 }else{
		 	return false;
		 }
		}else {
			return $error;
    }
  }
  public function login_now($arr){
    	$db = db_connect();
    	$builder = $db->table('user');
    	$builder->where($arr);
		$query   = $builder->get();
		
		$error   = $db->error();
		$model = new ChottuModel();
		//print_r($db->getLastQuery());
		$session = session();
			//return $session->set('user_name','Mai');
		if ($error['code']==0) 
		{
			$res = $query->getResult();
			if(count($res)>0)
			{
			
			$user = $res[0];
			if($user->status=='BLOCKED')
			{
				return array('status'=>'error','message'=>2);
			}
			else if($user->status=='ACTIVE' OR $user->status=='LOGOUT')
			{
				$user_token = md5($user->id.$user->user_name);
				$token_array = array('user_type'=>$user->user_type,'user_id'=>$user->id,'user_name'=>$user->user_name,'token'=>$user_token);
				$session->set('login_user',$token_array);
				$upData = array('status'=>'ACTIVE','token'=>$user_token,'last_login'=>date('Y-m-d H:i:s'));
				$resp = $model->update_data('user',$upData,$user->id);
				if($resp==1){
					return array('status'=>'success','message'=>1);
				}
				else
				{
					return array('status'=>'error','message'=>0,'error'=>$resp['message']);
				} 
			}
			}
			else 
			{
				return array('status'=>'error','message'=>0,'error'=>'Check Your Credentials.');;
    		}
	}
  }
    public function check_token(){
    	$db = db_connect();
        $session = session();
        if($session->login_user){
            $model = new ChottuModel();
            $user = $session->login_user;
            extract($user);
            $arr = array('id'=>$user_id);
            $res = $model->get_object('user',$arr);
            $res_token = $res->token;
            if($res_token==$token){
            	return true;
            }else{
            	return false;
            }
        }else{
    	return false;
        }
    }
	public function upload_blob($folder_path,$file_name,$blob){
	    if(is_dir($folder_path)) 
	    {
	      $full_name = $folder_path.$file_name;  
	      file_put_contents($full_name, $blob);
	      if(file_exists($full_name)) {
	        return true;
	        } else {
	        return "Path is incorrect. check slash(/) or directory name";
	        }
	    } 
	    else
	    {
	      return "Sorry!  Path is incorrect. check slash(/) or directory name";
	    }
	  } 
	public function get_ext($full_ext)
	  {
	    $file_extention =explode("/",$full_ext);
	    $e3 = explode(";",$file_extention[1]);
	    return  $ext = ".". $e3[0];
	  }
  //   public function product_qty($table,$qty)
  //   {
  //   	$db= db_connect();
  //   	$builder = $db->table($table);
  //   	$builder->where($);
  //   	$builder->where($arr);
		// $query = $builder->get();
		// $error = $db->error();
		// $model = new ChottuModel();
		// $product_id = $model->get_object('product_details',"id='product_id'");
		// $sale_id = $model->get_object('tb_sale_item',"id='product_id'");
		// if($product_id==$sale_id){
			
		// }
  //   }
}

?>