<?php 
namespace App\Models;
use CodeIgniter\Model;

/**
 * 
 */
class Student extends Model
{
	
	protected $DBGroup = 'default';

	protected $table = 'tb_product';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $allowedFields = ['name','mrp','offer_price','status'];
}
 ?>