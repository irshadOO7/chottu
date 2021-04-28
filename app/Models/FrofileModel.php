<?php 

use CodeIgniter\Model;


/**
 * 
 */
class FrofileModel extends Model
{
	protected $tbale = "user_register;"
	protected $DBGroup = "default;"
	protected $allowedFields= ['user_id','name','address','state','country'];
	protected $useTimestamps = true;
    protected $validationRules    = [
        'username'     => 'required|alpha_numeric_space|min_length[3]',
        'email'        => 'required|valid_email|is_unique[users.email]',
        'password'     => 'required|min_length[8]',
        'pass_confirm' => 'required_with[password]|matches[password]'
    ];

    protected $validationMessages = [
        'email'        => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
        ]
    ];
  
	
}
 ?>