<?php
defined('BASEPATH') OR exit('No ');
class Hello_model extends CI_Model {
	
//Login
	public function login($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$q = $this->db->get('register');
		if($q->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}

//Account Table
	public function showAccounts(){

		
		$q = $this->db->get('addproduct');

		if($q->num_rows() > 0) {
			return $q->result();
		}
		else{
			return false;

				}
			}


//Add Product
	public function register($data){

		$sql = "INSERT INTO addproduct (productname, productcode, stock, price) VALUES (?,?,?,?)";
		
		$q = $this->db->query($sql, $data);
		if($q){
			echo 'success';
		}else{
			return false;
	}
}

//Edit Product
	public function uppro($data){

		$sql = "UPDATE `addproduct` SET `productname`=[pn],`productcode`=[pc],`stock`=[st],`price`=[pr] WHERE 1";
		
		$q = $this->db->query($sql, $data);
		if($q){
			echo 'success';
		}else{
			return false;
	}
}
public function delProd($pn){
      $this->db->where('productname',$pn);

      $res = $this->db->delete('addproduct');
      if($res){
        return true;
      }else{
        return false;
      }
   }


	
}



	



