<?php 
namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class UserModel extends Model
{
	protected $table = "user";
	protected $DBGroup = "default";
	protected $primaryKey = 'id';
	protected $allowedFields= ['usr_name','user_email','user_pass'];
	protected $useTimestamps = true;
    // protected $validationRules    = [
    //     // 'username'     => 'required|alpha_numeric_space|min_length[3]',
    //     // 'email'        => 'required|valid_email|is_unique[users.email]',
    //     // 'password'     => 'required|min_length[8]',
    //     // 'pass_confirm' => 'required_with[password]|matches[password]'
    // ];

    // protected $validationMessages = [
    // //     'email'        => [
    // //         'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
    // //     ]
    // // ];
    // public function transBegin()
    // {
    // 	return $this->db->transBegin();
    // }
	
}
?>